<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CustomerUser;
use App\AccountInfo;
use Carbon\Carbon;

class CustomerUserController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function __construct() {
        $this->middleware('auth');
    }

    public function show() {
        $user = Auth::user();
        $accountInfo = AccountInfo::where('cAccName', $user->username)
            ->where('email', $user->email)
            ->first();
        return view('users.show', compact('accountInfo'));
    }

    public function edit(CustomerUser $user) {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    public function update(CustomerUser $user) {
        $this->validate(request(), [
            'email' => 'required|max:255|email|unique:users,email,'.$user->id,
            // 'password' => ['reuired', 'string', 'min:8', 'confirmed'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric', 'min:11']
        ]);

        $user->email = request('email');
        if (request('password')) {
            $user->password = md5(request('password'));
        }
        $user->phone = request('phone');
        $user->updated_at = Carbon::Now();
        $user->save();

        $accountInfo = AccountInfo::where('cAccName', $user->username)
            ->where('email', $user->email)
            ->first();
        $accountInfo->email = $user->email;
        $accountInfo->phone = $user->phone;
        if (request('password')) {
            $accountInfo->cSecPassWord = $user->password;
            $accountInfo->cPassWord = $user->password;
            $accountInfo->plainpassword = request('password');
        }        
        $accountInfo->save();

        return redirect('/home');
    }
}

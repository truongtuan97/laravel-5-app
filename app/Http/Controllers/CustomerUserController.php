<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CustomerUser;
use App\AccountInfo;
use App\CardChargeInfoLog;
use App\AccountMoneyTracking;
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
        return view('users.show', compact('user'));
    }

    public function edit(AccountInfo $user) {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    public function update(AccountInfo $user) {
        $this->validate(request(), [
            'email' => 'required|max:255|email|unique:account_info,email,'.$user->id,
            // 'password' => ['reuired', 'string', 'min:8', 'confirmed'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric', 'min:11']
        ]);

        $user->email = request('email');
        if (request('password')) {
            $user->cSecPassWord = strtoupper(md5(request('password')));
            $user->cPassWord = strtoupper(md5(request('password')));
            $user->plainpassword = request('password');
        }
        $user->phone = request('phone');
        $user->save();

        return redirect('/home');
    }

    public function lichsunaptien() {
        $user = auth()->user();
        $userCardChargeLogs = CardChargeInfoLog::where('userAccount', $user->cAccName)->get();
        return view('users.lichsunaptien', compact('userCardChargeLogs'));
    }

    public function lichsuruttien() {
        $user = auth()->user();
        $accMoneyTracking = new AccountMoneyTracking;
        $accMoneyTracking->setConnection('sqlsrv2');

        $userMoneyTakenLogs = $accMoneyTracking->where('AccountName', $user->cAccName)->get();

        return view('users.lichsuruttien', compact('userMoneyTakenLogs'));
    }
}

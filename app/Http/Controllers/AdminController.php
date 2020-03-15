<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CustomerUser;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');//return ra trang login để đăng nhập
    }

    public function postLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không
        $user = CustomerUser::where('email', $request->email)
                    ->where('password', md5($request->password))
                    ->first();
        if ($user && $user->role == "admin") {
            Auth::login($user);
            return view('admin.home');
        }        
        return redirect('/admin');
    }
}

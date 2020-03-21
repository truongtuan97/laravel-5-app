<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AccountInfo;
use Carbon\Carbon;
use App\PromotionConfiguration;

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
        $user = AccountInfo::where('email', $request->email)
                    ->where('cSecPassWord', md5($request->password))
                    ->first();                
        if ($user && $user->role == "admin") {
            $chkm = PromotionConfiguration::all()->take(1);

            Auth::login($user);
            return redirect('list_users');            
        }        
        return redirect('/admin');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\CustomerUser;
use App\AccountInfo;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
            ? $this->username()
            : 'username';
        return [
            $field => $request->get($this->username()),
            'password' => $request->password,
        ];
    }

    public function logout(Request $request)
    {        
        if (auth()->user() && auth()->user()->role != 'admin') {
            $accountInfo = $this->getAccountInfo(auth()->user()->username, auth()->user()->email);
            $accountInfo->dLogoutDate = Carbon::Now();
            $accountInfo->save();
        }
        
        $this->performLogout($request);
        return redirect('/home');
    }

    public function login(Request $request)
    {        
        $user = CustomerUser::where('username', $request->email)
                    ->where('password',md5($request->password))
                    ->first();                  
        if ($user) {
            
            $accountInfo = $this->getAccountInfo($user->username, $user->email);
            $accountInfo->dLoginDate = Carbon::Now();
            $accountInfo->save();

            Auth::login($user);
            return redirect('/home');
        }
        return redirect('/home');
    }

    private function getAccountInfo($cAccName, $email) 
    {
        return AccountInfo::where('cAccName', $cAccName)
                    ->where('email', $email)
                    ->first();
    }
}

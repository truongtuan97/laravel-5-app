<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\CustomerUser;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

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
        $this->performLogout($request);
        return redirect('/home');
    }

    public function login(Request $request)
    {        
        $user = CustomerUser::where('username', $request->email)
                    ->where('password',md5($request->password))
                    ->first();                  
        Auth::login($user);
        return redirect('/users/'.$user->id.'/show');
    }
}

<?php

namespace App\Http\Middleware;
use App\CustomerUser;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {        
        $user = CustomerUser::where('email', auth()->user()->email)
                    ->where('password', auth()->user()->password)
                    ->first();        
        if ($user && $user->role == 'admin') {
            return $next($request);
        }
        return redirect('/home')->with('error','You have not admin access');
    }
}

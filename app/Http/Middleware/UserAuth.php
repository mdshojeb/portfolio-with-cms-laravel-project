<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $email=session('email');
        $pass=session('password');
        $role=session('role');
        if(empty($email) && empty($pass)){
           return redirect('/web-admin');
        }else{
            if($role!=2){
               return redirect('/');
            }
            return $next($request);
        }
        return $next($request);
        
    }
}

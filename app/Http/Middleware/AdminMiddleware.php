<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AdminMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                return $next($request);
            }
            else{
                return redirect('/home')->with('status','Access to admin denied...');
            }
        }
        else{
            return redirect('/home')->with('status','Login to continue...');
        }

    }
}

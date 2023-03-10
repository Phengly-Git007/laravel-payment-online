<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;

    public function authenticated(){
        if(Auth::user()->role == '1'){
            return redirect('/')->with('status','Logged in successful');
        }
        if(Auth::user()->role == '0'){
            return redirect('/')->with('status','Logged in successful');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

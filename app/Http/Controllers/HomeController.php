<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function setLocalization(Request $request){

        try{
            if($request->kh){
                return redirect()->back()->withCookie(cookie(config('app.locale_cookie'),'kh',1000));
            }
            elseif($request->ch){
                return redirect()->back()->withCookie(cookie(config('app.locale_cookie'),'ch',1000));
            }
            else{
                return redirect()->back()->withCookie(cookie(config('app.locale_cookie'),'en',1000));
            }
        }
        catch(Throwable $e){
            return redirect('/home');
        }
        return redirect('/home');
    }
}

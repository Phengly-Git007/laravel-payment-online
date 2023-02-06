<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm(){
        return view('auth.passwords.email');
    }

    public function submitForgotPasswordForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->input('email'),
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        Mail::send('email.forgot-password',['token' => $token],function($message) use($request) {
            $message->to($request->input('email'));
            $message->subject('Reset Password');
        });
        return redirect()->back()->with('status','We recieved a reset password');
    }

    public function showResetPasswordForm($token){
        return view('auth.passwords.reset',['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8|max:10|confirmed',
            'password_confirmation' => 'required',
        ]);
        $reset_password = DB::table('password_resets')
        ->where('email',$request->input('email'))
        ->where('token',$request->token)->first();
        if(!$reset_password){
            return redirect()->back()->with('error','Invalid Token!');
        }
        User::where('email',$request->input('email'))
            ->update(['password' =>Hash::make( $request->input('password'))]);
            DB::table('password_resets')->where('email' ,$request->input('email'))->delete();

        return redirect('/')->with('status','Your password has been reset');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function myOrder()
    {
        $orders = Order::where('user_id',Auth::id())->orderBy('id','desc')->get();
        return view('frontend.order.index',['orders' => $orders]);
    }
    public function viewOrder($id)
    {
        $orders = Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('frontend.order.view',['orders' => $orders]);
    }

    public function password(){
       return view('frontend.profile.index');
    }

    public function changePassword(PasswordRequest $request){
      $current_password = Hash::check($request->current_password,auth()->user()->password);
      if($current_password){
        User::findOrFail(Auth::user()->id)->update([
            'password' => Hash::make($request->password),
          ]);
            return redirect('/')->with('status','Password updated successfully');
      }
      else{
        return redirect()->back()->with('error','Current password does not match with old password');
      }

    }

}

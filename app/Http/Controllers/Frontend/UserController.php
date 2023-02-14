<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

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

    public function changePassword(){
        dd('Change Password');
    }

}

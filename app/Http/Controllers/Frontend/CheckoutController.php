<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){

        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout.index',['cartItems' => $cartItems]);

    }
}

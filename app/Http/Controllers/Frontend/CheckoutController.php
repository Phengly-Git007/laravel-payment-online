<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){

        $carts = Cart::where('user_id',Auth::id())->get();
        foreach($carts as $cart){
            if(!Product::where('id',$cart->product_id)->where('quantity','>=', $cart->product_quantity)->exists()){
                $removeCart = Cart::where('user_id',Auth::id())->where('product_id',$cart->product_id)->first();
                $removeCart->delete();
            }
        }
        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout.index',['cartItems' => $cartItems]);

    }
}

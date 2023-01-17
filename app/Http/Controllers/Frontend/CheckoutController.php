<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
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

    public function placeOrderProduct(CheckoutRequest $request)
    {
        $orders = new Order();
        $orders->user_id = Auth::id();
        $orders->name = $request->input('name');
        $orders->email = $request->input('email');
        $orders->phone = $request->input('phone');
        $orders->address1 = $request->input('address1');
        $orders->address2 = $request->input('address2');
        $orders->city = $request->input('city');
        $orders->country = $request->input('country');
        $orders->pincode = $request->input('pincode');
        $orders->tracking_number = 'Phengly-'.rand(1010,0101);
        $orders->save();

        $carts = Cart::where('user_id',Auth::id())->get();
        foreach($carts as $cart){
            //  'quantity' => $cart->product_quantity, => product_quantity is carts field
            OrderItem::create([
                'order_id' => $orders->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->product_quantity,
                'price' => $cart->products->selling_price,
            ]);
            // decrement product quantity when submit order
            $product = Product::where('id',$cart->product_id)->first();
            $product->quantity = $product->quantity - $cart->product_quantity;
            $product->update();
        }

        if(Auth::user()->address1 == null){
            $user = User::where('id',Auth::id())->first();
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }
        $carts = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($carts);
        return redirect('/view-cart-item')->with(['status'=>'Order Successfully']);
    }



}

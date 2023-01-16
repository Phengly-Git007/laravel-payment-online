<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProductToCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_quantity = $request->input('product_quantity');
        if(Auth::check()){
            $product_validate = Product::where('id',$product_id)->first();
            if($product_validate){
                if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                    return response()->json(['status'=> $product_validate->name. ', Already Add To cart']);
                }
                else{
                    $cartItem = new Cart();
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_id = $product_id;
                    $cartItem->product_quantity = $product_quantity;
                    $cartItem->save();
                    return response()->json(['status' => $product_validate->name. ', Add To Cart Successfully']);
                }

            }
            else{
                return response()->json(['status'=>'Something Went Wrong']);
            }

        }
        else{
            return response()->json(['status'=>'Login to continue']);
        }
    }

    public function viewCartItem()
    {
        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart.index',['cartItems'=>$cartItems]);
    }

    public function removeProductFromCart(Request $request)
    {
        if(Auth::check()){
            $product_id = $request->input('product_id');
            if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                $cartItem = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status'=> ' Deleted successfully']);
            }
            else{
                return response()->json(['status'=>'Something went wrong']);
            }
        }
        else{
            return response()->json(['status'=>'Login to continue']);
        }
    }
}

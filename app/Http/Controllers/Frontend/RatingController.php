<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function addProductRating(Request $request){

        $star_rated = $request->input('product_rating');
        $product_id = $request->input('product_id');

        $product_validate = Product::where('id',$product_id)->where('status','0')->first();
        if($product_validate){
            $verified_purchase = Order::where('orders.user_id',Auth::id())
            ->join('order_items','orders.id','order_items.order_id')
            ->where('order_items.product_id',$product_id)->get();
            if($verified_purchase->count() > 0){
                $rated = Rating::where('user_id',Auth::id())->where('product_id',$product_id)->first();
                if($rated){
                    $rated->stars_rated = $star_rated;
                    $rated->update();
                }
                else{
                    Rating::create([
                        'user_id' => Auth::id(),
                        'product_id' => $product_id,
                        'stars_rated' => $star_rated
                    ]);
                }
                return redirect()->back()->with('status','Rating Successfully');
            }
            else{
                return redirect()->back()->with('status', 'Can not rated without purchase');
            }
        }
        else{
            return redirect()->back()->with('status', 'Something went wrong');
        }
    }
}

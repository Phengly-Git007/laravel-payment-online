<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $feature_categories = Category::where('popular','1')->take(15)->get();
        $trending_products = Product::where('trending','1')->take(15)->get();
        return view('frontend.index',['feature_categories' => $feature_categories,'trending_products' => $trending_products]);
    }

    public function getProductsList(){

        $products = Product::select('name')->where('status','0')->get();
        $data = [];
        foreach($products as $product){
            $data[] = $product['name'];
        }
        return $data;
    }

    public function searchProduct(Request $request)
    {
       $search = $request->search_name;
       if($search != ''){
        $product = Product::where('name','LIKE',"%$search%")->first();
        if($product){
            return redirect('product-details/'.$product->category->slug.'/'.$product->slug);
        }
        else{
            return redirect()->back();
        }
       }
       else{
        return redirect()->back()->with('status','Enter Product Name...');
       }
    }

    public function categories()
    {
        $categories = Category::where('status','0')->paginate(12);
        return view('frontend.categories',['categories' => $categories]);
    }
    public function products(){
        $products = Product::where('status','0')->orderBy('id','desc')->paginate(20);
        return view('frontend.products.index',['products' => $products]);
    }
    public function showCategories($slug)
    {
        if(Category::where('slug',$slug)->exists()){
            $category = Category::where('slug',$slug)->first();
            $products = Product::where('category_id',$category->id)->where('status','0')->get();
            return view('frontend.products.product-by-categories',['products'=>$products,'category'=>$category]);
        }
        else{
            return redirect('/')->with('status','Something went wrong');
        }
    }

    public function productDetails($cate_slug,$pro_slug)
    {
        if(Category::where('slug',$cate_slug)->exists()){
            if(Product::where('slug',$pro_slug)->exists()){
                $products = Product::where('slug',$pro_slug)->first();
                $ratings = Rating::where('product_id',$products->id)->get();
                $calculate_rating =  Rating::where('product_id',$products->id)->sum('stars_rated');
                $user_rating = Rating::where('product_id',$products->id)->where('user_id',Auth::id())->first();
                $reviews = Review::where('product_id',$products->id)->orderBy('id','desc')->get();
                if($ratings->count() > 0){
                $rating_value = $calculate_rating/$ratings->count();
                }
                else{
                    $rating_value = 0;
                }
                return view('frontend.products.product-details',['products'=>$products,'ratings'=>$ratings,
                            'rating_value'=>$rating_value,'user_rating'=>$user_rating,'reviews'=>$reviews]);
            }
            else{
                return redirect('/')->with('status','Something went wrong');
            }
        }
        else{
            return redirect('/')->with('status','Category not found');
        }

    }
}

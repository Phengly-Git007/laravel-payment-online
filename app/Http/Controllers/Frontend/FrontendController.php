<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $feature_categories = Category::where('popular','1')->take(15)->get();
        $trending_products = Product::where('trending','1')->take(15)->get();
        return view('frontend.index',['feature_categories' => $feature_categories,'trending_products' => $trending_products]);
    }

    public function categories()
    {
        $categories = Category::where('status','0')->get();
        return view('frontend.categories',['categories' => $categories]);
    }
    public function products(){
        $products = Product::where('status','0')->get();
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
                return view('frontend.products.product-details',['products'=>$products]);
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

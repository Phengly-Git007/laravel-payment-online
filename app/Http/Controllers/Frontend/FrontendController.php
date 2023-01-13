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
}

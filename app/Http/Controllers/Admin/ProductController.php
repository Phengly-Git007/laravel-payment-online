<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(12);
        return view('admin.products.index',['products' => $products]);
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',['categories' => $categories]);
    }


    public function store(ProductRequest $request)
    {
        $images = $request->file('image')->store('public/products');
        $product = Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'tax' => $request->tax,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'status' => $request->status,
            'trending' => $request->trending,
            'image' =>$images
        ]);
        if($product){
            return redirect('products')->with('status','Product Created Successfully');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

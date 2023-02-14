<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        // $categories = Category::all();
        // $products = Product::when($request->category_id != null,function($query) use($request){
        //     $query->where('category_id',$request->category_id);
        // })
        // ->orderBy('id','desc')->with(['category'])->paginate(15);
        // return view('admin.products.index',['products' => $products,'categories' => $categories]);
        $products = Product::orderBy('id','desc')->paginate(15);
        $categories = Category::all();
        return view('admin.products.index',['products'=>$products,'categories'=>$categories]);
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
            if($request->has('categories')){
                $product->categories()->attach($request->categories);
           }

        if($product){
            return redirect('products')->with('status','Product Created Successfully');
        }
    }


    public function show(Product $product)
    {
        return view('admin.products.detail',['product'=>$product]);
    }


    public function edit(Product $product)
    {
        $categories = Category::where('status','0')->get();
        return view('admin.products.edit',['product'=>$product,'categories'=>$categories]);
    }


    public function update(ProductUpdateRequest $request, Product $product)
    {
        $images = $product->image;
        // check file
        if($request->hasFile('image')){
            // delete file
            Storage::delete($product->image);
            // add new file
            $images = $request->file('image')->store('public/products');
        }
        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
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
        if($request->has('categories')){
            $product->categories()->sync($request->categories);
        }

        return redirect('products')->with('status','Product Updated Successfully');
    }


    public function destroy(Product $product,Request $request)
    {
        // delete file
        Storage::delete($product->image);
        // detatch category
        $product->categories()->detach();
        $product->delete();
        return redirect('products')->with('status','Product Deleted Successfully');
    }
}

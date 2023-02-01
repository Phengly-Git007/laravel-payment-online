<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        // $categories = Category::where('status','0')->orderBy('id','desc')->paginate(12);
        $categories = Category::orderBy('id','desc')->paginate(12);
        return view('admin.categories.index',['categories' => $categories]);
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(CategoryRequest $request)
    {

        $images = $request->file('image')->store('public/categories');
        $category = Category::create([
            'name' =>$request->name,
            'slug' =>$request->slug,
            'short_description' =>$request->short_description,
            'description' =>$request->description,
            'status' =>$request->status,
            'popular' =>$request->popular,
            'image' =>$images
        ]);
        if($category){
            return redirect('categories')->with('status','Categories Created Successfully...');
        }
        else{
            return redirect()->back()->with('status','something went wrong...');
        }

    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit',['category'=>$category]);
    }

    public function update(Request $request, Category $category)
    {
        // delete file image
        $images = $category->image;
        if($request->hasFile('image')){
            Storage::delete($images);
            // add new file
            $images = $request->file('image')->store('public/categories');
        }
        $category->update([
            'name' =>$request->name,
            'slug' =>$request->slug,
            'short_description' =>$request->short_description,
            'description' =>$request->description,
            'status' =>$request->status,
            'popular' =>$request->popular,
            'image' =>$images
        ]);
        return redirect('categories')->with('status','Categories Updated Successfully...');
    }

    public function destroy(Category $category)
    {
        // delete image file
        Storage::delete($category->image);
        // $category->products()->detach();
        $category->delete();
        return redirect('categories')->with('status','Categories Deleted Successfully...');
    }
}

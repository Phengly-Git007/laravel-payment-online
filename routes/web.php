<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/',[FrontendController::class,'index']);
Route::get('category',[FrontendController::class,'categories']);
Route::get('product-by-categories/{slug}',[FrontendController::class,'showCategories']);
Route::get('product-details/{cate_slug}/{pro_slug}',[FrontendController::class,'productDetails']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::post('add-to-cart',[CartController::class,'addProductToCart']);
});


Route::middleware(['auth','admin'])->group(function (){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');
    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);
});

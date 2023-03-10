<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ForgotPasswordController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/',[FrontendController::class,'index']);
Route::get('category',[FrontendController::class,'categories']);
Route::get('product',[FrontendController::class,'products']);
Route::get('product-by-categories/{slug}',[FrontendController::class,'showCategories']);
Route::get('product-details/{cate_slug}/{pro_slug}',[FrontendController::class,'productDetails']);
Route::get('get-products-list',[FrontendController::class,'getProductsList']);
Route::post('search-product',[FrontendController::class,'searchProduct']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',[FrontendController::class,'index']);

// setlocalization

Route::post('set-locale',[HomeController::class,'setLocalization'])->name('locale');

// endSetlocalization

// cart route
Route::post('add-to-cart',[CartController::class,'addProductToCart']);
Route::post('remove-from-cart',[CartController::class,'removeProductFromCart']);
Route::post('update-cart-quantity',[CartController::class,'updateCartQuantity']);

// wishlist route
Route::post('add-to-wishlist',[WishlistController::class,'addProductToWishlist']);
Route::post('remove-from-wishlist',[WishlistController::class,'removeProductFromWishlist']);


// load cart quantity on navbar
Route::get('load-cart-quantity',[CartController::class,'cartCountQuantity']);
Route::get('load-wishlist-quantity',[WishlistController::class,'wishlistCountQuantity']);


Route::middleware(['auth'])->group(function(){
    Route::get('view-wishlist-item',[WishlistController::class,'viewWishlistItem']);
    Route::get('view-cart-item',[CartController::class,'viewCartItem']);
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::post('place-order-product',[CheckoutController::class,'placeOrderProduct']);
    Route::get('my-orders',[UserController::class,'myOrder']);
    Route::get('view-orders/{id}',[UserController::class,'viewOrder']);
    Route::get('password',[UserController::class,'password']);
    Route::post('change-password',[UserController::class,'changePassword']);
    // rating

    Route::post('add-product-rating',[RatingController::class,'addProductRating']);
    Route::get('add-product/{product_slug}/review',[ReviewController::class,'reviewProduct']);
    Route::post('add-product-review',[ReviewController::class,'addProductReview']);
    Route::get('edit-review/{product_slug}/user-review',[ReviewController::class,'editProductReview']);
    Route::put('update-product-review',[ReviewController::class,'updateProductReview']);

    Route::post('proceed-to-pay',[CheckoutController::class,'razorPayment']);

});


Route::middleware(['auth','admin'])->group(function (){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');
    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);
    Route::get('orders',[OrderController::class,'index'])->name('orders.index');
    Route::get('orders-details/{id}',[OrderController::class,'orderDetails']);
    Route::get('all-orders',[OrderController::class,'allOrder'])->name('orders.all');
    Route::delete('orders/{id}',[OrderController::class,'deleteOrder'])->name('orders.delete');
    Route::put('update-orders/{id}',[OrderController::class,'updateOrder']);
    Route::resource('users',AdminUserController::class);
    Route::get('settings',[SettingController::class,'index'])->name('settings.index');
    Route::post('settings',[SettingController::class,'store'])->name('settings.store');
    Route::get('view-invoice/{order_id}',[OrderController::class,'viewInvoice']);
    Route::get('download-pdf/{id}',[OrderController::class,'downloadPdf']);
    Route::get('export-to-pdf',[OrderController::class,'exportToPdf'])->name('export-to-pdf-file');
});

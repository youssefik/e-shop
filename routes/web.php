<?php


// use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\RaitingController;
use App\Http\Controllers\Frontend\ReviewController;



use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


 //category-routes

Route::get('/',[FrontendController::class, 'index']);

Route::get('/category',[FrontendController::class, 'category']);
Route::get('view_category/{slug}',[FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class, 'detailsproduct']);


Route::get('product-list',[FrontendController::class,'productlistAjax']);
Route::post('searchproduct',[FrontendController::class,'searchProduct']);


 //cart-routes

Route::post('add-to-cart',[CartController::class,'addToCart']);
Route::post('delete-cart-item',[CartController::class,'deleteProductFromCart']);
Route::post('update-cart',[CartController::class,'updateCart']);

Route::get('load-cart-data',[CartController::class,'cartcount']);



 //wishlist-routes

Route::post('add-to-wishlist',[WishlistController::class,'add']);
Route::post('delete-wishlist-item',[WishlistController::class,'deleteProducItem']);

Route::get('load-wishlist-data',[WishlistController::class,'wishlistcount']);





Route::middleware('auth')->group(function () {
    Route::get('cart',[CartController::class,'viewCart']);


    Route::get('checkout',[CheckoutController::class,'index']);
    Route::post('place-order',[CheckoutController::class,'placeorder']);
    Route::get('my-orders',[UserController::class,'index']);


    Route::get('view-order/{id}',[UserController::class,'view']);

    Route::post('add-rating',[RaitingController::class,'add']);

    Route::get('add-review/{product_slug}/userreview',[ReviewController::class,'add']);
    Route::post('add-review',[ReviewController::class,'create_slider']);
    Route::get('edit-review/{product_slug}/userreview',[ReviewController::class,'edit']);
    Route::put('update-review',[ReviewController::class,'update']);








    Route::get('wishlist',[WishlistController::class,'index']);


    Route::post('proceed-to-pay',[CheckoutController::class,'razorpaycheck']);







});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])->group(function(){
    // Route::get('/dashboard',[App\Http\Controllers\Admin\FrontenController::class, 'index']);->error
    Route::get('/dashboard',[App\Http\Controllers\Admin\FrontendController::class, 'index']);


    Route::group(['prefix' => 'sliders'], function () {
        Route::get('/', 'App\Http\Controllers\Admin\SliderController@index');
        Route::get('/create', 'App\Http\Controllers\Admin\SliderController@create');
        Route::post('/create_slider', 'App\Http\Controllers\Admin\SliderController@store');
        Route::get('/{slider}/edit', 'App\Http\Controllers\Admin\SliderController@edit');
        Route::put('update_slider/{slider}', 'App\Http\Controllers\Admin\SliderController@update');
        Route::delete('/{id}/delete', 'App\Http\Controllers\Admin\SliderController@destroy');



    });

    //Category and product Routes
    Route::get('categories',[App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add-categorie',[App\Http\Controllers\Admin\CategoryController::class, 'add']);
    Route::post('insert-category',[App\Http\Controllers\Admin\CategoryController::class, 'insert']);
    Route::get('edit-category/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update-category/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::delete('delete-category/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

    Route::get('products',[ProductController::class, 'index']);
    Route::get('add-product',[ProductController::class, 'add']);
    Route::post('insert-product',[App\Http\Controllers\Admin\ProductController::class, 'insert']);
    Route::get('edit-product/{id}',[App\Http\Controllers\Admin\ProductController::class, 'edit']);
    Route::put('update-product/{id}',[App\Http\Controllers\Admin\ProductController::class, 'update']);
    Route::delete('delete-product/{id}',[App\Http\Controllers\Admin\ProductController::class, 'destroy']);



    Route::get('users',[App\Http\Controllers\Admin\FrontendController::class, 'users']);
    Route::get('orders',[App\Http\Controllers\Admin\OrderController::class, 'index']);
    Route::get('admin/view-order/{id}',[App\Http\Controllers\Admin\OrderController::class, 'view']);



    Route::put('update-order/{id}',[App\Http\Controllers\Admin\OrderController::class, 'updateorder']);
    Route::get('orders-history',[App\Http\Controllers\Admin\OrderController::class, 'orderhistory']);

    Route::get('users',[App\Http\Controllers\Admin\DashboardController::class, 'users']);
    Route::get('admin/view-user/{id}',[App\Http\Controllers\Admin\DashboardController::class, 'viewUser']);











});


// Route::middleware(['auth', 'isAdmin'])->group(function () {
//     Route::get('/dashboard', [FrontendController::class, 'index']);
// });

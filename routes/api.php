<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', [AuthController::class,'login']);

    Route::post('register', [AuthController::class,'register']);

});

Route::middleware(\App\Http\Middleware\JwtMiddleware::class)->group(function () {

    Route::post('logout', [AuthController::class,'logout']);

    Route::post('profile', [AuthController::class,'profile']);

    Route::get('get_all_products' , [ProductController::class,'getAllProducts']);

    Route::get('get_all_store_products/{id}' , [ProductController::class,'getAllProductStores']);

    Route::get('get_all_stores' , [StoreController::class,'getAllStores']);

    Route::post('search_product' , [ProductController::class,'searchProduct']);

    Route::post('search_store' , [StoreController::class,'searchStore']);

    Route::post('create_store' , [StoreController::class,'createStore'])->middleware(CheckAdmin::class);

    Route::delete('delete_store/{id}' , [StoreController::class,'deleteStore'])->middleware(CheckAdmin::class);

    Route::post('create_product' , [ProductController::class,'createProduct'])->middleware(CheckAdmin::class);

    Route::post('add_favorite', [FavoriteController::class,'addFavorite']);

    Route::get('get_all_favorites' , [FavoriteController::class,'getAllFavorites']);

    Route::post('delete_favorite' , [FavoriteController::class,'deleteFavorite']);

    Route::post('get_one_product/{id}' , [ProductController::class,'getOneProduct']);
    
    Route::get('get_all_orders' , [OrderController::class,'getAllOrders'])->middleware(CheckAdmin::class);

    Route::get('get_all_user_orders' , [OrderController::class,'getAllUserOrders']);
    
    Route::post('get_order_details/{id}' , [OrderController::class,'getOrderDetails']);
        
    Route::post('update_order_item',[OrderController::class,'updateOrderItem']);
    
    Route::post('delete_order_item',[OrderController::class,'deleteOrderItem']);
    
    Route::post('change_order_status/{id}' , [OrderController::class,'changeOrderStatus'])->middleware(CheckAdmin::class);
    
    Route::post('update_order' , [OrderController::class,'updateOrder']);
    
    Route::post('delete_order' , [OrderController::class,'deleteOrder']);

    Route::post('create_order' , [OrderController::class,'createOrder']);
});



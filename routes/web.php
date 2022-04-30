<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\LikeController;


Route::get('/',[ShopController::class,'index']);

Route::controller(ShopController::class)->group(function () {
    Route::prefix('shop')->group(function () {
        Route::get('/', 'index');
        Route::get('/search', 'search');
        // Route::post('/', 'search');
        Route::get('/detail/{shop_id}', 'detail');
    });
});

Route::controller(LikeController::class)->group(function () {
    // Route::middleware('auth')->group(function () {
        Route::post('/like/{shop_id}', 'create');
        Route::delete('/like/{shop_id}', 'delete');
    // });
});

Route::controller(UserController::class)->group(function () {
    Route::prefix('user')->group(function () {
        // Route::get('/register', 'register');
        // Route::post('/register', 'user_add');
        // Route::get('/thanks', 'thanks');
        // Route::get('/login', 'login');
        // Route::post('/login', 'login');
        Route::get('/logout', 'logout')->middleware('auth');
        // Route::post('/logout', 'logout');
        Route::get('/mypage', 'mypage')->middleware('auth');
    });
});

Route::controller(ReserveController::class)->group(function () {
    // Route::middleware('auth')->group(function(){
        Route::post('/reserve/{shop_id}', 'reserve');
        Route::put('/reserve/{reserve_id}', 'change');
        Route::delete('/reserve/{reserve_id}', 'delete');
    // });
});

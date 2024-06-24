<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('login',[AuthController::class,'login'])->name('login');
Route::post('register',[AuthController::class,'register'])->name('register');
Route::middleware('auth:sanctum')->group(function(){
    
    Route::post('logout',[AuthController::class,'logout'])->name('logout');
    Route::get('products',[ProductController::class,'index'])->name('products');
    Route::post('update-profile',[AuthController::class,'update'])->name('update-profile');

});


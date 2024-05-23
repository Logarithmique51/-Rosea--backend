<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LoyaltyController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\VariantController;
use App\Http\Controllers\Api\VariantOptionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\StaffAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/staffs',[StaffAuthController::class,'create']);
Route::post('/staffs/login',[StaffAuthController::class,'login']);
Route::get('/staffs',[StaffAuthController::class,'index'])->middleware('auth:sanctum');

Route::apiResource("/users",UserController::class);
Route::apiResource("/products",ProductController::class);
Route::apiResource("/variants",VariantController::class);
Route::apiResource("/variant-options",VariantOptionController::class);
Route::apiResource("/categories",CategoryController::class);
Route::apiResource("/loyalties",LoyaltyController::class);


Route::get('hello',function (Request $request){


});

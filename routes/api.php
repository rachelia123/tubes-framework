<?php

use App\Http\Controllers\Api\CategoryCoontroller;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\SubCategoryCoontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('/users', RegisterController::class);

Route::apiResource('/product', ProductController::class);

Route::apiResource('/kategory', CategoryCoontroller::class);
Route::apiResource('/subkategory', SubCategoryCoontroller::class);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

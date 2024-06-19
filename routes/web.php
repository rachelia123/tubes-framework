<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SuggestionController;
use Illuminate\Support\Facades\Auth;

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

use App\Http\Controllers\AuthController;

Route::get('/', [LoginController::class, 'showLoginForm'])->middleware('guest');

Auth::routes();


// Grouping routes with 'auth' middleware
Route::middleware(['auth'])->group(function () {
    // start route dari home
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::get('about', [AboutController::class, 'index'])->name('about');

    Route::get('contact', [ContactController::class, 'index'])->name('contact');
    // end route dari home

    // start route dari suggestion
    Route::post('/suggestion', [SuggestionController::class, 'store'])->name('suggestion.store');
    Route::resource('suggestion', SuggestionController::class);
    // end route dari suggestion

    // Grouping routes with 'products' prefix
    Route::prefix('products')->group(function () {
        Route::get('food', [ProductController::class, 'food'])->name('products.food');
        Route::get('drink', [ProductController::class, 'drink'])->name('products.drink');
        Route::resource('/', ProductController::class);
    });


    Route::get('exportExcel', [ProductController::class, 'exportExcel'])->name('products.exportExcel');
    Route::get('exportPdf', [ProductController::class, 'exportPdf'])->name('products.exportPdf');


    Route::get('getProducts', [ProductController::class, 'getData'])->name('products.getData');
    // coba
    Route::get('/upload-example', function() {
        return view('upload_example');
    });

    Route::post('/upload-example', function(Request $request) {
        $path = $request->file('avatar')->store('public');
        return $path;
    })->name('upload-example');
    Route::resource('products', ProductController::class);

});

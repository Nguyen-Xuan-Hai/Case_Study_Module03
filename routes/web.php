<?php


use App\Http\Controllers\BillController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\frontend\ProductFrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

//Route::get('/backend', function () {
//    return view('backend.home');
//});

Route::get('/', [ProductFrontendController::class,'view'])->name('home');

Route::get('/menu',[ProductFrontendController::class,'showMenu'])->name('menu');

Route::get('cart/{id}/add-to-cart', [ProductFrontendController::class, 'addToCart'])->name('cart.addToCart');
Route::get('cart', [ProductFrontendController::class, 'index'])->name('cart.index');
Route::get('cart/{id}/remove-product', [ProductFrontendController::class, 'removeProduct'])->name('cart.removeProduct');
Route::post('cart/update',[ProductFrontendController::class, 'updateCart'])->name('cart.update');
Route::get('cart/delete',[ProductFrontendController::class,'deleteCart'])->name('cart.delete');

Route::get('check-out',[ProductFrontendController::class,'showFormCheckOut'])->name('cart.checkout')->middleware('auth');
Route::post('check-out',[ProductFrontendController::class,'checkOut'])->name('cart.submit_checkout')->middleware('auth');
Route::post('cart/update-cart',[ProductFrontendController::class,'updateProduct']);



//Route::prefix('/admin')->group(function (){
//    Route::get('/', [ProductController::class, 'index'])->name('home');
//    Route::prefix('products')->group(function (){
//        Route::get('/',[ProductController::class,'index'])->name('products.index');
//    });
//});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/',[BillController::class,'showTable'])->name('backend.home')->middleware('can:backend-home');

    Route::prefix('products')->group(function (){
        Route::get('/',[ProductController::class,'index'])->name('products.index')->middleware('can:product-list');
        Route::get('/create',[ProductController::class,'create'])->name('products.create')->middleware('can:product-create');
        Route::post('/create',[ProductController::class,'store'])->name('products.store')->middleware('can:product-store');
        Route::get('/{id}/edit',[ProductController::class,'edit'])->name('products.edit')->middleware('can:product-edit');
        Route::post('/{id}/edit',[ProductController::class,'update'])->name('products.update')->middleware('can:product-update');
        Route::get('/{id}/delete',[ProductController::class,'delete'])->name('products.delete')->middleware('can:product-delete');
    });

    Route::prefix('categories')->group(function (){
        Route::get('/',[CategoryController::class,'index'])->name('categories.index')->middleware('can:categories-list');
        Route::get('/create',[CategoryController::class,'create'])->name('categories.create')->middleware('can:categories-create');
        Route::post('/create',[CategoryController::class,'store'])->name('categories.store')->middleware('can:categories-store');
        Route::get('/{id}/delete',[CategoryController::class,'delete'])->name('categories.delete')->middleware('can:categories-delete');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index')->middleware('can:users-list');
        Route::get('/create', [UserController::class, 'create'])->name('users.create')->middleware('can:users-create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store')->middleware('can:users-store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('can:users-edit');
        Route::post('/{id}/edit', [UserController::class, 'update'])->name('users.update')->middleware('can:users-update');
        Route::get('/{id}/delete', [UserController::class, 'delete'])->name('users.delete')->middleware('can:users-delete');
    });

    Route::prefix('bills')->group(function () {
        Route::get('/', [BillController::class, 'index'])->name('bills.index')->middleware('can:bills-list');
        Route::get('/{id}/edit', [BillController::class, 'edit'])->name('bills.edit')->middleware('can:bills-edit');
        Route::post('/{id}/edit', [BillController::class, 'update'])->name('bills.update')->middleware('can:bills-update');
        Route::get('/{id}/index', [BillController::class, 'showBill'])->name('billdetail.index')->middleware('can:bills-index');

    });


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');



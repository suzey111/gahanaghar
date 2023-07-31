<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;

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

route::get('/', [HomeController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});

route::get('/redirect', [HomeController::class, 'redirect']);

route::get('/view_category', [AdminController::class, 'view_category']);
route::post('/add_category', [AdminController::class, 'add_category']);
route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
route::get('/edit_category/{id}', [AdminController::class, 'edit_category']);
route::post('/update_category', [AdminController::class, 'update_category']);
route::get('/back', [AdminController::class, 'return_back'])->name('back');

route::get('/view_product', [AdminController::class, 'view_product']);
route::get('/add_product', [AdminController::class, 'add_product_page']);
route::post('/add_product', [AdminController::class, 'add_product']);
route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
route::get('/update_product/{id}', [AdminController::class, 'update_product']);
route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

route::get('/product_details/{id}', [HomeController::class, 'product_details']);

route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);
route::get('/show_cart', [HomeController::class, 'show_cart']);
route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);




//Orders

Route::get('/myorders', [OrderController::class, 'myorders'])->name('myorders');


Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::post('/order/{id}/update', [OrderController::class, 'update'])->name('order.update');
Route::get('/order/status/{id}/{status}', [OrderController::class, 'status'])->name('order.status');
Route::get('/order/{id}/details', [OrderController::class, 'details'])->name('order.details');


Route::get('/myorders/{id}/items', [OrderController::class, 'showorderitems'])->name('showorderitems');


Route::view('/admins', 'admin.admins')->name('admin.admins');

Route::post('/storeadmin', [AdminController::class, 'storeAdmin'])->name('admin.store');

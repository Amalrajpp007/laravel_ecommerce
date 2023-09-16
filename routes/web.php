<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/',[HomeController::class,'index']);
Route::get('/add_category',[AdminController::class,'addCategory']);
Route::post('/store_category',[AdminController::class,'storeCategory']);
Route::get('/delete_category/{id}',[AdminController::class,'deleteCategory']);
Route::get('/add_product',[AdminController::class,'addProduct']);
Route::post('/store_product',[AdminController::class,'storeProduct']);
Route::get('/view_product',[AdminController::class,'viewProduct']);
Route::get('/delete_product/{id}',[AdminController::class,'deleteProduct']);
Route::get('/edit_product/{id}',[AdminController::class,'editProduct']);
Route::post('/update_product/{id}',[AdminController::class,'updateProduct']);
Route::get('/view_product/{id}',[HomeController::class,'viewProduct']);
Route::get('/add_to_cart/{id}',[HomeController::class,'addToCart']);
Route::post('/store_cart_item/{id}',[HomeController::class,'storeCartItem']);
Route::get('/view_cart',[HomeController::class,'viewCartItems']);
Route::get('/remove_cart_item/{id}',[HomeController::class,'removeCartItems']);
Route::get('/order_cash',[HomeController::class,'ordercash']);
Route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);

Route::post('stripe/{totalprice}', [HomeController::class,'stripePost'])->name('stripe.post');
Route::get('/view_orders',[AdminController::class,'viewOrders']);
Route::get('/set_as_delivered/{id}',[AdminController::class,'setAsDelivered']);
Route::get('/print_pdf/{id}',[AdminController::class,'printPdf']);
Route::get('/send_email/{id}',[AdminController::class,'send_email']);
Route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']);
Route::get('/search_order',[AdminController::class,'search_order']);
Route::get('/view_order',[HomeController::class,'viewOrder']);
Route::get('/cancel/{id}',[HomeController::class,'cancel']);
Route::get('/search_products',[HomeController::class,'search_products']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


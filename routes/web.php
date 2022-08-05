<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\RazorpayPaymentController;
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



Route::middleware('auth')->group(function(){
Route::get('/dashbord', [AdminController::class ,'dashbord'])->name('dashbord');
});
Route::get('/admin_login', [AdminController::class, 'admin_login'])->name('admin_login');
Route::post('/admin_form', [AdminController::class, 'admin_authenticate'])->name('admin_authenticate');
Route::get('/signOut', [AdminController::class, 'signOut'])->name('signOut');

Route::get('/form', [AdminController::class , 'index'])->name('form');
Route::post('/save-form', [AdminController::class , 'create'])->name('save-form');
Route::get('/list', [AdminController::class , 'list'])->name('list');
Route::get('/newlist', [AdminController::class , 'newlist'])->name('newlist');



Route::get('/edit/{id}', [AdminController::class ,'edit'])->name('edit');
Route::post('/update/{categoryid}', [AdminController::class ,'update'])->name('update');
Route::get('/delete/{id}', [AdminController::class ,'destroy'])->name('delete');

Route::get('/add/{id}', [CategoryController::class , 'add'])->name('add');
Route::post('/add-form/{id}', [CategoryController::class ,'add_form'])->name('add-form');
Route::get('/product_list/{id}', [CategoryController::class , 'product_list'])->name('product_list');
Route::get('/delete_product_by_admin/{id}', [CategoryController::class ,'delete_product'])->name('delete_product_by_admin');
Route::get('/edit_product/{id}', [CategoryController::class ,'edit_product'])->name('edit_product');
Route::post('/product_update/{productid}', [CategoryController::class ,'product_update'])->name('product_update');

Route::get('/list_cart', [CartController::class , 'list_cart'])->name('list_cart');
Route::get('/clear/{client_id}', [CartController::class ,'clear'])->name('clear');

Route::get('/', [MainController::class ,'index'])->name('index');
Route::get('/blog', [MainController::class ,'blog'])->name('blog');
Route::get('/shop', [MainController::class ,'shop'])->name('shop');
Route::get('/shop_product/{id}', [MainController::class ,'shop_product'])->name('shop_product');
Route::post('/single_page', [MainController::class ,'single_page'])->name('single_page');

Route::get('/login', [MainController::class ,'login'])->name('login');
Route::get('/logout', [MainController::class ,'logout'])->name('logout');
Route::post('/login_form',[MainController::class,'authenticate'])->name('authenticate');

Route::get('/register', [MainController::class ,'register'])->name('register');
Route::post('/registration', [MainController::class ,'registration'])->name('registration');

Route::group(['middleware' => ['clients']], function () {

Route::post('/add_cart', [CartController::class ,'add_cart'])->name('add_cart');
Route::get('/cart', [CartController::class ,'cart'])->name('cart');
Route::get('/delete_product/{id}', [CartController::class ,'delete_product'])->name('delete_product');
});


Route::get('create-transaction', [PaymentController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PaymentController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PaymentController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PaymentController::class, 'cancelTransaction'])->name('cancelTransaction');



Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
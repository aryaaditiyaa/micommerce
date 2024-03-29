<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', [AuthController::class, 'viewLogin'])->name('viewLogin');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'viewRegister'])->name('viewRegister');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware' => ['auth', 'is_user']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/cart', CartController::class)->only('index', 'store', 'destroy');
    Route::patch('/cart/{cart}/{action}', [CartController::class, 'updateQuantity'])->name('updateQuantity');
    Route::post('checkout', [TransactionController::class, 'checkout'])->name('checkout');
    Route::get('my-transaction', [TransactionController::class, 'showCurrentUserTransactionHistories'])->name('my-transaction');
});

Route::group(['middleware' => ['auth', 'is_admin']], function () {
    Route::resource('/admin/product', ProductController::class);
    Route::resource('/admin/transaction', TransactionController::class)->only('index', 'show');

    Route::get('/admin/transaction-export', [TransactionController::class, 'export'])->name('transaction.export');
});




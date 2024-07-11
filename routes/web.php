<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CakeController;
use App\Http\Controllers\CustomerCakeContoller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerOrderContoller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;

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

// Guest Middleware
Route::middleware('guest')->group(function () {
    Route::get('/', [CustomerController::class, 'index']);
    Route::get('/login', [UserController::class, 'index'])->name('login');
    Route::post('/authenticate', [UserController::class, 'authenticate']);
    Route::get('/registration', [UserController::class, 'create']);
    Route::post('/registration/store', [UserController::class, 'store']);
});

// Auth Middleware
Route::middleware('auth')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
});

//Home Route
Route::middleware(['admin', 'auth'])->prefix('/home')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->middleware('auth');
});

//Cake Route
Route::middleware(['admin', 'auth'])->prefix('/cakes')->group(function () {
    Route::get('/', [CakeController::class, 'index']);
    Route::post('/store', [CakeController::class, 'store']);
    Route::get('/edit/{id}', [CakeController::class, 'edit']);
    Route::post('/update/{id}', [CakeController::class, 'update']);
    Route::post('/updateStatus/{id}', [CakeController::class, 'updateStatus']);
    Route::post('/storeImage', [CakeController::class, 'storeImage']);
    Route::delete('/destroy/{id}', [CakeController::class, 'destroy']);
});

//Orders Route
Route::middleware(['admin', 'auth'])->prefix('/orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::post('/show', [OrderController::class, 'show']);
    Route::post('/update/{id}', [OrderController::class, 'update']);
    Route::delete('/destroy/{id}', [OrderController::class, 'destroy']);
});

//Sales Route
Route::middleware(['admin', 'auth'])->prefix('/sales')->group(function () {
    Route::get('/', [SaleController::class, 'index']);
    Route::post('/show', [SaleController::class, 'show']);
});

//Users Route
Route::middleware(['admin', 'auth'])->prefix('/users')->group(function () {
    Route::get('/', [UserController::class, 'usersIndex']);
    Route::post('/updateAccessRule/{id}', [UserController::class, 'updateAccessRule']);
    Route::post('/updateStatus/{id}', [UserController::class, 'updateStatus']);
});

//Customer Cakes Route
Route::middleware(['customer', 'auth'])->prefix('/customer/cakes')->group(function () {
    Route::get('/', [CustomerCakeContoller::class, 'index'])->name('cusCakes');
    Route::get('/search', [CustomerCakeContoller::class, 'search'])->name('cusSearch');
});

//Customer Order Route
Route::middleware(['customer', 'auth'])->prefix('/customer/orders')->group(function () {
    Route::get('/', [CustomerOrderContoller::class, 'index']);
    Route::post('/store', [CustomerOrderContoller::class, 'store']);
    Route::get('/edit/{id}', [CustomerOrderContoller::class, 'edit']);
    Route::post('/update/{id}', [CustomerOrderContoller::class, 'update']);
    Route::delete('/destroy/{id}', [CustomerOrderContoller::class, 'destroy']);
});

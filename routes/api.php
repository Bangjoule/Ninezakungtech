<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//public route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

//GET Router (Buat liatin data yang udah masuk)
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/{id}', [AdminController::class, 'show']);
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::get('/details', [DetailsController::class, 'index']);
Route::get('/details/{id}', [DetailsController::class, 'show']);
Route::get('/list', [ListController::class, 'index']);
Route::get('/list/{id}', [ListController::class, 'show']);
Route::get('/order', [OrderController::class, 'index']);
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::get('/payment', [PaymentController::class, 'index']);
Route::get('/payment/{id}', [PaymentController::class, 'show']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/{id}', [ProfileController::class, 'show']);



//POST Router (Buat masukin data baru)
Route::post('/admin', [AdminController::class, 'store']); 
Route::post('/category', [CategoryController::class, 'store']);
Route::post('/details', [DetailsController::class, 'store']);
Route::post('/list', [ListController::class, 'store']);
Route::post('/order', [OrderController::class, 'store']);
Route::post('/payment', [PaymentController::class, 'store']);
Route::post('/product', [ProductController::class, 'store']);
Route::post('/profile', [ProfileController::class, 'store']);



//PUT Router (Buat edit data yang dimasukin)
Route::put('/admin/{id}', [AdminController::class,'update']);
Route::put('/category/{id}', [CategoryController::class,'update']);
Route::put('/details/{id}', [DetailsController::class,'update']);
Route::put('/list/{id}', [ListController::class,'update']);
Route::put('/order/{id}', [OrderController::class,'update']);
Route::put('/payment/{id}', [PaymentController::class,'update']);
Route::put('/product/{id}', [ProductController::class,'update']);
Route::put('/profile/{id}', [ProfileController::class,'update']);



//DESTROY Router (Buat hapusin data)
Route::delete('/admin/{id}', [AdminController::class,'destroy']);
Route::delete('/category/{id}', [CategoryController::class,'destroy']);
Route::delete('/details/{id}', [DetailsController::class,'destroy']);
Route::delete('/list/{id}', [ListController::class,'destroy']);
Route::delete('/order/{id}', [OrderController::class,'destroy']);
Route::delete('/payment/{id}', [PaymentController::class,'destroy']);
Route::delete('/product/{id}', [ProductController::class,'destroy']);
Route::delete('/profile/{id}', [ProfileController::class, 'destroy']);











//protected route
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('admin', AdminController::class)->except('create', 'edit', 'show', 'index');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('product', ProductController::class)->except('create', 'edit', 'show', 'index');
});
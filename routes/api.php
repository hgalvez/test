<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::prefix('admin')->group(function () {

// });

Route::group(['prefix' => 'auth'],function (){
    Route::post('login',[AuthController::class, 'login']);
});

Route::group([ 'middleware' => 'auth:api' ],function(){

    Route::get('auth/logout',[AuthController::class, 'logout']);

    Route::get('/users', [UserController::class, 'index'])->middleware(['can:show user']);
    Route::get('/users/{id}', [UserController::class, 'show'])->middleware(['can:show user']);
    Route::post('/users', [UserController::class, 'store'])->middleware(['can:add user']);
    Route::put('/users/{id}', [UserController::class, 'update'])->middleware(['can:edit user']);
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware(['can:delete user']);
    Route::put('/users/{id}/restore', [UserController::class, 'restore'])->middleware(['can:edit user']); 

    Route::get('/vendors', [VendorController::class, 'index'])->middleware(['can:show vendor']);
    Route::get('/vendors/{id}', [VendorController::class, 'show'])->middleware(['can:show vendor']);
    Route::post('/vendors', [VendorController::class, 'store'])->middleware(['can:add vendor']);
    Route::put('/vendors/{id}', [VendorController::class, 'update'])->middleware(['can:edit vendor']);
    Route::delete('/vendors/{id}', [VendorController::class, 'destroy'])->middleware(['can:delete vendor']);
    Route::put('/vendors/{id}/restore', [VendorController::class, 'restore'])->middleware(['can:edit vendor']);

    Route::get('/products', [ProductController::class, 'index'])->middleware(['can:show product']);
    Route::get('/products/{id}', [ProductController::class, 'show'])->middleware(['can:show product']);
    Route::post('/products', [ProductController::class, 'store'])->middleware(['can:add product']);
    Route::put('/products/{id}', [ProductController::class, 'update'])->middleware(['can:edit product']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->middleware(['can:delete product']);
    Route::put('/products/{id}/restore', [ProductController::class, 'restore'])->middleware(['can:edit product']);
});

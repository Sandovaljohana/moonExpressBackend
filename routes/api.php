<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProviderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ServiceController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/products', 'index');
});

Route::controller(ProviderController::class)->group(function(){
    Route::get('/providers', 'index');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/users', 'index'); 
    Route::post('/users', [UserController::class, 'store']); 
    Route::get('/users/{id}', [UserController::class, 'show']);  
    Route::put('/users/{id}', [UserController::class, 'update']);
});

Route::controller(ServiceController::class)->group(function(){
    Route::get('/services', 'index');
});
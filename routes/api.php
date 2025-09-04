<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('/products', ProductController::class);

Route::apiResource('/categories', CategoryController::class);

Route::get('/location', [LocationController::class, 'index']);
Route::post('/location/create', [LocationController::class, 'store']);
Route::get('/location/{id}', [LocationController::class, 'show']);
Route::post('/location/{id}', [LocationController::class, 'update']);
Route::delete('/location/{id}', [LocationController::class, 'destroy']);
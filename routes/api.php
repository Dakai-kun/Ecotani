<?php

use App\Http\Controllers\Api\CitizenScienceController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\UserPrefrenceController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products/create', [ProductController::class, 'store']);
Route::get('/products/show/{id}', [ProductController::class, 'show']);
Route::post('/products/update/{id}', [ProductController::class, 'update']);
Route::delete('/products/delete/{id}', [ProductController::class, 'destroy']);

Route::apiResource('/categories', CategoryController::class);

Route::get('/location', [LocationController::class, 'index']);
Route::post('/location/create', [LocationController::class, 'store']);
Route::get('/location/{id}', [LocationController::class, 'show']);
Route::post('/location/{id}', [LocationController::class, 'update']);
Route::delete('/location/{id}', [LocationController::class, 'destroy']);

Route::get('/preference', [UserPrefrenceController::class, 'store']);
Route::post('/recommend/{id}', [UserPrefrenceController::class, 'recommend']);

Route::post('/review/create/{id}', [ReviewController::class, 'store']);

Route::post('/citizen_science',[CitizenScienceController::class, 'store']);
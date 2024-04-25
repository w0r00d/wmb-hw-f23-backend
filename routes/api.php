<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ArtistController;
use App\Http\Controllers\Api\SongController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\OrderController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->post('/artists', [ArtistController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('customers',CustomerController::class );

Route::post('/songs', [SongController::class, 'store']);
Route::get('/songs', [SongController::class, 'index']);
Route::get('/artists', [ArtistController::class, 'index']);
Route::post('/artists', [ArtistController::class, 'store']);
Route::post('/invoice', [InvoiceController::class, 'store']);
Route::get('/invoice', [InvoiceController::class, 'index']);
Route::get('/order', [OrderController::class, 'index']);
Route::post('/order', [OrderController::class, 'store']);
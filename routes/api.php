<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ExternalResourcesController;


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

//public routes
Route::get('/v1/books/{id}', [BookController::class, 'show']);
Route::patch('/v1/books/{id}', [BookController::class, 'update']);
Route::delete('/v1/books/{id}', [BookController::class, 'destroy']);
Route::post('/v1/books/{id}/delete', [BookController::class, 'destroy']);
Route::post('/v1/books', [BookController::class, 'store']);
Route::get('/v1/books', [BookController::class, 'index']);

Route::get('/external-books', [ExternalResourcesController::class, 'externalBooksSearch']);




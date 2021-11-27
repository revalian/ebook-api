<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['auth:sanctum']], function (){

        // Route User dan Logout
        Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
        Route::post('/me', [App\Http\Controllers\AuthController::class, 'me']);

        // Routes Books
        Route::get('books',[App\Http\Controllers\BookController::class, 'index']);
        Route::post('books',[App\Http\Controllers\BookController::class, 'store']);
        Route::get('books/{id}',[App\Http\Controllers\BookController::class, 'show']);
        Route::put('books/{id}',[App\Http\Controllers\BookController::class, 'update']);
        Route::delete('books/{id}',[App\Http\Controllers\BookController::class, 'destroy']);

        // Routes Authors
        Route::get('authors',[App\Http\Controllers\AuthorController::class, 'index']);
        Route::post('authors',[App\Http\Controllers\AuthorController::class, 'store']);
        Route::get('authors/{id}',[App\Http\Controllers\AuthorController::class, 'show']);
        Route::put('authors/{id}',[App\Http\Controllers\AuthorController::class, 'update']);
        Route::delete('authors/{id}',[App\Http\Controllers\AuthorController::class, 'destroy']);
});

// Routes Auth Baru
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
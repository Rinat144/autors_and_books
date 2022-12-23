<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthorController::class)->prefix('author')->group(function () {
    Route::get('/all', 'allAuthors');
    Route::get('/one/{id}', 'oneAuthor');
    Route::patch('/update/{id}', 'updateAuthor');
    Route::post('/store', 'storeAuthor');
    Route::delete('/destroy/{id}', 'destroyAuthor');
    Route::get('/with_books/{id}', 'authorWithBooks');
    Route::get('/count_books', 'countBooksAuthor');
});

Route::controller(BookController::class)->prefix('book')->group(function () {
    Route::get('/all', 'allBooks');
    Route::get('/one/{id}', 'oneBook');
    Route::patch('/update/{id}', 'updateBook');
    Route::post('/store', 'storeBook');
    Route::delete('/destroy/{id}', 'destroyBook');
});


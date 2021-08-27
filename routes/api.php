<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RentController;

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


Route::get('/books', [BooksController::class, 'index']);

Route::post('/addbooks', [BooksController::class, 'addBook']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/students', [AuthController::class, 'index']);

Route::get('/authors', [AuthorController::class, 'index']);

Route::post('/addauthor', [AuthorController::class, 'addAuthor']);

Route::post('/deleteauthor', [AuthorController::class, 'deleteAuthor']);

Route::get('/rents', [RentController::class, 'index']);

Route::post('/addrents', [RentController::class, 'addRent']);

Route::get('/isrents', [RentController::class, 'isRent']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


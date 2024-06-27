<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
// use App\Http\Controllers\ReturnBookController;



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
Route::get('/generate-report', [BookController::class, 'generateReport']);
Route::post('/borrow-book', [BookController::class, 'borrowBook']);
Route::post('/return-book', [BookController::class, 'returnBook']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

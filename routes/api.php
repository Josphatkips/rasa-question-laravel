<?php

use App\Http\Controllers\ApiController;
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
Route::post('/categories',[ApiController::class,'categories']);
Route::get('/categories/{id}',[ApiController::class,'getQuestions']);
Route::get('/question/{id}',[ApiController::class,'getAnswer']);
Route::post('/question/{id}',[ApiController::class,'getAnswer']);
Route::post('/query',[ApiController::class,'getQuery']);
// Get all categories
// get all questions based on categories
//  get answer based on question Id

// Pick a question and get answer.

// use BUSD


// 1. Use contract to transfer BUSD to our address
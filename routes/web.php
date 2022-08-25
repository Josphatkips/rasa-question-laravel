<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/client/dashboard');
});
Route::get('/chatbot', function () {
    return view('chatbot.index');
});

Route::get('/blank',[ClientController::class,'blank']);
Route::get('/dashboard',[ClientController::class,'blank']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboards', function () {
        return redirect('/client/dashboard');
    })->name('dashboard');
});

Route::group(['prefix'=>'client','middleware' => ['verified']],function () {
    Route::get('categories',[ClientController::class,'categories']);
    Route::get('questions',[ClientController::class,'questions']);
    Route::get('dashboard',[ClientController::class,'dashboard']);
});
// Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
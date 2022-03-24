<?php

use App\Http\Controllers\AuthController;
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

Route::group(['middleware' => 'auth'],function(){
    Route::inertia('/','App');
});


Route::post('/login',[AuthController::class,'login'])->name('login');
Route::inertia('/login', 'Auth/Login');

Route::inertia('/home','App')->name('home');

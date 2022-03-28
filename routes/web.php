<?php

use App\Http\Controllers\Auth\LoginController;
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
    Route::inertia('/','Dashboard');
    Route::inertia('/dashboard','Dashboard')->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::post('/register',[AuthController::class,'register'])->name('register');
Route::inertia('/register', 'Auth/Register');//->middleware('guest');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::inertia('/login', 'Auth/Login')->middleware('guest');


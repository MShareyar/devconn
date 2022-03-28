<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Front\AuthController as FrontAuthController;
use App\Http\Controllers\Front\HomeController;
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

Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'auth'], function () {
        Route::inertia('/dashboard', 'Dashboard')->name('admin.dashboard');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });

    Route::group(['middleware' => 'guest'], function () {
        Route::inertia('/login', 'Auth/Login');
    });
});

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::inertia('/register', 'Auth/Register')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::group([], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::inertia('/', 'Front/Landing')->name('landing');
        Route::inertia('/login', 'Front/Auth/Login')->name('front.login');
        Route::inertia('/register', 'Front/Auth/Register')->name('front.register');
        
        Route::post('/login', [FrontAuthController::class, 'login'])->name('front.login');
    });
    
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard', [HomeController::class,'dashboard'])->name('front.dashboard');

        Route::inertia('/eduction/add', 'Front/Education/Create')->name('education.create');
        Route::inertia('/experience/add', 'Front/Experience/Create')->name('experience.create');
        Route::inertia('/posts', 'Front/Posts/Index')->name('posts.index');
        Route::inertia('/post', 'Front/Posts/View')->name('posts.show');
        Route::inertia('/profiles', 'Front/Profile/Index')->name('profiles.index');
        Route::inertia('/profile', 'Front/Profile/View')->name('profiles.show');
    });

});

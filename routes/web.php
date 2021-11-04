<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialAuthentication\GoogleController;
use App\Http\Controllers\SocialAuthentication\FacebookController;
use App\Http\Controllers\SocialAuthentication\LinkedinController;
use App\Http\Controllers\Course\CategoryController;
use App\Http\Controllers\HomeController ;
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


    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home') ;
    Route::get('/user/profile', 'App\Http\Controllers\Profile\ProfileController@index')->name('profile') ;

    Route::post('/sign-up', [\App\Http\Controllers\Auth\AuthController::class, 'signUp']);
    Route::post('/sign-in', [\App\Http\Controllers\Auth\AuthController::class, 'signIn']);
    Route::get('/sign-out', [\App\Http\Controllers\Auth\AuthController::class, 'signOut'])->name('signout');

    Route::get('/redirect/google', [GoogleController::class, 'redirect'])->name('redirect.google');
    Route::get('/callback/google', [GoogleController::class, 'callback'])->name('callback.google');;

    Route::get('redirect/facebook', [FacebookController::class, 'redirect'])->name('redirect.facebook');
    Route::get('callback/facebook', [FacebookController::class, 'callback'])->name('callback.facebook');;

    Route::get('/redirect/linkedin', [LinkedinController::class, 'redirect'])->name('redirect.linkedin');
    Route::get('/callback/linkedin', [LinkedinController::class, 'callback'])->name('callback.linkedin');

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

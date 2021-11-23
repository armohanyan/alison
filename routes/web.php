<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialAuthentication\GoogleController;
use App\Http\Controllers\SocialAuthentication\FacebookController;
use App\Http\Controllers\SocialAuthentication\LinkedinController;
use App\Http\Controllers\Course\CategoryController;
use App\Http\Controllers\Course\RatingController;
use App\Http\Controllers\Course\CourseController;
use App\Http\Controllers\HomeController ;
use \App\Http\Controllers\Auth\AuthController;
use \App\Http\Controllers\ChatController;
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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home') ;

Route::post('/sign-up', [AuthController::class, 'signUp'])->name('sign-up');
Route::post('/sign-in', [AuthController::class, 'signIn'])->name('sign-in');;
Route::get('/sign-out', [AuthController::class, 'signOut'])->name('signout');

Route::get('/redirect/google', [GoogleController::class, 'redirect'])->name('redirect.google');
Route::get('/callback/google', [GoogleController::class, 'callback'])->name('callback.google');;

Route::get('redirect/facebook', [FacebookController::class, 'redirect'])->name('redirect.facebook');
Route::get('callback/facebook', [FacebookController::class, 'callback'])->name('callback.facebook');;

Route::get('/redirect/linkedin', [LinkedinController::class, 'redirect'])->name('redirect.linkedin');
Route::get('/callback/linkedin', [LinkedinController::class, 'callback'])->name('callback.linkedin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/get/user', [AuthController::class, 'checkUserAuth'] )->name('get.user');
Route::get('/show/{id}', [CourseController::class, 'show'] )->name('show.course');
Route::get('/course/rate', [RatingController::class, 'rateCourse'] )->name('rate.course');


Route::post('message', [ChatController::class, 'storeMessage'] )->name('store.message');
Route::get('/messages', [ChatController::class, 'getMessages'] )->name('get.message');
Route::get('get/authuser', [ChatController::class, 'getAuthUser'] )->name('get.authuaer');

Route::get('{name}/courses', [CategoryController::class, 'index'] )->name('category.index');
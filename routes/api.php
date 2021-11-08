<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\AuthController;
use \App\Http\Controllers\Course\CategoryController;
use \App\Http\Controllers\Course\CourseTypeController;

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

Route::get('/get/categories', [CategoryController::class, 'categories'] )->name('get.categories');
Route::get('/get/course-types', [CourseTypeController::class, 'courseTypes'] )->name('get.courseTypes');


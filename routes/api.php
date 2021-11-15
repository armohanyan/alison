<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\AuthController;
use \App\Http\Controllers\Course\CategoryController;
use \App\Http\Controllers\Course\CourseTypeController;
use \App\Http\Controllers\Course\CourseController;
use \App\Http\Controllers\Course\RatingController;

/*
|--------------------------------------------------------------------------
| API Routes
|---------------------------------------------------

*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get/categories', [CategoryController::class, 'categories'] )->name('get.categories');
Route::get('/get/course-types', [CourseTypeController::class, 'courseTypes'] )->name('get.courseTypes');
Route::get('/get/courses', [CourseController::class, 'getCourses'] )->name('courses');
Route::get('/get/most-popular/courses', [CourseController::class, 'getMostPopularCourses'] )->name('mostpopularcourses');
Route::get('/get/statics', [RatingController::class, 'getStatics'] )->name('get.statics');
Route::get('/get/testimonials', [RatingController::class, 'getTestimonials'] )->name('get.testimonial');


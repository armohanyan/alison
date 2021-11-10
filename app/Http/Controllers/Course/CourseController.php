<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use http\Env\Request;

//use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function getCourses() {

        $courses = Course::with('Category', 'CourseType')->get();

        return response()->json([
            'courses'  => $courses
        ], 200);

    }

    public function getMostPopularCourses() {

//        $mostPopularCourses = Course::with('Category', 'CourseType')->o   rderBy("name")->get();
        $mostPopularCourses = Course::orderBy("publisher", 'asc')->get();
        return response()->json([
            'mostPopularCourses'  => $mostPopularCourses
        ], 200);

    }

    public function show($id){
        $course = Course::find($id);
        return view('courses.index')->with([
            'course' => $course,
        ]);
    }




















}

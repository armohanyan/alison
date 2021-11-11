<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
//use http\Env\Request;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function getCourses() {

        $courses = Course::with('Category', 'CourseType')->get();

        return response()->json([
            'courses'  => $courses
        ], 200);

    }

    public function getMostPopularCourses() {

        $mostPopularCourses = Course::with('Category', 'CourseType')->get();

        return response()->json([
            'mostPopularCourses'  => $mostPopularCourses
        ], 200);

    }

    public function show($id){
        $course = Course::find($id);

        return view(    'courses.index')->with([
            'course' => $course,
        ]);
    }

}

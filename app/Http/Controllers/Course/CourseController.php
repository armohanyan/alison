<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function getCourses() {
        $courses = Course::all();
        return response()->json([
            'courses'  => $courses
        ]);
    }
}

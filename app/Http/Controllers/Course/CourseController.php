<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseType;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function getCourses() {
        $courses = Course::with('Category', 'CourseType')->get();
        return response()->json([
            'courses'  => $courses
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Course;
use App\Models\CourseType;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $categories = Catagory::limit(9)->get();
        $courses = Course::all();
        $courses_types = CourseType::all();

        return view('home.index')->with([
            'categories' => $categories,
            'courses' => $courses,
            'course_types' => $courses_types,
        ]);

    }

}

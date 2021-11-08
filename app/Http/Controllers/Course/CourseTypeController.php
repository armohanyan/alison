<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\CourseType;
use Illuminate\Http\Request;

class CourseTypeController extends Controller
{
    public function courseTypes() {

        $courseTypes = CourseType::all();
        return response()->json([
            'success' => true,
            'courseTypes' => $courseTypes,
        ]) ;
    }
}

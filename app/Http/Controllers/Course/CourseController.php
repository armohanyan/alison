<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
//use http\Env\Request;
use App\Models\TotalRating;
use Illuminate\Support\Collection ;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function getCourses() {

        $courses = Course::with('Category', 'CourseType')
            ->get();

        return response()->json([
            'courses'  => $courses
        ], 200);

    }

    public function getMostPopularCourses() {

        $coursesTotalRating = TotalRating::with('Course')
            ->orderByDesc('arithmetic_average', 'desc')
            ->get();

        $arr = collect([]);

        for ( $i = 0; $i < $coursesTotalRating->count() ; $i++){
            $collection = collect($coursesTotalRating[$i]['course'])->merge([
                 $coursesTotalRating[$i]['course']->category
        ]);
            $arr->push($collection);
        }


        return response()->json([
            'mostPopularCourses'  => $arr,
        ], 200);

    }

    public function show($id){

        $course = Course::find($id);

        return view(    'courses.index')->with([
            'course' => $course,
        ]);
    }

}

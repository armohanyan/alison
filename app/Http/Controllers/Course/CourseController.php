<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CourseType;
use App\Models\Course;
use App\Models\TotalRating;
use Illuminate\Support\Collection ;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    // Show a course. 

    public function show($id){

        $course = Course::find($id);

        if( ! $course ){
            return redirect()->back();
        };

        return view('courses.index')->with([
            'course' => $course,
        ]);
    }

    // Get all  courses.

    public function getCourses() {

        $courses = Course::with('Category', 'CourseType')
            ->get();

        return response()->json([
            'courses'  => $courses
        ], 200);

    }

    // Get most popular courses for filtering.
    // Get courses, their category and course type, collect that and push into a new array.

    public function getMostPopularCourses() {

        $coursesTotalRating = TotalRating::with('Course')
            ->orderByDesc('arithmetic_average', 'desc')
            ->get();

        $mostPopularCourses = collect([]);

        foreach( $coursesTotalRating as $courseTotalRating ){
            $currentCourseCategory = $courseTotalRating['course']->category;
            $currentCourseCourseType = $courseTotalRating['course']->courseType;
            $currentCourse = collect($courseTotalRating['course']);
            $mostPopularCourses->push($currentCourse);  
        }

        return response()->json([
            'courses'  => $mostPopularCourses,
        ], 200);

    }


    // Get Course by Course Category

    public function getCategoryCourses($categoryId){
        
        $course = new Course;
        $categoryCourses = Category::with('courses')->where('id', $categoryId)->first(); 

        if( ! $categoryCourses){   
            return redirect()->back();     
        }
        $courses = $course->getCoursesCategoryOrType($categoryCourses);
        
        return response()->json([
            'courses'  => $categoryCourses->courses
        ], 200);
    }

    // Get Course by Course Type

    public function getCourseTypeCourses($courseTypeId){

        $course = new Course;
        $courseTypeCourses = CourseType::with('courses')->where('id', $courseTypeId)->first(); 

        if( ! $courseTypeCourses){   
            return redirect()->back();     
        }
        
        $courses = $course->getCoursesCategoryOrType($courseTypeCourses);
        
        return response()->json([
            'courses' => $courses,
        ], 200);
    }
}

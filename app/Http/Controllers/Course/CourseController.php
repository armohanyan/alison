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
            ->limit(5)
            ->get();

        return response()->json([
            'courses'  => $courses
        ], 200);

    }

    // Get most popular courses for filtering.
    // Get courses, their category and course type, collect that and push into a new array.

    public function getMostPopularCourses() {
        $course = new Course;
        $courses = $course->getMostPopularCourses(0);

        return response()->json([
            'courses'  => $courses
        ], 200);

    }

    // Get Course by Course Category

    public function getCategoryCourses($categoryId){
        $course = new Course;
        $courses = $course->getCoursesCategoryOrType('category', $categoryId );

        return response()->json([
            'courses'  => $courses
        ], 200);
    }

    // Get Course by Course Type

    public function getCourseTypeCourses($courseTypeId){

        $course = new Course;
        $courses = $course->getCoursesCategoryOrType('course-type', $courseTypeId, 0);

        return response()->json([
            'courses' => $courses,
        ], 200);
    }

    public function loadMoreCourses(Request $request){
        $course = new Course();

        if($request->currentCourseType == 'mostPopluar' ){

            $courses = $course->getMostPopularCourses();
        }
        else if( $request->currentCourseType == 'coursesByCategory'){

            $courses = $course->getCoursesCategoryOrType('category', $request->categoryOrCourseId );
        }
        else if($request->currentCourseType == 'coursesByType'){

            $courses = $course->getCoursesCategoryOrType('course-type', $request->categoryOrCourseId );
        }
        else {
    
            $courses = Course::with('Category', 'CourseType')
                ->get();
        }

        $dbLastCourseId = $courses->last()['id']; 

        return response()->json([
            'moreCourses'  => $courses,
            'dbLastCourseId' => $dbLastCourseId,
        ], 200);
    }
}

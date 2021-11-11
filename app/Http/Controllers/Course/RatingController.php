<?php

namespace App\Http\Controllers\Course;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    public function rateCourse (Request $request ) {

        $user_id = Auth::user()->id;
        $course = Course::find($request->course_id);
        $course_id = $request->course_id;
        $rate = $request->course_rate;
        $review = $request->review;

        $course->rating()->create([
            'review' => $review,
            'rating' => $rate,
            'user_id' => $user_id,
        ]);

        $coursetotalAmount = Rating::where('rateable_id', $course_id)->sum('rating');;
        $courseTotalCount = Rating::where('rateable_id', $course_id)->count();
        $courseArithmeticAverage = $coursetotalAmount / $courseTotalCount ;

        if ( ! $course->totalRating()->count() ){
            $course->totalRating()->create([
                'total_amount' => $coursetotalAmount,
                'total_count' => $courseTotalCount,
                'arithmetic_average' => $courseArithmeticAverage,
            ]);
        }

        $course->totalRating()->update([
            'total_amount' => $coursetotalAmount,
            'total_count' => $courseTotalCount,
            'arithmetic_average' => $courseArithmeticAverage,
        ]);


        return response()->json([
            'success' => true,
        ]);
    }
}

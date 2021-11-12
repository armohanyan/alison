<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_is',
        'total_amount',
        'total_count',
        'arithmetic_average',
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function courseType(){
        return $this->belongsTo(CourseType::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }


}

<?php

namespace App\Models;
use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Database\Factories\CoursesFactory;

class Course extends Model
{
    use HasFactory;
    use Rateable;
    protected $fillable = [
        'name',
        'title',
        'category_id',
        'course_type',
        'description',
    ];

    protected static function newFactory()
    {
        return CoursesFactory::new();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function courseType(){
        return $this->belongsTo(CourseType::class);
    }

    public function rating(){
        return $this->morphMany(Rating::class, 'rateable');
    }

    public function totalRating(){
        return $this->hasOne(TotalRating::class);
    }

    public function getArithmeticAverage(){
        return TotalRating::where('course_id', $this->id)->pluck('arithmetic_average')->first();
     }

}

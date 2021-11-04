<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Database\Factories\CoursesFactory;

class Course extends Model
{
    use HasFactory;

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

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Database\Factories\CoursesFactory;

class Course extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return CoursesFactory::new();
    }

}

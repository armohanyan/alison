<?php

namespace App\Models;
use Database\Factories\CoursesFactory;
use Database\Factories\TestimonalFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonal extends Model
{
    use HasFactory;

        protected $fillable = [
        'body',
        'author_img'
        ];

    protected static function newFactory()
    {
        return TestimonalFactory::new();
    }
}

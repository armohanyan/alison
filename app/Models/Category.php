<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title'.
        'description',
    ];

    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    public function courses()
    {
       return $this->hasMany(Course::class,);
    }

}

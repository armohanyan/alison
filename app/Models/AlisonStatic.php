<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlisonStatic extends Model
{
    use HasFactory;

    protected $fillable = [
        'learners_quantity',
        'graduates_quantity',
        'courses_quantity',
        'countries_quantity',
    ];

}

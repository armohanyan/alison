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
}

<?php

namespace Database\Seeders;

use App\Models\Testimonal;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CourseType;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder

// 010550601 02 

// 01288080830

// 2011 2013
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       Category::class::factory(10)->create();

       CourseType::class::factory(2)->create();

       Course::class::factory(20)->create();

       Testimonal::class::factory(4)->create();


    }
}

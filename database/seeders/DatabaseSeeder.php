<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catagory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        Catagory::factory(10)->create();
          \App\Models\Course::class::factory(10)->create();
    }
}

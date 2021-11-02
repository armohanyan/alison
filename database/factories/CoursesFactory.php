<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */


    protected $model = Course::class;

    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(35),
            'publisher' => $this->faker->name(),
            'img'  => 'default.png'
        ];
    }
}

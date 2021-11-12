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
            'category_id' => $this->faker->numberBetween(1,10),
            'course_type_id' => $this->faker->numberBetween(1,2),
            'total_rating_id' => $this->faker->numberBetween(1,20),
            'title' => $this->faker->name(),
            'description' => $this->faker->text(),
            'publisher' => $this->faker->name(),
            'img'  => 'default.png',
        ];
    }
}

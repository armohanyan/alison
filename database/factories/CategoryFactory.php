<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Catagory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{

    protected $model = Catagory::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'title' => $this->faker->title(),
            'descripton' => $this->faker->text(35),
        ];
    }
}

<?php

namespace Database\Factories;
use App\Models\Testimonal;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model =  Testimonal::class ;

    public function definition()
    {
        return [
            'body' => $this->faker->text(20),
            'author_img' =>  'default.png',
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_students' => mt_rand(1,5),
            'date' => $this->faker->date(),
            'lessons' => "English"
        ];
    }
}

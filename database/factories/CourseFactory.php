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
            'id_students' => 1,
            'date' => $this->faker->dateTime(),
            'lessons' => "English"
        ];
    }
}

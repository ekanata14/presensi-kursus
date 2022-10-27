<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'grade' => "XII",
            'school' => "Senior High School",
            'origin' => "Denpasar",
            'status' => true,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}

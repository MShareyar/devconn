<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'school' => $this->faker->text(25),
            'degree' => $this->faker->company(),
            'field_of_study' => $this->faker->realText(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'is_currently_active' => rand(0, 1),
            'description' => $this->faker->text()
        ];
    }
}

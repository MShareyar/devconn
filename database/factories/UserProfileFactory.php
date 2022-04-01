<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'professional_status' => $this->faker->randomElement([1,2,3,4,5,6]),
            'company'   => $this->faker->company(),
            'website'   => $this->faker->url(),
            'location'  => $this->faker->address(),
            'skills'    => str_replace(' ',',',$this->faker->text(50)),
            'short_bio' => $this->faker->text(200),
        ];
    }
}

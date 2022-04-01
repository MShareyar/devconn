<?php

namespace Database\Factories;

use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->randomElement(((new UserProfile())->professionalStatuses)),
            'company' => $this->faker->company(),
            'location' => $this->faker->address(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'is_currently_active' => rand(0, 1),
            'description'=> $this->faker->text()
        ];
    }
}

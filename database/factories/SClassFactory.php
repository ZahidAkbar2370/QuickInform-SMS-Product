<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SClass>
 */
class SClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $medicumName = ["urdu", "english"];

        return [
            "class_name" => $this->faker->numberBetween(9,12),
            "medium" => $this->faker->randomElement($medicumName),
        ];
    }
}
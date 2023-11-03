<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => $this->faker->numberBetween(1,10),
            "class_id" => $this->faker->numberBetween(1,10),
            "father_name" => $this->faker->firstName(),
            "father_mobile_number" => $this->faker->phoneNumber(),
            "student_mobile_number" => $this->faker->phoneNumber(),
            "fee_type" => "monthly",
            "fee_amount" => $this->faker->numberBetween(1000,2000),
            "status" => "active",
            "optional_note" => $this->faker->paragraph(),
        ];
    }
}

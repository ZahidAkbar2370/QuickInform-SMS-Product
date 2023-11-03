<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MarkSheet>
 */
class MarkSheetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $testName = ["daily", "monthly", "weakly"];

        return [
            "test_name" => $this->faker->randomElement($testName),
            "student_id" => $this->faker->numberBetween(1,10),
            "class_id" => $this->faker->numberBetween(1,7),
            "subject_id" => $this->faker->numberBetween(1,10),
            "totle_marks" => "100",
            "obtained_marks" => $this->faker->numberBetween(40,100),
            "percentage" => $this->faker->numberBetween(60,100),
            "optional_note"  => $this->faker->paragraph(),
        ];
    }
}

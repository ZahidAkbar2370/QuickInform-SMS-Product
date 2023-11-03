<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjectName = ["urdu", "english", "math", "computer", "chemistry", "physics"];

        return [
            "class_id" => $this->faker->numberBetween(1,7),
            "subject_name" => $this->faker->randomElement($subjectName),
        ];
    }
}

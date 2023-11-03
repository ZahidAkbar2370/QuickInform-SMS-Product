<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MessageList>
 */
class MessageListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "student_id" => $this->faker->numberBetween(1,10),
            "sender_device" => "923081312527",
            "recevier_number" => $this->faker->phoneNumber(),
            "message_to" => "students",
            "message_gateway" => "whatsapp",
            "message_type" => "text",
            "message" => $this->faker->paragraph(),
            "media_url" => '',
            "message_send_by" => "super_admin",
            "status" => "sent",
        ];
    }
}

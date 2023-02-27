<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TicketStatus;
use App\Models\USer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statusNames = TicketStatus::pluck('name');
        $users = User::pluck('name');
        return [
            'summary' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement($statusNames),
            'assigned_to' => $this->faker->randomElement($users),
        ];
    }
}

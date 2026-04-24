<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChatLog>
 */
class ChatLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'username' => fake()->userName(), // Fallback if created in isolation
            'message' => fake()->sentence(),
        ];
    }

    // Add this helper method
    public function synced(): static
    {
        return $this->state(fn (array $attributes, User $user) => [
            'username' => $user->name,
        ]);
    }
}

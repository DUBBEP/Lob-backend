<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlayerRecord>
 */
class PlayerRecordFactory extends Factory
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
            'score' => fake()->randomFloat(2, 0, 80),
            'username' => fake()->userName(), // Fallback if created in isolation
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

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->sentence(3),
            'body' => $this->faker->paragraph(),
            'is_published' => true,
            'sent_at' => $this->faker->dateTimeBetween('now','+10 days'),
            'recipient' => User::all()->random()->email,
            'hearts_count' => $this->faker->numberBetween(0,20),
        ];
    }
}

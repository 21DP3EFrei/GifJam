<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Music>
 */
class MusicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Garums' => fake()->randomDigitNot(0),
            'Izlaists' => fake()->date('Y-m-d',  'now'),
            'Bitrate' => fake()->randomDigitNot(0),
        ];
    }
}

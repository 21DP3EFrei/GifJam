<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enum\MultividesTips;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nosaukums' => fake()->text(50),
            'Apraksts' => fake()->text( 50),
            'Fails' => fake()->text( 50),
            'Multivides_tips' => fake()->randomElement(array_column(MultividesTips::cases(), 'value')),
            'Autors' => fake()->text(30),
            'Autortiesibas' => fake()->boolean(),
        ];
    }
}

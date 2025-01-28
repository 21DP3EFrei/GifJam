<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enum\UploadType;
use App\Enum\FileType;

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
            'Fails' => fake()->text(50),
            'Failu_tips' => fake()->randomElement(array_column(FileType::cases(), 'value')),
            'Augsupielades_tips' => fake()->randomElement(array_column(UploadType::cases(), 'value')),
            'Autors' => fake()->text(30),
            'Autortiesibas' => fake()->boolean(),
        ];
    }
}

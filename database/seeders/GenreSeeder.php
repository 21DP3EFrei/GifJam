<?php

namespace Database\Seeders;

use App\Models\Zanrs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Zanrs::factory(4)->create();
    }
}

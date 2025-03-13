<?php

namespace Database\Seeders;

use App\Models\Skana_kategorija;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Skana_kategorijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skana_kategorija::factory(2)->create();
    }
}

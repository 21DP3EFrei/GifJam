<?php

namespace Database\Seeders;
use App\Models\Skana_kategorija;
use App\Models\Music;
use App\Models\Zanrs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Kategorija;
use App\Models\Media;
use Nette\Utils\Random;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([ 
            UserSeeder::class,
            CategorySeeder::class,
            MediaSeeder::class,
            MusicSeeder::class,
            Skana_kategorijaSeeder::class,
            GenreSeeder::class,
        ]);
        
        Media::factory(1)->has(Kategorija::factory(2))->create();
        Music::factory(2)->has(Zanrs::factory(2))->create();
        Media::factory(1)->has(Music::factory()->count(3))->create();

       

}
}
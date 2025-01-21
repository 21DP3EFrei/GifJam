<?php

namespace Database\Seeders;
use App\Models\Skana_kategorija;
use App\Models\Skana;
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
            SoundSeeder::class,
            GenreSeeder::class,
        ]);
        
        Media::factory(3)->has(Kategorija::factory(2))->create();
        Music::factory(3)->has(Zanrs::factory(2))->create();
        Skana::factory(3)->has(Skana_kategorija::factory(2))->create();

       

}
}
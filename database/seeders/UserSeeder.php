<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User',
            'email' => 'gifjamUser@gmail.com',
            'password' => Hash::make('pasword3124'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('r3a1pa22w0rd'),
            'usertype' => 'admin',
            'email_verified_at' => now(), 
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // create an admin
        \App\Models\Auth\User::create([
            'name' => 'Administartor',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'first_name' => 'John',
            'last_name' => 'Doe',
            'type' => 'admin',
        ]);

        \App\Models\Auth\User::factory(10)->create();
    }
}

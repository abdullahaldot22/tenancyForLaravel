<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $faker = Factory::create();

        \App\Models\User::factory()->create([
            'name' => fake()->name(),
            'email' => 'a@b.com',
            'password' => 'Pa$$w0rd!',
        ]);
    }
}

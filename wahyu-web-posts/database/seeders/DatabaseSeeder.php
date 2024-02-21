<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\Category::factory()->create([
        //     'name' => 'coding'
        // ]);

        // \App\Models\Category::factory()->create([
        //     'name' => 'mukbang'
        // ]);

        // \App\Models\Category::factory()->create([
        //     'name' => 'jalan-jalan'
        // ]);

        \App\Models\post::factory(100)->create();
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}

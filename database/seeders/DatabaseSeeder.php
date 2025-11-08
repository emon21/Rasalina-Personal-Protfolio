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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            SliderSeeder::class,
            AboutSeeder::class,
            PartnerSeeder::class,
            PortfolioSeeder::class,
            CategorySeeder::class,
            ClientSeeder::class,
            ServiceSeeder::class,
            FooterSeeder::class,
            // Add other seeders here as needed
            // Example: ProductSeeder::class,
            // CategorySeeder::class,
            // etc.
        ]);
    }
}

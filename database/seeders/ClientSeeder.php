<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $client = [
        //     'user_name' => fake()->sentence(5),
        //     'message' => fake()->sentence(20),
        // ];

        # delete old slider
        Client::truncate();

        # insert new slider

        for($i = 0; $i < 5; $i++){
            $client = [
                'user_id' => fake()->numberBetween(1, 10),
                'message' => fake()->sentence(20),
            ];
            Client::insert($client);

        }
        // Client::insert($client);
    }
}

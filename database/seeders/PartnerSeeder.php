<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $partner = [
            'title' => fake()->sentence(10),
            'short_description' => fake()->sentence(15),
            
        ];

        # delete old slider
        Partner::truncate();

        # insert new slider
        Partner::insert($partner);
    }
}

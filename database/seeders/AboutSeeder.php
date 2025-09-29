<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $about = [
            'title' => fake()->sentence(10),
            'short_title' => fake()->sentence(20),
            'short_description' => fake()->sentence(15),
            'long_description' => fake()->sentence(25),
            'about_image' => 'https://images.pexels.com/photos/1199957/pexels-photo-1199957.jpeg',
        ];


        # delete old slider
        About::truncate();

        # insert new slider
        About::insert($about);
    }
}

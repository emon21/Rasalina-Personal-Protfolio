<?php

namespace Database\Seeders;

use App\Models\HomeSlider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        # Slider 
        $slider = [
            [
                'title' => fake()->sentence(10),
                'short_title' => fake()->sentence(25),
                'photo' => 'https://img.freepik.com/premium-photo/meat-stew-with-with-eggplant-carrots-onions-peppers-zucchini_209364-343.jpg',
                'video_url' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",

            ],
            [
                'title' => fake()->sentence(10),
                'short_title' => fake()->sentence(25),
                'photo' => 'https://images.pexels.com/photos/1199957/pexels-photo-1199957.jpeg',
                'video_url' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",

            ],
            [
                'title' => fake()->sentence(10),
                'short_title' => fake()->sentence(25),
                'photo' => 'https://images.pexels.com/photos/262959/pexels-photo-262959.jpeg',
                'video_url' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",


            ],
            [
                'title' => fake()->sentence(10),
                'short_title' => fake()->sentence(25),
                'photo' => 'https://images.pexels.com/photos/1267320/pexels-photo-1267320.jpeg',
                'video_url' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",


            ],
            [
                'title' => fake()->sentence(10),
                'short_title' => fake()->sentence(25),
                'photo' => 'https://images.pexels.com/photos/1640772/pexels-photo-1640772.jpeg',
                'video_url' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",



            ],
            [
                'title' => fake()->sentence(10),
                'short_title' => fake()->sentence(25),
                'photo' => 'https://images.pexels.com/photos/958545/pexels-photo-958545.jpeg',
                'video_url' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",


            ],
            [
                'title' => fake()->sentence(10),
                'short_title' => fake()->sentence(25),
                'photo' => 'https://images.pexels.com/photos/769289/pexels-photo-769289.jpeg',

                'video_url' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",


            ],
            [
                'title' => fake()->sentence(10),
                'short_title' => fake()->sentence(25),
                'photo' => 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg',
                'video_url' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",
                
            ]
        ];

        # delete old slider
        HomeSlider::truncate();

        # insert new slider
        HomeSlider::insert($slider);
    }
}

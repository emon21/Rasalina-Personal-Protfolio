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

        $about = [

            'title' => 'I have transform your ideas into remarkable digital products',

            'short_title' => "I'm a Rasalina based product design & visual designer focused on crafting clean & user‑friendly experiences",

            'short_description' => "I love to work in User Experience & User Interface designing. Because I love to solve the design problem and find easy and better solutions to solve it. I always try my best to make good user interface with the best user experience. I have been working as a UX Designer",

            'long_description' => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of lorem ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the lorem ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated lorem ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.",

            'about_image' => 'https://images.pexels.com/photos/1199957/pexels-photo-1199957.jpeg'
        ];

        # delete old about info
        About::truncate();

        # insert new about info
        About::insert($about);
    }
}

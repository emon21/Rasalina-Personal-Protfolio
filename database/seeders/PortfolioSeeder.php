<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [

            [
                'portfolio_name' => 'Web Development',
                'portfolio_title' => 'E-commerce Website',
                'portfolio_image' => '',
                'portfolio_description' => 'This is a complete e-commerce website built with Laravel and Vue.js.',
            ],
            [
                'portfolio_name' => 'Graphic Design',
                'portfolio_title' => 'Creative Branding',
                'portfolio_image' => '',
                'portfolio_description' => 'Designed a full branding kit including logo, business card, and flyers.',
            ],
            [
                'portfolio_name' => 'Mobile App',
                'portfolio_title' => 'Food Delivery App',
                'portfolio_image' => '',
                'portfolio_description' => 'A mobile app for food ordering and delivery with live tracking features.',
            ],
            [
                'portfolio_name' => 'Digital Marketing',
                'portfolio_title' => 'Social Media Optimization',
                'portfolio_image' => '',
                'portfolio_description' => 'Optimized social media channels for better visibility and engagement.',
            ],
            [
                'portfolio_name' => 'UI/UX Design',
                'portfolio_title' => 'Mobile App Design',
                'portfolio_image' => '',
                'portfolio_description' => 'Designed a modern and user-friendly mobile app interface.',
            ],
            [
                'portfolio_name' => 'Web Design',
                'portfolio_title' => 'Responsive Website',
                'portfolio_image' => '',
                'portfolio_description' => 'Created a responsive website with a clean and modern design.',
            ]


        ];


        # delete all data
        Portfolio::truncate();

        # with truncate() method we have to reinsert data

        # with image delete all data and image path
        // Portfolio::truncate();

        # insert all data
        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
      
        
    }
}

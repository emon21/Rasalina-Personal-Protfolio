<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // $services = [
        //     'title' => fake()->sentence(),
        //     'short_description' => fake()->paragraph(),
        //     'long_description' => fake()->paragraphs(3, true),
        //     // 'picture' => fake()->imageUrl(800, 600, 'Service', true, 'jpg'),
        //     'picture' => 'https://placehold.co/600x400?text=Service',

        //     // https://placehold.co/600x400?text=Hello+World
        // ];

        $services = [
            
            [
                'title' => 'We Solve Business Strategy Problem',
                'short_description' => 'Definition: Business strategy can be understood as the course of action or set of decisions which assist the entrepreneurs in achieving specific business objectives.',
                'long_description' => 'It is nothing but a master plan that the management of a company implements to secure a competitive position in the market, carry on its operations, please customers and achieve the desired ends of the business.
                In business, it is the long-range sketch of the desired image, direction and destination of the organization. It is a scheme of corporate intent and action, which is carefully planned and flexibly designed with the purpose of A business strategy is a set of competitive moves and actions that a business uses to attract customers, compete successfully, strengthening performance, and achieve organizational goals. It outlines how business should be carried out to reach the desired ends',
                // 'picture' => 'https://placehold.co/600x400?text=We Solve Business Strategy Problem'
            ],
            [
                'title' => 'Nature of Business Strategy',
                'short_description' => "A business strategy is a combination of proactive actions on the part of management, for the purpose of enhancing the company’s market position and overall performance and reactions to unexpected developments and new market.",
                'long_description' => "The maximum part of the company’s present strategy is a result of formerly initiated actions and business approaches, but when market conditions take an unanticipated turn, the company requires a strategic reaction to cope with contingencies. Hence, for unforeseen development, a part of the business strategy is formulated as a reasoned response nature of business strategy.",
                // 'picture' => 'https://placehold.co/600x400?text=Nature of Business Strategy'
            ],
            [
                'title' => 'Business Strategy',
                'short_description' => "Strategy is a forward-looking plan for your brand’s behavior. Strategy is a forward-looking plan.",
                'long_description' => "It is nothing but a master plan that the management of a company implements to secure a competitive position in the market, carry on its operations, please customers and achieve the desired ends of the business.",
                // 'picture' => 'https://placehold.co/600x400?text=Business Strategy'
            ],
            [
                'title' => 'Product Design',
                'short_description' => "Strategy is a forward-looking plan for your brand’s behavior. Strategy is a forward-looking plan.",
                'long_description' => "It is nothing but a master plan that the management of a company implements to secure a competitive position in the market, carry on its operations, please customers and achieve the desired ends of the business.",
                // 'picture' => 'https://placehold.co/600x400?text=Product Design'
            ],
            [
                'title' => 'Visual Design',
                'short_description' => "Strategy is a forward-looking plan for your brand’s behavior. Strategy is a forward-looking plan.",
                'long_description' => "It is nothing but a master plan that the management of a company implements to secure a competitive position in the market.",
                // 'picture' => 'https://placehold.co/600x400?text=Visual Design'
            ],
        ];

        # Delete Data Before Insert
         Service::truncate();

        # Insert Data

        foreach($services as $service){
            Service::create($service);
        }

        // for($i=0; $i<5; $i++){

        //     Service::create($services);
        // }
    }
}

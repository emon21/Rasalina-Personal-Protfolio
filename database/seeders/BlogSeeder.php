<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // # all Category
        // $category = Category::all();
        // $blog = [
        //     'category_id' => $category->id,
        //     'blog_title' => fake()->sentence(5),
        //     'blog_image' => 'https://images.pexels.com/photos/1199957/pexels-photo-1199957.jpeg',
        //     'blog_tags' => '',
        //     'blog_description' => fake()->sentence(20),
        // ];

        $faker = fake();
        foreach (range(1, 10) as $i) {
            Blog::create([
                'category_id'      => Category::inRandomOrder()->first()->id,
                'blog_title'       => $faker->sentence(6),
                'blog_image'       => $faker->imageUrl(800, 600, 'blog', true),

                // 'blog_tags'        => implode(',', Category::inRandomOrder()->pluck('name')->toArray()),

                'blog_tags' => Category::inRandomOrder()
                    ->take(3)
                    ->pluck('name')
                    ->join(','),

                'blog_description' => $faker->paragraph(6, true),
            ]);
        }
    }
}

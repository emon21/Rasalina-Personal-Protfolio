<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Technology',
            'Business',
            'Education',
            'Health & Fitness',
            'Travel',
            'Food & Recipes',
            'Sports',
            'Lifestyle',
            'Entertainment',
            'Science',
            'Politics',
            'Finance',
            'Career Tips',
            'Digital Marketing',
            'Art & Culture'
        ];

        # Delete Old Data
        Category::truncate();

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}

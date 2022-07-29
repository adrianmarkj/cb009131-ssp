<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            "Music",
            "Performing & Visual Arts",
            "Travel & Outdoor",
            "Health",
            "Hobbies",
            "Business",
            "Food & Drink",
            "Sports & Fitness",
        ];

        foreach ($categories as $key => $category) {
            (new Category())->create([
                'title' => $category,
                'url' => Str::slug($category),
                'summary' => $category,
                'content' => $category,
                'sort_order' => $key,
                'status' => 1,
            ]);
        }
    }
}

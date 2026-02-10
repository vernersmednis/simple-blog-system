<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryIds = Category::pluck('id');

        Post::all()->each(function ($post) use ($categoryIds) {
            $post->categories()->attach(
                $categoryIds->random(rand(1, 3))
            );
        });
    }
}

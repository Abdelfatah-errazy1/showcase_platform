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
     */
    public function run(): void
    {
         $categories = [
            'Web Development',
            'Full-Stack Projects',
            'Laravel Applications',
            'Dashboard & Admin Panels',
            'Portfolio Websites',
            'Content Management Systems (CMS)',
            'Task Management Tools',
            'Showcase Projects',
            'IoT Integration',
            'Blog Platforms',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category, 'slug' => Str::slug($category)]);
        }
    }
}

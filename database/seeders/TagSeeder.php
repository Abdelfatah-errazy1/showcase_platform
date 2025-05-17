<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $tags = [
            'Laravel',
            'Bootstrap',
            'Admin Dashboard',
            'CRUD',
            'REST API',
            'Authentication',
            'Authorization',
            'Notifications',
            'File Upload',
            'Image Gallery',
            'Carousel',
            'Responsive Design',
            'SEO Friendly',
            'Ajax',
            'jQuery',
            'Blade Templates',
            'Dark Mode',
            'Project Management',
            'Smart Home',
            'WYSIWYG Editor',
        ];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag, 'slug' => Str::slug($tag)]);
        }
    }
}

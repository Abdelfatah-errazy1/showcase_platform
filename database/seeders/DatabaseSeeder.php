<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'is_admin' => 1,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
        ]);
      $this->call([
        CategorySeeder::class,
        TagSeeder::class,
        TechnologySeeder::class,
    ]);
    $category=Category::find(1);
    
    Project::create([
            'title' => 'Task Manager App',
            'slug' => 'task-manager-app',
            'description' => 'An advanced task management web application built with Laravel and Vue.js, featuring authentication, user roles, notifications, and drag-and-drop UI.',
            'demo_url' => 'https://demo.example.com/task-manager',
            'download_url' => 'https://github.com/Abdelfatah-errazy1/task-manager-app/archive/refs/heads/main.zip',
                'image_path' => 'uploads/1747264886-sport.jpg',

            'category_id'=>$category->id
            // 'documentation_url' => 'https://docs.example.com/task-manager',
        ]);

        Project::create([
            'title' => 'Portfolio Website Builder',
            'slug' => 'portfolio-website-builder',
            'description' => 'A customizable portfolio builder for developers to showcase projects with built-in admin panel and SEO tools. Made using Laravel and Tailwind CSS.',
            'demo_url' => 'https://demo.example.com/portfolio-builder',
            'download_url' => 'https://github.com/Abdelfatah-errazy1/portfolio-builder/archive/refs/heads/main.zip',
            // 'documentation_url' => 'https://docs.example.com/portfolio-builder',
                'image_path' => 'uploads/1747264886-sport.jpg',

            'category_id'=>$category->id

        ]);
    

        // Insert technologies
       

        // Insert projects (assume categories IDs are 1 and 2)
        DB::table('projects')->insert([
            [
                'title' => 'Task Manager App',
                'slug' => 'task-manager-app3',
                'description' => 'A web application to manage tasks efficiently.',
                'category_id' => 1,
                'image_path' => 'uploads/1747264886-sport.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'E-Commerce Platform',
                'slug' => 'e-commerce-platform',
                'description' => 'A full-featured e-commerce platform.',
                'category_id' => 2,
                'image_path' => 'uploads/1747264886-sport.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        // Insert project_technology pivot (assume project IDs are 1 and 2)
        DB::table('project_technology')->insert([
            ['project_id' => 1, 'technology_id' => 1], // Laravel
            ['project_id' => 1, 'technology_id' => 2], // Vue.js
            ['project_id' => 2, 'technology_id' => 1], // Laravel
        ]);
    
}
}

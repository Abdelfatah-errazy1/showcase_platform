<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Project;
use Illuminate\Database\Seeder;

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
    
    Project::create([
            'title' => 'Task Manager App',
            'slug' => 'task-manager-app',
            'description' => 'An advanced task management web application built with Laravel and Vue.js, featuring authentication, user roles, notifications, and drag-and-drop UI.',
            'demo_url' => 'https://demo.example.com/task-manager',
            'download_url' => 'https://github.com/Abdelfatah-errazy1/task-manager-app/archive/refs/heads/main.zip',
            // 'documentation_url' => 'https://docs.example.com/task-manager',
        ]);

        Project::create([
            'title' => 'Portfolio Website Builder',
            'slug' => 'portfolio-website-builder',
            'description' => 'A customizable portfolio builder for developers to showcase projects with built-in admin panel and SEO tools. Made using Laravel and Tailwind CSS.',
            'demo_url' => 'https://demo.example.com/portfolio-builder',
            'download_url' => 'https://github.com/Abdelfatah-errazy1/portfolio-builder/archive/refs/heads/main.zip',
            // 'documentation_url' => 'https://docs.example.com/portfolio-builder',
        ]);
    
}
}

<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure a category exists or create a default one
         $categories = Category::all(); // fetch existing categories


        $projects = [
            [
                'title' => 'Task Manager Pro',
                'description' => 'A professional task management tool with team collaboration, deadlines, notifications, and status tracking.',
                'demo_url' => 'https://demo.example.com/task-manager-pro',
                'download_url' => 'https://example.com/downloads/task-manager-pro.zip',
                'documentation' => 'Includes features like task assignments, labels, priority levels, and analytics.',
                'image_path' => 'uploads/',
            ],
            [
                'title' => 'Freelance CRM',
                'description' => 'CRM for freelancers with client management, invoices, and project tracking.',
                'demo_url' => 'https://demo.example.com/freelance-crm',
                'download_url' => 'https://example.com/downloads/freelance-crm.zip',
                'documentation' => 'Manage your freelance clients, send invoices, and monitor project progress.',
                'image_path' => 'uploads/',
            ],
            [
                'title' => 'Bug Tracker',
                'description' => 'Lightweight bug tracking system for software development teams.',
                'demo_url' => 'https://demo.example.com/bug-tracker',
                'download_url' => 'https://example.com/downloads/bug-tracker.zip',
                'documentation' => 'Track bugs, assign them to developers, and manage severity levels.',
                'image_path' => 'uploads/',
            ],
            [
                'title' => 'Time Logger',
                'description' => 'Tracks time spent on tasks, projects, and clients with visual reporting.',
                'demo_url' => 'https://demo.example.com/time-logger',
                'download_url' => 'https://example.com/downloads/time-logger.zip',
                'documentation' => 'Log hours, generate reports, and export timesheets in CSV format.',
                'image_path' => 'uploads/',
            ],
            [
                'title' => 'Kanban Flow',
                'description' => 'Visual kanban board to manage tasks and workflow efficiently.',
                'demo_url' => 'https://demo.example.com/kanban-flow',
                'download_url' => 'https://example.com/downloads/kanban-flow.zip',
                'documentation' => 'Create boards, columns, move tasks with drag-and-drop, and assign users.',
                'image_path' => 'uploads/',
            ],
            [
                'title' => 'Client Portal',
                'description' => 'Secure portal for clients to access project files, timelines, and communication.',
                'demo_url' => 'https://demo.example.com/client-portal',
                'download_url' => 'https://example.com/downloads/client-portal.zip',
                'documentation' => 'Share documents, provide updates, and get feedback from clients.',
                'image_path' => 'uploads/',
            ],
            [
                'title' => 'Agile Scrum Board',
                'description' => 'A digital scrum board with sprints, tasks, and team roles.',
                'demo_url' => 'https://demo.example.com/scrum-board',
                'download_url' => 'https://example.com/downloads/scrum-board.zip',
                'documentation' => 'Sprint planning, backlog management, and real-time collaboration.',
                'image_path' => 'uploads/',
            ],
            [
                'title' => 'Project Wiki',
                'description' => 'Collaborative wiki for documenting project features, architecture, and guides.',
                'demo_url' => 'https://demo.example.com/project-wiki',
                'download_url' => 'https://example.com/downloads/project-wiki.zip',
                'documentation' => 'Markdown editor, categories, revisions, and permissions.',
                'image_path' => 'uploads/',
            ],
            [
                'title' => 'Daily Planner',
                'description' => 'Organize daily tasks, notes, and reminders with a clean UI.',
                'demo_url' => 'https://demo.example.com/daily-planner',
                'download_url' => 'https://example.com/downloads/daily-planner.zip',
                'documentation' => 'Calendar view, reminders, and export to PDF.',
                'image_path' => 'uploads/',
            ],
            [
                'title' => 'Remote Work Dashboard',
                'description' => 'Monitor remote teams, time tracking, attendance, and communication.',
                'demo_url' => 'https://demo.example.com/remote-dashboard',
                'download_url' => 'https://example.com/downloads/remote-dashboard.zip',
                'documentation' => 'Real-time updates, timezone conversion, and integration with Slack.',
                'image_path' => 'uploads/',
            ],
        ];

        foreach ($projects as $index=> $project) {
             $category = $categories->random(); // pick a random category

            Project::create([
                'title' => $project['title'],
                'slug' => Str::slug($project['title']),
                'description' => $project['description'],
                'demo_url' => $project['demo_url'],
                'download_url' => $project['download_url'],
                'documentation' => $project['documentation'],
                'image_path' => $project['image_path'].'1 ('. $index+1 .').jpg',
                'category_id' => $category->id,
            ]);
        }
    }
}

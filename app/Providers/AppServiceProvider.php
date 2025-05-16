<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer('pages.posts.includes.featured', function ($view) {
             $projects=Project::query()->limit(4)->get();
            $view->with('projects', $projects);
            // $mostViewedPosts = Project::orderBy('views', 'desc')->where('status', 'published')->take(4)->get();
            // $view->with('mostViewedPosts', $mostViewedPosts);

        });
         View::composer('pages.posts.includes.categories', function ($view) {
            
            $categories=Category::withCount('projects')
            ->where('pinned',true)
            ->orderBy('class')
            ->get();
            
            $cat = Category::withCount('projects')->where('pinned',false)
            ->get();
            $view->with('categories', $categories);
            $view->with('cat', $cat);
        });
         View::composer('layouts.clients.includes._header', function ($view) {
             $projects=Project::latest()->limit(4)->get();
             $categories=Category::query()->where('pinned',true)->orderBy('class')->get();
            //  dd($categories);
            $view->with('categories', $categories);
            $view->with('projects', $projects);           
            $topProjects = Project::orderBy('id', 'desc')->take(4)->get();
            $view->with('topProjects', $topProjects);

        });
    }
}

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ScreenshotController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TechnologyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['web'])->group(function () {
    Route::get('/', function () {
         if (Auth::check()) {
            if(auth()->user()->is_admin){

                return redirect(route('admin.projects.index'));
            }
            return redirect(route('projects.index'));
        }
})->name('home');
Route::post('/admin/projects/upload-screenshot', [ProjectController::class, 'uploadScreenshot'])
    ->name('admin.projects.upload-screenshot');

    Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('/projects/{category:slug}/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/posts/category/{project:slug}', [CategoryController::class, 'getPosts'])->name('category.projects');

});
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('/login', [AuthController::class, 'signIn'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected by auth)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    /*
    |-------------------
    | Projects
    |-------------------
    */
    Route::get('/projects', [ProjectController::class, 'adminIndex'])->name('admin.projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::post('/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

    /*
    |-------------------
    | Categories
    |-------------------
    */
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::post('/categories/{id}/pin', [CategoryController::class, 'pinCategory'])->name('categories.pin');
    Route::post('/categories/{id}/unpin', [CategoryController::class, 'unpinCategory'])->name('categories.unpin');

    /*
    |-------------------
    | Technologies
    |-------------------
    */
    Route::get('/technologies', [TechnologyController::class, 'index'])->name('admin.technologies.index');
    Route::get('/technologies/create', [TechnologyController::class, 'create'])->name('admin.technologies.create');
    Route::post('/technologies', [TechnologyController::class, 'store'])->name('admin.technologies.store');
    Route::get('/technologies/{technology}/edit', [TechnologyController::class, 'edit'])->name('admin.technologies.edit');
    Route::put('/technologies/{technology}', [TechnologyController::class, 'update'])->name('admin.technologies.update');
    Route::delete('/technologies/{technology}', [TechnologyController::class, 'destroy'])->name('admin.technologies.destroy');

    Route::prefix('projects')->group(function () {
        Route::post('/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    });
    
    Route::prefix('admin/projects/{project}/files')->middleware(['auth'])->group(function () {
        Route::get('/create', [ProjectFileController::class, 'create'])->name('admin.project_files.create');
        Route::post('/', [ProjectFileController::class, 'store'])->name('admin.project_files.store');
    });
    Route::delete('/admin/project-files/{file}', [ProjectFileController::class, 'destroy'])->name('admin.project_files.destroy');

   
    
    Route::prefix('tags')->middleware(['auth'])->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('admin.tags.index');
        Route::get('/create', [TagController::class, 'create'])->name('admin.tags.create');
        Route::post('/', [TagController::class, 'store'])->name('admin.tags.store');
        Route::get('/edit', [TagController::class, 'edit'])->name('admin.tags.edit');
        Route::post('/update', [TagController::class, 'update'])->name('admin.tags.update');
        Route::delete('/{tag}', [TagController::class, 'destroy'])->name('admin.tags.destroy');
    });
   });
   Route::prefix('projects/{project}')->group(function () {
    Route::resource('screenshots', ScreenshotController::class)->except(['show']);
});
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/terms-and-conditions', [PageController::class, 'termsAndConditions'])->name('terms.conditions');
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('about.us');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contact.us');
Route::post('/contact-us', [PageController::class, 'submitContact'])->name('contact.submit');

});
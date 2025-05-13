<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('pages.projects.index', compact('projects'));
    }
    public function adminIndex()
    {
        $projects = Project::latest()->get();
        // dd($projects);
        return view('pages.admin.projects.index', compact('projects'));
    }
    public function show($id)
    {
        $project = Project::find($id);
        // dd($projects);
return view('pages.projects.show', compact('project'));
    }

    public function create()
    {
        $categories = Category::all();
        $technologies = Technology::all();
        $tags = Tag::all();
        return view('pages.admin.projects.create', compact('categories', 'technologies', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:projects',
            'description' => 'required',
            'demo_url' => 'nullable|url',
            'download_url' => 'nullable|url',
            'image' => 'nullable|image',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        $project=Project::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'demo_url' => $request->demo_url,
            'download_url' => $request->download_url,
            'documentation' => $request->documentation,
            'image_path' => $imagePath,
        ]);
    $project->tags()->attach($request->tags); // dans store()
        return redirect()->route('admin.projects.index')->with('success', 'Project created.');
    }

    public function edit(Project $project)
    {
        return view('pages.admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|unique:projects,title,' . $project->id,
            'description' => 'required',
            'demo_url' => 'nullable|url',
            'download_url' => 'nullable|url',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
            $project->image_path = $imagePath;
        }

        $project->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'demo_url' => $request->demo_url,
            'download_url' => $request->download_url,
            'documentation' => $request->documentation,
        ]);

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }
}

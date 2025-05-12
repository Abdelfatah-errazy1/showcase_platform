<?php

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectFileController extends Controller
{
    public function create(Project $project)
    {
        return view('admin.projects.files.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:demo,source,documentation',
            'file' => 'required|file|max:10240', // max 10 MB
        ]);

        $filePath = $request->file('file')->store('project_files', 'public');

        ProjectFile::create([
            'title' => $data['title'],
            'type' => $data['type'],
            'file_path' => $filePath,
            'project_id' => $project->id,
        ]);

        return redirect()->route('admin.projects.edit', $project->id)->with('success', 'Fichier ajouté.');
    }

    public function destroy(ProjectFile $file)
    {
        Storage::disk('public')->delete($file->file_path);
        $file->delete();

        return back()->with('success', 'Fichier supprimé.');
    }
}
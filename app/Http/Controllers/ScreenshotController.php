<?php

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Screenshot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScreenshotController extends Controller
{
    public function create(Project $project)
    {
        return view('admin.projects.screenshots.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $data = $request->validate([
            'caption' => 'nullable|string|max:255',
            'image' => 'required|image|max:5120', // max 5MB
        ]);

        $imagePath = $request->file('image')->store('screenshots', 'public');

        Screenshot::create([
            'caption' => $data['caption'],
            'image_path' => $imagePath,
            'project_id' => $project->id,
        ]);

        return redirect()->route('admin.projects.edit', $project->id)->with('success', 'Capture ajoutée.');
    }

    public function destroy(Screenshot $screenshot)
    {
        Storage::disk('public')->delete($screenshot->image_path);
        $screenshot->delete();

        return back()->with('success', 'Capture supprimée.');
    }
    public function uploadScreenshot(Request $request)
{
    $request->validate([
        'screenshot' => 'required|image|max:3072'
    ]);

    $path = $request->file('screenshot')->store('screenshots', 'public');

    return response()->json(['path' => $path]);
}
}
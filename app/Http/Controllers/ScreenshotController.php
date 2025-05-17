<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Screenshot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScreenshotController extends Controller
{
    public function index(Project $project)
    {
        $screenshots = $project->screenshots;
        return view('pages.admin.screenshots.index', compact('project', 'screenshots'));
    }

    public function create(Project $project)
    {
        return view('pages.admin.screenshots.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'image_path' => 'required|image',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $filePath= null;
        if($request->image_path){
            $file = $request->file('image_path');
            // dd($file);
            $destinationPath = public_path('uploads/screenshots/'.$project->slug); 
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $filePath = 'uploads/screenshots/'.$project->slug.'/' . $fileName;
        }
        Screenshot::create([
            'project_id' => $project->id,
            'image_path' => $filePath,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('screenshots.index', $project)->with('success', 'Screenshot added.');
    }

    public function edit(Project $project, Screenshot $screenshot)
    {
        return view('pages.admin.screenshots.edit', compact('project', 'screenshot'));
    }

    public function update(Request $request, Project $project, Screenshot $screenshot)
    {
        $request->validate([
            'image_path' => 'nullable|image',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $filePath= null;
        if($request->image_path){
            $file = $request->file('image_path');
            // dd($file);
            $destinationPath = public_path('uploads/screenshots/'.$project->slug); 
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $filePath = 'uploads/screenshots/'.$project->slug.'/' . $fileName;
        }
        $screenshot->update([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $filePath?? $screenshot->image_path,

        ]);

        return redirect()->route('screenshots.index', $project)->with('success', 'Screenshot updated.');
    }

    public function destroy(Project $project, Screenshot $screenshot)
    {
        Storage::disk('public')->delete($screenshot->image_path);
        $screenshot->delete();
        return back()->with('success', 'Screenshot deleted.');
    }
}
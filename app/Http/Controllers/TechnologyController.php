<?php

namespace App\Http\Controllers;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::latest()->paginate(10);
        return view('pages.admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        return view('pages.admin.technologies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:technologies,name',
            'description' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['name']);
        Technology::create($data);

        return redirect()->route('admin.technologies.index')->with('success', 'Technologie ajoutée avec succès.');
    }

    public function edit(Technology $technology)
    {
        return view('pages.admin.technologies.edit', compact('technology'));
    }

    public function update(Request $request, Technology $technology)
    {
        $data = $request->validate([
            'name' => 'required|unique:technologies,name,' . $technology->id,
            'description' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['name']);
        $technology->update($data);

        return redirect()->route('admin.technologies.index')->with('success', 'Technologie mise à jour.');
    }

    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Technologie supprimée.');
    }
}
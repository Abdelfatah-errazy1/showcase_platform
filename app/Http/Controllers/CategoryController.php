<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('pages.admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['name']);
        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Catégorie créée avec succès.');
    }

    public function edit(Category $category)
    {
        return view('pages.admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['name']);
        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Catégorie mise à jour.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie supprimée.');
    }
    
    public function pinCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->pinned = true;
        $category->class = $request->input('pinned_class');
        $category->save();
    
        return redirect()->back()->with('success', 'Category pinned successfully!');
    }
    
    public function unpinCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->pinned = false;
        $category->class = null;
        $category->save();
        return redirect()->back()->with('success', 'Category unpinned successfully!');
    }
      public function getProjects( $slug)
    {
        $category=Category::query()->where('slug',$slug)->first();
        $projects = $category->projects()->get();
        // dd($category);
        $categories = Category::all();
        return view('pages.projects.category', compact('projects','category'));
    }
    
}

<form action="{{ $formAction }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf
   

    {{-- Titre --}}
    <div class="mb-3 col col-md-6">
        <label for="title" class="form-label">Titre</label>
        <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" class="form-control" required>
    </div>

    {{-- Slug --}}
    <div class="mb-3 col col-md-6">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $project->slug ?? '') }}" class="form-control" required>
    </div>

    {{-- Description --}}
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control editor" rows="6">{{ old('description', $project->description ?? '') }}</textarea>
    </div>

    {{-- Category --}}
    <div class="mb-3 col col-md-6">
        <label for="category_id" class="form-label">Catégorie</label>
        <select name="category_id" class="form-select" required>
            <option value="">Choisir...</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ (old('category_id', $project->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Demo URL --}}
    <div class="mb-3 col col-md-6">
        <label for="demo_url" class="form-label">URL de démo</label>
        <input type="url" name="demo_url" value="{{ old('demo_url', $project->demo_url ?? '') }}" class="form-control">
    </div>

    {{-- Technologies --}}
    <div class="mb-3 col col-md-6">
        <label for="technologies" class="form-label">Technologies</label>
        <select name="technologies[]" class="form-select" multiple>
            @foreach ($technologies as $tech)
                <option value="{{ $tech->id }}" {{ (isset($project) && $project->technologies->contains($tech->id)) ? 'selected' : '' }}>
                    {{ $tech->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Tags --}}
    <div class="mb-3 col col-md-6">
        <label for="tags" class="form-label">Tags</label>
        <select name="tags[]" class="form-select" multiple>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" {{ (isset($project) && $project->tags->contains($tag->id)) ? 'selected' : '' }}>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Download / Docs URLs --}}
    <div class="mb-3 col col-md-6">
        <label for="download_url" class="form-label">URL de téléchargement</label>
        <input type="url" name="download_url" value="{{ old('download_url', $project->download_url ?? '') }}" class="form-control">
    </div>

    <div class="mb-3 col col-md-6">
        <label for="documentation_url" class="form-label">URL de documentation</label>
        <input type="url" name="documentation_url" value="{{ old('documentation_url', $project->documentation_url ?? '') }}" class="form-control">
    </div>

    {{-- Image Upload --}}
    <div class="mb-10">
        <label class="form-label">Project Image</label>
        <input type="file" name="image_path" class="form-control" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary mt-4">Enregistrer</button>
</form>

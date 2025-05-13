@extends('layouts.admin')

@section('content')
<div class="card card-xl-stretch mb-5 mb-xl-8">
    <div class="card-header">
        <h3 class="card-title">Créer un nouveau projet</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.projects.update',$project->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $project->slug ?? '') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" rows="4" class="form-control">{{ old('description', $project->description ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="demo_url" class="form-label">URL de démo</label>
                <input type="url" name="demo_url" value="{{ old('demo_url', $project->demo_url ?? '') }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="download_url" class="form-label">URL de téléchargement</label>
                <input type="url" name="download_url" value="{{ old('download_url', $project->download_url ?? '') }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="documentation_url" class="form-label">URL de documentation</label>
                <input type="url" name="documentation_url" value="{{ old('documentation_url', $project->documentation_url ?? '') }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-4">Enregistrer</button>
        </form>
    </div>
</div>
@endsection

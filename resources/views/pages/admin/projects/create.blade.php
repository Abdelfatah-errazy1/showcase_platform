@extends('layouts.admin')

@section('content')
<div class="card card-xl-stretch mb-5 mb-xl-8">
    <div class="card-header">
        <h3 class="card-title">Créer un nouveau projet</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.projects.store') }}" method="POST" class="row">
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

            {{-- Description avec éditeur --}}
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control editor" rows="6">{{ old('description', $project->description ?? '') }}</textarea>
            </div>

            {{-- Sélection Catégorie --}}
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

            {{-- Technologies (multi-select) --}}
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

            {{-- Tags (multi-select) --}}
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

            {{-- URLs --}}
            <div class="mb-3 col col-md-6">
                <label for="demo_url" class="form-label">URL de démo</label>
                <input type="url" name="demo_url" value="{{ old('demo_url', $project->demo_url ?? '') }}" class="form-control">
            </div>
            <div class="mb-3 col col-md-6">
                <label for="download_url" class="form-label">URL de téléchargement</label>
                <input type="url" name="download_url" value="{{ old('download_url', $project->download_url ?? '') }}" class="form-control">
            </div>
            <div class="mb-3 col col-md-6">
                <label for="documentation_url" class="form-label">URL de documentation</label>
                <input type="url" name="documentation_url" value="{{ old('documentation_url', $project->documentation_url ?? '') }}" class="form-control">
            </div>

            {{-- Upload Screenshots (Dropzone) --}}
            <div class="mb-3">
                <label class="form-label">Screenshots</label>
                <div id="screenshot-dropzone" class="dropzone"></div>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Enregistrer</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

<script>
    tinymce.init({
        selector: 'textarea.editor',
        height: 300,
        menubar: false,
        plugins: 'link lists code',
        toolbar: 'undo redo | bold italic | bullist numlist | link code',
        branding: false
    });

    Dropzone.autoDiscover = false;
    var screenshotDropzone = new Dropzone("#screenshot-dropzone", {
        url: "{{ route('admin.projects.upload-screenshot') }}",
        paramName: "screenshot",
        maxFilesize: 3, // MB
        acceptedFiles: 'image/*',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function(file, response) {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'screenshots[]';
            input.value = response.path;
            document.querySelector('form').appendChild(input);
        }
    });
</script>
@endpush

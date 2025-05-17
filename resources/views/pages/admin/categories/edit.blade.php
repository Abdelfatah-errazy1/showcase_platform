{{-- resources/views/admin/categories/edit.blade.php --}}
@extends('layouts.admin')
@section('toolbar')
    <x-toolbar 
    title="Categories"
    subtitle="Edit Category of {{ $category->name }}"
    {{-- createUrl="{{ route('admin.projects.create') }}" --}}
/>
@endsection
@section('content')
<div class="container">
<div class="card">
        <div class="card-body py-3">
            
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nom de la catégorie</label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control" required>
                    @error('name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>
        
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection

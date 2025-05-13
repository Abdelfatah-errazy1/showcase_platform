{{-- resources/views/admin/categories/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Ajouter une catégorie</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom de la catégorie</label>
            <input type="text" name="name" class="form-control" required>
            @error('name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection

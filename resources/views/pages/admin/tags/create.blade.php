@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Ajouter un tag</h1>

    <form action="{{ route('admin.tags.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom du tag</label>
            <input type="text" name="name" class="form-control" required>
            @error('name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Modifier le tag</h1>

    <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nom du tag</label>
            <input type="text" name="name" value="{{ old('name', $tag->name) }}" class="form-control" required>
            @error('name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection

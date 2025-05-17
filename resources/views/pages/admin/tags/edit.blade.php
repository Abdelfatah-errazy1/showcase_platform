@extends('layouts.admin')
@section('toolbar')
    <x-toolbar 
    title="Tags"
    subtitle="Edit Tag of {{ $tag->name }}"
    {{-- createUrl="{{ route('admin.projects.create') }}" --}}
/>
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body py-3">
            
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
    </div>
</div>
@endsection

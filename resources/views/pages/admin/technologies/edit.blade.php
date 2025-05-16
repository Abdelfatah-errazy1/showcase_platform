@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Technology</h2>

    <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Technology Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $technology->name) }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection


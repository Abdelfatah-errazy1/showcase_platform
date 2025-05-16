@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Add New Technology</h2>

    <form action="{{ route('admin.technologies.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Technology Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

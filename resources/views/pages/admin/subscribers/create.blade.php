@extends('layouts.admin')
@section('toolbar')
    <x-toolbar 
    title="Technologies"
    subtitle="Create Technology"
    {{-- createUrl="{{ route('admin.projects.create') }}" --}}
/>
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body py-3">
            
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
    </div>
</div>
@endsection

@extends('layouts.admin')
@section('toolbar')
    <x-toolbar 
    title="ScreenShots"
    subtitle="Create ScreenShot "
    {{-- createUrl="{{ route('admin.projects.create') }}" --}}
/>
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body py-3">
            
            <form action="{{ isset($screenshot) ? route('screenshots.update', [$project, $screenshot]) : route('screenshots.store', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($screenshot)) @method('PUT') @endif
        
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image_path" class="form-control" @if(!isset($screenshot)) required @endif>
                @if(isset($screenshot))
                    <img src="{{ asset('storage/' . $screenshot->image_path) }}" class="mt-2" style="max-height: 200px;">
                @endif
            </div>
        
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $screenshot->title ?? '' }}">
            </div>
        
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $screenshot->description ?? '' }}</textarea>
            </div>
        
            <button class="btn btn-success">{{ isset($screenshot) ? 'Update' : 'Create' }}</button>
        </form>
        </div>
    </div>


</div>
@endsection

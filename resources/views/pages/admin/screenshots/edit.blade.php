@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Screen</h2>

    <form action="{{ isset($screenshot) ? route('screenshots.update', [$project, $screenshot]) : route('screenshots.store', $project) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($screenshot)) @method('PUT') @endif

    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image_path" class="form-control" @if(!isset($screenshot)) required @endif>
        @if(isset($screenshot))
            <img src="{{ asset( $screenshot->image_path) }}" class="mt-2" style="max-height: 200px;">
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
@endsection
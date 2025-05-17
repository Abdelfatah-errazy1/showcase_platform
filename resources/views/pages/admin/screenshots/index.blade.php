@extends('layouts.admin')
@section('toolbar')
    <x-toolbar 
    title="ScreenShots"
    subtitle=  "All ScreenShots of  {{ $project->title }} "
    createUrl="{{ route('screenshots.create',$project) }}"
/>
@endsection
@section('content')
<div class="container ">
    <div class="row">
        @foreach($screenshots as $screenshot)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset( $screenshot->image_path) }}" class="card-img-top p-3 rounded" alt="{{ $screenshot->title }}" style="object-fit: cover; aspect-ratio: 16/9;">
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $screenshot->title ?? 'Untitled' }}</h5>
                        <p class="card-text">{{ Str::limit($screenshot->description, 100) }}</p>
                    </div>

                  

                    <div class="card-body">
                        <a href="{{ route('screenshots.edit', [$project, $screenshot]) }}" class="btn btn-success ">Edit</a>
                        
                        <form action="{{ route('screenshots.destroy', [$project, $screenshot]) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn  btn-danger " onclick="return confirm('Delete this screenshot?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

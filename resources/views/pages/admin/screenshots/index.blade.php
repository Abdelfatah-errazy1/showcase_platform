@extends('layouts.admin')

@section('content')
<div class="container ">
    <div class="d-flex justify-content-between">

        <h2 class="mb-4">Screenshots of "{{ $project->title }}"</h2>
    
        <a href="{{ route('screenshots.create', $project) }}" class="btn btn-primary mb-4">Add Screenshot</a>
    </div>

    <div class="row">
        @foreach($screenshots as $screenshot)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset( $screenshot->image_path) }}" class="card-img-top p-3 rounded" alt="{{ $screenshot->title }}" style="object-fit: cover; aspect-ratio: 16/9;">
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $screenshot->title ?? 'Untitled' }}</h5>
                        <p class="card-text">{{ Str::limit($screenshot->description, 100) }}</p>
                    </div>

                    {{-- <ul class="list-group list-group-flush">
                        <li class="list-group-item">Created: {{ $screenshot->created_at->format('d M Y') }}</li>
                        <li class="list-group-item">Updated: {{ $screenshot->updated_at->diffForHumans() }}</li>
                    </ul> --}}

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

@extends('layouts.admin')

@section('toolbar')
    <x-toolbar 
        title="Projects"
        subtitle="Modifier le projet"
    />
@endsection

@section('content')
<div class="card card-xl-stretch mb-5 mb-xl-8">
    <div class="card-body">
        @include('components.form', [
            'formAction' => route('admin.projects.update', $project),
            'project' => $project,
            'isEdit' => true,
            'categories' => $categories,
            'technologies' => $technologies,
            'tags' => $tags
        ])
    </div>
</div>
@endsection


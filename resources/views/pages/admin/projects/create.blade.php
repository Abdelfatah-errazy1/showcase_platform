@extends('layouts.admin')

@section('toolbar')
    <x-toolbar 
        title="Projects"
        subtitle="Créer un projet"
    />
@endsection

@section('content')
<div class="card card-xl-stretch mb-5 mb-xl-8">
    <div class="card-body">
        @include('components.form', [
            'formAction' => route('admin.projects.store'),
            'project' => null,
            'isEdit' => false,
            'categories' => $categories,
            'technologies' => $technologies,
            'tags' => $tags
        ])
    </div>
</div>
@endsection



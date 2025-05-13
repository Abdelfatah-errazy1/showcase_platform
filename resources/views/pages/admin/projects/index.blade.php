@extends('layouts.admin') {{-- Ton layout Metronic principal --}}

@section('content')
<div class="card card-xl-stretch mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5 d-flex justify-content-between align-items-center">
        <h3 class="card-title align-items-start flex-column">
            <span class="text-dark fw-bold fs-3">Liste des projets</span>
        </h3>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-primary">Ajouter un projet</a>
    </div>
    <div class="card-body pt-0">
        <table class="table align-middle table-row-dashed fs-6 gy-5">
            <thead>
                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                    <th>Titre</th>
                    <th>Slug</th>
                    <th>Demo</th>
                    <th>Téléchargement</th>
                    <th>Documentation</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 fw-semibold">
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->slug }}</td>
                        <td><a href="{{ $project->demo_url }}" target="_blank">Voir</a></td>
                        <td><a href="{{ $project->download_url }}" target="_blank">Download</a></td>
                        <td><a href="{{ $project->documentation_url }}" target="_blank">Docs</a></td>
                        <td>{{ $project->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning">Éditer</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

{{-- resources/views/admin/categories/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des catégories</h1>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Ajouter une catégorie</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nom</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning">Éditer</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Supprimer cette catégorie ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">Aucune catégorie</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

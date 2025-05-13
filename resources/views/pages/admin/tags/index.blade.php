@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des tags</h1>

    <a href="{{ route('admin.tags.create') }}" class="btn btn-primary mb-3">Ajouter un tag</a>

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
            @forelse($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->slug }}</td>
                    <td>
                        <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-sm btn-warning">Éditer</a>
                        <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Supprimer ce tag ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">Aucun tag trouvé</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

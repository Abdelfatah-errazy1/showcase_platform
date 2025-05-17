@extends('layouts.admin')
@section('toolbar')
    <x-toolbar 
    title="Tags"
    subtitle="All Tags List"
    createUrl="{{ route('admin.tags.create') }}"
/>
@endsection
@section('content')
<div class="container">
   <div class="card">
    <div class="card-body pt-3">
        
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
   </div>
</div>
@endsection

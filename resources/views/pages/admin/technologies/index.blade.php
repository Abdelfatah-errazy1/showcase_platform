@extends('layouts.admin')
@section('toolbar')
    <x-toolbar 
    title="Technologies"
    subtitle="All Technologies List"
    createUrl="{{ route('admin.technologies.create') }}"
/>
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body pt-3">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($technologies as $tech)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tech->name }}</td>
                            <td>{{ $tech->slug }}</td>
                            <td>
                                <a href="{{ route('admin.technologies.edit', $tech->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.technologies.destroy', $tech->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this technology?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

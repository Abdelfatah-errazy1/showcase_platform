@extends('layouts.admin')
@section('toolbar')
    <x-toolbar 
    title="Subscribers"
    subtitle="All Subscribers List"
    {{-- createUrl="{{ route('admin.technologies.create') }}" --}}
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
                        <th>email</th>
                        <th>from</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscribers as $sub)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sub->email }}</td>
                            <td>{{ $sub->from }}</td>
                            <td>
                                {{-- <a href="{{ route('admin.subscribers.edit', $sub->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.subscribers.destroy', $sub->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this subnology?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

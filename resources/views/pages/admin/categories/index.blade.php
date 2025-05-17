{{-- resources/views/admin/categories/index.blade.php --}}
@extends('layouts.admin')
@section('toolbar')
    <x-toolbar 
    title="Categories"
    subtitle="All Categories List"
    createUrl="{{ route('admin.categories.create') }}"
/>
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body pt-3">

            <table class="table datatable table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Pinned</th>
                                <th>Class</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{ $category->name }} <a href="{{ route('category.projects',$category->slug) }}" target="_blank"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                    {{-- <td>{!! str($category->description)->limit(40)  !!}</td> --}}
                                    <td>{{ $category->pinned ? 'Yes' : 'No' }}</td>
                                    <td>{{ $category->class??'none'  }}</td>
                                    <td>
                                        @if (!$category->pinned)
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pinModal"
                                                data-id="{{ $category->id }}" data-name="{{ $category->name }}">
                                            Pin
                                        </button>
                                
                                        @else
                                            <form action="{{ route('categories.unpin', $category->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button class="btn btn-danger" onclick="confirmDelete({{ route('categories.unpin', $category->id) }}">Unpin</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"><i class="fas fa-cog"></i>
                                            
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-2"
                                            data-kt-menu="true">
                                            <div class="menu-item text-hover-success px-3">
                                                <a href="{{  route('admin.categories.edit', $category) }}" class="btn "> <i class="fa fa-pen"></i> Edit</a>
                                            </div>
                                            <div class="menu-item text-hover-success px-3">
                                                <a href="{{  route('admin.categories.edit', $category) }}"   class="btn "> <i class="fa fa-pen"></i> {{ $category->pinned?'Pinned':'not Pinned' }}</a>
                                            </div>
                                            <div class="menu-item text-hover-danger px-3">
                                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn">
                                                    <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                         </div>
                                      </td>
                                    {{-- <td>
                                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-success btn-sm">Edit</a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No categories found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
        </div>
    </div>
</div>
<div class="modal fade" id="pinModal" tabindex="-1" aria-labelledby="pinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="pinForm" method="POST">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title" id="pinModalLabel">Pin Category</h3>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="categoryName"></p>
                    <label for="pinnedClass">Select Class:</label>
                    <select name="pinned_class" id="pinnedClass" class="form-control">
                        <option value="cat-1">cat-1</option>
                        <option value="cat-2">cat-2</option>
                        <option value="cat-3">cat-3</option>
                        <option value="cat-4">cat-4</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Pin</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const pinModal = document.getElementById('pinModal');
    const pinForm = document.getElementById('pinForm');
    const categoryName = document.getElementById('categoryName');

    pinModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const categoryId = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');

        categoryName.textContent = `Pin category: ${name}`;
        pinForm.action = `/admin/categories/${categoryId}/pin`;
    });
});
</script>
@endsection

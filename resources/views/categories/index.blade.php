@extends('layout')

@section('title', 'Categories')
@section('content')
<div class="container mx-2">
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3 mt-3">Create New Category</a>
        <a href="{{ route('subcategories.index') }}" class="btn btn-primary mb-3 mt-3">Switch to Subcategories</a>
        <div class="table-responsive overflow-x-auto mx-3">
            <table class="table table-zebra overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">        
            <thead>
                <tr class="text-center align-middle bg-purple-200 dark:bg-purple-700 text-black dark:text-white border border-gray-300">
                    <th>Name</th>
                    <th>Description</th>
                    <th>Subcategory</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr class="align-middle items-center text-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                        <td>{{ $category->Nosaukums }}</td>
                        <td>{{ $category->Apraksts }}</td>
                        @if ($category->parent)
                        <td>{{ $category->parent->Nosaukums }}</td>
                        @else
                        <td>-</td>
                        @endif
                        <td>
                            <a href="{{ route('categories.edit', $category->K_ID) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('categories.destroy', $category->K_ID) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-error !text-pink-100" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
@extends('layout')

@section('title', 'Sound categories')
@section('content')
<div class="container mx-2">
        <a href="{{ route('sound-categories.create') }}" class="btn btn-primary mb-3 mt-3">Create New Category</a>
        <div class="table-responsive overflow-x-auto mx-3">
            <table class="table table-zebra overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">  
            <thead>
                <tr class="text-center align-middle bg-blue-200 dark:bg-blue-700 text-black dark:text-white border border-gray-300">
                    <th>Name</th>
                    <th>Description</th>
                    <th>Subcategory</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($SoundCategory as $soundCategory)
                <tr class="align-middle items-center text-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                        <td>{{ $soundCategory->Nosaukums }}</td>
                        <td>{{ $soundCategory->Apraksts }}</td>
                        @if ($soundCategory->parent)
                        <td>{{ $soundCategory->parent->Nosaukums }}</td>
                        @else
                        <td>-</td>
                        @endif
                        <td>
                            <a href="{{ route('sound-categories.edit', $soundCategory->SKat_ID) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('sound-categories.destroy', $soundCategory->SKat_ID) }}" method="POST" style="display: inline;">
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
@extends('layout')

@section('title', 'Categories')
@section('header', 'Categories')
@section('content')
<div class="container">
        <h1>Categories</h1>

        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Create New Category</a>
        <a href="{{ route('subcategories.index') }}" class="btn btn-primary mb-3">Switch to Subcategories</a>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>Name</th>
                    <th>Description</th>
                    <th>Subcategory</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr class="text-center items-center">
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
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
</html>
@endsection
@extends('layout')

@section('title', 'Subcategory')
@section('header', 'Categories')
@section('content')
<div class="container">
        <h1>Subcategories</h1>

        <a href="{{ route('subcategories.create') }}" class="btn btn-primary mb-3">Create New Subcategory</a>
        <a href="{{ route('categories.index') }}" class="btn btn-primary mb-3">Back to Categories</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($subcategories as $subcategory)
    <tr>
        <td>{{ $subcategory->Nosaukums }}</td>
        <td>{{ $subcategory->Apraksts }}</td>
        <td>{{ optional($subcategory->kategorija)->Nosaukums }}</td>
        <td>
            <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-sm btn-primary">Edit</a>
            <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this subcategory?')">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
            </tbody>
        </table>
    </div>
@endsection
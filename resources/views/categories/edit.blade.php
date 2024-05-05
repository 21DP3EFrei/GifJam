@extends('categories.layoutCategory')

@section('title', 'Subcategories')

@section('content')
    <div class="container">
        <h2>Edit Category</h2>
        <form action="{{ route('categories.update', $kategorija->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Nosaukums">Category Name:</label>
                <input type="text" class="form-control" id="Nosaukums" name="Nosaukums" value="{{ $kategorija->Nosaukums }}" required>
            </div>
            <div class="form-group">
                <label for="Apraksts">Description:</label>
                <textarea class="form-control" id="Apraksts" name="Apraksts">{{ $kategorija->Apraksts }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

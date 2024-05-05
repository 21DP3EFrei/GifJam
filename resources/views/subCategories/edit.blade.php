@extends('categories.layoutCategory')

@section('title', 'Categories')


@section('content')
    <div class="container">
        <h2>Edit Subcategory</h2>
        <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Nosaukums">Subcategory Name:</label>
                <input type="text" class="form-control" id="Nosaukums" name="Nosaukums" value="{{ $subcategory->Nosaukums }}" required>
            </div>
            <div class="form-group">
                <label for="Apraksts">Description:</label>
                <textarea class="form-control" id="Apraksts" name="Apraksts">{{ $subcategory->Apraksts }}</textarea>
            </div>
            <div class="form-group">
                <label for="kategorija_id">Category:</label>
                <select class="form-control" id="kategorija_id" name="kategorija_id" required>
                @foreach($categories as $category)
                <option value="{{ $category->K_ID }}" {{ isset($subcategory) && $subcategory->kategorija_id == $category->id ? 'selected' : '' }}>{{ $category->Nosaukums }}</option>
                @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

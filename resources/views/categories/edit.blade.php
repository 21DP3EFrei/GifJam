@extends('layout')

@section('title', 'Edit Categories')
@section('content')
<div class="container">
        <h1>Edit Category</h1>
        <form action="{{ route('categories.update', ['categories' => $categories->K_ID]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="Nosaukums">Category Name:</label>
                <input type="text" class="form-control" id="name" name="Nosaukums" value="{{ $categories->Nosaukums }}" required>
            </div>
            <div class="form-group mb-2">
                <label for="Apraksts">Description:</label>
                <textarea class="form-control" id="description" name="Apraksts">{{ $categories->Apraksts }}</textarea>
            </div>
            <div class="form-group mb-2">
                <label for="apakskategorija">Subcategory of: </label>
                <select class="form-control" id="apakskategorija" name="Apakskategorija">
                    @if ($categories->Apakskategorija)  
                        <option value="{{ $categories->Apakskategorija }}" selected> {{ $categories->parent->Nosaukums }} </option>
                    @endif
                    <option value=""></option>
                    @foreach($allCategories as $category)
                        <!-- don't copy subcategory -->
                        @if ($category->K_ID !== $categories->K_ID)
                            <option value="{{ $category->K_ID }}">{{ $category->Nosaukums }}</option>
                        @endif
                    @endforeach
                </select>
                <h4 class="text-gray-500 text-xs">*Only choose this if you are making this a subcategory</h4>
            </div>
            

            <button type="submit" class="btn btn-primary mb-3">Update</button>
        </form>
    </div>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
</html>
@endsection
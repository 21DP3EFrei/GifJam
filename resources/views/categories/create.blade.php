@extends('layout')

@section('title', 'Create Categories')
@section('content')
<div class="container">
        <h1>Create Category</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="Nosaukums" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="Apraksts"></textarea>
            </div>
            <div class="mb-3">
                <label for="apakskategorija" class="form-label">Subcategory of: </label>
                <select class="form-control" id="apakskategorija" name="Apakskategorija">
                    <option value=""></option>
                    @foreach($categories as $category)
                   <option value="{{ $category->K_ID }}">{{ $category->Nosaukums }}</option>
                   @endforeach
                </select>
                <h4 class= 'text-gray-500 text-xs'>*Only choose this if you are making this a subcategory</h4>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
</html>
@endsection
@extends('layout')

@section('title', 'Edit Categories')
@section('header', 'Categories')
@section('content')
<div class="container">
        <h1>Edit Category</h1>
        <form action="{{ route('categories.update', ['kategorija' => $kategorija->K_ID]) }}" method="POST">
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
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
</html>
@endsection
@extends('layout')

@section('title', 'Subcategoryb info')
@section('header', 'Categories')
@section('content')
<div class="container">
        <h1>Subcategory Details</h1>
        <p><strong>Subcategory Name:</strong> {{ $subcategory->Nosaukums }}</p>
        <p><strong>Description:</strong> {{ $subcategory->Apraksts }}</p>
        <p><strong>Category:</strong> {{ $subcategory->kategorija->Nosaukums }}</p>
        <pre>{{ print_r($subcategory) }}</pre>

    </div>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
</html>
@endsection
@extends('categories.layoutCategory')

@section('title', 'Categories')

@section('content')
    <div class="container">
        <h2>Category Details</h2>
        <p><strong>Category Name:</strong> {{ $categories->Nosaukums }}</p>
        <p><strong>Description:</strong> {{ $categories->Apraksts }}</p>
    </div>
@endsection

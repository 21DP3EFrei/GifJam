@extends('categories.layoutCategory')

@section('title', 'Categories')

@section('content')
    <div class="container">
        <h2>Subcategory Details</h2>
        <p><strong>Subcategory Name:</strong> {{ $subcategory->Nosaukums }}</p>
        <p><strong>Description:</strong> {{ $subcategory->Apraksts }}</p>
        <p><strong>Category:</strong> {{ $subcategory->kategorija->Nosaukums }}</p>
        <pre>{{ print_r($subcategory) }}</pre>

    </div>
@endsection

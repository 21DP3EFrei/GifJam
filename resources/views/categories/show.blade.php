@extends('layout')

@section('title', 'Categories')
@section('header', 'Categories')
@section('content')
<div class="container">
<h1>Category Details</h1>
        <p><strong>Category Name:</strong> {{ $categories->Nosaukums }}</p>
        <p><strong>Description:</strong> {{ $categories->Apraksts }}</p>
    </div>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
</html>
@endsection
@extends('layout')

@section('title', 'Welcome')
{{-- @section('header', 'Welcome') --}}
@section('content')
<div class="container">
    <h1>Welcome</h1>
    @if (auth()->check())
        <p>Hello, {{ auth()->user()->name }}!</p>
        <p>You are logged in as a {{ auth()->user()->usertype }}.</p> <!-- Display user type -->
    @else
        <p>Please log in to access this area.</p>
    @endif
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
</html>
@endsection



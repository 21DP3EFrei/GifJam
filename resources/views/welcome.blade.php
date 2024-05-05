@extends('layout')
@section('title', "Main menu")
@section('content')
@if (auth()->check())
    Hello, {{ auth()->user()->name }}!
@else
    Please log in to access this area.
@endif
{{ auth()->user()->name }}
@endsection


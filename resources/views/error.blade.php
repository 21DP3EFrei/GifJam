@extends('layout')

@section('title', 'Error')
@section('content')
<div class="container">
    <You class="text-6xl my-2">{{ __('translation.error') }}:<br> {{ __('translation.errorMessage') }}</h1>
</div>
<!DOCTYPE html>
@endsection

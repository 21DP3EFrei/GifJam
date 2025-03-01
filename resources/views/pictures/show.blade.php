@extends('layout')

@section('title', $media->Nosaukums . ' Preview')
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        <button class="hover:border rounded w-24 h-10 text-lg transition ease-in hover:bg-blue-500" onclick="history.back()">← Go Back</button>
    </h2>
</x-custom-header>
<div class="container">
       <div class="container">
        <div class="row">
            <div class="col-md-6 mt-2">
                <h1>{{ $media->Nosaukums }} info</h1>
                <form>
                    <div class="mb-3">
                        <p>{{ $media->Apraksts }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <p class="form-control">{{ $media->Autors }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="copyright" class="form-label">Copyright</label>
                        <p class="form-control">{{ $media->Autortiesibas ? 'Yes' : 'No' }}</p>
                    </div>
                </form>
                <form action="{{ route('pictures.download', $media) }}" method="GET" class="mt-3">
                    @csrf
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 50px;">Download</button>
                </form>
            </div>
            <div class="col-md-6 align-middle items-center flex object-cover">
                <img src="{{ asset('storage/' . $media->Fails) }}" alt="{{ $media->Nosaukums }}"  class="cursor-pointer" onclick="this.classList.toggle('fixed'); this.classList.toggle('inset-0'); this.classList.toggle('w-full'); this.classList.toggle('h-full'); this.classList.toggle('object-contain'); this.classList.toggle('z-50'); this.classList.toggle('bg-black');"/>
            </div>
        </div>
    </div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
</html>
@endsection

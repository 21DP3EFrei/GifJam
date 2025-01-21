@extends('layout')
@section('title', $media->Nosaukums . ' Preview')
@section('header', 'Upload')
@section('content')
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>{{ $media->Nosaukums }} Info</h1>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label"><u>Name</u></label>
                        <p class="form-control">{{ $media->Nosaukums }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label"><u>Description</u></label>
                        <p class="form-control">{{ $media->Apraksts }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label"><u>Author</u></label>
                        <p class="form-control">{{ $media->Autors }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="copyright" class="form-label"><u>Copyright</u></label>
                        <p class="form-control">{{ $media->Autortiesibas ? 'Yes' : 'No' }}</p>
                    </div>
                </form>
                <form action="{{ route('pictures.download', $media) }}" method="GET" class="mt-3">
                    @csrf
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 50px;">Download</button>
                </form>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $media->Fails) }}" alt="{{ $media->Nosaukums }}" class="img-fluid">
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

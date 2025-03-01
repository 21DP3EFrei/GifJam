@extends('layout')
@section('title', 'Image')
@section('content')
<div class="container">
    <h1>Info</h1>
    <div class="row">
        <div class="col-12" style="padding:20px;">
            <div class="card">
                <div class="card-header">Show Images</div>
                <div class="card-body">
                    <div class="row">
                        @foreach($medias as $media)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="{{ Storage::url($media->Fails) }}" class="card-img-top" alt="{{ $media->Nosaukums }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $media->Nosaukums }}</h5>
                                    <p class="card-text">{{ $media->Apraksts }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
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

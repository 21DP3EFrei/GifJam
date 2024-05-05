@extends('layout')

@section('title', 'Pictures')

@section('content')
<div class="container">
    <h1>Gallery</h1>

    <form action="{{ route('pictures.index') }}" method="GET">
        <div class="mb-3">
            <label for="category_id" class="form-label">Select Category</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->K_ID }}">{{ $category->Nosaukums }}</option> 
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <div class="row mt-3">
        @foreach($pictures as $picture)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <a href="{{ route('pictures.show', $picture) }}"> <!-- Link to preview page -->
                        <img src="{{ asset('storage/' . $picture->Attels) }}" class="card-img-top" alt="{{ $picture->Nosaukums }}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $picture->Nosaukums }}</h5>
                        <p class="card-text">{{ $picture->Apraksts }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

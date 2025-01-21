@extends('layout')
@section('title', 'Gallery')
@section('header', 'Gallery')
@section('content')
<div class="container">
    <h1>Gallery</h1>

    <form id="filterForm" action="{{ route('pictures.index') }}" method="GET">
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" id="category_id" name="category_id" onchange="document.getElementById('filterForm').submit()">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->K_ID }}" {{ request('category_id') == $category->K_ID ? 'selected' : '' }}>{{ $category->Nosaukums }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="subcategory_id" class="form-label">Subcategory</label>
                {{-- <select class="form-select form-select-sm" id="subcategory_id" name="subcategory_id" onchange="document.getElementById('filterForm').submit()">
                    <option value="">All Subcategories</option>
                    @foreach($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}" {{ request('subcategory_id') == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->Nosaukums }}</option>
                    @endforeach 
                </select>  --}}
            </div>
            <div class="col-md-3">
                <label for="sort_by" class="form-label">Sort By</label>
                <select class="form-select form-select-sm" id="sort_by" name="sort_by" onchange="document.getElementById('filterForm').submit()">
                    <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                    <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Newest First</option>
                    <option value="name_az" {{ request('sort_by') == 'name_az' ? 'selected' : '' }}>Name (A-Z)</option>
                    <option value="author" {{ request('sort_by') == 'author' ? 'selected' : '' }}>Author</option>
                </select>
            </div>
            <form id="searchForm" action="{{ route('pictures.index') }}" method="GET">
            <div class="input-group mb-3">
        <input type="text" class="form-control" id="searchInput" name="search" placeholder="Search memes..." autocomplete="off">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>
</div>
</form>

    <div class="row mt-3">
        @foreach($pictures as $picture)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <a href="{{ route('pictures.show', $picture) }}"> <!-- Link to preview page -->
                        <img src="{{ asset('storage/' . $picture->Fails) }}" class="card-img-top" alt="{{ $picture->Nosaukums }}">
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
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
</html>
<script
document.getElementById('searchInput').addEventListener('input', function() {
    let searchValue = this.value.trim();
    if (searchValue === '') {
        document.getElementById('autosuggestDropdown').innerHTML = '';
        return;
    }

    // Make AJAX request to fetch autosuggestions
    fetch('{{ route("pictures.search") }}?search=' + searchValue)
        .then(response => response.json())
        .then(data => {
            let suggestionsHTML = '';
            data.forEach(suggestion => {
                suggestionsHTML += `<a class="dropdown-item" href="#">${suggestion.Nosaukums}</a>`;
            });
            document.getElementById('autosuggestDropdown').innerHTML = suggestionsHTML;
        })
        .catch(error => {
            console.error('Error fetching autosuggestions:', error);
        });
});
</script>
@endsection

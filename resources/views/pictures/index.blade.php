@extends('layout')
@section('title', 'Gallery')
@section('header', 'Gallery')

@section('content')
<div class="container">
    <!-- Filter Form -->
    <form method="GET" id="filterForm">
        <div class="row mb-2">
            <div class="col-md-3">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-select" onchange="document.getElementById('filterForm').submit()">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->K_ID }}" {{ request('category_id') == $category->K_ID ? 'selected' : '' }}>
                            {{ $category->Nosaukums }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-3">
                <label for="subcategory_id">Subcategory</label>
                <select name="subcategory_id" class="form-select" onchange="document.getElementById('filterForm').submit()">
                    <option value="">All Subcategories</option>
                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->K_ID }}" {{ request('subcategory_id') == $subcategory->K_ID ? 'selected' : '' }}>
                            {{ $subcategory->Nosaukums }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="sort_by">Sort By</label>
                <select class="form-select form-select-sm" id="sort_by" name="sort_by" onchange="document.getElementById('filterForm').submit()">
                    <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Newest First</option>
                    <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                    <option value="name_az" {{ request('sort_by') == 'name_az' ? 'selected' : '' }}>Name (A-Z)</option>
                    <option value="author" {{ request('sort_by') == 'author' ? 'selected' : '' }}>Author</option>
                </select>
            </div>
            <div class="col-md-3 mt-4">
                <a class="bg-red-500 border rounded btn text-white" href="{{ route('pictures.index')}}">X</a>
            </div>
        </div>
        
        <!-- Search Input -->
        <div class="input-group mb-3 mt-3">
            <input type="text" class="form-control" id="searchInput" name="search" placeholder="Search memes..." autocomplete="off">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <!-- Display Pictures -->
    <div class="row mt-3">
        @foreach($pictures as $picture)
            <div class="col-md-3 mb-3">
                <div class="card h-full">
                    <a href="{{ route('pictures.show', $picture) }}">
                        <img src="{{ asset('storage/' . $picture->Fails) }}" class="card-img-top object-contain w-full h-60" alt="{{ $picture->Nosaukums }}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $picture->Nosaukums }}</h5>
                        <p class="card-text text-gray-500">{{ $picture->Apraksts }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>    
    
@endsection

@push('scripts')
<script>
/* document.getElementById('searchInput').addEventListener('input', function() {
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
}); */
    // Fetch subcategories for the selected category

</script>
@endpush
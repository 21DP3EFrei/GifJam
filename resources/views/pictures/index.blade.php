@extends('layout')
@section('title', 'Gallery')
@section('content')
<div class="container">
    <!-- Filter Form -->
    <form method="POST" id="filterForm">
        @csrf
        <div class="row mb-2">
            <div class="col-md-3">
                <label for="category">Category</label>
                <select name="category" class="form-select" id="category">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->K_ID }}" {{ request('category_id') == $category->K_ID ? 'selected' : '' }}>
                            {{ $category->Nosaukums }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-3">
                <label for="subcategory">Subcategory</label>
                <select name="subcategory" class="form-select" id="subcategory">
                    <option value="">All Subcategories</option> <!-- Default option -->
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
    <div class="row mt-3 ">
        @if ($pictures->isEmpty())
        <div class="col-md-3 mb-3 flex items-center justify-center">
            <h1 class="text-white text-4xl font-bold">No media here yet...</h1>
        </div>        
        @else
            @foreach($pictures as $picture)
                <div class="col-md-3 mb-3">
                    <div class="card h-80">
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
        @endif
    </div>
       
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Handle category change
    $('#category').on('change', function(){
        var category_id = $('#category').val();

        if (category_id) {
            var url = "{{ route('getSubcategories', ['category_id' => ':category_id']) }}";
            url = url.replace(':category_id', category_id);

            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    if (data.success) {
                        var subcategory_data = data.data;
                        $('#subcategory').html('<option value="">All Subcategories</option>'); // Reset to default
                        $.each(subcategory_data, function(key, value) {
                            $('#subcategory').append('<option value="'+value.K_ID+'">'+value.Nosaukums+'</option>');
                        });
                    } else {
                        alert(data.msg);
                    }
                },
                error: function() {
                    alert('Failed to load subcategories.');
                }
            });
        } else {
            // Reset subcategory dropdown if no category selected
            $('#subcategory').html('<option value="">All Subcategories</option>');
        }
    });

    // Handle changes in filters to apply filtering via AJAX
    $('#category, #subcategory, #searchInput, #sort_by').on('change keyup', function() {
        var category_id = $('#category').val();
        var subcategory_id = $('#subcategory').val();
        var search = $('#searchInput').val();
        var sort_by = $('#sort_by').val();

        $.ajax({
            url: "{{ route('pictures.index') }}",
            type: "GET",
            data: {
                category_id: category_id,
                subcategory_id: subcategory_id,
                search: search,
                sort_by: sort_by
            },
            success: function(data) {
                $('.row.mt-3').html(data.data); // Update the media content dynamically
            },
            error: function() {
                alert('Error loading media.');
            }
        });
    });
});
</script>

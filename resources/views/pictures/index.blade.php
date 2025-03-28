@extends('layout')
@section('title',  __('translation.navigation_gallery'))
@section('content')
<div class="container">
    <!-- Filter Form -->
    <form method="GET" id="filterForm" class="mx-2">
        @csrf
        <div class="flex gap-5 items-start">
            <div class="col-md-3 flex flex-col w-80">
                <label for="category">{{ __('translation.navigation_categoriesName') }}</label>
                <select name="category_id" class="input input-md rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white" id="category">
                    <option value="">{{ __('translation.allCategories') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->K_ID }}" {{ request('category_id') == $category->K_ID ? 'selected' : '' }}>
                            {{ $category->Nosaukums }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-3 flex flex-col w-80">
                <label for="subcategory">{{ __('translation.subcategory') }}</label>
                <select name="subcategory_id" class="input input-md rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white" id="subcategory">
                    <option value="">{{ __('translation.allSubcategories') }}</option>
                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->K_ID }}" {{ request('subcategory_id') == $subcategory->K_ID ? 'selected' : '' }}>
                            {{ $subcategory->Nosaukums }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-3 flex flex-col w-50">
                <label for="sort_by">{{ __('translation.sortBy') }}</label>
                <select class="input input-md rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white" id="sort_by" name="sort_by">
                    <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>{{ __('translation.newest') }}</option>
                    <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>{{ __('translation.oldest') }}</option>
                    <option value="name_az" {{ request('sort_by') == 'name_az' ? 'selected' : '' }}>{{ __('translation.nameAZ') }}</option>
                    <option value="author" {{ request('sort_by') == 'author' ? 'selected' : '' }}>{{ __('translation.author') }}</option>
                </select>
            </div>
            <div class="col-md-3 flex flex-col mt-6">
                <a href="{{ route('pictures.index') }}" class="p-2 btn-circle btn btn-error text-white border border-black inline-block">X</a>
            </div>
        </div>
        
        <!-- Search Input -->
        <div class="flex items-center gap-2 mt-8">
            <svg class="h-5 w-5 opacity-50 text-gray-500 dark:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></g></svg>
            <input  type="text" class="grow input input-md rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white" id="searchInput" name="search" placeholder="{{ __('translation.searchMeme') }}" autocomplete="off"/>
            <button type="submit" class="btn btn-primary w-30">{{ __('translation.search') }}</button>
        </div>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mt-3 row mx-1 my-1">
        @if ($pictures->isEmpty())
            <div class="col-span-full flex items-center justify-center">
                <h1 class="text-white text-4xl font-bold text-center">{{ __('translation.noMedia') }}</h1>
            </div>
        @else
            @foreach ($pictures as $picture)
                <div class="rounded-2xl bg-white dark:bg-gray-400 shadow-lg overflow-hidden">
                    <!-- Image -->
                    <a href="{{ route('pictures.show', $picture) }}">
                        <img src="{{ asset('storage/' . $picture->Fails) }}"  class="card-img-top object-contain w-full h-60" alt="{{ $picture->Nosaukums }}"> {{-- class="w-full h-60 object-cover rounded-t-2xl" fill card--}}
                    </a>
                    <!-- Card Body -->
                    <div class="p-4 border-t-2 border-black dark:bg-blue-400 bg-gray-300">
                        <h5 class="font-bold text-lg truncate">{{ $picture->Nosaukums }}</h5>
                        <p class="text-sm text-gray-700 dark:text-gray-200 truncate">{{ $picture->Apraksts }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // Handle category change
    $('#category').on('change', function () {
        var category_id = $('#category').val();

        if (category_id) {
            var url = "{{ route('getSubcategories', ['category_id' => ':category_id']) }}";
            url = url.replace(':category_id', category_id);

            $.ajax({
                url: url,
                type: "GET",
                success: function (data) {
                    if (data.success) {
                        var subcategory_data = data.data;
                        $('#subcategory').html('<option value="">All Subcategories</option>'); // Reset to default
                        $.each(subcategory_data, function (key, value) {
                            $('#subcategory').append('<option value="' + value.K_ID + '">' + value.Nosaukums + '</option>');
                        });

                        // Trigger a filter update after loading subcategories
                        applyFilters();
                    } else {
                        alert(data.msg);
                    }
                },
                error: function () {
                    alert('Failed to load subcategories.');
                }
            });
        } else {
            // Reset subcategory dropdown if no category selected
            $('#subcategory').html('<option value="">All Subcategories</option>');

            // Trigger a filter update after resetting subcategories
            applyFilters();
        }
    });

    // Handle changes in filters to apply filtering via AJAX
    $('#category, #subcategory, #searchInput, #sort_by').on('change keyup', function () {
        applyFilters();
    });

    // Function to apply filters and update the media content
    function applyFilters() {
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
            success: function (data) {
                $('.row.mt-3').html(data.data); // Update the media content dynamically

                // Optionally, update the URL with query parameters
                var urlParams = new URLSearchParams({
                    category_id: category_id,
                    subcategory_id: subcategory_id,
                    search: search,
                    sort_by: sort_by
                }).toString();

                history.pushState(null, '', '?' + urlParams);
            },
            error: function () {
                alert('Error loading media.');
            }
        });
    }
});
</script>

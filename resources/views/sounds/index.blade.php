@extends('layout')
@section('title', __('translation.sLibrary'))
@section('content')

<div class="container mx-auto py-1 px-2">
    <!-- Filter Form -->
    <form method="GET" id="filterForm">
        @csrf
        <div class="flex gap-5 items-start">
            <div class="col-md-3 flex flex-col w-80">
                <label for="category">{{ __('translation.category') }}</label>
                <select name="category_id" class="input input-md rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white" id="category">
                    <option value="">{{ __('translation.allCategories') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->SKat_ID }}" {{ request('sound_category_id') == $category->SKat_ID ? 'selected' : '' }}>
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
                        <option value="{{ $subcategory->SKat_ID }}" {{ request('subcategory_id') == $subcategory->SKat_ID ? 'selected' : '' }}>
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
                    <option value="author" {{ request('sort_by') == 'author' ? 'selected' : '' }}>{{ __('translation.authors') }}</option>
                </select>
            </div>
            <div class="col-md-3 flex flex-col mt-6">
                <a id="clear" href="{{ route('sounds.index') }}" class="p-2 btn-circle btn btn-error text-white border border-black inline-block">X</a>
            </div>
        </div>
        
        <!-- Search Input -->
        <div class="flex items-center gap-2 mt-8 mb-2">
            <svg class="h-5 w-5 opacity-50 text-gray-500 dark:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></g></svg>
            <input title="{{ __('translation.search') }}" type="text" class="grow input input-md rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white" id="searchInput" name="search" placeholder="{{ __('translation.searchSound') }}" autocomplete="off"/>
            <button id="search" type="submit" class="btn btn-primary w-30">{{ __('translation.search') }}</button>
        </div>
    </form>

    <!-- Sounds Table -->
    <div class="overflow-x-auto" id="soundTableContainer">
        @if ($sound->isEmpty())
            <div>
                <h1 class="text-center text-4xl font-bold dark:text-white text-black py-4">
                    {{ __('translation.noMedia') }}
                </h1>
            </div>
        @else
            <table class="table table-zebra overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">        
            <thead>
                <tr class="text-center align-middle bg-gray-200 dark:bg-gray-700 text-black dark:text-white border border-gray-300">
                    <th>{{ __('translation.name') }}</th>
                    <th>{{ __('translation.description') }}</th>
                    <th>{{ __('translation.category') }}</th>
                    <th>{{ __('translation.play') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sound as $sounds)
                        <tr class="hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                            <td><a class="hover:text-blue-400 hover:underline" href="{{ route('sounds.show', $sounds) }}">{{ Str::limit($sounds->Nosaukums, 25) }}</a></td>
                        <td class="text-center">{{ Str::limit($sounds->Apraksts, 25) }}</td>
                            <td>
                        @if ($sounds->skana && $sounds->skana->skanaKategorija->isNotEmpty())
                            @foreach ($sounds->skana->skanaKategorija as $category)
                                {{ Str::limit($category->Nosaukums, 25) }}{{ !$loop->last ? ', ' : '' }}
                            @endforeach
                        @else
                                    -
                        @endif
                            </td>
                            <td class="items-center text-center">
                                <media-controller audio style="--media-background-color: transparent;">
                                    <audio slot="media" src="{{ asset('storage/' . $sounds->Fails) }}"></audio>
                                    <media-control-bar>
                                        <media-play-button style="--media-control-background: transparent; --media-control-hover-background: transparent;" class="pr-5">
                                            <span slot="play"><img class="h-6 w-6 mr-1 min-h-6 min-w-6" src="{{ asset('images/play.svg') }}"  alt="{{ __('translation.playBut') }}"></span>
                                            <span slot="pause"><img class="h-6 w-6 mr-1" src="{{ asset('images/pause.svg') }}"  alt="{{ __('translation.pauseBut') }}"></span>
                                        </media-play-button>
                                        <media-duration-display style="--media-control-background: transparent; --media-control-hover-background: transparent;" class="text-black dark:text-white"></media-duration-display>
                                    </media-control-bar>
                                </media-controller>
                            </td> 
                            <td>
                                <label class="swap swap-rotate bg-cyan-200 rounded-full border-amber-600 items-center">
                                    <input 
                                        type="checkbox" 
                                        id="like-checkbox-{{ $sounds->Me_ID }}" 
                                        onchange="toggleLike({{ $sounds->Me_ID }}, this.checked)" 
                                        {{ Auth::user()->likeMedia($sounds) ? 'checked' : '' }} 
                                    />
                                    <!-- On -->
                                    <svg 
                                        id="like-icon-{{ $sounds->Me_ID }}" 
                                        class="swap-on fill-current w-8 h-8 text-black mt-0.5 p-1 {{ Auth::user()->likeMedia($sounds) ? '' : 'hidden' }}" 
                                        xmlns="http://www.w3.org/2000/svg" 
                                        viewBox="0 0 24 24"
                                    >
                                        <path d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" fill="#ff0000"/>
                                    </svg>
                                    <!-- Off -->
                                    <svg 
                                        id="unlike-icon-{{ $sounds->Me_ID }}" 
                                        class="swap-off fill-current w-8 h-8 text-black bg-transparent mt-0.5 p-1 {{ Auth::user()->likeMedia($sounds) ? 'hidden' : '' }}" 
                                        viewBox="0 0 24 24" 
                                        fill="none" 
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path 
                                            fill="none" 
                                            fill-rule="evenodd" 
                                            clip-rule="evenodd" 
                                            d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" 
                                            fill="#ff0000" 
                                            stroke="#000000" 
                                            stroke-width="2" 
                                            stroke-linecap="round" 
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </label>
                            </td>                                                
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        </div>
    </div>


<script>
$(document).ready(function () {

    // Handle category change
    $('#category').on('change', function () {
        var category_id = $('#category').val();

        if (category_id) {
            var url = "{{ route('getSoundSubCategories', ['sound_category_id' => ':category_id']) }}";
            url = url.replace(':category_id', category_id);

            $.ajax({
                url: url,
                type: "GET",
                success: function (data) {
                    if (data.success) {
                        var subcategory_data = data.data;
                        $('#subcategory').html('<option value="">All Subcategories</option>'); // Reset to default
                        $.each(subcategory_data, function (key, value) {
                            $('#subcategory').append('<option value="' + value.SKat_ID + '">' + value.Nosaukums + '</option>');
                        });

                        // Trigger a filter update after loading subs
                        applyFilters();
                    } else {
                        alert(data.msg);
                    }
                },
                error: function () {
                    alert('Fail.');
                }
            });
        } else {
            // Reset subcategory dropdown if no category selected
            $('#subcategory').html('<option value="">All Subcategories</option>');

            // Trigger a filter update after resetting subs
            applyFilters();
        }
    });

    // Handle changes in filters to apply filtering via AJAX
    $('#category, #subcategory, #searchInput, #sort_by').on('change keyup', function () {
        applyFilters();
    });

    // Function to apply filters and update the media content
    function applyFilters() {
        var sound_category_id = $('#category').val();
        var subcategory_id = $('#subcategory').val();
        var search = $('#searchInput').val();
        var sort_by = $('#sort_by').val();

        $.ajax({
            url: "{{ route('sounds.index') }}",
            type: "GET",
            data: {
                sound_category_id: sound_category_id,
                subcategory_id: subcategory_id,
                search: search,
                sort_by: sort_by
            },
            success: function (data) {
                $('#soundTableContainer').html(data.data); // Update the media content dynamically
                
                if (typeof MediaChrome !== 'undefined') {
        MediaChrome.defineCustomElements();
    }
                // Optionally, update the URL with query parameters
                var urlParams = new URLSearchParams({
                    sound_category_id: sound_category_id,
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
document.addEventListener('DOMContentLoaded', function () {
    if (typeof MediaChrome !== 'undefined') {
        MediaChrome.defineCustomElements();
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const clearButton = document.getElementById('clear');

    clearButton.addEventListener('click', function(event) {
        if (clearButton.disabled) {
            event.preventDefault(); 
            return;
        }

        clearButton.disabled = true;
        clearButton.style.pointerEvents = 'none'; 
        clearButton.style.opacity = '0.5'; 

        setTimeout(() => {
            clearButton.disabled = false;
            clearButton.style.pointerEvents = 'auto';
            clearButton.style.opacity = '1';
        }, 5000);
    });
});

document.getElementById("filterForm").addEventListener("submit", function(event) {
    // Get the submit button
    const searchButton = document.getElementById("search");

    // Disable the button to prevent multiple submissions
    searchButton.disabled = true;
    searchButton.innerHTML = '<span class="loading loading-spinner text-warning"></span>';

    // Re-enable the button after 5 seconds
    setTimeout(function() {
        searchButton.disabled = false;
    }, 5000);
});

function toggleLike(media, isChecked) {
    const url = isChecked ? `/media/${media}/like` : `/media/${media}/unlike`;

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({})
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Find the checkbox and swap elements for the specific media item
            const checkbox = document.getElementById(`like-checkbox-${media}`);
            const swapOn = document.querySelector(`#like-icon-${media}`);
            const swapOff = document.querySelector(`#unlike-icon-${media}`);

            // Toggle the visibility of the swap icons
            if (isChecked) {
                swapOn.classList.remove('hidden'); // Show the "liked" icon
                swapOff.classList.add('hidden');   // Hide the "unliked" icon
            } else {
                swapOn.classList.add('hidden');    // Hide the "liked" icon
                swapOff.classList.remove('hidden');// Show the "unliked" icon
            }

            // Ensure the checkbox state matches the server response
            checkbox.checked = isChecked;
        } else {
            console.error('Error:', data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}    const url = isChecked ? `/media/${media}/like` : `/media/${media}/unlike`;

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({})
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Find the checkbox and swap elements for the specific media item
            const checkbox = document.getElementById(`like-checkbox-${media}`);
            const swapOn = document.querySelector(`#like-checkbox-${media} + .swap-on`);
            const swapOff = document.querySelector(`#like-checkbox-${media} + .swap-off`);

            // Toggle the visibility of the swap icons
            if (isChecked) {
                swapOn.style.display = 'inline'; // Show the "liked" icon
                swapOff.style.display = 'none';  // Hide the "unliked" icon
            } else {
                swapOn.style.display = 'none';  // Hide the "liked" icon
                swapOff.style.display = 'inline'; // Show the "unliked" icon
            }

            // Ensure the checkbox state matches the server response
            checkbox.checked = isChecked;
        } else {
            console.error('Error:', data.message);
        }
    })
    .catch(error => console.error('Error:', error));
</script>
@endsection
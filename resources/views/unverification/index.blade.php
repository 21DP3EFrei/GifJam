@extends('layout')

@section('title', __('translation.unverify'))
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        {{ __('translation.unverify') }}
    </h2>
</x-custom-header>
<div class="container mx-2 px-1 py-1">
    <a id="switch" type="submit" class="btn btn-primary mt-2 mb-2" href="{{ route('verification.index') }}">{{ __('translation.pending') }}</a>
    @if (session('success'))
    <div class="alert alert-success mx-2 my-2 mr-3">{{ session('success') }}</div>
    @endif
    @if(request()->has('search'))
      <x-back-button />
    @endif  
    @if ($approvedMedia->isEmpty() && request()->has('search'))
    <div class="col-span-full flex items-center justify-center">
        <h1 class="dark:text-white text-black text-3xl font-bold text-center">{{ __('translation.emptyVerifySearch') }}</h1>
    </div>
    @elseif ($approvedMedia->isEmpty())
    <div class="col-span-full flex items-center justify-center">
        <h1 class="dark:text-white text-black text-3xl font-bold text-center">{{ __('translation.emptyVerify') }}</h1>
    </div>
    @else
    <form action="{{ route('unverification.index') }}" method="GET" id="filterForm">
        @csrf
        <div class="flex items-center gap-2 mt-5 px-2 pb-2">
            <svg class="h-5 w-5 opacity-50 text-gray-500 dark:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></g></svg>
            <input title="{{ __('translation.search') }}" type="text" class="grow input input-md rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white" id="searchInput" name="search" placeholder="{{ __('translation.searchMedia') }}" autocomplete="off"/>
            <button id="search" type="submit" class="btn btn-primary w-30">{{ __('translation.search') }}</button>
        </div>
    </form>
    <div class="table-responsive overflow-x-auto mx-2" id="mediaTableBody">
        <table class="table table-zebra overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">
        <thead>
            <tr class="text-center align-middle bg-slate-100 dark:bg-cyan-700 text-black dark:text-white border border-gray-300">
                <th class="border-separate border border-gray-400">{{ __('translation.fileName') }}</th>
                <th class="border-separate border border-gray-400">{{ __('translation.description') }}</th>
                <th class="border-separate border border-gray-400">{{ __('translation.actions') }}</th>
                <th class="border-separate border border-gray-400">{{ __('translation.category') }} / {{ __('translation.gen') }}</th>
                <th class="border-separate border border-gray-400">{{ __('translation.file') }}</th>
                <th class="border-separate border border-gray-400">{{ __('translation.uploaded') }}</th>
                <th class="border-separate border border-gray-400">{{ __('translation.updated') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($approvedMedia as $media)
            <tr class="align-middle items-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                <td>
                    <div class="flex items-center space-x-4">
                            <a href="{{ route('unverification.edit', $media->Me_ID) }}" class="h-8 w-8 flex border rounded-full position-absolute dark:bg-transparent bg-gray-200 items-center flex-shrink-0 hover:!bg-blue-700 transition ease-in-out duration-300 border-black dark:border-white edit"><svg class="dark:!fill-white fill-gray-500 hover:!fill-white transition ease-in-out duration-300" version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px" viewBox="-35.84 -35.84 135.68 135.68" enable-background="new 0 0 64 64" xml:space="preserve" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M62.828,12.482L51.514,1.168c-1.562-1.562-4.093-1.562-5.657,0.001c0,0-44.646,44.646-45.255,45.255 C-0.006,47.031,0,47.996,0,47.996l0.001,13.999c0,1.105,0.896,2,1.999,2.001h4.99c0.003,0,9.01,0,9.01,0s0.963,0.008,1.572-0.602 s45.256-45.257,45.256-45.257C64.392,16.575,64.392,14.046,62.828,12.482z M37.356,12.497l3.535,3.536L6.95,49.976l-3.536-3.536 L37.356,12.497z M8.364,51.39l33.941-33.942l4.243,4.243L12.606,55.632L8.364,51.39z M3.001,61.995c-0.553,0-1.001-0.446-1-0.999 v-1.583l2.582,2.582H3.001z M7.411,61.996l-5.41-5.41l0.001-8.73l14.141,14.141H7.411z M17.557,60.582l-3.536-3.536l33.942-33.94 l3.535,3.535L17.557,60.582z M52.912,25.227L38.771,11.083l2.828-2.828l14.143,14.143L52.912,25.227z M61.414,16.725l-4.259,4.259 L43.013,6.841l4.258-4.257c0.782-0.782,2.049-0.782,2.829-0.002l11.314,11.314C62.195,14.678,62.194,15.943,61.414,16.725z"></path></g></svg></a>
                        <div class="text-left">
                            {{ Str::limit($media->Nosaukums, 14) }}
                        </div>
                    </div>
                </td>
                @unless (empty($media->Apraksts))
                <td>{{ Str::limit($media->Apraksts, 25) }}</td>
                @else
                <td class="text-center">-</td>
                @endunless                
                <td>
                    <form id="myform" action="{{ route('unverification.mediaunverify', $media) }}" method="POST">
                        @csrf
                        <div class="flex items-center py-1">
                            <input class="radio bg-red-100 border-red-700 checked:bg-red-700 checked:text-red-600 checked:border-red-600 cursor-pointer" type="radio" name="status" id="unapprove{{ $media->id }}" value="1">
                            <label class="ml-1" for="unapprove{{ $media->id }}">{{ __('translation.unverifying') }}</label>
                        </div>
                        <button id="update" type="submit" class="bg-red-500 text-black px-4 py-2 rounded-sm cursor-pointer">{{ __('translation.update') }}</button>
                    </form>
                </td>
                <td class="align-middle text-center">
                    <div class="flex items-center justify-center space-x-2">
                        @if ($media->Multivides_tips == 'Image' && $media->kategorijas && $media->kategorijas->isNotEmpty())
                            <img class="h-7 w-7" src="{{ asset('images/image.svg') }}" alt="{{ __('translation.pic') }}">
                            <span>
                                @foreach($media->kategorijas as $category)
                                    {{ Str::limit($category->Nosaukums, 30) }}{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </span>
                        
                        @elseif ($media->Multivides_tips == 'Sound' && $media->skana && $media->skana->skanaKategorija && $media->skana->skanaKategorija->isNotEmpty())
                            <img class="h-7 w-7" src="{{ asset('images/sound.svg') }}" alt="{{ __('translation.sfx') }}">
                            <span>
                                @foreach($media->skana->skanaKategorija as $category)
                                    {{ Str::limit($category->Nosaukums, 30) }}{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </span>
                
                        @elseif ($media->Multivides_tips == 'Music' && $media->music && $media->music->zanrs && $media->music->zanrs->isNotEmpty())
                            <img class="h-7 w-7" src="{{ asset('images/music.svg') }}" alt="{{ __('translation.music') }}">
                            <span>
                                @foreach($media->music->zanrs as $genre)
                                    {{ Str::limit($genre->Nosaukums, 30) }}{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </span>
                        @else
                            -
                        @endif
                    </div>
                </td>
                    @if ($media->Multivides_tips == 'Image')
                    <td class="text-center">
                        <div class="flex flex-col items-center">
                            <img class="cursor-pointer mb-2" src="{{ asset('storage/' . $media->Fails) }}" alt="{{ $media->Nosaukums }}" width="100" height="100" onclick="this.classList.toggle('fixed'); this.classList.toggle('inset-0'); this.classList.toggle('w-full'); this.classList.toggle('h-full'); this.classList.toggle('object-contain'); this.classList.toggle('z-50'); this.classList.toggle('bg-black');"/>       
                            <x-download-button :media="$media" />
                        </div>
                    </td>
                    @elseif ($media->Multivides_tips == 'Sound' || $media->Multivides_tips == 'Music')
                    <td>
                        <div class="flex items-center justify-between">
                        <media-controller audio style="--media-background-color: transparent;">
                            <audio slot="media" src="{{ asset('storage/' . $media->Fails) }}" crossorigin></audio>
                        <media-control-bar class="flex items-center justify-between w-full flex-col">
                            <!-- Left Controls -->
                            <div class="flex items-center">
                                <media-play-button class="bg-blue" style="--media-control-background: transparent; --media-control-hover-background: transparent;"></media-play-button>
                            </div>
                            <div class="flex items-center">
                                <media-playback-rate-button rates="0.5 1 2" style="--media-control-background: transparent; --media-control-hover-background: transparent;"></media-playback-rate-button> <!-- Rate limit is 16 -->
                            </div>
                
                            <!-- Time Display -->
                            <div class="flex items-center space-x-1">
                                <media-time-display style="--media-control-background: transparent; --media-control-hover-background: transparent;"></media-time-display><p>/ </p>
                                <media-duration-display style="--media-control-background: transparent; --media-control-hover-background: transparent;"></media-duration-display>
                            </div>
                        </media-control-bar>
                        </media-controller>
                        <x-download-button :media="$media" />
                        </div>
                    </td>
                    @else
                    <td class="text-center">-</td>
                    @endif    
                <td class="text-center">{{ $media->created_at->format('d M Y')}}</td>
                <td class="text-center">{{ $media->updated_at->format('D/M/Y')}} {{ $media->updated_at->format('H:i')}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    @endif
</div>
<script>

    function applyFilters() {
    var search = $('#searchInput').val();
    $.ajax({
        url: "{{ route('unverification.index') }}",
        type: "GET",
        data: {
            search: search,
        },
        success: function (data) {
            $('#mediaTableBody').html(data.data); // Update the table body dynamically
            var urlParams = new URLSearchParams({
                search: search,
            }).toString();
            history.pushState(null, '', '?' + urlParams);
        },
        error: function () {
            alert('Error loading media.');
        }
    });
}

document.getElementById("myform").addEventListener("submit", function() {
    const updateButton = document.getElementById("update");

        // Change text immediately
        updateButton.disabled = true;
        updateButton.innerHTML = '<span class="loading loading-spinner text-warning"></span>';

        // Re-enable the button after 5 seconds
        setTimeout(function() {
            updateButton.disabled = false;
        }, 5000);
    });

document.addEventListener('DOMContentLoaded', function () {
const editButtons = document.querySelectorAll('.edit');

editButtons.forEach(function (editButton) {
    editButton.addEventListener('click', function (event) {
        if (editButton.disabled) {
            event.preventDefault();
            return;
        }

        editButton.disabled = true;
        editButton.style.pointerEvents = 'none';
        editButton.style.opacity = '0.5';

        setTimeout(() => {
            editButton.disabled = false;
            editButton.style.pointerEvents = 'auto';
            editButton.style.opacity = '1';
        }, 5000);
    });
});
});

document.addEventListener('DOMContentLoaded', function() {
    const switchButton = document.getElementById('switch');

    // Add a click event listener
    switchButton.addEventListener('click', function(event) {
        // Prevent default action if the button is already disabled
        if (switchButton.disabled) {
            event.preventDefault(); 
            return;
        }

        // Disable the button for 5 seconds
        switchButton.disabled = true;
        switchButton.style.pointerEvents = 'none'; // Disable hover/click effects
        switchButton.style.opacity = '0.5'; // Visually indicate it's disabled

        setTimeout(() => {
            switchButton.disabled = false;
            switchButton.style.pointerEvents = 'auto';
            switchButton.style.opacity = '1';
        }, 5000);
    });
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

document.addEventListener('DOMContentLoaded', function() {
const backButton = document.getElementById('back');

backButton.addEventListener('click', function(event) {
    if (backButton.disabled) {
event.preventDefault(); 
return;
}

backButton.disabled = true;
backButton.style.pointerEvents = 'none'; 
backButton.style.opacity = '0.5'; 

setTimeout(() => {
    backButton.disabled = false;
    backButton.style.pointerEvents = 'auto';
    backButton.style.opacity = '1';
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
</script>
<style>
media-controller {
    --media-primary-color: rgb(0, 0, 0);
}

@media (prefers-color-scheme: dark) {
    media-controller{
    --media-primary-color: rgb(255, 255, 255);
}

}
</style>
@endsection
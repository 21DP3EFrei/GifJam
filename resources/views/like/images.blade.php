@extends('layout')
@section('title',  __('translation.navigation_likes'))
@section('content')
<div class="container">
<x-custom-header name="custom-header">
    <div id="custom-header" class="flex flex-row space-x-4 justify-around">
    <div>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white hover:text-blue-300 leading-tight ml-2 dark:hover:text-blue-400 transition ease-in-out duration-150 border-b-2 border-cyan-500 cursor-wait">
            {{ __('translation.images') }}      
        </h2>
    </div>
    <a href="{{ route('likesS') }}" class="nav-link">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white hover:text-blue-300 leading-tight ml-2 dark:hover:text-blue-400 transition ease-in-out duration-150">
            {{ __('translation.sound') }}     
        </h2>
    </a>
    <a href="{{ route('likesM') }}" class="nav-link">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white hover:text-blue-300 leading-tight ml-2 dark:hover:text-blue-400 transition ease-in-out duration-150">
            {{ __('translation.music') }}      
        </h2>
    </a>
    </div>
</x-custom-header>

@if ($picture->isNotEmpty())
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mt-3 row mx-1 my-1">
            @foreach ($picture as $pictures)
                <div class="rounded-2xl bg-gray-200 dark:bg-gray-400 shadow-lg overflow-hidden">
                    <label class="swap swap-rotate">
                        <input type="checkbox" id="like-checkbox-{{ $pictures->Me_ID }}" onchange="toggleLike({{ $pictures->Me_ID }}, this.checked)" {{ Auth::user()->likeMedia($pictures) ? 'checked' : '' }} />
                        <!-- On -->
                        <svg id="like-icon-{{ $pictures->Me_ID }}" class="swap-on fill-current w-8 h-8 text-black ml-1 {{ Auth::user()->likeMedia($pictures) ? '' : 'hidden' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" fill="#ff0000"/>
                        </svg>
                        <!-- Off -->
                        <svg id="unlike-icon-{{ $pictures->Me_ID }}" class="swap-off fill-current w-8 h-8 text-black bg-transparent ml-1 {{ Auth::user()->likeMedia($pictures) ? 'hidden' : '' }}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" fill="#ff0000" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </label>
                    <!-- Image -->
                    <a href="{{ route('media.show', $pictures) }}">
                        <img src="{{ asset('storage/' . $pictures->Fails) }}"  class="card-img-top object-contain w-full h-60" alt="{{ $pictures->Nosaukums }}"> {{-- class="w-full h-60 object-cover rounded-t-2xl" fill card--}}
                    </a>
                    <!-- Card Body -->
                    <div class="p-4 border-t-2 border-black dark:bg-blue-400 bg-blue-300">
                        <h5 class="font-bold text-lg truncate">{{ $pictures->Nosaukums }}</h5>
                        <p class="text-sm text-gray-700 dark:text-gray-200 truncate">{{ $pictures->Apraksts }}</p>
                    </div>
                </div>
            @endforeach
    </div>
@else
<div>
    <h1 colspan="5" class="text-center text-4xl font-bold dark:text-white text-black py-4">
        {{ __('translation.likePic') }}
    </h1>
</div>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
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


document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            // Disable the link visually and prevent further interaction
            link.style.pointerEvents = 'none';
            link.style.opacity = '0.5';

            // Optional: also disable the inner <h2> (visual effect)
            const h2 = link.querySelector('h2');
            if (h2) {
                h2.style.opacity = '0.5';
            }
        });
    });
});
</script>
@endsection
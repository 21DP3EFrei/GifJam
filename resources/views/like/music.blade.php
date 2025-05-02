@extends('layout')
@section('title',  __('translation.navigation_likes'))
@section('content')
<div class="container">
    <x-custom-header name="custom-header">
        <div class="flex flex-row space-x-4 justify-around">
        <a href="{{ route('likesP') }}" class="nav-link">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white hover:text-blue-300 leading-tight ml-2 dark:hover:text-blue-400 transition ease-in-out duration-150">
                {{ __('translation.images') }}      
            </h2>
        </a>
        <a href="{{ route('likesS') }}" class="nav-link">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white hover:text-blue-300 leading-tight ml-2 dark:hover:text-blue-400 transition ease-in-out duration-150">
                {{ __('translation.sound') }}     
            </h2>
        </a>
        <div href="{{ route('likesM') }}">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white hover:text-blue-300 leading-tight ml-2 dark:hover:text-blue-400 transition ease-in-out duration-150 border-b-2 border-cyan-500 cursor-wait">
                {{ __('translation.music') }}      
            </h2>
        </div>
        </div>
    </x-custom-header>

@if ($music->isNotEmpty())
<div class="overflow-x-auto">
<table class="table table-zebra overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse mx-1">        
    <thead>
        <tr class="text-center align-middle bg-rose-200 dark:bg-rose-950 text-black dark:text-white border border-gray-300">
            <th>{{ __('translation.name') }}</th>
            <th>{{ __('translation.description') }}</th>
            <th>{{ __('translation.navigation_genre') }}</th>
            <th>{{ __('translation.released') }}</th>
            <th>{{ __('translation.play') }}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($music as $musics)
                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                    <td><a class="hover:text-blue-400 hover:underline" href="{{ route('media.show', $musics) }}">{{ Str::limit($musics->Nosaukums, 25) }}</a></td>
                <td class="text-center">{{ Str::limit($musics->Apraksts, 25) }}</td>
                    <td>
                @if ($musics->music && $musics->music->zanrs->isNotEmpty())
                    @foreach ($musics->music->zanrs as $genre)
                        {{ Str::limit($genre->Nosaukums, 25) }}{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                @else
                  -
                @endif
                <td class="text-center">
                    {{ $musics->music->Izlaists }}
                </td>
                    </td>
                    <td class="items-center text-center">
                        <media-controller audio style="--media-background-color: transparent;">
                            <audio slot="media" src="{{ asset('storage/' . $musics->Fails) }}"></audio>
                            <media-control-bar>
                                <media-play-button style="--media-control-background: transparent; --media-control-hover-background: transparent;" class="pr-5">
                                        <span slot="play"><img class="h-6 w-6 mr-1 min-h-6 min-w-6" src="{{ asset('images/play.svg') }}"  alt="{{ __('translation.playBut') }}"></span>
                                        <span slot="pause"><img class="h-6 w-6 mr-1" src="{{ asset('images/pause.svg') }}"  alt="{{ __('translation.pauseBut') }}"></span>
                                </media-play-button>
                                <media-duration-display style="--media-control-background: transparent; --media-control-hover-background: transparent;" class="text-black dark:text-white"></media-duration-display>
                            </media-control-bar>
                        </media-controller>
                    </td>     
                <td class="items-center text-center">
                    <label class="swap swap-rotate bg-cyan-200 rounded-full border-amber-600 items-center">
                        <input type="checkbox" id="like-checkbox-{{ $musics->Me_ID }}" onchange="toggleLike({{ $musics->Me_ID }}, this.checked)" {{ Auth::user()->likeMedia($musics) ? 'checked' : '' }} />
                        <!-- On -->
                        <svg id="like-icon-{{ $musics->Me_ID }}" class="swap-on fill-current w-8 h-8 text-black mt-0.5 p-1 {{ Auth::user()->likeMedia($musics) ? '' : 'hidden' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" fill="#ff0000"/>
                        </svg>
                        <!-- Off -->
                        <svg id="unlike-icon-{{ $musics->Me_ID }}" class="swap-off fill-current w-8 h-8 text-black bg-transparent mt-0.5 p-1 {{ Auth::user()->likeMedia($musics) ? 'hidden' : '' }}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" fill="#ff0000" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </label>
                </td>                       
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@else
<div>
    <h1 colspan="5" class="text-center text-4xl font-bold dark:text-white text-black py-4">
        {{ __('translation.likeMusic') }}
    </h1>
</div>
@endif
@endsection

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
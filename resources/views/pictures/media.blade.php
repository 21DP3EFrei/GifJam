    @if ($pictures->isEmpty())
        <div class="col-span-full flex items-center justify-center">
            <h1 class="dark:text-white text-black text-4xl font-bold text-center">{{ __('translation.noMedia') }}</h1>
        </div>
    @else
    @foreach ($pictures as $picture)
    <div class="rounded-2xl bg-gray-200 dark:bg-gray-400 shadow-lg overflow-hidden">
        <label class="swap swap-rotate">
            <input type="checkbox" id="like-checkbox-{{ $picture->Me_ID }}" onchange="toggleLike({{ $picture->Me_ID }}, this.checked)" {{ Auth::user()->likeMedia($picture) ? 'checked' : '' }} />
            <!-- On -->
            <svg id="like-icon-{{ $picture->Me_ID }}" class="swap-on fill-current w-8 h-8 text-black ml-1 {{ Auth::user()->likeMedia($picture) ? '' : 'hidden' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" fill="#ff0000"/>
            </svg>
            <!-- Off -->
            <svg id="unlike-icon-{{ $picture->Me_ID }}" class="swap-off fill-current w-8 h-8 text-black bg-transparent ml-1 {{ Auth::user()->likeMedia($picture) ? 'hidden' : '' }}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" fill="#ff0000" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </label>
        <!-- Image -->
        <a href="{{ route('media.show', $picture) }}">
            <img src="{{ asset('storage/' . $picture->Fails) }}"  class="card-img-top object-contain w-full h-60" alt="{{ $picture->Nosaukums }}"> {{-- class="w-full h-60 object-cover rounded-t-2xl" fill card--}}
        </a>
        <!-- Card Body -->
        <div class="p-4 border-t-2 border-black dark:bg-blue-400 bg-blue-300">
            <h5 class="font-bold text-lg truncate">{{ $picture->Nosaukums }}</h5>
            <p class="text-sm text-gray-700 dark:text-gray-200 truncate">{{ $picture->Apraksts }}</p>
        </div>
    </div>
@endforeach
    @endif
</div>
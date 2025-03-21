    @if ($pictures->isEmpty())
        <div class="col-span-full flex items-center justify-center">
            <h1 class="text-white text-4xl font-bold text-center">No media here yet...</h1>
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
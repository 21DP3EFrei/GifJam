@if ($music->isEmpty())
<div>
    <h1 colspan="5" class="text-center text-4xl font-bold text-gray-500 dark:text-gray-300 py-4">
        {{ __('translation.noMedia') }}
    </h1>
</div>
@else
<table class="table table-zebra overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">        
    <thead>
        <tr class="text-center align-middle bg-rose-200 dark:bg-rose-950 text-black dark:text-white border border-gray-300">
            <th>{{ __('translation.name') }}</th>
            <th>{{ __('translation.description') }}</th>
            <th>{{ __('translation.navigation_genre') }}</th>
            <th>{{ __('translation.released') }}</th>
            <th>{{ __('translation.play') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($music as $musics)
                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                    <td><a class="hover:text-blue-400 hover:underline" href="{{ route('music.show', $musics) }}">{{ Str::limit($musics->Nosaukums, 25) }}</a></td>
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
            </tr>
        @endforeach
    </tbody>
</table>
@endif
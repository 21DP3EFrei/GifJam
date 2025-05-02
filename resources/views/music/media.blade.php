@if ($music->isEmpty())
<div>
    <h1 colspan="5" class="text-center text-4xl font-bold text-black dark:text-white py-4">
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
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($music as $musics)
            <tr class="hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                <td><a class="hover:text-blue-400 hover:underline" href="{{ route('media.show', $musics) }}">{{ Str::limit($musics->Nosaukums, 25) }}</a></td>
                <td class="text-center">
                @unless (empty($musics->Apraksts))
                    {{ Str::limit($musics->Apraksts, 25) }}
                @else
                    -
                @endunless
                </td>
                <td>
                @if ($musics->music && $musics->music->zanrs->isNotEmpty())
                    @foreach ($musics->music->zanrs as $genre)
                        {{ Str::limit($genre->Nosaukums, 25) }}{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                @else
                -
                @endif
                </td>
                <td class="text-center">
                @unless (empty($musics->music->Izlaists) )
                    {{ $musics->music->Izlaists }}
                @else
                -
                @endunless
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
@endif
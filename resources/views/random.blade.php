@extends('layout')

@section('title', 'Random')

@section('content')
<div class="flex flex-col">
    <div class="w-full">
        <a href="{{ route( 'random') }}" id="randomButton" class="btn btn-primary w-full text-white border border-black">🔁</a>
    </div>
        {{-- image --}}
        @if($random->Multivides_tips == 'Image')
        <div class="table-responsive overflow-x-auto mx-3 mt-2">
          <table class="table overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">
              <thead>
                  <tr class="text-center align-middle bg-slate-100 dark:bg-cyan-700 text-black dark:text-white border border-gray-300">
                      <th class="border-separate border border-gray-400">{{ __('translation.fileName') }}</th>
                      <th class="border-separate border border-gray-400">{{ __('translation.description') }}</th>
                      <th class="border-separate border border-gray-400">{{ __('translation.category') }}</th>
                      <th class="border-separate border border-gray-400">{{ __('translation.author') }}</th>
                      <th class="border-separate border border-gray-400">{{ __('translation.copyright') }}</th>
                      <th class="border-separate border border-gray-400 justify-center flex"><img class="h-7 w-7" src="{{ asset('images/image.svg') }}" alt="{{ __('translation.pic') }}"></th>
                  </tr>
              </thead>
              <tbody>
                  <tr class="align-middle items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                      <td>
                          <div class="flex items-center space-x-4">
                              <div class="text-left">
                                  {{ Str::limit($random->Nosaukums, 20) }}
                              </div>
                          </div>
                      </td>
                      @unless (empty($random->Apraksts))
                      <td>{{ Str::limit($random->Apraksts, 25) }}</td>
                      @else
                      <td class="text-center">-</td>
                      @endunless
                      <td class="align-middle text-center">
                          <div class="flex items-center justify-center space-x-2">
                              @if ($random->kategorijas && $random->kategorijas->isNotEmpty())
                                      @foreach($random->kategorijas as $category)
                                          {{ Str::limit($category->Nosaukums, 20) }}{{ !$loop->last ? ', ' : '' }}
                                      @endforeach
                              @else
                                  <span>-</span>
                              @endif
                          </div>
                      </td>
                      <td>
                      <div class="text-left">
                          {{ Str::limit($random->Autors, 20) }}
                      </div>
                      </td>
                      <td class="text-center">{{ $random->Autortiesibas ? __('translation.does') : __('translation.doesnot') }}</td>
                      <td class="justify-center flex">
                        <div class="border rounded-full w-9 h-9 transition ease-in-out duration-300 hover:bg-blue-300">
                            <form action="{{ route('media.download', $random) }}" method="GET" class="space-y-2">
                                @csrf
                                <button type="submit" class="w-full h-full text-xl text-center text-blue-600 underline hover:text-blue-800 tooltip" data-tip="{{ __('translation.download') }}">↓</button>
                            </form>
                        </div>
                      </td>                
                  </tr>
              </tbody>
          </table>
          </div>
        <div class="w-full md:w-1/2 flex justify-center items-center mt-1 mx-auto">
                <img src="{{ asset('storage/' . $random->Fails) }}" alt="{{ $random->Nosaukums }}"  class="cursor-pointer rounded-lg shadow-lg" onclick="this.classList.toggle('fixed'); this.classList.toggle('inset-0'); this.classList.toggle('w-full'); this.classList.toggle('h-full'); this.classList.toggle('object-contain'); this.classList.toggle('z-50'); this.classList.toggle('bg-black');"/>
        </div>

        @endif

        {{-- sound --}}
        @if($random->Multivides_tips == 'Sound')
        <div class="table-responsive overflow-x-auto mx-3 mt-2">
            <table class="table overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">
                <thead>
                    <tr class="text-center align-middle bg-slate-100 dark:bg-cyan-700 text-black dark:text-white border border-gray-300">
                        <th class="border-separate border border-gray-400">{{ __('translation.fileName') }}</th>
                        <th class="border-separate border border-gray-400">{{ __('translation.description') }}</th>
                        <th class="border-separate border border-gray-400">{{ __('translation.category') }}</th>
                        <th class="border-separate border border-gray-400">{{ __('translation.bitrate') }}</th>
                        <th class="border-separate border border-gray-400 justify-center flex"><img class="h-7 w-7" src="{{ asset('images/sound.svg') }}" alt="{{ __('translation.sfx') }}"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-middle items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                        <td>
                            <div class="flex items-center space-x-4">
                                <div class="text-left">
                                    {{ Str::limit($random->Nosaukums, 20) }}
                                </div>
                            </div>
                        </td>
                        @unless (empty($random->Apraksts))
                        <td>{{ Str::limit($random->Apraksts, 25) }}</td>
                        @else
                        <td class="text-center">-</td>
                        @endunless
                        <td class="align-middle text-center">
                            <div class="flex items-center justify-center space-x-2">
                                @if ($random->skana && $random->skana->skanaKategorija->isNotEmpty())
                                    @foreach($random->skana->skanaKategorija as $category)
                                        {{ Str::limit($category->Nosaukums, 20) }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                @else
                                    <span>-</span>
                                @endif
                            </div>
                        </td>
                        <td class="text-center">{{ round($random->skana->Bitrate / 1000) }} {{ __('translation.kbps') }}</td>              
                    <td class="justify-center flex">
                    <div class="border rounded-full w-9 h-9 transition ease-in-out duration-300 hover:bg-blue-300">
                        <form action="{{ route('media.download', $random) }}" method="GET" class="space-y-2">
                            @csrf
                            <button type="submit" class="w-full h-full text-xl text-center text-blue-600 underline hover:text-blue-800 tooltip" data-tip="{{ __('translation.download') }}">↓</button>
                        </form>
                    </div>
                    </td>  
                    </tr>
                </tbody>
            </table>
            </div>
        <media-controller audio id="mc" style="--media-background-color: transparent;" class="flex-col mx-auto mt-2">
                <audio slot="media" src="{{ asset('storage/' . $random->Fails) }}"></audio>
                <media-control-bar>
                  <media-play-button class="p-2"></media-play-button>
                  <media-time-display class="px-3" showduration=""></media-time-display>
                  <media-mute-button></media-mute-button>
                  <media-volume-range></media-volume-range>
                  <media-playback-rate-button rates="0.5 1 1.5 2"></media-playback-rate-button>
                </media-control-bar>
              </media-controller>
        @endif

        {{-- music --}}
        @if($random->Multivides_tips == 'Music')
        <div class="table-responsive overflow-x-auto mx-3 mt-2">
            <table class="table overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">
                <thead>
                    <tr class="text-center align-middle bg-slate-100 dark:bg-cyan-700 text-black dark:text-white border border-gray-300">
                        <th class="border-separate border border-gray-400">{{ __('translation.fileName') }}</th>
                        <th class="border-separate border border-gray-400">{{ __('translation.author') }}</th>
                        <th class="border-separate border border-gray-400">{{ __('translation.description') }}</th>
                        <th class="border-separate border border-gray-400">{{ __('translation.gen') }}</th>
                        <th class="border-separate border border-gray-400">{{ __('translation.bitrate') }}</th>
                        <th class="border-separate border border-gray-400">{{ __('translation.released') }}</th>
                        <th class="border-separate border border-gray-400 justify-center flex"><img class="h-7 w-7" src="{{ asset('images/music.svg') }}" alt="{{ __('translation.music') }}"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-middle items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                        <td>
                            <div class="flex items-center space-x-4">
                                <div class="text-left">
                                    {{ Str::limit($random->Nosaukums, 20) }}
                                </div>
                            </div>
                        </td>
                        <td>
                        <div class="text-left">
                            {{ Str::limit($random->Autors, 20) }}
                        </div>
                        </td>
                        @unless (empty($random->Apraksts))
                        <td>{{ Str::limit($random->Apraksts, 25) }}</td>
                        @else
                        <td class="text-center">-</td>
                        @endunless
                        <td class="align-middle text-center">
                            <div class="flex items-center justify-center space-x-2">
                                @if ($random->music && $random->music->zanrs->isNotEmpty())
                                    @foreach($random->music->zanrs as $category)
                                        {{ Str::limit($category->Nosaukums, 20) }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                @else
                                    <span>-</span>
                                @endif
                            </div>
                        </td>
                    <td class="text-center">{{ round($random->music->Bitrate / 1000) }} {{ __('translation.kbps') }}</td>         
                    <td class="text-center">{{ $random->music->Izlaists }}</td>                   
                    <td class="justify-center flex">
                    <div class="border rounded-full w-9 h-9 transition ease-in-out duration-300 hover:bg-blue-300">
                        <form action="{{ route('media.download', $random) }}" method="GET" class="space-y-2">
                            @csrf
                            <button type="submit" class="w-full h-full text-xl text-center text-blue-600 underline hover:text-blue-800 tooltip" data-tip="{{ __('translation.download') }}">↓</button>
                        </form>
                    </div>
                    </td>  
                    </tr>
                </tbody>
            </table>
            </div>
        <media-controller audio id="mc" style="--media-background-color: transparent;" class="flex-col mx-auto mt-2">
                <audio slot="media" src="{{ asset('storage/' . $random->Fails) }}"></audio>
                <media-control-bar>
                  <media-play-button class="p-2"></media-play-button>
                  <media-time-display class="px-3" showduration=""></media-time-display>
                  <media-mute-button></media-mute-button>
                  <media-volume-range></media-volume-range>
                  <media-playback-rate-button rates="0.5 1 1.5 2"></media-playback-rate-button>
                </media-control-bar>
              </media-controller>
        @endif
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const randomButton = document.getElementById('randomButton');

    if (!randomButton) {
        console.error('Random button not found!');
        return;
    }

    randomButton.addEventListener('click', function(event) {
        if (randomButton.disabled) {
            event.preventDefault(); 
            return;
        }

        // Disable the button visually and functionally
        randomButton.disabled = true;
        randomButton.style.pointerEvents = 'none'; 
        randomButton.style.opacity = '0.5'; 

        // Re-enable the button after 5 seconds
        setTimeout(() => {
            randomButton.disabled = false;
            randomButton.style.pointerEvents = 'auto';
            randomButton.style.opacity = '1';
        }, 5000);
    });
});
</script>
@endsection
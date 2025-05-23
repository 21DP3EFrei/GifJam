        {{-- image --}}
        @if($media->Multivides_tips == 'Image')
        <div class="table-responsive overflow-x-auto mx-3 mt-2">
          <table class="table overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">
              <thead>
                  <tr class="text-center align-middle bg-slate-100 dark:bg-cyan-700 text-black dark:text-white border border-gray-300">
                      <th class="border-separate border border-gray-400">{{ __('translation.fileName') }}</th>
                      <th class="border-separate border border-gray-400">{{ __('translation.description') }}</th>
                      <th class="border-separate border border-gray-400">{{ __('translation.category') }}</th>
                      <th class="border-separate border border-gray-400">{{ __('translation.author') }}</th>
                      <th class="border-separate border border-gray-400">{{ __('translation.copyright') }}</th>
                      <th class="border-separate border border-gray-400 text-center mx-auto"><img class="inline-block h-7 w-7" src="{{ asset('images/image.svg') }}" alt="{{ __('translation.pic') }}"></th>
                 </tr>
              </thead>
              <tbody>
                  <tr class="align-middle items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                      <td>
                          <div class="flex items-center space-x-4">
                              <div class="text-left">
                                  {{ Str::limit($media->Nosaukums, 20) }}
                              </div>
                          </div>
                      </td>
                      @unless (empty($media->Apraksts))
                      <td>{{ Str::limit($media->Apraksts, 25) }}</td>
                      @else
                      <td class="text-center">-</td>
                      @endunless
                      <td class="align-middle text-center">
                          <div class="flex items-center justify-center space-x-2">
                              @if ($media->kategorijas && $media->kategorijas->isNotEmpty())
                                      @foreach($media->kategorijas as $category)
                                          {{ Str::limit($category->Nosaukums, 20) }}{{ !$loop->last ? ', ' : '' }}
                                      @endforeach
                              @else
                                  <span>-</span>
                              @endif
                          </div>
                      </td>
                      <td>
                      <div class="text-left">
                          {{ Str::limit($media->Autors, 20) }}
                      </div>
                      </td>
                      <td class="text-center">{{ $media->Autortiesibas ? __('translation.does') : __('translation.doesnot') }}</td>
                      <td class="justify-center flex">
                        <x-download-button :media="$media" />
                      </td>                
                  </tr>
              </tbody>
          </table>
          </div>
        <div class="w-full md:w-1/2 flex justify-center items-center mt-1 mx-auto">
                <img src="{{ asset('storage/' . $media->Fails) }}" alt="{{ $media->Nosaukums }}"  class="cursor-pointer rounded-lg shadow-lg" onclick="this.classList.toggle('fixed'); this.classList.toggle('inset-0'); this.classList.toggle('w-full'); this.classList.toggle('h-full'); this.classList.toggle('object-contain'); this.classList.toggle('z-50'); this.classList.toggle('bg-black');"/>
        </div>

        @endif

        {{-- sound --}}
        @if($media->Multivides_tips == 'Sound')
        <div class="table-responsive overflow-x-auto mx-3 mt-2">
            <table class="table overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">
                <thead>
                    <tr class="text-center align-middle bg-slate-100 dark:bg-cyan-700 text-black dark:text-white border border-gray-300">
                        <th class="border-separate border border-gray-400">{{ __('translation.fileName') }}</th>
                        <th class="border-separate border border-gray-400">{{ __('translation.description') }}</th>
                        <th class="border-separate border border-gray-400">{{ __('translation.category') }}</th>
                        <th class="border-separate border border-gray-400">{{ __('translation.bitrate') }}</th>
                        <th class="border-separate border border-gray-400 text-center mx-auto"><img class="inline-block h-7 w-7" src="{{ asset('images/sound.svg') }}" alt="{{ __('translation.sfx') }}"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-middle items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                        <td>
                            <div class="flex items-center space-x-4">
                                <div class="text-left">
                                    {{ Str::limit($media->Nosaukums, 20) }}
                                </div>
                            </div>
                        </td>
                        @unless (empty($media->Apraksts))
                        <td>{{ Str::limit($media->Apraksts, 25) }}</td>
                        @else
                        <td class="text-center">-</td>
                        @endunless
                        <td class="align-middle text-center">
                            <div class="flex items-center justify-center space-x-2">
                                @if ($media->skana && $media->skana->skanaKategorija->isNotEmpty())
                                    @foreach($media->skana->skanaKategorija as $category)
                                        {{ Str::limit($category->Nosaukums, 20) }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                @else
                                    <span>-</span>
                                @endif
                            </div>
                        </td>
                        <td class="text-center">{{ round($media->skana->Bitrate / 1000) }} {{ __('translation.kbps') }}</td>              
                    <td class="justify-center flex">
                        <x-download-button :media="$media" />
                    </td>  
                    </tr>
                </tbody>
            </table>
            </div>
        <div class="flex justify-center items-center mt-2">
        <media-controller audio id="mc" style="--media-background-color: transparent;" class="inline-block">
                <audio slot="media" src="{{ asset('storage/' . $media->Fails) }}"></audio>
                <media-control-bar>
                  <media-play-button class="p-2"></media-play-button>
                  <media-time-display class="px-3" showduration=""></media-time-display>
                  <media-mute-button></media-mute-button>
                  <media-volume-range></media-volume-range>
                  <media-playback-rate-button rates="0.5 1 1.5 2"></media-playback-rate-button>
                </media-control-bar>
        </media-controller>
        </div>
        @endif

        {{-- music --}}
        @if($media->Multivides_tips == 'Music')
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
                        <th class="border-separate border border-gray-400 text-center mx-auto"><img class="inline-block h-7 w-7" src="{{ asset('images/music.svg') }}" alt="{{ __('translation.music') }}"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-middle items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                        <td>
                            <div class="flex items-center space-x-4">
                                <div class="text-left">
                                    {{ Str::limit($media->Nosaukums, 20) }}
                                </div>
                            </div>
                        </td>
                        <td>
                        <div class="text-left">
                            {{ Str::limit($media->Autors, 20) }}
                        </div>
                        </td>
                        @unless (empty($media->Apraksts))
                        <td>{{ Str::limit($media->Apraksts, 25) }}</td>
                        @else
                        <td class="text-center">-</td>
                        @endunless
                        <td class="align-middle text-center">
                            <div class="flex items-center justify-center space-x-2">
                                @if ($media->music && $media->music->zanrs->isNotEmpty())
                                    @foreach($media->music->zanrs as $category)
                                        {{ Str::limit($category->Nosaukums, 20) }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                @else
                                    <span>-</span>
                                @endif
                            </div>
                        </td>
                    <td class="text-center">{{ round($media->music->Bitrate / 1000) }} {{ __('translation.kbps') }}</td>         
                    <td class="text-center">{{ $media->music->Izlaists }}</td>                   
                    <td class="justify-center flex">
                        <x-download-button :media="$media" />
                    </td>  
                    </tr>
                </tbody>
            </table>
            </div>
        <div class="flex justify-center items-center mt-2">
        <media-controller audio id="mc" style="--media-background-color: transparent;" class="inline-block">
                <audio slot="media" src="{{ asset('storage/' . $media->Fails) }}"></audio>
                <media-control-bar>
                  <media-play-button class="p-2"></media-play-button>
                  <media-time-display class="px-3" showduration=""></media-time-display>
                  <media-mute-button></media-mute-button>
                  <media-volume-range></media-volume-range>
                  <media-playback-rate-button rates="0.5 1 1.5 2"></media-playback-rate-button>
                </media-control-bar>
        </media-controller>
        </div>
@endif
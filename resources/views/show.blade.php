@extends('layout')

@section('title', $media->Nosaukums . __('translation.preview'))
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        <x-back-button />
    </h2>
</x-custom-header>

<div class="container">

    <div class="flex flex-col md:flex-row gap-6">
        @if($media->Multivides_tips == 'Image')
        <!--Image info-->
        <div class="w-auto md:w-1/2 flex flex-col ml-4 my-4">
            <h1 class="text-2xl font-bold mb-4 break-words overflow-wrap">{{ $media->Nosaukums }}{{ __('translation.info') }}</h1>
            <form class="space-y-2 mr-2">
                <!-- Description -->
                @unless (empty($media->Apraksts))
                <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm h-auto">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">{{ __('translation.description') }}</h3>
                    <div class="flex flex-col"> 
                        <p class="text-gray-600 dark:text-gray-300 break-words overflow-wrap" >
                            {{ $media->Apraksts }}
                        </p>
                    </div>
                </div>
                @endunless
            
                <!-- Author -->
                <div class="items-center justify-between p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm h-auto">
                    <label for="author" class="text-sm font-medium text-gray-700 dark:text-gray-300 mr-2">{{ __('translation.author') }}</label>
                    <p class="text-sm text-gray-900 dark:text-white font-semibold break-words overflow-wrap">{{ $media->Autors }}</p>
                </div>
            
                <!-- Copyright -->
                <div class="flex items-center justify-between p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm">
                    <label for="copyright" class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('translation.copyright') }}</label>
                    <p class="text-sm text-gray-900 dark:text-white font-semibold">{{ $media->Autortiesibas ? __('translation.yes') : __('translation.no') }}</p>
                </div>
            </form>
            <!-- Download Button -->
            <form action="{{ route('media.download', $media) }}" method="GET" class="space-y-2">
                @csrf
                <button type="submit" class="btn btn-primary w-40 mt-3">{{ __('translation.download') }}</button>
            </form>
        </div>
        <div class="w-full md:w-1/2 flex justify-center items-center my-2">
            <img src="{{ asset('storage/' . $media->Fails) }}" alt="{{ $media->Nosaukums }}"  class="cursor-pointer rounded-lg shadow-lg" onclick="this.classList.toggle('fixed'); this.classList.toggle('inset-0'); this.classList.toggle('w-full'); this.classList.toggle('h-full'); this.classList.toggle('object-contain'); this.classList.toggle('z-50'); this.classList.toggle('bg-black');"/>
        </div>
        @elseif ($media->Multivides_tips == 'Music')    
        <!--Music info-->
        <div class="w-auto md:w-1/2 flex flex-col ml-4 my-4">
            <h1 class="text-2xl font-bold mb-4 break-words overflow-wrap">{{ $media->Nosaukums }}{{ __('translation.info') }}</h1>
            <form class="space-y-2 mr-2">
                @unless (empty($media->Apraksts))
                <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm h-auto">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">{{ __('translation.description') }}</h3>
                    <div class="flex flex-col"> 
                        <p class="text-gray-600 dark:text-gray-300 break-words overflow-wrap" >
                            {{ $media->Apraksts }}
                        </p>
                    </div>
                </div>
                @endunless

                <!--Mid section-->
                @if ($music->Bitrate !== null)
                <div class="flex items-center justify-between p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm">
                    <label for="author" class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('translation.bitrate') }}</label>
                    <p class="text-sm text-gray-900 dark:text-white font-semibold">{{round($music->Bitrate / 1000)}} {{ __('translation.kbps') }}</p>
                </div>
                @endif
                @if ($music->Izlaists !== null)
                <div class="flex items-center justify-between p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm">
                    <label for="author" class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('translation.released') }}</label>
                    <p class="text-sm text-gray-900 dark:text-white font-semibold">{{$music->Izlaists }}</p>
                </div>
                @endif
                <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm h-auto">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">{{ __('translation.description') }}</h3>
                    <div class="flex flex-col"> 
                        <p class="text-gray-600 dark:text-gray-300 break-words overflow-wrap" >
                            {{ $media->Apraksts }}
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-between p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm">
                    <label for="author" class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('translation.copyright') }}</label>
                    <p class="text-sm text-gray-900 dark:text-white font-semibold">{{ $media->Autortiesibas ? __('translation.yes') : __('translation.no') }}</p>
                </div>
            
            </form>
            <!-- Download Button -->
            <form action="{{ route('media.download', $media) }}" method="GET" class="space-y-2">
                @csrf
                <button type="submit" class="btn btn-primary w-40 mt-3">{{ __('translation.download') }}</button>
            </form>
        </div>
        <div class="w-full md:w-1/2 flex justify-center items-center my-2 mr-2">
            <media-controller audio id="mc" style="--media-background-color: transparent;" class="flex-col">
                <audio slot="media" src="{{ asset('storage/' . $media->Fails) }}"></audio>
                <media-control-bar>
                  <media-play-button class="p-2"></media-play-button>
                  <media-time-display showduration=""></media-time-display>
                  <media-mute-button></media-mute-button>
                  <media-volume-range></media-volume-range>
                  <media-playback-rate-button rates="0.5 1 1.5 2 8"></media-playback-rate-button>
                </media-control-bar>
              </media-controller>
       </div>
       @elseif ($media->Multivides_tips == 'Sound')
       <!--Sound info-->
       <div class="w-auto md:w-1/2 flex flex-col ml-4 my-4">
        <h1 class="text-2xl font-bold mb-4 break-words overflow-wrap">{{ $media->Nosaukums }}{{ __('translation.info') }}</h1>
        <form class="space-y-2 mr-2">
            <!-- Description -->
            @unless (empty($media->Apraksts))
            <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm h-auto">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">{{ __('translation.description') }}</h3>
                <div class="flex flex-col"> 
                    <p class="text-gray-600 dark:text-gray-300 break-words overflow-wrap" >
                        {{ $media->Apraksts }}
                    </p>
                </div>
            </div>
            @endunless
        
            <!-- Bittrate -->
            @if ($sound->Bitrate !== null)
            <div class="flex items-center justify-between p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm">
                <label for="author" class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('translation.bitrate') }}</label>
                <p class="text-sm text-gray-900 dark:text-white font-semibold">{{round($sound->Bitrate / 1000)}} {{ __('translation.kbps') }}</p>
            </div>
            @endif
            @unless (empty($media->Autors))
            <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm h-auto">
                <label for="author" class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('translation.author') }}</label>
                <div class="flex flex-col"> 
                    <p class="text-sm text-gray-900 dark:text-white font-semibold break-words overflow-wrap" >
                        {{ $media->Autors }}
                    </p>
                </div>
            </div>
            @endunless
        
        </form>
        <!-- Download Button -->
        <form action="{{ route('media.download', $media) }}" method="GET" class="space-y-2">
            @csrf
            <button type="submit" class="btn btn-primary w-40 mt-3">{{ __('translation.download') }}</button>
        </form>
     </div>
        <div class="w-full md:w-1/2 flex justify-center items-center my-2">
        <media-controller audio id="mc" style="--media-background-color: transparent;" class="flex-col">
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
   </div>

<!--end-->    
</div>

<script>
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
</script>
@endsection
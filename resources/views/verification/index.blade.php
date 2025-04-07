@extends('layout')

@section('title',  __('translation.verify'))
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        {{ __('translation.verify') }}
    </h2>
</x-custom-header>
<div class="container mx-2 py-1">
    <form action="{{ route('unverification.index') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary mt-2 mb-2">{{ __('translation.showApproved') }}</button>
    </form>
    @if (session('success'))
    <div class="alert alert-success mx-2 my-2 mr-3">{{ session('success') }}</div>
    @endif
    <div class="table-responsive overflow-x-auto mx-3">
    <table class="table table-zebra overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">
        <thead>
            <tr class="text-center align-middle bg-slate-100 dark:bg-cyan-700 text-black dark:text-white border border-gray-300">
                <th class="border-separate border border-gray-400">{{ __('translation.fileName') }}</th>
                <th class="border-separate border border-gray-400">{{ __('translation.description') }}</th>
              {{--   <th>Status</th> --}}
                <th class="border-separate border border-gray-400">{{ __('translation.actions') }}</th>
                <th class="border-separate border border-gray-400">{{ __('translation.category') }} / {{ __('translation.navigation_genre') }}</th>
                <th class="border-separate border border-gray-400">{{ __('translation.file') }}</th>
                <th class="border-separate border border-gray-400">{{ __('translation.submited') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unverifiedMems as $media)
            <tr class="align-middle items-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                <td>
                    <div class="flex items-center space-x-4">
                            <a href="{{ route('verification.edit', $media->Me_ID) }}" class="h-8 w-8 flex border rounded-full position-absolute items-center flex-shrink-0 hover:!bg-blue-700 transition ease-in-out duration-300"><svg class="dark:!fill-white fill-gray-500 hover:!fill-white transition ease-in-out duration-300" version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px" viewBox="-35.84 -35.84 135.68 135.68" enable-background="new 0 0 64 64" xml:space="preserve" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M62.828,12.482L51.514,1.168c-1.562-1.562-4.093-1.562-5.657,0.001c0,0-44.646,44.646-45.255,45.255 C-0.006,47.031,0,47.996,0,47.996l0.001,13.999c0,1.105,0.896,2,1.999,2.001h4.99c0.003,0,9.01,0,9.01,0s0.963,0.008,1.572-0.602 s45.256-45.257,45.256-45.257C64.392,16.575,64.392,14.046,62.828,12.482z M37.356,12.497l3.535,3.536L6.95,49.976l-3.536-3.536 L37.356,12.497z M8.364,51.39l33.941-33.942l4.243,4.243L12.606,55.632L8.364,51.39z M3.001,61.995c-0.553,0-1.001-0.446-1-0.999 v-1.583l2.582,2.582H3.001z M7.411,61.996l-5.41-5.41l0.001-8.73l14.141,14.141H7.411z M17.557,60.582l-3.536-3.536l33.942-33.94 l3.535,3.535L17.557,60.582z M52.912,25.227L38.771,11.083l2.828-2.828l14.143,14.143L52.912,25.227z M61.414,16.725l-4.259,4.259 L43.013,6.841l4.258-4.257c0.782-0.782,2.049-0.782,2.829-0.002l11.314,11.314C62.195,14.678,62.194,15.943,61.414,16.725z"></path></g></svg></a>
                        <div class="text-left">
                            {{ $media->Nosaukums }}
                        </div>
                    </div>
                </td>
                <td>{{ $media->Apraksts }}</td>
                {{-- <td>{{ $media->Status == 0 ? 'Pending' : ($media->Status == 1 ? 'Approved' : 'Rejected') }}</td> --}}
                <td>
                    <form action="{{ route('verification.mediaverify', $media) }}" method="POST" class="d-flex align-items-center me-3">
                        @csrf
                        @method('POST') 
                        <div class="flex flex-col">
                            <div class="flex items-center">
                                <input class="radio bg-green-100 border-green-700 checked:bg-green-700 checked:text-green-600 checked:border-green-600 cursor-pointer" type="radio" name="status" id="approve{{ $media->id }}" value="1">
                                <label class="ml-1 text-green-400 cursor-pointer" for="approve{{ $media->id }}">{{ __('translation.approve') }}</label>
                            </div>
                            <div class="flex items-center py-1">
                                <input class="radio bg-red-100 border-red-700 checked:bg-red-700 checked:text-red-600 checked:border-red-600 cursor-pointer" type="radio" name="status" id="reject{{ $media->id }}" value="0">
                                <label class="ml-1 text-red-400 cursor-pointer" for="reject{{ $media->id }}">{{ __('translation.reject') }}</label>
                            </div>
                        </div>
                        <button type="submit" class="bg-green-400 text-black px-4 py-2 rounded-sm cursor-pointer">{{ __('translation.submit') }}</button>
                    </form>
                </td>
                <td class="text-center">
                    @if ($media->Multivides_tips === 'Image' && $media->kategorijas && $media->kategorijas->isNotEmpty())
                        <strong>Categories:</strong>
                        @foreach($media->kategorijas as $category)
                            {{ $category->Nosaukums }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                        <br>
                
                        @elseif ($media->Multivides_tips === 'Sound' && $media->skana && $media->skana->skanaKategorija && $media->skana->skanaKategorija->isNotEmpty())
                            <strong>Sound Categories:</strong>
                            @foreach($media->skana->skanaKategorija as $category)
                                {{ $category->Nosaukums }}{{ !$loop->last ? ', ' : '' }}
                            @endforeach
                            <br>

                        @elseif ($media->Multivides_tips === 'Music' && $media->music && $media->music->zanrs && $media->music->zanrs->isNotEmpty())
                            <strong>Genres:</strong>
                            @foreach($media->music->zanrs as $genre)
                                {{ $genre->Nosaukums }}{{ !$loop->last ? ', ' : '' }}
                            @endforeach
                        @else
                        -
                        @endif
                </td>
                
                @if ($media->Multivides_tips === 'Image')
                <td class="text-center">
                    <div class="flex items-center justify-between space-x-2">
                    <img class="cursor-pointer" src="{{ asset('storage/' . $media->Fails) }}" alt="{{ $media->Nosaukums }}" width="100" height="100" onclick="this.classList.toggle('fixed'); this.classList.toggle('inset-0'); this.classList.toggle('w-full'); this.classList.toggle('h-full'); this.classList.toggle('object-contain'); this.classList.toggle('z-50'); this.classList.toggle('bg-black');"/>       
                    <div class="border rounded-full w-9 h-9 flex justify-center items-center transition ease-in-out duration-300 hover:bg-blue-300">
                        <a href="{{ asset('storage/' . $media->Fails) }}" download="{{ $media->Fails }}" class="w-full h-full text-xl text-center text-blue-600 underline hover:text-blue-800">↓</a>
                    </div>
                    </div>
                </td>
                @elseif ($media->Multivides_tips === 'Sound' || $media->Multivides_tips === 'Music')
                <td>
                    ​​<script type="module" src="https://cdn.jsdelivr.net/npm/media-chrome@3/+esm"> </script>
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
                    <div class="border rounded-full w-9 h-9 flex justify-center items-center transition ease-in-out duration-300 hover:bg-blue-300 text-end">
                        <a href="{{ asset('storage/' . $media->Fails) }}" download="{{ $media->Fails }}" class="w-full h-full text-xl text-center text-blue-600 underline hover:text-blue-800">↓</a>
                    </div>
                    </div>
                </td>
                @else
                <td class="text-center">-</td>
                @endif    

                @if ($media->user)
                <td class="text-center">
                    <div class="flex items-center justify-center">
                        @if (Auth::user()->id !== $media->user->id)
                        <!-- Block Form -->
                        @php
                            $isBlocked =  App\Models\Noblokets::where('L_ID', $media->user->id)->exists();
                        @endphp

                        @if (!$isBlocked)
                            <form action="{{ route('block.specific', $media->user) }}" method="POST" class="inline" onsubmit="return confirm(__('translation.confirmBlock'));">
                                @csrf
                                <button 
                                    type="submit" 
                                    class="h-8 w-auto px-4 py-1 flex items-center justify-center text-center transition ease-in-out duration-300 hover:text-blue-700"
                                    id="toggleReason-{{ $media->user->id }}" 
                                    onclick="toggleReasonInput('{{ $media->user->id }}')"
                                >
                                {{ $media->user->name}}<br>(id: {{$media->user->id}})
                                </button>
                                <div id="reasonInput-{{ $media->user->id }}" class="hidden my-2">
                                    <label for="Iemesls" class="block text-sm font-medium text-gray-700 dark:text-white"></label>
                                    <input 
                                        type="text" 
                                        name="Iemesls" 
                                        id="Iemesls" 
                                        placeholder="Reason?" 
                                        class="mt-1 input input-sm border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white w-full" 
                                        required
                                    >
                                    @error('Iemesls')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </form>
                        @else
                            <span class="text-gray-500 dark:text-gray-400 underline">{{ __('translation.blocke') }}<br> {{ $media->user->name}}<br>(id: {{$media->user->id}})<br></span>
                        @endif
                    @else
                        <!-- Disable Blocking Yourself -->
                        <span class="text-gray-500 dark:text-gray-400">{{ __('translation.you') }}</span>
                    @endif
                    </div>
                </td>
            @else
            <td class="text-center">-</td>
            @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
<script>
    function toggleReasonInput(userId) {
        const reasonInput = document.getElementById(`reasonInput-${userId}`);
        if (reasonInput.classList.contains('hidden')) {
            reasonInput.classList.remove('hidden');
        } else {
            reasonInput.classList.add('hidden');
        }
    }
</script>
@endsection

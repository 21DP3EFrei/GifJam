@extends('layout')

@section('title',  __('translation.editMedia'))
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        <x-back-button />
    </h2>
</x-custom-header>
<div class="container mx-3">
    <h1 class="h1">{{ __('translation.editMedia') }}</h1>
    @if ($errors->any())
    <div class="alert alert-error mr-5g">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <form id="myform" action="{{ route('unverification.update', ['media' => $media->Me_ID]) }}" method="POST" class="mt-2 px-8 rounded-xl">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="Nosaukums">{{ __('translation.media') }} {{ __('translation.name') }}:</label>
                <input title="{{ __('translation.titlefilename') }}" type="text" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="Nosaukums" name="Nosaukums" value="{{ $media->Nosaukums }}" required oninvalid="this.setCustomValidity('{{ __('translation.fillName') }}')"oninput="this.setCustomValidity('')">
            </div>
            <div class="form-group mb-2">
                <label for="Apraksts">{{ __('translation.description') }}:</label>
                <textarea title="{{ __('translation.titlefildescr') }}" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="Apraksts" name="Apraksts">{{ $media->Apraksts }}</textarea>
            </div>
            <div class="form-group mb-2">
                <label for="Autors">{{ __('translation.author') }}:</label>
                <textarea title="{{ __('translation.titlefilauthor') }}" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="Autors" name="Autors">{{ $media->Autors }}</textarea>
            </div>
            @if ($media->Multivides_tips === 'Sound')
            <div class="form-group mb-2">
                <label for="Bitrate">{{ __('translation.bitrate') }}:</label>
                <input  type="number" title="{{ __('translation.bitrate') }}" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="Bitrate" name="Bitrate" value="{{ $sound->Bitrate }}" oninvalid="this.setCustomValidity('{{ __('translation.errorbitrate') }}')"oninput="this.setCustomValidity('')" onKeyPress="if(this.value.length==9) return false;"></input>
            </div>
            @endif
            @if ($media->Multivides_tips === 'Music')
            <div class="form-group mb-2">
                <label for="Bitrate">{{ __('translation.bitrate') }}:</label>
                <input type="number" title="{{ __('translation.bitrate') }}" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="Bitrate" name="Bitrate" value="{{ $music->Bitrate }}" oninvalid="this.setCustomValidity('{{ __('translation.errorbitrate') }}')"oninput="this.setCustomValidity('')" onKeyPress="if(this.value.length==9) return false;"></input>
            </div>
            <div class="form-group mb-2">
                <label for="Izlaists">{{ __('translation.released') }}:</label>
                <input type="number" title="{{ __('translation.release') }}" max="9999" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="Izlaists" name="Izlaists" value="{{ $music->Izlaists }}" oninvalid="this.setCustomValidity('{{ __('translation.errorYear') }}')"oninput="this.setCustomValidity('')" onKeyPress="if(this.value.length==4) return false;"></input>
            </div>
            @endif
            <div class="my-5 flex flex-col">
                <label for="Autortiesibas" class="form-label">{{ __('translation.copyright') }}</label>
                <input type="hidden"  name="Autortiesibas" id="Autortiesibas" value="0" >
                <input title="{{ __('translation.titleCopyright') }}" type="checkbox" value="1" 
                class="checkbox rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-8 h-8" name="Autortiesibas" id="Autortiesibas"
                {{ $media->Autortiesibas == 1 ? 'checked' : '' }}>
            </div>
            <td class="text-center">
                @if ($media->Multivides_tips === 'Image')
                <div class="my-5 flex flex-col">
                    <label for="Kategorija_id" class="form-label">{{ __('translation.category') }}</label>
                    <select title="{{ __('translation.category') }}" class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="Kategorija_id" id="Kategorija_id" required oninvalid="this.setCustomValidity('{{ __('translation.fillFileCategory') }}')"oninput="this.setCustomValidity('')">
                        @foreach($categories as $category)
                            <option value="{{ $category->K_ID }}" {{ $media->kategorijas->contains($category->K_ID) ? 'selected' : '' }}>
                                {{ $category->Nosaukums }}
                            </option>
                            @endforeach
                        </select>
                    </div>

            @elseif ($media->Multivides_tips === 'Sound')
                <div class="my-5 flex flex-col">
                    <label for="SoundKategorija_id" class="form-label">{{ __('translation.category') }}</label>
                    <select title="{{ __('translation.category') }}" class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="SoundKategorija_id" id="SoundKategorija_id" required oninvalid="this.setCustomValidity('{{ __('translation.fillFileCategory') }}')"oninput="this.setCustomValidity('')">
                        @foreach($soundCategories as $category)
                            <option value="{{ $category->SKat_ID }}" 
                                {{ $media->skana && $media->skana->skanaKategorija->contains($category->SKat_ID) ? 'selected' : '' }}>
                                {{ $category->Nosaukums }}
                            </option>
                        @endforeach
                    </select>
                </div>

            @elseif ($media->Multivides_tips === 'Music')
            <div class="my-5 flex flex-col">
                <label for="Zanrs_id" class="form-label">{{ __('translation.navigation_genre') }}</label>
                <select title="{{ __('translation.navigation_genre') }}" class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="Zanrs_id" id="Zanrs_id" required oninvalid="this.setCustomValidity('{{ __('translation.fillFileGenre') }}')"oninput="this.setCustomValidity('')">
                        @foreach($zanrs as $genre)
                            <option value="{{ $genre->Z_ID }}" 
                                {{ $media->music && $media->music->zanrs->contains($genre->Z_ID) ? 'selected' : '' }}>
                                {{ $genre->Nosaukums }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
            </td>
            <button id="update" type="submit" class="btn btn-primary mb-3">{{ __('translation.update') }}</button>
        </form>
    </div>
<script>
document.getElementById("myform").addEventListener("submit", function(event) {
        // Get the submit button
        const submitButton = document.getElementById("update");

        // Disable the button to prevent multiple submissions
        submitButton.disabled = true;
        submitButton.innerHTML = '<span class="loading loading-spinner text-warning"></span>';

        // Re-enable the button after 5 seconds
        setTimeout(function() {
            submitButton.disabled = false;
        }, 5000);
    });

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
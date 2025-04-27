@extends('layout')

@section('title',  __('translation.editGenre'))
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        <button id="back" class="hover:border rounded-sm w-24 h-10 text-lg transition ease-in hover:bg-blue-500 cursor-pointer" onclick="history.back()">{{ __('translation.back') }}</button>
    </h2>
</x-custom-header>
@php
use App\Models\Zanrs;
@endphp
<div class="container mx-3">
        <h1 class="h1">{{ __('translation.editGenre') }}</h1>
        @if ($errors->any())
        <div class="alert alert-error mr-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form id="myform" action="{{ route('genre.update', ['genre' => $genre->Z_ID]) }}" method="POST" class="mt-2 px-8 rounded-xl">
            @csrf
            @method('PUT')
            <div class="my-5 flex flex-col">
                <label for="Nosaukums">{{ __('translation.name') }}</label>
                <input title="{{ __('translation.titlegenrename') }}" type="text" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="name" name="G_Nosaukums" value="{{ $genre->Nosaukums }}" required oninvalid="this.setCustomValidity('{{ __('translation.fillGenre') }}')" oninput="this.setCustomValidity('')">
            </div>
            <div class="form-group mb-2">
                <label for="Apraksts">{{ __('translation.description') }}:</label>
                <textarea title="{{ __('translation.titlegenredesc') }}" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="description" name="Apraksts">{{ $genre->Apraksts }}</textarea>
            </div>
            @if (Zanrs::count() > 1)
            <div class="my-5 flex flex-col">
                <label for="apakszanrs">{{ __('translation.subgenreOf')}}</label>
                <select title="{{ __('translation.subgenre') }}" class="select input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" id="apakszanrs" name="Apakszanrs">
                    <option value=""></option>
                    @foreach($allGenre as $genres)
                            @if ($genres->Z_ID !== $genre->Z_ID)
                            <option value="{{ $genres->Z_ID }}"
                            {{ $genre->Apakszanrs == $genres->Z_ID ? 'selected' : '' }}>
                            {{ $genres->Nosaukums }}
                        </option>
                        @endif
                    @endforeach
                </select>
                <h4 class="text-gray-500 text-xs">{{ __('translation.submsg2') }}</h4>
            </div>
            @else
            @endif

            <button id="update" type="submit" class="btn btn-primary mb-3">{{ __('translation.update') }}</button>
        </form>
    </div>
<script>
    document.getElementById("myform").addEventListener("submit", function(event) {
            // Get the submit button
            const updateButton = document.getElementById("update");
    
            // Disable the button to prevent multiple submissions
            updateButton.disabled = true;
            updateButton.innerHTML = '<span class="loading loading-spinner text-warning"></span>';
    
            // Re-enable the button after 5 seconds
            setTimeout(function() {
                updateButton.disabled = false;
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
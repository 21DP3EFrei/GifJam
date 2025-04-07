@extends('layout')

@section('title',  __('translation.editMedia'))
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        <button class="hover:border rounded-sm w-24 h-10 text-lg transition ease-in hover:bg-blue-500" onclick="history.back()">{{ __('translation.back') }}</button>
    </h2>
</x-custom-header>
<div class="container mx-3">
        <h1 class="h1">{{ __('translation.editMedia') }}</h1>
        <form action="{{ route('unverification.update', ['media' => $media->Me_ID]) }}" method="POST" class="mt-2 px-8 rounded-xl">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="Nosaukums">{{ __('translation.media') }} {{ __('translation.name') }}:</label>
                <input type="text" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="Nosaukums" name="Nosaukums" value="{{ $media->Nosaukums }}" required>
            </div>
            <div class="form-group mb-2">
                <label for="Apraksts">{{ __('translation.description') }}:</label>
                <textarea class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="Apraksts" name="Apraksts">{{ $media->Apraksts }}</textarea>
            </div>
            <div class="form-group mb-2">
                <label for="Autors">{{ __('translation.author') }}:</label>
                <textarea class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="Autors" name="Autors">{{ $media->Autors }}</textarea>
            </div>
            <div class="my-5 flex flex-col">
                <label for="Autortiesibas" class="form-label">{{ __('translation.copyright') }}</label>
                <select class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="Autortiesibas" id="Autortiesibas">
                    <option value="1" {{ $media->Autortiesibas == '1' ? 'selected' : '' }}>{{ __('translation.yes') }}</option>
                    <option value="0" {{ $media->Autortiesibas == '0' ? 'selected' : '' }}>{{ __('translation.no') }}</option>    
                </select>
            </div>
            <td class="text-center">
                @if ($media->Multivides_tips === 'Image')
                <div class="my-5 flex flex-col">
                    <label for="Kategorija_id" class="form-label">{{ __('translation.category') }}</label>
                    <select class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="Kategorija_id" id="Kategorija_id" required>
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
                    <select class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="SoundKategorija_id" id="SoundKategorija_id" required>
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
                    <label for="Zanrs_id" class="form-label">{{ __('translation.category') }}</label>
                    <select class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="Zanrs_id" id="Zanrs_id" required>
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
            <button type="submit" class="btn btn-primary mb-3">{{ __('translation.update') }}</button>
        </form>
    </div>
@endsection
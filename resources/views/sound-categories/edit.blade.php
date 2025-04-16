@extends('layout')

@section('title', __('translation.editSoundCate'))
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        <button class="hover:border rounded-sm w-24 h-10 text-lg transition ease-in hover:bg-blue-500" onclick="history.back()">{{ __('translation.back') }}</button>
    </h2>
</x-custom-header>
<div class="container mx-3">
        <h1 class="h1">{{ __('translation.editCategory') }}</h1>
        @if ($errors->any())
        <div class="alert alert-error mr-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('sound-categories.update', ['SoundCategory' => $SoundCategory->SKat_ID]) }}" method="POST" class="mt-2 px-8 rounded-xl">
            @csrf
            @method('PUT')
            <div class="my-5 flex flex-col">
                <label for="Nosaukums">{{ __('translation.soundCategory') }} {{ __('translation.Name') }}:</label>
                <input type="text"  class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="name" name="Kat_Nosaukums" value="{{ $SoundCategory->Nosaukums }}" required oninvalid="this.setCustomValidity('{{ __('translation.fillCategory') }}')" oninput="this.setCustomValidity('')">
            </div>
            <div class="my-5 flex flex-col">
                <label for="Apraksts">{{ __('translation.description') }}:</label>
                <textarea  class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="description" name="Apraksts">{{ $SoundCategory->Apraksts }}</textarea>
            </div>
            <div class="my-5 flex flex-col">
                <label for="apakskategorija">{{ __('translation.subcategoryOf') }} </label>
                <select class="select input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" id="apakskategorija" name="Apakskategorija">
                    <option value=""></option>
                    @foreach($allSoundCategories as $category)
                        @if ($category->SKat_ID !== $SoundCategory->SKat_ID)
                        <option value="{{ $category->SKat_ID }}"
                            {{ $SoundCategory->Apakskategorija == $category->SKat_ID ? 'selected' : '' }}>
                            {{ $category->Nosaukums }}
                        </option>
                        @endif

                    @endforeach
                </select>
                <h4 class="text-gray-500 text-xs">{{ __('translation.submsg') }}</h4>
            </div>
            

            <button type="submit" class="btn btn-primary mb-3">{{ __('translation.update') }}</button>
        </form>
    </div>
@endsection
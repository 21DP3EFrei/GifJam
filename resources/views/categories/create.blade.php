@extends('layout')

@section('title', __('translation.createCategories'))
@section('content')
@php
use App\Models\Kategorija;
@endphp
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        <x-back-button />
    </h2>
</x-custom-header>
<div class="container mx-3">
        <h1 class="h1">{{ __('translation.createCategories')}}</h1>
        @if ($errors->any())
        <div class="alert alert-error mr-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form id="myform" action="{{ route('categories.store') }}" method="POST" class="mt-2 px-8 rounded-xl">
            @csrf
            <div class="my-5 flex flex-col">
                <label for="name" class="form-label">{{ __('translation.name') }}</label>
                <input title="{{ __('translation.titlecategoryname') }}" type="text" title="Manager or Customer" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="name" name="Kat_Nosaukums" required oninvalid="this.setCustomValidity('{{ __('translation.fillCategory') }}')" oninput="this.setCustomValidity('')">
            </div>
            <div class="my-5 flex flex-col">
                <label for="description" class="form-label">{{ __('translation.description') }}:</label>
                <textarea title="{{ __('translation.titlecategorydesc') }}" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="description" name="Apraksts"></textarea>
            </div>
            @if (Kategorija::count() > 0)
            <div class="my-5 flex flex-col">
                <label for="apakskategorija" class="form-label">{{ __('translation.subcategoryOf') }}</label>
                <select title="{{ __('translation.titlesubcategory') }}" class="select input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" id="apakskategorija" name="Apakskategorija">
                    <option value=""></option>
                    @foreach($categories as $category)
                   <option value="{{ $category->K_ID }}">{{ $category->Nosaukums }}</option>
                   @endforeach
                </select>
                <h4 class= 'text-gray-500 text-xs'>{{ __('translation.submsg') }}</h4>
            </div>
            @else
            @endif
            <button id="create" type="submit" class="btn btn-primary my-2">{{ __('translation.create') }}</button>
        </form>
    </div>
<script>
    document.getElementById("myform").addEventListener("submit", function(event) {
            // Get the submit button
            const createButton = document.getElementById("create");
    
            // Disable the button to prevent multiple submissions
            createButton.disabled = true;
            createButton.innerHTML = '<span class="loading loading-spinner text-warning"></span>';
    
            // Re-enable the button after 5 seconds
            setTimeout(function() {
                createButton.disabled = false;
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
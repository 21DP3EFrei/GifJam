@extends('layout')

@section('title',  __('translation.edit'))
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        <button id="back" class="hover:border rounded-sm w-24 h-10 text-lg transition ease-in hover:bg-blue-500 cursor-pointer" onclick="history.back()">{{ __('translation.back') }}</button>
    </h2>
</x-custom-header>
<div class="container mx-3">
    <h1 class="h1">{{ __('translation.update') }} {{ $block->lietotajs?->name ??  __('translation.unknownUser') }} {{ __('translation.Status') }}</h1>
    @if ($errors->any())
    <div class="alert alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form id="myform" action="{{ route('block.update', ['block' => $block->B_ID]) }}" method="POST" class="mt-2 px-8 rounded-xl">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label>{{ __('translation.email') }}:</label>
            <div title="{{ __('translation.email') }}" class="input input-md border rounded-sm bg-indigo-100 dark:!bg-cyan-800 dark:text-white w-full cursor-not-allowed">{{ $block->lietotajs->email }}</div>
        </div>
        <div class="form-group mb-2">
            <label for="Iemesls">{{ __('translation.reason') }}:</label>
            <textarea title="{{ __('translation.titlereason') }}" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white w-full" autocomplete="off" id="Iemesls" name="Iemesls" required oninvalid="this.setCustomValidity('{{ __('translation.fillReason') }}')" oninput="this.setCustomValidity('')">{{ $block->Iemesls }}</textarea>
        </div>
        <div class="form-group mb-2">
            <label for="Blokets" class="form-label">{{ __('translation.status') }}:</label>
            <select title="{{ __('translation.titleblocked') }}" class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white w-full cursor-grab" name="Blokets" id="Blokets">
                <option value="Block" {{ $block->Blokets == 1 ? 'selected' : '' }}>{{ __('translation.isBlocked') }}</option>
                <option value="Unblock" {{ $block->Blokets == 0 ? 'selected' : '' }}>{{ __('translation.notBlocked') }}</option>
            </select>
        </div>
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
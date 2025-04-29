@extends('layout')

@section('title', __('translation.navigation_block'))
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        <button id="back" class="hover:border rounded-sm w-24 h-10 text-lg transition ease-in hover:bg-blue-500 cursor-pointer" onclick="history.back()">{{ __('translation.back') }}</button>
    </h2>
</x-custom-header>
<div class="container mx-3">
    <h1 class="h1">{{ __('translation.navigation_block') }}</h1>
    @if ($errors->any())
    <div class="alert alert-error mr-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form id="myform" action="{{ route('block.store') }}" method="POST" class="mt-2 px-8 rounded-xl">
        @csrf
        <div class="my-5 flex flex-col">
            <label for="L_ID" class="form-label">{{ __('translation.user') }}:</label>
            <select title="{{ __('translation.titleUser') }}" class="select input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white w-full" id="L_ID" name="L_ID" required oninvalid="this.setCustomValidity('{{ __('translation.fillUser') }}')"oninput="this.setCustomValidity('')">
                <option value=""></option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
            @if ($errors->has('L_ID'))
                <p class="text-red-500 text-sm">{{ $errors->first('L_ID') }}</p>
            @endif
        </div>
        <div class="my-5 flex flex-col">
            <label for="Iemesls" class="form-label">{{ __('translation.reason') }}:</label>
            <textarea title="{{ __('translation.titlereason') }}" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white w-full" autocomplete="off" id="Iemesls" name="Iemesls" required oninvalid="this.setCustomValidity('{{ __('translation.fillReason') }}')"oninput="this.setCustomValidity('')"></textarea>
        </div>
        <button id="create" type="submit" class="btn btn-primary my-2">{{ __('translation.create')}}</button>
    </form>
</div>
<script>
document.getElementById("myform").addEventListener("submit", function(event) {
        // Get the submit button
        const submitButton = document.getElementById("create");

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
@extends('layout')
@section('title', __('translation.Mupload'))
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight flex">
        <svg class="mr-1 h-8 w-8 bg-white rounded-full" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" fill="#000000" stroke="#000000" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g transform="translate(0 -1028.4)"> <path d="m12 1029.4c-6.0751 0-11 4.9-11 11 0 6 4.9249 11 11 11 6.075 0 11-5 11-11 0-6.1-4.925-11-11-11zm0 4c3.866 0 7 3.1 7 7 0 3.8-3.134 7-7 7s-7-3.2-7-7c0-3.9 3.134-7 7-7z" fill="#2c3e50"></path> <path d="m17 1031.7c-4.783-2.8-10.899-1.1-13.66 3.7-2.7617 4.7-1.1229 10.9 3.66 13.6 4.783 2.8 10.899 1.1 13.66-3.6 2.762-4.8 1.123-10.9-3.66-13.7zm-4 6.9c0.957 0.6 1.284 1.8 0.732 2.8-0.552 0.9-1.775 1.2-2.732 0.7-0.957-0.6-1.2843-1.8-0.732-2.7 0.552-1 1.775-1.3 2.732-0.8z" fill="#2c3e50"></path> <path d="m6.0098 1032.3c-2.2488 1.7-3.6216 4.2-3.9375 6.8l7.9647 1c0.065-0.6 0.33-1 0.782-1.4l-4.8092-6.4zm15.913 9.2-7.938-1c-0.065 0.6-0.357 1-0.808 1.4l4.809 6.4c2.248-1.7 3.621-4.2 3.937-6.8z" fill="#34495e"></path> <path d="m12 1036.4c-2.2091 0-4 1.8-4 4s1.7909 4 4 4c2.209 0 4-1.8 4-4s-1.791-4-4-4zm0 3c0.552 0 1 0.4 1 1 0 0.5-0.448 1-1 1s-1-0.5-1-1c0-0.6 0.448-1 1-1z" fill="#f1c40f"></path> </g> </g></svg>
        {{ __('translation.Mupload') }}
    </h2>
</x-custom-header>
<div>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form id="myForm" method="POST" action="{{ route('upload.Music') }}" enctype="multipart/form-data" class="mt-2 px-8 rounded-xl flex justify-between">
        @csrf
        <div class="flex w-full">
            <!-- File Upload Area -->
            <div class="w-1/2 pr-4 my-auto">
                <div id="drop-area" class="border-2 border-dashed dark:border-blue-500 border-blue-200 rounded-lg p-6 flex flex-col items-center cursor-pointer py-auto">
                    <svg class="w-12 h-12 text-blue-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0l-4 4m4-4v12"></path>
                    </svg>
                    <p class="text-gray-400 mb-2">{{ __('translation.dragDrop') }}</p>
                    <button type="button" id="browseButton" class="btn btn-primary">{{ __('translation.browse') }}</button>
                    <input type="file" id="uploadFile" name="uploadFile" class="hidden" accept=".aac, .aiff, .alac, .m4a, .flac, .mp3, .wav, .opus" oninvalid="this.setCustomValidity('{{__('translation.fillFile')}}')"oninput="this.setCustomValidity('')">
                </div>
                <div id="file-preview" class="mt-0.5 dark:text-blue-200 text-blue-600 bg-violet-200 dark:bg-violet-800 rounded-lg"></div>
            </div>
    
            <!-- Input Data Area -->
            <div class="w-1/2 pl-4">
        <div class="my-5 flex flex-col">
            <label for="fileName" class="form-label">{{ __('translation.name') }}</label>
                    <input title="{{ __('translation.titlefilename') }}" type="text" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" name="fileName" id="fileName" required oninvalid="this.setCustomValidity('{{ __('translation.fillFileName') }}')" oninput="this.setCustomValidity('')" autocomplete="off"/>
        </div>
        <div class="my-5 flex flex-col">
            <label for="fileDescription" class="form-label">{{ __('translation.description') }}</label>
            <textarea title="{{ __('translation.titlefildescr') }}" class="input input-md border rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="fileDescription" id="fileDescription" rows="3" aria-multiline="true"></textarea>
        </div>
        <div class="my-5 flex flex-col">
            <label for="author" class="form-label">{{ __('translation.author') }}</label>
            <input title="{{ __('translation.titlefilauthor') }}" type="text" class="input input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="author" id="author" required oninvalid="this.setCustomValidity('{{__('translation.fillFileAuthor')}}')" oninput="this.setCustomValidity('')" autocomplete="off" />
        </div>
        <div class="my-5 flex flex-col">
            <label for="category_id" class="form-label">{{ __('translation.navigation_genre') }}</label>
            <select title="{{ __('translation.titleSelectGen') }}" class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="category_id" id="category_id" required oninvalid="this.setCustomValidity('{{__('translation.fillFileGenre')}}')" oninput="this.setCustomValidity('')">
                <option disabled selected></option>
                @foreach($genre as $genres)
                    <option value="{{ $genres->Z_ID }}">{{ $genres->Nosaukums }}</option>
                @endforeach
            </select>
        </div>
        <div class="my-5 flex flex-col">
            <label for="copyright" class="form-label">{{ __('translation.copyright') }}</label>
                    <input type="hidden" name="copyright" id="copyright" value="0" >
            <input title="{{ __('translation.titleCopyright') }}" type="checkbox" value="1" class="checkbox rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-8 h-8" name="copyright" id="copyright"></input>
        </div>
                <button id="submitPause" type="submit" class="btn btn-primary mb-8 px-16">{{ __('translation.submit') }}</button>
        </div>
        </div>
        <input type="hidden" name="Multivides_tips" value="Music">
    </form>
</div>
<script>
document.getElementById("myForm").addEventListener("submit", function(event) {
        // Get the submit button
        const submitButton = document.getElementById("submitPause");

        // Disable the button to prevent multiple submissions
        submitButton.disabled = true;
        submitButton.innerHTML = '<span class="loading loading-spinner text-warning"></span>';

        // Re-enable the button after 5 seconds
        setTimeout(function() {
            submitButton.disabled = false;
        }, 30000);
    });

    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('uploadFile');
    const browseButton = document.getElementById('browseButton');
    const filePreview = document.getElementById('file-preview');

    // Prevent default behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, (e) => e.preventDefault(), false);
    });

    // Handle dropped files
    dropArea.addEventListener('drop', (e) => {
        if (e.dataTransfer.files.length) {
            fileInput.files = e.dataTransfer.files;
            showFilePreview(fileInput.files[0]);
        }
    });

    // Handle browse button click
    browseButton.addEventListener('click', () => fileInput.click());

    // Handle file selection
    fileInput.addEventListener('change', () => {
        if (fileInput.files.length) {
            showFilePreview(fileInput.files[0]);
        }
    });

    function showFilePreview(file) {
        filePreview.innerHTML = `
            <div class="flex items-center justify-between p-2 rounded">
                <span>${file.name}</span>
                <button type="button" id="removeFile" class="text-red-500 cursor-pointer">✖</button>
            </div>
        `;

        document.getElementById('removeFile').addEventListener('click', () => {
            fileInput.value = ''; // Clear file input
            filePreview.innerHTML = ''; // Clear preview
        });
    }
</script>
@endsection

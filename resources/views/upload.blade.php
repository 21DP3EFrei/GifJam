@extends('layout')
@section('title', __('translation.Pupload'))
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight flex">
        <img class="h-7 w-7 mr-1 bg-white rounded-full" src="{{ asset('images/picture.svg') }}" alt="{{ __('translation.Pupload') }}"> {{ __('translation.Pupload') }}
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
    <form id="myForm" method="POST" action="{{ route('upload.Image') }}" enctype="multipart/form-data" class="mt-2 px-8 rounded-xl flex justify-between">
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
                    <input type="file" id="uploadFile" name="uploadFile" class="hidden" accept=".png, .gif, .webp, .jpg, .jpeg" oninvalid="this.setCustomValidity('{{__('translation.fillFile')}}')"oninput="this.setCustomValidity('')">
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
                    <label for="category_id" class="form-label">{{ __('translation.category') }}</label>
                    <select title="{{ __('translation.titleSelectCat') }}" class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="category_id" id="category_id" required oninvalid="this.setCustomValidity('{{__('translation.fillFileCategory')}}')" oninput="this.setCustomValidity('')"> 
                        <option disabled selected></option>
                        @foreach($categories as $category)
                            <option value="{{ $category->K_ID }}">{{ $category->Nosaukums }}</option>
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
    
        <input type="hidden" name="Multivides_tips" value="Image">
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
                <span>${(file.name)}</span>
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
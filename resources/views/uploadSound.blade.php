@extends('layout')
@section('title', __('translation.Mupload'))
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight flex">
        <svg class="mr-1 h-8 w-8 bg-white rounded-full" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M597.333333 151.466667v42.666666c155.733333 21.333333 277.333333 155.733333 277.333334 317.866667s-121.6 296.533333-277.333334 317.866667v42.666666c179.2-21.333333 320-174.933333 320-360.533333S776.533333 172.8 597.333333 151.466667z" fill="#81D4FA"></path><path d="M298.666667 682.666667H149.333333c-23.466667 0-42.666667-19.2-42.666666-42.666667V384c0-23.466667 19.2-42.666667 42.666666-42.666667h149.333334v341.333334z" fill="#546E7A"></path><path d="M554.666667 896L298.666667 682.666667V341.333333L554.666667 128z" fill="#78909C"></path><path d="M597.333333 369.066667v44.8c38.4 17.066667 64 53.333333 64 98.133333s-25.6 81.066667-64 98.133333v44.8c61.866667-19.2 106.666667-74.666667 106.666667-142.933333s-44.8-123.733333-106.666667-142.933333z" fill="#03A9F4"></path><path d="M597.333333 260.266667v42.666666c98.133333 19.2 170.666667 106.666667 170.666667 209.066667s-72.533333 189.866667-170.666667 209.066667v42.666666c121.6-21.333333 213.333333-125.866667 213.333334-251.733333s-91.733333-232.533333-213.333334-251.733333z" fill="#4FC3F7"></path></g></svg>
         {{ __('translation.Supload') }}
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
    <form id="myForm" method="POST" action="{{ route('uploadSound.post') }}" enctype="multipart/form-data" class="mt-2 px-8 rounded-xl flex justify-between">
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
            <label for="category_id" class="form-label">{{ __('translation.category') }}</label>
            <select title="{{ __('translation.titleSelectCat') }}" class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="category_id" id="category_id" required oninvalid="this.setCustomValidity('{{__('translation.fillFileCategory')}}')" oninput="this.setCustomValidity('')">
                <option disabled selected></option>
                @foreach($soundCategories as $SC)
                    <option value="{{ $SC->SKat_ID }}">{{ $SC->Nosaukums }}</option>
                @endforeach
            </select>
        </div>
        <button id="submitPause" type="submit" class="btn btn-primary mb-8 px-16">{{ __('translation.submit') }}</button>
        </div>
        <input type="hidden" name="Multivides_tips" value="Sound">
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

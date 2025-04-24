@extends('layout')
@section('title', __('translation.Supload'))
@section('content')
<div class="container">
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
    <form id="myForm" method="POST" action="{{ route('uploadSound.post') }}" enctype="multipart/form-data" class="mt-2 px-2 rounded-xl">
        @csrf
        <div class="mx-4">
        <div class="my-5 flex flex-col">
            <label for="fileName" class="form-label">{{ __('translation.name') }}</label>
            <input title="{{ __('translation.titlefilename') }}" type="text" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" name="fileName" id="fileName" required aria-required="true" autocomplete="off" required oninvalid="this.setCustomValidity('{{__('translation.fillFileName')}}')" oninput="this.setCustomValidity('')"/>
        </div>
        <div class="my-5 flex flex-col">
            <label for="fileDescription" class="form-label">{{ __('translation.description') }}</label>
            <textarea title="{{ __('translation.titlefildescr') }}" class="input input-md border rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="fileDescription" id="fileDescription" rows="3" aria-multiline="true"></textarea>
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
        <div class="my-5 flex flex-col">
            <label for="uploadFile" class="form-label">{{ __('translation.uploadFile') }}</label>
            <input title="{{ __('translation.titlefileUpload') }}" class="file-input file-input-primary  rounded-lg cursor-pointerfocus:outline-none dark:border-blue-600 dark:placeholder-gray-400 border border-black bg-gray-200 dark:bg-blue-900 dark:text-white dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" type="file" name="uploadFile" id="uploadFile" required oninvalid="this.setCustomValidity('{{__('translation.fillFile')}}')" oninput="this.setCustomValidity('')" aria-required="true" accept=".aac, .aiff, .alac, .m4a, .flac, .mp3, .wav, .opus">
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
        }, 5000);
    });
</script>
@endsection

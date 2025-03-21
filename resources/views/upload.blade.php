@extends('layout')
@section('title', 'Meme Upload')
@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @elseif($errors->has('uploadFile'))
    <div class="alert alert-danger">
        {{ $errors->first('uploadFile') }}
    </div>
    @endif
    <form id="myForm" method="POST" action="{{ route('upload.post') }}" enctype="multipart/form-data" class="mt-2 px-8 rounded-xl">
        @csrf
        <div class="mx-4">
        <div class="my-5 flex flex-col">
            <label for="fileName" class="form-label">Name</label>
            <input type="text" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" name="fileName" id="fileName" required aria-required="true" autocomplete="off"/>
        </div>
        <div class="my-5 flex flex-col">
            <label for="fileDescription" class="form-label">Description</label>
            <textarea class="input input-md border rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="fileDescription" id="fileDescription" rows="3" aria-multiline="true"></textarea>
        </div>
        <div class="my-5 flex flex-col">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="input input-sm  rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="author" id="author" required aria-required="true" autocomplete="off">
        </div>
        <div class="my-5 flex flex-col">
            <label for="copyright" class="form-label">Copyright</label>
            <select class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="copyright" id="copyright">
                <option disabled selected></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="my-5 flex flex-col">
            <label for="category_id" class="form-label">Category</label>
            <select class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="category_id" id="category_id" required aria-required="true">
                <option disabled selected></option>
                @foreach($categories as $category)
                    <option value="{{ $category->K_ID }}">{{ $category->Nosaukums }}</option>
                @endforeach
            </select>
        </div>
        <div class="my-5 flex flex-col">
            <label for="uploadFile" class="form-label">Upload File</label>
            <input class="file-input file-input-primary  rounded-lg cursor-pointerfocus:outline-none dark:border-blue-600 dark:placeholder-gray-400 border border-black bg-gray-200 dark:bg-blue-900 dark:text-white dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" type="file" name="uploadFile" id="uploadFile" required aria-required="true" accept=".png, .gif, .webp, .jpg, .jpeg">
        </div>
        <button id="submitPause" type="submit" class="btn btn-primary mb-8 btn-wide">Submit</button>
        </div>
    </form>
</div>
<script>
document.getElementById("myForm").addEventListener("submit", function(event) {
        // Get the submit button
        const submitButton = document.getElementById("submitPause");

        // Disable the button to prevent multiple submissions
        submitButton.disabled = true;

        // Re-enable the button after 5 seconds
        setTimeout(function() {
            submitButton.disabled = false;
        }, 5000);
    });
</script>
@endsection

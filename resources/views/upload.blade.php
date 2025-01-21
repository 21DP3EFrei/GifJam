@extends('layout')
@section('title', 'Meme Upload')
@section('header', 'Upload')
@section('content')
<div class="container">
    <h1>Upload</h1>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('upload.post') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="fileName" class="form-label">File Name</label>
            <input type="text" class="form-control" name="fileName" id="fileName" required aria-required="true">
        </div>
        <div class="mb-3">
            <label for="fileDescription" class="form-label">Description</label>
            <textarea class="form-control" name="fileDescription" id="fileDescription" rows="3" aria-multiline="true"></textarea>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" name="author" id="author" required aria-required="true">
        </div>
        <div class="mb-3">
            <label for="copyright" class="form-label">Copyright</label>
            <select class="form-select" name="copyright" id="copyright">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" name="category_id" id="category_id" required aria-required="true">
                @foreach($categories as $category)
                    <option value="{{ $category->K_ID }}">{{ $category->Nosaukums }}</option>
                @endforeach
            </select>
        </div>
        {{-- <div class="mb-3">
            <label for="subcategory_id" class="form-label">Subcategory</label>
            <select class="form-select" name="subcategory_id" id="subcategory_id" required aria-required="true">
                <!-- Populate subcategories dynamically based on the selected category -->
            </select>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#category_id').on('change', function() {
                        var categoryId = $(this).val();
                        if (categoryId) {
                            $.ajax({
                                url: '/fetch-subcategories/' + categoryId,
                                type: 'GET',
                                dataType: 'json',
                                success: function(data) {
                                    $('#subcategory_id').empty();
                                    $('#subcategory_id').append('<option value="">Select Subcategory</option>');
                                    $.each(data, function(key, value) {
                                        $('#subcategory_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                                    });
                                }
                            });
                        } else {
                            $('#subcategory_id').empty();
                        }
                    });
                });
            </script>
        </div> --}}
        <div class="mb-3">
            <label for="uploadFile" class="form-label">Upload File</label>
            <input class="form-control" type="file" name="uploadFile" id="uploadFile" required aria-required="true">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
</html>
@endsection

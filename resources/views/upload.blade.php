@extends('layout')
@section('title', 'Upload')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Upload File</h2>
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <form method="POST" action="{{ route('upload.post') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="fileName" class="form-label">File Name</label>
                <input type="text" class="form-control" name="fileName" id="fileName" required>
            </div>
            <div class="mb-3">
                <label for="fileDescription" class="form-label">Description</label>
                <textarea class="form-control" name="fileDescription" id="fileDescription" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" name="author" id="author" required>
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
                <select class="form-select" name="category_id" id="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->K_ID }}">{{ $category->Nosaukums }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="subcategory_id" class="form-label">Subcategory</label>
                <select class="form-select" name="subcategory_id" id="subcategory_id" required>
                    <!-- Populate subcategories dynamically based on the selected category -->
                </select>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category_id').on('change', function() {
            var categoryId = $(this).val();
            if(categoryId) {
                $.ajax({
                    url: '/subcategories/' + categoryId,
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

            </div>
            <div class="mb-3">
                <label for="uploadFile" class="form-label">Upload File</label>
                <input class="form-control" type="file" name="uploadFile" id="uploadFile" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection



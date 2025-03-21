@extends('layout')

@section('title', 'Create subcategory')
@section('header', 'Categories')
@section('content')
    <div class="container">
        <h1>Create Subcategory</h1>

        <form action="{{ route('subcategories.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Subcategory Name</label>
                                <input type="text" class="form-control" id="name" name="Nosaukums" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="Apraksts"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kategorija_id" class="form-label">Category</label>
                                <select class="form-select" id="kategorija_id" name="kategorija_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->K_ID }}">{{ $category->Nosaukums }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
    </div>
@endsection
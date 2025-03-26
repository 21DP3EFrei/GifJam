@extends('layout')

@section('title', 'Edit Media')
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        <button class="hover:border rounded-sm w-24 h-10 text-lg transition ease-in hover:bg-blue-500" onclick="history.back()">← Go Back</button>
    </h2>
</x-custom-header>
<div class="container mx-3">
        <h1 class="h1">Edit Media</h1>
        <form action="{{ route('verification.update', ['media' => $media->Me_ID]) }}" method="POST" class="mt-2 px-8 rounded-xl">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="Nosaukums">Media Name:</label>
                <input type="text" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="Nosaukums" name="Nosaukums" value="{{ $media->Nosaukums }}" required>
            </div>
            <div class="form-group mb-2">
                <label for="Apraksts">Description:</label>
                <textarea class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="Apraksts" name="Apraksts">{{ $media->Apraksts }}</textarea>
            </div>
            <div class="form-group mb-2">
                <label for="Autors">Author:</label>
                <textarea class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="Autors" name="Autors">{{ $media->Autors }}</textarea>
            </div>
            <div class="my-5 flex flex-col">
                <label for="Autortiesibas" class="form-label">Copyright</label>
                <select class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="Autortiesibas" id="Autortiesibas">
                    <option value="1" {{ $media->Autortiesibas == '1' ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $media->Autortiesibas == '0' ? 'selected' : '' }}>No</option>    
                </select>
            </div>
            <div class="my-5 flex flex-col">
                <label for="Kategorija_id" class="form-label">Category</label>
                <select class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white  dark:active:bg-blue-900 dark:focus:bg-blue-900 dark:focus:text-white w-full" name="Kategorija_id" id="Kategorija_id" required aria-required="true">
                    @foreach($categories as $category)
                    <option value="{{ $category->K_ID }}" {{ $media->Kategorija_id == $category->K_ID ? 'selected' : '' }}>{{ $category->Nosaukums }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mb-3">Update</button>
        </form>
    </div>
@endsection
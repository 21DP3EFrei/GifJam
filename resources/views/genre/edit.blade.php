@extends('layout')

@section('title', 'Edit Categories')
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        <button class="hover:border rounded-sm w-24 h-10 text-lg transition ease-in hover:bg-blue-500" onclick="history.back()">← Go Back</button>
    </h2>
</x-custom-header>
<div class="container mx-3">
        <h1 class="h1">Edit Genre</h1>
        <form action="{{ route('genre.update', ['genre' => $genre->Z_ID]) }}" method="POST" class="mt-2 px-8 rounded-xl">
            @csrf
            @method('PUT')
            <div class="my-5 flex flex-col">
                <label for="Nosaukums">Genre Name:</label>
                <input type="text" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="name" name="Nosaukums" value="{{ $genre->Nosaukums }}" required>
            </div>
            <div class="my-5 flex flex-col">
                <label for="Apraksts">Description:</label>
                <textarea class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="description" name="Apraksts">{{ $genre->Apraksts }}</textarea>
            </div>
            <div class="my-5 flex flex-col">
                <label for="apakszanrs">Subgenre of: </label>
                <select class="select input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" id="apakszanrs" name="Apakszanrs">
                    @if ($genre->Apakszanrs)  
                        <option value="{{ $genre->Apakszanrs }}" selected> {{ $genre->parent->Nosaukums }} </option>
                    @endif
                    <option value=""></option>
                    @foreach($allGenre as $genres)
                        <!-- don't copy subcategory -->
                        @if ($genres->Z_ID !== $genre->Z_ID)
                            <option value="{{ $genres->Z_ID }}">{{ $genres->Nosaukums }}</option>
                        @endif
                    @endforeach
                </select>
                <h4 class="text-gray-500 text-xs">*Only choose this if you are making this a subgenre</h4>
            </div>
            

            <button type="submit" class="btn btn-primary mb-3">Update</button>
        </form>
    </div>
@endsection
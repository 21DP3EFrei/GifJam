@extends('layout')

@section('title', 'Create Categories')
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        <button class="hover:border rounded-sm w-24 h-10 text-lg transition ease-in hover:bg-blue-500" onclick="history.back()">← Go Back</button>
    </h2>
</x-custom-header>
<div class="container mx-3">
        <h1>Create Sound Category</h1>

        <form action="{{ route('sound-categories.store') }}" method="POST" class="mt-2 px-8 rounded-xl">
            @csrf
            <div class="my-5 flex flex-col">
                <label for="name" class="form-label">Sound Category Name</label>
                <input type="text" class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="name" name="Nosaukums" required>
            </div>
            <div class="my-5 flex flex-col">
                <label for="description" class="form-label">Description</label>
                <textarea class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" autocomplete="off" id="description" name="Apraksts"></textarea>
            </div>
            <div class="my-5 flex flex-col">
                <label for="apakskategorija" class="form-label">Subcategory of: </label>
                <select class="select input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white autofill:!bg-black w-full" id="apakskategorija" name="Apakskategorija">
                    <option value=""></option>
                    @foreach($SoundCategory as $category)
                   <option value="{{ $category->SKat_ID }}">{{ $category->Nosaukums }}</option>
                   @endforeach
                </select>
                <h4 class= 'text-gray-500 text-xs'>*Only choose this if you are making this a subcategory</h4>
            </div>
            <button type="submit" class="btn btn-primary my-2">Create</button>
        </form>
    </div>
@endsection
@extends('layout')

@section('title', $media->Nosaukums . ' Preview')
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        <button class="hover:border rounded-sm w-24 h-10 text-lg transition ease-in hover:bg-blue-500" onclick="history.back()">← Go Back</button>
    </h2>
</x-custom-header>

<div class="container">
    <!-- Two Column Layout -->
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Left Column: Text and Button -->
        <div class="w-auto md:w-1/2 flex flex-col ml-4 my-4">
            <h1 class="text-2xl font-bold mb-4">{{ $media->Nosaukums }} info</h1>
            <form class="space-y-2 mr-2">
                <!-- Description -->
                <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Description</h3>
                    <p class="text-gray-600 dark:text-gray-300">{{ $media->Apraksts }}</p>
                </div>
            
                <!-- Author -->
                <div class="flex items-center justify-between p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm">
                    <label for="author" class="text-sm font-medium text-gray-700 dark:text-gray-300">Author</label>
                    <p class="text-sm text-gray-900 dark:text-white font-semibold">{{ $media->Autors }}</p>
                </div>
            
                <!-- Copyright -->
                <div class="flex items-center justify-between p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm">
                    <label for="copyright" class="text-sm font-medium text-gray-700 dark:text-gray-300">Copyright</label>
                    <p class="text-sm text-gray-900 dark:text-white font-semibold">{{ $media->Autortiesibas ? 'Yes' : 'No' }}</p>
                </div>
            </form>
            <!-- Download Button -->
            <form action="{{ route('pictures.download', $media) }}" method="GET" class="space-y-2">
                @csrf
                <button type="submit" class="btn btn-primary w-40 mt-3">Download</button>
            </form>
        </div>
        <div class="w-full md:w-1/2 flex justify-center items-center my-2">
            <img src="{{ asset('storage/' . $media->Fails) }}" alt="{{ $media->Nosaukums }}"  class="cursor-pointer rounded-lg shadow-lg" onclick="this.classList.toggle('fixed'); this.classList.toggle('inset-0'); this.classList.toggle('w-full'); this.classList.toggle('h-full'); this.classList.toggle('object-contain'); this.classList.toggle('z-50'); this.classList.toggle('bg-black');"/>
        </div>
    </div>
</div>
@endsection
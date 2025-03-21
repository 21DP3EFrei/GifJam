@extends('layout')

@section('title', 'Unverify')
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
       Unverify
    </h2>
</x-custom-header>
<div class="container mx-2 px-1 py-1">
    <form action="{{ route('verification.index') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary mt-2 mb-2">Show Pending</button>
    </form>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive overflow-x-auto">
        <table class="table table-zebra overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">
        <thead>
            <tr class="text-center align-middle bg-slate-100 dark:bg-cyan-700 text-black dark:text-white border border-gray-300">
                <th class="border-separate border border-gray-400">File Name</th>
                <th class="border-separate border border-gray-400">Description</th>
                <th class="border-separate border border-gray-400">Actions</th>
                <th class="border-separate border border-gray-400">Category</th>
                <th class="border-separate border border-gray-400">Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($approvedMedia as $media)
            <tr class="align-middle items-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                <td>{{ $media->Nosaukums }}</td>
                <td>{{ $media->Apraksts }}</td>
                <td>
                    <form action="{{ route('unverification.mediaunverify', $media) }}" method="POST">
                        @csrf
                        <div class="flex items-center py-1">
                            <input class="radio bg-red-100 border-red-700 checked:bg-red-700 checked:text-red-600 checked:border-red-600 cursor-pointer" type="radio" name="status" id="unapprove{{ $media->id }}" value="1">
                            <label class="ml-1" for="unapprove{{ $media->id }}">Unapprove</label>
                        </div>
                        <button type="submit" class="bg-red-500 text-black px-4 py-2 rounded-sm cursor-pointer">Update</button>
                    </form>
                </td>
                <td>
                    @foreach($media->kategorijas as $category)
                        {{ $category->Nosaukums }}{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                </td>
                <td class="text-center">
                    <div class="flex items-center justify-center space-x-2">
                    <img class="cursor-pointer" src="{{ asset('storage/' . $media->Fails) }}" alt="{{ $media->Nosaukums }}" width="100" height="100" onclick="this.classList.toggle('fixed'); this.classList.toggle('inset-0'); this.classList.toggle('w-full'); this.classList.toggle('h-full'); this.classList.toggle('object-contain'); this.classList.toggle('z-50'); this.classList.toggle('bg-black');"/>       
                    <div class="w-9 h-9 flex justify-center items-center transition ease-in-out duration-300 mr-3">
                        <a href="{{ asset('storage/' . $media->Fails) }}" download="{{ $media->Fails }}" class="w-full h-full text-xl text-center text-blue-600 underline hover:text-blue-800">↓</a>
                    </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection

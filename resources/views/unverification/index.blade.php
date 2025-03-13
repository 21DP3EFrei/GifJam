@extends('layout')

@section('title', 'Unverify')
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
       Unverify
    </h2>
</x-custom-header>
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <form action="{{ route('verification.index') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary mt-2 mb-2">Show Pending</button>
        </form>
        <thead>
            <tr class="text-center align-middle items-center">
                <th>File Name</th>
                <th>Description</th>
                <th>Actions</th>
                <th>Category</th>
                <th>Image</th>
                <th></th> {{-- this is for donwload --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($approvedMedia as $media)
            <tr class="align-middle items-center">
                <td>{{ $media->Nosaukums }}</td>
                <td>{{ $media->Apraksts }}</td>
                <td>
                    <form action="{{ route('unverification.mediaunverify', $media) }}" method="POST">
                        @csrf
                        <div class="flex items-center">
                            <input class="radio bg-red-100 border-red-700 checked:bg-red-700 checked:text-red-600 checked:border-red-600 cursor-pointer" type="radio" name="status" id="unapprove{{ $media->id }}" value="1">
                            <label class="ml-1" for="unapprove{{ $media->id }}">Unapprove</label>
                        </div>
                        <button type="submit"  class="bg-red-500 text-black px-4 py-2 rounded">Update</button>
                    </form>
                </td>
                <td>
                    @foreach($media->kategorijas as $category)
                        {{ $category->Nosaukums }}{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                </td>
                <td>
                    <img class="cursor-pointer" src="{{ asset('storage/' . $media->Fails) }}" alt="{{ $media->Nosaukums }}" width="100" height="100" onclick="this.classList.toggle('fixed'); this.classList.toggle('inset-0'); this.classList.toggle('w-full'); this.classList.toggle('h-full'); this.classList.toggle('object-contain'); this.classList.toggle('z-50'); this.classList.toggle('bg-black');"/>
                </td>
                <td>
                    <div class="border rounded-full w-9 h-9 flex justify-center items-center transition ease-in-out duration-300  hover:bg-yellow-500">
                        <a href="{{ asset('storage/' . $media->Fails) }}" download="{{ $media->Fails }}" class="w-full h-full text-xl text-center hover:text-blue-200">↓</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
</html>
@endsection

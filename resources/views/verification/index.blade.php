@extends('layout')

@section('title', 'Verification')
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
       Verify
    </h2>
</x-custom-header>
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('unverification.index') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary mt-2 mb-2">Show Approved</button>
    </form>
    <table class="table">
        <thead>
            <tr class="text-center align-middle">
                <th>File Name</th>
                <th>Description</th>
              {{--   <th>Status</th> --}}
                <th>Actions</th>
                <th>Category</th>
                <th>Image</th>
                <th></th> {{-- this is for donwload --}}
                <th>Submited by:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unverifiedMems as $media)
            <tr class="align-middle items-center">
                <td>{{ $media->Nosaukums }}</td>
                <td>{{ $media->Apraksts }}</td>
                {{-- <td>{{ $media->Status == 0 ? 'Pending' : ($media->Status == 1 ? 'Approved' : 'Rejected') }}</td> --}}
                <td>
                    <form action="{{ route('verification.mediaverify', $media) }}" method="POST" class="d-flex align-items-center me-3">
                        @csrf
                        @method('POST') 
                        <div class="flex flex-wrap">
                            <div class="flex items-center">
                                <input class="radio bg-green-100 border-green-700 checked:bg-green-700 checked:text-green-600 checked:border-green-600 cursor-pointer" type="radio" name="status" id="approve{{ $media->id }}" value="1">
                                <label class="ml-1 text-green-400 cursor-pointer" for="approve{{ $media->id }}">Approve</label>
                            </div>
                            <div class="flex items-center">
                                <input class="radio bg-red-100 border-red-700 checked:bg-red-700 checked:text-red-600 checked:border-red-600 cursor-pointer" type="radio" name="status" id="reject{{ $media->id }}" value="0">
                                <label class="ml-1 text-red-400 cursor-pointer" for="reject{{ $media->id }}"> Reject</label>
                            </div>
                        </div>
                        <button type="submit" class="bg-green-400 text-black px-4 py-2 rounded" style="margin-left: 10px; align-top ">Submit</button>
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
                    @if ($media->user)
                    <td class="text-center">{{ $media->user->name}}<br>(id: {{$media->user->id}})</td>
                    @else
                    <td class="text-center">-</td>
                    @endif
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

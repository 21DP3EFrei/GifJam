@extends('layout')

@section('title', 'Verification')
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
       Verify
    </h2>
</x-custom-header>
<div class="container mx-2 py-1">
    <form action="{{ route('unverification.index') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary mt-2 mb-2">Show Approved</button>
    </form>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive overflow-x-auto mx-3">
    <table class="table table-zebra overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">
        <thead>
            <tr class="text-center align-middle bg-slate-100 dark:bg-cyan-700 text-black dark:text-white border border-gray-300">
                <th class="border-separate border border-gray-400">File Name</th>
                <th class="border-separate border border-gray-400">Description</th>
              {{--   <th>Status</th> --}}
                <th class="border-separate border border-gray-400">Actions</th>
                <th class="border-separate border border-gray-400">Category</th>
                <th class="border-separate border border-gray-400">Image</th>
                <th class="border-separate border border-gray-400">Submited by:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unverifiedMems as $media)
            <tr class="align-middle items-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
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
                            <div class="flex items-center py-1">
                                <input class="radio bg-red-100 border-red-700 checked:bg-red-700 checked:text-red-600 checked:border-red-600 cursor-pointer" type="radio" name="status" id="reject{{ $media->id }}" value="0">
                                <label class="ml-1 text-red-400 cursor-pointer" for="reject{{ $media->id }}"> Reject</label>
                            </div>
                        </div>
                        <button type="submit" class="bg-green-400 text-black px-4 py-2 rounded-sm cursor-pointer">Submit</button>
                    </form>
                </td>
                @if ($media->kategorijas !== null && $media->kategorijas->isNotEmpty())
                <td>
                    @foreach($media->kategorijas as $category)
                        {{ $category->Nosaukums }}{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                </td>
                @else
                    <td class="text-center">-</td>
                @endif    
                <td class="text-center">
                    <div class="flex items-center justify-center space-x-2">
                    <img class="cursor-pointer" src="{{ asset('storage/' . $media->Fails) }}" alt="{{ $media->Nosaukums }}" width="100" height="100" onclick="this.classList.toggle('fixed'); this.classList.toggle('inset-0'); this.classList.toggle('w-full'); this.classList.toggle('h-full'); this.classList.toggle('object-contain'); this.classList.toggle('z-50'); this.classList.toggle('bg-black');"/>       
                    <div class="border rounded-full w-9 h-9 flex justify-center items-center transition ease-in-out duration-300 hover:bg-blue-300">
                        <a href="{{ asset('storage/' . $media->Fails) }}" download="{{ $media->Fails }}" class="w-full h-full text-xl text-center text-blue-600 underline hover:text-blue-800">↓</a>
                    </div>
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
</div>
@endsection

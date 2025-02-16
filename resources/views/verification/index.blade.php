@extends('layout')

@section('title', 'Verification')
@section('header', 'Verify')
@section('content')
<div class="container">
    <h1>Verify</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('unverification.index') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary mb-2">Show Approved</button>
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
                    <form action="{{ route('verification.verify', $media) }}" method="POST" class="d-flex align-items-center me-3">
                        @csrf
                        @method('POST') 
                        <div class="border border-black border-spacing-5"> 
                        <div class="form-check form-check-inline ">
                            <input class="form-check-input cursor-pointer" type="radio" name="status" id="approve{{ $media->id }}" value="1">
                            <label class="form-check-label text-green-400 " for="approve{{ $media->id }}">
                                {{ $media->Status == 0 ? 'Approve' : 'Re-Approve' }}
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input cursor-pointer" type="radio" name="status" id="reject{{ $media->id }}" value="0">
                            <label class="form-check-label text-red-400 " for="reject{{ $media->id }}">Reject</label>
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
                    <a href="{{ asset('storage/' . $media->Fails) }}" download="{{ $media->Fails }}" class=" mt-2 underline decoration-slate-700"> ↓</a>
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

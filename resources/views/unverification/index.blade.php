@extends('layout')

@section('title', 'Unverify')
@section('header', 'Unverify Memes')
@section('content')
<div class="container">
    <h1>Unverify</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <form action="{{ route('verification.index') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary mb-2">Show Pending</button>
        </form>
        <thead>
            <tr class="text-center align-middle items-center">
                <th>File Name</th>
                <th>Description</th>
                <th>Actions</th>
                <th>Download</th>
                <th>Category</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($approvedMedia as $media)
            <tr class="align-middle items-center">
                <td>{{ $media->Nosaukums }}</td>
                <td>{{ $media->Apraksts }}</td>
                <td>
                    <form action="{{ route('unverification.unverify', $media) }}" method="POST">
                        @csrf
                        <div class="form-check form-check-inline">
                            <input class="form-check-input cursor-pointer" type="radio" name="status" id="unapprove{{ $media->id }}" value="1">
                            <label class="form-check-label" for="unapprove{{ $media->id }}">Unapprove</label>
                        </div>
                        <button type="submit"  class="bg-red-500 text-black px-4 py-2 rounded">Update</button>
                    </form>
                </td>
                <td class="items-center text-center">
                    <a href="{{ asset('storage/' . $media->Fails) }}" download="{{ $media->Fails }}" class="btn btn-primary">Download</a>
                </td>
                <td>
                    @foreach($media->kategorijas as $category)
                        {{ $category->Nosaukums }}{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                </td>
                <td>
                    <img class="cursor-pointer" src="{{ asset('storage/' . $media->Fails) }}" alt="{{ $media->Nosaukums }}" width="100" height="100" onclick="this.classList.toggle('fixed'); this.classList.toggle('inset-0'); this.classList.toggle('w-full'); this.classList.toggle('h-full'); this.classList.toggle('object-contain'); this.classList.toggle('z-50'); this.classList.toggle('bg-black');"/>
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

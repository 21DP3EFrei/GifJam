@extends('layout')

@section('title', __('translation.navigation_genre'))
@section('content')
<div class="container mx-2">
        <a href="{{ route('genre.create') }}" class="btn btn-primary mb-3 mt-3">{{ __('translation.createGenre') }}</a>
        @if (session('success'))
        <div class="alert alert-success mx-2 my-2 mr-3">{{ session('success') }}</div>
        @endif
        @if ($genre->isEmpty())
        <div class="col-span-full flex items-center justify-center">
            <h1 class="text-white text-3xl font-bold text-center">{{ __('translation.noGenre') }}</h1>
        </div>
        @else
        <div class="table-responsive overflow-x-auto mx-3">
            <table class="table table-zebra overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">  
            <thead>
                <tr class="text-center align-middle bg-yellow-200 dark:bg-yellow-700 text-black dark:text-white border border-gray-300">
                    <th>{{ __('translation.name') }}</th>
                    <th>{{ __('translation.description') }}</th>
                    <th>{{ __('translation.subgenre') }}</th>
                    <th>{{ __('translation.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($genre as $genres)
                <tr class="align-middle items-center text-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                        <td>{{ Str::limit($genres->Nosaukums, 20) }}</td>
                        <td>{{ Str::limit($genres->Apraksts, 25) }}</td>
                        @if ($genres->parent)
                        <td>{{ Str::limit($genres->parent->Nosaukums, 25) }}</td>
                        @else
                        <td>-</td>
                        @endif
                        <td>
                            <a href="{{ route('genre.edit', $genres->Z_ID) }}" class="btn btn-sm btn-primary">{{ __('translation.edit') }}</a>
                            <form action="{{ route('genre.destroy', $genres->Z_ID) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-error !text-pink-100" onclick="return confirm('{{ __('translation.deleteGenr') }}')">{{ __('translation.delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        @endif
    </div>
@endsection
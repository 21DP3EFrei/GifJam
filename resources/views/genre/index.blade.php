@extends('layout')

@section('title', __('translation.navigation_genre'))
@section('content')
<div class="container mx-2">
        <a href="{{ route('genre.create') }}" class="btn btn-primary mb-3 mt-3">{{ __('translation.createGenre') }}</a>
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
                        <td>{{ $genres->Nosaukums }}</td>
                        <td>{{ $genres->Apraksts }}</td>
                        @if ($genres->parent)
                        <td>{{ $genres->parent->Nosaukums }}</td>
                        @else
                        <td>-</td>
                        @endif
                        <td>
                            <a href="{{ route('genre.edit', $genres->Z_ID) }}" class="btn btn-sm btn-primary">{{ __('translation.edit') }}</a>
                            <form action="{{ route('genre.destroy', $genres->Z_ID) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-error !text-pink-100" onclick="return confirm('Are you sure you want to delete this genre?')">{{ __('translation.delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
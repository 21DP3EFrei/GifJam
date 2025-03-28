@extends('layout')

@section('title', __('translation.navigation_block'))
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        <button class="hover:border rounded-sm w-24 h-10 text-lg transition ease-in hover:bg-blue-500" onclick="history.back()">{{ __('translation.back') }}</button>
    </h2>
</x-custom-header>
<div class="container mx-3">
    <h1 class="h1">{{ __('translation.block') }} {{ $block->lietotajs?->name ?? {{ __('translation.unknownUser') }} }}</h1>
    <form action="{{ route('block.store') }}" method="POST" class="mt-2 px-8 rounded-xl">
        @csrf
        <div class="my-5 flex flex-col">
            <label for="Iemesls" class="form-label">{{ __('translation.reason') }}:</label>
            <textarea class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white w-full" autocomplete="off" id="Iemesls" name="Iemesls"></textarea>
            @if ($errors->has('Iemesls'))
                <p class="text-red-500 text-sm">{{ $errors->first('Iemesls') }}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary my-2">{{ __('translation.create') }}</button>
    </form>
</div>
@endsection
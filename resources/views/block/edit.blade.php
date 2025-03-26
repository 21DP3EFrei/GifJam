@extends('layout')

@section('title', 'Edit')
@section('content')
<x-custom-header name="custom-header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
        <button class="hover:border rounded-sm w-24 h-10 text-lg transition ease-in hover:bg-blue-500" onclick="history.back()">← Go Back</button>
    </h2>
</x-custom-header>
<div class="container mx-3">
    <h1 class="h1">Update {{ $block->lietotajs?->name ?? 'Unknown User' }} status</h1>
    <form action="{{ route('block.update', ['block' => $block->B_ID]) }}" method="POST" class="mt-2 px-8 rounded-xl">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label for="Iemesls">Reason:</label>
            <textarea class="input input-md border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white w-full" autocomplete="off" id="Iemesls" name="Iemesls">{{ $block->Iemesls }}</textarea>
            @if ($errors->has('Iemesls'))
                <p class="text-red-500 text-sm">{{ $errors->first('Iemesls') }}</p>
            @endif
        </div>
        <div class="form-group mb-2">
            <label for="Blokets" class="form-label">Blocked:</label>
            <select class="select input-sm rounded-sm bg-gray-200 dark:bg-blue-900 dark:text-white w-full" name="Blokets" id="Blokets">
                <option value="Block" {{ $block->Blokets == 1 ? 'selected' : '' }}>Block</option>
                <option value="Unblock" {{ $block->Blokets == 0 ? 'selected' : '' }}>Unblock</option>
            </select>
            @if ($errors->has('Blokets'))
                <p class="text-red-500 text-sm">{{ $errors->first('Blokets') }}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary mb-3">Update</button>
    </form>
</div>
@endsection
@extends('layout')

@section('title',  __('translation.navigation_SCategories'))
@section('content')
<div class="container mx-2">
        <a id="create" href="{{ route('sound-categories.create') }}" class="btn btn-primary mb-3 mt-3">{{ __('translation.createNewCategory') }}</a>
        @if (session('success'))
        <div class="alert alert-success mx-2 my-2 mr-3">{{ session('success') }}</div>
        @endif
        @if ($SoundCategory->isEmpty())
        <div class="col-span-full flex items-center justify-center">
            <h1 class="dark:text-white text-black text-3xl font-bold text-center">{{ __('translation.noCategories') }}</h1>
        </div>
        @else
        <div class="table-responsive overflow-x-auto mx-3">
            <table class="table table-zebra overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">  
            <thead>
                <tr class="text-center align-middle bg-blue-200 dark:bg-blue-700 text-black dark:text-white border border-gray-300">
                    <th>{{ __('translation.name') }}</th>
                    <th>{{ __('translation.description') }}</th>
                    <th>{{ __('translation.subcategory') }}</th>
                    <th>{{ __('translation.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($SoundCategory as $soundCategory)
                <tr class="align-middle items-center text-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                        <td>{{ Str::limit($soundCategory->Nosaukums, 20) }}</td>
                        @unless (empty($soundCategory->Apraksts))
                        <td>{{ Str::limit($soundCategory->Apraksts, 25) }}</td>
                        @else
                        <td class="items-center text-center">-</td>
                        @endunless
                        @if ($soundCategory->parent)
                        <td>{{ Str::limit($soundCategory->parent->Nosaukums, 25) }}</td>
                        @else
                        <td class="items-center text-center">-</td>
                        @endif
                        <td>
                            <a href="{{ route('sound-categories.edit', $soundCategory->SKat_ID) }}" class="btn btn-sm btn-primary edit">{{ __('translation.edit') }}</a>
                            <form action="{{ route('sound-categories.destroy', $soundCategory->SKat_ID) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-error !text-pink-100" onclick="return confirm('{{ __('translation.confirmDeleteCategory') }}')">{{ __('translation.delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        @endif
    </div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const createButton = document.getElementById('create');

    createButton.addEventListener('click', function(event) {
        if (createButton.disabled) {
            event.preventDefault(); 
            return;
        }

        createButton.disabled = true;
        createButton.style.pointerEvents = 'none'; 
        createButton.style.opacity = '0.5'; 

        setTimeout(() => {
            createButton.disabled = false;
            createButton.style.pointerEvents = 'auto';
            createButton.style.opacity = '1';
        }, 5000);
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit');

    editButtons.forEach(function (editButton) {
        editButton.addEventListener('click', function (event) {
            if (editButton.disabled) {
                event.preventDefault();
                return;
            }

            editButton.disabled = true;
            editButton.style.pointerEvents = 'none';
            editButton.style.opacity = '0.5';

            setTimeout(() => {
                editButton.disabled = false;
                editButton.style.pointerEvents = 'auto';
                editButton.style.opacity = '1';
            }, 5000);
        });
    });
});
</script>  
@endsection
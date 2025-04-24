@extends('layout')

@section('title',  __('translation.block'))
@section('content')
@php
    use App\Models\Noblokets;
    use App\Models\User;
    $blockUserID = Noblokets::pluck('L_ID')->toArray();
    $users = User::whereNotIn('id', $blockUserID)->where('id', '!=', Auth::id())->get();
@endphp
<div class="container mx-2">
    @if ($users->isEmpty())
    @else
    <a id="block" href="{{ route('block.create') }}" class="btn btn-primary mb-3 mt-3">{{ __('translation.navigation_block') }}</a>
    @endif
    <div class="table-responsive overflow-x-auto mx-3 my-2">
        @if (session('success'))
        <div class="alert alert-success mx-2 my-2 mr-3">{{ session('success') }}</div>
        @endif
        @if ($block->isEmpty())
        <div class="col-span-full flex items-center justify-center">
            <h1 class="text-white text-3xl font-bold text-center">{{ __('translation.noBlock') }}</h1>
        </div>
        @else
        <table class="table table-zebra overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">
            <thead>
                <tr class="text-center align-middle bg-red-200 dark:bg-red-700 text-black dark:text-white border border-gray-300">
                    <th>{{ __('translation.user') }}</th>
                    <th>{{ __('translation.reason') }}</th>
                    <th>{{ __('translation.status') }}</th>
                    <th>{{ __('translation.created') }}</th>
                    <th>{{ __('translation.updated') }}</th>
                    <th>{{ __('translation.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($block as $blocked)
                <tr class="align-middle items-center text-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                    <td>{{ Str::limit($blocked->lietotajs->name, 20) ?? __('translation.unknownUser')}}</td>
                    <td>{{ Str::limit($blocked->Iemesls, 25) }}</td>
                    <td>{{ $blocked->Blokets ?  __('translation.isBlocked') : __('translation.notBlocked')}}</td>
                    <td>{{ $blocked->created_at	}}</td>
                    <td>{{ $blocked->updated_at	 }}</td>
                    <td>
                        <a href="{{ route('block.edit', $blocked->B_ID) }}" class="btn btn-sm btn-primary edit">{{ __('translation.edit') }}</a>
                        <form action="{{ route('block.destroy', $blocked->B_ID) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-error !text-pink-100" onclick="return confirm('{{ __('translation.uSure') }}')">{{ __('translation.delete') }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    {{ $block->links() }} <!-- Pagination links -->
</div>
<script>
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

document.addEventListener('DOMContentLoaded', function() {
    const blockButton = document.getElementById('block');

    // Add a click event listener
    blockButton.addEventListener('click', function(event) {
        // Prevent default action if the button is already disabled
        if (blockButton.disabled) {
            event.preventDefault(); 
            return;
        }

        // Disable the button for 5 seconds
        blockButton.disabled = true;
        blockButton.style.pointerEvents = 'none'; // Disable hover/click effects
        blockButton.style.opacity = '0.5'; // Visually indicate it's disabled

        setTimeout(() => {
            blockButton.disabled = false;
            blockButton.style.pointerEvents = 'auto';
            blockButton.style.opacity = '1';
        }, 5000);
    });
});
</script>
@endsection
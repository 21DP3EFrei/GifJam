@extends('layout')

@section('title', 'Block')
@section('content')
<div class="container mx-2">
    <a href="{{ route('block.create') }}" class="btn btn-primary mb-3 mt-3">Block user</a>
    <div class="table-responsive overflow-x-auto mx-3 my-2">
        <table class="table table-zebra overflow-x-auto rounded-box border border-base-content/5 bg-base-100 border-collapse">
            <thead>
                <tr class="text-center align-middle bg-red-200 dark:bg-red-700 text-black dark:text-white border border-gray-300">
                    <th>User</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($block as $blocked)
                <tr class="align-middle items-center text-center hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-300">
                    <td>{{ $blocked->lietotajs->name ?? 'Unknown User' }}</td>
                    <td>{{ $blocked->Iemesls }}</td>
                    <td>{{ $blocked->Blokets ? 'Blocked' : 'Unblocked' }}</td>
                    <td>{{ $blocked->created_at	}}</td>
                    <td>{{ $blocked->updated_at	 }}</td>
                    <td>
                        <a href="{{ route('block.edit', $blocked->B_ID) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('block.destroy', $blocked->B_ID) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-error !text-pink-100" onclick="return confirm('Are you sure you want to delete this blocked?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $block->links() }} <!-- Pagination links -->
</div>
@endsection
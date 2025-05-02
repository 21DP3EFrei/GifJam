<div class="border rounded-full w-9 h-9 transition ease-in-out duration-300 hover:bg-blue-300 border-black dark:border-white">
    <form action="{{ route('media.download', $media) }}" method="GET" class="space-y-2">
        @csrf
        <button type="submit" class="w-full h-full text-xl text-center text-blue-600 underline hover:text-blue-800 tooltip" data-tip="{{ __('translation.download') }}">
            ↓
        </button>
    </form>
</div>

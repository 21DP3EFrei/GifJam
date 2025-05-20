<!DOCTYPE html>
@php
    $blockReason = \App\Models\Noblokets::where('L_ID', auth()->id())->value('Iemesls');
@endphp
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GifJam - {{ __('translation.home') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="m-0 p-0 flex flex-col items-center justify-center min-h-screen bg-[#f3f4f6] dark:bg-[#1e293b]">
    <div class="max-w-xl text-center w-full p-5 rounded-[8px] bg-[#ffffff] shadow-[0_4px_6px_rgba(0,0,0,0.1)] dark:bg-[#334155]">
        <h1 class="text-4xl mb-3 dark:text-white text-black">{{ __('translation.blocked') }}</h1>
        <p class="mb-2 dark:text-white text-black">{{ __('translation.greeting') }} {{ auth()->user()->name }}! <br> {{ __('translation.blockfor') }} {{ $blockReason ?? __('translation.noReason') }} <br> {{ __('translation.newAcc') }}</p>
        <form id="myform" action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button id="logout" type="submit" class="btn btn-primary hover:underline uppercase text-white">{{ __('translation.returnHome') }}</button>
        </form>
    </div>
</body>
</html>
<script>
    document.getElementById("myform").addEventListener("submit", function() {
        const leaveButton = document.getElementById("logout");

            // Change text immediately
            leaveButton.disabled = true;
            leaveButton.innerHTML = '<span class="loading loading-spinner text-warning mr-2"></span> {{ __("translation.returnHome") }}';

            // Re-enable the button after 5 seconds
            setTimeout(function() {
                leaveButton.disabled = false;
            }, 5000);
        });
    </script>
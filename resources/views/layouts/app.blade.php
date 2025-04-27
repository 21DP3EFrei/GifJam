<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GifJam') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        @php
            $userId = Auth::id();
            $isBlocked =  App\Models\Noblokets::where('L_ID', $userId)->where('Blokets', 1)->exists();
        @endphp
        <x-banner />

        <div class="bg-gray-100">
            @if (!$isBlocked)
            @livewire('navigation-menu')
            @endif
            
            <!-- Page Heading -->
            @if (isset($header))
                <header class="header dark:bg-blue-900 shadow-sm border-2 border-gray-500">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-black dark:text-white">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="bg-gray-300 dark:bg-sky-950">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>

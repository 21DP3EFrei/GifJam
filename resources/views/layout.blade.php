<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="min-h-screen flex flex-col">
   <!-- old header -->
    <x-app-layout class="flex-grow">
{{--         <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
                @yield('header')
            </h2>
        </x-slot> --}}


        <!-- Content -->
        <div class="py-12 background flex-grow display-block min-h-screen dynamic-background" >
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="header overflow-hidden shadow-xl sm:rounded-lg dark:text-white">
                    @yield('content')
                </div>
            </div>
        </div>
    </x-app-layout>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    @stack('scripts') 
</body>
</html>

<style>
html, body {
    height: 100%;
    margin: 0;
}
body {
    display: flex;
    flex-direction: column;
}

        @media (prefers-color-scheme: dark) {
            .dynamic-background {
                background-color: #02315f; /* Dark mode background */
            }
        }

        @media (prefers-color-scheme: light) {
            .dynamic-background {
                background-color: rgb(195, 193, 193); /* Light mode background */
            }
        }
</style>
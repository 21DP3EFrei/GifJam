<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script type="module" src="https://cdn.jsdelivr.net/npm/media-chrome@3/+esm"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="min-h-screen flex flex-col">
   <!-- old header -->
    <x-app-layout class="grow">
{{--         <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white dark:bg-blue-900 leading-tight">
                @yield('header')
            </h2>
        </x-slot> --}}


        <!-- Content -->
        <div class="py-12 background grow display-block min-h-screen dynamic-background" >
            <div class="max-w-7xl mx-auto sm:px-6 md:px-20 lg:px-4">
                <div class="header overflow-hidden shadow-xl sm:rounded-lg dark:text-white dark:bg-blue-950">
                    @yield('content')
                </div>
            </div>
        </div>
    </x-app-layout> 
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
                background-color: #001729 !important; /* Dark mode background */
            }
        }
            .dynamic-background {
                background-color: rgb(222, 221, 221); /* Light mode background */
        }
</style>
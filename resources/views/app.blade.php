<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'GifJame') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        <script type="module" src="https://cdn.jsdelivr.net/npm/media-chrome@3/+esm"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
    </head>
    <body class="font-sans antialiased">
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GifJam - {{ __('translation.home') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.15.1/dist/full.css" rel="stylesheet">
</head>
<body class="bg-gray-800 text-gray-100">
    <!-- Navbar -->
    <nav class="navbar bg-gray-900 shadow-lg">
        <div class="container mx-auto flex items-center justify-between px-4 py-2">
            <a href="" class="flex items-center space-x-3 text-primary !sm:hidden">
                <img class="h-10 w-14" src="{{ asset('images/gifjam.png') }}" alt="Logo" class="h-12">
            </a>            
            <div class="flex flex-row">
                <select class="w-50 rounded-md border-gray-300 shadow-sm focus:ring-opacity-50 border p-3 py-1 mr-2" style="background-color: #051d2c" onchange="window.location.href = this.value">
                    @php
                        $languages = ['en' =>  'En', 'lv' => 'Lv', 'ru' =>  'Ru'];
                        $currentLanguage = Session::get('locale', 'en'); // Get the current locale from the session
                    @endphp
                    @foreach ($languages as $code => $name)
                        <option value="{{ url('locale/' . $code) }}" {{ $currentLanguage === $code ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            @if (auth()->check()) 
                <a href="/welcome" class="btn btn-primary mr-2">{{ __('translation.navigation_welcome') }}</a>
            @else
                <a href="/login" class="btn btn-primary mr-2">{{ __('translation.login') }}</a>
                <a href="/register" class="btn btn-outline">{{ __('translation.register') }}</a>
            @endif
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container mx-auto text-center mt-16">
        <h1 class="text-5xl font-bold flex items-center justify-center">
            {{ __('translation.welcomeTo') }}
            <a href="Click.mp4" target="_blank">
                <img src="{{ asset('Coin.gif') }}" alt="Coin" class="w-12 h-12 ml-2 cursor-pointer">
            </a>
        </h1>
        <p class="text-lg mt-4">{{ __('translation.welcomeExplain') }}</p>

        <!-- Info Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-1 mt-12">
            <!-- Memes + Gifs Card -->
            <div class="card bg-gray-700 shadow-xl p-6 mx-4">
                <img src="{{ asset('lol.png') }}" class="w-12 h-12 mx-auto mb-4" alt="Memes Icon">
                <h2 class="text-xl font-semibold">{{ __('translation.MG') }}</h2>
                <p class="mt-2">{{ __('translation.MGdescription') }}</p>
            </div>

            <!-- Sounds Card -->
            <div class="card bg-gray-700 shadow-xl p-6 mx-4">
                <img src="{{ asset('Note.png') }}" class="w-12 h-12 mx-auto mb-4" alt="Sounds Icon">
                <h2 class="text-xl font-semibold">{{ __('translation.sound') }}</h2>
                <p class="mt-2">{{ __('translation.soundDescription') }}</p>
            </div>

            <!-- Music Card -->
            <div class="card bg-gray-700 shadow-xl p-6 mx-4">
                <img src="{{ asset('CD.png') }}" class="w-12 h-12 mx-auto mb-4" alt="Music Icon">
                <h2 class="text-xl font-semibold">{{ __('translation.music') }}</h2>
                <p class="mt-2">{{ __('translation.musicDescription') }}</p>
            </div>
        </div>

        <!-- Join Now Section -->
        <div class="card bg-base-200 shadow-lg mt-12 p-8 text-center">
            <h2 class="text-2xl text-primary font-semibold">{{ __('translation.what') }}</h2>
            <p class="mt-2">{{ __('translation.joinGifjam') }}</p>
            <img src="{{ asset('banan.gif') }}" class="w-12 h-12 mx-auto" alt="Banana">
            <a href="/register" class="btn btn-lg btn-success">{{ __('translation.join') }}</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 mt-16 py-4 text-center text-gray-400">
        <div class="container mx-auto">
            © <?php echo date("Y"); ?> GifJam
        </div>
    </footer>
</body>
<style>
    .btn-outline{
        color: blue !important;
    }
    .btn-outline:hover{
        background-color: #005081 !important;
        color:azure !important; 
    }
</style>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GifJam - {{ __('translation.home') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.15.1/dist/full.css" rel="stylesheet">
</head>
<body class="dark:!bg-gray-800 bg-neutral-200 text-gray-100 min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="dark:!bg-gray-900 bg-slate-500 shadow-lg">
        <div class="container mx-auto flex flex-col sm:flex-row items-center justify-between px-4 py-2">
            <a id="home" href="" class="flex items-center space-x-3 text-primary">
                <img class="h-10 w-14" src="{{ asset('images/gifjam.png') }}" alt="{{ __('translation.logo') }}" class="h-12">
            </a>            
            <div class="flex flex-row">
                <select class="w-20 rounded-md border-gray-300 shadow-sm focus:ring-opacity-50 border p-3 py-1 mr-2 dark:!bg-gray-900 bg-slate-500" onchange="window.location.href = this.value">
                    @php
                        $languages = ['en' =>  'En', 'lv' => 'Lv', 'ru' =>  'Ru'];
                        $currentLanguage = Session::get('locale', 'en'); // Get the current locale from the session
                    @endphp
                    @foreach ($languages as $code => $name)
                        <option value="{{ url('locale/' . $code) }}" {{ $currentLanguage == $code ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            @if (auth()->check()) 
                <a id="welcome" href="/welcome" class="btn btn-primary mr-2">{{ __('translation.navigation_welcome') }}</a>
            @else
                <a id="login" href="/login" class="btn btn-primary mr-2">{{ __('translation.login') }}</a>
                <a id="register" href="/register" class="btn btn-outline dark:!text-white !text-blue-400">{{ __('translation.register') }}</a>
            @endif
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-grow container mx-auto text-center mt-16">
        <h1 class="text-5xl text-gray-900 dark:!text-white flex items-center justify-center">
            {{ __('translation.welcomeTo') }}
            <a href="Click.mp4" target="_blank">
                <img src="{{ asset('Coin.gif') }}" alt="Coin" class="w-12 h-12 lg:ml-2 cursor-pointer">
            </a>
        </h1>
        <p class="text-lg mt-4 text-gray-700 dark:!text-white">{{ __('translation.welcomeExplain') }}</p>
        @if (auth()->check()) 
        <a href="mark.mp4" target="_blank" class="inline-block w-fit mx-auto">
            <img src="{{ asset('images/portugal.png') }}" alt="Coin" class="w-13 h-10 cursor-pointer">
        </a>                       
        @endif
        <!-- Info Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-1 mt-12">
            <!-- Memes + Gifs Card -->
            <div class="card bg-gray-400 dark:!bg-gray-600 shadow-xl p-6 mx-4">
                <img src="{{ asset('lol.png') }}" class="w-12 h-12 mx-auto mb-4" alt="{{ __('translation.Meicon') }}">
                <h2 class="text-xl font-semibold">{{ __('translation.MG') }}</h2>
                <p class="mt-2">{{ __('translation.MGdescription') }}</p>
            </div>

            <!-- Sounds Card -->
            <div class="card bg-gray-400 dark:!bg-gray-600 shadow-xl p-6 mx-4">
                <img src="{{ asset('Note.png') }}" class="w-12 h-12 mx-auto mb-4" alt="{{ __('translation.Sicon') }}">
                <h2 class="text-xl font-semibold">{{ __('translation.sound') }}</h2>
                <p class="mt-2">{{ __('translation.soundDescription') }}</p>
            </div>

            <!-- Music Card -->
            <div class="card bg-gray-400 dark:!bg-gray-600 shadow-xl p-6 mx-4">
                <img src="{{ asset('CD.png') }}" class="w-12 h-12 mx-auto mb-4" alt="{{ __('translation.Micon') }}">
                <h2 class="text-xl font-semibold">{{ __('translation.music') }}</h2>
                <p class="mt-2">{{ __('translation.musicDescription') }}</p>
            </div>
        </div>

        <!-- Join Now Section -->
        <div class="card bg-gray-300 dark:!bg-gray-700 shadow-lg mt-12 p-8 text-center">
            <h2 class="text-2xl dark:text-violet-400 text-violet-700 font-semibold">{{ __('translation.what') }}</h2>
            <p class="mt-2 text-black dark:!text-white">{{ __('translation.joinGifjam') }}</p>
            <img src="{{ asset('banan.gif') }}" class="w-12 h-12 mx-auto" alt="{{ __('translation.banana') }}">
            <a id="join" href="/register" class="btn btn-lg btn-success">{{ __('translation.join') }}</a>
        </div>
    </main>
    

    <!-- Footer -->
    <footer class="dark:!bg-gray-900 bg-gray-600 mt-16 py-4 text-gray-400 flex items-center justify-between">
        <div class="flex items-center">
            <a href="https://github.com/21DP3EFrei/GifJam" target="_blank" class="max-w-10 tooltip tooltip-right" data-tip="{{ __('translation.gtihub') }}">
                <img class="max-h-10 max-w-10 bg-white p-1 rounded-full" src="{{ asset('images/gh.png') }}" alt="{{ __('translation.gtihub') }}" />
            </a>
        </div>
        <div class="flex-grow text-center dark:!text-gray-400 text-gray-100">
            © {{ date("Y") }} GifJam
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
<script>
    const loginLink = document.getElementById('login');
    const registerLink = document.getElementById('register');
    const home = document.getElementById('home');
    const welcomeLink = document.getElementById('welcome'); // May not exist
    const join = document.getElementById('join');

    function disableTemporarily(element, seconds = 5) {
        if (!element) return;

        element.style.pointerEvents = 'none';
        element.style.opacity = '0.5';

        setTimeout(() => {
            element.style.pointerEvents = 'auto';
            element.style.opacity = '1';
        }, seconds * 1000);
    }

    function isDisabled(element) {
        return element?.style.pointerEvents === 'none';
    }

    if (loginLink) {
        loginLink.addEventListener('click', function (event) {
            if (isDisabled(loginLink) || isDisabled(registerLink) || isDisabled(home) || isDisabled(welcomeLink) || isDisabled(join)) {
                event.preventDefault();
                return;
            }

            disableTemporarily(loginLink);
            disableTemporarily(registerLink);
        });
    }

    if (registerLink) {
        registerLink.addEventListener('click', function (event) {
            if (isDisabled(loginLink) || isDisabled(registerLink) || isDisabled(home) || isDisabled(welcomeLink) || isDisabled(join)) {
                event.preventDefault();
                return;
            }

            disableTemporarily(loginLink);
            disableTemporarily(registerLink);
        });
    }

    if (home) {
        home.addEventListener('click', function (event) {
            if (isDisabled(loginLink) || isDisabled(registerLink) || isDisabled(home) || isDisabled(welcomeLink) || isDisabled(join)) {
                event.preventDefault();
                return;
            }

            disableTemporarily(home);
        });
    }

    if (welcomeLink) {
        welcomeLink.addEventListener('click', function (event) {
            if (isDisabled(loginLink) || isDisabled(registerLink) || isDisabled(home) || isDisabled(welcomeLink) || isDisabled(join)) {
                event.preventDefault();
                return;
            }

            disableTemporarily(welcomeLink);
        });
    }
    if (join) {
        join.addEventListener('click', function (event) {
            if (isDisabled(loginLink) || isDisabled(registerLink) || isDisabled(home) || isDisabled(welcomeLink) || isDisabled(join)) {
                event.preventDefault();
                return;
            }

            disableTemporarily(join);
        });
    }
</script>

<!DOCTYPE html>
<head>
    <title>{{ __('translation.login') }}</title>
</head>
</html>
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="h-10 w-14" src="{{ asset('images/gifjam.png') }}" alt="{{ __('translation.logo') }}">
            </a>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class>
            @csrf

            <div>
                <x-label for="email" value="{{ __('translation.email') }}" class="text-black dark:text-white" />
                <x-input title="{{ __('translation.email') }}" novalidate id="email" class="input input-lg block mt-1 border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" oninvalid="this.setCustomValidity('{{ __('translation.fillEmail') }}')" oninput="this.setCustomValidity('');"/>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('translation.password') }}" class="text-black dark:text-white"/>
                <x-input title="{{ __('translation.titleurpassword') }}" id="password" class="input input-lg block mt-1 border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white w-full" type="password" name="password" required autocomplete="current-password" oninvalid="this.setCustomValidity('{{ __('translation.fillPassword') }}')" oninput="this.setCustomValidity('');"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-slate-100">{{ __('translation.remember') }}</span>
                </label>
            </div>

            <div class="mt-4 flex justify-between items-center">
                <a id="switch" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:hover:text-blue-500" href="{{ route('register') }}">
                    {{ __('translation.noaccount') }}
                </a>

                <!-- Login button aligned to the right -->
                <x-button id="loginButton" class="ms-auto">
                    {{ __('translation.login') }}
                </x-button>
            </div>
        </form>
        <h1 class="text-gray-400 opacity-45">{{ __('translation.orSign') }}</h1>
        <a id="google" href="{{ route('auth.google.redirect') }}" class="flex justify-center items-center space-x-4 text-center">
            <div class=" py-1 border-black border-2 bg-transparent  dark:bg-gray-700  flex items-center rounded-full">
                <img class="h-auto w-auto max-h-10 max-w-12 rounded-sm ml-1 mr-1" src="{{ asset('images/Google.png') }}"  alt="{{ __('translation.logoGoogleL') }}">
                <h1 class="ml-1 mr-2 dark:text-gray-300 font-bold">{{ __('translation.googleSignIn') }}</h1>
            </div>
        </a>
    </x-authentication-card>
</x-guest-layout>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        const registerButton = document.getElementById('loginButton');
    
        form.addEventListener('submit', function (event) {
            // Disable the button to prevent multiple submissions
            registerButton.disabled = true;
            registerButton.innerHTML = '<span class="loading loading-spinner text-secondary"></span>';
            return true;
        });
    });

document.addEventListener('DOMContentLoaded', function() {
const googleButton = document.getElementById('google');

googleButton.addEventListener('click', function(event) {
    if (googleButton.disabled) {
        event.preventDefault(); 
        return;
    }

    googleButton.disabled = true;
    googleButton.style.pointerEvents = 'none'; 
    googleButton.style.opacity = '0.5'; 

    setTimeout(() => {
        googleButton.disabled = false;
        googleButton.style.pointerEvents = 'auto';
        googleButton.style.opacity = '1';
    }, 5000);
});
});

document.addEventListener('DOMContentLoaded', function() {
const switcBtn = document.getElementById('switch');

switcBtn.addEventListener('click', function(event) {
    if (switcBtn.disabled) {
        event.preventDefault(); 
        return;
    }

    switcBtn.disabled = true;
    switcBtn.style.pointerEvents = 'none'; 
    switcBtn.style.opacity = '0.5'; 

    setTimeout(() => {
        switcBtn.disabled = false;
        switcBtn.style.pointerEvents = 'auto';
        switcBtn.style.opacity = '1';
    }, 5000);
});
});
</script>

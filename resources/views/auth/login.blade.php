<!DOCTYPE html>
<head>
    <title>Login</title>
</head>
</html>
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="h-10 w-14" src="{{ asset('images/gifjam.png') }}" alt="Logo">
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
                <x-label for="email" value="{{ __('Email') }}" class="text-black dark:text-white" />
                <x-input id="email" class="block mt-1 w-full bg-gray-200 border-black text-black dark:bg-blue-300" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" class="text-black dark:text-white"/>
                <x-input id="password" class="block mt-1 w-full bg-gray-200 border-black text-black dark:bg-blue-300" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-slate-100">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-4 flex justify-between items-center">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:hover:text-blue-500" href="{{ route('register') }}">
                    {{ __("Don't have an account?") }}
                </a>

                <!-- Login button aligned to the right -->
                <x-button class="ms-auto">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<!DOCTYPE html>
<head>
    <title>Register</title>
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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" class="text-black dark:text-white" />
                <x-input id="name" class="input input-lg block mt-1 border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white w-full" type="text" name="name" :value="old('name')" required autofocus  autocomplete="off" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" class="text-black dark:text-white"/>
                <x-input id="email" class="input input-lg block mt-1 border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" class="text-black dark:text-white"/>
                <x-input id="password" class="input input-lg block mt-1 border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-black dark:text-white"/>
    <x-input id="password_confirmation" class="input input-lg block mt-1 border rounded-sm bg-gray-200 dark:!bg-blue-900 dark:text-white dark:active:!bg-blue-900 dark:focus:!bg-blue-900 dark:focus:text-white w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
             </div>


            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:hover:text-blue-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                <x-button class="ms-auto">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
        <h1 class="text-gray-400 opacity-45">or sign up with:</h1>
        <a href="{{ route('auth.google.redirect') }}" class="flex justify-center items-center space-x-4 text-center">
            <div class=" py-1 border-black border-2 bg-transparent  dark:bg-gray-700  flex items-center rounded-full">
                <img class="h-auto w-auto max-h-10 max-w-12 rounded-sm ml-1 mr-1" src="{{ asset('images/Google.png') }}" alt="google login">
                <h1 class="ml-1 mr-2 dark:text-gray-300 font-bold">Sign up with Google</h1>
            </div>
        </a>
        
        
        
    </x-authentication-card>
</x-guest-layout>

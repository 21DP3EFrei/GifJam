<!DOCTYPE html>
<head>
    <title>{{ __('translation.navigation_profile') }}</title>
</head>
</html>
<x-app-layout>

    <div class="dynamic-background">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="relative items-center flex justify-between mb-10 sm:mt-0">
                <h1 name="title" class="flex items-center whitespace-nowrap text-lg font-semibold text-gray-700 dark:text-white">
                    {{ __('translation.changeLang') }}
                </h1>
                <select class="w-50 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white border p-4 dark:border-gray-100 dark:bg-blue-950" onchange="window.location.href = this.value">
                    @php
                        $languages = ['en' =>  __('translation.english'), 'lv' =>  __('translation.latvian'), 'ru' =>  __('translation.russian')];
                        $currentLanguage = Session::get('locale', 'en'); // Get the current locale from the session
                    @endphp
                    @foreach ($languages as $code => $name)
                        <option value="{{ url('locale/' . $code) }}" {{ $currentLanguage === $code ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <x-section-border />
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Auth::user()?->password !== null)
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif
            @endif

            {{-- @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif --}}

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
        </div>
    </div>
    <style>
        @media (prefers-color-scheme: dark) {
            .dynamic-background {
                background-color: #02315f; /* Dark mode background */
            }
        }

        @media (prefers-color-scheme: light) {
            .dynamic-background {
                background-color: rgb(220, 219, 219); /* Light mode background */
            }
        }
</style>
</x-app-layout>
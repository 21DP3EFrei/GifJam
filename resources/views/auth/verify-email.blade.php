<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('translation.verifyEmail') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('translation.verifyLink') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form id="mail" method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button id="send" type="submit">
                        {{ __('translation.resendVerify') }}
                    </x-button>
                </div>
            </form>

            <div>
                <a href="{{ route('profile.show') }}" class="underline text-sm text-gray-600 hover:text-gray-900 dark:hover:text-gray-400 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('translation.editProfile') }}
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 dark:hover:text-gray-400 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2">
                        {{ __('translation.navigation_logOut') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
<script>
    document.getElementById("mail").addEventListener("submit", function(event) {
            // Get the submit button
            const sendButton = document.getElementById("send");
    
            // Disable the button to prevent multiple submissions
            sendButton.disabled = true;
            sendButton.innerHTML = '<span class="loading loading-spinner text-warning"></span>';
    
            // Re-enable the button after 5 seconds
            setTimeout(function() {
                sendButton.disabled = false;
            }, 50000);
        });
    </script>
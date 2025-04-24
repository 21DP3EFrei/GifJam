<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                {{ __('translation.2authConfirm') }}
            </div>

            <div class="mb-4 text-sm text-gray-600" x-cloak x-show="recovery">
                {{ __('translation.2authRecover') }}
            </div>

            <form id="myform" method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-show="! recovery">
                    <x-label for="code" value="{{ __('translation.code') }}" />
                    <x-input title="{{ __('translation.authCode') }}" id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                    @if ($errors->any())
                    <div class="alert alert-error mt-2">
                         <li>{{ __('passwords.2authPError') }}</li>
                    </div>
                    @endif
                </div>

                <div class="mt-4" x-cloak x-show="recovery">
                    <x-label for="recovery_code" value="{{ __('translation.recoveryCod') }}" />
                    <x-input title="{{ __('translation.recoveryCod') }}" id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                    @if ($errors->any())
                    <div class="alert alert-error mt-2">
                         <li>{{ __('passwords.2authRError') }}</li>
                    </div>
                    @endif
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer dark:hover:text-blue-500"
                                    x-show="! recovery"
                                    x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        {{ __('translation.useRecovery') }}
                    </button>

                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer dark:hover:text-blue-500"
                                    x-cloak
                                    x-show="recovery"
                                    x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        {{ __('translation.useAuth') }}
                    </button>

                    <x-button id="login" class="ms-4">
                        {{ __('translation.login') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
<script>
document.getElementById("myform").addEventListener("submit", function(event) {
    // Get the submit button
    const submitButton = document.getElementById("login");

    // Disable the button to prevent multiple submissions
    submitButton.disabled = true;
    submitButton.innerHTML = '<span class="loading loading-spinner text-warning"></span>';

    // Re-enable the button after 5 seconds
    setTimeout(function() {
        submitButton.disabled = false;
    }, 5000);
});
</script>
<x-action-section>
    <x-slot name="title">
        {{ __('translation.twoAuth') }}
    </x-slot>

    <x-slot name="description">
        {{ __('translation.twoAuthDesc') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    {{ __('translation.finish2auth') }}
                @else
                    {{ __('translation.enable2auth') }}
                @endif
            @else
                {{ __('translation.no2auth') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600 dark:text-gray-300">
            <p>
                {{ __('translation.2authDesc') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            {{ __('translation.completeh2auth') }}
                        @else
                            {{ __('translation.2authEnabled') }}
                        @endif
                    </p>
                </div>

                <div class="mt-4 p-2 inline-block bg-white">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('translation.setupKey') }}: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4">
                        <x-label for="code" value="{{ __('translation.code') }}" />

                        <x-input id="code" type="text" name="code" class="block mt-1 w-1/2" inputmode="numeric" autofocus autocomplete="one-time-code"
                            wire:model="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication" />

                        <x-input-error for="code" class="mt-2" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('translation.recoveryCode') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-button type="button" wire:click="enableTwoFactorAuthentication" wire:loading.attr="disabled">
                    {{ __('translation.enable') }}
                </x-button>
            @else
                @if ($showingRecoveryCodes)
                    <x-secondary-button class="me-3" wire:click="regenerateRecoveryCodes">
                        {{ __('translation.regenCode') }}
                    </x-secondary-button>
                @elseif ($showingConfirmation)
                    <x-button type="button" class="me-3" wire:click="confirmTwoFactorAuthentication" wire:loading.attr="disabled">
                        {{ __('confirm') }}
                    </x-button>
                @else
                    <x-secondary-button class="me-3" wire:click="showRecoveryCodes">
                        {{ __('translation.showCode') }}
                    </x-secondary-button>
                @endif
        
                @if ($showingConfirmation)
                    <x-secondary-button wire:click="disableTwoFactorAuthentication" wire:loading.attr="disabled">
                        {{ __('translation.cancel') }}
                    </x-secondary-button>
                @else
                    <x-danger-button wire:click="disableTwoFactorAuthentication" wire:loading.attr="disabled">
                        {{ __('translation.disable') }}
                    </x-danger-button>
                @endif
            @endif
        </div>
    </x-slot>
</x-action-section>

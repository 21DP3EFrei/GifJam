@props(['title' => __('Confirm Password'), 'content' => __('For your security, please confirm your password to continue.'), 'button' => __('Confirm')])

@php
    $confirmableId = md5($attributes->wire('then'));
@endphp

<span
    {{ $attributes->wire('then') }}
    x-data
    x-ref="span"
    x-on:click="$wire.startConfirmingPassword('{{ $confirmableId }}')"
    x-on:password-confirmed.window="setTimeout(() => $event.detail.id === '{{ $confirmableId }}' && $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);"
>
    {{ $slot }}
</span>

@once
<x-dialog-modal wire:model.live="confirmingPassword">
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="content">
        {{ $content }}

        <div class="mt-4" x-data="{}" x-on:confirming-password.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
            <input title="{{ __('translation.titleurpassword') }}" type="password" class="mt-1 block w-3/4 border-gray-300 focus:border-indigo-500 p-2 focus:ring-indigo-500 rounded-md shadow-xs border bg-white dark:!bg-black dark:text-white dark:active:!bg-black dark:focus:!bg-black dark:focus:text-white autofill:!bg-white" x-ref="confirmable_password"
                        wire:model="confirmablePassword"
                        placeholder="{{ __('translation.password') }}"
                        wire:keydown.enter="confirmPassword" />
                        @if ($errors->any())
                        <div class="alert alert-error mt-2">
                             <li>{{ __('passwords.currentPassword') }}</li>
                        </div>
                        @endif        
                    </div>
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="stopConfirmingPassword" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-secondary-button>

        <x-button class="ms-3" dusk="confirm-password-button" wire:click="confirmPassword" wire:loading.attr="disabled">
            {{ $button }}
        </x-button>
    </x-slot>
</x-dialog-modal>
@endonce

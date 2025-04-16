<x-action-section>
    <x-slot name="title">
        {{ __('translation.deleteAccount') }}
    </x-slot>

    <x-slot name="description">
        {{ __('translation.deleteAccountDesc') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-300">
            {{ __('translation.deleteAccountAbout') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('translation.deleteAccount') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('translation.deleteAccount') }}
            </x-slot>

            @if (Auth::user()?->password !== null)
            <x-slot name="content">
                {{ __('translation.deleteAccountConfirm') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="">
                    <input type="password" class="mt-1 block w-3/4 border-gray-300 focus:border-indigo-500 p-2 focus:ring-indigo-500 rounded-md shadow-xs border bg-gray-200 dark:!bg-black dark:text-white dark:active:!bg-black dark:focus:!bg-black dark:focus:text-white autofill:!bg-white"
                                autocomplete="current-password"
                                placeholder="{{ __('translation.password') }}"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="deleteUser" />
                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>
            @else
            <x-slot name="content">
                {{ __('translation.deleteAccountConfirmSocial') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">

                </div>
            </x-slot>
        @endif
            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('translation.cancel') }}
                </x-secondary-button>
                @if (Auth::user()?->password !== null)
                <x-danger-button class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('translation.deleteAccount') }}
                </x-danger-button>
                @else
                    <form action="{{ route('user.destroy', Auth::id()) }}" method="POST" onsubmit="return confirm('{{ __('translation.deleteAccountConfirmSocial') }}');" class="inline">
                        @csrf
                        @method('DELETE')
                        <x-danger-button class="ms-3" type="submit">
                            {{ __('translation.deleteAccount') }}
                        </x-danger-button>
                    </form>                    
                @endif
            
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
<x-action-section>
    <x-slot name="title">
        {{ __('translation.browserSession') }}
    </x-slot>

    <x-slot name="description">
        {{ __('translation.browserSessionDesc') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-300">
            {{ __('translation.browserSessionAbout') }}
        </div>

        @if (count($this->sessions) > 0)
            <div class="mt-5 space-y-6">
                <!-- Other Browser Sessions -->
                @foreach ($this->sessions as $session)
                    <div class="flex items-center">
                        <div>
                            @if ($session->agent->isDesktop())
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                </svg>
                            @endif
                        </div>

                        <div class="ms-3">
                            <div class="text-sm text-gray-600 dark:text-gray-300">
                                {{ $session->agent->platform() ? $session->agent->platform() : __('translation.unknown') }} - {{ $session->agent->browser() ? $session->agent->browser() : __('translation.unknown') }}
                            </div>

                            <div>
                                <div class="text-xs text-gray-500 dark:text-gray-300">
                                    {{ $session->ip_address }},

                                    @if ($session->is_current_device)
                                        <span class="text-green-500 font-semibold">{{ __('translation.thisDevice') }}</span>
                                    @else
                                        {{ __('translation.lastActive') }} {{ $session->last_active }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="flex items-center mt-5">
            <x-button wire:click="confirmLogout" wire:loading.attr="disabled">
                {{ __('translation.logout') }}
            </x-button>

            <x-action-message class="ms-3" on="loggedOut">
                {{ __('translation.doned') }}
            </x-action-message>
        </div>

        <!-- Log Out Other Devices Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingLogout">
            <x-slot name="title">
                {{ __('translation.logout') }}
            </x-slot>

            <x-slot name="content">
                {{ __('translation.EnterPasswordBroswer') }}

                <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <input title="{{ __('translation.titleurpassword') }}" type="password" class="mt-1 block w-3/4 border-gray-300 focus:border-indigo-500 p-2 focus:ring-indigo-500 rounded-md shadow-xs border bg-white dark:!bg-black dark:text-white dark:active:!bg-black dark:focus:!bg-black dark:focus:text-white autofill:!bg-white"
                                autocomplete="current-password"
                                placeholder="{{ __('translation.password') }}"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="logoutOtherBrowserSessions" />
                                @if ($errors->any())
                                <div class="alert alert-error mt-2">
                                     <li>{{ __('passwords.currentPassword') }}</li>
                                </div>
                                @endif
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                    {{ __('translation.cancel') }}
                </x-secondary-button>

                <button class="ms-3 inline-flex items-center px-4 py-2 bg-gray-700 dark:bg-gray-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-hidden focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'"
                            wire:click="logoutOtherBrowserSessions"
                            wire:loading.attr="disabled">
                    {{ __('translation.logout') }}
                </button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>

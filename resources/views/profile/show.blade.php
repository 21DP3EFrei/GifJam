<!DOCTYPE html>
<head>
    <title>{{ __('translation.navigation_profile') }}</title>
</head>
</html>
<x-app-layout>
    <div class="bg-gray-200  max-w-6xl mx-auto dark:bg-sky-900">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="relative items-center flex justify-between mb-10 sm:mt-0">
                <div>
                    <h1 name="title" class="flex items-center whitespace-nowrap text-lg font-semibold text-gray-700 dark:text-white">
                        {{ __('translation.changeLang') }}
                    </h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{__('translation.languagedesc')}}</p>
                </div>
                <select class="w-50 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white border p-4 dark:border-gray-100 dark:bg-blue-900" onchange="window.location.href = this.value">
                    @php
                        $languages = ['en' =>  __('translation.english'), 'lv' =>  __('translation.latvian'), 'ru' =>  __('translation.russian')];
                        $currentLanguage = Session::get('locale', 'en'); // Get the current locale from the session
                        $userId = Auth::id();
                        $isBlocked =  App\Models\Noblokets::where('L_ID', $userId)->where('Blokets', 1)->exists();
                        $hasMedia = App\Models\Media::where('Lietotajs', Auth::id())->exists();
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


            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif
            
            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>
            <x-section-border />
            @else
            @endif
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures() && !$isBlocked)
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif 
            @if ($isBlocked)
            <form id="myform" method="POST" class="w-fit mx-auto" action="{{ route('logout') }}">
                @csrf
                <button id="logout" type="submit" class="btn btn-error hover:underline">{{__('translation.navigation_logOut')}}</button>
            </form>
            @endif

            @if ($hasMedia)
            <x-section-border />
            <div class="relative items-center flex justify-between mb-10 mt-6 px-1 sm:px-2">
                <div>
                    <h1 name="title" class="flex items-center whitespace-nowrap text-lg font-semibold text-gray-700 dark:text-white">
                        {{__('translation.export')}}
                    </h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{__('translation.exportdesc')}}</p>
                </div>
                <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 md:space-x-2 pr-2">
                <form action="{{route('view.pdf')}}" method="post" target="__blank">
                    @csrf
                        <button class="btn btn-primary font-sans mr-1 border border-black"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12.0002C20.2531 15.5764 15.8775 19 11.9998 19C8.12201 19 3.74646 15.5764 2 11.9998" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12.0002C20.2531 8.42398 15.8782 5 12.0005 5C8.1227 5 3.74646 8.42314 2 11.9998" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            {{__('translation.pdf')}}</button></form>
                <form action="{{route('download.pdf')}}" method="post">
                    @csrf
                        <button class="btn btn-secondary font-sans border border-black"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12.5535 16.5061C12.4114 16.6615 12.2106 16.75 12 16.75C11.7894 16.75 11.5886 16.6615 11.4465 16.5061L7.44648 12.1311C7.16698 11.8254 7.18822 11.351 7.49392 11.0715C7.79963 10.792 8.27402 10.8132 8.55352 11.1189L11.25 14.0682V3C11.25 2.58579 11.5858 2.25 12 2.25C12.4142 2.25 12.75 2.58579 12.75 3V14.0682L15.4465 11.1189C15.726 10.8132 16.2004 10.792 16.5061 11.0715C16.8118 11.351 16.833 11.8254 16.5535 12.1311L12.5535 16.5061Z" fill="#ffffff"></path> <path d="M3.75 15C3.75 14.5858 3.41422 14.25 3 14.25C2.58579 14.25 2.25 14.5858 2.25 15V15.0549C2.24998 16.4225 2.24996 17.5248 2.36652 18.3918C2.48754 19.2919 2.74643 20.0497 3.34835 20.6516C3.95027 21.2536 4.70814 21.5125 5.60825 21.6335C6.47522 21.75 7.57754 21.75 8.94513 21.75H15.0549C16.4225 21.75 17.5248 21.75 18.3918 21.6335C19.2919 21.5125 20.0497 21.2536 20.6517 20.6516C21.2536 20.0497 21.5125 19.2919 21.6335 18.3918C21.75 17.5248 21.75 16.4225 21.75 15.0549V15C21.75 14.5858 21.4142 14.25 21 14.25C20.5858 14.25 20.25 14.5858 20.25 15C20.25 16.4354 20.2484 17.4365 20.1469 18.1919C20.0482 18.9257 19.8678 19.3142 19.591 19.591C19.3142 19.8678 18.9257 20.0482 18.1919 20.1469C17.4365 20.2484 16.4354 20.25 15 20.25H9C7.56459 20.25 6.56347 20.2484 5.80812 20.1469C5.07435 20.0482 4.68577 19.8678 4.40901 19.591C4.13225 19.3142 3.9518 18.9257 3.85315 18.1919C3.75159 17.4365 3.75 16.4354 3.75 15Z" fill="#ffffff"></path> </g></svg>
                        {{__('translation.download')}}</button></form>
                </div>  
            </div>     
            @endif    
        </div>
    </div>
</x-app-layout>
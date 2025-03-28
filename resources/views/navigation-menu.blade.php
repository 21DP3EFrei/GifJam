<nav x-data="{ open: false }" class="dark:border border-gray-300 dark:border-gray-600 outline-black dark:bg-gray-800" aria-label="Main Navigation">
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 flex justify-between items-center py-4">
        <!-- Logo -->
        <div class="flex items-center min-h-10 min-w-14">
            <a href="{{ route('welcome') }}">
                <img class="h-10 w-14" src="{{ asset('images/gifjam.png') }}" alt="Logo">
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden sm:flex space-x-3"> 
            <x-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')" class="py-2">
                {{ __('translation.navigation_welcome') }}
            </x-nav-link>
            <x-nav-link href="{{ route('upload') }}" :active="request()->routeIs('upload')" class="py-2">
                {{ __('translation.navigation_upload') }}
            </x-nav-link>
            <x-nav-link href="{{ route('pictures.index') }}" :active="request()->routeIs('pictures.index')" class="py-2">
                {{ __('translation.navigation_gallery') }}
            </x-nav-link>

            <!-- Categories Dropdown -->
            @can('admin-access')
            <div x-data="{ open: false }" class="flex relative mb-2">
                @if (request()->routeIs('categories.index') || request()->routeIs('sound-categories.index') || request()->routeIs('genre.index'))  
                <x-nav-link href="#" @click.prevent="open = !open" class="pb-1 inline-flex items-center !border-b-2 !border-blue-400 text-sm font-medium leading-5 text-gray-900 dark:text-white focus:outline-hidden focus:border-indigo-700 focus:text-indigo-700 transition duration-150 ease-in-out no-underline">
                    {{ __('translation.navigation_categoriesName') }}
                    <svg class="ml-1 h-5 w-5 dark:fill-white fill-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </x-nav-link>
                @else
                <x-nav-link href="#" @click.prevent="open = !open" class="flex items-center">
                    {{ __('translation.navigation_categoriesName') }}
                    <svg class="ml-1 h-5 w-5 dark:fill-white fill-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </x-nav-link>
                @endif
            
                <div x-show="open" @click.away="open = false" class="absolute mt-12 w-60 px-2 pr-2 bg-gray-100 dark:bg-gray-800 border rounded-xl z-50 shadow-lg">
                    <div class="py-1 flex flex-col">
                        <x-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')" class="py-2">
                            <svg class="mr-1 h-7 w-7" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <path id="image-a" d="M4,4 C2.8954305,4 2,3.1045695 2,2 C2,0.8954305 2.8954305,0 4,0 C5.1045695,0 6,0.8954305 6,2 C6,3.1045695 5.1045695,4 4,4 Z M0.497558594,15 L4.07592773,10.7578125 L6.02026367,12.2731934 L13.4494629,2.51928711 L16,5.45703125 L16,15 L0.497558594,15 Z"></path> <path id="image-c" d="M18,6.97348874 L18,2 L2,2 L2,15.5476712 L6.04883416,10.4166727 C6.41808601,9.94872797 7.11213264,9.90569713 7.53635945,10.3244463 L9.54496213,12.3071135 L14.8746293,5.31817463 C15.2514017,4.82410259 15.9827874,4.78961411 16.4043805,5.24603924 L18,6.97348874 Z M18,9.92107486 L15.7430352,7.47763974 L10.4462935,14.4234025 C10.0808144,14.9026653 9.37757149,14.9521101 8.9486259,14.5287032 L6.92665827,12.5328435 L2.61256422,18 L18,18 L18,9.92107486 Z M2,0 L18,0 C19.1045695,0 20,0.8954305 20,2 L20,18 C20,19.1045695 19.1045695,20 18,20 L2,20 C0.8954305,20 0,19.1045695 0,18 L0,2 C0,0.8954305 0.8954305,0 2,0 Z M7,9 C5.34314575,9 4,7.65685425 4,6 C4,4.34314575 5.34314575,3 7,3 C8.65685425,3 10,4.34314575 10,6 C10,7.65685425 8.65685425,9 7,9 Z M7,7 C7.55228475,7 8,6.55228475 8,6 C8,5.44771525 7.55228475,5 7,5 C6.44771525,5 6,5.44771525 6,6 C6,6.55228475 6.44771525,7 7,7 Z"></path> </defs> <g fill="none" fill-rule="evenodd" transform="translate(2 2)"> <g transform="translate(3 4)"> <mask id="image-b" fill="#ffffff"> <use xlink:href="#image-a"></use> </mask> <use fill="#D8D8D8" xlink:href="#image-a"></use> <g fill="#FFA0A0" mask="url(#image-b)"> <rect width="24" height="24" transform="translate(-5 -6)"></rect> </g> </g> <mask id="image-d" fill="#ffffff"> <use xlink:href="#image-c"></use> </mask> <use fill="#000000" fill-rule="nonzero" xlink:href="#image-c"></use> <g fill="#7600FF" mask="url(#image-d)"> <rect width="24" height="24" transform="translate(-2 -2)"></rect> </g> </g> </g></svg>                       
                            {{ __('translation.navigation_categories') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('sound-categories.index') }}" :active="request()->routeIs('sound-categories.index')" class="py-2">
                            <svg class="mr-1 h-8 w-8" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M597.333333 151.466667v42.666666c155.733333 21.333333 277.333333 155.733333 277.333334 317.866667s-121.6 296.533333-277.333334 317.866667v42.666666c179.2-21.333333 320-174.933333 320-360.533333S776.533333 172.8 597.333333 151.466667z" fill="#81D4FA"></path><path d="M298.666667 682.666667H149.333333c-23.466667 0-42.666667-19.2-42.666666-42.666667V384c0-23.466667 19.2-42.666667 42.666666-42.666667h149.333334v341.333334z" fill="#546E7A"></path><path d="M554.666667 896L298.666667 682.666667V341.333333L554.666667 128z" fill="#78909C"></path><path d="M597.333333 369.066667v44.8c38.4 17.066667 64 53.333333 64 98.133333s-25.6 81.066667-64 98.133333v44.8c61.866667-19.2 106.666667-74.666667 106.666667-142.933333s-44.8-123.733333-106.666667-142.933333z" fill="#03A9F4"></path><path d="M597.333333 260.266667v42.666666c98.133333 19.2 170.666667 106.666667 170.666667 209.066667s-72.533333 189.866667-170.666667 209.066667v42.666666c121.6-21.333333 213.333333-125.866667 213.333334-251.733333s-91.733333-232.533333-213.333334-251.733333z" fill="#4FC3F7"></path></g></svg>                                 
                            {{ __('translation.navigation_SCategories') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('genre.index') }}" :active="request()->routeIs('genre.index')" class="py-2">
                            <svg class="mr-1 h-8 w-8" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" fill="#000000" stroke="#000000" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g transform="translate(0 -1028.4)"> <path d="m12 1029.4c-6.0751 0-11 4.9-11 11 0 6 4.9249 11 11 11 6.075 0 11-5 11-11 0-6.1-4.925-11-11-11zm0 4c3.866 0 7 3.1 7 7 0 3.8-3.134 7-7 7s-7-3.2-7-7c0-3.9 3.134-7 7-7z" fill="#2c3e50"></path> <path d="m17 1031.7c-4.783-2.8-10.899-1.1-13.66 3.7-2.7617 4.7-1.1229 10.9 3.66 13.6 4.783 2.8 10.899 1.1 13.66-3.6 2.762-4.8 1.123-10.9-3.66-13.7zm-4 6.9c0.957 0.6 1.284 1.8 0.732 2.8-0.552 0.9-1.775 1.2-2.732 0.7-0.957-0.6-1.2843-1.8-0.732-2.7 0.552-1 1.775-1.3 2.732-0.8z" fill="#2c3e50"></path> <path d="m6.0098 1032.3c-2.2488 1.7-3.6216 4.2-3.9375 6.8l7.9647 1c0.065-0.6 0.33-1 0.782-1.4l-4.8092-6.4zm15.913 9.2-7.938-1c-0.065 0.6-0.357 1-0.808 1.4l4.809 6.4c2.248-1.7 3.621-4.2 3.937-6.8z" fill="#34495e"></path> <path d="m12 1036.4c-2.2091 0-4 1.8-4 4s1.7909 4 4 4c2.209 0 4-1.8 4-4s-1.791-4-4-4zm0 3c0.552 0 1 0.4 1 1 0 0.5-0.448 1-1 1s-1-0.5-1-1c0-0.6 0.448-1 1-1z" fill="#f1c40f"></path> </g> </g></svg>
                            {{ __('translation.navigation_genre') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>
            @endcan

            <!-- Other Admin Links -->
            @can('admin-access')
                <x-nav-link href="{{ route('verification.index') }}" :active="request()->routeIs('verification.index') || request()->routeIs('unverification.index')"  class="py-2">
                    {{ __('translation.navigation_verify') }}
                </x-nav-link>
                <x-nav-link href="{{ route('block.index') }}" :active="request()->routeIs('block.index')" class="py-2">
                    {{ __('translation.navigation_block') }}
                </x-nav-link>
            @endcan
        </div>

        <!-- Profile Section -->
        <div class="hidden sm:flex sm:items-center sm:ms-1 justify-between">
            <div class="ms-3 relative">
                @if (!request()->routeIs('profile.show')) <!-- Hide buttons if route is profile -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}
                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>
                        <x-slot name="content">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('translation.navigation_manage') }}
                            </div>
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('translation.navigation_profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('translation.navigation_logOut') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endif
            </div>
        </div>


        <!-- Hamburger -->
        <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-200 dark:hover:bg-blue-200 focus:outline-hidden focus:bg-gray-200 focus:text-gray-500 transition duration-150 ease-in-out" aria-label="Toggle navigation menu">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>


         <!-- Responsive Navigation Menu -->
         <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                    {{ __('translation.navigation_welcome') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('upload') }}" :active="request()->routeIs('upload')">
                    {{ __('translation.navigation_upload') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('pictures.index') }}" :active="request()->routeIs('pictures.index')">
                    {{ __('translation.navigation_gallery') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                @can('admin-access')
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                        {{ __('translation.navigation_categories') }}
                    </x-responsive-nav-link>
                </div>
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('sound-categories.index') }}" :active="request()->routeIs('sound-categories.index')">
                        {{ __('translation.navigation_SCategories') }}
                    </x-responsive-nav-link>  
                </div>
                    <x-responsive-nav-link href="{{ route('genre.index') }}" :active="request()->routeIs('genre.index')">
                        {{ __('translation.navigation_genre') }}
                    </x-responsive-nav-link>    
            </div>
            <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('verification.index') }}" :active="request()->routeIs('verification.index')">
                        {{ __('translation.navigation_verify') }}
                    </x-responsive-nav-link>
                @endcan
            </div>
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 me-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif
                    <div>
                        <div class="font-medium text-base text-gray-500">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('translation.navigation_profile') }}
                    </x-responsive-nav-link>
                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-responsive-nav-link>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('translation.navigation_logOut') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>
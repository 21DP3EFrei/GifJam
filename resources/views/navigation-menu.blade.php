<nav x-data="{ open: false }" class="dark:border border-gray-300 dark:border-gray-600 outline-black dark:bg-gray-800" aria-label="Main Navigation">
    <div class="max-w-7xl mx-auto px-1 md:px-3 lg:px-8 flex justify-between items-center py-4 relative">
        <!-- Logo -->
        <div class="flex items-center w-1/3">
            <a href="{{ route('welcome') }}">
                <img class="h-10 w-14" src="{{ asset('images/gifjam.png') }}" alt="{{ __('translation.logo') }}">
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden md:flex justify-center space-x-1 w-1/3">
            <x-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')" class="py-2">
                <svg class="ml-1 h-5 w-5 mr-2" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000" transform="matrix(1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0L0 6V8H1V15H4V10H7V15H15V8H16V6L14 4.5V1H11V2.25L8 0ZM9 10H12V13H9V10Z" fill="#6e6e6e"></path> </g></svg>
            </x-nav-link>
            <!-- Gallery links -->
            <div x-data="{ open: false }" class="flex relative mb-2">
                @if (request()->routeIs('pictures.index') || request()->routeIs('sounds.index') || request()->routeIs('music.index'))  
                <x-nav-link href="#" @click.prevent="open = !open" class="pb-1 inline-flex items-center !border-b-2 !border-blue-400 text-sm font-medium leading-5 text-gray-900 dark:text-white focus:outline-hidden focus:border-indigo-700 focus:text-indigo-700 transition duration-150 ease-in-out no-underline mt-1">
                    <svg class="h-5 w-5 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13 3L13.7071 2.29289C13.5196 2.10536 13.2652 2 13 2V3ZM19 9H20C20 8.73478 19.8946 8.48043 19.7071 8.29289L19 9ZM13.109 8.45399L14 8V8L13.109 8.45399ZM13.546 8.89101L14 8L13.546 8.89101ZM10 13C10 12.4477 9.55228 12 9 12C8.44772 12 8 12.4477 8 13H10ZM8 16C8 16.5523 8.44772 17 9 17C9.55228 17 10 16.5523 10 16H8ZM8.5 9C7.94772 9 7.5 9.44772 7.5 10C7.5 10.5523 7.94772 11 8.5 11V9ZM9.5 11C10.0523 11 10.5 10.5523 10.5 10C10.5 9.44772 10.0523 9 9.5 9V11ZM8.5 6C7.94772 6 7.5 6.44772 7.5 7C7.5 7.55228 7.94772 8 8.5 8V6ZM9.5 8C10.0523 8 10.5 7.55228 10.5 7C10.5 6.44772 10.0523 6 9.5 6V8ZM17.908 20.782L17.454 19.891L17.454 19.891L17.908 20.782ZM18.782 19.908L19.673 20.362L18.782 19.908ZM5.21799 19.908L4.32698 20.362H4.32698L5.21799 19.908ZM6.09202 20.782L6.54601 19.891L6.54601 19.891L6.09202 20.782ZM6.09202 3.21799L5.63803 2.32698L5.63803 2.32698L6.09202 3.21799ZM5.21799 4.09202L4.32698 3.63803L4.32698 3.63803L5.21799 4.09202ZM12 3V7.4H14V3H12ZM14.6 10H19V8H14.6V10ZM12 7.4C12 7.66353 11.9992 7.92131 12.0169 8.13823C12.0356 8.36682 12.0797 8.63656 12.218 8.90798L14 8C14.0293 8.05751 14.0189 8.08028 14.0103 7.97537C14.0008 7.85878 14 7.69653 14 7.4H12ZM14.6 8C14.3035 8 14.1412 7.99922 14.0246 7.9897C13.9197 7.98113 13.9425 7.9707 14 8L13.092 9.78201C13.3634 9.92031 13.6332 9.96438 13.8618 9.98305C14.0787 10.0008 14.3365 10 14.6 10V8ZM12.218 8.90798C12.4097 9.2843 12.7157 9.59027 13.092 9.78201L14 8V8L12.218 8.90798ZM8 13V16H10V13H8ZM8.5 11H9.5V9H8.5V11ZM8.5 8H9.5V6H8.5V8ZM13 2H8.2V4H13V2ZM4 6.2V17.8H6V6.2H4ZM8.2 22H15.8V20H8.2V22ZM20 17.8V9H18V17.8H20ZM19.7071 8.29289L13.7071 2.29289L12.2929 3.70711L18.2929 9.70711L19.7071 8.29289ZM15.8 22C16.3436 22 16.8114 22.0008 17.195 21.9694C17.5904 21.9371 17.9836 21.8658 18.362 21.673L17.454 19.891C17.4045 19.9162 17.3038 19.9539 17.0322 19.9761C16.7488 19.9992 16.3766 20 15.8 20V22ZM18 17.8C18 18.3766 17.9992 18.7488 17.9761 19.0322C17.9539 19.3038 17.9162 19.4045 17.891 19.454L19.673 20.362C19.8658 19.9836 19.9371 19.5904 19.9694 19.195C20.0008 18.8114 20 18.3436 20 17.8H18ZM18.362 21.673C18.9265 21.3854 19.3854 20.9265 19.673 20.362L17.891 19.454C17.7951 19.6422 17.6422 19.7951 17.454 19.891L18.362 21.673ZM4 17.8C4 18.3436 3.99922 18.8114 4.03057 19.195C4.06287 19.5904 4.13419 19.9836 4.32698 20.362L6.10899 19.454C6.0838 19.4045 6.04612 19.3038 6.02393 19.0322C6.00078 18.7488 6 18.3766 6 17.8H4ZM8.2 20C7.62345 20 7.25117 19.9992 6.96784 19.9761C6.69617 19.9539 6.59545 19.9162 6.54601 19.891L5.63803 21.673C6.01641 21.8658 6.40963 21.9371 6.80497 21.9694C7.18864 22.0008 7.65645 22 8.2 22V20ZM4.32698 20.362C4.6146 20.9265 5.07354 21.3854 5.63803 21.673L6.54601 19.891C6.35785 19.7951 6.20487 19.6422 6.10899 19.454L4.32698 20.362ZM8.2 2C7.65645 2 7.18864 1.99922 6.80497 2.03057C6.40963 2.06287 6.01641 2.13419 5.63803 2.32698L6.54601 4.10899C6.59545 4.0838 6.69617 4.04612 6.96784 4.02393C7.25117 4.00078 7.62345 4 8.2 4V2ZM6 6.2C6 5.62345 6.00078 5.25117 6.02393 4.96784C6.04612 4.69617 6.0838 4.59545 6.10899 4.54601L4.32698 3.63803C4.13419 4.01641 4.06287 4.40963 4.03057 4.80497C3.99922 5.18864 4 5.65645 4 6.2H6ZM5.63803 2.32698C5.07354 2.6146 4.6146 3.07354 4.32698 3.63803L6.10899 4.54601C6.20487 4.35785 6.35785 4.20487 6.54601 4.10899L5.63803 2.32698Z" fill="#8c8c8c"></path> </g></svg>
                    {{ __('translation.media') }}
                    <svg class="ml-1 h-5 w-5 dark:fill-white fill-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                </x-nav-link>
                @else
                <x-nav-link href="#" @click.prevent="open = !open" class="flex items-center">
                    <svg class="h-5 w-5 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13 3L13.7071 2.29289C13.5196 2.10536 13.2652 2 13 2V3ZM19 9H20C20 8.73478 19.8946 8.48043 19.7071 8.29289L19 9ZM13.109 8.45399L14 8V8L13.109 8.45399ZM13.546 8.89101L14 8L13.546 8.89101ZM10 13C10 12.4477 9.55228 12 9 12C8.44772 12 8 12.4477 8 13H10ZM8 16C8 16.5523 8.44772 17 9 17C9.55228 17 10 16.5523 10 16H8ZM8.5 9C7.94772 9 7.5 9.44772 7.5 10C7.5 10.5523 7.94772 11 8.5 11V9ZM9.5 11C10.0523 11 10.5 10.5523 10.5 10C10.5 9.44772 10.0523 9 9.5 9V11ZM8.5 6C7.94772 6 7.5 6.44772 7.5 7C7.5 7.55228 7.94772 8 8.5 8V6ZM9.5 8C10.0523 8 10.5 7.55228 10.5 7C10.5 6.44772 10.0523 6 9.5 6V8ZM17.908 20.782L17.454 19.891L17.454 19.891L17.908 20.782ZM18.782 19.908L19.673 20.362L18.782 19.908ZM5.21799 19.908L4.32698 20.362H4.32698L5.21799 19.908ZM6.09202 20.782L6.54601 19.891L6.54601 19.891L6.09202 20.782ZM6.09202 3.21799L5.63803 2.32698L5.63803 2.32698L6.09202 3.21799ZM5.21799 4.09202L4.32698 3.63803L4.32698 3.63803L5.21799 4.09202ZM12 3V7.4H14V3H12ZM14.6 10H19V8H14.6V10ZM12 7.4C12 7.66353 11.9992 7.92131 12.0169 8.13823C12.0356 8.36682 12.0797 8.63656 12.218 8.90798L14 8C14.0293 8.05751 14.0189 8.08028 14.0103 7.97537C14.0008 7.85878 14 7.69653 14 7.4H12ZM14.6 8C14.3035 8 14.1412 7.99922 14.0246 7.9897C13.9197 7.98113 13.9425 7.9707 14 8L13.092 9.78201C13.3634 9.92031 13.6332 9.96438 13.8618 9.98305C14.0787 10.0008 14.3365 10 14.6 10V8ZM12.218 8.90798C12.4097 9.2843 12.7157 9.59027 13.092 9.78201L14 8V8L12.218 8.90798ZM8 13V16H10V13H8ZM8.5 11H9.5V9H8.5V11ZM8.5 8H9.5V6H8.5V8ZM13 2H8.2V4H13V2ZM4 6.2V17.8H6V6.2H4ZM8.2 22H15.8V20H8.2V22ZM20 17.8V9H18V17.8H20ZM19.7071 8.29289L13.7071 2.29289L12.2929 3.70711L18.2929 9.70711L19.7071 8.29289ZM15.8 22C16.3436 22 16.8114 22.0008 17.195 21.9694C17.5904 21.9371 17.9836 21.8658 18.362 21.673L17.454 19.891C17.4045 19.9162 17.3038 19.9539 17.0322 19.9761C16.7488 19.9992 16.3766 20 15.8 20V22ZM18 17.8C18 18.3766 17.9992 18.7488 17.9761 19.0322C17.9539 19.3038 17.9162 19.4045 17.891 19.454L19.673 20.362C19.8658 19.9836 19.9371 19.5904 19.9694 19.195C20.0008 18.8114 20 18.3436 20 17.8H18ZM18.362 21.673C18.9265 21.3854 19.3854 20.9265 19.673 20.362L17.891 19.454C17.7951 19.6422 17.6422 19.7951 17.454 19.891L18.362 21.673ZM4 17.8C4 18.3436 3.99922 18.8114 4.03057 19.195C4.06287 19.5904 4.13419 19.9836 4.32698 20.362L6.10899 19.454C6.0838 19.4045 6.04612 19.3038 6.02393 19.0322C6.00078 18.7488 6 18.3766 6 17.8H4ZM8.2 20C7.62345 20 7.25117 19.9992 6.96784 19.9761C6.69617 19.9539 6.59545 19.9162 6.54601 19.891L5.63803 21.673C6.01641 21.8658 6.40963 21.9371 6.80497 21.9694C7.18864 22.0008 7.65645 22 8.2 22V20ZM4.32698 20.362C4.6146 20.9265 5.07354 21.3854 5.63803 21.673L6.54601 19.891C6.35785 19.7951 6.20487 19.6422 6.10899 19.454L4.32698 20.362ZM8.2 2C7.65645 2 7.18864 1.99922 6.80497 2.03057C6.40963 2.06287 6.01641 2.13419 5.63803 2.32698L6.54601 4.10899C6.59545 4.0838 6.69617 4.04612 6.96784 4.02393C7.25117 4.00078 7.62345 4 8.2 4V2ZM6 6.2C6 5.62345 6.00078 5.25117 6.02393 4.96784C6.04612 4.69617 6.0838 4.59545 6.10899 4.54601L4.32698 3.63803C4.13419 4.01641 4.06287 4.40963 4.03057 4.80497C3.99922 5.18864 4 5.65645 4 6.2H6ZM5.63803 2.32698C5.07354 2.6146 4.6146 3.07354 4.32698 3.63803L6.10899 4.54601C6.20487 4.35785 6.35785 4.20487 6.54601 4.10899L5.63803 2.32698Z" fill="#8c8c8c"></path> </g></svg>
                    {{ __('translation.media') }}
                    <svg class="ml-1 h-5 w-5 dark:fill-white fill-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                </x-nav-link>
                @endif
            
                <div x-show="open" @click.away="open = false" class="absolute mt-12 w-60 px-2 pr-2 bg-gray-100 dark:bg-gray-800 border rounded-xl z-50 shadow-lg">
                    <div class="py-1 flex flex-col">
                        <x-nav-link href="{{ route('pictures.index') }}" :active="request()->routeIs('pictures.index')" class="py-2">
                            <svg class="mr-1 h-7 w-7" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <path id="image-a" d="M4,4 C2.8954305,4 2,3.1045695 2,2 C2,0.8954305 2.8954305,0 4,0 C5.1045695,0 6,0.8954305 6,2 C6,3.1045695 5.1045695,4 4,4 Z M0.497558594,15 L4.07592773,10.7578125 L6.02026367,12.2731934 L13.4494629,2.51928711 L16,5.45703125 L16,15 L0.497558594,15 Z"></path> <path id="image-c" d="M18,6.97348874 L18,2 L2,2 L2,15.5476712 L6.04883416,10.4166727 C6.41808601,9.94872797 7.11213264,9.90569713 7.53635945,10.3244463 L9.54496213,12.3071135 L14.8746293,5.31817463 C15.2514017,4.82410259 15.9827874,4.78961411 16.4043805,5.24603924 L18,6.97348874 Z M18,9.92107486 L15.7430352,7.47763974 L10.4462935,14.4234025 C10.0808144,14.9026653 9.37757149,14.9521101 8.9486259,14.5287032 L6.92665827,12.5328435 L2.61256422,18 L18,18 L18,9.92107486 Z M2,0 L18,0 C19.1045695,0 20,0.8954305 20,2 L20,18 C20,19.1045695 19.1045695,20 18,20 L2,20 C0.8954305,20 0,19.1045695 0,18 L0,2 C0,0.8954305 0.8954305,0 2,0 Z M7,9 C5.34314575,9 4,7.65685425 4,6 C4,4.34314575 5.34314575,3 7,3 C8.65685425,3 10,4.34314575 10,6 C10,7.65685425 8.65685425,9 7,9 Z M7,7 C7.55228475,7 8,6.55228475 8,6 C8,5.44771525 7.55228475,5 7,5 C6.44771525,5 6,5.44771525 6,6 C6,6.55228475 6.44771525,7 7,7 Z"></path> </defs> <g fill="none" fill-rule="evenodd" transform="translate(2 2)"> <g transform="translate(3 4)"> <mask id="image-b" fill="#ffffff"> <use xlink:href="#image-a"></use> </mask> <use fill="#D8D8D8" xlink:href="#image-a"></use> <g fill="#FFA0A0" mask="url(#image-b)"> <rect width="24" height="24" transform="translate(-5 -6)"></rect> </g> </g> <mask id="image-d" fill="#ffffff"> <use xlink:href="#image-c"></use> </mask> <use fill="#000000" fill-rule="nonzero" xlink:href="#image-c"></use> <g fill="#7600FF" mask="url(#image-d)"> <rect width="24" height="24" transform="translate(-2 -2)"></rect> </g> </g> </g></svg>                       
                            {{ __('translation.navigation_gallery') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('sounds.index') }}" :active="request()->routeIs('sounds.index')" class="py-2">
                            <svg class="mr-1 h-8 w-8" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M597.333333 151.466667v42.666666c155.733333 21.333333 277.333333 155.733333 277.333334 317.866667s-121.6 296.533333-277.333334 317.866667v42.666666c179.2-21.333333 320-174.933333 320-360.533333S776.533333 172.8 597.333333 151.466667z" fill="#81D4FA"></path><path d="M298.666667 682.666667H149.333333c-23.466667 0-42.666667-19.2-42.666666-42.666667V384c0-23.466667 19.2-42.666667 42.666666-42.666667h149.333334v341.333334z" fill="#546E7A"></path><path d="M554.666667 896L298.666667 682.666667V341.333333L554.666667 128z" fill="#78909C"></path><path d="M597.333333 369.066667v44.8c38.4 17.066667 64 53.333333 64 98.133333s-25.6 81.066667-64 98.133333v44.8c61.866667-19.2 106.666667-74.666667 106.666667-142.933333s-44.8-123.733333-106.666667-142.933333z" fill="#03A9F4"></path><path d="M597.333333 260.266667v42.666666c98.133333 19.2 170.666667 106.666667 170.666667 209.066667s-72.533333 189.866667-170.666667 209.066667v42.666666c121.6-21.333333 213.333333-125.866667 213.333334-251.733333s-91.733333-232.533333-213.333334-251.733333z" fill="#4FC3F7"></path></g></svg>                                 
                            {{ __('translation.sLibrary') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('music.index') }}" :active="request()->routeIs('music.index')" class="py-2">
                            <svg class="mr-1 h-8 w-8" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" fill="#000000" stroke="#000000" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g transform="translate(0 -1028.4)"> <path d="m12 1029.4c-6.0751 0-11 4.9-11 11 0 6 4.9249 11 11 11 6.075 0 11-5 11-11 0-6.1-4.925-11-11-11zm0 4c3.866 0 7 3.1 7 7 0 3.8-3.134 7-7 7s-7-3.2-7-7c0-3.9 3.134-7 7-7z" fill="#2c3e50"></path> <path d="m17 1031.7c-4.783-2.8-10.899-1.1-13.66 3.7-2.7617 4.7-1.1229 10.9 3.66 13.6 4.783 2.8 10.899 1.1 13.66-3.6 2.762-4.8 1.123-10.9-3.66-13.7zm-4 6.9c0.957 0.6 1.284 1.8 0.732 2.8-0.552 0.9-1.775 1.2-2.732 0.7-0.957-0.6-1.2843-1.8-0.732-2.7 0.552-1 1.775-1.3 2.732-0.8z" fill="#2c3e50"></path> <path d="m6.0098 1032.3c-2.2488 1.7-3.6216 4.2-3.9375 6.8l7.9647 1c0.065-0.6 0.33-1 0.782-1.4l-4.8092-6.4zm15.913 9.2-7.938-1c-0.065 0.6-0.357 1-0.808 1.4l4.809 6.4c2.248-1.7 3.621-4.2 3.937-6.8z" fill="#34495e"></path> <path d="m12 1036.4c-2.2091 0-4 1.8-4 4s1.7909 4 4 4c2.209 0 4-1.8 4-4s-1.791-4-4-4zm0 3c0.552 0 1 0.4 1 1 0 0.5-0.448 1-1 1s-1-0.5-1-1c0-0.6 0.448-1 1-1z" fill="#f1c40f"></path> </g> </g></svg>
                            {{ __('translation.mLibrary') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>
            @can('admin-access')
            <div x-data="{ open: false }" class="flex relative mb-2">
                @if (request()->routeIs('categories.index') || request()->routeIs('sound-categories.index') || request()->routeIs('genre.index'))  
                <x-nav-link href="#" @click.prevent="open = !open" class="pb-1 inline-flex items-center !border-b-2 !border-blue-400 text-sm font-medium leading-5 text-gray-900 dark:text-white focus:outline-hidden focus:border-indigo-700 focus:text-indigo-700 transition duration-150 ease-in-out no-underline mt-1">
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
                            <img class="h-7 w-7 mr-1" src="{{ asset('images/image.svg') }}" alt="{{ __('translation.image') }}">
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

            <div x-data="{ open: false }" class="flex relative mb-2">
                @if (request()->routeIs('verification.index') || request()->routeIs('unverification.index') || request()->routeIs('block.index'))  
                <x-nav-link href="#" @click.prevent="open = !open" class="pb-1 inline-flex items-center !border-b-2 !border-blue-400 text-sm font-medium leading-5 text-gray-900 dark:text-white focus:outline-hidden focus:border-indigo-700 focus:text-indigo-700 transition duration-150 ease-in-out no-underline mt-1">
                    {{ __('translation.navigation_admin') }}
                    <svg class="ml-1 h-5 w-5 dark:fill-white fill-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </x-nav-link>
                @else
                <x-nav-link href="#" @click.prevent="open = !open" class="flex items-center">
                    {{ __('translation.navigation_admin') }}
                    <svg class="ml-1 h-5 w-5 dark:fill-white fill-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </x-nav-link>
                @endif
            
                <div x-show="open" @click.away="open = false" class="absolute mt-12 w-40 px-2 pr-2 bg-gray-100 dark:bg-gray-800 border rounded-xl z-50 shadow-lg">
                    <div class="py-1 flex flex-col">
                        <x-nav-link href="{{ route('verification.index') }}" :active="request()->routeIs('verification.index')" class="py-2">
                            <svg class="ml-1 h-6 w-6 dark:fill-white fill-gray-500 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#dd2c2c"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 1V5" stroke="#DF1463" stroke-width="1.7" stroke-linecap="round"></path> <path d="M19.4246 18.9246L16.5961 16.0962" stroke="#800002" stroke-width="1.7" stroke-linecap="round"></path> <path d="M22.5 11.5L18.5 11.5" stroke="#800002" stroke-width="1.7" stroke-linecap="round"></path> <path d="M12 18V22" stroke="#800002" stroke-width="1.7" stroke-linecap="round"></path> <path d="M7.40381 6.90381L4.57538 4.07538" stroke="#800002" stroke-width="1.7" stroke-linecap="round"></path> <path d="M5.5 11.5L1.5 11.5" stroke="#800002" stroke-width="1.7" stroke-linecap="round"></path> <path d="M7.40381 16.0962L4.57538 18.9246" stroke="#800002" stroke-width="1.7" stroke-linecap="round"></path> </g></svg>
                            {{ __('translation.navigation_verify') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('unverification.index') }}" :active="request()->routeIs('unverification.index')" class="py-2">
                            <svg class="ml-1 h-6 w-6 dark:fill-white fill-gray-500 mr-1" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M866.133333 258.133333L362.666667 761.6l-204.8-204.8L98.133333 618.666667 362.666667 881.066667l563.2-563.2z" fill="#43A047"></path></g></svg>
                            {{ __('translation.navigation_unverify') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('block.index') }}" :active="request()->routeIs('block.index')" class="py-2">
                            <svg class="ml-1 h-6 w-6 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.8086 19.7053L19.127 16.3467M4 21C4 17.134 7.13401 14 11 14M20 18C20 19.6569 18.6569 21 17 21C15.3431 21 14 19.6569 14 18C14 16.3431 15.3431 15 17 15C18.6569 15 20 16.3431 20 18ZM15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z" stroke="#f50000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> 
                             {{ __('translation.navigation_block') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>
            @endcan
            <div class="hidden md:flex items-center md:mr-7">
                <div>
                    <a href="{{ route('random') }}"  class="inline-flex bg-white items-center px-1.5 mr-2 py-0.5 border border-transparent text-sm font-medium rounded-md hover:text-gray-700 text-black focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                            ?
                    </a>
                </div>
            </div>
        </div>

        <!-- Profile Section -->
        <div class="hidden md:flex justify-end items-center w-1/3">
            <div class="hidden sm:flex sm:ms-1">
                <div class="ms-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-2 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-gray-300 dark:bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 15L12 2M12 2L15 5.5M12 2L9 5.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8 22.0002H16C18.8284 22.0002 20.2426 22.0002 21.1213 21.1215C22 20.2429 22 18.8286 22 16.0002V15.0002C22 12.1718 22 10.7576 21.1213 9.8789C20.3529 9.11051 19.175 9.01406 17 9.00195M7 9.00195C4.82497 9.01406 3.64706 9.11051 2.87868 9.87889C2 10.7576 2 12.1718 2 15.0002L2 16.0002C2 18.8286 2 20.2429 2.87868 21.1215C3.17848 21.4213 3.54062 21.6188 4 21.749" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                        </button>
                                    </span>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="{{ route('upload') }}">
                                    <img class="h-7 w-7 mr-1" src="{{ asset('images/picture.svg') }}" alt="{{ __('translation.Pupload') }}">
                                    {{ __('Image upload') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('uploadSound') }}">
                                    <img class="h-7 w-7 mr-1" src="{{ asset('images/sound.svg') }}" alt="{{ __('translation.Supload') }}">
                                    {{ __('Sound upload') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('uploadMusic') }}">
                                    <img class="h-7 w-7 mr-1" src="{{ asset('images/music.svg') }}" alt="{{ __('translation.Mupload') }}">
                                    {{ __('Music upload') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                </div>
            </div>
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
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:bg-white bg-gray-300 hover:text-gray-700 focus:outline-none active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Str::limit(Auth::user()->name, 7) }}
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
        <div class="-me-2 flex items-center md:hidden mr-3">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-200 dark:hover:bg-blue-200 focus:outline-hidden focus:bg-gray-200 focus:text-gray-500 transition duration-150 ease-in-out" aria-label="Toggle navigation menu">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>


         <!-- Responsive Navigation Menu -->
         <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                    <svg class="ml-1 h-5 w-5 mr-1" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000" transform="matrix(1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0L0 6V8H1V15H4V10H7V15H15V8H16V6L14 4.5V1H11V2.25L8 0ZM9 10H12V13H9V10Z" fill="#6e6e6e"></path> </g></svg>
                    {{ __('translation.navigation_welcome') }}
                </x-responsive-nav-link>
            </div>
            <div class="py-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('upload') }}" :active="request()->routeIs('upload')" >
                    <img class="h-7 w-7" src="{{ asset('images/image.svg') }}" alt="{{ __('translation.Pupload') }}">
                    {{ __('Image upload') }}
                </x-responsive-nav-link>
            </div>
            <div class="py-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('uploadSound') }}" :active="request()->routeIs('uploadSound')">
                    <img class="h-7 w-7 mr-1" src="{{ asset('images/sound.svg') }}" alt="{{ __('translation.Supload') }}">
                    {{ __('Sound upload') }}
                </x-responsive-nav-link>
            </div>
            <div class="py-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('uploadMusic') }}" :active="request()->routeIs('uploadMusic')">
                    <img class="h-7 w-7 mr-1" src="{{ asset('images/music.svg') }}" alt="{{ __('translation.Mupload') }}">
                    {{ __('Music upload') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('pictures.index') }}" :active="request()->routeIs('pictures.index')">
                    <img class="h-7 w-7 mr-1" src="{{ asset('images/image.svg') }}" alt="{{ __('translation.image') }}">
                    {{ __('translation.navigation_gallery') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('sounds.index') }}" :active="request()->routeIs('sounds.index')">
                    <svg class="mr-1 h-8 w-8" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M597.333333 151.466667v42.666666c155.733333 21.333333 277.333333 155.733333 277.333334 317.866667s-121.6 296.533333-277.333334 317.866667v42.666666c179.2-21.333333 320-174.933333 320-360.533333S776.533333 172.8 597.333333 151.466667z" fill="#81D4FA"></path><path d="M298.666667 682.666667H149.333333c-23.466667 0-42.666667-19.2-42.666666-42.666667V384c0-23.466667 19.2-42.666667 42.666666-42.666667h149.333334v341.333334z" fill="#546E7A"></path><path d="M554.666667 896L298.666667 682.666667V341.333333L554.666667 128z" fill="#78909C"></path><path d="M597.333333 369.066667v44.8c38.4 17.066667 64 53.333333 64 98.133333s-25.6 81.066667-64 98.133333v44.8c61.866667-19.2 106.666667-74.666667 106.666667-142.933333s-44.8-123.733333-106.666667-142.933333z" fill="#03A9F4"></path><path d="M597.333333 260.266667v42.666666c98.133333 19.2 170.666667 106.666667 170.666667 209.066667s-72.533333 189.866667-170.666667 209.066667v42.666666c121.6-21.333333 213.333333-125.866667 213.333334-251.733333s-91.733333-232.533333-213.333334-251.733333z" fill="#4FC3F7"></path></g></svg>
                    {{ __('Sound Library') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('music.index') }}" :active="request()->routeIs('music.index')">
                    <svg class="mr-1 h-8 w-8" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" fill="#000000" stroke="#000000" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g transform="translate(0 -1028.4)"> <path d="m12 1029.4c-6.0751 0-11 4.9-11 11 0 6 4.9249 11 11 11 6.075 0 11-5 11-11 0-6.1-4.925-11-11-11zm0 4c3.866 0 7 3.1 7 7 0 3.8-3.134 7-7 7s-7-3.2-7-7c0-3.9 3.134-7 7-7z" fill="#2c3e50"></path> <path d="m17 1031.7c-4.783-2.8-10.899-1.1-13.66 3.7-2.7617 4.7-1.1229 10.9 3.66 13.6 4.783 2.8 10.899 1.1 13.66-3.6 2.762-4.8 1.123-10.9-3.66-13.7zm-4 6.9c0.957 0.6 1.284 1.8 0.732 2.8-0.552 0.9-1.775 1.2-2.732 0.7-0.957-0.6-1.2843-1.8-0.732-2.7 0.552-1 1.775-1.3 2.732-0.8z" fill="#2c3e50"></path> <path d="m6.0098 1032.3c-2.2488 1.7-3.6216 4.2-3.9375 6.8l7.9647 1c0.065-0.6 0.33-1 0.782-1.4l-4.8092-6.4zm15.913 9.2-7.938-1c-0.065 0.6-0.357 1-0.808 1.4l4.809 6.4c2.248-1.7 3.621-4.2 3.937-6.8z" fill="#34495e"></path> <path d="m12 1036.4c-2.2091 0-4 1.8-4 4s1.7909 4 4 4c2.209 0 4-1.8 4-4s-1.791-4-4-4zm0 3c0.552 0 1 0.4 1 1 0 0.5-0.448 1-1 1s-1-0.5-1-1c0-0.6 0.448-1 1-1z" fill="#f1c40f"></path> </g> </g></svg> 
                    {{ __('Music Library') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                @can('admin-access')
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                        <img class="h-7 w-7 mr-1" src="{{ asset('images/image.svg') }}" alt="{{ __('translation.image') }}">
                        {{ __('translation.navigation_categories') }}
                    </x-responsive-nav-link>
                </div>
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('sound-categories.index') }}" :active="request()->routeIs('sound-categories.index')">
                        <svg class="mr-1 h-8 w-8" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M597.333333 151.466667v42.666666c155.733333 21.333333 277.333333 155.733333 277.333334 317.866667s-121.6 296.533333-277.333334 317.866667v42.666666c179.2-21.333333 320-174.933333 320-360.533333S776.533333 172.8 597.333333 151.466667z" fill="#81D4FA"></path><path d="M298.666667 682.666667H149.333333c-23.466667 0-42.666667-19.2-42.666666-42.666667V384c0-23.466667 19.2-42.666667 42.666666-42.666667h149.333334v341.333334z" fill="#546E7A"></path><path d="M554.666667 896L298.666667 682.666667V341.333333L554.666667 128z" fill="#78909C"></path><path d="M597.333333 369.066667v44.8c38.4 17.066667 64 53.333333 64 98.133333s-25.6 81.066667-64 98.133333v44.8c61.866667-19.2 106.666667-74.666667 106.666667-142.933333s-44.8-123.733333-106.666667-142.933333z" fill="#03A9F4"></path><path d="M597.333333 260.266667v42.666666c98.133333 19.2 170.666667 106.666667 170.666667 209.066667s-72.533333 189.866667-170.666667 209.066667v42.666666c121.6-21.333333 213.333333-125.866667 213.333334-251.733333s-91.733333-232.533333-213.333334-251.733333z" fill="#4FC3F7"></path></g></svg>
                        {{ __('translation.navigation_SCategories') }}
                    </x-responsive-nav-link>  
                </div>
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('genre.index') }}" :active="request()->routeIs('genre.index')">
                        <svg class="mr-1 h-8 w-8" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" fill="#000000" stroke="#000000" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g transform="translate(0 -1028.4)"> <path d="m12 1029.4c-6.0751 0-11 4.9-11 11 0 6 4.9249 11 11 11 6.075 0 11-5 11-11 0-6.1-4.925-11-11-11zm0 4c3.866 0 7 3.1 7 7 0 3.8-3.134 7-7 7s-7-3.2-7-7c0-3.9 3.134-7 7-7z" fill="#2c3e50"></path> <path d="m17 1031.7c-4.783-2.8-10.899-1.1-13.66 3.7-2.7617 4.7-1.1229 10.9 3.66 13.6 4.783 2.8 10.899 1.1 13.66-3.6 2.762-4.8 1.123-10.9-3.66-13.7zm-4 6.9c0.957 0.6 1.284 1.8 0.732 2.8-0.552 0.9-1.775 1.2-2.732 0.7-0.957-0.6-1.2843-1.8-0.732-2.7 0.552-1 1.775-1.3 2.732-0.8z" fill="#2c3e50"></path> <path d="m6.0098 1032.3c-2.2488 1.7-3.6216 4.2-3.9375 6.8l7.9647 1c0.065-0.6 0.33-1 0.782-1.4l-4.8092-6.4zm15.913 9.2-7.938-1c-0.065 0.6-0.357 1-0.808 1.4l4.809 6.4c2.248-1.7 3.621-4.2 3.937-6.8z" fill="#34495e"></path> <path d="m12 1036.4c-2.2091 0-4 1.8-4 4s1.7909 4 4 4c2.209 0 4-1.8 4-4s-1.791-4-4-4zm0 3c0.552 0 1 0.4 1 1 0 0.5-0.448 1-1 1s-1-0.5-1-1c0-0.6 0.448-1 1-1z" fill="#f1c40f"></path> </g> </g></svg>
                        {{ __('translation.navigation_genre') }}
                    </x-responsive-nav-link>  
                 </div>
                 <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('verification.index') }}" :active="request()->routeIs('verification.index')">
                        <svg class="ml-1 h-6 w-6 dark:fill-white fill-gray-500 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#dd2c2c"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 1V5" stroke="#DF1463" stroke-width="1.7" stroke-linecap="round"></path> <path d="M19.4246 18.9246L16.5961 16.0962" stroke="#800002" stroke-width="1.7" stroke-linecap="round"></path> <path d="M22.5 11.5L18.5 11.5" stroke="#800002" stroke-width="1.7" stroke-linecap="round"></path> <path d="M12 18V22" stroke="#800002" stroke-width="1.7" stroke-linecap="round"></path> <path d="M7.40381 6.90381L4.57538 4.07538" stroke="#800002" stroke-width="1.7" stroke-linecap="round"></path> <path d="M5.5 11.5L1.5 11.5" stroke="#800002" stroke-width="1.7" stroke-linecap="round"></path> <path d="M7.40381 16.0962L4.57538 18.9246" stroke="#800002" stroke-width="1.7" stroke-linecap="round"></path> </g></svg>
                        {{ __('translation.navigation_verify') }}
                    </x-responsive-nav-link>
                 </div>
                 <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('unverification.index') }}" :active="request()->routeIs('unverification.index')">
                        <svg class="ml-1 h-6 w-6 dark:fill-white fill-gray-500 mr-1" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M866.133333 258.133333L362.666667 761.6l-204.8-204.8L98.133333 618.666667 362.666667 881.066667l563.2-563.2z" fill="#43A047"></path></g></svg>
                        {{ __('translation.navigation_unverify') }}
                    </x-responsive-nav-link>
                 </div>
                 <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('block.index') }}" :active="request()->routeIs('block.index')">
                        <svg class="ml-1 h-6 w-6 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.8086 19.7053L19.127 16.3467M4 21C4 17.134 7.13401 14 11 14M20 18C20 19.6569 18.6569 21 17 21C15.3431 21 14 19.6569 14 18C14 16.3431 15.3431 15 17 15C18.6569 15 20 16.3431 20 18ZM15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z" stroke="#f50000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> 
                        {{ __('translation.navigation_block') }}
                    </x-responsive-nav-link>
                 </div>
                @endcan
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('random') }}" :active="request()->routeIs('random')">
                        ?
                </x-responsive-nav-link>
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
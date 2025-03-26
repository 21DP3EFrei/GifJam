@extends('layout')

@section('title', __('translation.welcome'))

@section('content')
<div class="container ml-8">
    <!-- Settings Dropdown -->
    <div class="hidden sm:flex sm:items-center sm:ms-6">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                    @php($languages = ['en' => 'English', 'lv' => 'Latvian', 'ru' => 'Russian'])
                    <div>Language: {{ $languages[Session::get('locale', 'en')] }}</div>

                    <div class="ms-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('change.lang', ['lang' => 'en'])">
                    English
                </x-dropdown-link>
                <x-dropdown-link :href="route('change.lang', ['lang' => 'lv'])">
                    Latvian
                </x-dropdown-link>
                <x-dropdown-link :href="route('change.lang', ['lang' => 'ru'])">
                    Russian
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>
    </div>

    <h1 class="h1">{{ __('translation.welcome') }}</h1>
    @if (auth()->check())
        <p>Hello, {{ auth()->user()->name }}!</p>
        <p>You are logged in as a {{ auth()->user()->usertype }}.</p>
    @else
        <p>Please log in to access this area.</p>
    @endif
    <h1 class="h1">Time left:</h1>
<h2 class="h2" id="demo"></h2>
</div>
<script>
// Set the date we're counting down to
var countDownDate = new Date("May 25, 2025 23:59:99").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);

</script>

@endsection
@extends('layout')

@section('title', __('translation.navigation_welcome'))

@section('content')
<div class="container ml-8">
    <h1 class="h1">{{ __('translation.welcome') }}</h1>
    @if (auth()->check())
        <p>{{ __('translation.greeting') }} {{ auth()->user()->name }}! <br> {{ __('translation.logged_in') }} {{ auth()->user()->usertype }}.</p>
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
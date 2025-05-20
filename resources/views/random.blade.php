@extends('layout')

@section('title', __('translation.navigation_random'))

@section('content')
<div class="flex flex-col">
    <div class="w-full">
         <button id="randomButton" class="btn btn-primary w-full text-white border border-black">🔁</button>
    </div>
    <div id="mediaContainer">
    @include('load.media', ['media' => $media])
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const randomButton = document.getElementById('randomButton');

    if (!randomButton) {
        console.error('Random button not found!');
        return;
    }

    randomButton.addEventListener('click', function(event) {
        if (randomButton.disabled) {
            event.preventDefault(); 
            return;
        }

        // Disable the button visually and functionally
        randomButton.disabled = true;
        randomButton.style.pointerEvents = 'none'; 
        randomButton.style.opacity = '0.5'; 

        // Re-enable the button after 5 seconds
        setTimeout(() => {
            randomButton.disabled = false;
            randomButton.style.pointerEvents = 'auto';
            randomButton.style.opacity = '1';
        }, 5000);
    });
});
    $(document).ready(function() {
        $('#randomButton').click(function() {
            $.ajax({
                url: '{{ route("random") }}', // Adjust the route as necessary
                type: 'GET',
                success: function(data) {
                    $('#mediaContainer').html(data); // Update the media container with the new content
                },
                error: function(xhr) {
                    console.error(xhr);
                }
            });
        });
    });
</script>
@endsection
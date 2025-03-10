<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GifJam - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.15.1/dist/full.css" rel="stylesheet">
</head>
<body class="bg-gray-800 text-gray-100">
    <!-- Navbar -->
    <nav class="navbar bg-gray-900 shadow-lg">
        <div class="container mx-auto flex items-center justify-between px-4 py-2">
            <a href="" class="flex items-center space-x-3 text-primary">
                <img class="h-10 w-14" src="{{ asset('images/gifjam.png') }}" alt="Logo" class="h-12">
            </a>
            <div>
            @if (auth()->check()) 
                <a href="/welcome" class="btn btn-primary mr-2">Welcome</a>
            @else
                <a href="/login" class="btn btn-primary mr-2">Log in</a>
                <a href="/register" class="btn btn-outline">Register</a>
            @endif
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container mx-auto text-center mt-16">
        <h1 class="text-5xl font-bold flex items-center justify-center">
            Welcome to GifJam!
            <a href="Click.mp4" target="_blank">
                <img src="{{ asset('Coin.gif') }}" alt="Coin" class="w-12 h-12 ml-2 cursor-pointer">
            </a>
        </h1>
        <p class="text-lg mt-4">Explore and share your favorite memes, gifs, music, and sound effects.</p>

        <!-- Info Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-1 mt-12">
            <!-- Memes + Gifs Card -->
            <div class="card bg-gray-700 shadow-xl p-6 mx-4">
                <img src="{{ asset('lol.png') }}" class="w-12 h-12 mx-auto mb-4" alt="Memes Icon">
                <h2 class="text-xl font-semibold">Memes + Gifs</h2>
                <p class="mt-2">Discover and share hilarious memes and trending gifs with your friends and followers.</p>
            </div>

            <!-- Sounds Card -->
            <div class="card bg-gray-700 shadow-xl p-6 mx-4">
                <img src="{{ asset('Note.png') }}" class="w-12 h-12 mx-auto mb-4" alt="Sounds Icon">
                <h2 class="text-xl font-semibold">Sounds</h2>
                <p class="mt-2">Access a variety of sound effects to add fun and personality to your content.</p>
            </div>

            <!-- Music Card -->
            <div class="card bg-gray-700 shadow-xl p-6 mx-4">
                <img src="{{ asset('CD.png') }}" class="w-12 h-12 mx-auto mb-4" alt="Music Icon">
                <h2 class="text-xl font-semibold">Music</h2>
                <p class="mt-2">Explore our library of music tracks to enhance your videos and streams.</p>
            </div>
        </div>

        <!-- Join Now Section -->
        <div class="card bg-base-200 shadow-lg mt-12 p-8 text-center">
            <h2 class="text-2xl text-primary font-semibold">What are you waiting for?</h2>
            <p class="mt-2">Join GifJam now to create, share, and enjoy a world of content with your community!</p>
            <a href="/register" class="btn btn-lg btn-success mt-4">Join Now</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 mt-16 py-4 text-center text-gray-400">
        <div class="container mx-auto">
            © <?php echo date("Y"); ?> GifJam
        </div>
    </footer>
</body>
<style>
    .btn-outline{
        color: blue !important;
    }
    .btn-outline:hover{
        background-color: #005081 !important;
        color:azure !important; 
    }
</style>
</html>
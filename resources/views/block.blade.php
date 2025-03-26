<!DOCTYPE html>
@php
    $blockReason = \App\Models\Noblokets::where('L_ID', auth()->id())->value('Iemesls');
@endphp
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GifJam - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.15.1/dist/full.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-4xl mb-3">You have been blocked</h1>
        <p class="mb-2">Hello, {{ auth()->user()->name }}!</p>
        <p class="mb-2">You have been blocked for: {{ $blockReason ?? 'No reason provided' }}</p>
        <p class="mb-2">Please create a new account.</p>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-primary hover:underline">Return to home page</button>
        </form>
    </div>
</body>
</html>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background-color: #f3f4f6; /* Light mode background */
    }

    @media (prefers-color-scheme: dark) {
        body {
            background-color: #1e293b; /* Dark mode background */
            color: #ffffff;
        }
    }

    .container {
        text-align: center;
        max-width: 600px;
        padding: 20px;
        border-radius: 8px;
        background-color: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    @media (prefers-color-scheme: dark) {
        .container {
            background-color: #334155; /* Dark mode card background */
            color: #ffffff;
        }
    }
</style>
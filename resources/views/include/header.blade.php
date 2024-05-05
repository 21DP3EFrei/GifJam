<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="http://127.0.0.1:5500/api/resources/views/home%20page/Home.html">
            <img src="http://127.0.0.1:5500/api/resources/views/home%20page/images/lugu.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('welcome') }}">Welcome</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('upload')}}">Upload</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('welcome')}}">Lobby</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('verification.index')}}">Verify</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('pictures.index')}}">Gallery</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

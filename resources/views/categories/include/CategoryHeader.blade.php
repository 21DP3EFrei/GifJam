<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="http://127.0.0.1:5500/api/resources/views/home%20page/Home.html">
            <img src="http://127.0.0.1:5500/api/resources/views/home%20page/images/lugu.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!--@auth-->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Welcome</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                <li class="nav-item">
                     <a class="nav-link" href="{{ route('categories.create') }}">Create Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subcategories.index') }}">Subcategories</a>

                <!--@else-->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Welcome</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login</a>
                </li>
                <!--@endauth-->
            </ul>
        </div>
    </div>
</nav>

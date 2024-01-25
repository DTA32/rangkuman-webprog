<nav class="navbar bg-primary">
    <div class="container-fluid text-light justify-content-start">
        <a class="navbar-brand text-light" href="{{ route('home') }}">
            ReciBee
        </a>
        <div class="d-flex gap-4">
            <a class="nav-link" href="{{ route('home') }}">
                Home
            </a>
            <a class="nav-link" href="{{ route('category', 1) }}">
                Resep Sarapan
            </a>
            <a class="nav-link" href="{{ route('category', 2) }}">
                Resep Makan Siang
            </a>
            <a class="nav-link" href="{{ route('category', 3) }}">
                Resep Makan Malam
            </a>
            <a class="nav-link" href="{{ route('home') }}">
                About
            </a>
        </div>
    </div>
</nav>

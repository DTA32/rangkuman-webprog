<nav class="navbar bg-primary">
    <div class="container-fluid text-light justify-content-between align-items-center">
        <div class="d-flex">
            <a class="navbar-brand text-light" href="{{ route('home') }}">
                ReciBee
            </a>
            <div class="d-flex gap-4 align-items-center">
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
                <a class="nav-link" href="{{ route('about') }}">
                    {{ __('about.navbar') }}
                </a>
            </div>
        </div>
        <div class="d-flex gap-3 align-items-center">
            @if (auth()->check())
                <p class="mb-0">Halo, {{ auth()->user()->name }}</p>
                <a class="nav-link" href="{{ route('recipeManage') }}">
                    Manage Recipes
                </a>
                <a class="nav-link" href="{{ route('logout') }}">
                    Logout
                </a>
            @else
                <a class="nav-link" href="{{ route('loginPage') }}">
                    Login
                </a>
                <a class="nav-link" href="{{ route('registerPage') }}">
                    Register
                </a>
            @endif
        </div>
    </div>
</nav>

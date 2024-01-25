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
                <a class="nav-link" href="{{ route('home') }}">
                    About
                </a>
            </div>
        </div>
        <a class="nav-link" href="{{ route('recipeManage') }}">
            Manage Recipes
        </a>
    </div>
</nav>

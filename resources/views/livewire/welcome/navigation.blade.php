<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">Orbit</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ url('/dashboard') }}" wire:navigate>Portal</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ route('login') }}" wire:navigate>Connexion</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ route('register') }}" wire:navigate>Créer un
                        compte</a>
                </li>
                @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>
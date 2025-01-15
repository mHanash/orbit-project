<x-guest-layout>
    <div class="card" style="width: 38rem;">
        <div class="card-body">
            <h5 class="card-title">Bienvenu sur Orbit</h5>

            <p class="card-text">Plateforme de reservation des vols</p>

            <a href="{{ route('login') }}" class="btn btn-primary" wire:navigate>Veuillez vous connecter</a>
        </div>
    </div>
</x-guest-layout>
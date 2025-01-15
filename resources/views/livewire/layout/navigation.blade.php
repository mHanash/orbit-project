<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}" wire:navigate>
            <x-application-logo class="h-9" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Accueil') }}
                    </x-nav-link>
                </li>
            </ul>
            <div class="d-flex">
                <a class="btn btn-sm btn-outline-secondary me-2" href="{{route('profile')}}"
                    {{request()->routeIs('profile')?'active':''}}
                    wire:navigate>
                    {{ __('Profil') }}
                </a>
                <a onclick="return confirm('Voulez-vous vraiment vous déconnecter ?');"
                    class="btn btn-sm btn-outline-danger" href="#" wire:click="logout">
                    {{ __('Déconnexion') }}
                </a>
            </div>
        </div>
    </div>
</nav>
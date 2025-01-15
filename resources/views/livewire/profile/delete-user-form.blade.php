<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component
{
    public string $password = '';
    public bool $show = false;

    public function showDelete()
    {
        $this->show = true;
    }
    public function closeDelete()
    {
        $this->show = false;
    }
    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Supprimer le compte') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées.
            Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez
            conserver.') }}
        </p>
    </header>

    <x-danger-button wire:click='showDelete'>{{ __('Supprimer le
        compte') }}</x-danger-button>


    @if ($show)
    <form wire:submit="deleteUser" class="p-6">

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Voulez-vous vraiment supprimer ce compte?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement
            supprimées. S\'il te plaît
            entrez votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.') }}
        </p>

        <div class="mt-6">
            <x-input-label for="password" value="{{ __('Mot de passe') }}" class="sr-only" />

            <x-text-input wire:model="password" id="password" name="password" type="password" class="mt-1 block w-3/4"
                placeholder="{{ __('Mot de passe') }}" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button wire:click='closeDelete'>
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Supprimer') }}
            </x-danger-button>
        </div>
    </form>
    @endif
</section>
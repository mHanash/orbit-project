<?php

use Livewire\Volt\Component;
use Illuminate\Validation\Rule;
use App\Models\Airline;


new class extends Component {
public $name = '';
public $country = '';
public $message = '';
public $classAlert = '';
public $showMessage = false;

protected $rules = [
    'name' => 'required',
    'country' => 'required',
];
//Rule::unique(Airline::class)->ignore($model->id)
public function save()
{
    $this->validate();

    Airline::create([
        'name' => $this->name,
        'country' => $this->country,
    ]);
    $this->reset([
        'name',
        'country'
    ]);
    $this->message = "Nouvelle compagnie créée avec succès !";
    $this->classAlert = "alert-success";
    $this->showMessage = true;
}

}; ?>
<x-slot name="header">
    <h2 class="h4 text-white">
        {{ __('Enregistrement nouvelle compagnie') }}
    </h2>
</x-slot>
<div class="justify-center">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <h5>Veuillez renseigner les informations</h5>
            @if ($showMessage)
            <livewire:helpers.alert :message="$message" :class="$classAlert" />
            @endif
            @error('model.name')
            <livewire:helpers.alert message="Nom de la compagnie requis" class="alert-danger" />
            @enderror
            @error('model.country')
            <livewire:helpers.alert message="Nom du pays requis" class="alert-danger" />
            @enderror
            <form wire:submit='save'>
                <div class="form-group">
                    <label for="name">Nom de la compagnie</label>
                    <input wire:model='name' required type="text" class="form-control" id="name"
                        placeholder="Entrez le nom de la compagnie">
                </div>
                <div class="form-group">
                    <label for="country">Pays d'appartenance</label>
                    <input wire:model='country' required type="text" class="form-control" id="country"
                        placeholder="Entrez le nom du pays">
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{route('airline.index')}}" class="btn btn-secondary" wire:navigate>Retour</a>
                </div>

            </form>
            <span wire:loading wire:target='save'>Traitement...</span>
        </div>
        <div class="col"></div>
    </div>
</div>
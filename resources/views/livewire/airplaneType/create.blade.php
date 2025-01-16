<?php

use Livewire\Volt\Component;
use Illuminate\Validation\Rule;
use App\Models\AirplaneType;


new class extends Component {
public $name = '';
public $countSeat = 0;
public $message = '';
public $classAlert = '';
public $showMessage = false;

protected $rules = [
    'name' => 'required',
    'countSeat' => 'required',
];
//Rule::unique(Airline::class)->ignore($model->id)
public function save()
{
    $this->validate();

    AirplaneType::create([
        'name' => $this->name,
        'countSeat' => $this->countSeat,
    ]);
    $this->reset([
        'name',
        'countSeat'
    ]);
    $this->message = "Nouveau type créé avec succès !";
    $this->classAlert = "alert-success";
    $this->showMessage = true;
}

}; ?>
<x-slot name="header">
    <h2 class="h4 text-white">
        {{ __('Enregistrement nouveau type') }}
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
            <livewire:helpers.alert message="Nom du type requis" class="alert-danger" />
            @enderror
            @error('model.country')
            <livewire:helpers.alert message="Nombre de siège requis" class="alert-danger" />
            @enderror
            <form wire:submit='save'>
                <div class="form-group">
                    <label for="name">Nom du type</label>
                    <input wire:model='name' required type="text" class="form-control" id="name"
                        placeholder="Entrez le nom du type">
                </div>
                <div class="form-group">
                    <label for="country">Nombre de siège</label>
                    <input wire:model='countSeat' required type="number" class="form-control" id="country"
                        placeholder="Entrez le nombre de siège">
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{route('airplaneType.index')}}" class="btn btn-secondary" wire:navigate>Retour</a>
                </div>

            </form>
            <span wire:loading wire:target='save'>Traitement...</span>
        </div>
        <div class="col"></div>
    </div>
</div>
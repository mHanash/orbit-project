<?php

use Livewire\Volt\Component;
use App\Models\Airline;
use App\Models\AirplaneType;


new class extends Component {
    public Airline $modelEdit;
    public $message = '';
    public $name = '';
    public $country = '';
    public $classAlert = '';
    public $showMessage = false;

    public $types = [];
    public array $selectedTypes = [];

    protected $rules = [
        'name' => 'required',
        'country' => 'required',
    ];
    //Rule::unique(Airline::class)->ignore($model->id)
    public function save()
    {
        $this->validate();

        $this->modelEdit->name = $this->name;
        $this->modelEdit->country = $this->country;
        $this->modelEdit->airplaneTypes()->sync($this->selectedTypes);

        $this->modelEdit->save();

        $this->message = "Compagnie modifiée avec succès !";
        $this->classAlert = "alert-success";
        $this->showMessage = true;
    }

    public function mount(int $id)
    {
        $this->modelEdit = Airline::find($id);
        $this->name = $this->modelEdit->name;
        $this->country = $this->modelEdit->country;
        $this->types = AirplaneType::all();
        $this->selectedTypes = $this->modelEdit->airplaneTypes->pluck('id')->toArray();
    }

}; ?>
<x-slot name="header">
    <h2 class="h4 text-white">
        {{ __('Modification de la compagnie : '.$modelEdit->name.' ('.$modelEdit->country.')') }}
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
            @error('modelEdit.name')
            <livewire:helpers.alert message="Nom de la compagnie requis" class="alert-danger" />
            @enderror
            @error('modelEdit.country')
            <livewire:helpers.alert message="Nom du pays requis" class="alert-danger" />
            @enderror
            @isset($modelEdit)
            <form wire:submit='save'>
                <div class="form-group">
                    <label for="name">Nom de la compagnie</label>
                    <input wire:model='name' type="text" class="form-control" id="name"
                        placeholder="Entrez le nom de la compagnie" required>
                </div>
                <div class="form-group">
                    <label for="country">Pays d'appartenance</label>
                    <input wire:model='country' type="text" class="form-control" id="country"
                        placeholder="Entrez le nom du pays" required>
                </div>
                <div class="form-group">
                    <label for="type">Type d'avion</label><br />
                    <small id="typeHelp" class="form-text text-danger text-muted">Maintenez Ctrl ou Command pour
                        séléctionner plusieurs type</small>
                    <select multiple wire:model='selectedTypes' class="form-control" id="type">
                        @foreach ($types as $itemType)
                        <option value="{{$itemType->id}}">{{$itemType->name}} (nombre de siège:
                            {{$itemType->countSeat}})
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                    <a href="{{route('airline.index')}}" class="btn btn-secondary" wire:navigate>Retour</a>
                </div>

            </form>
            @endisset
            <span wire:loading wire:target='save'>Traitement...</span>
        </div>
        <div class="col"></div>
    </div>
</div>
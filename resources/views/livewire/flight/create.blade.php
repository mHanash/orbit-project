<?php

use Livewire\Volt\Component;
use App\Models\Point;
use App\Models\Airline;
use App\Models\AirplaneType;

new class extends Component {
    public $addPoint = false;
    public $namePoint = '';
    public $airline = 0;
    public $number = '';
    public $price = 0;
    public $date = 0;
    public $from = 0;
    public $to = 0;
    public $airlines = [];
    public $airplaneTypes = [];

    public function mount()
    {
        $this->airlines = Airline::all();
    }
    public function updatedSelectedAirline($value)
    {
        $this->airplaneTypes = Airline::find($value)->airplaneTypes; // Récupérez les types d'avions
    }
    public function addPointAction()
    {
        $this->addPoint = $this->addPoint?false:true;
    }public function savePoint()
    {
        $this->validate(['namePoint'=>'required|string']);
        Point::create(['name'=>$this->namePoint]);
        $this->reset('namePoint');
    }
}; ?>
<x-slot name="header">
    <h2 class="h4 text-white">
        {{ __('Enregistré un nouveau vol') }}
    </h2>
</x-slot>
<div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form>
                <div class="form-group mb-2 row">
                    <label for="number" class="col-md-4 col-form-label">Numéro de vol</label>
                    <div class="col-md-8">
                        <input wire:model='number' type="text" class="form-control" id="number"
                            placeholder="Entrez le numéro de vol">
                    </div>
                </div>
                <div class="form-group mb-2 row">
                    <label for="date" class="col-md-4 col-form-label">Date et Heure de vol</label>
                    <div class="col-md-8">
                        <input wire:model='date' type="datetime-local" class="form-control" id="date"
                            placeholder="Password">
                    </div>
                </div>
                <div class="form-group mb-2 row">
                    <label for="price" class="col-md-4 col-form-label">Prix ($)</label>
                    <div class="col-md-8">
                        <input wire:model='price' type="number" step="0.01" class="form-control" id="price"
                            placeholder="Entrez le prix du vol">
                    </div>
                </div>
                <div class="form-group mb-2 row">
                    <label for="airline" class="col-md-4 col-form-label">Compagnie</label>
                    <div class="col-md-8">
                        <select wire:model='airline' name="airline" id="airline" class="form-select">
                            <option value="0">Séléctionnez une compagnie</option>
                            @foreach($airlines as $airlineItem)
                            <option value="{{ $airlineItem->id }}">{{ $airlineItem->name }} ({{$airlineItem->country}})
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group mb-2 row">
                    <label for="airplane-type" class="col-md-4 col-form-label">Type d'avion</label>
                    <div class="col-md-8">
                        <select wire:model='airplaneType' name="airplane-type" id="airplane-type" class="form-select">
                            <option value="0">Séléctionnez un type</option>
                            @foreach($airplaneTypes as $typeItem)
                            <option value="{{ $typeItem->id }}">{{ $typeItem->name }} ({{$typeItem->countSeat}})
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group mb-2 row">
                    <label for="from" class="col-md-4 col-form-label">Itinéraire</label>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col">
                                <select wire:model='from' name="from" id="from" class="form-select">
                                    <option value="0">Départ</option>
                                </select>
                            </div>
                            <div class="col">
                                <select wire:model='to' name="to" id="to" class="form-select">
                                    <option value="0">Arrivé</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>
            <div class="row mt-3">
                <div class="col">
                    <button type="button" wire:click='addPointAction'
                        class="btn btn-sm {{!$addPoint?'btn-info':'btn-danger'}} text-white">
                        {{!$addPoint?'Ajouter une destination':'Fermer l\'ajout d\'une destination'}}

                    </button>
                </div>
            </div>
            @if ($addPoint)
            <div class="row">
                <div class="col">
                    <p>Ajouter une nouvelle destination</p>
                    @error('namePoint')
                    <small id="namePointHelp" class="form-text text-danger text-muted">{{$message}}</small>
                    @enderror
                    <form wire:submit='savePoint'>
                        <div class="form-group mt-2 row">
                            <label for="name-type" class="col-md-4 col-form-label">Nom de la destination</label>
                            <div class="col-md-8">
                                <input wire:model='namePoint' type="text" class="form-control" id="name-type"
                                    placeholder="Entrez le nom">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                <span wire:loading wire:target='savePoint'>Chargement</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
        <div class="col-md-2"></div>
    </div>

</div>
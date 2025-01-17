<?php

use Livewire\Volt\Component;
use App\Models\Flight;

new class extends Component {
    public $flights = [];
    public $dateFrom;
    public $dateTo;
    public $searchValue = '';

    public function mount()
    {
        $this->flights = Flight::where('status', '=', 'created')->get();
    }

    public function filterFlights()
    {
        $query = Flight::join('airlines', 'airlines.id', '=', 'flights.airline_id')
            ->join('airplane_types', 'airplane_types.id', '=', 'flights.airplane_type_id')
            ->where('flights.status','=','created')
            ;

        if ($this->dateFrom || $this->dateTo) {
            $query->whereBetween('flights.date', [
                $this->dateFrom ?: '1970-01-01 00:00:00',
                $this->dateTo?: '9999-12-31 23:59:59'
            ]);
        }
        $query->where(function($q) {
        $q->where('airlines.name', 'like', "%{$this->searchValue}%")
            ->orWhere('airplane_types.name', 'like', "%{$this->searchValue}%");
        });
        $this->flights = $query->get();
    }

    public function search($value)
    {
        $this->searchValue = $value;
        $this->filterFlights();
    }
};
?>
<x-slot name="header">
    <h2 class="h4 text-white">
        {{ __('Vols disponibles') }}
    </h2>
</x-slot>
<div>
    <div class="row mb-2">
        <div class="col-md-4">
            <a href="{{ route('flight.create') }}" class="btn btn-sm btn-primary" wire:navigate>Nouvel
                enregistrement</a>
        </div>
        <div class="col-md-8 d-flex">
            <input wire:keyup='search($event.target.value)' type="text" name='search-date' wire:model="searchValue"
                placeholder="Rechercher (compagnie, type d'avion ..)" class="form-control form-control-sm me-1">
            <input wire:change='filterFlights' name='date-from' style="width: 30%" type="date"
                class="form-control form-control-sm" wire:model="dateFrom">
            <input wire:change='filterFlights' name='date-to' style="width: 30%" type="date"
                class="form-control form-control-sm" wire:model="dateTo">
        </div>
    </div>
    <div style="max-height: 85%" class="overflow-y-scroll border">
        <div class="row">
            @forelse($flights as $key => $value)
            <div class="col-md-3 ">
                <div class="card m-1">
                    <div class="card-body">
                        <h5 class="card-title">Vol num: {{$value->number}} </h5>
                        <p class="card-text">
                            <b>{{$value->initialPoint->name}}-{{$value->finalPoint->name}}</b><br />Le {{ date('d/m/Y \à
                            H:i', strtotime($value->date)) }}<br />{{$value->airline->name}}
                            ({{$value->airline->country}})<br />{{$value->airplaneType->name}}<br />Prix ($):
                            {{$value->price}}
                        </p>
                        <a href="#" class="btn btn-success">Reserver</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="alert alert-info m-5" style='width: 40%;'>Désolé !<br />Pas de vols disponibles</div>
            @endforelse
        </div>
    </div>
</div>
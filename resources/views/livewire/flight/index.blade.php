<?php

use Livewire\Volt\Component;
use App\Models\Flight;

new class extends Component {
    public $flights = [];

    public function mount()
    {
        $this->flights = Flight::where('status','=','created')->get();
    }
}; ?>
<x-slot name="header">
    <h2 class="h4 text-white">
        {{ __('Vols disponibles') }}
    </h2>
</x-slot>
<div>
    <div class="row mb-2">
        <div class="col-md-6">
            <a href="{{route('flight.create')}}" class="btn btn-sm btn-primary" wire:navigate>Nouvel enregistrement</a>
        </div>
        <div class="col-md-6 d-flex">
            <input type="text" name='search' placeholder="Rechercher (compagnie, type d'avion ..)"
                class="form-control form-control-sm me-1">
            <input name='search-date' style="width: 30%" type="datetime-local" class="form-control form-control-sm">
        </div>
    </div>
    <div style="max-height: 85%" class="overflow-y-scroll border">
        <div class="row">
            @foreach($flights as $key => $value)
            <div class="col-md-3 ">
                <div class="card m-1">
                    <div class="card-body">
                        <h5 class="card-title">Vol num: {{$value->number}} </h5>
                        <p class="card-text">
                            <b>{{$value->initialPoint->name}}-{{$value->finalPoint->name}}</b><br />{{$value->date}}<br />{{$value->airline->name}}
                            ({{$value->airline->country}})<br />{{$value->airplaneType->name}}<br />Prix ($):
                            {{$value->price}}
                        </p>
                        <a href="#" class="btn btn-success">Reserver</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
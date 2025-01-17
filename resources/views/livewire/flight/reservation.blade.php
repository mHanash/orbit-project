<?php

use Livewire\Volt\Component;
use App\Models\Reservation;
use App\Models\Flight;

new class extends Component {

    public Flight $flight;

    public function mount(int $id)
    {
        $this->flight = Flight::find($id);
    }
    public function delete(int $id)
    {
        $model = Reservation::find($id);
        $model->delete();
    }
    public function save()
    {
        Reservation::create([
            'flight_id' => $this->flight->id,
            'user_id' => auth()->user()->id,
            'date' => now(),
            'status' => 'created',
    ]);
    }
}; ?>
<x-slot name="header">
    <h2 class="h4 text-white">
        {{ __("Reserver le vol num. {$flight->number}") }}
    </h2>
</x-slot>
<div>
    <div class="row">
        <div class="col">
            <a href="{{route('flight.index')}}" class="btn btn-sm btn-secondary" wire:navigate>Retour</a>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col">
            <ul>
                <li>Date : <b>{{date('d/m/Y \à H\Hi',strtotime($flight->date))}}</b></li>
                <li>Compagnie : <b>{{$flight->airline->name}} ({{$flight->airline->country}})</b></li>
                <li>Type d'avion : <b>{{$flight->airplaneType->name}}</b></li>
                <li>Itinéraire : <b>{{$flight->initialPoint->name}} - {{$flight->finalPoint->name}}</b></li>
                <li>Prix ($) : <b>{{$flight->price}}</b></li>
            </ul>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col">
            <div class="table-responsive overflow-y-scroll" style="height: 43vh">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date de reservation</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 0
                        @endphp
                        @foreach (auth()
                        ->user()
                        ->reservations()
                        ->where('flight_id','=',$flight->id)
                        ->get() as $item)
                        @php
                        $i++
                        @endphp
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{date('d/m/Y',strtotime($item->date))}}</td>
                            <td><span class="badge bg-warning">{{$item->status}}</span></td>
                            <td>
                                <a wire:click='delete({{$item->id}})'
                                    onclick="return confirm('Confirmez pour supprimer cette reservation ?');" href="#"
                                    class="btn btn-sm btn-danger text-white">Supprimer</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr />
            <div class="row">
                <div class="col" style="text-align: right">
                    <span wire:loading>Chargement...</span>
                    <button wire:click='save' class="btn btn-sm btn-primary">Ajouter une reservation</button>
                </div>
            </div>
        </div>
    </div>
</div>
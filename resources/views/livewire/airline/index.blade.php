<?php

use Livewire\Volt\Component;
use App\Models\Airline;

new class extends Component {
    public $airlines = [];

    function mount()
    {
        $this->airlines = Airline::all();
    }

}; ?>
<x-slot name="header">
    <h2 class="h4 text-white">
        {{ __('Compagnie aérienne') }}
    </h2>
</x-slot>
<div>
    <div class="row">
        <div class="col-md-4 offset-md-8 " style="text-align: right">
            <a href="{{route('airline.create')}}" class="btn btn-primary" wire:navigate>Nouvel enregistrement</a>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Pays</th>
                        <th>Type d'avion</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0
                    @endphp
                    @foreach ($airlines as $item)
                    @php
                    $i++
                    @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->country}}</td>
                        <td>{{$item->airplaneTypes->count()}}</td>
                        <td><a href="{{route('airline.edit',['id'=>$item->id])}}" class="btn btn-sm btn-info text-white"
                                wire:navigate>Modifier</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
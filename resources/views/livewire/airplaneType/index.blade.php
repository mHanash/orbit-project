<?php

use Livewire\Volt\Component;
use App\Models\AirplaneType;

new class extends Component {
    public $airplaneTypes = [];

    function mount()
    {
        $this->airplaneTypes = AirplaneType::all();
    }

}; ?>
<x-slot name="header">
    <h2 class="h4 text-white">
        {{ __('Types d\'avions') }}
    </h2>
</x-slot>
<div>
    <div class="row">
        <div class="col-md-4 offset-md-8 " style="text-align: right">
            <a href="{{route('airplaneType.create')}}" class="btn btn-primary" wire:navigate>Nouvel enregistrement</a>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Nombre de siège</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0
                    @endphp
                    @foreach ($airplaneTypes as $item)
                    @php
                    $i++
                    @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->countSeat}}</td>
                        <td><a href="#" class="btn btn-sm btn-info text-white">Modifier</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

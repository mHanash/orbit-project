<?php

use Livewire\Volt\Component;

new class extends Component {
    //
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
            @for ($i = 0; $i < 10; $i++) <div class="col-md-3 ">
                <div class="card m-1">
                    <div class="card-body">
                        <h5 class="card-title">Vol num. </h5>
                        <p class="card-text">
                            <b>KINSHASA-GOMA</b><br />21/01/2002<br />Compagnie:<br />Type<br />Prix:180$
                        </p>
                        <a href="#" class="btn btn-success">Reserver</a>
                    </div>
                </div>
        </div>
        @endfor
    </div>
</div>
</div>
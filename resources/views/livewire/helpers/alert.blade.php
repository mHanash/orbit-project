<?php

use Livewire\Volt\Component;

new class extends Component {
    public $message = '';
    public $class = 'alert-primary';
    //
}; ?>

<div>
    <div class="alert {{$class}} alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close btn btn-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
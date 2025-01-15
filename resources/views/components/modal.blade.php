@props([
'name',
'show' => false,
'maxWidth' => '2xl'
])

@php
$maxWidth = [
'sm' => 'modal-sm',
'md' => 'modal-md',
'lg' => 'modal-lg',
'xl' => 'modal-xl',
'2xl' => 'modal-2xl',
][$maxWidth];
@endphp

<div x-data="{
        show: @js($show),
    }" x-init="$watch('show', value => {
        const modal = document.getElementById('{{ $name }}');
        if (value) {
            $(modal).modal('show');
        } else {
            $(modal).modal('hide');
        }
    })" x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null" x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false" style="display: {{ $show ? 'block' : 'none' }};">
    <div class="modal fade" id="{{ $name }}" tabindex="-1" aria-labelledby="{{ $name }}Label" aria-hidden="true">
        <div class="modal-dialog {{ $maxWidth }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $name }}Label">Titre de la modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">Enregistrer les modifications</button>
                </div>
            </div>
        </div>
    </div>
</div>
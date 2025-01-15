@props(['on'])

<div id="action-message" class="alert alert-info d-none" role="alert" {{ $attributes }}>
    {{ $slot->isEmpty() ? __('Saved.') : $slot }}
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.livewire.on('{{ $on }}', () => {
            const message = document.getElementById('action-message');
            message.classList.remove('d-none');
            setTimeout(() => {
                message.classList.add('d-none');
            }, 2000);
        });
    });
</script>
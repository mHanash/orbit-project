@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
$alignmentClasses = match ($align) {
'left' => 'dropdown-menu-start',
'top' => '',
default => 'dropdown-menu-end',
};

$width = match ($width) {
'48' => 'w-48',
default => $width,
};
@endphp

<div class="dropdown">
    <div>
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
            data-bs-toggle="dropdown" aria-expanded="false">
            {{ $trigger }}
        </button>
        <ul class="dropdown-menu {{ $alignmentClasses }} {{ $width }}" aria-labelledby="dropdownMenuButton">
            <li>
                <div class="{{ $contentClasses }}">
                    {{ $content }}
                </div>
            </li>
        </ul>
    </div>
</div>
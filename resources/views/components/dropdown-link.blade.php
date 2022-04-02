@props(['active'])

@php
$classes = $active ?? false ? 'dropdown-item active' : 'dropdown-item';
@endphp

<li>
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>

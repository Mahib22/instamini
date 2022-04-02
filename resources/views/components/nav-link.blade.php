@props(['active'])

@php
$classes = $active ?? false ? 'nav-link text-primary' : 'nav-link text-dark';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

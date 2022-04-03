@props(['status'])

@if ($status)
    <p {{ $attributes->merge(['class' => 'text-success fw-bold mb-0']) }}>
        {{ $status }}
    </p>
@endif

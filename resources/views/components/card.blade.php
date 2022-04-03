<div class="card border-0 shadow-sm rounded">
    @isset($header)
        <div class="card-header bg-white">
            {{ $header }}
        </div>
    @endisset

    <div class="card-body">
        {{ $slot }}
    </div>
</div>

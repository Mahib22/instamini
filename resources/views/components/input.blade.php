<div class="input-group mb-3">
    @isset($icon)
        <span class="input-group-text bg-light">
            {{ $icon }}
        </span>
    @endisset

    <input class="form-control @error($id) is-invalid @enderror" {{ $attributes }}>

    @error($id)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

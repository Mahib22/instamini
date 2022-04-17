<div class="input-group mb-3">
    <textarea rows="3" class="form-control @error($id) is-invalid @enderror"
        {{ $attributes }}>{{ $slot }}</textarea>

    @error($id)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

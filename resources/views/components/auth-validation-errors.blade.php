@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="text-danger px-4 mt-3">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

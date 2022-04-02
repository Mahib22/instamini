<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn rounded mt-3 btn-primary']) }}>
    {{ $slot }}
</button>

@php
$avatar_url = $avatar ? asset('img/avatar/' . $avatar) : 'https://ui-avatars.com/api/?name=' . $username;
@endphp

<img src="{{ $avatar_url }}" class="rounded-circle" alt="Foto {{ $username }}" {{ $attributes }}>

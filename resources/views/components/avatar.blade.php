@php
$avatar_url = $user->avatar ? asset('img/avatar/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . $user->username;
@endphp

<img src="{{ $avatar_url }}" class="rounded-circle" alt="Foto {{ $user->username }}" width="150px">

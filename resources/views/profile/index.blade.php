<x-app-layout>
    <x-container>
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <x-avatar :avatar="$user->avatar" :username="$user->username" width="150px" />
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h1 class="mb-0">{{ $user->username }}</h1>
                        <p class="fw-bold fs-5">{{ $user->fullname }}</p>
                        <p>{{ $user->bio }}</p>

                        @if (Auth::user()->id === $user->id)
                            <a href={{ route('profile.edit') }} class="btn btn-primary">Edit Profile</a>
                        @else
                            <button class="btn btn-primary" onclick="follow({{ $user->id }}, this)">
                                {{ Auth::user()->following->contains($user->id) ? 'Unfollow' : 'Follow' }}
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>

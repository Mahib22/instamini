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
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>

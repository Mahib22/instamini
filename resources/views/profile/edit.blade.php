<x-app-layout>
    <x-container>
        <div class="row my-4">
            <div class="col-md-6 mx-auto">
                <x-card>
                    <x-slot name="header">
                        <p class="mb-0 text-center h3 text-uppercase">Edit Profile</p>
                    </x-slot>

                    <form action="{{ route('profile.update') }}" method="post" class="p-2"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Username -->
                        <x-label for="username">Username</x-label>
                        <x-input type="text" id="username" name="username" :value="$user->username"
                            placeholder="Masukkan username Anda" />

                        <!-- Name -->
                        <x-label for="fullname">Nama</x-label>
                        <x-input type="text" id="fullname" name="fullname" :value="$user->fullname"
                            placeholder="Masukkan nama lengkap Anda" />

                        <!-- Biodata -->
                        <x-label for="bio">Bio</x-label>
                        <x-textarea id="bio" name="bio" placeholder="Tuliskan sesuatu tentang Anda">
                            {{ $user->bio }}
                        </x-textarea>

                        <!-- Avatar -->
                        <x-label for="avatar">Avatar</x-label>
                        <x-input type="file" id="avatar" name="avatar" />
                        <x-avatar :user="$user" />

                        <div class="d-grid gap-2 mb-3">
                            <x-button>Update</x-button>
                        </div>
                    </form>
                </x-card>
            </div>
        </div>
    </x-container>
</x-app-layout>

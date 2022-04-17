<x-app-layout>
    <x-container>
        <div class="row my-4">
            <div class="col-md-6 mx-auto">
                <a href="{{ route('profile', $user->username) }}" class="text-decoration-none fs-5 text-black">
                    <i class="fa-solid fa-left-long me-2"></i> Kembali
                </a>

                <x-card>
                    <x-slot name="header">
                        <p class="mb-0 text-center h3 text-uppercase">Edit Profile</p>
                    </x-slot>

                    <!-- Session Status -->
                    <x-auth-session-status :status="session('status')" />

                    <div class="text-center mb-4">
                        <x-avatar :user="$user" width="150px" />
                    </div>

                    <form action="{{ route('profile.update') }}" method="post" class="p-2"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Avatar -->
                        <x-label for="avatar">Ubah Avatar</x-label>
                        <x-input type="file" id="avatar" name="avatar" />

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

                        <div class="d-grid gap-2 mb-3">
                            <x-button>Update Profile</x-button>
                        </div>
                    </form>
                </x-card>

                <div class="mt-3">
                    <x-card>
                        <div class="p-2">
                            <div class="d-flex justify-content-between align-items-center position-relative">
                                <a href="#" class="text-decoration-none text-black fs-5 stretched-link">Ubah Email</a>
                                <i class="fa-solid fa-angle-right fs-5"></i>
                            </div>
                            <hr class="dropdown-divider">
                            <div class="d-flex justify-content-between align-items-center position-relative">
                                <a href="#" class="text-decoration-none text-black fs-5 stretched-link">Ubah
                                    Password</a>
                                <i class="fa-solid fa-angle-right fs-5"></i>
                            </div>
                            <hr class="dropdown-divider">
                            <div class="d-flex justify-content-between align-items-center position-relative">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="text-decoration-none text-black fs-5 stretched-link"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">Log Out
                                    </a>
                                </form>
                                <i class="fa-solid fa-arrow-right-from-bracket fs-5"></i>
                            </div>
                        </div>
                    </x-card>
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>

<x-guest-layout>
    <div class="container">
        <div class="row mt-4 pt-4">
            <div class="col-md-6 mx-auto">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">

                        <h1 class="card-title text-center fs-3 text-uppercase py-2">Reset Password</h1>
                        <p class="px-2 text-muted">
                            Anda lupa kata sandi? Tidak masalah. Cukup beri tahu kami alamat email
                            Anda dan kami akan mengirim email kepada Anda tautan untuk membuat password baru.
                        </p>

                        <!-- Session Status -->
                        <x-auth-session-status :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors :errors="$errors" />

                        <form action="{{ route('password.email') }}" method="post" class="p-2">
                            @csrf

                            <!-- Email Address -->
                            <label for="inputEmail" class="form-label">Email</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light">
                                    <i class="fa-solid fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control" id="inputEmail" name="email"
                                    value="{{ old('email') }}" required autofocus autocomplete="email">
                            </div>

                            <div class="d-grid gap-2 mb-3">
                                <button class="btn btn-primary rounded" type="submit">
                                    Kirim Email Reset Password
                                </button>
                            </div>

                            <a href="{{ route('login') }}" class="text-decoration-none">
                                <i class="fa-solid fa-chevron-left"></i> Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

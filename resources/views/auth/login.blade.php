@extends('layouts.app')

@section('title', 'Masuk')

@section('content')
<section class="py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-sm p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="bi bi-hexagon-fill text-primary" style="font-size:2.5rem;"></i>
                        <h4 class="fw-bold mt-2">Masuk ke Akun Anda</h4>
                        <p class="text-secondary small">Silakan login untuk melanjutkan</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="email@contoh.com" autofocus>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label small" for="remember">Ingat saya</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill">Masuk</button>
                    </form>

                    <p class="text-center small text-secondary mt-4 mb-0">
                        Belum punya akun? <a href="{{ route('register') }}" class="text-primary fw-semibold text-decoration-none">Daftar di sini</a>
                    </p>

                    <div class="alert alert-secondary small mt-4 mb-0">
                        <strong>Demo akun admin:</strong><br>
                        Email: admin@karyadigital.test<br>
                        Password: password
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

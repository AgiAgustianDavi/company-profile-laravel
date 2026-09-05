@extends('layouts.app')

@section('title', 'Daftar Akun')

@section('content')
<section class="py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-sm p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="bi bi-hexagon-fill text-primary" style="font-size:2.5rem;"></i>
                        <h4 class="fw-bold mt-2">Buat Akun Baru</h4>
                        <p class="text-secondary small">Daftar untuk mengakses layanan kami</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Anda" autofocus>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="email@contoh.com">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 8 karakter">
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-semibold">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill">Daftar</button>
                    </form>

                    <p class="text-center small text-secondary mt-4 mb-0">
                        Sudah punya akun? <a href="{{ route('login') }}" class="text-primary fw-semibold text-decoration-none">Masuk di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

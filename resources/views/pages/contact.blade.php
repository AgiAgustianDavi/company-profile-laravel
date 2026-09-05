@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h6 class="text-primary fw-semibold text-uppercase">Kontak</h6>
            <h2 class="section-title">Hubungi Kami</h2>
            <p class="section-subtitle">Punya pertanyaan atau ingin berdiskusi mengenai proyek Anda? Kirimkan pesan kepada kami.</p>
        </div>

        <div class="row g-5">
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm p-4 h-100">
                    <h5 class="fw-semibold mb-4">Informasi Kontak</h5>
                    <div class="d-flex mb-3">
                        <i class="bi bi-geo-alt text-primary fs-5 me-3"></i>
                        <span class="text-secondary">{{ $settings['address'] ?? '-' }}</span>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="bi bi-telephone text-primary fs-5 me-3"></i>
                        <span class="text-secondary">{{ $settings['phone'] ?? '-' }}</span>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="bi bi-envelope text-primary fs-5 me-3"></i>
                        <span class="text-secondary">{{ $settings['email'] ?? '-' }}</span>
                    </div>
                    @if(!empty($settings['whatsapp']))
                    <div class="d-flex">
                        <i class="bi bi-whatsapp text-primary fs-5 me-3"></i>
                        <a href="https://wa.me/{{ $settings['whatsapp'] }}" class="text-secondary text-decoration-none">{{ $settings['whatsapp'] }}</a>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm p-4">
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Anda">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="email@contoh.com">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">No. Telepon (opsional)</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="08xxxxxxxxxx">
                                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Subjek</label>
                                <input type="text" name="subject" value="{{ old('subject') }}" class="form-control @error('subject') is-invalid @enderror" placeholder="Subjek pesan">
                                @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-semibold">Pesan</label>
                                <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" placeholder="Tulis pesan Anda di sini...">{{ old('message') }}</textarea>
                                @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary rounded-pill px-4">Kirim Pesan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('layouts.app')

@section('title', ($settings['company_name'] ?? config('app.name')).' - '.($settings['tagline'] ?? ''))

@section('content')

    <section class="hero-section py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="display-5 fw-bold mb-3">{{ $settings['tagline'] ?? 'Solusi Digital untuk Bisnis Anda' }}</h1>
                    <p class="lead mb-4 opacity-75">
                        {{ \Illuminate\Support\Str::limit($settings['about'] ?? '', 220) }}
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg px-4 rounded-pill fw-semibold text-primary">Hubungi Kami</a>
                        <a href="{{ route('services.index') }}" class="btn btn-outline-light btn-lg px-4 rounded-pill">Lihat Layanan</a>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block text-center">
                    <i class="bi bi-building" style="font-size: 14rem; opacity: 0.15;"></i>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container py-4">
            <div class="text-center">
                <h6 class="text-primary fw-semibold text-uppercase">Layanan Kami</h6>
                <h2 class="section-title">Apa yang Kami Tawarkan</h2>
                <p class="section-subtitle">Beragam solusi digital yang kami rancang untuk mendukung pertumbuhan bisnis Anda</p>
            </div>
            <div class="row g-4">
                @forelse($services as $service)
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-service h-100 p-4">
                            <div class="icon-box mb-3">
                                <i class="bi {{ $service->icon ?: 'bi-gem' }}"></i>
                            </div>
                            <h5 class="fw-semibold">{{ $service->title }}</h5>
                            <p class="text-secondary small">{{ \Illuminate\Support\Str::limit($service->description, 90) }}</p>
                            <a href="{{ route('services.show', $service) }}" class="text-primary text-decoration-none small fw-semibold">
                                Selengkapnya <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-secondary">Belum ada layanan yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center">
                <h6 class="text-primary fw-semibold text-uppercase">Portofolio</h6>
                <h2 class="section-title">Proyek yang Telah Kami Kerjakan</h2>
                <p class="section-subtitle">Beberapa hasil kerja sama kami dengan berbagai klien</p>
            </div>
            <div class="row g-4">
                @forelse($portfolios as $portfolio)
                    <div class="col-md-4">
                        <div class="card card-portfolio h-100">
                            <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center" style="height:200px;">
                                @if($portfolio->image)
                                    <img src="{{ asset('storage/'.$portfolio->image) }}" class="w-100 h-100" style="object-fit:cover;" alt="{{ $portfolio->title }}">
                                @else
                                    <i class="bi bi-image text-secondary" style="font-size:3rem;"></i>
                                @endif
                            </div>
                            <div class="card-body">
                                <span class="badge bg-primary bg-opacity-10 text-primary mb-2">{{ $portfolio->category ?: 'Umum' }}</span>
                                <h5 class="fw-semibold">{{ $portfolio->title }}</h5>
                                <p class="text-secondary small">{{ \Illuminate\Support\Str::limit($portfolio->description, 90) }}</p>
                                <a href="{{ route('portfolios.show', $portfolio) }}" class="text-primary text-decoration-none small fw-semibold">
                                    Lihat Detail <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-secondary">Belum ada portofolio yang ditambahkan.</p>
                @endforelse
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('portfolios.index') }}" class="btn btn-outline-primary rounded-pill px-4">Lihat Semua Portofolio</a>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container py-4 text-center">
            <h2 class="section-title">Siap Bekerja Sama dengan Kami?</h2>
            <p class="section-subtitle">Mari diskusikan kebutuhan digital bisnis Anda bersama tim kami</p>
            <a href="{{ route('contact.index') }}" class="btn btn-primary btn-lg px-5 rounded-pill">Hubungi Kami Sekarang</a>
        </div>
    </section>

@endsection

@extends('layouts.app')

@section('title', 'Tentang Kami - '.($settings['company_name'] ?? config('app.name')))

@section('content')
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h6 class="text-primary fw-semibold text-uppercase">Tentang Kami</h6>
            <h2 class="section-title">Mengenal {{ $settings['company_name'] ?? config('app.name') }}</h2>
        </div>

        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <i class="bi bi-people d-block text-center text-primary" style="font-size: 10rem; opacity: 0.15;"></i>
            </div>
            <div class="col-lg-6">
                <p class="text-secondary">{{ $settings['about'] ?? '' }}</p>
                <p class="text-secondary">Berdiri sejak tahun <strong>{{ $settings['founded_year'] ?? '-' }}</strong>, kami terus berkomitmen memberikan layanan terbaik bagi klien kami.</p>
            </div>
        </div>

        <div class="row g-4 mt-3">
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm p-4">
                    <div class="icon-box mb-3"><i class="bi bi-eye"></i></div>
                    <h4 class="fw-semibold">Visi</h4>
                    <p class="text-secondary mb-0">{{ $settings['vision'] ?? '-' }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm p-4">
                    <div class="icon-box mb-3"><i class="bi bi-flag"></i></div>
                    <h4 class="fw-semibold">Misi</h4>
                    <p class="text-secondary mb-0" style="white-space: pre-line;">{{ $settings['mission'] ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('layouts.app')

@section('title', $service->title)

@section('content')
<section class="py-5">
    <div class="container py-4">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('services.index') }}" class="text-decoration-none">Layanan</a></li>
                <li class="breadcrumb-item active">{{ $service->title }}</li>
            </ol>
        </nav>

        <div class="row g-5">
            <div class="col-lg-8">
                @if($service->image)
                    <img src="{{ asset('storage/'.$service->image) }}" class="img-fluid rounded mb-4" alt="{{ $service->title }}">
                @endif
                <div class="icon-box mb-3">
                    <i class="bi {{ $service->icon ?: 'bi-gem' }}"></i>
                </div>
                <h2 class="fw-bold mb-3">{{ $service->title }}</h2>
                <p class="text-secondary" style="white-space: pre-line;">{{ $service->description }}</p>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-4">
                    <h5 class="fw-semibold mb-3">Tertarik dengan layanan ini?</h5>
                    <p class="text-secondary small">Hubungi tim kami untuk konsultasi lebih lanjut mengenai layanan {{ $service->title }}.</p>
                    <a href="{{ route('contact.index') }}" class="btn btn-primary rounded-pill">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

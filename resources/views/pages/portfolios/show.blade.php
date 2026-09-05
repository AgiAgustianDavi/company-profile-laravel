@extends('layouts.app')

@section('title', $portfolio->title)

@section('content')
<section class="py-5">
    <div class="container py-4">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('portfolios.index') }}" class="text-decoration-none">Portofolio</a></li>
                <li class="breadcrumb-item active">{{ $portfolio->title }}</li>
            </ol>
        </nav>

        <div class="row g-5">
            <div class="col-lg-8">
                <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center rounded mb-4" style="height:350px;">
                    @if($portfolio->image)
                        <img src="{{ asset('storage/'.$portfolio->image) }}" class="w-100 h-100 rounded" style="object-fit:cover;" alt="{{ $portfolio->title }}">
                    @else
                        <i class="bi bi-image text-secondary" style="font-size:4rem;"></i>
                    @endif
                </div>
                <span class="badge bg-primary bg-opacity-10 text-primary mb-2">{{ $portfolio->category ?: 'Umum' }}</span>
                <h2 class="fw-bold mb-3">{{ $portfolio->title }}</h2>
                <p class="text-secondary" style="white-space: pre-line;">{{ $portfolio->description }}</p>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-4">
                    <h6 class="text-secondary text-uppercase small">Klien</h6>
                    <p class="fw-semibold mb-3">{{ $portfolio->client ?: '-' }}</p>
                    <h6 class="text-secondary text-uppercase small">Kategori</h6>
                    <p class="fw-semibold mb-3">{{ $portfolio->category ?: '-' }}</p>
                    <a href="{{ route('contact.index') }}" class="btn btn-primary rounded-pill mt-2">Diskusikan Proyek Anda</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('layouts.app')

@section('title', 'Layanan Kami')

@section('content')
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h6 class="text-primary fw-semibold text-uppercase">Layanan</h6>
            <h2 class="section-title">Layanan yang Kami Sediakan</h2>
        </div>

        <div class="row g-4">
            @forelse($services as $service)
                <div class="col-md-6 col-lg-4">
                    <div class="card card-service h-100 p-4">
                        <div class="icon-box mb-3">
                            <i class="bi {{ $service->icon ?: 'bi-gem' }}"></i>
                        </div>
                        <h5 class="fw-semibold">{{ $service->title }}</h5>
                        <p class="text-secondary small">{{ \Illuminate\Support\Str::limit($service->description, 100) }}</p>
                        <a href="{{ route('services.show', $service) }}" class="text-primary text-decoration-none small fw-semibold">
                            Selengkapnya <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-secondary">Belum ada layanan yang tersedia.</p>
            @endforelse
        </div>

        <div class="mt-5">
            {{ $services->links() }}
        </div>
    </div>
</section>
@endsection

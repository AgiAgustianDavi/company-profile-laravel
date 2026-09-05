@extends('layouts.app')

@section('title', 'Portofolio Kami')

@section('content')
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h6 class="text-primary fw-semibold text-uppercase">Portofolio</h6>
            <h2 class="section-title">Proyek yang Telah Kami Kerjakan</h2>
        </div>

        <div class="row g-4">
            @forelse($portfolios as $portfolio)
                <div class="col-md-6 col-lg-4">
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
                <p class="text-center text-secondary">Belum ada portofolio yang tersedia.</p>
            @endforelse
        </div>

        <div class="mt-5">
            {{ $portfolios->links() }}
        </div>
    </div>
</section>
@endsection

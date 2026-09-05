@php
    $s = $settings ?? $globalSettings ?? [];
@endphp
<footer class="bg-dark text-light pt-5 pb-4 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-hexagon-fill me-1"></i>{{ $s['company_name'] ?? config('app.name') }}</h5>
                <p class="text-secondary small">{{ $s['tagline'] ?? '' }}</p>
                <div class="d-flex gap-3 mt-3">
                    @if(!empty($s['instagram']))
                        <a href="{{ $s['instagram'] }}" class="text-light" target="_blank"><i class="bi bi-instagram fs-5"></i></a>
                    @endif
                    @if(!empty($s['linkedin']))
                        <a href="{{ $s['linkedin'] }}" class="text-light" target="_blank"><i class="bi bi-linkedin fs-5"></i></a>
                    @endif
                    @if(!empty($s['whatsapp']))
                        <a href="https://wa.me/{{ $s['whatsapp'] }}" class="text-light" target="_blank"><i class="bi bi-whatsapp fs-5"></i></a>
                    @endif
                </div>
            </div>
            <div class="col-md-2">
                <h6 class="fw-bold mb-3">Navigasi</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-secondary text-decoration-none">Beranda</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-secondary text-decoration-none">Tentang Kami</a></li>
                    <li class="mb-2"><a href="{{ route('services.index') }}" class="text-secondary text-decoration-none">Layanan</a></li>
                    <li class="mb-2"><a href="{{ route('portfolios.index') }}" class="text-secondary text-decoration-none">Portofolio</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="fw-bold mb-3">Kontak</h6>
                <ul class="list-unstyled small text-secondary">
                    <li class="mb-2"><i class="bi bi-geo-alt me-2"></i>{{ $s['address'] ?? '-' }}</li>
                    <li class="mb-2"><i class="bi bi-telephone me-2"></i>{{ $s['phone'] ?? '-' }}</li>
                    <li class="mb-2"><i class="bi bi-envelope me-2"></i>{{ $s['email'] ?? '-' }}</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="fw-bold mb-3">Jam Operasional</h6>
                <p class="small text-secondary mb-1">Senin - Jumat: 09.00 - 17.00</p>
                <p class="small text-secondary">Sabtu - Minggu: Tutup</p>
            </div>
        </div>
        <hr class="border-secondary mt-4">
        <p class="text-center small text-secondary mb-0">
            &copy; {{ date('Y') }} {{ $s['company_name'] ?? config('app.name') }}. Sejak {{ $s['founded_year'] ?? '' }}. Seluruh hak cipta dilindungi.
        </p>
    </div>
</footer>

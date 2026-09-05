@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card stat-card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-secondary small mb-1">Layanan</p>
                    <h3 class="fw-bold mb-0">{{ $totalServices }}</h3>
                </div>
                <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                    <i class="bi bi-gem fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-secondary small mb-1">Portofolio</p>
                    <h3 class="fw-bold mb-0">{{ $totalPortfolios }}</h3>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success" style="width:50px;height:50px;">
                    <i class="bi bi-briefcase fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-secondary small mb-1">Pesan Masuk</p>
                    <h3 class="fw-bold mb-0">{{ $totalMessages }} <span class="fs-6 text-danger">({{ $unreadMessages }} baru)</span></h3>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-warning bg-opacity-10 text-warning" style="width:50px;height:50px;">
                    <i class="bi bi-envelope fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-secondary small mb-1">Pengguna Terdaftar</p>
                    <h3 class="fw-bold mb-0">{{ $totalUsers }}</h3>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-info bg-opacity-10 text-info" style="width:50px;height:50px;">
                    <i class="bi bi-people fs-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card stat-card p-4">
    <h5 class="fw-semibold mb-3">Pesan Masuk Terbaru</h5>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr class="text-secondary small text-uppercase">
                    <th>Nama</th>
                    <th>Subjek</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestMessages as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->subject }}</td>
                        <td class="small text-secondary">{{ $message->created_at->translatedFormat('d M Y, H:i') }}</td>
                        <td>
                            @if($message->is_read)
                                <span class="badge bg-secondary bg-opacity-10 text-secondary">Sudah dibaca</span>
                            @else
                                <span class="badge bg-danger bg-opacity-10 text-danger">Belum dibaca</span>
                            @endif
                        </td>
                        <td><a href="{{ route('admin.messages.show', $message) }}" class="text-primary small">Lihat</a></td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-secondary py-4">Belum ada pesan masuk.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

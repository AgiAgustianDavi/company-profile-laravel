@extends('layouts.admin')

@section('title', 'Kelola Layanan')
@section('page-title', 'Kelola Layanan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <p class="text-secondary mb-0">Daftar semua layanan yang ditampilkan di website.</p>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary rounded-pill px-4">
        <i class="bi bi-plus-lg me-1"></i>Tambah Layanan
    </a>
</div>

<div class="card stat-card p-4">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr class="text-secondary small text-uppercase">
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Dibuat</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi {{ $service->icon ?: 'bi-gem' }} text-primary me-2"></i>
                                {{ $service->title }}
                            </div>
                        </td>
                        <td>
                            @if($service->is_active)
                                <span class="badge bg-success bg-opacity-10 text-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary bg-opacity-10 text-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td class="small text-secondary">{{ $service->created_at->translatedFormat('d M Y') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus layanan ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-secondary py-4">Belum ada layanan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $services->links() }}</div>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Kelola Portofolio')
@section('page-title', 'Kelola Portofolio')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <p class="text-secondary mb-0">Daftar semua portofolio/proyek yang ditampilkan di website.</p>
    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary rounded-pill px-4">
        <i class="bi bi-plus-lg me-1"></i>Tambah Portofolio
    </a>
</div>

<div class="card stat-card p-4">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr class="text-secondary small text-uppercase">
                    <th>Judul</th>
                    <th>Klien</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($portfolios as $portfolio)
                    <tr>
                        <td>{{ $portfolio->title }}</td>
                        <td>{{ $portfolio->client ?: '-' }}</td>
                        <td>{{ $portfolio->category ?: '-' }}</td>
                        <td>
                            @if($portfolio->is_active)
                                <span class="badge bg-success bg-opacity-10 text-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary bg-opacity-10 text-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus portofolio ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-secondary py-4">Belum ada portofolio.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $portfolios->links() }}</div>
</div>
@endsection

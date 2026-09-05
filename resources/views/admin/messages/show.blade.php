@extends('layouts.admin')

@section('title', 'Detail Pesan')
@section('page-title', 'Detail Pesan')

@section('content')
<div class="card stat-card p-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h6 class="text-secondary small text-uppercase">Nama</h6>
            <p class="fw-semibold">{{ $message->name }}</p>
        </div>
        <div class="col-md-6">
            <h6 class="text-secondary small text-uppercase">Email</h6>
            <p class="fw-semibold">{{ $message->email }}</p>
        </div>
        <div class="col-md-6">
            <h6 class="text-secondary small text-uppercase">No. Telepon</h6>
            <p class="fw-semibold">{{ $message->phone ?: '-' }}</p>
        </div>
        <div class="col-md-6">
            <h6 class="text-secondary small text-uppercase">Tanggal</h6>
            <p class="fw-semibold">{{ $message->created_at->translatedFormat('d F Y, H:i') }}</p>
        </div>
        <div class="col-12">
            <h6 class="text-secondary small text-uppercase">Subjek</h6>
            <p class="fw-semibold">{{ $message->subject }}</p>
        </div>
        <div class="col-12">
            <h6 class="text-secondary small text-uppercase">Pesan</h6>
            <p style="white-space: pre-line;">{{ $message->message }}</p>
        </div>
    </div>

    <div class="d-flex gap-2">
        <a href="mailto:{{ $message->email }}" class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-reply me-1"></i>Balas via Email
        </a>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Kembali</a>
        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger rounded-pill px-4">Hapus</button>
        </form>
    </div>
</div>
@endsection

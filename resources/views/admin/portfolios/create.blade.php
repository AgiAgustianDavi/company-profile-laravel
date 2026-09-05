@extends('layouts.admin')

@section('title', 'Tambah Portofolio')
@section('page-title', 'Tambah Portofolio')

@section('content')
<div class="card stat-card p-4">
    <form method="POST" action="{{ route('admin.portfolios.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label small fw-semibold">Judul Proyek</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Contoh: Website E-Commerce">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Nama Klien</label>
                <input type="text" name="client" value="{{ old('client') }}" class="form-control @error('client') is-invalid @enderror">
                @error('client') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Kategori</label>
                <input type="text" name="category" value="{{ old('category') }}" class="form-control @error('category') is-invalid @enderror" placeholder="Contoh: Website">
                @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12">
                <label class="form-label small fw-semibold">Gambar (opsional)</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12">
                <label class="form-label small fw-semibold">Deskripsi</label>
                <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Jelaskan detail proyek ini...">{{ old('description') }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12 form-check">
                <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" checked>
                <label class="form-check-label" for="is_active">Tampilkan di website (aktif)</label>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan</button>
                <a href="{{ route('admin.portfolios.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection

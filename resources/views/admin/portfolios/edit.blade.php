@extends('layouts.admin')

@section('title', 'Edit Portofolio')
@section('page-title', 'Edit Portofolio')

@section('content')
<div class="card stat-card p-4">
    <form method="POST" action="{{ route('admin.portfolios.update', $portfolio) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label small fw-semibold">Judul Proyek</label>
                <input type="text" name="title" value="{{ old('title', $portfolio->title) }}" class="form-control @error('title') is-invalid @enderror">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Nama Klien</label>
                <input type="text" name="client" value="{{ old('client', $portfolio->client) }}" class="form-control @error('client') is-invalid @enderror">
                @error('client') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Kategori</label>
                <input type="text" name="category" value="{{ old('category', $portfolio->category) }}" class="form-control @error('category') is-invalid @enderror">
                @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12">
                @if($portfolio->image)
                    <img src="{{ asset('storage/'.$portfolio->image) }}" class="mb-2 rounded" style="max-height:150px;">
                @endif
                <label class="form-label small fw-semibold">Ganti Gambar (opsional)</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12">
                <label class="form-label small fw-semibold">Deskripsi</label>
                <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description', $portfolio->description) }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12 form-check">
                <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" {{ $portfolio->is_active ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Tampilkan di website (aktif)</label>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary rounded-pill px-4">Perbarui</button>
                <a href="{{ route('admin.portfolios.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection

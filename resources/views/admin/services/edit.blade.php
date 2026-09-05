@extends('layouts.admin')

@section('title', 'Edit Layanan')
@section('page-title', 'Edit Layanan')

@section('content')
<div class="card stat-card p-4">
    <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-8">
                <label class="form-label small fw-semibold">Judul Layanan</label>
                <input type="text" name="title" value="{{ old('title', $service->title) }}" class="form-control @error('title') is-invalid @enderror">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label small fw-semibold">Icon (Bootstrap Icons)</label>
                <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" class="form-control @error('icon') is-invalid @enderror">
                @error('icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12">
                @if($service->image)
                    <img src="{{ asset('storage/'.$service->image) }}" class="mb-2 rounded" style="max-height:150px;">
                @endif
                <label class="form-label small fw-semibold">Ganti Gambar (opsional)</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12">
                <label class="form-label small fw-semibold">Deskripsi</label>
                <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description', $service->description) }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12 form-check">
                <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" {{ $service->is_active ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Tampilkan di website (aktif)</label>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary rounded-pill px-4">Perbarui</button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection

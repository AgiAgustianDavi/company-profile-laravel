@extends('layouts.admin')

@section('title', 'Pengaturan Profil Perusahaan')
@section('page-title', 'Pengaturan Profil Perusahaan')

@section('content')
<div class="card stat-card p-4">
    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label small fw-semibold">Nama Perusahaan</label>
                <input type="text" name="company_name" value="{{ old('company_name', $settings['company_name'] ?? '') }}" class="form-control @error('company_name') is-invalid @enderror">
                @error('company_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-semibold">Tagline</label>
                <input type="text" name="tagline" value="{{ old('tagline', $settings['tagline'] ?? '') }}" class="form-control @error('tagline') is-invalid @enderror">
                @error('tagline') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12">
                <label class="form-label small fw-semibold">Tentang Kami</label>
                <textarea name="about" rows="4" class="form-control @error('about') is-invalid @enderror">{{ old('about', $settings['about'] ?? '') }}</textarea>
                @error('about') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-semibold">Visi</label>
                <textarea name="vision" rows="3" class="form-control @error('vision') is-invalid @enderror">{{ old('vision', $settings['vision'] ?? '') }}</textarea>
                @error('vision') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-semibold">Misi</label>
                <textarea name="mission" rows="3" class="form-control @error('mission') is-invalid @enderror">{{ old('mission', $settings['mission'] ?? '') }}</textarea>
                @error('mission') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12">
                <label class="form-label small fw-semibold">Alamat</label>
                <input type="text" name="address" value="{{ old('address', $settings['address'] ?? '') }}" class="form-control @error('address') is-invalid @enderror">
                @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label small fw-semibold">Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', $settings['phone'] ?? '') }}" class="form-control @error('phone') is-invalid @enderror">
                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label small fw-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email', $settings['email'] ?? '') }}" class="form-control @error('email') is-invalid @enderror">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label small fw-semibold">WhatsApp (format: 628xxxx)</label>
                <input type="text" name="whatsapp" value="{{ old('whatsapp', $settings['whatsapp'] ?? '') }}" class="form-control @error('whatsapp') is-invalid @enderror">
                @error('whatsapp') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label small fw-semibold">Instagram (URL)</label>
                <input type="text" name="instagram" value="{{ old('instagram', $settings['instagram'] ?? '') }}" class="form-control @error('instagram') is-invalid @enderror">
                @error('instagram') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label small fw-semibold">LinkedIn (URL)</label>
                <input type="text" name="linkedin" value="{{ old('linkedin', $settings['linkedin'] ?? '') }}" class="form-control @error('linkedin') is-invalid @enderror">
                @error('linkedin') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label small fw-semibold">Tahun Berdiri</label>
                <input type="text" name="founded_year" value="{{ old('founded_year', $settings['founded_year'] ?? '') }}" class="form-control @error('founded_year') is-invalid @enderror">
                @error('founded_year') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>
@endsection

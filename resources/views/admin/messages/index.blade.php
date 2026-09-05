@extends('layouts.admin')

@section('title', 'Pesan Masuk')
@section('page-title', 'Pesan Masuk')

@section('content')
<div class="card stat-card p-4">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr class="text-secondary small text-uppercase">
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                    <tr class="{{ $message->is_read ? '' : 'fw-semibold' }}">
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td class="small text-secondary">{{ $message->created_at->translatedFormat('d M Y, H:i') }}</td>
                        <td>
                            @if($message->is_read)
                                <span class="badge bg-secondary bg-opacity-10 text-secondary">Sudah dibaca</span>
                            @else
                                <span class="badge bg-danger bg-opacity-10 text-danger">Belum dibaca</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></a>
                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-secondary py-4">Belum ada pesan masuk.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $messages->links() }}</div>
</div>
@endsection

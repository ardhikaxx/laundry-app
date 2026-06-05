@extends('layouts.app')
@section('title', 'Paket Layanan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Paket</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Paket Harga</h5>
        <a href="{{ route('admin.paket.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-1"></i> Tambah Paket
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-3">Kode</th>
                        <th>Nama Paket</th>
                        <th class="text-end">Harga</th>
                        <th class="text-center">Min. Berat</th>
                        <th class="text-center">Status</th>
                        <th class="text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pakets as $paket)
                    <tr>
                        <td class="px-3 fw-bold text-primary">{{ $paket->kode_paket }}</td>
                        <td class="fw-semibold">{{ $paket->nama_paket }}</td>
                        <td class="text-end text-success fw-bold">Rp {{ number_format($paket->harga, 0, ',', '.') }}</td>
                        <td class="text-center">{{ $paket->min_berat ? $paket->min_berat . ' Kg' : '-' }}</td>
                        <td class="text-center">
                            @if($paket->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.paket.edit', $paket) }}" class="btn btn-warning btn-sm" title="Ubah">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form id="form-delete-{{ $paket->id }}" action="{{ route('admin.paket.destroy', $paket) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" title="Hapus" 
                                    onclick="confirmDelete('form-delete-{{ $paket->id }}', '{{ $paket->nama_paket }}')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Data paket tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($pakets->hasPages())
    <div class="card-footer bg-white pt-3 pb-1">
        {{ $pakets->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>
@endsection

@extends('layouts.public')
@section('title', 'Pelanggan')

@section('content')
<div class="bg-primary text-white py-4 mb-5">
    <div class="container">
        <h2 class="fw-bold mb-0">Daftar Pelanggan</h2>
        <p class="mb-0 text-white-50">Cek status membership dan total poin transaksi Anda.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white p-3">
            <form action="{{ route('public.pelanggan') }}" method="GET" class="d-flex w-100 w-md-50 ms-auto gap-2">
                <input type="text" name="cari" class="form-control" placeholder="Cari nama atau kode pelanggan..." value="{{ request('cari') }}">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                @if(request('cari'))
                <a href="{{ route('public.pelanggan') }}" class="btn btn-outline-secondary"><i class="fas fa-times"></i></a>
                @endif
            </form>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4">Kode Pelanggan</th>
                            <th>Nama</th>
                            <th>L/P</th>
                            <th>No. Telepon</th>
                            <th>Tgl Daftar</th>
                            <th class="text-center">Total Transaksi</th>
                            <th class="text-center">Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pelanggans as $pelanggan)
                        <tr>
                            <td class="px-4 fw-semibold text-primary">{{ $pelanggan->kode_pelanggan }}</td>
                            <td>{{ $pelanggan->nama_pelanggan }}</td>
                            <td>{{ $pelanggan->jenis_kelamin }}</td>
                            <td>{{ substr($pelanggan->no_telepon, 0, 4) . '****' . substr($pelanggan->no_telepon, -3) }}</td>
                            <td>{{ \Carbon\Carbon::parse($pelanggan->tanggal_daftar)->format('d/m/Y') }}</td>
                            <td class="text-center"><span class="badge bg-secondary">{{ $pelanggan->total_transaksi }}</span></td>
                            <td class="text-center"><span class="badge bg-warning text-dark"><i class="fas fa-star me-1"></i>{{ $pelanggan->poin }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Data pelanggan tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($pelanggans->hasPages())
        <div class="card-footer bg-white pt-3 pb-1">
            {{ $pelanggans->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>
</div>
@endsection

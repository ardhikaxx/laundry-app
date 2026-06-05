@extends('layouts.public')
@section('title', 'Detail Cucian - ' . $pelanggan->nama_pelanggan)

@section('content')
<div class="container py-5" style="min-height: 70vh;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">Status Cucian: <span class="text-primary">{{ $pelanggan->nama_pelanggan }}</span></h3>
        <a href="{{ route('public.pelanggan') }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i>Kembali</a>
    </div>

    <div class="row g-4">
        @forelse($transaksis as $transaksi)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-bottom-0 pt-3 pb-0 d-flex justify-content-between align-items-center">
                    <span class="fw-bold text-primary">{{ $transaksi->no_order }}</span>
                    @php
                        $statusClass = 'secondary';
                        $statusText = 'Menunggu Diproses';
                        
                        if ($transaksi->status == 'diterima') { $statusClass = 'secondary'; $statusText = 'Menunggu Diproses'; }
                        elseif ($transaksi->status == 'dicuci') { $statusClass = 'info'; $statusText = 'Sedang Dicuci'; }
                        elseif ($transaksi->status == 'dijemur') { $statusClass = 'warning'; $statusText = 'Sedang Dijemur'; }
                        elseif ($transaksi->status == 'disetrika') { $statusClass = 'warning'; $statusText = 'Sedang Disetrika'; }
                        elseif ($transaksi->status == 'siap') { $statusClass = 'success'; $statusText = 'Selesai, Siap Diambil'; }
                        elseif ($transaksi->status == 'diambil') { $statusClass = 'primary'; $statusText = 'Sudah Diambil'; }
                        elseif ($transaksi->status == 'batal') { $statusClass = 'danger'; $statusText = 'Dibatalkan'; }
                    @endphp
                    <span class="badge bg-{{ $statusClass }} px-2 py-1">{{ $statusText }}</span>
                </div>
                <div class="card-body">
                    <div class="alert alert-{{ $statusClass == 'secondary' ? 'light border' : $statusClass }} bg-opacity-10 py-2 mb-3 text-center">
                        <i class="fas fa-info-circle me-1"></i> <span class="fw-semibold">{{ $statusText }}</span>
                    </div>
                    <div class="mb-3 small">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted">Tgl Masuk:</span>
                            <span class="fw-semibold">{{ \Carbon\Carbon::parse($transaksi->tanggal_masuk)->format('d M Y') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted">Est. Selesai:</span>
                            <span class="fw-semibold">{{ \Carbon\Carbon::parse($transaksi->tanggal_estimasi)->format('d M Y') }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Status Bayar:</span>
                            <span class="fw-bold {{ $transaksi->bayar >= $transaksi->total ? 'text-success' : 'text-danger' }}">
                                {{ $transaksi->bayar >= $transaksi->total ? 'LUNAS' : 'BELUM LUNAS' }}
                            </span>
                        </div>
                    </div>
                    <hr>
                    <h6 class="fw-bold small mb-2 text-muted">Detail Item:</h6>
                    <ul class="list-group list-group-flush small mb-3">
                        @foreach($transaksi->detail as $item)
                        <li class="list-group-item px-0 py-1 border-0 d-flex justify-content-between bg-transparent">
                            <span>{{ $item->qty }}x {{ $item->nama_layanan }}</span>
                            <span class="text-muted">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                        <span class="fw-bold text-muted">Total Tagihan:</span>
                        <span class="fw-bold text-primary fs-5">Rp {{ number_format($transaksi->total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="fas fa-box-open fs-1 text-muted mb-3 opacity-25" style="font-size: 4rem !important;"></i>
            <h5 class="text-muted">Belum ada riwayat transaksi cucian.</h5>
        </div>
        @endforelse
    </div>
</div>
@endsection

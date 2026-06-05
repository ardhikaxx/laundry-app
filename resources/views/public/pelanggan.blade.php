@extends('layouts.public')
@section('title', 'Cek Status Cucian')

@section('content')
<div class="bg-primary text-white py-5 mb-5 text-center">
    <div class="container">
        <h2 class="fw-bold mb-3">Cek Status Cucian Anda</h2>
        <p class="mb-4 text-white-50">Masukkan Nama, Kode Pelanggan, atau Nomor Telepon Anda untuk melacak cucian.</p>
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('public.pelanggan') }}" method="GET" class="d-flex shadow-sm rounded">
                    <input type="text" name="cari" class="form-control form-control-lg border-0" placeholder="Contoh: PLG-2026... atau 0812..." value="{{ request('cari') }}" required>
                    <button type="submit" class="btn btn-dark px-4"><i class="fas fa-search me-2"></i>Cari</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5" style="min-height: 40vh;">
    @if(request('cari'))
        @if($pelanggans->count() > 0)
            <div class="row justify-content-center g-4">
                @foreach($pelanggans as $pelanggan)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary bg-opacity-10 text-primary d-inline-flex justify-content-center align-items-center rounded-circle mb-3" style="width: 70px; height: 70px; font-size: 2rem;">
                                {{ substr($pelanggan->nama_pelanggan, 0, 1) }}
                            </div>
                            <h4 class="fw-bold mb-1">{{ $pelanggan->nama_pelanggan }}</h4>
                            <p class="text-muted mb-3">{{ $pelanggan->kode_pelanggan }}</p>
                            
                            <ul class="list-unstyled text-start mb-4 bg-light p-3 rounded small">
                                <li class="mb-2"><i class="fas fa-phone text-muted me-2"></i> {{ substr($pelanggan->no_telepon, 0, 4) . '****' . substr($pelanggan->no_telepon, -3) }}</li>
                                <li class="mb-2"><i class="fas fa-calendar-alt text-muted me-2"></i> Terdaftar: {{ \Carbon\Carbon::parse($pelanggan->tanggal_daftar)->format('d M Y') }}</li>
                                <li><i class="fas fa-shopping-bag text-muted me-2"></i> Total Transaksi: <span class="badge bg-primary">{{ $pelanggan->total_transaksi }}x</span></li>
                            </ul>
                            
                            <a href="{{ route('public.pelanggan.show', $pelanggan->kode_pelanggan) }}" class="btn btn-primary w-100 fw-bold">
                                <i class="fas fa-list me-2"></i>Lihat Cucian Saya
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-search-minus fs-1 text-muted mb-3"></i>
                <h4 class="text-muted">Data Pelanggan Tidak Ditemukan</h4>
                <p class="text-muted">Pastikan data pencarian yang Anda masukkan benar.</p>
                <a href="{{ route('public.pelanggan') }}" class="btn btn-outline-secondary mt-2">Reset Pencarian</a>
            </div>
        @endif
    @else
        <div class="text-center py-5">
            <i class="fas fa-tshirt fs-1 text-muted opacity-25 mb-4" style="font-size: 5rem !important;"></i>
            <h5 class="text-muted">Silakan lakukan pencarian untuk melacak status cucian Anda.</h5>
        </div>
    @endif
</div>
@endsection

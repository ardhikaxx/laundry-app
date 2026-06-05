@extends('layouts.public')

@section('content')
<section class="hero text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3"><i class="fas fa-soap me-3"></i>SiLaundry</h1>
        <p class="lead mb-4">Solusi Cerdas Pakaian Bersih, Wangi, dan Rapi Setiap Hari.</p>
        <a href="{{ route('public.layanan') }}" class="btn btn-light btn-lg text-primary fw-bold rounded-pill px-4 shadow-sm">
            <i class="fas fa-list me-2"></i> Lihat Layanan Kami
        </a>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Kenapa Memilih Kami?</h2>
            <div class="mx-auto mt-2" style="width: 50px; height: 3px; background-color: var(--accent);"></div>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle" style="width: 60px; height: 60px;">
                                <i class="fas fa-clock fs-3"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold">Tepat Waktu</h5>
                        <p class="text-muted mb-0">Kami menjamin pakaian Anda selesai tepat pada estimasi waktu yang telah ditentukan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle" style="width: 60px; height: 60px;">
                                <i class="fas fa-tshirt fs-3"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold">Bersih & Rapi</h5>
                        <p class="text-muted mb-0">Kualitas cucian dan setrika yang selalu kami jaga untuk memberikan kepuasan kepada Anda.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle" style="width: 60px; height: 60px;">
                                <i class="fas fa-tags fs-3"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold">Harga Terjangkau</h5>
                        <p class="text-muted mb-0">Nikmati layanan premium kami dengan harga yang sangat bersaing dan hemat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Paket Hemat</h2>
            <div class="mx-auto mt-2" style="width: 50px; height: 3px; background-color: var(--accent);"></div>
        </div>
        <div class="row g-4 justify-content-center">
            @forelse($pakets as $paket)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <h4 class="card-title fw-bold text-primary mb-3">{{ $paket->nama_paket }}</h4>
                        <h2 class="display-6 fw-bold mb-3">Rp {{ number_format($paket->harga, 0, ',', '.') }}</h2>
                        <p class="text-muted">{{ $paket->deskripsi }}</p>
                        @if($paket->min_berat)
                        <div class="badge bg-secondary mb-3">Min. Berat: {{ $paket->min_berat }} Kg</div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">Belum ada paket tersedia.</div>
            @endforelse
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Layanan Unggulan</h2>
            <div class="mx-auto mt-2" style="width: 50px; height: 3px; background-color: var(--accent);"></div>
        </div>
        <div class="row g-4 justify-content-center">
            @forelse($layanans as $layanan)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold mb-0">{{ $layanan->nama_layanan }}</h5>
                            <span class="badge bg-primary">{{ $layanan->kategori->nama_kategori ?? '-' }}</span>
                        </div>
                        <h4 class="text-success fw-bold mb-3">
                            Rp {{ number_format($layanan->harga, 0, ',', '.') }} <span class="fs-6 text-muted fw-normal">/ {{ $layanan->satuan }}</span>
                        </h4>
                        <p class="card-text text-muted small">{{ $layanan->deskripsi ?: 'Tidak ada deskripsi' }}</p>
                        <div class="d-flex align-items-center text-muted small">
                            <i class="fas fa-clock me-1"></i> Estimasi: {{ $layanan->estimasi_hari }} Hari
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">Belum ada layanan tersedia.</div>
            @endforelse
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('public.layanan') }}" class="btn btn-outline-primary px-4 rounded-pill">Lihat Semua Layanan</a>
        </div>
    </div>
</section>
@endsection

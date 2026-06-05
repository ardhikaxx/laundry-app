@extends('layouts.public')
@section('title', 'Layanan')

@section('content')
<div class="bg-primary text-white py-4 mb-5">
    <div class="container">
        <h2 class="fw-bold mb-0">Daftar Layanan</h2>
        <p class="mb-0 text-white-50">Temukan layanan yang sesuai dengan kebutuhan Anda.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('public.layanan') }}" class="btn btn-sm {{ !$kategoriId ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill px-3">Semua Kategori</a>
                @foreach($kategoris as $kat)
                <a href="{{ route('public.layanan', ['kategori' => $kat->id]) }}" class="btn btn-sm {{ $kategoriId == $kat->id ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill px-3">
                    {{ $kat->nama_kategori }}
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row g-4">
        @forelse($layanans as $layanan)
        <div class="col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <span class="badge bg-light text-primary mb-2">{{ $layanan->kategori->nama_kategori ?? '-' }}</span>
                    <h5 class="card-title fw-bold">{{ $layanan->nama_layanan }}</h5>
                    <h4 class="text-success fw-bold mb-3">
                        Rp {{ number_format($layanan->harga, 0, ',', '.') }} <span class="fs-6 text-muted fw-normal">/ {{ $layanan->satuan }}</span>
                    </h4>
                    <p class="card-text text-muted small">{{ $layanan->deskripsi ?: 'Tidak ada deskripsi' }}</p>
                    <hr>
                    <div class="d-flex align-items-center text-muted small">
                        <i class="fas fa-clock me-2"></i> Estimasi: {{ $layanan->estimasi_hari }} Hari
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="text-muted">
                <i class="fas fa-box-open fs-1 mb-3"></i>
                <h5>Tidak ada layanan ditemukan</h5>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection

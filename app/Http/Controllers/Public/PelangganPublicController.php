<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganPublicController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;
        
        $pelanggans = Pelanggan::aktif()
            ->when($cari, function($query, $cari) {
                return $query->where('nama_pelanggan', 'like', "%{$cari}%")
                             ->orWhere('kode_pelanggan', 'like', "%{$cari}%");
            })
            ->paginate(10);

        return view('public.pelanggan', compact('pelanggans', 'cari'));
    }
}

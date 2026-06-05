<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paket;
use App\Services\NomorOrderService;

class PaketSeeder extends Seeder
{
    public function run(): void
    {
        Paket::create([
            'kode_paket' => NomorOrderService::generate('PKT', 'paket', 'kode_paket', 3),
            'nama_paket' => 'Paket Hemat 5 Kg',
            'harga' => 30000,
            'deskripsi' => 'Paket cuci komplit 5 Kg hemat',
            'min_berat' => 5,
            'is_active' => 1
        ]);
        Paket::create([
            'kode_paket' => NomorOrderService::generate('PKT', 'paket', 'kode_paket', 3),
            'nama_paket' => 'Paket Keluarga 10 Kg',
            'harga' => 55000,
            'deskripsi' => 'Paket cuci komplit 10 Kg untuk keluarga',
            'min_berat' => 10,
            'is_active' => 1
        ]);
    }
}

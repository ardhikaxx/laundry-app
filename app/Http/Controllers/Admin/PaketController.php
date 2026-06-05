<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Http\Requests\PaketRequest;
use App\Services\NomorOrderService;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::latest()->paginate(15);
        return view('admin.paket.index', compact('pakets'));
    }

    public function create()
    {
        return view('admin.paket.create');
    }

    public function store(PaketRequest $request)
    {
        $data = $request->validated();
        $data['kode_paket'] = NomorOrderService::generate('PKT', 'paket', 'kode_paket', 3);
        
        Paket::create($data);
        return redirect()->route('admin.paket.index')->with('success', 'Data paket berhasil disimpan.');
    }

    public function edit(Paket $paket)
    {
        return view('admin.paket.edit', compact('paket'));
    }

    public function update(PaketRequest $request, Paket $paket)
    {
        $paket->update($request->validated());
        return redirect()->route('admin.paket.index')->with('success', 'Data paket berhasil diperbarui.');
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();
        return redirect()->route('admin.paket.index')->with('success', 'Data paket berhasil dihapus.');
    }
}

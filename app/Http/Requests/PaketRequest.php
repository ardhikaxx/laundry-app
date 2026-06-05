<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_paket' => ['required', 'string', 'max:150'],
            'harga'      => ['required', 'numeric', 'min:0'],
            'deskripsi'  => ['nullable', 'string', 'max:1000'],
            'min_berat'  => ['nullable', 'numeric', 'min:0'],
            'is_active'  => ['required', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_paket.required' => 'Nama paket wajib diisi.',
            'nama_paket.max'      => 'Nama paket maksimal 150 karakter.',
            'harga.required'      => 'Harga paket wajib diisi.',
            'harga.numeric'       => 'Harga paket harus berupa angka.',
            'harga.min'           => 'Harga paket tidak boleh negatif.',
            'min_berat.numeric'   => 'Minimal berat harus berupa angka.',
            'min_berat.min'       => 'Minimal berat tidak boleh negatif.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'required|string|unique:barang,kode_barang|max:50',
            'jumlah' => 'required|integer|min:0',
            'lokasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_barang.required' => 'Nama barang harus diisi',
            'kode_barang.required' => 'Kode barang harus diisi',
            'kode_barang.unique' => 'Kode barang sudah digunakan',
            'jumlah.required' => 'Jumlah harus diisi',
            'jumlah.min' => 'Jumlah minimal 0',
            'lokasi.required' => 'Lokasi harus diisi',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.max' => 'Ukuran gambar maksimal 2MB',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeminjamanRequest extends FormRequest
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
            'barang_id' => 'required|exists:barang,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'jumlah_pinjam' => 'required|integer|min:1',
            'keperluan' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'barang_id.required' => 'Barang harus dipilih',
            'barang_id.exists' => 'Barang tidak ditemukan',
            'tanggal_pinjam.required' => 'Tanggal pinjam harus diisi',
            'tanggal_kembali.required' => 'Tanggal kembali harus diisi',
            'tanggal_kembali.after_or_equal' => 'Tanggal kembali harus setelah atau sama dengan tanggal pinjam',
            'jumlah_pinjam.required' => 'Jumlah pinjam harus diisi',
            'jumlah_pinjam.min' => 'Jumlah pinjam minimal 1',
            'keperluan.required' => 'Keperluan harus diisi',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePeminjamanRequest extends FormRequest
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
            'status' => 'required|in:menunggu,dipinjam,dikembalikan,ditolak',
            'alasan_penolakan' => 'required_if:status,ditolak|string',
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'Status harus diisi',
            'alasan_penolakan.required_if' => 'Alasan penolakan harus diisi jika status ditolak',
        ];
    }
}

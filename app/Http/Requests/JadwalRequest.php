<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JadwalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kode_matkul' => 'required|string|max:20',
            'nama_matkul' => 'required|string|max:255',
            'kelas' => 'required|string|max:20',
            'sks' => 'required|integer|min:1|max:6',
            'hari' => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'dosen' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:500',
        ];
    }
}

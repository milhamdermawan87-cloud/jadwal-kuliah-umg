<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'kode_matkul',
        'nama_matkul',
        'kelas',
        'sks',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'dosen',
        'keterangan',
    ];

    protected function casts(): array
    {
        return [
            'jam_mulai' => 'datetime:H:i',
            'jam_selesai' => 'datetime:H:i',
        ];
    }
}

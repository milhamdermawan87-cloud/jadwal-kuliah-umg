<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        $jadwals = [
            [
                'kode_matkul' => '2406022110',
                'nama_matkul' => 'KEWARGANEGARAAN',
                'kelas' => 'A-PG',
                'sks' => 2,
                'hari' => 'Kamis',
                'jam_mulai' => '12:50',
                'jam_selesai' => '14:30',
                'dosen' => 'ARYA MAULANA P.',
                'keterangan' => 'Kelas reguler',
            ],
            [
                'kode_matkul' => '2406022211',
                'nama_matkul' => 'ENGLISH FOR INFORMATIC ENGINEERING',
                'kelas' => 'A-PG',
                'sks' => 2,
                'hari' => 'Selasa',
                'jam_mulai' => '12:00',
                'jam_selesai' => '14:30',
                'dosen' => 'TIM BAHASA INGGRIS LC',
                'keterangan' => 'Kelas reguler',
            ],
            [
                'kode_matkul' => '2406022214',
                'nama_matkul' => 'AIK - IBADAH, AKHLAK, DAN MUAMALAH',
                'kelas' => 'A-PG',
                'sks' => 2,
                'hari' => 'Selasa',
                'jam_mulai' => '07:50',
                'jam_selesai' => '09:30',
                'dosen' => 'Drs. MOH. IN AM, M.Pd.I',
                'keterangan' => 'Kelas reguler',
            ],
            [
                'kode_matkul' => '2406022215',
                'nama_matkul' => 'TECHNOPRENEURSHIP',
                'kelas' => 'A-PG',
                'sks' => 3,
                'hari' => 'Rabu',
                'jam_mulai' => '10:20',
                'jam_selesai' => '12:50',
                'dosen' => 'PUTRI AISYIYAH RAKHMA DEVI, S.Pd., M.Kom',
                'keterangan' => 'Kelas reguler',
            ],
            [
                'kode_matkul' => '2406022309',
                'nama_matkul' => 'ALGORITMA DAN STRUKTUR DATA',
                'kelas' => 'A-PG',
                'sks' => 4,
                'hari' => 'Senin',
                'jam_mulai' => '08:40',
                'jam_selesai' => '12:00',
                'dosen' => 'DENI SUTAJI, S.Kom., M.Kom',
                'keterangan' => 'Kelas reguler',
            ],
            [
                'kode_matkul' => '2406022312',
                'nama_matkul' => 'SISTEM OPERASI',
                'kelas' => 'A-PG',
                'sks' => 3,
                'hari' => 'Kamis',
                'jam_mulai' => '10:20',
                'jam_selesai' => '12:50',
                'dosen' => 'Muhammad Nasyitul Ibad, S.Kom., M.Kom',
                'keterangan' => 'Kelas reguler',
            ],
            [
                'kode_matkul' => '2406022313',
                'nama_matkul' => 'MATEMATIKA DISKRIT',
                'kelas' => 'A-PG',
                'sks' => 3,
                'hari' => 'Selasa',
                'jam_mulai' => '09:30',
                'jam_selesai' => '12:00',
                'dosen' => 'NADYA HUSENTI, S.Pd., M.Pd',
                'keterangan' => 'Kelas reguler',
            ],
        ];

        foreach ($jadwals as $jadwal) {
            Jadwal::create($jadwal);
        }
    }
}

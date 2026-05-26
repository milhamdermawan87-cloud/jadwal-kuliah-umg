<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{
    public function pdf()
    {
        $jadwals = Jadwal::orderByRaw("FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu')")
            ->orderBy('jam_mulai')->get();
        $totalSKS = Jadwal::sum('sks');

        $pdf = Pdf::loadView('jadwal.pdf', compact('jadwals', 'totalSKS'));
        return $pdf->download('jadwal-mata-kuliah.pdf');
    }

    public function print()
    {
        $jadwals = Jadwal::orderByRaw("FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu')")
            ->orderBy('jam_mulai')->get();
        $totalSKS = Jadwal::sum('sks');

        return view('jadwal.print', compact('jadwals', 'totalSKS'));
    }
}

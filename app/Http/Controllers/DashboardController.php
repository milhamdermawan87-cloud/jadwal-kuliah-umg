<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMatkul = Jadwal::count();
        $totalSKS = Jadwal::sum('sks');
        $hariIni = Carbon::now()->locale('id')->dayName;
        $hariIndonesia = [
            'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu', 'Sunday' => 'Minggu'
        ];
        $hariSekarang = $hariIndonesia[$hariIni] ?? $hariIni;
        $jadwalHariIni = Jadwal::where('hari', $hariSekarang)->orderBy('jam_mulai')->get();

        $hariIniCount = $jadwalHariIni->count();

        $nextClass = Jadwal::where('hari', $hariSekarang)
            ->where('jam_mulai', '>', Carbon::now()->format('H:i:s'))
            ->orderBy('jam_mulai')
            ->first();

        return view('dashboard.index', compact(
            'totalMatkul', 'totalSKS', 'hariIniCount', 'jadwalHariIni', 'nextClass'
        ));
    }
}

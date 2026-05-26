<?php

namespace App\Http\Controllers;

use App\Http\Requests\JadwalRequest;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $query = Jadwal::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_matkul', 'like', '%' . $request->search . '%')
                  ->orWhere('kode_matkul', 'like', '%' . $request->search . '%')
                  ->orWhere('dosen', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('hari')) {
            $query->where('hari', $request->hari);
        }

        $sortBy = $request->get('sort_by', 'hari');
        $sortOrder = $request->get('sort_order', 'asc');

        if ($sortBy === 'jam_mulai') {
            $query->orderByRaw("FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu')")
                  ->orderBy('jam_mulai', $sortOrder);
        } else {
            $query->orderByRaw("FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu')")
                  ->orderBy('jam_mulai', 'asc');
        }

        $jadwals = $query->paginate(10)->withQueryString();
        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        return view('jadwal.index', compact('jadwals', 'hariList'));
    }

    public function create()
    {
        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        return view('jadwal.create', compact('hariList'));
    }

    public function store(JadwalRequest $request)
    {
        Jadwal::create($request->validated());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function show(Jadwal $jadwal)
    {
        return view('jadwal.show', compact('jadwal'));
    }

    public function edit(Jadwal $jadwal)
    {
        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        return view('jadwal.edit', compact('jadwal', 'hariList'));
    }

    public function update(JadwalRequest $request, Jadwal $jadwal)
    {
        $jadwal->update($request->validated());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}

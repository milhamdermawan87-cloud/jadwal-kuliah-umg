@extends('layouts.app')

@section('title', 'Detail Jadwal')

@section('content')
<div class="p-4 lg:p-6 max-w-3xl mx-auto animate-fadeIn">
    <div class="mb-6">
        <a href="{{ route('jadwal.index') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
        <h1 class="text-2xl font-bold mt-2">
            <span class="bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">Detail Jadwal</span>
        </h1>
    </div>

    @php
    $warna = ['Senin' => 'from-blue-500 to-blue-600', 'Selasa' => 'from-purple-500 to-purple-600', 'Rabu' => 'from-emerald-500 to-emerald-600', 'Kamis' => 'from-orange-500 to-orange-600', 'Jumat' => 'from-pink-500 to-pink-600', 'Sabtu' => 'from-teal-500 to-teal-600', 'Minggu' => 'from-red-500 to-red-600'];
    $w = $warna[$jadwal->hari] ?? 'from-gray-500 to-gray-600';
    @endphp

    <div class="rounded-2xl backdrop-blur-xl bg-white/60 dark:bg-gray-800/40 border border-gray-200/50 dark:border-gray-700/50 overflow-hidden animate-slideUp">
        <div class="bg-gradient-to-r {{ $w }} p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-sm opacity-80">{{ $jadwal->kode_matkul }}</span>
                    <h2 class="text-2xl font-bold mt-1">{{ $jadwal->nama_matkul }}</h2>
                    <p class="text-sm opacity-80 mt-1">{{ $jadwal->kelas }}</p>
                </div>
                <div class="text-right">
                    <div class="text-4xl font-bold">{{ $jadwal->sks }}</div>
                    <div class="text-sm opacity-80">SKS</div>
                </div>
            </div>
        </div>

        <div class="p-6 space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 rounded-xl bg-gray-50 dark:bg-gray-800/60">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1"><i class="far fa-calendar mr-1"></i> Hari</p>
                    <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $jadwal->hari }}</p>
                </div>
                <div class="p-4 rounded-xl bg-gray-50 dark:bg-gray-800/60">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1"><i class="far fa-clock mr-1"></i> Waktu</p>
                    <p class="font-semibold text-gray-800 dark:text-gray-200">{{ date('H:i', strtotime($jadwal->jam_mulai)) }} - {{ date('H:i', strtotime($jadwal->jam_selesai)) }}</p>
                </div>
                <div class="p-4 rounded-xl bg-gray-50 dark:bg-gray-800/60">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1"><i class="fas fa-user mr-1"></i> Dosen</p>
                    <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $jadwal->dosen }}</p>
                </div>
                <div class="p-4 rounded-xl bg-gray-50 dark:bg-gray-800/60">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1"><i class="fas fa-layer-group mr-1"></i> SKS</p>
                    <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $jadwal->sks }} SKS</p>
                </div>
            </div>

            @if($jadwal->keterangan)
            <div class="p-4 rounded-xl bg-gray-50 dark:bg-gray-800/60">
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-1"><i class="fas fa-info-circle mr-1"></i> Keterangan</p>
                <p class="text-gray-800 dark:text-gray-200">{{ $jadwal->keterangan }}</p>
            </div>
            @endif

            @if(auth()->user()->isAdmin())
            <div class="flex items-center gap-3 pt-4 border-t border-gray-200/50 dark:border-gray-700/50">
                <a href="{{ route('jadwal.edit', $jadwal) }}" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-amber-500 to-orange-600 text-white font-medium hover:from-amber-600 hover:to-orange-700 transition-all duration-200 text-sm">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <form method="POST" action="{{ route('jadwal.destroy', $jadwal) }}" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-red-500 to-rose-600 text-white font-medium hover:from-red-600 hover:to-rose-700 transition-all duration-200 text-sm">
                        <i class="fas fa-trash mr-2"></i>Hapus
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

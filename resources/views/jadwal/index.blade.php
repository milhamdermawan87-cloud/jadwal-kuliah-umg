@extends('layouts.app')

@section('title', 'Jadwal Mata Kuliah')

@section('content')
<div class="p-4 lg:p-6 space-y-6" x-data="{ search: '{{ request('search') }}', hari: '{{ request('hari') }}' }">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 animate-fadeIn">
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold">
                <span class="bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                    Jadwal Mata Kuliah
                </span>
            </h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Manajemen jadwal perkuliahan</p>
        </div>
        <div class="flex items-center gap-3">
            @if(auth()->user()->isAdmin())
            <a href="{{ route('jadwal.create') }}" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 text-white font-medium hover:from-blue-600 hover:to-purple-700 transition-all duration-200 shadow-lg shadow-blue-500/25 hover:shadow-xl hover:shadow-blue-500/30 transform hover:scale-[1.02] active:scale-[0.98] text-sm">
                <i class="fas fa-plus mr-2"></i>Tambah Jadwal
            </a>
            @endif
            <a href="{{ route('jadwal.pdf') }}" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-medium hover:from-emerald-600 hover:to-teal-700 transition-all duration-200 shadow-lg shadow-emerald-500/25 hover:shadow-xl text-sm">
                <i class="fas fa-file-pdf mr-2"></i>PDF
            </a>
            <a href="{{ route('jadwal.print') }}" target="_blank" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-orange-500 to-red-600 text-white font-medium hover:from-orange-600 hover:to-red-700 transition-all duration-200 shadow-lg shadow-orange-500/25 hover:shadow-xl text-sm">
                <i class="fas fa-print mr-2"></i>Print
            </a>
        </div>
    </div>

    <div class="rounded-2xl backdrop-blur-xl bg-white/60 dark:bg-gray-800/40 border border-gray-200/50 dark:border-gray-700/50 overflow-hidden animate-slideUp">
        <div class="p-4 border-b border-gray-200/50 dark:border-gray-700/50">
            <form method="GET" action="{{ route('jadwal.index') }}" class="flex flex-col sm:flex-row gap-3">
                <div class="relative flex-1">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" name="search" x-model="search" placeholder="Cari mata kuliah, kode, atau dosen..."
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200 text-sm">
                </div>
                <div class="relative">
                    <i class="fas fa-filter absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <select name="hari" x-model="hari" class="pl-10 pr-8 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200 text-sm appearance-none">
                        <option value="">Semua Hari</option>
                        @foreach($hariList as $h)
                        <option value="{{ $h }}">{{ $h }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 text-white font-medium hover:from-blue-600 hover:to-purple-700 transition-all duration-200 text-sm">
                    <i class="fas fa-search mr-2"></i>Filter
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50/50 dark:bg-gray-800/50">
                        <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-400">Kode</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-400">Mata Kuliah</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-400">Kelas</th>
                        <th class="px-4 py-3 text-center font-semibold text-gray-600 dark:text-gray-400">SKS</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-400">Hari</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-400">Jam</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-400">Dosen</th>
                        <th class="px-4 py-3 text-center font-semibold text-gray-600 dark:text-gray-400">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @forelse($jadwals as $j)
                    <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-800/30 transition-colors duration-200 group">
                        <td class="px-4 py-3">
                            <span class="text-xs font-mono px-2 py-1 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400">{{ $j->kode_matkul }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-medium text-gray-800 dark:text-gray-200 group-hover:text-blue-500 dark:group-hover:text-blue-400 transition-colors">{{ $j->nama_matkul }}</p>
                        </td>
                        <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $j->kelas }}</td>
                        <td class="px-4 py-3 text-center">
                            <span class="px-2 py-1 rounded-lg bg-purple-50 dark:bg-purple-900/20 text-purple-600 dark:text-purple-400 font-medium text-xs">{{ $j->sks }}</span>
                        </td>
                        <td class="px-4 py-3">
                            @php
                            $warna = ['Senin' => 'blue', 'Selasa' => 'purple', 'Rabu' => 'emerald', 'Kamis' => 'orange', 'Jumat' => 'pink', 'Sabtu' => 'teal', 'Minggu' => 'red'];
                            $w = $warna[$j->hari] ?? 'gray';
                            @endphp
                            <span class="px-2 py-1 rounded-lg bg-{{ $w }}-50 dark:bg-{{ $w }}-900/20 text-{{ $w }}-600 dark:text-{{ $w }}-400 text-xs font-medium">{{ $j->hari }}</span>
                        </td>
                        <td class="px-4 py-3 text-gray-600 dark:text-gray-400 font-mono text-xs">{{ date('H:i', strtotime($j->jam_mulai)) }} - {{ date('H:i', strtotime($j->jam_selesai)) }}</td>
                        <td class="px-4 py-3 text-gray-600 dark:text-gray-400 text-xs">{{ $j->dosen }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('jadwal.show', $j) }}" class="p-2 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-900/40 transition-all" title="Detail">
                                    <i class="fas fa-eye text-xs"></i>
                                </a>
                                @if(auth()->user()->isAdmin())
                                <a href="{{ route('jadwal.edit', $j) }}" class="p-2 rounded-lg bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-900/40 transition-all" title="Edit">
                                    <i class="fas fa-edit text-xs"></i>
                                </a>
                                <form method="POST" action="{{ route('jadwal.destroy', $j) }}" onsubmit="return confirm('Yakin hapus jadwal {{ $j->nama_matkul }}?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/40 transition-all" title="Hapus">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-10 text-center text-gray-400">
                            <i class="fas fa-inbox text-4xl mb-3 opacity-50"></i>
                            <p class="font-medium">Tidak ada jadwal</p>
                            @if(auth()->user()->isAdmin())
                            <a href="{{ route('jadwal.create') }}" class="text-blue-500 hover:text-blue-400 text-sm mt-1 inline-block">Tambahkan jadwal baru</a>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($jadwals->hasPages())
        <div class="p-4 border-t border-gray-200/50 dark:border-gray-700/50">
            {{ $jadwals->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

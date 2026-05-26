@extends('layouts.app')

@section('title', 'Tambah Jadwal')

@section('content')
<div class="p-4 lg:p-6 max-w-3xl mx-auto animate-fadeIn">
    <div class="mb-6">
        <a href="{{ route('jadwal.index') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
        <h1 class="text-2xl font-bold mt-2">
            <span class="bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">Tambah Jadwal Baru</span>
        </h1>
    </div>

    <div class="rounded-2xl backdrop-blur-xl bg-white/60 dark:bg-gray-800/40 border border-gray-200/50 dark:border-gray-700/50 p-6 animate-slideUp">
        <form method="POST" action="{{ route('jadwal.store') }}" x-data="{ sks: 2 }">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kode Mata Kuliah</label>
                    <input type="text" name="kode_matkul" value="{{ old('kode_matkul') }}" required
                        class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200"
                        placeholder="Contoh: 2406022110">
                    @error('kode_matkul') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Mata Kuliah</label>
                    <input type="text" name="nama_matkul" value="{{ old('nama_matkul') }}" required
                        class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200"
                        placeholder="Nama mata kuliah">
                    @error('nama_matkul') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kelas</label>
                    <input type="text" name="kelas" value="{{ old('kelas') }}" required
                        class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200"
                        placeholder="Contoh: A-PG">
                    @error('kelas') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">SKS</label>
                    <input type="number" name="sks" x-model="sks" min="1" max="6" value="{{ old('sks', 2) }}" required
                        class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200">
                    @error('sks') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Hari</label>
                    <select name="hari" required
                        class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200">
                        <option value="">Pilih Hari</option>
                        @foreach($hariList as $h)
                        <option value="{{ $h }}" {{ old('hari') == $h ? 'selected' : '' }}>{{ $h }}</option>
                        @endforeach
                    </select>
                    @error('hari') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Dosen</label>
                    <input type="text" name="dosen" value="{{ old('dosen') }}" required
                        class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200"
                        placeholder="Nama dosen">
                    @error('dosen') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jam Mulai</label>
                    <input type="time" name="jam_mulai" value="{{ old('jam_mulai') }}" required
                        class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200">
                    @error('jam_mulai') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jam Selesai</label>
                    <input type="time" name="jam_selesai" value="{{ old('jam_selesai') }}" required
                        class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200">
                    @error('jam_selesai') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Keterangan (opsional)</label>
                <textarea name="keterangan" rows="3"
                    class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200"
                    placeholder="Catatan tambahan">{{ old('keterangan') }}</textarea>
                @error('keterangan') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-3 mt-6">
                <button type="submit" class="px-6 py-3 rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 text-white font-medium hover:from-blue-600 hover:to-purple-700 transition-all duration-200 shadow-lg shadow-blue-500/25 hover:shadow-xl transform hover:scale-[1.02] active:scale-[0.98]">
                    <i class="fas fa-save mr-2"></i>Simpan Jadwal
                </button>
                <a href="{{ route('jadwal.index') }}" class="px-6 py-3 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-medium hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-200">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

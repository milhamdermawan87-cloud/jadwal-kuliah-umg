@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="p-4 lg:p-6 max-w-3xl mx-auto animate-fadeIn">
    <div class="mb-6">
        <a href="{{ route('profile.index') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
        <h1 class="text-2xl font-bold mt-2">
            <span class="bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">Edit Profil</span>
        </h1>
    </div>

    <div class="rounded-2xl backdrop-blur-xl bg-white/60 dark:bg-gray-800/40 border border-gray-200/50 dark:border-gray-700/50 p-6 animate-slideUp">
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" x-data="{ showPassword: false }">
            @csrf @method('PUT')

            <div class="flex flex-col items-center mb-6">
                <div class="relative w-32 h-32 mb-3">
                    <div class="w-32 h-32 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white text-5xl font-bold shadow-xl overflow-hidden">
                        @if(auth()->user()->photo)
                        <img src="{{ Storage::url(auth()->user()->photo) }}" alt="" class="w-full h-full object-cover" id="preview">
                        @else
                        <span id="preview-text">{{ substr(auth()->user()->name, 0, 1) }}</span>
                        <img src="" alt="" class="w-full h-full object-cover hidden" id="preview">
                        @endif
                    </div>
                    <label for="photo" class="absolute bottom-0 right-0 w-8 h-8 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center cursor-pointer shadow-lg hover:scale-110 transition-transform">
                        <i class="fas fa-camera text-white text-xs"></i>
                    </label>
                </div>
                <input type="file" name="photo" id="photo" accept="image/*" class="hidden" @change="document.getElementById('preview').src = URL.createObjectURL($event.target.files[0]); document.getElementById('preview').classList.remove('hidden'); document.getElementById('preview-text')?.classList.add('hidden')">
                @error('photo') <p class="text-red-400 text-xs">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required
                        class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">NIM</label>
                    <input type="text" name="nim" value="{{ old('nim', auth()->user()->nim) }}" required
                        class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    @error('nim') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required
                        class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    @error('email') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-6 pt-6 border-t border-gray-200/50 dark:border-gray-700/50">
                <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-4">Ubah Password (Opsional)</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password Saat Ini</label>
                        <input type="password" name="current_password"
                            class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                        @error('current_password') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password Baru</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                        @error('password') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation"
                            class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 mt-6">
                <button type="submit" class="px-6 py-3 rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 text-white font-medium hover:from-blue-600 hover:to-purple-700 transition-all duration-200 shadow-lg shadow-blue-500/25 hover:shadow-xl transform hover:scale-[1.02] active:scale-[0.98]">
                    <i class="fas fa-save mr-2"></i>Simpan Perubahan
                </button>
                <a href="{{ route('profile.index') }}" class="px-6 py-3 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-medium hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-200">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

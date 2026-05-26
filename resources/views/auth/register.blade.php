@extends('layouts.guest')

@section('title', 'Register')

@section('guest-content')
<div x-data="{ loading: false }">
    <h2 class="text-xl font-semibold mb-1">Daftar Akun</h2>
    <p class="text-sm text-gray-400 mb-6">Buat akun mahasiswa baru</p>

    <form method="POST" action="{{ route('register') }}" @submit="loading = true">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-2">Nama Lengkap</label>
            <div class="relative">
                <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full pl-10 pr-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200"
                    placeholder="Nama lengkap">
            </div>
            @error('name')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-2">NIM</label>
            <div class="relative">
                <i class="fas fa-id-card absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="nim" value="{{ old('nim') }}" required
                    class="w-full pl-10 pr-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200"
                    placeholder="Nomor Induk Mahasiswa">
            </div>
            @error('nim')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-2">Email</label>
            <div class="relative">
                <i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full pl-10 pr-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200"
                    placeholder="email@example.com">
            </div>
            @error('email')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-2">Password</label>
            <div class="relative">
                <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="password" name="password" required
                    class="w-full pl-10 pr-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200"
                    placeholder="Minimal 8 karakter">
            </div>
            @error('password')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-300 mb-2">Konfirmasi Password</label>
            <div class="relative">
                <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="password" name="password_confirmation" required
                    class="w-full pl-10 pr-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200"
                    placeholder="Ulangi password">
            </div>
        </div>

        <button type="submit" x-show="!loading"
            class="w-full py-3 rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold hover:from-blue-600 hover:to-purple-700 transition-all duration-200 shadow-lg shadow-blue-500/25 hover:shadow-xl hover:shadow-blue-500/30 transform hover:scale-[1.02] active:scale-[0.98]">
            <i class="fas fa-user-plus mr-2"></i> Daftar
        </button>
        <button type="button" x-show="loading"
            class="w-full py-3 rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold cursor-not-allowed">
            <i class="fas fa-spinner fa-spin mr-2"></i> Memproses...
        </button>
    </form>

    <p class="text-center text-sm text-gray-400 mt-6">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 font-medium transition-colors">Login</a>
    </p>
</div>
@endsection

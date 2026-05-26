@extends('layouts.guest')

@section('title', 'Login')

@section('guest-content')
<div x-data="{ loading: false }">
    <h2 class="text-xl font-semibold mb-1">Selamat Datang</h2>
    <p class="text-sm text-gray-400 mb-6">Silakan login untuk melanjutkan</p>

    <form method="POST" action="{{ route('login') }}" @submit="loading = true">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-2">Email</label>
            <div class="relative">
                <i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full pl-10 pr-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200"
                    placeholder="Masukkan email">
            </div>
            @error('email')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-300 mb-2">Password</label>
            <div class="relative">
                <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="password" name="password" required
                    class="w-full pl-10 pr-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200"
                    placeholder="Masukkan password">
            </div>
        </div>

        <div class="flex items-center justify-between mb-6">
            <label class="flex items-center gap-2 text-sm text-gray-400">
                <input type="checkbox" name="remember" class="rounded bg-white/5 border-white/10 text-blue-500 focus:ring-blue-500">
                Ingat saya
            </label>
        </div>

        <button type="submit" x-show="!loading"
            class="w-full py-3 rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold hover:from-blue-600 hover:to-purple-700 transition-all duration-200 shadow-lg shadow-blue-500/25 hover:shadow-xl hover:shadow-blue-500/30 transform hover:scale-[1.02] active:scale-[0.98]">
            <i class="fas fa-sign-in-alt mr-2"></i> Login
        </button>
        <button type="button" x-show="loading"
            class="w-full py-3 rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold cursor-not-allowed">
            <i class="fas fa-spinner fa-spin mr-2"></i> Memproses...
        </button>
    </form>

    <p class="text-center text-sm text-gray-400 mt-6">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 font-medium transition-colors">Daftar</a>
    </p>

    <div class="mt-6 pt-4 border-t border-white/5">
        <p class="text-xs text-gray-500 text-center">Dummy Akun:<br>
        <span class="font-mono">Admin: admin@umg.ac.id / password<br>
        Mahasiswa: mahasiswa@umg.ac.id / password</span></p>
    </div>
</div>
@endsection

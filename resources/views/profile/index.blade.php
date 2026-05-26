@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="p-4 lg:p-6 max-w-4xl mx-auto space-y-6 animate-fadeIn">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold">
                <span class="bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">Profil Saya</span>
            </h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Informasi dan pengaturan akun</p>
        </div>
        <a href="{{ route('profile.edit') }}" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 text-white font-medium hover:from-blue-600 hover:to-purple-700 transition-all duration-200 shadow-lg shadow-blue-500/25 text-sm">
            <i class="fas fa-edit mr-2"></i>Edit Profil
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 animate-slideUp">
        <div class="lg:col-span-1">
            <div class="rounded-2xl backdrop-blur-xl bg-white/60 dark:bg-gray-800/40 border border-gray-200/50 dark:border-gray-700/50 p-6 text-center">
                <div class="w-32 h-32 mx-auto rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white text-5xl font-bold shadow-2xl shadow-blue-500/25 mb-4 overflow-hidden">
                    @if($user->photo)
                    <img src="{{ Storage::url($user->photo) }}" alt="" class="w-full h-full object-cover">
                    @else
                    {{ substr($user->name, 0, 1) }}
                    @endif
                </div>
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">{{ $user->name }}</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                <div class="mt-4">
                    <span class="px-4 py-1.5 rounded-full text-xs font-medium {{ $user->isAdmin() ? 'bg-purple-50 dark:bg-purple-900/20 text-purple-600 dark:text-purple-400' : 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400' }}">
                        <i class="fas {{ $user->isAdmin() ? 'fa-shield-alt' : 'fa-user-graduate' }} mr-1"></i>
                        {{ $user->isAdmin() ? 'Admin' : 'Mahasiswa' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2">
            <div class="rounded-2xl backdrop-blur-xl bg-white/60 dark:bg-gray-800/40 border border-gray-200/50 dark:border-gray-700/50 p-6">
                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4">
                    <i class="fas fa-info-circle text-blue-500 mr-2"></i>Informasi Akun
                </h3>

                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 rounded-xl bg-gray-50 dark:bg-gray-800/60">
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Nama Lengkap</p>
                            <p class="font-medium text-gray-800 dark:text-gray-200">{{ $user->name }}</p>
                        </div>
                        <i class="fas fa-user text-gray-400"></i>
                    </div>

                    <div class="flex items-center justify-between p-4 rounded-xl bg-gray-50 dark:bg-gray-800/60">
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">NIM</p>
                            <p class="font-medium text-gray-800 dark:text-gray-200">{{ $user->nim ?? '-' }}</p>
                        </div>
                        <i class="fas fa-id-card text-gray-400"></i>
                    </div>

                    <div class="flex items-center justify-between p-4 rounded-xl bg-gray-50 dark:bg-gray-800/60">
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Email</p>
                            <p class="font-medium text-gray-800 dark:text-gray-200">{{ $user->email }}</p>
                        </div>
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>

                    <div class="flex items-center justify-between p-4 rounded-xl bg-gray-50 dark:bg-gray-800/60">
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Role</p>
                            <p class="font-medium text-gray-800 dark:text-gray-200">{{ $user->isAdmin() ? 'Administrator' : 'Mahasiswa' }}</p>
                        </div>
                        <i class="fas {{ $user->isAdmin() ? 'fa-shield-alt' : 'fa-user-graduate' }} text-gray-400"></i>
                    </div>

                    <div class="flex items-center justify-between p-4 rounded-xl bg-gray-50 dark:bg-gray-800/60">
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Bergabung Sejak</p>
                            <p class="font-medium text-gray-800 dark:text-gray-200">{{ $user->created_at->format('d F Y') }}</p>
                        </div>
                        <i class="fas fa-calendar text-gray-400"></i>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl backdrop-blur-xl bg-white/60 dark:bg-gray-800/40 border border-gray-200/50 dark:border-gray-700/50 p-6 mt-6">
                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4">
                    <i class="fas fa-qrcode text-purple-500 mr-2"></i>QR Code Profile
                </h3>
                <div class="flex justify-center">
                    <div class="p-4 rounded-xl bg-white dark:bg-gray-900">
                        {!! QrCode::size(200)->generate(url('/') . '/profile/' . $user->id) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

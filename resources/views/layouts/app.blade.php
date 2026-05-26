<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true', sidebarOpen: true, mobileMenuOpen: false }" x-init="darkMode ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark'); $watch('darkMode', val => { localStorage.setItem('darkMode', val); val ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark') })">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Jadwal Mata Kuliah') - UMG</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>📚</text></svg>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 transition-colors duration-300 antialiased">
    <div class="relative min-h-screen overflow-hidden">
        <div class="fixed inset-0 -z-10">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-purple-50 dark:from-gray-950 dark:via-gray-900 dark:to-indigo-950"></div>
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-gradient-to-br from-blue-400/20 to-purple-400/20 dark:from-blue-600/10 dark:to-purple-600/10 rounded-full blur-3xl animate-blob"></div>
            <div class="absolute top-[30%] right-[-10%] w-[35%] h-[35%] bg-gradient-to-br from-teal-400/20 to-cyan-400/20 dark:from-teal-600/10 dark:to-cyan-600/10 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-[-10%] left-[20%] w-[45%] h-[45%] bg-gradient-to-br from-pink-400/20 to-orange-400/20 dark:from-pink-600/10 dark:to-orange-600/10 rounded-full blur-3xl animate-blob animation-delay-4000"></div>
            <div id="particles-js" class="absolute inset-0"></div>
        </div>

        <div class="flex">
            @auth
            <aside x-show="sidebarOpen" x-cloak class="fixed lg:relative inset-y-0 left-0 z-30 w-72 min-h-screen backdrop-blur-xl bg-white/70 dark:bg-gray-900/70 border-r border-gray-200/50 dark:border-gray-700/50 shadow-2xl dark:shadow-gray-900/50 transform transition-all duration-300 ease-in-out lg:translate-x-0" :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">
                <div class="flex flex-col h-full">
                    <div class="flex items-center gap-3 p-6 border-b border-gray-200/50 dark:border-gray-700/50">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center shadow-lg shadow-blue-500/25">
                            <i class="fas fa-calendar-alt text-white text-lg"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400 bg-clip-text text-transparent">Jadwal Kuliah</h2>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Universitas Muhammadiyah Gresik</p>
                        </div>
                    </div>

                    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-blue-500/10 to-purple-500/10 text-blue-600 dark:text-blue-400 shadow-sm' : 'hover:bg-gray-100/50 dark:hover:bg-gray-800/50 text-gray-600 dark:text-gray-400' }}">
                            <i class="fas fa-th-large w-5 text-center {{ request()->routeIs('dashboard') ? 'text-blue-500' : '' }}"></i>
                            <span class="font-medium">Dashboard</span>
                        </a>

                        <a href="{{ route('jadwal.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('jadwal.*') ? 'bg-gradient-to-r from-blue-500/10 to-purple-500/10 text-blue-600 dark:text-blue-400 shadow-sm' : 'hover:bg-gray-100/50 dark:hover:bg-gray-800/50 text-gray-600 dark:text-gray-400' }}">
                            <i class="fas fa-book-open w-5 text-center {{ request()->routeIs('jadwal.*') ? 'text-blue-500' : '' }}"></i>
                            <span class="font-medium">Jadwal Kuliah</span>
                        </a>

                        @if(auth()->user()->isAdmin())
                        <a href="{{ route('jadwal.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('jadwal.create') ? 'bg-gradient-to-r from-blue-500/10 to-purple-500/10 text-blue-600 dark:text-blue-400 shadow-sm' : 'hover:bg-gray-100/50 dark:hover:bg-gray-800/50 text-gray-600 dark:text-gray-400' }}">
                            <i class="fas fa-plus-circle w-5 text-center"></i>
                            <span class="font-medium">Tambah Jadwal</span>
                        </a>
                        @endif

                        <a href="{{ route('profile.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('profile.*') ? 'bg-gradient-to-r from-blue-500/10 to-purple-500/10 text-blue-600 dark:text-blue-400 shadow-sm' : 'hover:bg-gray-100/50 dark:hover:bg-gray-800/50 text-gray-600 dark:text-gray-400' }}">
                            <i class="fas fa-user w-5 text-center"></i>
                            <span class="font-medium">Profil Saya</span>
                        </a>
                    </nav>

                    <div class="p-4 border-t border-gray-200/50 dark:border-gray-700/50">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center gap-3 w-full px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-all duration-200 group">
                                <i class="fas fa-sign-out-alt w-5 text-center"></i>
                                <span class="font-medium">Keluar</span>
                            </button>
                        </form>
                    </div>
                </div>
            </aside>

            <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false" class="fixed inset-0 z-20 bg-black/30 backdrop-blur-sm lg:hidden"></div>
            @endauth

            <div class="flex-1 flex flex-col min-h-screen">
                @auth
                <header class="sticky top-0 z-10 backdrop-blur-xl bg-white/70 dark:bg-gray-900/70 border-b border-gray-200/50 dark:border-gray-700/50">
                    <div class="flex items-center justify-between px-4 lg:px-6 h-16">
                        <div class="flex items-center gap-4">
                            <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-200">
                                <i class="fas fa-bars text-xl text-gray-600 dark:text-gray-400"></i>
                            </button>
                            <div class="hidden sm:block text-sm text-gray-500 dark:text-gray-400" x-data="{ time: new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' }) }" x-init="setInterval(() => time = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' }), 1000)">
                                <i class="far fa-clock mr-2"></i>
                                <span x-text="time"></span>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <button @click="darkMode = !darkMode" class="p-2.5 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-200" :title="darkMode ? 'Mode Terang' : 'Mode Gelap'">
                                <i :class="darkMode ? 'fas fa-sun text-yellow-400' : 'fas fa-moon text-gray-600'" class="text-lg"></i>
                            </button>
                            <a href="{{ route('profile.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-200">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white text-sm font-bold shadow-lg shadow-blue-500/25">
                                    @if(auth()->user()->photo)
                                    <img src="{{ Storage::url(auth()->user()->photo) }}" alt="" class="w-full h-full rounded-full object-cover">
                                    @else
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                    @endif
                                </div>
                                <span class="hidden sm:block text-sm font-medium text-gray-700 dark:text-gray-300">{{ auth()->user()->name }}</span>
                            </a>
                        </div>
                    </div>
                </header>
                @endauth

                <main class="flex-1">
                    @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" class="mx-4 mt-4 p-4 rounded-xl bg-gradient-to-r from-green-500/10 to-emerald-500/10 border border-green-500/20 text-green-700 dark:text-green-400 backdrop-blur-sm">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">{{ session('success') }}</span>
                            <button @click="show = false" class="ml-auto text-green-500 hover:text-green-700">&times;</button>
                        </div>
                    </div>
                    @endif

                    @yield('content')
                </main>

                @auth
                <nav class="lg:hidden fixed bottom-0 left-0 right-0 z-20 backdrop-blur-xl bg-white/80 dark:bg-gray-900/80 border-t border-gray-200/50 dark:border-gray-700/50 safe-area-bottom">
                    <div class="flex items-center justify-around py-2 px-2">
                        <a href="{{ route('dashboard') }}" class="flex flex-col items-center gap-1 px-3 py-2 rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'text-blue-500' : 'text-gray-400' }}">
                            <i class="fas fa-th-large text-lg"></i>
                            <span class="text-[10px] font-medium">Dashboard</span>
                        </a>
                        <a href="{{ route('jadwal.index') }}" class="flex flex-col items-center gap-1 px-3 py-2 rounded-xl transition-all duration-200 {{ request()->routeIs('jadwal.*') ? 'text-blue-500' : 'text-gray-400' }}">
                            <i class="fas fa-book-open text-lg"></i>
                            <span class="text-[10px] font-medium">Jadwal</span>
                        </a>
                        <a href="{{ route('profile.index') }}" class="flex flex-col items-center gap-1 px-3 py-2 rounded-xl transition-all duration-200 {{ request()->routeIs('profile.*') ? 'text-blue-500' : 'text-gray-400' }}">
                            <i class="fas fa-user text-lg"></i>
                            <span class="text-[10px] font-medium">Profil</span>
                        </a>
                    </div>
                </nav>
                <div class="h-16 lg:hidden"></div>
                @endauth
            </div>
        </div>
    </div>

    @stack('scripts')
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Jadwal Mata Kuliah') - UMG</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>📚</text></svg>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-950 text-white antialiased">
    <div class="relative min-h-screen overflow-hidden flex items-center justify-center">
        <div class="fixed inset-0 -z-10">
            <div class="absolute inset-0 bg-gradient-to-br from-gray-950 via-indigo-950 to-gray-950"></div>
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-gradient-to-br from-blue-600/20 to-purple-600/20 rounded-full blur-3xl animate-blob"></div>
            <div class="absolute top-[30%] right-[-10%] w-[35%] h-[35%] bg-gradient-to-br from-teal-600/20 to-cyan-600/20 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-[-10%] left-[20%] w-[45%] h-[45%] bg-gradient-to-br from-pink-600/20 to-orange-600/20 rounded-full blur-3xl animate-blob animation-delay-4000"></div>
            <div id="particles-js" class="absolute inset-0"></div>
        </div>

        <div class="w-full max-w-md px-4">
            <div class="text-center mb-8">
                <div class="w-20 h-20 mx-auto mb-4 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center shadow-2xl shadow-blue-500/25 animate-float">
                    <i class="fas fa-calendar-alt text-3xl text-white"></i>
                </div>
                <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">Jadwal Mata Kuliah</h1>
                <p class="text-sm text-gray-400 mt-1">Universitas Muhammadiyah Gresik</p>
            </div>

            <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-6 shadow-2xl">
                @yield('guest-content')
            </div>
        </div>
    </div>
    @stack('scripts')
</body>
</html>

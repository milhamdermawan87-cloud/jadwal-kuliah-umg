@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="p-4 lg:p-6 space-y-6" x-data="dashboardApp()" x-init="init()">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 animate-fadeIn">
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold">
                <span class="bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                    Halo, {{ auth()->user()->name }}!
                </span>
            </h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1" x-text="greeting"></p>
        </div>
        <div class="flex items-center gap-3">
            <div class="px-4 py-2 rounded-xl backdrop-blur-xl bg-white/50 dark:bg-gray-800/50 border border-gray-200/50 dark:border-gray-700/50">
                <div class="text-xs text-gray-500 dark:text-gray-400">Waktu</div>
                <div class="text-lg font-bold text-gray-800 dark:text-gray-200 font-mono" x-text="currentTime"></div>
            </div>
            <div class="px-4 py-2 rounded-xl backdrop-blur-xl bg-white/50 dark:bg-gray-800/50 border border-gray-200/50 dark:border-gray-700/50">
                <div class="text-xs text-gray-500 dark:text-gray-400">Tanggal</div>
                <div class="text-sm font-bold text-gray-800 dark:text-gray-200" x-text="currentDate"></div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 animate-slideUp">
        <div class="group relative p-5 rounded-2xl backdrop-blur-xl bg-white/60 dark:bg-gray-800/40 border border-gray-200/50 dark:border-gray-700/50 hover:shadow-xl hover:shadow-blue-500/10 dark:hover:shadow-blue-500/5 transition-all duration-500 hover:-translate-y-1 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-lg shadow-blue-500/25 mb-3 group-hover:scale-110 transition-transform duration-500">
                    <i class="fas fa-book text-white text-lg"></i>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Total Mata Kuliah</p>
                <p class="text-3xl font-bold text-gray-800 dark:text-gray-200 mt-1">{{ $totalMatkul }}</p>
                <div class="mt-2 h-1.5 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden">
                    <div class="h-full rounded-full bg-gradient-to-r from-blue-500 to-blue-600 transition-all duration-1000" :style="'width: ' + Math.min(100, ({{ $totalMatkul }} / 10) * 100) + '%'"></div>
                </div>
            </div>
        </div>

        <div class="group relative p-5 rounded-2xl backdrop-blur-xl bg-white/60 dark:bg-gray-800/40 border border-gray-200/50 dark:border-gray-700/50 hover:shadow-xl hover:shadow-purple-500/10 dark:hover:shadow-purple-500/5 transition-all duration-500 hover:-translate-y-1 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center shadow-lg shadow-purple-500/25 mb-3 group-hover:scale-110 transition-transform duration-500">
                    <i class="fas fa-graduation-cap text-white text-lg"></i>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Total SKS</p>
                <p class="text-3xl font-bold text-gray-800 dark:text-gray-200 mt-1">{{ $totalSKS }} <span class="text-sm font-normal text-gray-400">/ 20</span></p>
                <div class="mt-2 h-1.5 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden">
                    <div class="h-full rounded-full bg-gradient-to-r from-purple-500 to-purple-600 transition-all duration-1000" :style="'width: ' + Math.min(100, ({{ $totalSKS }} / 20) * 100) + '%'"></div>
                </div>
            </div>
        </div>

        <div class="group relative p-5 rounded-2xl backdrop-blur-xl bg-white/60 dark:bg-gray-800/40 border border-gray-200/50 dark:border-gray-700/50 hover:shadow-xl hover:shadow-emerald-500/10 dark:hover:shadow-emerald-500/5 transition-all duration-500 hover:-translate-y-1 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center shadow-lg shadow-emerald-500/25 mb-3 group-hover:scale-110 transition-transform duration-500">
                    <i class="fas fa-calendar-day text-white text-lg"></i>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Jadwal Hari Ini</p>
                <p class="text-3xl font-bold text-gray-800 dark:text-gray-200 mt-1">{{ $hariIniCount }}</p>
                <p class="text-xs text-gray-400 mt-1">{{ count($jadwalHariIni) > 0 ? 'Ada jadwal hari ini' : 'Tidak ada jadwal' }}</p>
            </div>
        </div>

        <div class="group relative p-5 rounded-2xl backdrop-blur-xl bg-white/60 dark:bg-gray-800/40 border border-gray-200/50 dark:border-gray-700/50 hover:shadow-xl hover:shadow-rose-500/10 dark:hover:shadow-rose-500/5 transition-all duration-500 hover:-translate-y-1 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-rose-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-rose-500 to-rose-600 flex items-center justify-center shadow-lg shadow-rose-500/25 mb-3 group-hover:scale-110 transition-transform duration-500">
                    <i class="fas fa-clock text-white text-lg"></i>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Kelas Selanjutnya</p>
                @php $nextClassData = $nextClass ? ['nama_matkul' => $nextClass->nama_matkul, 'jam_mulai' => date('H:i', strtotime($nextClass->jam_mulai)), 'jam_selesai' => date('H:i', strtotime($nextClass->jam_selesai))] : null; @endphp
                <div class="mt-1" x-data="countdownApp(@json($nextClassData))">
                    <template x-if="nextClass">
                        <div>
                            <p class="text-lg font-bold text-gray-800 dark:text-gray-200" x-text="nextClass.nama_matkul"></p>
                            <p class="text-sm text-gray-500 dark:text-gray-400" x-text="nextClass.jam_mulai + ' - ' + nextClass.jam_selesai"></p>
                            <p class="text-xs font-mono text-rose-500 mt-1" x-text="countdown"></p>
                        </div>
                    </template>
                    <template x-if="!nextClass">
                        <p class="text-lg font-bold text-gray-800 dark:text-gray-200">Tidak ada</p>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 animate-slideUp">
        <div class="rounded-2xl backdrop-blur-xl bg-white/60 dark:bg-gray-800/40 border border-gray-200/50 dark:border-gray-700/50 p-5">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                    <i class="fas fa-calendar-day text-blue-500 mr-2"></i>Jadwal Hari Ini
                </h3>
                <span class="text-xs px-3 py-1 rounded-full bg-gradient-to-r from-blue-500/10 to-purple-500/10 text-blue-600 dark:text-blue-400 font-medium" x-text="hariIni"></span>
            </div>

            @if($jadwalHariIni->count() > 0)
            <div class="space-y-3">
                @foreach($jadwalHariIni as $j)
                <div class="group p-4 rounded-xl bg-gray-50 dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/30 hover:border-blue-200 dark:hover:border-blue-800 transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/5">
                    <div class="flex items-start gap-3">
                        <div class="w-2 h-full min-h-[3rem] rounded-full bg-gradient-to-b from-blue-500 to-purple-600 mt-1"></div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-gradient-to-r from-blue-500/10 to-purple-500/10 text-blue-600 dark:text-blue-400">{{ $j->kode_matkul }}</span>
                                <span class="text-xs text-gray-400">{{ $j->kelas }}</span>
                            </div>
                            <p class="font-semibold text-gray-800 dark:text-gray-200 mt-1 group-hover:text-blue-500 dark:group-hover:text-blue-400 transition-colors">{{ $j->nama_matkul }}</p>
                            <div class="flex flex-wrap items-center gap-3 mt-2 text-xs text-gray-500 dark:text-gray-400">
                                <span><i class="far fa-clock mr-1"></i>{{ date('H:i', strtotime($j->jam_mulai)) }} - {{ date('H:i', strtotime($j->jam_selesai)) }}</span>
                                <span><i class="fas fa-user mr-1"></i>{{ $j->dosen }}</span>
                                <span><i class="fas fa-layer-group mr-1"></i>{{ $j->sks }} SKS</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="flex flex-col items-center justify-center py-10 text-gray-400">
                <i class="fas fa-calendar-check text-5xl mb-3 opacity-50"></i>
                <p class="font-medium">Tidak ada jadwal hari ini</p>
                <p class="text-sm">Selamat beristirahat!</p>
            </div>
            @endif
        </div>

        <div class="rounded-2xl backdrop-blur-xl bg-white/60 dark:bg-gray-800/40 border border-gray-200/50 dark:border-gray-700/50 p-5">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                    <i class="fas fa-chart-pie text-purple-500 mr-2"></i>Progress SKS
                </h3>
            </div>

            <div class="relative pt-1">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm text-gray-500 dark:text-gray-400">SKS Saat Ini</span>
                    <span class="text-sm font-bold text-gray-800 dark:text-gray-200">{{ $totalSKS }} / 20 SKS</span>
                </div>
                <div class="h-4 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden">
                    <div class="h-full rounded-full bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 animate-pulse-slow" style="width: {{ min(100, ($totalSKS / 20) * 100) }}%"></div>
                </div>
                <div class="flex justify-between mt-1 text-xs text-gray-400">
                    <span>0 SKS</span>
                    <span>10 SKS</span>
                    <span>20 SKS</span>
                </div>
            </div>

            <div class="mt-6 space-y-3">
                <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300">Distribusi Hari</h4>
                @php
                    $hariIndo = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                    $warnaHari = ['from-blue-500 to-blue-600', 'from-purple-500 to-purple-600', 'from-emerald-500 to-emerald-600', 'from-orange-500 to-orange-600', 'from-pink-500 to-pink-600', 'from-teal-500 to-teal-600', 'from-red-500 to-red-600'];
                    $jadwalPerHari = \App\Models\Jadwal::selectRaw('hari, count(*) as total, sum(sks) as total_sks')->groupBy('hari')->get()->keyBy('hari');
                @endphp
                @foreach($hariIndo as $i => $hari)
                @php $data = $jadwalPerHari->get($hari); @endphp
                <div class="flex items-center gap-3">
                    <span class="w-16 text-xs font-medium text-gray-600 dark:text-gray-400">{{ $hari }}</span>
                    <div class="flex-1 h-2.5 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden">
                        <div class="h-full rounded-full bg-gradient-to-r {{ $warnaHari[$i] }} transition-all duration-1000"
                            style="width: {{ $data ? ($data->total_sks / 20) * 100 : 0 }}%"></div>
                    </div>
                    <span class="text-xs text-gray-500 w-16 text-right">{{ $data ? $data->total . ' MK / ' . $data->total_sks . ' SKS' : '0' }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function dashboardApp() {
    return {
        currentTime: '',
        currentDate: '',
        greeting: '',
        hariIni: '',
        init() {
            this.updateDateTime();
            setInterval(() => this.updateDateTime(), 1000);
            this.setGreeting();
            this.setHariIni();
        },
        updateDateTime() {
            const now = new Date();
            this.currentTime = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
            this.currentDate = now.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        },
        setGreeting() {
            const hour = new Date().getHours();
            if (hour < 12) this.greeting = 'Selamat pagi! Semangat belajar!';
            else if (hour < 15) this.greeting = 'Selamat siang! Tetap produktif!';
            else if (hour < 18) this.greeting = 'Selamat sore! Jangan lupa istirahat!';
            else this.greeting = 'Selamat malam! Selamat beristirahat!';
        },
        setHariIni() {
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            this.hariIni = days[new Date().getDay()];
        }
    }
}

function countdownApp(nextClassData) {
    return {
        nextClass: nextClassData,
        countdown: '',
        init() {
            if (this.nextClass) this.updateCountdown();
            setInterval(() => { if (this.nextClass) this.updateCountdown(); }, 1000);
        },
        updateCountdown() {
            const now = new Date();
            const [h, m] = this.nextClass.jam_mulai.split(':');
            const target = new Date();
            target.setHours(parseInt(h), parseInt(m), 0);
            if (target <= now) target.setDate(target.getDate() + 1);
            const diff = target - now;
            const hours = Math.floor(diff / 3600000);
            const mins = Math.floor((diff % 3600000) / 60000);
            const secs = Math.floor((diff % 60000) / 1000);
            this.countdown = `Dimulai dalam ${hours}j ${mins}m ${secs}d`;
        }
    }
}
</script>
@endpush
@endsection

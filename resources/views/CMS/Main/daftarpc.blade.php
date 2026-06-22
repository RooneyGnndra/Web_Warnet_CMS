@extends('layouts.app')

@section('content')
<main class="flex-grow w-full max-w-container-max mx-auto px-gutter py-md md:py-xl">
    <header class="mb-lg flex flex-col md:flex-row justify-between items-start md:items-end gap-sm border-b border-outline-variant pb-sm">
        <div>
            <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary mb-xs">Fasilitas &amp; Daftar PC</h1>
            <p class="font-body-md text-body-md text-on-surface-variant">Jelajahi spesifikasi dan ketersediaan PC di lounge kami.</p>
        </div>
        
        <div class="flex gap-xs overflow-x-auto pb-2 w-full md:w-auto hide-scrollbar">
            <a href="{{ route('page') }}" class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md transition-all {{ !request('tier') ? 'bg-primary text-on-primary neon-glow-active' : 'border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary' }}">
                All Tiers
            </a>
            <a href="{{ route('page', ['tier' => 'bronze']) }}" class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md transition-all {{ request('tier') == 'bronze' ? 'bg-primary text-on-primary neon-glow-active' : 'border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary' }}">
                Bronze
            </a>
            <a href="{{ route('page', ['tier' => 'silver']) }}" class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md transition-all {{ request('tier') == 'silver' ? 'bg-primary text-on-primary neon-glow-active' : 'border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary' }}">
                Silver
            </a>
            <a href="{{ route('page', ['tier' => 'gold']) }}" class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md transition-all {{ request('tier') == 'gold' ? 'bg-primary text-on-primary neon-glow-active' : 'border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary' }}">
                Gold
            </a>
            <a href="{{ route('page', ['tier' => 'vip']) }}" class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md transition-all {{ request('tier') == 'vip' ? 'bg-secondary text-on-secondary shadow-[0_0_12px_rgba(220,184,255,0.4)] font-bold' : 'border border-outline-variant text-secondary hover:border-secondary hover:text-secondary' }}">
                VIP
            </a>
        </div>
    </header>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-md">
        
        @forelse($computers as $pc)
            @php
                // Mengubah objek baris Oracle menjadi array huruf kecil agar aman di-render
                $pcArray = (array) $pc;
                $statusPC = $pcArray['status'] ?? 'Offline';
                $tierPC = strtoupper($pcArray['tier'] ?? 'BRONZE');
            @endphp

            <article class="bg-surface-container-high rounded-xl overflow-hidden relative group transition-transform hover:-translate-y-1 
                {{ $tierPC == 'VIP' ? 'border-t border-secondary hover:shadow-[0_10px_20px_rgba(220,184,255,0.1)]' : '' }}
                {{ $tierPC == 'GOLD' ? 'border-t border-primary hover:shadow-[0_10px_20px_rgba(0,242,255,0.05)]' : '' }}
                {{ $tierPC == 'SILVER' ? 'border-t border-outline' : '' }}
                {{ $tierPC == 'BRONZE' ? 'border-t border-error' : '' }}
                {{ $statusPC == 'Maintenance' ? 'opacity-75' : '' }}">
                
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-primary/5 pointer-events-none"></div>
                
                <div class="p-sm">
                    <div class="flex justify-between items-start mb-sm">
                        <h2 class="font-headline-md text-headline-md text-on-surface">{{ $pcArray['id_komputer'] }}</h2>
                        
                        <span class="inline-flex items-center gap-1 px-2 py-1 rounded font-label-md text-label-md border
                            {{ $tierPC == 'VIP' ? 'bg-secondary/10 text-secondary border-secondary/30' : '' }}
                            {{ $tierPC == 'GOLD' ? 'bg-primary/10 text-primary border-primary/30' : '' }}
                            {{ $tierPC == 'SILVER' ? 'bg-surface-variant text-on-surface border-outline-variant' : '' }}
                            {{ $tierPC == 'BRONZE' ? 'bg-surface-variant text-on-surface border-outline-variant' : '' }}">
                            @if($tierPC == 'VIP')
                                <span class="material-symbols-outlined" style="font-size: 14px;">diamond</span>
                            @endif
                            {{ $pcArray['tier'] }}
                        </span>
                    </div>

                    <div class="mb-sm">
                        @if($statusPC == 'Online')
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-primary/20 text-primary font-label-md text-label-md border border-primary/30 neon-glow">
                                <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span> Available
                            </span>
                        @elseif($statusPC == 'Reserved')
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-surface-variant text-on-surface-variant font-label-md text-label-md border border-outline-variant">
                                <span class="material-symbols-outlined" style="font-size: 14px;">person</span> In Use
                            </span>
                        @elseif($statusPC == 'Maintenance')
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-error-container text-on-error-container font-label-md text-label-md border border-error/30">
                                <span class="material-symbols-outlined" style="font-size: 14px;">build</span> Maintenance
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-surface-variant text-on-surface-variant font-label-md text-label-md border border-outline-variant">
                                <span class="w-2 h-2 rounded-full bg-on-surface-variant"></span> Offline
                            </span>
                        @endif
                    </div>

                    <div class="space-y-xs mb-md border-t border-outline-variant pt-xs">
                        <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                            <span class="material-symbols-outlined text-outline">memory</span>
                            <span>{{ $pcArray['cpu'] ?? 'Spesifikasi CPU Belum Diatur' }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                            <span class="material-symbols-outlined text-outline">developer_board</span>
                            <span>{{ $pcArray['gpu'] ?? 'Spesifikasi GPU Belum Diatur' }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                            <span class="material-symbols-outlined text-outline">storage</span>
                            <span>{{ $pcArray['ram'] ?? 'Spesifikasi RAM Belum Diatur' }}</span>
                        </div>
                    </div>

                    <button class="w-full py-xs border rounded font-label-md text-label-md transition-colors
                        {{ $tierPC == 'VIP' ? 'border-secondary text-secondary hover:bg-secondary/10' : '' }}
                        {{ $tierPC == 'GOLD' ? 'border-primary text-primary hover:bg-primary/10' : '' }}
                        {{ $tierPC == 'SILVER' ? 'border-outline text-on-surface-variant hover:bg-surface-variant hover:text-on-surface' : '' }}
                        {{ $tierPC == 'BRONZE' ? 'border-outline text-on-surface-variant hover:bg-surface-variant hover:text-on-surface' : '' }}">
                        Lihat Detail
                    </button>
                </div>
            </article>

        @empty
            <div class="col-span-full flex flex-col items-center justify-center py-xl text-center">
                <span class="material-symbols-outlined text-[48px] text-on-surface-variant/30 mb-sm">computer</span>
                <p class="text-on-surface-variant font-body-md">Tidak ada unit komputer yang terdaftar untuk kategori ini.</p>
            </div>
        @endforelse

    </div>
</main>
@endsection
@extends('layouts.app')

@section('content')
<main class="flex-grow">
    <section class="px-gutter py-xl max-w-container-max mx-auto flex flex-col md:flex-row items-center gap-xl relative">
        <div class="w-full md:w-1/2 flex flex-col gap-md z-10">
            <h1 class="font-display-lg text-display-lg text-primary glow-text leading-tight">NetCity - Portal Informasi Layanan Warnet</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant">Informasi spesifikasi PC, katalog game, and promo warnet secara digital.</p>
            <div class="flex gap-sm mt-xs">
                <button class="bg-primary text-on-primary px-md py-xs rounded font-label-md text-label-md hover:bg-primary-container transition-colors glow-box uppercase">Lihat Daftar PC</button>
                <button class="border border-primary text-primary px-md py-xs rounded font-label-md text-label-md hover:bg-primary/10 transition-colors uppercase">Lihat Promo</button>
            </div>
        </div>
        <div class="w-full md:w-1/2 relative h-64 md:h-96 rounded-xl overflow-hidden glow-box border border-primary/30">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80')] bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');">
                <div class="absolute inset-0 bg-gradient-to-r from-background via-background/50 to-transparent"></div>
            </div>
        </div>
    </section>

    <section class="px-gutter py-md max-w-container-max mx-auto">
        <div class="bg-surface-container rounded-xl p-md flex flex-col md:flex-row justify-between items-center border border-outline-variant gap-md">
            <div class="flex items-center gap-sm">
                <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">computer</span>
                <span class="font-headline-md text-headline-md">PC Availability</span>
            </div>
            <div class="flex gap-md">
                <div class="flex items-center gap-xs">
                    <div class="w-3 h-3 rounded-full bg-primary glow-box"></div>
                    <span class="text-on-surface-variant font-body-sm">24 Available</span>
                </div>
                <div class="flex items-center gap-xs">
                    <div class="w-3 h-3 rounded-full bg-secondary"></div>
                    <span class="text-on-surface-variant font-body-sm">8 In Use</span>
                </div>
                <div class="flex items-center gap-xs">
                    <div class="w-3 h-3 rounded-full bg-error"></div>
                    <span class="text-on-surface-variant font-body-sm">2 Maintenance</span>
                </div>
            </div>
        </div>
    </section>

    <section class="px-gutter py-xl max-w-container-max mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-sm">
            <a href="{{ route('page') }}" class="md:col-span-2 md:row-span-2 block h-full">
                <div class="bg-surface-container-high rounded-xl p-md border-t border-primary/50 bg-gradient-to-b from-transparent to-surface-container-lowest flex flex-col justify-between group hover:border-primary transition-colors cursor-pointer relative overflow-hidden h-full min-h-[260px] md:min-h-[320px]">
        
                    <div class="z-10">
                        <span class="material-symbols-outlined text-primary mb-xs" style="font-variation-settings: 'FILL' 1;">desktop_windows</span>
                        <h3 class="font-headline-lg text-headline-lg mb-xs">Daftar PC</h3>
                        <p class="text-on-surface-variant font-body-sm">Eksplorasi spesifikasi rig gaming high-end kami. Dari tier standard hingga VIP.</p>
                    </div>
        
                    <div class="flex justify-end items-end mt-lg z-10">
                        <span class="material-symbols-outlined text-display-lg text-primary opacity-20 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300">
                            arrow_forward
                        </span>
                    </div>
        
                </div>
            </a>
            
            <div class="md:col-span-2 bg-surface-container rounded-xl p-md border border-outline-variant hover:border-primary/50 transition-colors cursor-pointer flex items-center gap-md">
                <div class="bg-surface p-sm rounded-lg border border-primary/20 glow-box">
                    <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">sports_esports</span>
                </div>
                <div>
                    <h3 class="font-headline-md text-headline-md">Katalog Game</h3>
                    <p class="text-on-surface-variant font-body-sm">Ribuan game ter-update.</p>
                </div>
            </div>
            
            <div class="bg-surface-container rounded-xl p-md border border-outline-variant hover:border-secondary/50 transition-colors cursor-pointer flex flex-col justify-between">
                <span class="material-symbols-outlined text-secondary mb-xs" style="font-variation-settings: 'FILL' 1;">local_offer</span>
                <h3 class="font-headline-md text-headline-md">Promo</h3>
            </div>
            
            <div class="bg-surface-container rounded-xl p-md border border-outline-variant hover:border-primary/50 transition-colors cursor-pointer flex flex-col justify-between">
                <span class="material-symbols-outlined text-primary mb-xs" style="font-variation-settings: 'FILL' 1;">badge</span>
                <h3 class="font-headline-md text-headline-md">Member Area</h3>
            </div>
        </div>
    </section>

    <section class="px-gutter py-xl max-w-container-max mx-auto grid grid-cols-1 lg:grid-cols-2 gap-xl">
        
        <div class="flex flex-col gap-md">
            <div class="flex items-center gap-xs">
                <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">workspace_premium</span>
                <h2 class="font-headline-lg text-headline-lg text-primary glow-text">PC Paling Sering Digunakan</h2>
            </div>
            
            <div class="flex flex-col gap-sm">
                @forelse($pcPopuler as $pc)
                    <div class="bg-surface-container rounded-xl p-md border border-outline-variant hover:border-primary/50 transition-colors flex justify-between items-center gap-md">
                        <div class="flex items-center gap-md">
                            <div class="bg-surface p-sm rounded-lg border border-primary/20 text-primary self-start">
                                <span class="material-symbols-outlined">computer</span>
                            </div>
                            <div>
                                <div class="flex items-center gap-xs mb-1">
                                    <h4 class="font-title-lg text-white font-bold">{{ $pc->nama_komputer }}</h4>
                                    <span class="text-[10px] uppercase px-2 py-0.5 rounded-full font-bold bg-primary/20 text-primary border border-primary/30">
                                        {{ $pc->tier }}
                                    </span>
                                </div>
                                <p class="text-on-surface-variant font-body-sm leading-relaxed">
                                    <span class="text-white/70">{{ $pc->cpu }}</span> • 
                                    <span class="text-white/70">{{ $pc->gpu }}</span> • 
                                    <span class="text-white/70">{{ $pc->ram }} RAM</span>
                                </p>
                            </div>
                        </div>
                        <div class="text-right shrink-0">
                            <span class="bg-primary/10 text-primary border border-primary/20 px-sm py-xs rounded text-label-sm font-semibold block">
                                {{ $pc->total_main }} Sesi
                            </span>
                        </div>
                    </div>
                @empty
                    <p class="text-on-surface-variant font-body-md italic">Belum ada data riwayat bermain.</p>
                @endforelse
            </div>
        </div>

        <div class="flex flex-col gap-md">
            <div class="flex items-center gap-xs">
                <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">local_fire_department</span>
                <h2 class="font-headline-lg text-headline-lg text-secondary glow-text">Game Terpopuler</h2>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-sm">
                @forelse($gamePopuler as $game)
                    <div class="bg-surface-container rounded-xl p-md border border-outline-variant hover:border-secondary/50 transition-colors flex flex-col justify-between h-full min-h-[140px] relative overflow-hidden group">
                        
                        @if($game->image)
                            <div class="absolute inset-0 bg-cover bg-center opacity-10 group-hover:opacity-20 transition-opacity duration-300 pointer-events-none" style="background-image: url('{{ $game->image }}')"></div>
                        @endif

                        <div class="z-10">
                            <span class="text-secondary font-label-sm uppercase tracking-wider block mb-xs font-semibold">{{ $game->genre ?? 'Multiplayer' }}</span>
                            <h4 class="font-title-lg text-white leading-snug font-bold">{{ $game->judul_game }}</h4>
                        </div>
                        <div class="flex justify-between items-center mt-md pt-sm border-t border-outline-variant/30 z-10">
                            <span class="text-on-surface-variant font-body-xs">Dimainkan</span>
                            <span class="text-secondary font-label-md font-bold">{{ $game->total_dimainkan }} Sesi</span>
                        </div>
                    </div>
                @empty
                    <p class="text-on-surface-variant font-body-md italic">Belum ada data riwayat game.</p>
                @endforelse
            </div>
        </div>

    </section>
</main>
@endsection
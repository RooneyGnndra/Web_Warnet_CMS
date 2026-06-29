@extends('layouts.app')

@section('content')
<main class="flex-grow pt-[40px] pb-xl px-gutter max-w-container-max mx-auto w-full">
    <div class="mb-lg mt-md">
        <h1 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary mb-xs">Katalog Game Terinstal</h1>
        <p class="text-on-surface-variant max-w-2xl">Jelajahi perpustakaan game premium kami. Semua game sudah terinstal dan siap dimainkan di PC dengan spesifikasi yang sesuai.</p>
    </div>

    <form action="{{ url()->current() }}" method="GET" class="glass-panel rounded-lg p-sm mb-lg flex flex-col md:flex-row gap-sm items-center justify-between border-t border-primary/20">
        <div class="flex flex-wrap gap-xs">
            {{-- Tombol Filter Genre --}}
            <a href="{{ url()->current() }}" class="px-sm py-xs rounded font-label-md transition-colors {{ empty(request('genre')) ? 'bg-primary/10 text-primary border border-primary/30' : 'bg-surface-container text-on-surface border border-outline-variant hover:border-primary/50' }}">Semua</a>
            
            @foreach(['FPS', 'MOBA', 'RPG', 'Racing', 'Battle Royale'] as $g)
                <a href="{{ url()->current() . '?genre=' . $g . (request('search') ? '&search='.request('search') : '') }}" 
                   class="px-sm py-xs rounded font-label-md transition-colors {{ request('genre') == $g ? 'bg-primary/10 text-primary border border-primary/30' : 'bg-surface-container text-on-surface border border-outline-variant hover:border-primary/50' }}">
                   {{ $g }}
                </a>
            @endforeach
        </div>
        
        <div class="relative w-full md:w-64">
            <span class="material-symbols-outlined absolute left-xs top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
            <input name="search" value="{{ request('search') }}" onchange="this.form.submit()" class="w-full bg-surface-container border border-outline-variant rounded py-xs pl-lg pr-sm text-on-surface focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none transition-all placeholder:text-outline" placeholder="Cari game..." type="text"/>
        </div>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-gutter">
        @forelse($games as $game)
            <div class="glass-panel rounded-lg overflow-hidden flex flex-col glow-hover transition-all duration-300 border-t border-transparent hover:border-primary">
                {{-- Gambar Cover Game --}}
                <div class="h-40 w-full relative bg-surface-container-high">
                    @if(!empty($game->image))
                        <img alt="{{ $game->judul_game }} Cover" class="w-full h-full object-cover opacity-80 transition-all" src="{{ asset('storage/' . $game->image) }}"/>
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-on-surface-variant text-sm font-label-md bg-surface-container-highest">
                            <span class="material-symbols-outlined text-[32px] mb-xs text-outline">sports_esports</span>
                            No Cover Image
                        </div>
                    @endif
                    <div class="absolute top-xs right-xs bg-surface-container-highest/90 backdrop-blur px-xs py-1 rounded text-primary font-label-md text-[10px] border border-primary/30 flex items-center gap-1">
                        <span class="material-symbols-outlined text-[12px]">verified</span> Terinstal
                    </div>
                </div>
                
                {{-- Detail Konten Game --}}
                <div class="p-sm flex flex-col flex-grow bg-gradient-to-b from-transparent to-surface-container-low/50">
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-1 truncate" title="{{ $game->judul_game }}">{{ $game->judul_game }}</h3>
                    <p class="font-body-sm text-body-sm text-on-surface-variant mb-md">{{ $game->developer }}</p>
                    
                    {{-- Badge Genre --}}
                    <div class="flex flex-wrap gap-1 mb-md">
                        <span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">{{ $game->genre }}</span>
                    </div>
                    
                    {{-- Spesifikasi & Tier Availability --}}
                    <div class="mt-auto space-y-2 border-t border-outline-variant/30 pt-sm">
                        <div class="flex items-center gap-xs">
                            <span class="material-symbols-outlined text-outline text-[16px]">memory</span>
                            <span class="font-body-sm text-body-sm text-on-surface-variant">Min. {{ $game->min_ram }}</span>
                        </div>
                        <div class="flex items-center gap-xs">
                            <span class="material-symbols-outlined text-primary-container text-[16px]">computer</span>
                            <span class="font-body-sm text-body-sm text-primary-fixed-dim">
                                Available in: 
                                <span class="font-semibold">{{ !empty($game->tier) ? implode(' & ', explode(',', $game->tier)) : 'None' }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-xl text-center text-on-surface-variant border border-dashed border-outline-variant rounded-lg">
                <span class="material-symbols-outlined text-[48px] mb-sm text-outline">search_off</span>
                <p class="font-headline-md">Game tidak ditemukan</p>
                <p class="font-body-sm text-sm">Coba cari dengan kata kunci lain atau pilih genre berbeda.</p>
            </div>
        @endforelse
    </div>
</main>
@endsection
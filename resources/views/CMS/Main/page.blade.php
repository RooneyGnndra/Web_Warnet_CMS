@extends('layouts.app')

@section('content')
<main class="flex-grow w-full max-w-container-max mx-auto px-gutter py-md md:py-xl">
    <header class="mb-lg flex flex-col md:flex-row justify-between items-start md:items-end gap-sm border-b border-outline-variant pb-sm">
        <div>
            <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary mb-xs">Fasilitas &amp; Daftar PC</h1>
            <p class="font-body-md text-body-md text-on-surface-variant">Jelajahi spesifikasi dan ketersediaan PC di lounge kami.</p>
        </div>
        <div class="flex gap-xs overflow-x-auto pb-2 w-full md:w-auto hide-scrollbar">
            <button class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md bg-primary text-on-primary neon-glow-active">All Tiers</button>
            <button class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary transition-colors">Bronze</button>
            <button class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary transition-colors">Silver</button>
            <button class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary transition-colors">Gold</button>
            <button class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md border border-outline-variant text-secondary hover:border-secondary hover:text-secondary transition-colors">VIP</button>
        </div>
    </header>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-md">
        <article class="bg-surface-container-high rounded-xl border-t border-secondary overflow-hidden relative group transition-transform hover:-translate-y-1 hover:shadow-[0_10px_20px_rgba(220,184,255,0.1)]">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-secondary/5 pointer-events-none"></div>
            <div class="p-sm">
                <div class="flex justify-between items-start mb-sm">
                    <h2 class="font-headline-md text-headline-md text-on-surface">PC-01</h2>
                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-secondary/10 text-secondary font-label-md text-label-md border border-secondary/30">
                        <span class="material-symbols-outlined" style="font-size: 14px;">diamond</span> VIP
                    </span>
                </div>
                <div class="mb-sm">
                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-primary/20 text-primary font-label-md text-label-md border border-primary/30 neon-glow">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span> Available
                    </span>
                </div>
                <div class="space-y-xs mb-md border-t border-outline-variant pt-xs">
                    <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-outline">memory</span>
                        <span>Intel Core i9-13900K</span>
                    </div>
                    <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-outline">developer_board</span>
                        <span>RTX 4090 24GB</span>
                    </div>
                    <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-outline">storage</span>
                        <span>64GB DDR5 6000MHz</span>
                    </div>
                </div>
                <button class="w-full py-xs border border-secondary text-secondary rounded font-label-md text-label-md hover:bg-secondary/10 transition-colors">
                    Lihat Detail
                </button>
            </div>
        </article>

        <article class="bg-surface-container-high rounded-xl border-t border-primary overflow-hidden relative group transition-transform hover:-translate-y-1 hover:shadow-[0_10px_20px_rgba(0,242,255,0.05)]">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-primary/5 pointer-events-none"></div>
            <div class="p-sm">
                <div class="flex justify-between items-start mb-sm">
                    <h2 class="font-headline-md text-headline-md text-on-surface">PC-12</h2>
                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-primary/10 text-primary font-label-md text-label-md border border-primary/30">
                        Gold
                    </span>
                </div>
                <div class="mb-sm">
                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-surface-variant text-on-surface-variant font-label-md text-label-md border border-outline-variant">
                        <span class="material-symbols-outlined" style="font-size: 14px;">person</span> In Use
                    </span>
                </div>
                <div class="space-y-xs mb-md border-t border-outline-variant pt-xs">
                    <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-outline">memory</span>
                        <span>Intel Core i7-13700K</span>
                    </div>
                    <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-outline">developer_board</span>
                        <span>RTX 4080 16GB</span>
                    </div>
                    <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-outline">storage</span>
                        <span>32GB DDR5 5600MHz</span>
                    </div>
                </div>
                <button class="w-full py-xs border border-primary text-primary rounded font-label-md text-label-md hover:bg-primary/10 transition-colors">
                    Lihat Detail
                </button>
            </div>
        </article>

        <article class="bg-surface-container-high rounded-xl border-t border-outline overflow-hidden relative group transition-transform hover:-translate-y-1">
            <div class="p-sm">
                <div class="flex justify-between items-start mb-sm">
                    <h2 class="font-headline-md text-headline-md text-on-surface">PC-25</h2>
                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-surface-variant text-on-surface font-label-md text-label-md border border-outline-variant">
                        Silver
                    </span>
                </div>
                <div class="mb-sm">
                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-primary/20 text-primary font-label-md text-label-md border border-primary/30 neon-glow">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span> Available
                    </span>
                </div>
                <div class="space-y-xs mb-md border-t border-outline-variant pt-xs">
                    <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-outline">memory</span>
                        <span>Intel Core i5-13600K</span>
                    </div>
                    <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-outline">developer_board</span>
                        <span>RTX 4070 12GB</span>
                    </div>
                    <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-outline">storage</span>
                        <span>16GB DDR5 5200MHz</span>
                    </div>
                </div>
                <button class="w-full py-xs border border-outline text-on-surface-variant rounded font-label-md text-label-md hover:bg-surface-variant transition-colors hover:text-on-surface">
                    Lihat Detail
                </button>
            </div>
        </article>

        <article class="bg-surface-container-high rounded-xl border-t border-error overflow-hidden relative group opacity-75">
            <div class="p-sm">
                <div class="flex justify-between items-start mb-sm">
                    <h2 class="font-headline-md text-headline-md text-on-surface">PC-42</h2>
                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-surface-variant text-on-surface font-label-md text-label-md border border-outline-variant">
                        Bronze
                    </span>
                </div>
                <div class="mb-sm">
                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-error-container text-on-error-container font-label-md text-label-md border border-error/30">
                        <span class="material-symbols-outlined" style="font-size: 14px;">build</span> Maintenance
                    </span>
                </div>
                <div class="space-y-xs mb-md border-t border-outline-variant pt-xs">
                    <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-outline">memory</span>
                        <span>Intel Core i5-12400F</span>
                    </div>
                    <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-outline">developer_board</span>
                        <span>RTX 3060 12GB</span>
                    </div>
                    <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-outline">storage</span>
                        <span>16GB DDR4 3200MHz</span>
                    </div>
                </div>
                <button class="w-full py-xs border border-outline text-on-surface-variant rounded font-label-md text-label-md hover:bg-surface-variant transition-colors hover:text-on-surface">
                    Lihat Detail
                </button>
            </div>
        </article>
    </div>
</main>
@endsection
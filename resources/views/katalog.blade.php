@extends('layouts.app')

@section('content')
<main class="flex-grow pt-[40px] pb-xl px-gutter max-w-container-max mx-auto w-full">
    <div class="mb-lg mt-md">
        <h1 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary mb-xs">Katalog Game Terinstal</h1>
        <p class="text-on-surface-variant max-w-2xl">Jelajahi perpustakaan game premium kami. Semua game sudah terinstal dan siap dimainkan di PC dengan spesifikasi yang sesuai.</p>
    </div>

    <div class="glass-panel rounded-lg p-sm mb-lg flex flex-col md:flex-row gap-sm items-center justify-between border-t border-primary/20">
        <div class="flex flex-wrap gap-xs">
            <button class="px-sm py-xs rounded bg-primary/10 text-primary border border-primary/30 font-label-md hover:bg-primary/20 transition-colors">Semua</button>
            <button class="px-sm py-xs rounded bg-surface-container text-on-surface border border-outline-variant font-label-md hover:border-primary/50 transition-colors">FPS</button>
            <button class="px-sm py-xs rounded bg-surface-container text-on-surface border border-outline-variant font-label-md hover:border-primary/50 transition-colors">MOBA</button>
            <button class="px-sm py-xs rounded bg-surface-container text-on-surface border border-outline-variant font-label-md hover:border-primary/50 transition-colors">RPG</button>
            <button class="px-sm py-xs rounded bg-surface-container text-on-surface border border-outline-variant font-label-md hover:border-primary/50 transition-colors">Sports</button>
            <button class="px-sm py-xs rounded bg-surface-container text-on-surface border border-outline-variant font-label-md hover:border-primary/50 transition-colors">Battle Royale</button>
        </div>
        <div class="relative w-full md:w-64">
            <span class="material-symbols-outlined absolute left-xs top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
            <input class="w-full bg-surface-container border border-outline-variant rounded py-xs pl-lg pr-sm text-on-surface focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none transition-all placeholder:text-outline" placeholder="Cari game..." type="text"/>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-gutter">
        <div class="glass-panel rounded-lg overflow-hidden flex flex-col glow-hover transition-all duration-300 border-t border-transparent hover:border-primary">
            <div class="h-40 w-full relative bg-surface-container-high">
                <img alt="Cyberpunk tactical shooter interface" class="w-full h-full object-cover opacity-80 mix-blend-luminosity hover:mix-blend-normal transition-all" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC9q7KN1ElQwvBf90vYWKSDqyl658MdYMcMQkFQqn_ppaONe-K4zM0TCNPrj_frMdST73uRoTFMx-wwS-bhT1bihFlaHYfRThF5BaCzyO1QxXzkYf9xqEYq9v1L0d8PhIx-kCh21SIjPmhbC8eJimqXiV44MT6YauXc42t-lqygm0tSUGz3ioy-X8JlMP6elxAH-qzH7r8GvUjTMD_sc7Y_znrT9N0AvzTvVWUz-PdF6l6P99xlg756uFcr7pmZyVfwggn82zx5TQE"/>
                <div class="absolute top-xs right-xs bg-surface-container-highest/90 backdrop-blur px-xs py-1 rounded text-primary font-label-md text-[10px] border border-primary/30 flex items-center gap-1">
                    <span class="material-symbols-outlined text-[12px]">verified</span> Terinstal
                </div>
            </div>
            <div class="p-sm flex flex-col flex-grow bg-gradient-to-b from-transparent to-surface-container-low/50">
                <h3 class="font-headline-md text-headline-md text-on-surface mb-1 truncate">Valorant</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-md">Riot Games</p>
                <div class="flex flex-wrap gap-1 mb-md">
                    <span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">FPS</span>
                    <span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">Tactical</span>
                </div>
                <div class="mt-auto space-y-2 border-t border-outline-variant/30 pt-sm">
                    <div class="flex items-center gap-xs">
                        <span class="material-symbols-outlined text-outline text-[16px]">memory</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant">Min. 8GB RAM</span>
                    </div>
                    <div class="flex items-center gap-xs">
                        <span class="material-symbols-outlined text-primary-container text-[16px]">computer</span>
                        <span class="font-body-sm text-body-sm text-primary-fixed-dim">Available in Regular & VIP</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass-panel rounded-lg overflow-hidden flex flex-col glow-hover transition-all duration-300 border-t border-transparent hover:border-primary">
            <div class="h-40 w-full relative bg-surface-container-high">
                <img alt="Fantasy MOBA gameplay scene" class="w-full h-full object-cover opacity-80 mix-blend-luminosity hover:mix-blend-normal transition-all" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDJ4jHY8tXUVcqCDYwFAddjzYk5ERQ5yC6JkRTvGukxuFndrY7ulHHHrptXwSb07BcRp7MQ5LsG60_KnSl0gNKxyEqkmXBIxcajTFPg8fdPjXLqL-_ULW0sx6CxL6YkB5WpOhGeUIABJ4P716bv_N0hhPCpIAQlelaSmD-EKmpgH7lX-87xPNqUYxtRKBm4Z68i1SEkRZBtPsAFiayzuzZ0UuBkRgC83Cohtsxwbnb2U6uv3PtDviNQ7mFLyWjE8WCHIiLZ_Mqx6r0"/>
                <div class="absolute top-xs right-xs bg-surface-container-highest/90 backdrop-blur px-xs py-1 rounded text-primary font-label-md text-[10px] border border-primary/30 flex items-center gap-1">
                    <span class="material-symbols-outlined text-[12px]">verified</span> Terinstal
                </div>
            </div>
            <div class="p-sm flex flex-col flex-grow bg-gradient-to-b from-transparent to-surface-container-low/50">
                <h3 class="font-headline-md text-headline-md text-on-surface mb-1 truncate">Dota 2</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-md">Valve Corporation</p>
                <div class="flex flex-wrap gap-1 mb-md">
                    <span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">MOBA</span>
                    <span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">Strategy</span>
                </div>
                <div class="mt-auto space-y-2 border-t border-outline-variant/30 pt-sm">
                    <div class="flex items-center gap-xs">
                        <span class="material-symbols-outlined text-outline text-[16px]">memory</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant">Min. 8GB RAM</span>
                    </div>
                    <div class="flex items-center gap-xs">
                        <span class="material-symbols-outlined text-primary-container text-[16px]">computer</span>
                        <span class="font-body-sm text-body-sm text-primary-fixed-dim">Available in Regular & VIP</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass-panel rounded-lg overflow-hidden flex flex-col glow-hover transition-all duration-300 border-t border-transparent hover:border-primary">
            <div class="h-40 w-full relative bg-surface-container-high">
                <img alt="High fidelity racing game" class="w-full h-full object-cover opacity-80 mix-blend-luminosity hover:mix-blend-normal transition-all" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6hr5QjWz1XPPuZp8ctxleSvVAJqvUY4F9uivJrrhvBZINRybpUYiCIWL4-OJxeIclVQH7iJpBX1wmDnuFrclp46Qb_jcGun3OZgyjDGu1YB6-UaD_qZ-qwkOpnhVKpyiInj78YDGC2L4bBSB13WmbwItypU3nyM_zzlCfIvnSCBUsKJpWl3JEJ4t8Tu9_TPpNIYAG7SLMw-C8aUUYCtGLOiijV27UfZQtXoajI_FCMCla6yxFQMvxjBa4FxLEC-ICA4xs2YDt4xM"/>
                <div class="absolute top-xs right-xs bg-surface-container-highest/90 backdrop-blur px-xs py-1 rounded text-primary font-label-md text-[10px] border border-primary/30 flex items-center gap-1">
                    <span class="material-symbols-outlined text-[12px]">verified</span> Terinstal
                </div>
            </div>
            <div class="p-sm flex flex-col flex-grow bg-gradient-to-b from-transparent to-surface-container-low/50">
                <h3 class="font-headline-md text-headline-md text-on-surface mb-1 truncate">Cyberpunk 2077</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-md">CD Projekt Red</p>
                <div class="flex flex-wrap gap-1 mb-md">
                    <span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">RPG</span>
                    <span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">Action</span>
                </div>
                <div class="mt-auto space-y-2 border-t border-outline-variant/30 pt-sm">
                    <div class="flex items-center gap-xs">
                        <span class="material-symbols-outlined text-outline text-[16px]">memory</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant">Min. 16GB RAM</span>
                    </div>
                    <div class="flex items-center gap-xs">
                        <span class="material-symbols-outlined text-secondary-container text-[16px]">diamond</span>
                        <span class="font-body-sm text-body-sm text-secondary-fixed-dim">Available in Gold & VIP Only</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass-panel rounded-lg overflow-hidden flex flex-col glow-hover transition-all duration-300 border-t border-transparent hover:border-primary">
            <div class="h-40 w-full relative bg-surface-container-high">
                <img alt="Battle royale jump scene" class="w-full h-full object-cover opacity-80 mix-blend-luminosity hover:mix-blend-normal transition-all" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCuzCZ7ncXosHDuuWfQ_9yCQiD4P1KBltyKBRLU09cR2cMTLLxaQsCofd2rmoYCdhZ5DDtatesMXOtCRwTB3-Z4VG65iCGU5BF-5Nhgh4fZZ_iht4ouP2Q_Uu8CVIBG8jVY8_cJa2i7zCLo4LWFPCvtO32RliKZKCDLE0EWXDF0DCSg8GVA8DO755_jGu9N8TyGOtjYpsvOAyQPBYQFt72Xu_bRsWTHJnoBdq6ndh88uB-YqtUqy1NKLI6xyWWSbWfvZdGXH8Bmo2A"/>
                <div class="absolute top-xs right-xs bg-surface-container-highest/90 backdrop-blur px-xs py-1 rounded text-primary font-label-md text-[10px] border border-primary/30 flex items-center gap-1">
                    <span class="material-symbols-outlined text-[12px]">verified</span> Terinstal
                </div>
            </div>
            <div class="p-sm flex flex-col flex-grow bg-gradient-to-b from-transparent to-surface-container-low/50">
                <h3 class="font-headline-md text-headline-md text-on-surface mb-1 truncate">Apex Legends</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-md">Respawn Entertainment</p>
                <div class="flex flex-wrap gap-1 mb-md">
                    <span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">Battle Royale</span>
                    <span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">FPS</span>
                </div>
                <div class="mt-auto space-y-2 border-t border-outline-variant/30 pt-sm">
                    <div class="flex items-center gap-xs">
                        <span class="material-symbols-outlined text-outline text-[16px]">memory</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant">Min. 8GB RAM</span>
                    </div>
                    <div class="flex items-center gap-xs">
                        <span class="material-symbols-outlined text-primary-container text-[16px]">computer</span>
                        <span class="font-body-sm text-body-sm text-primary-fixed-dim">Available in Regular & VIP</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@extends('layouts.app') 
@section('content')
<main class="flex-grow pt-md pb-xl px-gutter max-w-container-max mx-auto w-full">
    
    <header class="mb-lg border-b border-outline-variant/30 pb-sm">
        <h2 class="font-display-lg text-headline-lg text-primary neon-text-glow">
            Welcome back, {{ Auth::user()->username }}
        </h2>
        <p class="font-body-md text-body-md text-on-surface-variant mt-xs">
            Monitor status akun, billing aktif, dan koleksi voucher game Anda di NetCity.
        </p>
    </header>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter mb-xl">
        
        <div class="col-span-1 lg:col-span-5 bg-surface-container rounded-xl p-md border-t border-primary/50 relative overflow-hidden group shadow-lg">
            <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-transparent opacity-50 group-hover:opacity-100 transition-opacity"></div>
            <div class="flex items-center mb-md">
                <div class="w-12 h-12 rounded-full bg-primary/10 border border-primary/30 flex items-center justify-center mr-sm">
                    <span class="material-symbols-outlined text-primary text-2xl">account_circle</span>
                </div>
                <div>
                    <h3 class="font-headline-md text-headline-md text-on-background">{{ Auth::user()->username }}</h3>
                    <span class="mt-1 inline-block px-xs py-0.5 rounded text-[10px] font-bold uppercase tracking-widest
                        {{ Auth::user()->tier_langganan === 'VIP' ? 'bg-secondary-container/20 text-secondary border border-secondary/30' : '' }}
                        {{ Auth::user()->tier_langganan === 'GOLD' ? 'bg-primary/10 text-primary border border-primary/30' : '' }}
                        {{ Auth::user()->tier_langganan === 'SILVER' ? 'bg-outline-variant/20 text-on-surface-variant border border-outline-variant/30' : '' }}
                        {{ empty(Auth::user()->tier_langganan) || Auth::user()->tier_langganan === 'BRONZE' ? 'bg-orange-500/10 text-orange-400 border border-orange-500/20' : '' }}">
                        {{ Auth::user()->tier_langganan ?? 'BRONZE' }} MEMBER
                    </span>
                </div>
            </div>
            
            <div class="space-y-xs font-body-sm text-body-sm text-on-surface-variant">
                <div class="flex justify-between border-b border-outline-variant/30 pb-xs">
                    <span>Member ID</span>
                    <span class="text-primary font-mono font-bold">NC-M-{{ sprintf('%03d', Auth::user()->id) }}</span>
                </div>
                <div class="flex justify-between border-b border-outline-variant/30 py-xs">
                    <span>Email Registered</span>
                    <span class="text-on-background">{{ Auth::user()->email ?? '-' }}</span>
                </div>
                <div class="flex justify-between pt-xs">
                    <span>Join Date</span>
                    <span class="text-on-background">
                        {{ Auth::user()->created_at ? date('d M Y', strtotime(Auth::user()->created_at)) : '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col-span-1 lg:col-span-7 bg-surface-container rounded-xl p-md border-t border-secondary/50 relative overflow-hidden group flex flex-col justify-center shadow-lg">
            <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-secondary to-transparent opacity-50 group-hover:opacity-100 transition-opacity"></div>
            <h4 class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider mb-sm flex items-center">
                <span class="material-symbols-outlined mr-xs text-secondary" style="font-variation-settings: 'FILL' 1;">timer</span>
                Sisa Waktu Bermain (Billing aktif)
            </h4>
            <div class="font-display-lg text-display-lg text-secondary drop-shadow-[0_0_15px_rgba(220,184,255,0.2)]">
                @if(isset(Auth::user()->sisa_waktu) && Auth::user()->sisa_waktu > 0)
                    {{ sprintf('%02d:%02d', floor(Auth::user()->sisa_waktu / 60), Auth::user()->sisa_waktu % 60) }}
                    <span class="text-headline-md text-on-surface-variant ml-xs">hrs</span>
                @else
                    00:00<span class="text-headline-md text-error ml-xs">Habis</span>
                @endif
            </div>
            <p class="text-xs text-on-surface-variant mt-xs">*Isi ulang sisa jam bermain Anda secara manual melalui counter kasir NetCity.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-gutter items-start">
        
        <section class="col-span-1 xl:col-span-6 bg-surface-container rounded-xl p-md shadow-md flex flex-col min-h-[350px]">
            <h3 class="font-headline-md text-headline-md text-on-background mb-md flex items-center border-b border-outline-variant/20 pb-xs">
                <span class="material-symbols-outlined mr-sm text-primary">sell</span>
                Koleksi Voucher Saya
            </h3>
            
            <div class="space-y-sm flex-1 overflow-y-auto max-h-[400px] pr-xs">
                @forelse($claimedVouchers ?? [] as $voucher)
                    <div class="glass-panel p-sm rounded-lg border border-outline-variant/30 flex items-center justify-between bg-gradient-to-r from-surface-container-low to-transparent">
                        <div>
                            <h4 class="font-body-md text-primary font-semibold">{{ $voucher->judul_promo }}</h4>
                            <p class="text-xs text-on-surface-variant font-mono mt-1">CODE: <span class="text-secondary font-bold">{{ $voucher->kode_promo }}</span></p>
                        </div>
                        <span class="text-[11px] bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 px-xs py-1 rounded font-bold uppercase tracking-wider">Ready to Use</span>
                    </div>
                @empty
                    <div class="h-full flex flex-col items-center justify-center text-center text-on-surface-variant opacity-60 py-lg">
                        <span class="material-symbols-outlined text-4xl mb-xs">confirmation_number</span>
                        <p class="text-body-sm">Belum ada voucher NetCity yang diklaim.</p>
                    </div>
                @endif
            </div>
        </section>

        <section class="col-span-1 xl:col-span-6 bg-surface-container rounded-xl p-md shadow-md flex flex-col min-h-[350px]">
            <h3 class="font-headline-md text-headline-md text-on-background mb-md flex items-center border-b border-outline-variant/20 pb-xs">
                <span class="material-symbols-outlined mr-sm text-secondary">history</span>
                Log Pemakaian PC & Sesi Bermain
            </h3>

            <div class="overflow-x-auto flex-1">
                <table class="w-full text-left font-body-sm text-body-sm">
                    <thead>
                        <tr class="border-b border-outline-variant text-on-surface-variant">
                            <th class="py-sm font-semibold">Waktu Sesi</th>
                            <th class="py-sm font-semibold">Nomor PC</th>
                            <th class="py-sm font-semibold">Durasi</th>
                            <th class="py-sm font-semibold text-right">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody class="text-on-background divide-y divide-outline-variant/20">
                        @forelse($playSessions as $session)
                            <tr class="hover:bg-surface-variant/30 transition-colors">
                                <td class="py-sm">
                                    {{ date('d M Y, H:i', strtotime($session->waktu_mulai)) }}
                                </td>
                                <td class="py-sm font-bold text-primary">
                                    {{ $session->nama_komputer }}
                                </td>
                                <td class="py-sm">
                                    {{ $session->durasi }} Jam
                                </td>
                                <td class="py-sm text-right text-secondary font-bold">
                                    Rp {{ number_format($session->total_biaya, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-xl text-center text-on-surface-variant opacity-60">
                                    <div class="flex flex-col items-center justify-center">
                                        <span class="material-symbols-outlined text-4xl mb-xs">computer</span>
                                        <p>Belum ada riwayat login sesi bermain di lobi PC.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

    </div>
</main>
@endsection
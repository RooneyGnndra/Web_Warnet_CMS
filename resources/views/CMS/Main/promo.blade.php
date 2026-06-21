@extends('layouts.app')

@section('content')
<main class="flex-grow pt-xl pb-xl px-gutter max-w-container-max mx-auto w-full mt-lg">
    <div class="text-center mb-xl">
        <h1 class="font-display-lg text-display-lg text-primary mb-xs neon-text-glow">Promo & Paket Billing</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">Tingkatkan pengalaman gaming Anda dengan paket spesial kami. <br/> <span class="text-error font-bold mt-2 block bg-error-container/20 py-2 rounded border border-error/30 inline-block px-4">Note: Promo berlaku untuk pembayaran langsung di kasir.</span></p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-md">
        <div class="glass-panel rounded-xl overflow-hidden flex flex-col group hover:-translate-y-1 transition-transform duration-300">
            <div class="h-48 bg-surface-container relative overflow-hidden">
                <img alt="Esports gaming setup with glowing neon lights" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBW-Anff9-laGbqPUhc8iQvLM0mlVRmK3C6uSITLMmORLc_z_N0wAv10rd1q8rSqcTpdWEBLK2kgIoYOZ88fu1_oyMWdXOFZLrpBTjg7z49eP1vBkqX5vZYlijBI1pimTYnTbfhYhI8c0jXdtfH_b5HfeF1exO3Q6As-DgQ8rH6CiV7XgNjTqmYejM2AYBOIGkwc6pVZD_R65KnD_-mYdsmRj3jqN_pme6Z9R_UAwrAEfTfflrtRk9QzFP049Uwcr_7zkkcyvyIbME"/>
                <div class="absolute top-sm right-sm bg-primary-container text-black font-label-md text-label-md px-2 py-1 rounded shadow-[0_0_10px_rgba(0,242,255,0.5)]">
                    HOT DEAL
                </div>
            </div>
            <div class="p-md flex flex-col flex-grow relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-transparent opacity-50"></div>
                <h3 class="font-headline-md text-headline-md text-primary mb-xs">Paket Begadang Mabar</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-md flex-grow">Main sepuasnya dari jam 22:00 hingga 06:00 dengan harga miring. Berlaku untuk semua PC reguler.</p>
                <div class="flex items-center justify-between mt-auto">
                    <div class="flex items-center text-outline font-label-md text-label-md">
                        <span class="material-symbols-outlined text-[16px] mr-1">schedule</span>
                        Exp: 31 Okt 2024
                    </div>
                    <button class="bg-transparent border border-primary text-primary hover:bg-primary hover:text-black font-label-md text-label-md px-4 py-2 rounded transition-all duration-300 neon-glow">
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>

        <div class="glass-panel rounded-xl overflow-hidden flex flex-col group hover:-translate-y-1 transition-transform duration-300">
            <div class="h-48 bg-surface-container relative overflow-hidden">
                <img alt="VR headset and modern gaming controllers" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHoShWKyaSt-CueIdixDCxPrXb0-y5Wyl0x_oNTXAuwidUGPTKsXZOYYnGumqKDMdBv7kFe6BtDKfl1F9Fv1FfnBSAD-aeuhNsnbVI9nrI-uq66xzJ4py60U7rM5oJR-1OSqGhNf4OJ8N31tQB6gcLuwbS5ydTa67fG0CIuPAi5viRPV1-HnDPmcjgzU44LEcWCWd3hYlZfP7chXSfn4hSsU8xqrKgaKqmmsrpM64nBbG-A2hqSceUkzJ3PT8w1_kylRQ0PoTRhW0"/>
            </div>
            <div class="p-md flex flex-col flex-grow relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-secondary to-transparent opacity-50"></div>
                <h3 class="font-headline-md text-headline-md text-secondary mb-xs">Weekend Warrior VIP</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-md flex-grow">Dapatkan diskon 20% untuk penyewaan VIP Room selama minimal 5 jam di akhir pekan.</p>
                <div class="flex items-center justify-between mt-auto">
                    <div class="flex items-center text-outline font-label-md text-label-md">
                        <span class="material-symbols-outlined text-[16px] mr-1">schedule</span>
                        Exp: 15 Nov 2024
                    </div>
                    <button class="bg-transparent border border-secondary text-secondary hover:bg-secondary hover:text-black font-label-md text-label-md px-4 py-2 rounded transition-all duration-300 shadow-[0_0_15px_rgba(220,184,255,0.2)]">
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>

        <div class="glass-panel rounded-xl overflow-hidden flex flex-col group hover:-translate-y-1 transition-transform duration-300">
            <div class="h-48 bg-surface-container relative overflow-hidden">
                <img alt="Close up of mechanical gaming keyboard" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAu43QvGhu4M8Zi3R97_Kzq2_BzyGowKHo1ynkqn7M0YhnAnzOJT9jeLgmWtTufUDkPutISyWF2UKs3UMlzRsHTH_UQsmNgaFx1EyLftfjEFAFMgsWRekvwbzY0AXugUbPrgSmivW4F1ZB76HC2e-tGqSuUT9wQ_V_QSQSDoZChJrfXv5GKmYIXlCUWdmyKIxUINPDRbLVEX6n_J2UX99cCUZ0lqUw7OyLheOVW4virt8Dqv1Gb-PMISKRRPhlH5zioUveF2II2nwo"/>
                <div class="absolute top-sm right-sm bg-secondary-container text-white font-label-md text-label-md px-2 py-1 rounded">
                    MEMBER ONLY
                </div>
            </div>
            <div class="p-md flex flex-col flex-grow relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-transparent opacity-50"></div>
                <h3 class="font-headline-md text-headline-md text-primary mb-xs">Bonus Top-Up 50%</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-md flex-grow">Khusus member, dapatkan bonus saldo 50% untuk setiap pengisian minimal Rp 100.000 via kasir.</p>
                <div class="flex items-center justify-between mt-auto">
                    <div class="flex items-center text-outline font-label-md text-label-md">
                        <span class="material-symbols-outlined text-[16px] mr-1">schedule</span>
                        Exp: 31 Des 2024
                    </div>
                    <button class="bg-transparent border border-primary text-primary hover:bg-primary hover:text-black font-label-md text-label-md px-4 py-2 rounded transition-all duration-300 neon-glow">
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
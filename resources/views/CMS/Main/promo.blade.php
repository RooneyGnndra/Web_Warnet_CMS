@extends('layouts.app')

@section('content')
<main class="flex-grow pt-xl pb-xl px-gutter max-w-container-max mx-auto w-full mt-lg">
    <div class="text-center mb-xl">
        <h1 class="font-display-lg text-display-lg text-primary mb-xs neon-text-glow">Promo & Paket Billing</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">
            Tingkatkan pengalaman gaming Anda dengan paket spesial kami. <br/> 
            <span class="text-error font-bold mt-2 block bg-error-container/20 py-2 rounded border border-error/30 inline-block px-4">
                Note: Promo berlaku untuk pembayaran langsung di kasir.
            </span>
        </p>
    </div>

    <div class="mb-xl">
        <div class="flex items-center gap-xs mb-md border-b border-outline-variant/30 pb-xs">
            <span class="material-symbols-outlined text-primary">schedule</span>
            <h2 class="font-headline-lg text-headline-md text-on-surface uppercase tracking-wider">Limited Time Events</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
            @php $hasEvent = false; @endphp
            @foreach($promos as $promo)
                @if($promo->tipe_promo === 'EVENT')
                    @php $hasEvent = true; @endphp
                    <div class="glass-panel rounded-xl overflow-hidden flex flex-col group border-t border-transparent hover:border-primary/50 transition-all duration-300 shadow-lg">
                        <div class="h-64 bg-surface-container relative overflow-hidden">
                            @if(!empty($promo->banner_img))
                                <img alt="{{ $promo->judul_promo }} Banner" class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-500" src="{{ asset('storage/' . $promo->banner_img) }}"/>
                            @else
                                <div class="w-full h-full flex items-center justify-center text-on-surface-variant">NetCity Esports Event</div>
                            @endif
                            <div class="absolute top-sm right-sm bg-primary-container text-black font-label-md text-label-md px-2 py-1 rounded shadow-[0_0_10px_rgba(0,242,255,0.5)] uppercase font-bold tracking-widest">
                                {{ $promo->jam_mulai }} - {{ $promo->jam_selesai }} WIB
                            </div>
                        </div>
                        
                        <div class="p-md flex flex-col flex-grow bg-gradient-to-b from-transparent to-surface-container-low/30">
                            <h3 class="font-headline-md text-headline-md text-primary mb-xs">{{ $promo->judul_promo }}</h3>
                            <p class="font-body-md text-body-sm text-on-surface-variant mb-md flex-grow">{{ $promo->deskripsi }}</p>
                            
                            <div class="flex items-center justify-between mt-auto border-t border-outline-variant/20 pt-sm">
                                <div class="flex items-center text-outline font-label-md text-label-md public-countdown text-primary-fixed-dim" 
                                     data-expire="{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', explode('.', $promo->tanggal_berakhir)[0])->format('Y-m-d') }}T{{ $promo->jam_selesai }}:00">
                                    <span class="material-symbols-outlined text-[18px] mr-1">timer</span>
                                    <span class="countdown-display">Calculating...</span>
                                </div>
                                <span class="text-[11px] bg-surface-variant text-on-surface px-2 py-1 rounded font-bold uppercase tracking-widest">AUTOMATIC EVENT</span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            @if(!$hasEvent)
                <div class="col-span-full py-lg text-center text-on-surface-variant border border-dashed border-outline-variant rounded-xl">
                    <p class="font-body-md">Tidak ada event spesial yang sedang berlangsung hari ini.</p>
                </div>
            @endif
        </div>
    </div>

    <div>
        <div class="flex items-center gap-xs mb-md border-b border-outline-variant/30 pb-xs">
            <span class="material-symbols-outlined text-secondary">sell</span>
            <h2 class="font-headline-lg text-headline-md text-on-surface uppercase tracking-wider">Claimable Vouchers</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-lg">
            @php $hasVoucher = false; @endphp
            @foreach($promos as $promo)
                @if($promo->tipe_promo === 'VOUCHER')
                    @php $hasVoucher = true; @endphp
                    <div class="glass-panel rounded-xl overflow-hidden flex flex-col h-full border border-outline-variant/30">
                        <div class="relative h-48 w-full bg-surface-container-high">
                            @if(!empty($promo->banner_img))
                                <img class="w-full h-full object-cover" alt="{{ $promo->judul_promo }} Banner" src="{{ asset('storage/' . $promo->banner_img) }}"/>
                            @else
                                <div class="w-full h-full flex items-center justify-center text-on-surface-variant">NetCity Voucher</div>
                            @endif
                            <div class="absolute top-sm right-sm bg-secondary-container text-on-secondary-container px-xs py-[2px] rounded text-[10px] font-bold uppercase tracking-widest">
                                CODE: {{ $promo->kode_promo }}
                            </div>
                        </div>
                        
                        <div class="p-md flex flex-col flex-1 bg-gradient-to-b from-transparent to-surface-container-low/30">
                            <div class="mb-sm">
                                <h3 class="font-headline-md text-headline-md text-primary mb-xs">{{ $promo->judul_promo }}</h3>
                                <p class="text-on-surface-variant text-body-sm line-clamp-2">{{ $promo->deskripsi }}</p>
                            </div>
                            
                            <div class="mt-auto space-y-md">
                                <div class="flex items-center justify-between text-[13px] text-on-surface-variant/80 border-t border-outline-variant/30 pt-sm">
                                    <div class="flex items-center gap-xs public-countdown text-error" 
                                         data-expire="{{ \Carbon\Carbon::parse($promo->tanggal_berakhir)->format('Y-m-d') }}T23:59:59">
                                        <span class="material-symbols-outlined text-[16px]">timer</span>
                                        <span class="countdown-display">Calculating...</span>
                                    </div>
                                </div>
                                
                                <button type="button" 
                                        data-voucher-id="{{ $promo->id }}"
                                        class="btn-claim-voucher w-full py-2 bg-transparent border border-primary text-primary hover:bg-primary hover:text-black font-label-md text-label-md rounded transition-all duration-300 flex justify-center items-center gap-xs">
                                    <span class="material-symbols-outlined text-[18px]">workspace_premium</span>
                                    <span class="btn-claim-text">Claim Voucher</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            @if(!$hasVoucher)
                <div class="col-span-full py-lg text-center text-on-surface-variant border border-dashed border-outline-variant rounded-xl">
                    <p class="font-body-md">Belum ada kode voucher baru yang tersedia saat ini.</p>
                </div>
            @endif
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // --- 1. INISIALISASI VARIABEL UTAMA ---
        const countdownElements = document.querySelectorAll('.public-countdown');
        const claimButtons = document.querySelectorAll('.btn-claim-voucher');
        const isLoggedIn = @json(Auth::check()); 
        const userRole = @json(Auth::user() ? Auth::user()->role : 'guest');
        
        // --- 2. LOGIK SYSTEM REAL-TIME COUNTDOWN TIMER ---
        function runPublicTimers() {
            const rightNow = new Date().getTime();
            
            countdownElements.forEach(elem => {
                const expireStr = elem.getAttribute('data-expire');
                // Langsung diparsing karena format data-expire dari Blade sudah standar ISO
                const targetTime = new Date(expireStr).getTime();
                const displayNode = elem.querySelector('.countdown-display');

                if (isNaN(targetTime)) {
                    displayNode.innerHTML = "Format Waktu Error";
                    return; 
                }

                const difference = targetTime - rightNow;

                if (difference <= 0) {
                    displayNode.innerHTML = "Expired / Event Ended";
                    const card = elem.closest('.glass-panel');
                    const btnClaim = card ? card.querySelector('.btn-claim-voucher') : null;
                    if(btnClaim) {
                        btnClaim.disabled = true;
                        btnClaim.className = "w-full py-2 bg-surface-variant text-on-surface-variant/40 border border-outline-variant rounded cursor-not-allowed text-center";
                        btnClaim.querySelector('.btn-claim-text').textContent = "Voucher Expired";
                    }
                } else {
                    const d = Math.floor(difference / (1000 * 60 * 60 * 24));
                    const h = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const m = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                    const s = Math.floor((difference % (1000 * 60)) / 1000);

                    if (d > 0) {
                        displayNode.innerHTML = `Sisa ${d} Hari ${h} Jam`;
                    } else if (h > 0) {
                        displayNode.innerHTML = `Sisa ${h} Jam ${m} Menit`;
                    } else {
                        displayNode.innerHTML = `Sisa ${m}m ${s}s`;
                    }
                }
            });
        }
        
        if(countdownElements.length > 0) {
            runPublicTimers();
            setInterval(runPublicTimers, 1000);
        }

        // --- 3. CEK STATUS KLAIM (SAAT REFRESH HALAMAN) ---
        if (isLoggedIn && userRole !== 'admin') {
            claimButtons.forEach(button => {
                const vId = button.getAttribute('data-voucher-id');
                if (localStorage.getItem(`claimed_promo_${vId}`) === 'true') {
                    setAsClaimed(button);
                }
            });
        }

        // --- 4. TRIGGER KLIK TOMBOL KLAIM ---
        claimButtons.forEach(button => {
            button.addEventListener('click', function() {
                // SELEKSI AWAL: Jika belum login, hentikan aksi dan lempar ke login
                if (!isLoggedIn) {
                    alert("Anda harus login terlebih dahulu untuk mengklaim voucher NetCity!");
                    window.location.href = "{{ route('login') }}"; 
                    return; // Mencegah kode di bawahnya tereksekusi oleh guest
                }

                const vId = this.getAttribute('data-voucher-id');

                // KONDISI: USER BIASA (Sudah terbukti login lewat seleksi di atas)
                if (userRole !== 'admin') {
                    if (localStorage.getItem(`claimed_promo_${vId}`) === 'true') {
                        alert("Anda sudah mengklaim voucher ini sebelumnya!");
                        return;
                    }
                    
                    // Catat klaim di localStorage HANYA setelah sukses melewati gerbang login
                    localStorage.setItem(`claimed_promo_${vId}`, 'true');
                    setAsClaimed(this);
                    alert("Voucher berhasil diklaim! Kode disimpan untuk akun Anda.");
                } 
                // KONDISI: ADMIN
                else {
                    alert("[TESTING ADMIN] Voucher sukses diproses! (Admin bebas klaim berulang kali)");
                    this.classList.add('bg-emerald-500', 'text-black');
                    setTimeout(() => {
                        this.classList.remove('bg-emerald-500', 'text-black');
                    }, 400);
                }
            });
        });

        // --- 5. FUNGSI PEMBANTU (MENGUBAH GAYA TOMBOL) ---
        function setAsClaimed(buttonElement) {
            buttonElement.disabled = true;
            buttonElement.className = "w-full py-2 bg-emerald-500/10 border border-emerald-500/40 text-emerald-400 font-label-md text-label-md rounded flex justify-center items-center gap-xs cursor-default";
            
            const icon = buttonElement.querySelector('.material-symbols-outlined');
            if (icon) icon.textContent = "check_circle";
            
            const text = buttonElement.querySelector('.btn-claim-text');
            if (text) text.textContent = "Telah Diklaim";
        }
    });
</script>
@endsection
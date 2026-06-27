@extends('layouts.admin')

@section('content')
<header class="flex justify-between items-center px-xl py-lg sticky top-0 bg-background/80 backdrop-blur-md z-40">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-on-surface">Manajemen Promo</h2>
        <p class="text-on-surface-variant text-body-sm">Monitor and manage active gaming lounge campaigns.</p>
    </div>
    <button id="btnTambahPromo" class="bg-primary-container text-on-primary-container px-lg py-sm font-label-md rounded-lg flex items-center gap-xs neon-glow transition-all active:scale-95">
        <span class="material-symbols-outlined text-[20px]">add</span>
        Tambah Promo
    </button>
</header>

<div class="px-xl mb-md space-y-sm">
    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 p-md rounded-lg font-body-sm shadow-[0_0_15px_rgba(16,185,129,0.1)]">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-error/10 border border-error/30 text-error p-md rounded-lg font-body-sm">
            {{ session('error') }}
        </div>
    @endif
</div>

<section class="px-xl mb-lg">
    <div class="glass-card p-sm rounded-xl flex flex-wrap gap-md items-center border border-outline-variant/50">
        <div class="flex-1 min-w-[300px] relative">
            <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant/50">search</span>
            <input id="promoSearchInput" class="w-full bg-surface-container-lowest border border-outline-variant focus:border-primary-container focus:ring-1 focus:ring-primary-container text-on-surface pl-xl pr-md py-sm rounded-lg transition-all outline-none" placeholder="Cari judul promo atau kode voucher..." type="text"/>
        </div>
    </div>
</section>

<section class="px-xl pb-xl grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-lg">
    @forelse($promos as $promo)
        <div class="promo-card glass-card rounded-xl overflow-hidden flex flex-col h-full group {{ $promo->status !== 'AKTIF' ? 'opacity-50' : '' }}">
            <div class="relative h-48 w-full bg-surface-container-high">
                @if(!empty($promo->banner_img))
                    <img class="w-full h-full object-cover" alt="{{ $promo->judul_promo }} Banner" src="{{ asset('storage/' . $promo->banner_img) }}"/>
                @else
                    <div class="w-full h-full flex items-center justify-center text-on-surface-variant">No Image Provided</div>
                @endif
                <div class="absolute top-sm right-sm px-xs py-[2px] rounded text-[10px] font-bold uppercase tracking-widest {{ $promo->status === 'AKTIF' ? 'bg-primary-container text-on-primary-container' : 'bg-surface-variant text-on-surface-variant' }}">
                    {{ $promo->status }}
                </div>
            </div>
            
            <div class="p-md flex flex-col flex-1">
                <div class="mb-sm">
                    <div class="flex items-center gap-xs mb-xs">
                        <span class="text-[10px] bg-primary/10 text-primary px-xs py-0.5 rounded font-bold uppercase tracking-wider border border-primary/20">{{ $promo->tipe_promo }}</span>
                        @if($promo->tipe_promo === 'EVENT')
                            <span class="text-[10px] bg-secondary-container/20 text-secondary px-xs py-0.5 rounded font-bold border border-secondary/30">{{ $promo->jam_mulai }} - {{ $promo->jam_selesai }} WIB</span>
                        @endif
                    </div>
                    <h3 class="promo-title font-headline-md text-headline-md text-primary mb-xs">{{ $promo->judul_promo }}</h3>
                    <p class="promo-desc text-on-surface-variant text-body-sm line-clamp-2">{{ $promo->deskripsi }}</p>
                </div>
                
                <div class="mt-auto space-y-md">
                    <div class="flex items-center justify-between text-[13px] text-on-surface-variant/80 border-t border-outline-variant/30 pt-sm">
                        <span class="flex items-center gap-xs data-countdown" 
                              data-expire="{{ \Carbon\Carbon::parse($promo->tanggal_berakhir)->format('Y-m-d') }}T{{ $promo->tipe_promo === 'EVENT' ? $promo->jam_selesai . ':00' : '23:59:59' }}">
                            <span class="material-symbols-outlined text-[16px]">timer</span>
                            <span class="countdown-text">Calculating...</span>
                        </span>
                        
                        @if($promo->tipe_promo === 'VOUCHER')
                            <span class="font-bold text-primary promo-code">CODE: {{ $promo->kode_promo }}</span>
                        @else
                            <span class="font-bold text-secondary">AUTOMATIC EVENT</span>
                        @endif
                    </div>
                    
                    <div class="flex gap-sm">
                        <button type="button" 
                                class="btn-edit-promo flex-1 py-xs border border-outline-variant hover:border-primary hover:text-primary text-on-surface-variant rounded font-label-md transition-all flex justify-center items-center gap-xs"
                                data-id="{{ $promo->id }}"
                                data-judul="{{ $promo->judul_promo }}"
                                data-deskripsi="{{ $promo->deskripsi }}"
                                data-tipe="{{ $promo->tipe_promo }}"
                                data-kode="{{ $promo->kode_promo }}"
                                data-mulai="{{ $promo->jam_mulai }}"
                                data-selesai="{{ $promo->jam_selesai }}"
                                data-expire="{{ \Carbon\Carbon::parse($promo->tanggal_berakhir)->format('Y-m-d') }}"
                                data-status="{{ $promo->status }}">
                            <span class="material-symbols-outlined text-[18px]">edit</span>
                            Edit
                        </button>
                        
                        <form action="{{ route('admin.promo.delete', $promo->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus campaign promo ini secara permanen?')" class="flex-1 inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full py-xs border border-error/30 hover:bg-error/10 text-error/80 hover:text-error rounded font-label-md transition-all flex justify-center items-center gap-xs">
                                <span class="material-symbols-outlined text-[18px]">delete</span>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full py-xl text-center text-on-surface-variant border border-dashed border-outline-variant rounded-xl">
            <span class="material-symbols-outlined text-[48px] text-outline mb-xs">sell</span>
            <p class="font-headline-md">Belum ada campaign promo terdaftar.</p>
        </div>
    @endforelse

    <button id="cardAddPromoPlaceholder" class="border-2 border-dashed border-outline-variant rounded-xl flex flex-col items-center justify-center p-xl group hover:border-primary-container hover:bg-primary-container/5 transition-all min-h-[300px]">
        <div class="w-16 h-16 rounded-full bg-surface-container flex items-center justify-center mb-md group-hover:bg-primary-container group-hover:scale-110 transition-all">
            <span class="material-symbols-outlined text-on-surface-variant group-hover:text-on-primary-container text-[32px]">add</span>
        </div>
        <p class="font-headline-md text-on-surface-variant group-hover:text-primary">Create New Campaign</p>
        <p class="text-body-sm text-on-surface-variant/60 text-center mt-xs">Draft a new promotion to boost your lounge engagement.</p>
    </button>
</section>

<div id="modalTambahPromo" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="absolute inset-0 bg-background/80 backdrop-blur-sm JSON-close-modal"></div>
    <div class="glass-card neon-border relative w-full max-w-lg p-lg rounded-xl bg-surface-container-high z-10 space-y-md border border-outline-variant">
        <div class="flex items-center justify-between border-b border-outline-variant/30 pb-xs">
            <h3 class="font-headline-md text-headline-md text-on-surface">Tambah Promo Baru</h3>
            <button type="button" class="text-on-surface-variant hover:text-error JSON-close-modal">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <form action="{{ route('admin.promo.store') }}" method="POST" enctype="multipart/form-data" class="space-y-sm">
            @csrf
            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Judul Promo Campaign</label>
                <input type="text" name="judul_promo" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
            </div>

            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Deskripsi Detail</label>
                <textarea name="deskripsi" rows="3" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none resize-none"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-sm">
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Tipe Promo</label>
                    <select name="tipe_promo" id="add_tipe_promo" class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none">
                        <option value="VOUCHER">Claimable Voucher</option>
                        <option value="EVENT">Limited Time Event</option>
                    </select>
                </div>
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Tanggal Berakhir</label>
                    <input type="date" name="tanggal_berakhir" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
                </div>
            </div>

            <div id="add_field_voucher" class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Kode Promo Voucher (e.g. HAPPY50)</label>
                <input type="text" name="kode_promo" id="add_kode_promo" class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
            </div>

            <div id="add_field_event" class="grid grid-cols-2 gap-sm hidden">
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Jam Mulai Event (e.g. 10:00)</label>
                    <input type="text" name="jam_mulai" id="add_jam_mulai" placeholder="10:00" class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
                </div>
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Jam Selesai Event (e.g. 14:00)</label>
                    <input type="text" name="jam_selesai" id="add_jam_selesai" placeholder="14:00" class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
                </div>
            </div>

            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Banner Image</label>
                <input type="file" name="banner_img" required class="text-body-sm text-on-surface-variant file:mr-md file:py-xs file:px-sm file:rounded-md file:border-0 file:text-label-md file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer"/>
            </div>

            <div class="flex justify-end gap-sm pt-sm border-t border-outline-variant/30 mt-md">
                <button type="button" class="JSON-close-modal bg-surface-variant text-on-surface px-md py-sm rounded-lg font-label-md transition-all">Batal</button>
                <button type="submit" class="bg-primary text-on-primary px-md py-sm rounded-lg font-label-md shadow-[0_0_10px_rgba(0,242,255,0.3)] hover:brightness-110 transition-all">Simpan Promo</button>
            </div>
        </form>
    </div>
</div>

<div id="modalEditPromo" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="absolute inset-0 bg-background/80 backdrop-blur-sm JSON-close-edit-modal"></div>
    <div class="glass-card neon-border relative w-full max-w-lg p-lg rounded-xl bg-surface-container-high z-10 space-y-md border border-outline-variant">
        <div class="flex items-center justify-between border-b border-outline-variant/30 pb-xs">
            <h3 class="font-headline-md text-headline-md text-on-surface">Edit Data Promo Campaign</h3>
            <button type="button" class="text-on-surface-variant hover:text-error JSON-close-edit-modal">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <form id="formEditPromo" method="POST" enctype="multipart/form-data" class="space-y-sm">
            @csrf
            @method('PUT')
            
            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Judul Promo Campaign</label>
                <input type="text" name="judul_promo" id="edit_judul" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
            </div>

            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Deskripsi Detail</label>
                <textarea name="deskripsi" id="edit_deskripsi" rows="3" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none resize-none"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-sm">
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Tipe Promo</label>
                    <select name="tipe_promo" id="edit_tipe_promo" class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none">
                        <option value="VOUCHER">Claimable Voucher</option>
                        <option value="EVENT">Limited Time Event</option>
                    </select>
                </div>
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Tanggal Berakhir</label>
                    <input type="date" name="tanggal_berakhir" id="edit_expire" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
                </div>
            </div>

            <div id="edit_field_voucher" class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Kode Promo Voucher</label>
                <input type="text" name="kode_promo" id="edit_kode_promo" class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
            </div>

            <div id="edit_field_event" class="grid grid-cols-2 gap-sm hidden">
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Jam Mulai Event</label>
                    <input type="text" name="jam_mulai" id="edit_jam_mulai" class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
                </div>
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Jam Selesai Event</label>
                    <input type="text" name="jam_selesai" id="edit_jam_selesai" class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-sm">
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Status</label>
                    <select name="status" id="edit_status" class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none">
                        <option value="AKTIF">AKTIF</option>
                        <option value="TIDAK_AKTIF">TIDAK AKTIF</option>
                    </select>
                </div>
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Ganti Banner (Opsional)</label>
                    <input type="file" name="banner_img" class="text-body-sm text-on-surface-variant file:mr-sm file:py-xs file:px-sm file:rounded-md file:border-0 file:text-label-md file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer"/>
                </div>
            </div>

            <div class="flex justify-end gap-sm pt-sm border-t border-outline-variant/30 mt-md">
                <button type="button" class="JSON-close-edit-modal bg-surface-variant text-on-surface px-md py-sm rounded-lg font-label-md transition-all">Batal</button>
                <button type="submit" class="bg-primary text-on-primary px-md py-sm rounded-lg font-label-md shadow-[0_0_10px_rgba(0,242,255,0.3)] hover:brightness-110 transition-all">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // --- CONTROL 1: INTERAKSI MODAL WINDOWS ---
        const modalTambah = document.getElementById('modalTambahPromo');
        const modalEdit = document.getElementById('modalEditPromo');
        
        document.getElementById('btnTambahPromo').addEventListener('click', () => modalTambah.classList.remove('hidden'));
        document.getElementById('cardAddPromoPlaceholder').addEventListener('click', () => modalTambah.classList.remove('hidden'));
        
        document.querySelectorAll('.JSON-close-modal').forEach(btn => btn.addEventListener('click', () => modalTambah.classList.add('hidden')));
        document.querySelectorAll('.JSON-close-edit-modal').forEach(btn => btn.addEventListener('click', () => modalEdit.classList.add('hidden')));

        // --- CONTROL 2: DINAMIS FORM FIELD (TAMBAH) ---
        const selectAddType = document.getElementById('add_tipe_promo');
        const fieldAddVoucher = document.getElementById('add_field_voucher');
        const fieldAddEvent = document.getElementById('add_field_event');

        selectAddType.addEventListener('change', function() {
            if(this.value === 'VOUCHER') {
                fieldAddVoucher.classList.remove('hidden');
                fieldAddEvent.classList.add('hidden');
                document.getElementById('add_kode_promo').required = true;
                document.getElementById('add_jam_mulai').required = false;
                document.getElementById('add_jam_selesai').required = false;
            } else {
                fieldAddVoucher.classList.add('hidden');
                fieldAddEvent.classList.remove('hidden');
                document.getElementById('add_kode_promo').required = false;
                document.getElementById('add_jam_mulai').required = true;
                document.getElementById('add_jam_selesai').required = true;
            }
        });

        // --- CONTROL 3: DINAMIS FORM FIELD (EDIT) ---
        const selectEditType = document.getElementById('edit_tipe_promo');
        const fieldEditVoucher = document.getElementById('edit_field_voucher');
        const fieldEditEvent = document.getElementById('edit_field_event');

        function toggleEditFields(typeValue) {
            if(typeValue === 'VOUCHER') {
                fieldEditVoucher.classList.remove('hidden');
                fieldEditEvent.classList.add('hidden');
            } else {
                fieldEditVoucher.classList.add('hidden');
                fieldEditEvent.classList.remove('hidden');
            }
        }
        selectEditType.addEventListener('change', function() { toggleEditFields(this.value); });

        // --- CONTROL 4: AUTO-FILL DATA EDIT MODAL ---
        const btnEdits = document.querySelectorAll('.btn-edit-promo');
        const formEdit = document.getElementById('formEditPromo');

        btnEdits.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const judul = this.getAttribute('data-judul');
                const deskripsi = this.getAttribute('data-deskripsi');
                const tipe = this.getAttribute('data-tipe');
                const kode = this.getAttribute('data-kode');
                const mulai = this.getAttribute('data-mulai');
                const selesai = this.getAttribute('data-selesai');
                const expire = this.getAttribute('data-expire');
                const status = this.getAttribute('data-status');

                formEdit.setAttribute('action', `/admin/promo/update/${id}`);
                
                document.getElementById('edit_judul').value = judul;
                document.getElementById('edit_deskripsi').value = deskripsi;
                document.getElementById('edit_tipe_promo').value = tipe;
                document.getElementById('edit_expire').value = expire.substring(0, 10); 
                document.getElementById('edit_status').value = status;
                document.getElementById('edit_kode_promo').value = kode;
                document.getElementById('edit_jam_mulai').value = mulai;
                document.getElementById('edit_jam_selesai').value = selesai;

                toggleEditFields(tipe);
                modalEdit.classList.remove('hidden');
            });
        });

        // --- CONTROL 5: CLIENT-SIDE REAL-TIME COUNTDOWN TIMER (PERBAIKAN SINKRONISASI ISO) ---
        const countdownElements = document.querySelectorAll('.data-countdown');
        
        function updateAllCountdowns() {
            const now = new Date().getTime();
            
            countdownElements.forEach(elem => {
                const expireDateStr = elem.getAttribute('data-expire');
                
                // Amankan pembacaan string ISO (YYYY-MM-DDTHH:mm:ss) dari Blade
                const targetTime = new Date(expireDateStr).getTime();
                const textNode = elem.querySelector('.countdown-text');

                if (isNaN(targetTime)) {
                    textNode.innerHTML = "Time Error";
                    return;
                }

                const diff = targetTime - now;

                if (diff <= 0) {
                    textNode.innerHTML = "Expired / Ended";
                    elem.classList.remove('text-on-surface-variant');
                    elem.classList.add('text-error');
                } else {
                    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                    if (days > 0) {
                        textNode.innerHTML = `${days}d ${hours}h left`;
                    } else if (hours > 0) {
                        textNode.innerHTML = `${hours}h ${minutes}m left`;
                    } else {
                        textNode.innerHTML = `${minutes}m ${seconds}s left`;
                    }
                }
            });
        }
        
        if(countdownElements.length > 0) {
            updateAllCountdowns();
            setInterval(updateAllCountdowns, 1000);
        }

        // --- CONTROL 6: LIVE SEARCH CAMPAIGN FILTERING ---
        const searchInput = document.getElementById('promoSearchInput');
        const promoCards = document.querySelectorAll('.promo-card');

        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                const term = e.target.value.toLowerCase();
                promoCards.forEach(card => {
                    const title = card.querySelector('.promo-title').textContent.toLowerCase();
                    const desc = card.querySelector('.promo-desc').textContent.toLowerCase();
                    const codeElement = card.querySelector('.promo-code');
                    const code = codeElement ? codeElement.textContent.toLowerCase() : '';

                    if (title.includes(term) || desc.includes(term) || code.includes(term)) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        }

        // --- CONTROL 7: STICKY HEADER EFFECTS ---
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (header) {
                if (window.scrollY > 20) {
                    header.classList.add('shadow-[0_4px_30px_rgba(0,242,255,0.1)]');
                } else {
                    header.classList.remove('shadow-[0_4px_30px_rgba(0,242,255,0.1)]');
                }
            }
        });
    });
</script>
@endsection
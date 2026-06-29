@extends('layouts.admin')

@section('content')
<header class="h-xl flex items-center justify-between px-gutter border-b border-outline-variant/30 bg-surface/50 backdrop-blur-md sticky top-0 z-40">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-on-surface">Game Library</h2>
        <p class="font-body-sm text-body-sm text-on-surface-variant">Manage all available games across NetCity tiers</p>
    </div>
    <div class="flex items-center gap-md">
        <div class="flex items-center gap-sm bg-surface-container-high px-sm py-xs rounded-full border border-outline-variant">
            <img class="w-8 h-8 rounded-full border border-primary/30 object-cover" alt="Admin Avatar" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCRu2RxVwHNFhWKWYuo9QfTvKxEi2RTqX782dbSvQuPuM7ZV6nM6uSmCa78j-LtGfi2cmuuVzVHN9QlscEqBj4xOgr3lR9mzrQNwtcGnhRUNHyQORbZhL_Udxs6sQmNRq7ASMnBdspYLxBL_0hJgL8a1_nwoLXMmxiBjGmxFQ2OOOtOvr3E9hzBn0aU_vQUEixmJqfJLpiVTtoE_hp8qhTJ81XXLdX9hNqfc1BJKR9ry3GEFGDeXoQJ2yjk8WhH01YoAYFk1NL7s3I"/>
            <div class="hidden sm:block">
                <p class="font-label-md text-label-md text-on-surface">Admin Panel</p>
                <p class="text-[10px] text-on-surface-variant uppercase tracking-wider">System Administrator</p>
            </div>
        </div>
        <button id="btnTambahGame" class="bg-primary-container text-on-primary-container px-md py-sm rounded-lg font-label-md text-label-md flex items-center gap-xs neon-glow hover:brightness-110 transition-all">
            <span class="material-symbols-outlined text-[20px]">sports_esports</span>
            Tambah Game
        </button>
    </div>
</header>

<div class="p-gutter space-y-lg">
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

    <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
        <div class="glass-card neon-border-top p-md rounded-xl flex items-center justify-between">
            <div>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-xs">Total Games</p>
                <h3 class="font-display-lg text-headline-lg text-primary">{{ $totalGames }}</h3>
            </div>
            <div class="bg-primary/10 p-sm rounded-full">
                <span class="material-symbols-outlined text-primary text-[32px]">inventory_2</span>
            </div>
        </div>
        <div class="glass-card neon-border-top p-md rounded-xl flex items-center justify-between">
            <div>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-xs">Most Played Genre</p>
                <h3 class="font-display-lg text-headline-lg text-primary">{{ strtoupper($mostPlayedGenre) }}</h3>
            </div>
            <div class="bg-primary/10 p-sm rounded-full">
                <span class="material-symbols-outlined text-primary text-[32px]">target</span>
            </div>
        </div>
        <div class="glass-card neon-border-top p-md rounded-xl flex items-center justify-between">
            <div>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-xs">Storage Used</p>
                <h3 class="font-display-lg text-headline-lg text-primary">4.2 <span class="text-body-sm">/ 8 TB</span></h3>
                <div class="w-full bg-surface-container-highest h-1 rounded-full mt-sm overflow-hidden">
                    <div class="bg-primary h-full w-[52.5%] shadow-[0_0_8px_#00f2ff]"></div>
                </div>
            </div>
            <div class="bg-primary/10 p-sm rounded-full">
                <span class="material-symbols-outlined text-primary text-[32px]">hard_drive</span>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.game-library.index') }}" method="GET" class="flex flex-col md:flex-row gap-md items-center justify-between">
        <div class="relative w-full md:w-96">
            <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-outline">search</span>
            <input name="search" value="{{ request('search') }}" class="w-full bg-surface-container-low border-outline-variant text-on-surface pl-xl py-sm rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/30 transition-all font-body-sm" placeholder="Search by game title or developer..." type="text"/>
        </div>
        <div class="flex gap-sm w-full md:w-auto">
            <select name="genre" onchange="this.form.submit()" class="bg-surface-container-low border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary">
                <option value="">Genre: All</option>
                <option value="FPS" {{ request('genre') == 'FPS' ? 'selected' : '' }}>FPS</option>
                <option value="MOBA" {{ request('genre') == 'MOBA' ? 'selected' : '' }}>MOBA</option>
                <option value="RPG" {{ request('genre') == 'RPG' ? 'selected' : '' }}>RPG</option>
                <option value="Battle Royale" {{ request('genre') == 'Battle Royale' ? 'selected' : '' }}>Battle Royale</option>
                <option value="Racing" {{ request('genre') == 'Racing' ? 'selected' : '' }}>Racing</option>
            </select>
            
            @if(request('search') || request('genre'))
                <a href="{{ route('admin.game-library.index') }}" class="bg-surface-variant text-on-surface px-md py-sm rounded-lg font-body-sm flex items-center hover:bg-surface-bright transition-all">
                    Reset
                </a>
            @endif
        </div>
    </form>

    <div class="glass-card rounded-xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface-container-high border-b border-outline-variant/30 whitespace-nowrap">
                    <th class="pl-md pr-sm py-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-widest w-24 min-w-max">ID</th>
                    <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-widest">Game Title & Developer</th>
                    <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-widest w-36">Genre</th>
                    <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-widest text-center w-28">Min. RAM</th>
                    <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-widest">Tier Availability</th>
                    <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-widest text-right w-28">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline-variant/10">
                @forelse($games as $game)
                    <tr class="hover:bg-primary/5 transition-colors group">
                        <td class="pl-md pr-sm py-md font-body-sm text-primary font-mono whitespace-nowrap w-24">
                            {{ $game->id }}
                        </td>
                        
                        <td class="px-md py-md min-w-[250px]">
                            <div class="flex items-center gap-md">
                                <div class="w-20 h-12 rounded overflow-hidden flex-shrink-0 border border-outline-variant group-hover:border-primary/50 transition-colors bg-surface-container">
                                    @if(!empty($game->image))
                                        <img class="w-full h-full object-cover" alt="{{ $game->judul_game }} Cover" src="{{ asset('storage/' . $game->image) }}"/>
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-[10px] text-on-surface-variant text-center p-xs">No Img</div>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-body-md text-on-surface font-semibold">{{ $game->judul_game }}</p>
                                    <p class="text-[12px] text-on-surface-variant">{{ $game->developer }}</p>
                                </div>
                            </div>
                        </td>
                        
                        <td class="px-md py-md">
                            <span class="inline-flex items-center justify-center bg-primary-container/10 text-primary-container px-sm py-1 rounded text-[10px] font-bold uppercase tracking-wider border border-primary/20 text-center max-w-[120px] leading-tight breakdown-words">
                                {{ $game->genre }}
                            </span>
                        </td>
                        
                        <td class="px-md py-md text-center font-body-sm">{{ $game->min_ram }}</td>
                        
                        <td class="px-md py-md">
                            <div class="flex flex-wrap gap-xs">
                                @if(!empty($game->tier))
                                    @foreach(explode(',', $game->tier) as $tierName)
                                        @if(trim(strtolower($tierName)) == 'vip')
                                            <span class="text-[10px] bg-secondary-container/20 text-secondary px-xs py-0.5 rounded border border-secondary/30 font-bold">VIP</span>
                                        @elseif(trim(strtolower($tierName)) == 'gold')
                                            <span class="text-[10px] bg-amber-500/10 text-amber-400 px-xs py-0.5 rounded border border-amber-500/30 font-bold">GOLD</span>
                                        @elseif(trim(strtolower($tierName)) == 'silver')
                                            <span class="text-[10px] bg-slate-400/10 text-slate-300 px-xs py-0.5 rounded border border-slate-400/30 font-bold">SILVER</span>
                                        @elseif(trim(strtolower($tierName)) == 'bronze')
                                            <span class="text-[10px] bg-orange-700/10 text-orange-400 px-xs py-0.5 rounded border border-orange-700/30 font-bold">BRONZE</span>
                                        @else
                                            <span class="text-[10px] bg-surface-variant text-on-surface-variant px-xs py-0.5 rounded border border-outline-variant">{{ $tierName }}</span>
                                        @endif
                                    @endforeach
                                @else
                                    <span class="text-[10px] text-on-surface-variant/50 italic">None</span>
                                @endif
                            </div>
                        </td>
                        
                        <td class="px-md py-md text-right">
                            <div class="flex justify-end gap-sm">
                                <button type="button" 
                                        class="btn-edit-game p-xs text-on-surface-variant hover:text-primary transition-colors"
                                        data-id="{{ $game->id }}"
                                        data-judul="{{ $game->judul_game }}"
                                        data-developer="{{ $game->developer }}"
                                        data-min-ram="{{ $game->min_ram }}"
                                        data-genre="{{ $game->genre }}"
                                        data-tier="{{ $game->tier }}">
                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                </button>
                                
                                <form action="{{ route('admin.game-library.delete', $game->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus game {{ $game->judul_game }} dari pustaka NetCity?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-xs text-on-surface-variant hover:text-error transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-md py-xl text-center font-body-sm text-on-surface-variant">
                             Tidak ada data game ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="px-md py-md bg-surface-container-low flex flex-col md:flex-row items-center justify-between gap-md border-t border-outline-variant/10">
            <p class="font-body-sm text-body-sm text-on-surface-variant">
                Showing {{ $games->firstItem() ?? 0 }} to {{ $games->lastItem() ?? 0 }} of {{ $games->total() }} entries
            </p>
            <div class="flex items-center gap-xs">
                {{-- Link Pagination Bawaan Laravel --}}
                {{ $games->links() }}
            </div>
        </div>
    </div>
</div>

<div id="modalTambahGame" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="absolute inset-0 bg-background/80 backdrop-blur-sm JSON-close-modal"></div>
    
    <div class="glass-card neon-border relative w-full max-w-lg p-lg rounded-xl bg-surface-container-high z-10 space-y-md border border-outline-variant">
        <div class="flex items-center justify-between border-b border-outline-variant/30 pb-xs">
            <h3 class="font-headline-md text-headline-md text-on-surface">Tambah Game Baru</h3>
            <button type="button" class="text-on-surface-variant hover:text-error JSON-close-modal">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <form action="{{ route('admin.game-library.store') }}" method="POST" enctype="multipart/form-data" class="space-y-sm">
            @csrf
            
            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">ID Game (Contoh: NC-G-05)</label>
                <input type="text" name="id" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
            </div>

            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Nama Game</label>
                <input type="text" name="nama_game" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
            </div>

            <div class="grid grid-cols-2 gap-sm">
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Developer</label>
                    <input type="text" name="developer" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
                </div>
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Min. RAM</label>
                    <input type="text" name="min_ram" placeholder="e.g. 8GB" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
                </div>
            </div>

            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Genre</label>
                <select name="genre" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none">
                    <option value="FPS">FPS</option>
                    <option value="MOBA">MOBA</option>
                    <option value="RPG">RPG</option>
                    <option value="Battle Royale">Battle Royale</option>
                    <option value="Racing">Racing</option>
                </select>
            </div>

            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant mb-xs">Tier Availability</label>
                <div class="flex flex-wrap gap-md">
                    <label class="flex items-center gap-xs text-body-sm text-on-surface cursor-pointer">
                        <input type="checkbox" name="tier[]" value="VIP" class="rounded border-outline-variant bg-surface-container-low text-primary focus:ring-primary/30"> VIP
                    </label>
                    <label class="flex items-center gap-xs text-body-sm text-on-surface cursor-pointer">
                        <input type="checkbox" name="tier[]" value="Gold" class="rounded border-outline-variant bg-surface-container-low text-primary focus:ring-primary/30"> Gold
                    </label>
                    <label class="flex items-center gap-xs text-body-sm text-on-surface cursor-pointer">
                        <input type="checkbox" name="tier[]" value="Silver" class="rounded border-outline-variant bg-surface-container-low text-primary focus:ring-primary/30"> Silver
                    </label>
                    <label class="flex items-center gap-xs text-body-sm text-on-surface cursor-pointer">
                        <input type="checkbox" name="tier[]" value="Bronze" class="rounded border-outline-variant bg-surface-container-low text-primary focus:ring-primary/30"> Bronze
                    </label>
                </div>
            </div>

            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Cover Image</label>
                <input type="file" name="cover_img" class="text-body-sm text-on-surface-variant file:mr-md file:py-xs file:px-sm file:rounded-md file:border-0 file:text-label-md file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer"/>
            </div>

            <div class="flex justify-end gap-sm pt-sm border-t border-outline-variant/30 mt-md">
                <button type="button" class="JSON-close-modal bg-surface-variant text-on-surface px-md py-sm rounded-lg font-label-md transition-all">Batal</button>
                <button type="submit" class="bg-primary text-on-primary px-md py-sm rounded-lg font-label-md shadow-[0_0_10px_rgba(0,242,255,0.3)] hover:brightness-110 transition-all">Simpan Game</button>
            </div>
        </form>
    </div>
</div>

<div id="modalEditGame" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="absolute inset-0 bg-background/80 backdrop-blur-sm JSON-close-edit-modal"></div>
    
    <div class="glass-card neon-border relative w-full max-w-lg p-lg rounded-xl bg-surface-container-high z-10 space-y-md border border-outline-variant">
        <div class="flex items-center justify-between border-b border-outline-variant/30 pb-xs">
            <h3 class="font-headline-md text-headline-md text-on-surface">Edit Data Game</h3>
            <button type="button" class="text-on-surface-variant hover:text-error JSON-close-edit-modal">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <form id="formEditGame" method="POST" enctype="multipart/form-data" class="space-y-sm">
            @csrf
            @method('PUT') {{-- WAJIB untuk Update Route Laravel --}}
            
            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">ID Game (Tidak dapat diubah)</label>
                <input type="text" id="edit_id" disabled class="bg-surface-container-low border border-outline-variant text-on-surface-variant/50 rounded-lg px-md py-sm font-body-sm opacity-60 focus:outline-none"/>
            </div>

            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Nama Game</label>
                <input type="text" name="nama_game" id="edit_judul" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
            </div>

            <div class="grid grid-cols-2 gap-sm">
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Developer</label>
                    <input type="text" name="developer" id="edit_developer" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
                </div>
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Min. RAM</label>
                    <input type="text" name="min_ram" id="edit_min_ram" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
                </div>
            </div>

            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Genre</label>
                <select name="genre" id="edit_genre" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none">
                    <option value="FPS">FPS</option>
                    <option value="MOBA">MOBA</option>
                    <option value="RPG">RPG</option>
                    <option value="Battle Royale">Battle Royale</option>
                    <option value="Racing">Racing</option>
                </select>
            </div>

            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant mb-xs">Tier Availability</label>
                <div class="flex flex-wrap gap-md">
                    <label class="flex items-center gap-xs text-body-sm text-on-surface cursor-pointer">
                        <input type="checkbox" name="tier[]" id="edit_tier_vip" value="VIP" class="rounded border-outline-variant bg-surface-container-low text-primary focus:ring-primary/30"> VIP
                    </label>
                    <label class="flex items-center gap-xs text-body-sm text-on-surface cursor-pointer">
                        <input type="checkbox" name="tier[]" id="edit_tier_gold" value="Gold" class="rounded border-outline-variant bg-surface-container-low text-primary focus:ring-primary/30"> Gold
                    </label>
                    <label class="flex items-center gap-xs text-body-sm text-on-surface cursor-pointer">
                        <input type="checkbox" name="tier[]" id="edit_tier_silver" value="Silver" class="rounded border-outline-variant bg-surface-container-low text-primary focus:ring-primary/30"> Silver
                    </label>
                    <label class="flex items-center gap-xs text-body-sm text-on-surface cursor-pointer">
                        <input type="checkbox" name="tier[]" id="edit_tier_bronze" value="Bronze" class="rounded border-outline-variant bg-surface-container-low text-primary focus:ring-primary/30"> Bronze
                    </label>
                </div>
            </div>

            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Cover Image (Kosongkan jika tidak ingin mengubah)</label>
                <input type="file" name="cover_img" class="text-body-sm text-on-surface-variant file:mr-md file:py-xs file:px-sm file:rounded-md file:border-0 file:text-label-md file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer"/>
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
        // --- LOGIK MODAL TAMBAH ---
        const btnTambah = document.getElementById('btnTambahGame');
        const modalTambah = document.getElementById('modalTambahGame');
        const btnCloseTambah = document.querySelectorAll('.JSON-close-modal');

        if (btnTambah && modalTambah) {
            btnTambah.addEventListener('click', () => modalTambah.classList.remove('hidden'));
        }
        btnCloseTambah.forEach(btn => btn.addEventListener('click', () => modalTambah.classList.add('hidden')));

        // --- LOGIK MODAL EDIT & AUTO-FILL ---
        const modalEdit = document.getElementById('modalEditGame');
        const formEdit = document.getElementById('formEditGame');
        const btnCloseEdit = document.querySelectorAll('.JSON-close-edit-modal');
        const btnEdits = document.querySelectorAll('.btn-edit-game');

        btnEdits.forEach(button => {
            button.addEventListener('click', function () {
                // 1. Ambil data dari atribut tombol yang diklik
                const id = this.getAttribute('data-id');
                const judul = this.getAttribute('data-judul');
                const developer = this.getAttribute('data-developer');
                const minRam = this.getAttribute('data-min-ram');
                const genre = this.getAttribute('data-genre');
                const tierString = this.getAttribute('data-tier') || '';

                // 2. Set action form secara dinamis mengarah ke rute update Laravel
                formEdit.setAttribute('action', `/admin/game-library/update/${id}`);

                // 3. Inject value data lama ke dalam input form edit
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_judul').value = judul;
                document.getElementById('edit_developer').value = developer;
                document.getElementById('edit_min_ram').value = minRam;
                document.getElementById('edit_genre').value = genre;

                // 4. Reset checkbox tier terlebih dahulu, lalu centang kembali yang sesuai
                document.getElementById('edit_tier_vip').checked = false;
                document.getElementById('edit_tier_gold').checked = false;
                document.getElementById('edit_tier_silver').checked = false;
                document.getElementById('edit_tier_bronze').checked = false;

                const activeTiers = tierString.split(',').map(item => item.trim().toLowerCase());
                if(activeTiers.includes('vip')) document.getElementById('edit_tier_vip').checked = true;
                if(activeTiers.includes('gold')) document.getElementById('edit_tier_gold').checked = true;
                if(activeTiers.includes('silver')) document.getElementById('edit_tier_silver').checked = true;
                if(activeTiers.includes('bronze')) document.getElementById('edit_tier_bronze').checked = true;

                // 5. Tampilkan Modal Edit
                modalEdit.classList.remove('hidden');
            });
        });

        // Tutup Modal Edit
        btnCloseEdit.forEach(btn => btn.addEventListener('click', () => modalEdit.classList.add('hidden')));
    });
</script>
@endsection
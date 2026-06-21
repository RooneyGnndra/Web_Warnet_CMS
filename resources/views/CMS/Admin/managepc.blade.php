@extends('layouts.admin')

@section('content')
    <div class="absolute -top-[10%] -right-[10%] w-[500px] h-[500px] bg-primary/5 rounded-full blur-[120px] pointer-events-none"></div>

    @if(session('success'))
        <div class="mb-md p-sm bg-primary-container/20 border border-primary text-primary-container rounded-lg flex items-center gap-xs font-body-sm shadow-[0_0_15px_rgba(0,242,255,0.1)]">
            <span class="material-symbols-outlined">check_circle</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <header class="flex justify-between items-end mb-lg">
        <div>
            <nav class="flex items-center gap-xs text-on-surface-variant text-label-md mb-xs">
                <span>Admin</span>
                <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                <span class="text-primary">Manajemen PC</span>
            </nav>
            <h2 class="font-headline-lg text-headline-lg text-primary tracking-tight">Manajemen PC</h2>
        </div>
        <button onclick="openModal('createModal')" class="px-md py-sm bg-primary-container text-on-primary font-bold rounded-lg flex items-center gap-xs hover:shadow-[0_0_20px_rgba(0,242,255,0.5)] active:scale-95 transition-all duration-300">
            <span class="material-symbols-outlined">desktop_windows</span>
            <span>Tambah PC</span>
        </button>
    </header>

    <div class="grid grid-cols-12 gap-gutter mb-lg">
        <div class="col-span-12 md:col-span-4 glass-card p-md rounded-xl neon-border-top relative overflow-hidden group">
            <div class="absolute bottom-0 right-0 p-xs opacity-10 group-hover:opacity-20 transition-opacity">
                <span class="material-symbols-outlined text-[80px]">check_circle</span>
            </div>
            <p class="text-on-surface-variant font-label-md mb-xs">Total PC Online</p>
            <h3 class="text-primary font-headline-lg text-[40px]">{{ $totalOnline }} <span class="text-headline-md text-on-surface-variant">/ {{ $totalPC }}</span></h3>
            <div class="mt-sm w-full bg-surface-variant h-1 rounded-full overflow-hidden">
                <div class="bg-primary-container h-full w-[84%]"></div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-3 glass-card p-md rounded-xl border-t border-tertiary-container/20">
            <p class="text-on-surface-variant font-label-md mb-xs">Tier Favorit</p>
            <h3 class="text-tertiary font-headline-md">VIP Platinum</h3>
            <p class="text-on-surface-variant text-body-sm mt-xs">92% Okupansi</p>
        </div>
        <div class="col-span-12 md:col-span-5 glass-card p-md rounded-xl border-t border-error/20 flex items-center justify-between">
            <div>
                <p class="text-on-surface-variant font-label-md mb-xs">Status Pemeliharaan</p>
                <h3 class="text-error font-headline-md">{{ $totalMaintenance }} Unit Maintenance</h3>
                <p class="text-on-surface-variant text-body-sm mt-xs">Sistem Terintegrasi</p>
            </div>
            <button class="p-sm rounded-full bg-error-container/20 text-error hover:bg-error-container/40 transition-colors">
                <span class="material-symbols-outlined">build</span>
            </button>
        </div>
    </div>

    <section class="glass-card p-md rounded-xl mb-md flex flex-wrap gap-md items-center justify-between">
        <div class="flex flex-1 min-w-[300px] relative">
            <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
            <input class="w-full pl-[52px] pr-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="Cari ID PC atau Nama..." type="text"/>
        </div>
        <div class="flex gap-sm">
            <div class="relative group">
                <select class="appearance-none bg-surface-container-lowest border border-outline-variant text-on-surface-variant text-body-sm rounded-lg pl-md pr-[40px] py-sm focus:border-primary outline-none cursor-pointer">
                    <option>Semua Tier</option>
                    <option>VIP</option>
                    <option>Gold</option>
                    <option>Silver</option>
                    <option>Bronze</option>
                </select>
                <span class="material-symbols-outlined absolute right-sm top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant text-[20px]">filter_alt</span>
            </div>
            <div class="relative group">
                <select class="appearance-none bg-surface-container-lowest border border-outline-variant text-on-surface-variant text-body-sm rounded-lg pl-md pr-[40px] py-sm focus:border-primary outline-none cursor-pointer">
                    <option>Semua Status</option>
                    <option>Online</option>
                    <option>Reserved</option>
                    <option>Maintenance</option>
                    <option>Offline</option>
                </select>
                <span class="material-symbols-outlined absolute right-sm top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant text-[20px]">expand_more</span>
            </div>
            <button class="p-sm bg-surface-container-high rounded-lg text-on-surface-variant hover:text-primary transition-colors">
                <span class="material-symbols-outlined">refresh</span>
            </button>
        </div>
    </section>

    <section class="glass-card rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-high/50 text-on-surface-variant font-label-md uppercase tracking-wider">
                        <th class="px-gutter py-md">PC ID</th>
                        <th class="px-gutter py-md">Name</th>
                        <th class="px-gutter py-md">Tier</th>
                        <th class="px-gutter py-md">Status</th>
                        <th class="px-gutter py-md text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/30">
                    @forelse($computers as $pc)
                        <tr class="hover:bg-primary/5 transition-colors group">
                            <td class="px-gutter py-md font-mono text-primary">{{ $pc->id_komputer }}</td>
                            <td class="px-gutter py-md font-semibold">{{ $pc->nama_komputer }}</td>
                            <td class="px-gutter py-md">
                                <span class="px-xs py-base bg-secondary-container/20 text-secondary border border-secondary/30 rounded-base text-[10px] font-bold uppercase">{{ $pc->tier }}</span>
                            </td>
                            <td class="px-gutter py-md">
                                <div class="flex items-center gap-xs">
                                    @if($pc->status == 'Online')
                                        <span class="w-2 h-2 rounded-full bg-primary-container shadow-[0_0_8px_#00f2ff]"></span>
                                        <span class="text-primary-container text-body-sm">Online</span>
                                    @elseif($pc->status == 'Reserved')
                                        <span class="w-2 h-2 rounded-full bg-secondary"></span>
                                        <span class="text-secondary text-body-sm">Reserved</span>
                                    @elseif($pc->status == 'Maintenance')
                                        <span class="w-2 h-2 rounded-full bg-error"></span>
                                        <span class="text-error text-body-sm">Maintenance</span>
                                    @else
                                        <span class="w-2 h-2 rounded-full bg-on-surface-variant"></span>
                                        <span class="text-on-surface-variant text-body-sm">Offline</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-gutter py-md text-right">
                                <div class="flex justify-end gap-sm">
                                    <button onclick="openEditModal({{ json_encode($pc) }})" class="text-on-surface-variant hover:text-primary-container transition-colors">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                    
                                    <form action="{{ route('admin.manage-pc.delete', $pc->id_komputer ?? 0) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus PC ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-on-surface-variant hover:text-error transition-colors">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-gutter py-md text-center text-on-surface-variant">Belum ada data unit PC di database.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-gutter py-md bg-surface-container-high/30 border-t border-outline-variant/30">
            {{ $computers->links() }}
        </div>
    </section>

    <footer class="mt-lg py-md border-t border-outline-variant flex flex-col md:flex-row justify-between items-center gap-xs opacity-80 hover:opacity-100 transition-all duration-300">
        <div class="flex items-center gap-sm">
            <span class="font-display-lg text-body-lg text-primary">NetCity</span>
            <p class="font-body-sm text-on-surface-variant">© 2024 NetCity Gaming Lounge. Manual billing must be processed at the cashier counter.</p>
        </div>
        <div class="flex gap-md">
            <a class="font-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#">Terms of Service</a>
            <a class="font-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#">Privacy Policy</a>
            <a class="font-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#">Contact Support</a>
        </div>
    </footer>

    <div id="createModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 items-center justify-center p-sm animate-fade-in">
        <div class="bg-[#181b25] border border-outline-variant rounded-xl w-full max-w-md p-md relative shadow-2xl">
            <h3 class="font-headline-md text-primary mb-md">Tambah Unit PC Baru</h3>
            <form action="{{ route('admin.manage-pc.store') }}" method="POST">
                @csrf
                <div class="space-y-sm font-body-sm">
                    <div>
                        <label class="block text-on-surface-variant text-label-md mb-xs">ID Komputer (Contoh: NC-PC-01)</label>
                        <input type="text" name="id_komputer" required class="w-full bg-[#0a0e17] border border-outline-variant rounded-lg p-xs text-on-surface focus:border-primary outline-none">
                    </div>
                    <div>
                        <label class="block text-on-surface-variant text-label-md mb-xs">Nama Komputer</label>
                        <input type="text" name="nama_komputer" required class="w-full bg-[#0a0e17] border border-outline-variant rounded-lg p-xs text-on-surface focus:border-primary outline-none">
                    </div>
                    <div>
                        <label class="block text-on-surface-variant text-label-md mb-xs">Tier Kategori</label>
                        <select name="tier" required class="w-full bg-[#0a0e17] border border-outline-variant rounded-lg p-xs text-on-surface focus:border-primary outline-none">
                            <option value="VIP">VIP</option>
                            <option value="GOLD">GOLD</option>
                            <option value="SILVER">SILVER</option>
                            <option value="BRONZE">BRONZE</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-on-surface-variant text-label-md mb-xs">Status Awal</label>
                        <select name="status" required class="w-full bg-[#0a0e17] border border-outline-variant rounded-lg p-xs text-on-surface focus:border-primary outline-none">
                            <option value="Offline">Offline</option>
                            <option value="Online">Online</option>
                            <option value="Reserved">Reserved</option>
                            <option value="Maintenance">Maintenance</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end gap-sm mt-lg">
                    <button type="button" onclick="closeModal('createModal')" class="px-md py-xs bg-surface-container-high rounded-lg text-on-surface-variant hover:text-primary">Batal</button>
                    <button type="submit" class="px-md py-xs bg-primary-container text-on-primary font-bold rounded-lg hover:shadow-[0_0_15px_rgba(0,242,255,0.4)]">Simpan PC</button>
                </div>
            </form>
        </div>
    </div>

    <div id="editModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 items-center justify-center p-sm">
        <div class="bg-[#181b25] border border-outline-variant rounded-xl w-full max-w-md p-md relative shadow-2xl">
            <h3 class="font-headline-md text-primary mb-md">Edit Data Unit <span id="edit_title"></span></h3>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-sm font-body-sm">
                    <div>
                        <label class="block text-on-surface-variant text-label-md mb-xs">Nama Komputer</label>
                        <input type="text" id="edit_nama" name="nama_komputer" required class="w-full bg-[#0a0e17] border border-outline-variant rounded-lg p-xs text-on-surface focus:border-primary outline-none">
                    </div>
                    <div>
                        <label class="block text-on-surface-variant text-label-md mb-xs">Tier Kategori</label>
                        <select id="edit_tier" name="tier" required class="w-full bg-[#0a0e17] border border-outline-variant rounded-lg p-xs text-on-surface focus:border-primary outline-none">
                            <option value="VIP">VIP</option>
                            <option value="GOLD">GOLD</option>
                            <option value="SILVER">SILVER</option>
                            <option value="BRONZE">BRONZE</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-on-surface-variant text-label-md mb-xs">Status Operasional</label>
                        <select id="edit_status" name="status" required class="w-full bg-[#0a0e17] border border-outline-variant rounded-lg p-xs text-on-surface focus:border-primary outline-none">
                            <option value="Offline">Offline</option>
                            <option value="Online">Online</option>
                            <option value="Reserved">Reserved</option>
                            <option value="Maintenance">Maintenance</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end gap-sm mt-lg">
                    <button type="button" onclick="closeModal('editModal')" class="px-md py-xs bg-surface-container-high rounded-lg text-on-surface-variant hover:text-primary">Batal</button>
                    <button type="submit" class="px-md py-xs bg-primary-container text-on-primary font-bold rounded-lg hover:shadow-[0_0_15px_rgba(0,242,255,0.4)]">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function openEditModal(pc) {
            // Sesuaikan properti objek ke huruf kecil
            document.getElementById('edit_title').innerText = pc.id_komputer;
            document.getElementById('edit_nama').value = pc.nama_komputer;
            document.getElementById('edit_tier').value = pc.tier;
            document.getElementById('edit_status').value = pc.status;
            
            document.getElementById('editForm').action = `/managepc/update/${pc.id_komputer}`;
            openModal('editModal');
        }

        document.querySelectorAll('tbody tr').forEach(row => {
            row.addEventListener('mouseenter', () => { row.style.boxShadow = "inset 4px 0 0 #00f2ff"; });
            row.addEventListener('mouseleave', () => { row.style.boxShadow = "none"; });
        });

        const searchInput = document.querySelector('input[type="text"]');
        if(searchInput) {
            searchInput.addEventListener('focus', () => { searchInput.parentElement.classList.add('neon-glow-primary'); });
            searchInput.addEventListener('blur', () => { searchInput.parentElement.classList.remove('neon-glow-primary'); });
        }
    </script>
@endsection
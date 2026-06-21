@extends('layouts.admin')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-md">
        <div>
            <h2 class="font-headline-lg text-headline-lg text-on-surface mb-xs">Dashboard Overview</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">System performance and active metrics.</p>
        </div>
        <div class="text-right">
            <p class="font-body-sm text-body-sm text-on-surface-variant" id="current-time">Loading time...</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-md">
        <div class="glowing-card p-md rounded flex flex-col justify-between h-[120px] relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-16 h-16 bg-primary/10 rounded-full blur-xl group-hover:bg-primary/20 transition-all duration-500"></div>
            <div class="flex justify-between items-start relative z-10">
                <span class="font-body-sm text-body-sm text-on-surface-variant">Total PC</span>
                <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">computer</span>
            </div>
            <div class="relative z-10">
                <span class="font-display-lg text-display-lg text-on-surface">{{ $totalPC }}</span>
                <span class="font-body-sm text-body-sm text-primary ml-2">+{{ $offlinePC }} offline</span>
            </div>
        </div>

        <div class="glowing-card p-md rounded flex flex-col justify-between h-[120px] relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-16 h-16 bg-secondary/10 rounded-full blur-xl group-hover:bg-secondary/20 transition-all duration-500"></div>
            <div class="flex justify-between items-start relative z-10">
                <span class="font-body-sm text-body-sm text-on-surface-variant">Games Library</span>
                <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">sports_esports</span>
            </div>
            <div class="relative z-10">
                <span class="font-display-lg text-display-lg text-on-surface">{{ $totalGames }}</span>
                <span class="font-body-sm text-body-sm text-on-surface-variant ml-2">Installed</span>
            </div>
        </div>

        <div class="glowing-card p-md rounded flex flex-col justify-between h-[120px] relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-16 h-16 bg-error/10 rounded-full blur-xl group-hover:bg-error/20 transition-all duration-500"></div>
            <div class="flex justify-between items-start relative z-10">
                <span class="font-body-sm text-body-sm text-on-surface-variant">Active Promos</span>
                <span class="material-symbols-outlined text-error" style="font-variation-settings: 'FILL' 1;">local_offer</span>
            </div>
            <div class="relative z-10">
                <span class="font-display-lg text-display-lg text-on-surface">{{ $activePromosCount }}</span>
                <span class="font-body-sm text-body-sm text-error ml-2">Ending soon</span>
            </div>
        </div>

        <div class="glowing-card p-md rounded flex flex-col justify-between h-[120px] relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-16 h-16 bg-surface-tint/10 rounded-full blur-xl group-hover:bg-surface-tint/20 transition-all duration-500"></div>
            <div class="flex justify-between items-start relative z-10">
                <span class="font-body-sm text-body-sm text-on-surface-variant">Total Members</span>
                <span class="material-symbols-outlined text-surface-tint" style="font-variation-settings: 'FILL' 1;">group</span>
            </div>
            <div class="relative z-10">
                <span class="font-display-lg text-display-lg text-on-surface">{{ $totalMembers }}</span>
                <span class="font-body-sm text-body-sm text-surface-tint ml-2">+{{ $newMembersToday }} today</span>
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-md flex-1">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-sm">
            <h3 class="font-headline-md text-headline-md text-on-surface">Manajemen PC</h3>
            <div class="flex gap-sm w-full sm:w-auto">
                <div class="relative flex-1 sm:w-64">
                    <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant text-[18px]">search</span>
                    <input class="w-full bg-surface-container-low border border-outline-variant text-on-surface font-body-sm text-body-sm rounded pl-10 pr-sm py-xs focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Search PC..." type="text"/>
                </div>
                <button class="bg-primary text-on-primary font-label-md text-label-md px-md py-xs rounded glow-effect hover:bg-primary-fixed-dim transition-colors flex items-center gap-xs whitespace-nowrap">
                    <span class="material-symbols-outlined text-[18px]">add</span>
                    Tambah Data
                </button>
            </div>
        </div>

        <div class="bg-surface-container-low rounded border border-outline-variant overflow-hidden flex-1 flex flex-col">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-outline-variant bg-surface-container-highest">
                            <th class="py-sm px-md font-label-md text-label-md text-on-surface-variant font-semibold w-[100px]">ID</th>
                            <th class="py-sm px-md font-label-md text-label-md text-on-surface-variant font-semibold">Name</th>
                            <th class="py-sm px-md font-label-md text-label-md text-on-surface-variant font-semibold">Tier</th>
                            <th class="py-sm px-md font-label-md text-label-md text-on-surface-variant font-semibold">Status</th>
                            <th class="py-sm px-md font-label-md text-label-md text-on-surface-variant font-semibold text-right w-[120px]">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="font-body-sm text-body-sm text-on-surface">
                        @forelse($computers as $pc)
                            <tr class="table-row-striped border-b border-outline-variant/50 hover:bg-surface-container-highest/50 transition-colors">
                                <td class="py-sm px-md text-on-surface-variant">PC-{{ $pc->id_komputer }}</td>
                                <td class="py-sm px-md font-medium">Alpha Rig {{ $pc->id_komputer }}</td>
                                <td class="py-sm px-md">
                                    @if(($pc->tier ?? 'Standard') == 'VIP')
                                        <span class="px-2 py-1 rounded bg-secondary/10 text-secondary text-xs border border-secondary/20">VIP</span>
                                    @elseif(($pc->tier ?? 'Standard') == 'Creator')
                                        <span class="px-2 py-1 rounded bg-surface-tint/10 text-surface-tint text-xs border border-surface-tint/20">Creator</span>
                                    @else
                                        <span class="px-2 py-1 rounded bg-surface-variant text-on-surface-variant text-xs border border-outline-variant">Standard</span>
                                    @endif
                                </td>
                                <td class="py-sm px-md">
                                    <div class="flex items-center gap-2">
                                        @if($pc->status == 'Online')
                                            <div class="w-2 h-2 rounded-full bg-primary glow-effect"></div>
                                            <span>Online</span>
                                        @elseif($pc->status == 'Reserved')
                                            <div class="w-2 h-2 rounded-full bg-on-secondary-fixed-variant"></div>
                                            <span class="text-on-surface-variant">Reserved</span>
                                        @elseif($pc->status == 'Maintenance')
                                            <div class="w-2 h-2 rounded-full bg-error"></div>
                                            <span class="text-error">Maintenance</span>
                                        @else
                                            <div class="w-2 h-2 rounded-full bg-outline"></div>
                                            <span class="text-on-surface-variant">Offline</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-sm px-md text-right">
                                    <button aria-label="Edit" class="text-on-surface-variant hover:text-primary transition-colors p-1">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button aria-label="Delete" class="text-on-surface-variant hover:text-error transition-colors p-1">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-sm px-md text-center text-on-surface-variant">Tidak ada data komputer tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t border-outline-variant p-sm flex items-center justify-between bg-surface-container-lowest mt-auto">
                <div class="w-full">
                    {{ $computers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
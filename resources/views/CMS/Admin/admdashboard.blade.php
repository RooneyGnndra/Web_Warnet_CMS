<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>NetCity - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary-fixed": "#ffdadb",
                        "on-primary-container": "#006a71",
                        "on-tertiary-container": "#c0003e",
                        "on-secondary-fixed-variant": "#6700b5",
                        "surface-tint": "#00dbe7",
                        "inverse-on-surface": "#2c303a",
                        "surface-container-highest": "#31353f",
                        "error-container": "#93000a",
                        "secondary-fixed": "#efdbff",
                        "on-surface": "#dfe2ef",
                        "tertiary-fixed-dim": "#ffb2b8",
                        "on-tertiary-fixed-variant": "#91002d",
                        "on-surface-variant": "#b9cacb",
                        "surface-container-low": "#181b25",
                        "error": "#ffb4ab",
                        "surface-container-lowest": "#0a0e17",
                        "on-error-container": "#ffdad6",
                        "on-primary-fixed": "#002022",
                        "primary-fixed-dim": "#00dbe7",
                        "outline": "#849495",
                        "on-primary": "#00363a",
                        "on-secondary": "#480081",
                        "secondary": "#dcb8ff",
                        "inverse-surface": "#dfe2ef",
                        "outline-variant": "#3a494b",
                        "inverse-primary": "#00696f",
                        "surface-container-high": "#262a34",
                        "tertiary": "#fff5f5",
                        "on-tertiary": "#67001d",
                        "surface": "#0f131c",
                        "surface-bright": "#353943",
                        "primary-fixed": "#74f5ff",
                        "background": "#0f131c",
                        "on-error": "#690005",
                        "primary-container": "#00f2ff",
                        "tertiary-container": "#ffcfd2",
                        "on-background": "#dfe2ef",
                        "on-primary-fixed-variant": "#004f54",
                        "secondary-container": "#7701d0",
                        "surface-variant": "#31353f",
                        "on-secondary-fixed": "#2c0051",
                        "surface-container": "#1c1f29",
                        "secondary-fixed-dim": "#dcb8ff",
                        "surface-dim": "#0f131c",
                        "primary": "#e1fdff",
                        "on-secondary-container": "#dcb7ff",
                        "on-tertiary-fixed": "#40000f"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "base": "4px",
                        "gutter": "24px",
                        "xs": "8px",
                        "sidebar-width": "280px",
                        "md": "24px",
                        "sm": "16px",
                        "lg": "40px",
                        "container-max": "1280px",
                        "xl": "64px"
                    },
                    "fontFamily": {
                        "body-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "display-lg": ["Montserrat"],
                        "label-md": ["Inter"],
                        "headline-md": ["Montserrat"],
                        "headline-lg-mobile": ["Montserrat"],
                        "headline-lg": ["Montserrat"],
                        "body-sm": ["Inter"]
                    },
                    "fontSize": {
                        "body-lg": ["18px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "body-md": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "display-lg": ["48px", { "lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "800" }],
                        "label-md": ["12px", { "lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600" }],
                        "headline-md": ["20px", { "lineHeight": "1.4", "fontWeight": "600" }],
                        "headline-lg-mobile": ["24px", { "lineHeight": "1.2", "fontWeight": "700" }],
                        "headline-lg": ["32px", { "lineHeight": "1.2", "fontWeight": "700" }],
                        "body-sm": ["14px", { "lineHeight": "1.5", "fontWeight": "400" }]
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            background-color: #0a0e17; /* surface-container-lowest */
            color: #dfe2ef;            /* on-background */
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }
        
        .glow-effect {
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.2);
        }
        
        .glowing-card {
            border-top: 1px solid #e1fdff; /* primary */
            background: linear-gradient(180deg, #181b25 0%, #0a0e17 100%); /* surface-container-low ke lowest */
        }
        
        .table-row-striped:nth-child(even) {
            background-color: #181b25; /* surface-container-low */
        }
        
        .table-row-striped:nth-child(odd) {
            background-color: #0a0e17; /* surface-container-lowest */
        }
        
        /* Custom Scrollbar for a cyber feel */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0a0e17; /* surface-container-lowest */
        }
        ::-webkit-scrollbar-thumb {
            background: #3a494b; /* outline-variant */
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #e1fdff; /* primary */
        }
    </style>
</head>
<body class="bg-surface-container-lowest text-on-background min-h-screen flex">

    <aside class="hidden md:flex flex-col fixed left-0 top-0 h-full w-sidebar-width bg-surface-container border-r border-outline-variant py-md z-40 transition-all duration-200">
        <div class="px-gutter mb-lg">
            <h1 class="font-display-lg text-headline-md text-primary mb-sm">NetCity</h1>
            <div class="flex items-center gap-sm">
                <div class="w-10 h-10 rounded-full bg-surface-variant flex items-center justify-center overflow-hidden border border-outline-variant">
                    <span class="material-symbols-outlined text-on-surface-variant" style="font-variation-settings: 'FILL' 1;">person</span>
                </div>
                <div>
                    <h2 class="font-headline-md text-body-md text-on-surface">Admin Panel</h2>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">{{ Auth::user()->name ?? 'System Administrator' }}</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto px-sm flex flex-col gap-xs">
            <a class="flex items-center gap-sm px-sm py-xs rounded bg-gradient-to-r from-primary/10 to-transparent text-primary border-l-4 border-primary font-body-sm text-body-sm transition-all duration-200" href="#">
                <span class="material-symbols-outlined">dashboard</span>
                <span>Dashboard</span>
            </a>
            <a class="flex items-center gap-sm px-sm py-xs rounded text-on-surface-variant hover:bg-surface-variant/50 hover:text-primary hover:bg-surface-variant transition-all duration-200 font-body-sm text-body-sm border-l-4 border-transparent" href="#">
                <span class="material-symbols-outlined">computer</span>
                <span>Manage PC</span>
            </a>
            <a class="flex items-center gap-sm px-sm py-xs rounded text-on-surface-variant hover:bg-surface-variant/50 hover:text-primary hover:bg-surface-variant transition-all duration-200 font-body-sm text-body-sm border-l-4 border-transparent" href="#">
                <span class="material-symbols-outlined">sports_esports</span>
                <span>Game Library</span>
            </a>
            <a class="flex items-center gap-sm px-sm py-xs rounded text-on-surface-variant hover:bg-surface-variant/50 hover:text-primary hover:bg-surface-variant transition-all duration-200 font-body-sm text-body-sm border-l-4 border-transparent" href="#">
                <span class="material-symbols-outlined">group</span>
                <span>User Logs</span>
            </a>
            <a class="flex items-center gap-sm px-sm py-xs rounded text-on-surface-variant hover:bg-surface-variant/50 hover:text-primary hover:bg-surface-variant transition-all duration-200 font-body-sm text-body-sm border-l-4 border-transparent" href="#">
                <span class="material-symbols-outlined">payments</span>
                <span>Finance</span>
            </a>
            <a class="flex items-center gap-sm px-sm py-xs rounded text-on-surface-variant hover:bg-surface-variant/50 hover:text-primary hover:bg-surface-variant transition-all duration-200 font-body-sm text-body-sm border-l-4 border-transparent" href="#">
                <span class="material-symbols-outlined">settings</span>
                <span>Settings</span>
            </a>
        </nav>

        <div class="px-sm mt-auto flex flex-col gap-sm">
            <button class="w-full bg-primary text-on-primary font-label-md text-label-md py-xs rounded glow-effect hover:bg-primary-fixed-dim transition-colors flex items-center justify-center gap-xs">
                <span class="material-symbols-outlined text-[18px]">add</span>
                New Session
            </button>
            <div class="border-t border-outline-variant pt-sm flex flex-col gap-xs">
                <a class="flex items-center gap-sm px-sm py-xs rounded text-on-surface-variant hover:bg-surface-variant/50 hover:text-primary transition-all duration-200 font-body-sm text-body-sm" href="#">
                    <span class="material-symbols-outlined">help</span>
                    <span>Support</span>
                </a>
                <a class="flex items-center gap-sm px-sm py-xs rounded text-on-surface-variant hover:bg-surface-variant/50 hover:text-primary transition-all duration-200 font-body-sm text-body-sm" href="#">
                    <span class="material-symbols-outlined">logout</span>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </aside>

    <main class="flex-1 md:ml-[280px] w-full min-h-screen flex flex-col">
        <header class="md:hidden flex items-center justify-between p-md bg-surface-container border-b border-outline-variant sticky top-0 z-30">
            <h1 class="font-display-lg text-headline-md text-primary">NetCity</h1>
            <button class="text-on-surface-variant">
                <span class="material-symbols-outlined text-[24px]">menu</span>
            </button>
        </header>

        <div class="p-gutter flex-1 flex flex-col gap-lg max-w-container-max mx-auto w-full">
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
        </div>

        <footer class="w-full mt-auto bg-surface-container-lowest border-t border-outline-variant flex flex-col md:flex-row justify-between items-center px-gutter py-md gap-xs">
            <div class="font-display-lg text-body-lg text-primary opacity-80 hover:opacity-100 transition-opacity cursor-default">
                NetCity
            </div>
            <p class="font-body-sm text-body-sm text-on-surface-variant text-center md:text-left">
                © 2024 NetCity Gaming Lounge. Manual billing must be processed at the cashier counter.
            </p>
            <div class="flex gap-md font-body-sm text-body-sm text-on-surface-variant opacity-80 hover:opacity-100 transition-opacity">
                <a class="hover:text-primary transition-colors" href="#">Terms of Service</a>
                <a class="hover:text-primary transition-colors" href="#">Privacy Policy</a>
                <a class="hover:text-primary transition-colors" href="#">Contact Support</a>
            </div>
        </footer>
    </main>

    <script>
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            const dateString = now.toLocaleDateString([], { weekday: 'short', month: 'short', day: 'numeric' });
            document.getElementById('current-time').textContent = `${dateString} • ${timeString}`;
        }
        setInterval(updateTime, 1000);
        updateTime();
    </script>
</body>
</html>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>NetCity Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary-fixed": "#74f5ff", "surface-container-low": "#181b25", "surface-tint": "#00dbe7", "primary": "#e1fdff",
                        "inverse-primary": "#00696f", "tertiary-fixed": "#ffdadb", "surface-dim": "#0f131c", "error-container": "#93000a",
                        "surface-variant": "#31353f", "on-tertiary": "#67001d", "tertiary": "#fff5f5", "surface-container-highest": "#31353f",
                        "surface-container-high": "#262a34", "on-secondary-container": "#dcb7ff", "secondary-fixed-dim": "#dcb8ff",
                        "on-primary-container": "#006a71", "background": "#0f131c", "on-surface": "#dfe2ef", "on-primary": "#00363a",
                        "surface": "#0f131c", "on-surface-variant": "#b9cacb", "primary-container": "#00f2ff", "on-primary-fixed-variant": "#004f54",
                        "primary-fixed-dim": "#00dbe7", "on-secondary": "#480081", "on-background": "#dfe2ef", "on-error-container": "#ffdad6",
                        "on-tertiary-container": "#c0003e", "error": "#ffb4ab", "on-error": "#690005", "inverse-on-surface": "#2c303a",
                        "on-primary-fixed": "#002022", "surface-container-lowest": "#0a0e17", "on-secondary-fixed-variant": "#6700b5",
                        "secondary-fixed": "#efdbff", "on-secondary-fixed": "#2c0051", "secondary": "#dcb8ff", "surface-bright": "#353943",
                        "on-tertiary-fixed": "#40000f", "surface-container": "#1c1f29", "secondary-container": "#7701d0",
                        "tertiary-fixed-dim": "#ffb2b8", "tertiary-container": "#ffcfd2", "outline": "#849495", "on-tertiary-fixed-variant": "#91002d",
                        "outline-variant": "#3a494b", "inverse-surface": "#dfe2ef"
                    },
                    "borderRadius": { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" },
                    "spacing": { "xl": "64px", "sidebar-width": "280px", "lg": "40px", "container-max": "1280px", "sm": "16px", "gutter": "24px", "md": "24px", "xs": "8px", "base": "4px" },
                    "fontFamily": { "headline-lg": ["Montserrat"], "body-md": ["Inter"], "headline-md": ["Montserrat"], "body-lg": ["Inter"], "label-md": ["Inter"], "headline-lg-mobile": ["Montserrat"], "body-sm": ["Inter"], "display-lg": ["Montserrat"] },
                    "fontSize": { "headline-lg": ["32px", {"lineHeight": "1.2", "fontWeight": "700"}], "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}], "headline-md": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}], "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}], "label-md": ["12px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600"}], "headline-lg-mobile": ["24px", {"lineHeight": "1.2", "fontWeight": "700"}], "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}], "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "800"}] }
                },
            },
        }
    </script>
    <style>
        body { background-color: #0a0e17; color: #dfe2ef; font-family: 'Inter', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; vertical-align: middle; }
        .glass-card { background: rgba(22, 27, 38, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(0, 242, 255, 0.1); box-shadow: 0 4px 24px -2px rgba(0, 0, 0, 0.5); }
        .neon-border-top { border-top: 1px solid #00f2ff; }
        .neon-glow-primary { box-shadow: 0 0 15px rgba(0, 242, 255, 0.2); }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #0a0e17; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #31353f; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #00f2ff; }
    </style>
</head>
<body class="flex min-h-screen">

    <aside class="fixed left-0 top-0 h-full w-[280px] bg-surface-container flex flex-col py-md border-r border-outline-variant z-40 transition-all duration-200">
        <div class="px-gutter mb-lg">
            <h1 class="font-display-lg text-headline-md text-primary tracking-tighter">NetCity</h1>
        </div>
        <div class="px-sm mb-md">
            <div class="flex items-center gap-sm p-sm rounded-xl bg-surface-container-high">
                <div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">person</span>
                </div>
                <div>
                    <p class="font-headline-md text-body-sm text-primary mb-0">System Admin</p>
                    <p class="font-body-sm text-label-md text-on-surface-variant">Administrator</p>
                </div>
            </div>
        </div>
        <nav class="flex-1 px-sm space-y-base overflow-y-auto custom-scrollbar flex flex-col gap-xs">
            <a class="flex items-center gap-sm px-sm py-xs rounded text-on-surface-variant hover:bg-surface-variant/50 hover:text-primary border-l-4 border-transparent transition-all duration-200 font-body-sm text-body-sm mb-2 opacity-75" href="/">
                <span class="material-symbols-outlined text-secondary">arrow_back</span>
                <span class="font-semibold text-secondary">Main Website</span>
            </a>
            <a class="flex items-center gap-sm px-md py-sm rounded-lg transition-all duration-200 font-body-sm {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-primary/10 to-transparent text-primary border-l-4 border-primary font-semibold' : 'text-on-surface-variant hover:bg-surface-variant' }}" href="{{ route('admin.dashboard') }}">
                <span class="material-symbols-outlined">dashboard</span>
                <span>Dashboard</span>
            </a>
            <a class="flex items-center gap-sm px-md py-sm rounded-lg transition-all duration-200 font-body-sm {{ request()->routeIs('admin.manage-pc') ? 'bg-gradient-to-r from-primary/10 to-transparent text-primary border-l-4 border-primary font-semibold' : 'text-on-surface-variant hover:bg-surface-variant' }}" href="{{ route('admin.manage-pc') }}">
                <span class="material-symbols-outlined">computer</span>
                <span>Manage PC</span>
            </a>
            <a class="flex items-center gap-sm px-md py-sm rounded-lg transition-all duration-200 font-body-sm {{ request()->routeIs('admin.game-library.index') ? 'bg-gradient-to-r from-primary/10 to-transparent text-primary border-l-4 border-primary font-semibold' : 'text-on-surface-variant hover:bg-surface-variant/50' }}" href="{{ route('admin.game-library.index') }}">
                <span class="material-symbols-outlined">sports_esports</span>
                <span>Game Library</span>
            </a>
            <a class="flex items-center gap-sm px-md py-sm rounded-lg text-on-surface-variant hover:bg-surface-variant transition-all duration-200 font-body-sm" href="#">
                <span class="material-symbols-outlined">group</span>
                <span>User Logs</span>
            </a>
        </nav>
        <div class="mt-auto px-sm pt-md border-t border-outline-variant/30">
            <button class="w-full mb-md py-sm px-md rounded-lg bg-primary-container text-on-primary font-semibold flex items-center justify-center gap-xs hover:shadow-[0_0_15px_rgba(0,242,255,0.4)] transition-all duration-300">
                <span class="material-symbols-outlined">add</span>
                <span>New Session</span>
            </button>
            <a class="flex items-center gap-sm px-md py-sm rounded-lg text-on-surface-variant hover:text-primary transition-colors font-body-sm" href="#">
                <span class="material-symbols-outlined">help</span>
                <span>Support</span>
            </a>
            <a class="flex items-center gap-sm px-md py-sm rounded-lg text-on-surface-variant hover:text-error transition-colors font-body-sm" href="#">
                <span class="material-symbols-outlined">logout</span>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <main class="flex-1 ml-[280px] p-gutter relative overflow-hidden">
        @yield('content')
    </main>

</body>
</html>
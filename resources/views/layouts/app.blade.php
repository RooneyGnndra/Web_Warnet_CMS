<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>NetCity - Portal Informasi Layanan Warnet</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <style>
        .glow-text {
            text-shadow: 0 0 15px rgba(0, 242, 255, 0.5);
        }
        .glow-box {
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.2);
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-background text-on-background font-body-md min-h-screen flex flex-col pt-20">

    <nav class="bg-surface/80 backdrop-blur-xl font-body-md text-body-md fixed top-0 w-full z-50 border-b border-primary/30 shadow-[0_0_15px_rgba(0,242,255,0.2)] transition-all duration-300 ease-in-out">
        <div class="flex justify-between items-center px-gutter py-xs max-w-container-max mx-auto">
            <div class="font-display-lg text-headline-md font-bold text-primary tracking-tighter glow-text">NetCity</div>
            <ul class="hidden md:flex gap-md">
                <li>
                    <a class="font-body-md text-body-md pb-1 transition-all hover:text-primary hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)] {{ request()->is('/') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant' }}" 
                        href="/">Home</a>
                </li>

                <li>
                    <a class="font-body-md text-body-md pb-1 transition-all hover:text-primary hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)] {{ request()->is('page') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant' }}" 
                        href="/page">Daftar PC</a>
                </li>

                <li>
                    <a class="font-body-md text-body-md pb-1 transition-all hover:text-primary hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)] {{ request()->is('katalog') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant' }}" 
                        href="/katalog">Katalog Game</a>
                </li>

                <li>
                    <a class="font-body-md text-body-md pb-1 transition-all hover:text-primary hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)] {{ request()->is('promo') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant' }}" 
                        href="/promo">Promo</a>
                </li>
            </ul>
            
            <div class="hidden md:flex gap-sm items-center">
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="inline-flex items-center gap-xs text-primary font-bold hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)] transition-all focus:outline-none select-none">
                            <span class="material-symbols-outlined text-body-md" style="font-variation-settings: 'FILL' 1;">account_circle</span>
    
                            <span>{{ Auth::user()->username }}</span>
    
                            <svg class="w-4 h-4 ml-1 transform transition-transform duration-200" :class="open ? 'rotate-180' : 'rotate-0'" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" x-transition 
                             class="absolute right-0 mt-xs w-48 bg-surface-container rounded-xl border border-outline-variant shadow-2xl z-50 py-xs overflow-hidden">
                            
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-xs px-sm py-xs text-body-sm text-on-background hover:bg-primary hover:text-on-primary transition-colors font-semibold">
                                    <span class="material-symbols-outlined text-body-sm">dashboard</span>
                                    Dashboard Admin
                                </a>
                            @else
                                <a href="{{ route('user.dashboard') }}" class="flex items-center gap-xs px-sm py-xs text-body-sm text-on-background hover:bg-primary hover:text-on-primary transition-colors font-semibold">
                                    <span class="material-symbols-outlined text-body-sm">badge</span>
                                    Dashboard Pelanggan
                                </a>
                            @endif

                            <div class="border-t border-outline-variant my-xs"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-xs text-left px-sm py-xs text-body-sm text-error hover:bg-error-container hover:text-on-error-container transition-colors font-semibold">
                                    <span class="material-symbols-outlined text-body-sm">logout</span>
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center text-on-surface-variant hover:text-primary transition-colors hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)]">
                        Login
                    </a>
                    <a href="{{ route('register') }}#register" class="inline-flex items-center bg-primary text-on-primary px-sm py-xs rounded hover:bg-primary-container transition-colors glow-box">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-surface-container-lowest font-body-sm text-body-sm w-full mt-auto border-t border-outline-variant">
        <div class="flex flex-col md:flex-row justify-between items-center px-gutter py-md gap-xs max-w-container-max mx-auto">
            <div class="font-display-lg text-body-lg text-primary glow-text">NetCity</div>
            <p class="text-on-surface-variant text-center md:text-left opacity-80 hover:opacity-100 transition-colors">© 2024 NetCity Gaming Lounge. Manual billing must be processed at the cashier counter.</p>
            <ul class="flex gap-md">
                <li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Terms of Service</a></li>
                <li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
                <li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Contact Us</a></li>
            </ul>
        </div>
    </footer>

</body>
</html>
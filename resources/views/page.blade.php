<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Daftar PC | NetCity</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;family=Montserrat:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
        .material-symbols-outlined {
          font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .neon-glow {
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.2);
        }
        .neon-glow-active {
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.4);
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md min-h-screen flex flex-col pt-20">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-xl border-b border-primary/30 shadow-[0_0_15px_rgba(0,242,255,0.2)] transition-all duration-300 ease-in-out hidden md:block">
<div class="flex justify-between items-center px-gutter py-xs max-w-container-max mx-auto h-16">
<div class="font-display-lg text-headline-md font-bold text-primary tracking-tighter">NetCity</div>
<div class="flex gap-md">
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)]" href="/">Home</a>
<a class="font-body-md text-body-md text-primary font-bold border-b-2 border-primary pb-1 hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)]" href="/page">Daftar PC</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)]" href="/katalog">Katalog Game</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)]" href="#">Promo</a>
</div>
<div class="flex gap-xs">
<button class="px-sm py-xs font-label-md text-label-md text-primary border border-primary rounded hover:bg-primary/10 transition-colors">Login</button>
<button class="px-sm py-xs font-label-md text-label-md bg-primary text-on-primary rounded hover:bg-primary-container transition-colors neon-glow">Register</button>
</div>
</div>
</nav>
<!-- Mobile Top Bar -->
<div class="md:hidden fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-xl border-b border-primary/30 h-16 flex items-center px-sm justify-between shadow-[0_0_15px_rgba(0,242,255,0.2)]">
<div class="font-display-lg text-headline-md font-bold text-primary tracking-tighter">NetCity</div>
<button class="text-primary"><span class="material-symbols-outlined">menu</span></button>
</div>
<!-- Main Content Canvas -->
<main class="flex-grow w-full max-w-container-max mx-auto px-gutter py-md md:py-xl">
<!-- Header Section -->
<header class="mb-lg flex flex-col md:flex-row justify-between items-start md:items-end gap-sm border-b border-outline-variant pb-sm">
<div>
<h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary mb-xs">Fasilitas &amp; Daftar PC</h1>
<p class="font-body-md text-body-md text-on-surface-variant">Jelajahi spesifikasi dan ketersediaan PC di lounge kami.</p>
</div>
<!-- Filters -->
<div class="flex gap-xs overflow-x-auto pb-2 w-full md:w-auto hide-scrollbar">
<button class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md bg-primary text-on-primary neon-glow-active">All Tiers</button>
<button class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary transition-colors">Bronze</button>
<button class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary transition-colors">Silver</button>
<button class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary transition-colors">Gold</button>
<button class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md border border-outline-variant text-secondary hover:border-secondary hover:text-secondary transition-colors">VIP</button>
</div>
</header>
<!-- PC Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-md">
<!-- Card 1: Available VIP -->
<article class="bg-surface-container-high rounded-xl border-t border-secondary overflow-hidden relative group transition-transform hover:-translate-y-1 hover:shadow-[0_10px_20px_rgba(220,184,255,0.1)]">
<div class="absolute inset-0 bg-gradient-to-b from-transparent to-secondary/5 pointer-events-none"></div>
<div class="p-sm">
<div class="flex justify-between items-start mb-sm">
<h2 class="font-headline-md text-headline-md text-on-surface">PC-01</h2>
<span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-secondary/10 text-secondary font-label-md text-label-md border border-secondary/30">
<span class="material-symbols-outlined" style="font-size: 14px;">diamond</span> VIP
                        </span>
</div>
<div class="mb-sm">
<span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-primary/20 text-primary font-label-md text-label-md border border-primary/30 neon-glow">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span> Available
                        </span>
</div>
<div class="space-y-xs mb-md border-t border-outline-variant pt-xs">
<div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-outline">memory</span>
<span>Intel Core i9-13900K</span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-outline">developer_board</span>
<span>RTX 4090 24GB</span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-outline">storage</span>
<span>64GB DDR5 6000MHz</span>
</div>
</div>
<button class="w-full py-xs border border-secondary text-secondary rounded font-label-md text-label-md hover:bg-secondary/10 transition-colors">
                        Lihat Detail
                    </button>
</div>
</article>
<!-- Card 2: Used Gold -->
<article class="bg-surface-container-high rounded-xl border-t border-primary overflow-hidden relative group transition-transform hover:-translate-y-1 hover:shadow-[0_10px_20px_rgba(0,242,255,0.05)]">
<div class="absolute inset-0 bg-gradient-to-b from-transparent to-primary/5 pointer-events-none"></div>
<div class="p-sm">
<div class="flex justify-between items-start mb-sm">
<h2 class="font-headline-md text-headline-md text-on-surface">PC-12</h2>
<span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-primary/10 text-primary font-label-md text-label-md border border-primary/30">
                            Gold
                        </span>
</div>
<div class="mb-sm">
<span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-surface-variant text-on-surface-variant font-label-md text-label-md border border-outline-variant">
<span class="material-symbols-outlined" style="font-size: 14px;">person</span> In Use
                        </span>
</div>
<div class="space-y-xs mb-md border-t border-outline-variant pt-xs">
<div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-outline">memory</span>
<span>Intel Core i7-13700K</span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-outline">developer_board</span>
<span>RTX 4080 16GB</span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-outline">storage</span>
<span>32GB DDR5 5600MHz</span>
</div>
</div>
<button class="w-full py-xs border border-primary text-primary rounded font-label-md text-label-md hover:bg-primary/10 transition-colors">
                        Lihat Detail
                    </button>
</div>
</article>
<!-- Card 3: Available Silver -->
<article class="bg-surface-container-high rounded-xl border-t border-outline overflow-hidden relative group transition-transform hover:-translate-y-1">
<div class="p-sm">
<div class="flex justify-between items-start mb-sm">
<h2 class="font-headline-md text-headline-md text-on-surface">PC-25</h2>
<span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-surface-variant text-on-surface font-label-md text-label-md border border-outline-variant">
                            Silver
                        </span>
</div>
<div class="mb-sm">
<span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-primary/20 text-primary font-label-md text-label-md border border-primary/30 neon-glow">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span> Available
                        </span>
</div>
<div class="space-y-xs mb-md border-t border-outline-variant pt-xs">
<div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-outline">memory</span>
<span>Intel Core i5-13600K</span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-outline">developer_board</span>
<span>RTX 4070 12GB</span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-outline">storage</span>
<span>16GB DDR5 5200MHz</span>
</div>
</div>
<button class="w-full py-xs border border-outline text-on-surface-variant rounded font-label-md text-label-md hover:bg-surface-variant transition-colors hover:text-on-surface">
                        Lihat Detail
                    </button>
</div>
</article>
<!-- Card 4: Maintenance Bronze -->
<article class="bg-surface-container-high rounded-xl border-t border-error overflow-hidden relative group opacity-75">
<div class="p-sm">
<div class="flex justify-between items-start mb-sm">
<h2 class="font-headline-md text-headline-md text-on-surface">PC-42</h2>
<span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-surface-variant text-on-surface font-label-md text-label-md border border-outline-variant">
                            Bronze
                        </span>
</div>
<div class="mb-sm">
<span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-error-container text-on-error-container font-label-md text-label-md border border-error/30">
<span class="material-symbols-outlined" style="font-size: 14px;">build</span> Maintenance
                        </span>
</div>
<div class="space-y-xs mb-md border-t border-outline-variant pt-xs">
<div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-outline">memory</span>
<span>Intel Core i5-12400F</span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-outline">developer_board</span>
<span>RTX 3060 12GB</span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-outline">storage</span>
<span>16GB DDR4 3200MHz</span>
</div>
</div>
<button class="w-full py-xs border border-outline text-on-surface-variant rounded font-label-md text-label-md hover:bg-surface-variant transition-colors hover:text-on-surface">
                        Lihat Detail
                    </button>
</div>
</article>
</div>
</main>
<!-- Footer -->
<footer class="w-full mt-auto bg-surface-container-lowest border-t border-outline-variant">
<div class="flex flex-col md:flex-row justify-between items-center px-gutter py-md gap-xs max-w-container-max mx-auto">
<div class="font-display-lg text-body-lg text-primary opacity-80 hover:opacity-100 transition-all duration-300">
                © 2024 NetCity Gaming Lounge. Manual billing must be processed at the cashier counter.
            </div>
<div class="flex gap-sm">
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors opacity-80 hover:opacity-100" href="#">Terms of Service</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors opacity-80 hover:opacity-100" href="#">Privacy Policy</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors opacity-80 hover:opacity-100" href="#">Contact Support</a>
</div>
</div>
</footer>
</body></html>
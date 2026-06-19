<!DOCTYPE html>

<html class="dark" lang="id"><head>
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
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;family=Montserrat:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<style>
        .glow-text {
            text-shadow: 0 0 15px rgba(0, 242, 255, 0.5);
        }
        .glow-box {
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.2);
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md min-h-screen flex flex-col pt-20">

<!-- TopNavBar -->
<nav class="bg-surface/80 backdrop-blur-xl font-body-md text-body-md fixed top-0 w-full z-50 border-b border-primary/30 shadow-[0_0_15px_rgba(0,242,255,0.2)] transition-all duration-300 ease-in-out">
<div class="flex justify-between items-center px-gutter py-xs max-w-container-max mx-auto">
<div class="font-display-lg text-headline-md font-bold text-primary tracking-tighter glow-text">NetCity</div>
<ul class="hidden md:flex gap-md">
<li><a class="text-primary font-bold border-b-2 border-primary pb-1" href="#">Home</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)]" href="/page">Daftar PC</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)]" href="/katalog">Katalog Game</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)]" href="#">Promo</a></li>
</ul>
<div class="hidden md:flex gap-sm">
<a href="{{ route('login') }}" class="inline-flex items-center text-on-surface-variant hover:text-primary transition-colors hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)]">
    Login
</a>
<a href="{{ route('register') }}" class="inline-flex items-center bg-primary text-on-primary px-sm py-xs rounded hover:bg-primary-container transition-colors glow-box">
    Register
</a>
</div>
</div>
</nav>

<!-- Hero Section -->
<main class="flex-grow">
<section class="px-gutter py-xl max-w-container-max mx-auto flex flex-col md:flex-row items-center gap-xl relative">
<div class="w-full md:w-1/2 flex flex-col gap-md z-10">
<h1 class="font-display-lg text-display-lg text-primary glow-text leading-tight">NetCity - Portal Informasi Layanan Warnet</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant">Informasi spesifikasi PC, katalog game, dan promo warnet secara digital.</p>
<div class="flex gap-sm mt-xs">
<button class="bg-primary text-on-primary px-md py-xs rounded font-label-md text-label-md hover:bg-primary-container transition-colors glow-box uppercase">Lihat Daftar PC</button>
<button class="border border-primary text-primary px-md py-xs rounded font-label-md text-label-md hover:bg-primary/10 transition-colors uppercase">Lihat Promo</button>
</div>
</div>
<div class="w-full md:w-1/2 relative h-64 md:h-96 rounded-xl overflow-hidden glow-box border border-primary/30">
<div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&amp;auto=format&amp;fit=crop&amp;w=1000&amp;q=80')] bg-cover bg-center" data-alt="A high-end modern internet cafe interior with rows of gaming PCs. The room is dimly lit with deep ink-like backgrounds and accented by vibrant electric cyan and neon purple lighting. High-performance gaming rigs with glowing LED components are visible. The atmosphere is immersive, technical, and premium, perfectly capturing the Cyber-Modernism aesthetic of a professional gaming lounge." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD1m0b99Rw7mOmZFjDn1pQOH6_m6kPs5dexnjDcv5TnHUdrJT1-b3xHBVD_kzeHpQUwW_fvl-mZ43fdoVdYFdxBZhjYPpsErkFljIXo4B7vMBiRjFpdSgCJX7_MaKTzPgETGGOVQuxhxL0BUdCJ0dRLz_QDp-4FRmhNqxb7GC-HnrCV46nA7ChG3uO8nQjgM12TOmTJRal-sVoxkox-IFX3wNwrZi3p_amBcA4IVAq0qgyc56_pPeMiGHJqAKC5ly3FrlJ4zwCZEN4');">
<div class="absolute inset-0 bg-gradient-to-r from-background via-background/50 to-transparent"></div>
</div>
</div>
</section>

<!-- Availability Status -->
<section class="px-gutter py-md max-w-container-max mx-auto">
<div class="bg-surface-container rounded-xl p-md flex flex-col md:flex-row justify-between items-center border border-outline-variant gap-md">
<div class="flex items-center gap-sm">
<span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">computer</span>
<span class="font-headline-md text-headline-md">PC Availability</span>
</div>
<div class="flex gap-md">
<div class="flex items-center gap-xs">
<div class="w-3 h-3 rounded-full bg-primary glow-box"></div>
<span class="text-on-surface-variant font-body-sm">24 Available</span>
</div>
<div class="flex items-center gap-xs">
<div class="w-3 h-3 rounded-full bg-secondary"></div>
<span class="text-on-surface-variant font-body-sm">8 In Use</span>
</div>
<div class="flex items-center gap-xs">
<div class="w-3 h-3 rounded-full bg-error"></div>
<span class="text-on-surface-variant font-body-sm">2 Maintenance</span>
</div>
</div>
</div>
</section>

<!-- Features Bento Grid -->
<section class="px-gutter py-xl max-w-container-max mx-auto">
<div class="grid grid-cols-1 md:grid-cols-4 gap-sm">
<!-- Daftar PC -->
<a href="{{ route('page') }}"
   class="md:col-span-2 md:row-span-2 block">
<div class="bg-surface-container-high rounded-xl p-md border-t border-primary/50 bg-gradient-to-b from-transparent to-surface-container-lowest flex flex-col justify-between group hover:border-primary transition-colors cursor-pointer relative overflow-hidden">
<div class="z-10">
<span class="material-symbols-outlined text-primary mb-xs" style="font-variation-settings: 'FILL' 1;">desktop_windows</span>
<h3 class="font-headline-lg text-headline-lg mb-xs">Daftar PC</h3>
<p class="text-on-surface-variant font-body-sm">Eksplorasi spesifikasi rig gaming high-end kami. Dari tier standard hingga VIP.</p>
</div>
<div class="absolute bottom-0 right-0 p-md opacity-20 group-hover:opacity-100 transition-opacity">
<span class="material-symbols-outlined text-display-lg text-primary">arrow_forward</span>
</div>
</div>
</a>
<!-- Katalog Game -->
<div class="md:col-span-2 bg-surface-container rounded-xl p-md border border-outline-variant hover:border-primary/50 transition-colors cursor-pointer flex items-center gap-md">
<div class="bg-surface p-sm rounded-lg border border-primary/20 glow-box">
<span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">sports_esports</span>
</div>
<div>
<h3 class="font-headline-md text-headline-md">Katalog Game</h3>
<p class="text-on-surface-variant font-body-sm">Ribuan game ter-update.</p>
</div>
</div>
<!-- Promo -->
<div class="bg-surface-container rounded-xl p-md border border-outline-variant hover:border-secondary/50 transition-colors cursor-pointer flex flex-col justify-between">
<span class="material-symbols-outlined text-secondary mb-xs" style="font-variation-settings: 'FILL' 1;">local_offer</span>
<h3 class="font-headline-md text-headline-md">Promo</h3>
</div>
<!-- Member Area -->
<div class="bg-surface-container rounded-xl p-md border border-outline-variant hover:border-primary/50 transition-colors cursor-pointer flex flex-col justify-between">
<span class="material-symbols-outlined text-primary mb-xs" style="font-variation-settings: 'FILL' 1;">badge</span>
<h3 class="font-headline-md text-headline-md">Member Area</h3>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-surface-container-lowest font-body-sm text-body-sm w-full mt-auto border-t border-outline-variant">
<div class="flex flex-col md:flex-row justify-between items-center px-gutter py-md gap-xs max-w-container-max mx-auto">
<div class="font-display-lg text-body-lg text-primary glow-text">NetCity</div>
<p class="text-on-surface-variant text-center md:text-left opacity-80 hover:opacity-100 transition-colors">© 2024 NetCity Gaming Lounge. Manual billing must be processed at the cashier counter.</p>
<ul class="flex gap-md">
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Terms of Service</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Contact Support</a></li>
</ul>
</div>
</footer>
</body></html>
<!DOCTYPE html>

<html class="dark" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Katalog Game - NetCity</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;family=Montserrat:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
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
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                    "label-md": ["12px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "headline-md": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "headline-lg": ["32px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}]
            }
          }
        }
      }
    </script>
<style>
        body { background-color: #0a0e17; color: #dfe2ef; }
        .glass-panel {
            background: rgba(22, 27, 38, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(58, 73, 75, 0.5);
        }
        .glow-hover:hover {
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.2);
            border-top-color: #00f2ff;
        }
        .neon-text { text-shadow: 0 0 8px rgba(0, 242, 255, 0.8); }
    </style>
</head>
<body class="font-body-md text-body-md bg-surface-container-lowest antialiased min-h-screen flex flex-col">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-xl border-b border-primary/30 shadow-[0_0_15px_rgba(0,242,255,0.2)] transition-all duration-300 ease-in-out font-body-md text-body-md">
<div class="flex justify-between items-center px-gutter py-xs max-w-container-max mx-auto">
<div class="font-display-lg text-headline-md font-bold text-primary tracking-tighter">NetCity</div>
<!-- Navigation Links (Desktop) -->
<div class="hidden md:flex gap-md items-center">
<a class="text-on-surface-variant hover:text-primary transition-colors hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)]" href="/">Home</a>
<a class="text-on-surface-variant hover:text-primary transition-colors hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)]" href="/page">Daftar PC</a>
<a class="text-primary font-bold border-b-2 border-primary pb-1 hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)]" href="#">Katalog Game</a>
<a class="text-on-surface-variant hover:text-primary transition-colors hover:drop-shadow-[0_0_8px_rgba(0,242,255,0.8)]" href="#">Promo</a>
</div>
<!-- Actions -->
<div class="flex gap-sm items-center">
<button class="text-primary hover:text-primary-container font-label-md transition-colors hidden md:block">Login</button>
<button class="bg-primary-container text-on-primary-container px-sm py-xs rounded hover:shadow-[0_0_15px_rgba(0,242,255,0.4)] transition-all font-label-md">Register</button>
</div>
</div>
</nav>
<!-- Main Content Canvas -->
<main class="flex-grow pt-[80px] pb-xl px-gutter max-w-container-max mx-auto w-full">
<!-- Header Section -->
<div class="mb-lg mt-md">
<h1 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary mb-xs">Katalog Game Terinstal</h1>
<p class="text-on-surface-variant max-w-2xl">Jelajahi perpustakaan game premium kami. Semua game sudah terinstal dan siap dimainkan di PC dengan spesifikasi yang sesuai.</p>
</div>
<!-- Filter & Search Bar -->
<div class="glass-panel rounded-lg p-sm mb-lg flex flex-col md:flex-row gap-sm items-center justify-between border-t border-primary/20">
<div class="flex flex-wrap gap-xs">
<button class="px-sm py-xs rounded bg-primary/10 text-primary border border-primary/30 font-label-md hover:bg-primary/20 transition-colors">Semua</button>
<button class="px-sm py-xs rounded bg-surface-container text-on-surface border border-outline-variant font-label-md hover:border-primary/50 transition-colors">FPS</button>
<button class="px-sm py-xs rounded bg-surface-container text-on-surface border border-outline-variant font-label-md hover:border-primary/50 transition-colors">MOBA</button>
<button class="px-sm py-xs rounded bg-surface-container text-on-surface border border-outline-variant font-label-md hover:border-primary/50 transition-colors">RPG</button>
<button class="px-sm py-xs rounded bg-surface-container text-on-surface border border-outline-variant font-label-md hover:border-primary/50 transition-colors">Sports</button>
<button class="px-sm py-xs rounded bg-surface-container text-on-surface border border-outline-variant font-label-md hover:border-primary/50 transition-colors">Battle Royale</button>
</div>
<div class="relative w-full md:w-64">
<span class="material-symbols-outlined absolute left-xs top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="w-full bg-surface-container border border-outline-variant rounded py-xs pl-lg pr-sm text-on-surface focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none transition-all placeholder:text-outline" placeholder="Cari game..." type="text"/>
</div>
</div>
<!-- Game Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-gutter">
<!-- Game Card 1 -->
<div class="glass-panel rounded-lg overflow-hidden flex flex-col glow-hover transition-all duration-300 border-t border-transparent hover:border-primary">
<div class="h-40 w-full relative bg-surface-container-high">
<img alt="Cyberpunk tactical shooter interface" class="w-full h-full object-cover opacity-80 mix-blend-luminosity hover:mix-blend-normal transition-all" data-alt="A high-quality in-game screenshot of a futuristic tactical first-person shooter. The scene features heavily armored cybernetic soldiers in an urban neon-lit environment. The lighting is dark with bright electric blue and magenta accents, matching the overall cyber-modernist UI theme. The mood is tense and action-packed, with a highly detailed, professional gaming visual style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC9q7KN1ElQwvBf90vYWKSDqyl658MdYMcMQkFQqn_ppaONe-K4zM0TCNPrj_frMdST73uRoTFMx-wwS-bhT1bihFlaHYfRThF5BaCzyO1QxXzkYf9xqEYq9v1L0d8PhIx-kCh21SIjPmhbC8eJimqXiV44MT6YauXc42t-lqygm0tSUGz3ioy-X8JlMP6elxAH-qzH7r8GvUjTMD_sc7Y_znrT9N0AvzTvVWUz-PdF6l6P99xlg756uFcr7pmZyVfwggn82zx5TQE"/>
<div class="absolute top-xs right-xs bg-surface-container-highest/90 backdrop-blur px-xs py-1 rounded text-primary font-label-md text-[10px] border border-primary/30 flex items-center gap-1">
<span class="material-symbols-outlined text-[12px]">verified</span> Terinstal
                    </div>
</div>
<div class="p-sm flex flex-col flex-grow bg-gradient-to-b from-transparent to-surface-container-low/50">
<h3 class="font-headline-md text-headline-md text-on-surface mb-1 truncate">Valorant</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-md">Riot Games</p>
<div class="flex flex-wrap gap-1 mb-md">
<span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">FPS</span>
<span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">Tactical</span>
</div>
<div class="mt-auto space-y-2 border-t border-outline-variant/30 pt-sm">
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-outline text-[16px]">memory</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Min. 8GB RAM</span>
</div>
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-primary-container text-[16px]">computer</span>
<span class="font-body-sm text-body-sm text-primary-fixed-dim">Available in Regular &amp; VIP</span>
</div>
</div>
</div>
</div>
<!-- Game Card 2 -->
<div class="glass-panel rounded-lg overflow-hidden flex flex-col glow-hover transition-all duration-300 border-t border-transparent hover:border-primary">
<div class="h-40 w-full relative bg-surface-container-high">
<img alt="Fantasy MOBA gameplay scene" class="w-full h-full object-cover opacity-80 mix-blend-luminosity hover:mix-blend-normal transition-all" data-alt="A dynamic screenshot of a high-fantasy multiplayer online battle arena (MOBA) game. Magical spells explode in vibrant hues of cyan and purple against a dark, mystical forest background. The scene is captured from an isometric perspective, showing detailed character models and intricate terrain. The lighting emphasizes the glowing particle effects, aligning with a premium esports aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDJ4jHY8tXUVcqCDYwFAddjzYk5ERQ5yC6JkRTvGukxuFndrY7ulHHHrptXwSb07BcRp7MQ5LsG60_KnSl0gNKxyEqkmXBIxcajTFPg8fdPjXLqL-_ULW0sx6CxL6YkB5WpOhGeUIABJ4P716bv_N0hhPCpIAQlelaSmD-EKmpgH7lX-87xPNqUYxtRKBm4Z68i1SEkRZBtPsAFiayzuzZ0UuBkRgC83Cohtsxwbnb2U6uv3PtDviNQ7mFLyWjE8WCHIiLZ_Mqx6r0"/>
<div class="absolute top-xs right-xs bg-surface-container-highest/90 backdrop-blur px-xs py-1 rounded text-primary font-label-md text-[10px] border border-primary/30 flex items-center gap-1">
<span class="material-symbols-outlined text-[12px]">verified</span> Terinstal
                    </div>
</div>
<div class="p-sm flex flex-col flex-grow bg-gradient-to-b from-transparent to-surface-container-low/50">
<h3 class="font-headline-md text-headline-md text-on-surface mb-1 truncate">Dota 2</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-md">Valve Corporation</p>
<div class="flex flex-wrap gap-1 mb-md">
<span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">MOBA</span>
<span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">Strategy</span>
</div>
<div class="mt-auto space-y-2 border-t border-outline-variant/30 pt-sm">
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-outline text-[16px]">memory</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Min. 8GB RAM</span>
</div>
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-primary-container text-[16px]">computer</span>
<span class="font-body-sm text-body-sm text-primary-fixed-dim">Available in Regular &amp; VIP</span>
</div>
</div>
</div>
</div>
<!-- Game Card 3 -->
<div class="glass-panel rounded-lg overflow-hidden flex flex-col glow-hover transition-all duration-300 border-t border-transparent hover:border-primary">
<div class="h-40 w-full relative bg-surface-container-high">
<img alt="High fidelity racing game" class="w-full h-full object-cover opacity-80 mix-blend-luminosity hover:mix-blend-normal transition-all" data-alt="A highly realistic racing simulator screenshot showing a heavily modified sports car speeding down a wet, neon-lit city street at night. Reflections of cyan and magenta lights bounce off the dark asphalt and the car's metallic surface. The image conveys extreme speed and cutting-edge graphics performance, perfectly suited for a high-end gaming lounge display." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6hr5QjWz1XPPuZp8ctxleSvVAJqvUY4F9uivJrrhvBZINRybpUYiCIWL4-OJxeIclVQH7iJpBX1wmDnuFrclp46Qb_jcGun3OZgyjDGu1YB6-UaD_qZ-qwkOpnhVKpyiInj78YDGC2L4bBSB13WmbwItypU3nyM_zzlCfIvnSCBUsKJpWl3JEJ4t8Tu9_TPpNIYAG7SLMw-C8aUUYCtGLOiijV27UfZQtXoajI_FCMCla6yxFQMvxjBa4FxLEC-ICA4xs2YDt4xM"/>
<div class="absolute top-xs right-xs bg-surface-container-highest/90 backdrop-blur px-xs py-1 rounded text-primary font-label-md text-[10px] border border-primary/30 flex items-center gap-1">
<span class="material-symbols-outlined text-[12px]">verified</span> Terinstal
                    </div>
</div>
<div class="p-sm flex flex-col flex-grow bg-gradient-to-b from-transparent to-surface-container-low/50">
<h3 class="font-headline-md text-headline-md text-on-surface mb-1 truncate">Cyberpunk 2077</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-md">CD Projekt Red</p>
<div class="flex flex-wrap gap-1 mb-md">
<span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">RPG</span>
<span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">Action</span>
</div>
<div class="mt-auto space-y-2 border-t border-outline-variant/30 pt-sm">
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-outline text-[16px]">memory</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Min. 16GB RAM</span>
</div>
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-secondary-container text-[16px]">diamond</span>
<span class="font-body-sm text-body-sm text-secondary-fixed-dim">Available in Gold &amp; VIP Only</span>
</div>
</div>
</div>
</div>
<!-- Game Card 4 -->
<div class="glass-panel rounded-lg overflow-hidden flex flex-col glow-hover transition-all duration-300 border-t border-transparent hover:border-primary">
<div class="h-40 w-full relative bg-surface-container-high">
<img alt="Battle royale jump scene" class="w-full h-full object-cover opacity-80 mix-blend-luminosity hover:mix-blend-normal transition-all" data-alt="A wide landscape shot of a massive battle royale island map viewed from high above. Military transport aircraft fly over a varied terrain of ruined cities and lush forests. The scene is dramatic with a moody, overcast sky. The color palette emphasizes dark greens and stark greys, fitting the serious, competitive atmosphere of a premium internet cafe." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCuzCZ7ncXosHDuuWfQ_9yCQiD4P1KBltyKBRLU09cR2cMTLLxaQsCofd2rmoYCdhZ5DDtatesMXOtCRwTB3-Z4VG65iCGU5BF-5Nhgh4fZZ_iht4ouP2Q_Uu8CVIBG8jVY8_cJa2i7zCLo4LWFPCvtO32RliKZKCDLE0EWXDF0DCSg8GVA8DO755_jGu9N8TyGOtjYpsvOAyQPBYQFt72Xu_bRsWTHJnoBdq6ndh88uB-YqtUqy1NKLI6xyWWSbWfvZdGXH8Bmo2A"/>
<div class="absolute top-xs right-xs bg-surface-container-highest/90 backdrop-blur px-xs py-1 rounded text-primary font-label-md text-[10px] border border-primary/30 flex items-center gap-1">
<span class="material-symbols-outlined text-[12px]">verified</span> Terinstal
                    </div>
</div>
<div class="p-sm flex flex-col flex-grow bg-gradient-to-b from-transparent to-surface-container-low/50">
<h3 class="font-headline-md text-headline-md text-on-surface mb-1 truncate">Apex Legends</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-md">Respawn Entertainment</p>
<div class="flex flex-wrap gap-1 mb-md">
<span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">Battle Royale</span>
<span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">FPS</span>
</div>
<div class="mt-auto space-y-2 border-t border-outline-variant/30 pt-sm">
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-outline text-[16px]">memory</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Min. 8GB RAM</span>
</div>
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-primary-container text-[16px]">computer</span>
<span class="font-body-sm text-body-sm text-primary-fixed-dim">Available in Regular &amp; VIP</span>
</div>
</div>
</div>
</div>
</div>
</main>
<!-- Footer -->
<footer class="w-full mt-auto bg-surface-container-lowest border-t border-outline-variant font-body-sm text-body-sm opacity-80 hover:opacity-100 transition-opacity">
<div class="flex flex-col md:flex-row justify-between items-center px-gutter py-md gap-xs max-w-container-max mx-auto">
<div class="font-display-lg text-body-lg text-primary">NetCity</div>
<div class="text-on-surface-variant text-center md:text-left">
                © 2024 NetCity Gaming Lounge. Manual billing must be processed at the cashier counter.
            </div>
<div class="flex gap-sm">
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Terms of Service</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Privacy Policy</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Contact Support</a>
</div>
</div>
</footer>
</body></html>
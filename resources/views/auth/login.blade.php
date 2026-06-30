<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>NetCity Gaming Lounge - Authentication</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
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
                    borderRadius: {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    spacing: {
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
                    fontFamily: {
                        "body-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "display-lg": ["Montserrat"],
                        "label-md": ["Inter"],
                        "headline-md": ["Montserrat"],
                        "headline-lg-mobile": ["Montserrat"],
                        "headline-lg": ["Montserrat"],
                        "body-sm": ["Inter"]
                    },
                    fontSize: {
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
            background-color: theme('colors.surface-container-lowest');
            color: theme('colors.on-background');
        }

        .glow-effect {
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.2);
        }

        .input-glow:focus {
            box-shadow: 0 0 8px rgba(0, 242, 255, 0.4);
            border-color: theme('colors.primary-container');
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="absolute inset-0 z-0 bg-cover bg-center bg-no-repeat opacity-40 mix-blend-luminosity" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBN0Z66djcASXo8yEW_IrG7X2fpSLzEMrOya66GgHQtO384knDERs78iv-Iw51b8Ex2ojRSXlP5FilG6oAK86yH_vd6ZF_Hb2RqKG1R9d0Rk5ykbnATXkj_VgeKAd4EoDBN7NDlbRAqVLnhUaVDtejYI9NYy__HZup5zBa8nO1X6npR_AV0F-patC9dxBl-vPK2y0f3qXJki4TnDOjgJwHP9t8GpPRsiIQU8jPzq_5T1F2QbmdCj1qxrl7Aij9wyEZ0s5WSxHD8cyo');"></div>
    
    <div class="absolute inset-0 z-0 bg-gradient-to-t from-surface-container-lowest via-surface-container-lowest/80 to-transparent"></div>
    
    <main class="relative z-10 w-full max-w-[1000px] mx-auto px-gutter py-xl flex flex-col md:flex-row gap-0">
        <div class="hidden md:flex flex-col justify-center p-xl bg-surface-container/80 backdrop-blur-xl border border-outline-variant/50 border-r-0 rounded-l-xl w-1/2 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-primary-container/5 to-transparent pointer-events-none"></div>
            <div class="relative z-10">
                <h1 class="font-display-lg text-display-lg text-primary tracking-tighter mb-sm drop-shadow-[0_0_15px_rgba(0,242,255,0.3)]">NetCity</h1>
                <h2 class="font-headline-lg text-headline-lg text-on-surface mb-md">Premium Esports<br />Experience</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-sm">
                    Enter the high-performance zone. Secure your session, manage your library, and dominate the leaderboards.
                </p>
                <div class="mt-xl space-y-md">
                    <div class="flex items-center gap-sm">
                        <div class="w-10 h-10 rounded-full bg-surface flex items-center justify-center border border-primary/30 glow-effect">
                            <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">speed</span>
                        </div>
                        <span class="font-body-md text-body-md text-on-surface">Zero-Latency Network</span>
                    </div>
                    <div class="flex items-center gap-sm">
                        <div class="w-10 h-10 rounded-full bg-surface flex items-center justify-center border border-primary/30 glow-effect">
                            <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">computer</span>
                        </div>
                        <span class="font-body-md text-body-md text-on-surface">RTX 4090 Rigs</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 bg-surface/90 backdrop-blur-xl border border-primary/30 rounded-xl md:rounded-l-none md:rounded-r-xl p-lg md:p-xl shadow-[0_0_25px_rgba(0,242,255,0.15)] relative overflow-hidden">
            <div class="md:hidden text-center mb-xl">
                <h1 class="font-display-lg text-display-lg text-primary tracking-tighter drop-shadow-[0_0_15px_rgba(0,242,255,0.3)]">NetCity</h1>
                <p class="font-body-sm text-body-sm text-on-surface-variant mt-xs">Premium Gaming Lounge</p>
            </div>
            
            <div class="flex border-b border-outline-variant mb-xl">
                <button class="flex-1 pb-sm font-label-md text-label-md text-primary border-b-2 border-primary transition-all text-center" id="tab-login">LOGIN</button>
                <button class="flex-1 pb-sm font-label-md text-label-md text-on-surface-variant hover:text-primary transition-all text-center" id="tab-register">REGISTER</button>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-md" id="form-login">
                @csrf
                <div>
                    <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="login">Email or Username</label>
                    <div class="relative">
                        <span class="absolute left-sm top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">person</span>
                        <input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-sm pl-[44px] pr-sm font-body-md text-body-md text-on-surface placeholder:text-outline-variant input-glow transition-all outline-none" id="login" type="text" name="login" value="{{ old('login') }}" placeholder="Enter your identifier" required autofocus />
                    </div>
                    @if($errors->get('login'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('login') }}</p>
                    @endif
                </div>
                <div>
                    <div class="flex justify-between items-center mb-xs">
                        <label class="block font-label-md text-label-md text-on-surface-variant" for="password">Password</label>
                        @if (Route::has('password.request'))
                            <a class="font-label-md text-label-md text-primary hover:text-primary-fixed-dim transition-colors drop-shadow-[0_0_8px_rgba(0,242,255,0.3)]" href="{{ route('password.request') }}">Forgot?</a>
                        @endif
                    </div>
                    <div class="relative">
                        <span class="absolute left-sm top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">lock</span>
                        <input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-sm pl-[44px] pr-sm font-body-md text-body-md text-on-surface placeholder:text-outline-variant input-glow transition-all outline-none" id="password" type="password" name="password" placeholder="Enter your password" required autocomplete="current-password" />
                    </div>
                    @if($errors->get('password'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="pt-sm">
                    <button class="w-full bg-primary-container text-on-primary py-sm rounded-lg font-label-md text-label-md tracking-wider glow-effect hover:bg-primary transition-colors flex items-center justify-center gap-xs" type="submit">LOGIN <span class="material-symbols-outlined text-[18px]">arrow_forward</span></button>
                </div>
            </form>

            <form method="POST" action="{{ route('register') }}" class="space-y-md hidden" id="form-register">
                @csrf
                <div>
                    <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="name">Full Name</label>
                    <div class="relative">
                        <span class="absolute left-sm top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">person</span>
                        <input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-sm pl-[44px] pr-sm font-body-md text-body-md text-on-surface placeholder:text-outline-variant input-glow transition-all outline-none" id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Enter your full name" required />
                    </div>
                    @if($errors->get('name'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div>
                    <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="username">Username</label>
                    <div class="relative">
                        <span class="absolute left-sm top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">badge</span>
                        <input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-sm pl-[44px] pr-sm font-body-md text-body-md text-on-surface placeholder:text-outline-variant input-glow transition-all outline-none" id="username" type="text" name="username" value="{{ old('username') }}" placeholder="Choose a display name" required />
                    </div>
                    @if($errors->get('username'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('username') }}</p>
                    @endif
                </div>
                <div>
                    <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="reg-email">Email Address</label>
                    <div class="relative">
                        <span class="absolute left-sm top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">mail</span>
                        <input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-sm pl-[44px] pr-sm font-body-md text-body-md text-on-surface placeholder:text-outline-variant input-glow transition-all outline-none" id="reg-email" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required />
                    </div>
                    @if($errors->get('email'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div>
                    <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="reg-password">Password</label>
                    <div class="relative">
                        <span class="absolute left-sm top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">lock</span>
                        <input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-sm pl-[44px] pr-sm font-body-md text-body-md text-on-surface placeholder:text-outline-variant input-glow transition-all outline-none" id="reg-password" type="password" name="password" placeholder="Create a strong password" required />
                    </div>
                    @if($errors->get('password'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div>
                    <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="password_confirmation">Confirm Password</label>
                    <div class="relative">
                        <span class="absolute left-sm top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">lock_reset</span>
                        <input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-sm pl-[44px] pr-sm font-body-md text-body-md text-on-surface placeholder:text-outline-variant input-glow transition-all outline-none" id="password_confirmation" type="password" name="password_confirmation" placeholder="Repeat your password" required />
                    </div>
                </div>
                <div class="pt-sm">
                    <button class="w-full bg-transparent border border-primary text-primary py-sm rounded-lg font-label-md text-label-md tracking-wider hover:bg-primary/10 transition-colors flex items-center justify-center gap-xs" type="submit">
                        CREATE ACCOUNT
                        <span class="material-symbols-outlined text-[18px]">person_add</span>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabLogin = document.getElementById('tab-login');
            const tabRegister = document.getElementById('tab-register');
            const formLogin = document.getElementById('form-login');
            const formRegister = document.getElementById('form-register');

            const activeTabClasses = ['text-primary', 'border-b-2', 'border-primary'];
            const inactiveTabClasses = ['text-on-surface-variant', 'border-transparent'];

            // --- 🚀 TAMBAHKAN LOGIKA DETEKSI AUTO-TAB REGISTER DI SINI ---
            if (window.location.hash === '#register') {
                formRegister.classList.remove('hidden');
                formLogin.classList.add('hidden');
                
                tabRegister.classList.add(...activeTabClasses);
                tabRegister.classList.remove(...inactiveTabClasses);
                
                tabLogin.classList.remove(...activeTabClasses);
                tabLogin.classList.add(...inactiveTabClasses);
            }
            // -----------------------------------------------------------

            tabLogin.addEventListener('click', () => {
                formLogin.classList.remove('hidden');
                formRegister.classList.add('hidden');
                
                tabLogin.classList.add(...activeTabClasses);
                tabLogin.classList.remove(...inactiveTabClasses);
                
                tabRegister.classList.remove(...activeTabClasses);
                tabRegister.classList.add(...inactiveTabClasses);
                window.location.hash = ''; // hapus hash saat ganti tab
            });

            tabRegister.addEventListener('click', () => {
                formRegister.classList.remove('hidden');
                formLogin.classList.add('hidden');
                
                tabRegister.classList.add(...activeTabClasses);
                tabRegister.classList.remove(...inactiveTabClasses);
                
                tabLogin.classList.remove(...activeTabClasses);
                tabLogin.classList.add(...inactiveTabClasses);
                window.location.hash = 'register'; // set hash saat klik register
            });
        });
    </script>
</body>

</html>
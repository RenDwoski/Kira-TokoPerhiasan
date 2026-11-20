<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'KIRA — Maison de Diamants | Haute Joaillerie')</title>
    <meta name="description" content="KIRA Maison de Diamants — Kemurnian Cahaya Berlian Abadi. Cincin Solitaire 18K Champagne Gold & Berlian Alami Bersertifikat GIA D-Color Flawless.">

    <!-- Google Fonts: Playfair Display, Cormorant Garamond, Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,600&family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F7F4EE] text-[#0F1E2E] antialiased selection:bg-[#C99A49]/25 selection:text-[#0F1E2E] min-h-screen flex flex-col overflow-x-hidden">

    <!-- Section 1.0: Interactive Apple-Inspired Sticky / Glass Navbar -->
    <div id="kira-nav-wrapper" class="fixed top-0 inset-x-0 z-50 transition-all duration-500 ease-[cubic-bezier(0.28,0.11,0.32,1)]">
        <header id="kira-navbar"
            data-mode="full"
            data-theme="pearl"
            class="apple-glass-nav w-full h-[88px] bg-[#F7F4EE]/95 border-b border-[#E5DEC9]/80 transition-all duration-500 ease-[cubic-bezier(0.28,0.11,0.32,1)]">
            <div class="max-w-[1440px] mx-auto h-full px-6 md:px-12 lg:px-[120px] flex items-center justify-between gap-4">

                <!-- Left: KIRA Brand Lockup (Logomark 02 Lotus Crown + Logotype 01 Haute Didone Serif) -->
                <a href="{{ route('home') }}" class="flex items-center gap-3.5 group shrink-0" aria-label="KIRA Maison de Diamants Home">
                    <div class="relative w-[36px] h-[39px] flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <img id="kira-logo-light" src="/assets/kira/logo-lotus-crown.svg" alt="KIRA Lotus Crown Solitaire Logomark" width="36" height="39" class="block w-[36px] h-[39px]">
                        <img id="kira-logo-dark" src="/assets/kira/logo-lotus-crown-dark.svg" alt="KIRA Lotus Crown Solitaire Logomark Dark" width="36" height="39" class="hidden w-[36px] h-[39px]">
                    </div>
                    <span id="kira-logo-divider" class="h-7 w-[1px] bg-[#D8CEBE] transition-colors duration-300"></span>
                    <div class="flex flex-col">
                        <span id="kira-brand-title" class="font-serif font-bold text-[19px] leading-tight tracking-[0.04em] text-[#0F1E2E] transition-colors duration-300">KIRA</span>
                        <span id="kira-brand-subtitle" class="font-sans font-bold text-[8.5px] tracking-[0.14em] text-[#9E7329] uppercase mt-0.5 transition-colors duration-300">MAISON DE DIAMANTS</span>
                    </div>
                </a>

                <!-- Center: 5 Core Sitemap Navigation Items -->
                <nav class="hidden lg:flex items-center gap-2 xl:gap-5" aria-label="Main Sitemap Navigation">
                    @php
                        $navItems = [
                            ['route' => 'home', 'label' => 'Home'],
                            ['route' => 'about', 'label' => 'About'],
                            ['route' => 'products', 'label' => 'Product'],
                            ['route' => 'gallery', 'label' => 'Gallery'],
                            ['route' => 'contact', 'label' => 'Contact'],
                        ];
                    @endphp

                    @foreach ($navItems as $item)
                        @php
                            $isActive = request()->routeIs($item['route']);
                        @endphp
                        <a href="{{ route($item['route']) }}"
                           class="kira-nav-link relative px-4 py-2 rounded-full text-[13.5px] transition-all duration-300 {{ $isActive ? 'kira-nav-active font-bold text-[#0F1E2E] bg-[#EFE9DC]' : 'font-normal text-[#243B53] hover:text-[#0F1E2E] hover:bg-[#EFE9DC]/50' }}">
                            <span>{{ $item['label'] }}</span>
                            @if ($isActive)
                                <span class="absolute bottom-1.5 left-1/2 -translate-x-1/2 w-5 h-[2.5px] rounded-full bg-[#C99A49]"></span>
                            @endif
                        </a>
                    @endforeach
                </nav>

                <!-- Right: Interactive Apple Glass Status Pill & VIP Booking CTA -->
                <div class="flex items-center gap-3 shrink-0">
                    <!-- Interactive Glass Mode Indicator / Switcher Pill -->
                    <button type="button"
                            id="kira-glass-badge"
                            title="Klik untuk beralih mode Apple Glass (Full Bar / Floating Capsule / Midnight Dark Glass)"
                            class="hidden sm:inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/90 border border-[#E5DEC9] text-[10px] font-bold text-[#5C6877] shadow-2xs hover:border-[#C99A49] transition-all duration-300 cursor-pointer">
                        <span id="kira-glass-dot" class="w-2 h-2 rounded-full bg-[#C99A49] transition-transform duration-300"></span>
                        <span id="kira-glass-text">Scroll Glass</span>
                    </button>

                    <!-- VIP Booking Primary Pill CTA -->
                    <a href="{{ route('contact') }}"
                       id="kira-nav-cta"
                       class="inline-flex items-center justify-center px-5 py-2.5 rounded-full bg-[#0F1E2E] text-white font-bold text-[12.5px] tracking-wide hover:bg-[#193048] active:scale-[0.99] transition-all duration-300 shadow-xs">
                        VIP Booking
                    </a>

                    <!-- Mobile Menu Toggle -->
                    <button type="button"
                            id="kira-mobile-toggle"
                            class="lg:hidden inline-flex items-center justify-center w-10 h-10 rounded-full border border-[#E5DEC9] bg-white/80 text-[#0F1E2E]"
                            aria-label="Buka Menu Navigasi">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 7h16M4 12h16M4 17h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation Drawer -->
            <div id="kira-mobile-menu" class="hidden lg:hidden bg-[#F7F4EE]/98 backdrop-blur-2xl border-b border-[#E5DEC9] px-6 py-5 shadow-xl">
                <div class="flex flex-col gap-2">
                    @foreach ($navItems as $item)
                        @php $isActive = request()->routeIs($item['route']); @endphp
                        <a href="{{ route($item['route']) }}"
                           class="flex items-center justify-between px-4 py-2.5 rounded-xl text-[14px] {{ $isActive ? 'bg-[#EFE9DC] font-bold text-[#0F1E2E]' : 'text-[#243B53]' }}">
                            <span>{{ $item['label'] }}</span>
                            @if ($isActive)
                                <span class="w-2 h-2 rounded-full bg-[#C99A49]"></span>
                            @endif
                        </a>
                    @endforeach
                    <div class="pt-2 mt-2 border-t border-[#E5DEC9] flex items-center justify-end">
                        <a href="{{ route('contact') }}" class="w-full text-center px-4 py-2.5 rounded-full bg-[#C99A49] text-[#0F1E2E] font-bold text-[12.5px]">
                            Book VIP Appointment
                        </a>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-- Spacer for fixed navbar (88px) -->
    <div class="h-[88px] shrink-0"></div>

    <!-- Main Page Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Section 1.5: Global Footer (Matches Figma Section_1_5_GlobalFooter) -->
    <footer class="bg-[#EFECE4] border-t border-[#DED6C6] text-[#0F1E2E] mt-auto">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px] pt-11 pb-7">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 pb-9 border-b border-[#D8CEBE]">

                <!-- Col 1: Brand Lockup & Description (4 cols) -->
                <div class="lg:col-span-4">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-3.5 group">
                        <img src="/assets/kira/logo-lotus-crown.svg" alt="KIRA Logomark" width="36" height="39" class="w-[36px] h-[39px]">
                        <span class="h-7 w-[1px] bg-[#D8CEBE]"></span>
                        <div class="flex flex-col">
                            <span class="font-serif font-bold text-[19px] leading-tight tracking-[0.04em] text-[#0F1E2E]">KIRA</span>
                            <span class="font-sans font-bold text-[8.5px] tracking-[0.14em] text-[#9E7329] uppercase mt-0.5">MAISON DE DIAMANTS</span>
                        </div>
                    </a>
                    <p class="mt-4 text-[12.5px] leading-[1.65] text-[#5C6877] max-w-[300px]">
                        Rumah perhiasan berlian modern dengan sertifikasi resmi GIA &amp; arsitektur Mahkota Teratai 18K.
                    </p>
                </div>

                <!-- Col 2: Sitemap Navigation (3 cols) -->
                <div class="lg:col-span-3">
                    <h3 class="font-sans font-bold text-[11px] tracking-[0.08em] text-[#0F1E2E] uppercase mb-3.5">
                        SITEMAP NAVIGATION
                    </h3>
                    <ul class="space-y-2 text-[12.5px] text-[#5C6877]">
                        <li><a href="{{ route('home') }}" class="hover:text-[#0F1E2E] hover:underline transition">01. Home / Landing Page</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-[#0F1E2E] hover:underline transition">02. About Maison</a></li>
                        <li><a href="{{ route('products') }}" class="hover:text-[#0F1E2E] hover:underline transition">03. Product / Collections</a></li>
                        <li><a href="{{ route('gallery') }}" class="hover:text-[#0F1E2E] hover:underline transition">04. Gallery / Lookbook</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-[#0F1E2E] hover:underline transition">05. Contact &amp; VIP Booking</a></li>
                    </ul>
                </div>

                <!-- Col 3: Layanan & Edukasi GIA (2.5 cols) -->
                <div class="lg:col-span-2">
                    <h3 class="font-sans font-bold text-[11px] tracking-[0.08em] text-[#0F1E2E] uppercase mb-3.5">
                        LAYANAN &amp; EDUKASI GIA
                    </h3>
                    <ul class="space-y-2 text-[12.5px] text-[#5C6877]">
                        <li><a href="{{ route('products') }}#gia-specs" class="hover:text-[#0F1E2E] transition">Standar Berlian 4C GIA</a></li>
                        <li><a href="{{ route('products') }}#gia-specs" class="hover:text-[#0F1E2E] transition">Verifikasi Laser Inscription</a></li>
                        <li><a href="{{ route('contact') }}#faq-section" class="hover:text-[#0F1E2E] transition">Custom Ring Sizing Gratis</a></li>
                        <li><a href="{{ route('contact') }}#faq-section" class="hover:text-[#0F1E2E] transition">Garansi Ultrasonic Care</a></li>
                    </ul>
                </div>

                <!-- Col 4: Flagship Boutique (3 cols) -->
                <div class="lg:col-span-3">
                    <h3 class="font-sans font-bold text-[11px] tracking-[0.08em] text-[#0F1E2E] uppercase mb-3.5">
                        FLAGSHIP BOUTIQUE
                    </h3>
                    <ul class="space-y-2 text-[12.5px] text-[#5C6877]">
                        <li class="font-medium text-[#0F1E2E]">KIRA Plaza Indonesia Level 1 #108</li>
                        <li>Senin – Minggu: 10.00 – 21.00 WIB</li>
                        <li>Concierge: <a href="tel:+622150889900" class="hover:text-[#0F1E2E] underline">+62 21 5088 9900</a></li>
                    </ul>
                    <div class="mt-4 flex items-center gap-2.5">
                        <a href="{{ route('contact') }}" class="w-8 h-8 rounded-full bg-white border border-[#D8CEBE] flex items-center justify-center text-[11px] font-bold text-[#0F1E2E] hover:border-[#C99A49] transition" title="Instagram KIRA">IG</a>
                        <a href="{{ route('contact') }}" class="w-8 h-8 rounded-full bg-white border border-[#D8CEBE] flex items-center justify-center text-[11px] font-bold text-[#0F1E2E] hover:border-[#C99A49] transition" title="WhatsApp Concierge">WA</a>
                        <a href="{{ route('products') }}" class="w-8 h-8 rounded-full bg-white border border-[#D8CEBE] flex items-center justify-center text-[11px] font-bold text-[#9E7329] hover:border-[#C99A49] transition" title="GIA Verification">GIA</a>
                    </div>
                </div>
            </div>

            <!-- Bottom Legal Bar -->
            <div class="pt-5 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11.5px] text-[#5C6877]">
                <p>© 2026 KIRA — Maison de Diamants. Apple-Inspired High-Fidelity Web Design.</p>
                <p>Privacy Policy • Terms of Service • GIA Guarantee</p>
            </div>
        </div>
    </footer>

    <!-- Interactive Scripts for Apple Liquid Glass Navbar & UI Controls -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navWrapper = document.getElementById('kira-nav-wrapper');
            const navbar = document.getElementById('kira-navbar');
            const glassBadge = document.getElementById('kira-glass-badge');
            const glassText = document.getElementById('kira-glass-text');
            const glassDot = document.getElementById('kira-glass-dot');
            const brandTitle = document.getElementById('kira-brand-title');
            const brandSubtitle = document.getElementById('kira-brand-subtitle');
            const logoLight = document.getElementById('kira-logo-light');
            const logoDark = document.getElementById('kira-logo-dark');
            const navCta = document.getElementById('kira-nav-cta');
            const mobileToggle = document.getElementById('kira-mobile-toggle');
            const mobileMenu = document.getElementById('kira-mobile-menu');

            // Available modes: 'full' (State B Full Glass Bar), 'capsule' (State B Floating Capsule), 'dark' (State C Midnight Dark Glass)
            let navMode = localStorage.getItem('kira_nav_mode') || 'full';
            let forcePreviewScrolled = false;

            function applyNavbarState() {
                const isScrolled = window.scrollY > 24 || forcePreviewScrolled;

                // Reset base classes
                navWrapper.className = 'fixed top-0 inset-x-0 z-50 transition-all duration-500 ease-[cubic-bezier(0.28,0.11,0.32,1)]';

                if (!isScrolled) {
                    // STATE A: DEFAULT TOP (scrollY = 0px, Height 88px, Solid Pearl)
                    navbar.className = 'apple-glass-nav w-full h-[88px] bg-[#F7F4EE]/95 border-b border-[#E5DEC9]/80 transition-all duration-500 ease-[cubic-bezier(0.28,0.11,0.32,1)]';
                    setLightThemeText();
                    if (glassText) glassText.textContent = 'Scroll Glass';
                    if (glassBadge) {
                        glassBadge.className = 'hidden sm:inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/90 border border-[#E5DEC9] text-[10px] font-bold text-[#5C6877] shadow-2xs hover:border-[#C99A49] transition-all duration-300 cursor-pointer';
                    }
                } else {
                    if (navMode === 'capsule') {
                        // STATE B (Floating Capsule Mode - 60px floating pill container)
                        navWrapper.className = 'fixed top-3 inset-x-0 z-50 px-4 md:px-10 transition-all duration-500 ease-[cubic-bezier(0.28,0.11,0.32,1)]';
                        navbar.className = 'apple-glass-nav apple-glass-scrolled max-w-[1360px] mx-auto h-[64px] rounded-full border border-[#C99A49]/45 transition-all duration-500 ease-[cubic-bezier(0.28,0.11,0.32,1)]';
                        setLightThemeText();
                        if (glassText) glassText.textContent = ' Floating Capsule';
                        if (glassBadge) {
                            glassBadge.className = 'hidden sm:inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#EFE9DC]/90 border border-[#C99A49] text-[10px] font-bold text-[#0F1E2E] shadow-2xs cursor-pointer transition-all duration-300';
                        }
                    } else if (navMode === 'dark') {
                        // STATE C: Midnight Dark Glass
                        navWrapper.className = 'fixed top-3 inset-x-0 z-50 px-4 md:px-10 transition-all duration-500 ease-[cubic-bezier(0.28,0.11,0.32,1)]';
                        navbar.className = 'apple-glass-nav apple-glass-dark max-w-[1360px] mx-auto h-[64px] rounded-full border border-[#C99A49]/50 transition-all duration-500 ease-[cubic-bezier(0.28,0.11,0.32,1)]';
                        setDarkThemeText();
                        if (glassText) glassText.textContent = ' Midnight Dark Glass';
                        if (glassBadge) {
                            glassBadge.className = 'hidden sm:inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#0F1E2E]/90 border border-[#C99A49] text-[10px] font-bold text-[#E6C587] shadow-2xs cursor-pointer transition-all duration-300';
                        }
                    } else {
                        // STATE B: Full Glass Bar (Default Scrolled - 66px height, 72% Pearl + Blur 24px + Saturate 190%)
                        navbar.className = 'apple-glass-nav apple-glass-scrolled w-full h-[66px] border-b border-[#C99A49]/35 transition-all duration-500 ease-[cubic-bezier(0.28,0.11,0.32,1)]';
                        setLightThemeText();
                        if (glassText) glassText.textContent = ' Glass Blur Active';
                        if (glassBadge) {
                            glassBadge.className = 'hidden sm:inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#EFE9DC]/90 border border-[#C99A49] text-[10px] font-bold text-[#0F1E2E] shadow-2xs cursor-pointer transition-all duration-300';
                        }
                    }
                }

                // Sync mode buttons on page if present
                document.querySelectorAll('[data-set-nav-mode]').forEach(btn => {
                    const m = btn.getAttribute('data-set-nav-mode');
                    if (m === navMode) {
                        btn.classList.add('bg-[#C99A49]', 'text-[#0F1E2E]', 'border-[#C99A49]');
                        btn.classList.remove('bg-transparent', 'text-[#F7F4EE]', 'border-[#C99A49]/60');
                    } else {
                        btn.classList.remove('bg-[#C99A49]', 'text-[#0F1E2E]', 'border-[#C99A49]');
                        btn.classList.add('bg-transparent', 'text-[#F7F4EE]', 'border-[#C99A49]/60');
                    }
                });
            }

            function setLightThemeText() {
                if (brandTitle) brandTitle.className = 'font-serif font-bold text-[19px] leading-tight tracking-[0.04em] text-[#0F1E2E] transition-colors duration-300';
                if (brandSubtitle) brandSubtitle.className = 'font-sans font-bold text-[8.5px] tracking-[0.14em] text-[#9E7329] uppercase mt-0.5 transition-colors duration-300';
                if (logoLight) logoLight.classList.remove('hidden');
                if (logoDark) logoDark.classList.add('hidden');
                if (navCta) navCta.className = 'inline-flex items-center justify-center px-5 py-2 rounded-full bg-[#0F1E2E] text-white font-bold text-[12px] tracking-wide hover:bg-[#193048] transition-all duration-300 shadow-xs';
                document.querySelectorAll('.kira-nav-link').forEach(link => {
                    if (link.classList.contains('kira-nav-active')) {
                        link.className = 'kira-nav-link kira-nav-active relative px-4 py-1.5 rounded-full text-[13px] font-bold text-[#0F1E2E] bg-[#EFE9DC] transition-all duration-300';
                    } else {
                        link.className = 'kira-nav-link relative px-4 py-1.5 rounded-full text-[13px] font-normal text-[#243B53] hover:text-[#0F1E2E] hover:bg-[#EFE9DC]/50 transition-all duration-300';
                    }
                });
            }

            function setDarkThemeText() {
                if (brandTitle) brandTitle.className = 'font-serif font-bold text-[19px] leading-tight tracking-[0.04em] text-[#F7F4EE] transition-colors duration-300';
                if (brandSubtitle) brandSubtitle.className = 'font-sans font-bold text-[8.5px] tracking-[0.14em] text-[#E6C587] uppercase mt-0.5 transition-colors duration-300';
                if (logoLight) logoLight.classList.add('hidden');
                if (logoDark) logoDark.classList.remove('hidden');
                if (navCta) navCta.className = 'inline-flex items-center justify-center px-5 py-2 rounded-full bg-[#C99A49] text-[#0F1E2E] font-bold text-[12px] tracking-wide hover:bg-[#E6C587] transition-all duration-300 shadow-xs';
                document.querySelectorAll('.kira-nav-link').forEach(link => {
                    if (link.classList.contains('kira-nav-active')) {
                        link.className = 'kira-nav-link kira-nav-active relative px-4 py-1.5 rounded-full text-[13px] font-bold text-white bg-white/15 transition-all duration-300';
                    } else {
                        link.className = 'kira-nav-link relative px-4 py-1.5 rounded-full text-[13px] font-normal text-[#DCE6F2] hover:text-white hover:bg-white/10 transition-all duration-300';
                    }
                });
            }

            window.addEventListener('scroll', applyNavbarState, { passive: true });
            applyNavbarState();

            // Click on badge cycles through modes and previews scrolled state
            if (glassBadge) {
                glassBadge.addEventListener('click', () => {
                    const modes = ['full', 'capsule', 'dark'];
                    const nextIndex = (modes.indexOf(navMode) + 1) % modes.length;
                    navMode = modes[nextIndex];
                    localStorage.setItem('kira_nav_mode', navMode);
                    forcePreviewScrolled = true;
                    applyNavbarState();
                });
            }

            // Allow buttons with [data-set-nav-mode] to switch navbar mode directly
            document.querySelectorAll('[data-set-nav-mode]').forEach(btn => {
                btn.addEventListener('click', () => {
                    navMode = btn.getAttribute('data-set-nav-mode');
                    localStorage.setItem('kira_nav_mode', navMode);
                    forcePreviewScrolled = true;
                    applyNavbarState();
                });
            });

            if (mobileToggle && mobileMenu) {
                mobileToggle.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>

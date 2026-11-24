@extends('layouts.kira')

@section('title', 'KIRA — Maison de Diamants | Kemurnian Cahaya Berlian Abadi')

@section('content')
    @php
        $heroModes = [
            'daylight' => [
                'src' => '/assets/kira/hero-jewelry.png',
                'report' => 'Certified 1.50 Ct • D-VVS1',
                'fire' => '2.417 nD Fire',
                'subtitle' => 'Daylight D-Color Spectrum • 58 Facet Brilliance',
            ],
            'warm' => [
                'src' => '/assets/kira/hero/hero-warm-18k.jpg',
                'report' => '18K Champagne Gold • Warm Aura',
                'fire' => 'Au750 Royal Lustre',
                'subtitle' => 'Golden-Hour Atelier Illumination • 18K Alloy Warmth',
            ],
            'loupe' => [
                'src' => '/assets/kira/hero/hero-loupe-10x.jpg',
                'report' => '10× Loupe Macro • GIA D-VVS1',
                'fire' => '58 Facets • 34.5° Crown',
                'subtitle' => 'Inspeksi Faset Makro & Cakar 18K Champagne Gold',
            ],
        ];
    @endphp

    <!-- ======================================================================= -->
    <!-- SECTION 1.1: HERO BANNER (Figma Node 31:37 — Elevated Aesthetic)        -->
    <!-- ======================================================================= -->
    <section class="relative overflow-hidden pt-6 pb-14 sm:pt-10 sm:pb-16 lg:pt-12 lg:pb-20">
        <!-- Decorative Ambient Glow Vectors from Figma (31:38 & 31:39) -->
        <div data-parallax-orb class="pointer-events-none absolute -top-10 left-8 w-[440px] h-[440px] opacity-85 select-none">
            <img src="/assets/kira/hero-glow-left.svg" alt="" width="440" height="440" class="w-full h-full">
        </div>
        <div data-parallax-orb class="pointer-events-none absolute top-4 right-16 w-[580px] h-[580px] opacity-85 select-none">
            <img src="/assets/kira/hero-glow-right.svg" alt="" width="580" height="580" class="w-full h-full">
        </div>

        <div class="relative max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px]">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-10 xl:gap-12 items-center">

                <!-- Left Editorial Column (6 cols) -->
                <div class="lg:col-span-6 z-10">
                    <!-- Eyebrow Badge (31:40 / 31:41) -->
                    <div data-home-hero-item class="inline-flex items-center gap-2 px-4 sm:px-5 py-2 rounded-full bg-white border border-[#C99A49]/70 shadow-2xs mb-5">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#C99A49]"></span>
                        <span class="font-sans font-bold text-[10.5px] tracking-[0.08em] text-[#0F1E2E] uppercase">
                            ✦ HAUTE JOAILLERIE • SERIES 2026
                        </span>
                    </div>

                    <!-- H1 Display Headline (31:42, 31:43, 31:44) -->
                    <h1 data-home-hero-item class="font-serif font-bold text-[38px] sm:text-[50px] xl:text-[54px] leading-[1.14] tracking-[-0.02em] text-[#0F1E2E]">
                        <span class="block">Kemurnian Cahaya</span>
                        <span class="block mt-1">
                            <span class="text-[#9E7329]">Berlian Abadi</span>
                            <span class="text-[#0F1E2E] ml-2">KIRA.</span>
                        </span>
                    </h1>

                    <!-- Hero Body Description (31:45 - 31:47) -->
                    <p data-home-hero-item class="mt-5 sm:mt-6 font-sans font-normal text-[15px] sm:text-[15.5px] leading-[1.72] text-[#5C6877] max-w-[550px]">
                        Terinspirasi dari kata Sanskerta &ldquo;Kirana&rdquo; bermakna berkas cahaya murni yang tak lekang oleh waktu. Setiap cincin solitaire KIRA ditempa dengan 18K Champagne Gold dan berlian alami berstandar GIA D-Color Flawless.
                    </p>

                    <!-- Hero Pill CTAs (31:48 - 31:51) -->
                    <div data-home-hero-item class="mt-8 sm:mt-9 flex flex-wrap items-center gap-3.5 sm:gap-4">
                        <a href="{{ route('products') }}"
                           data-magnetic
                           class="inline-flex items-center justify-center h-[54px] sm:h-[56px] px-7 sm:px-8 rounded-full bg-[#0F1E2E] border border-[#C99A49]/60 text-white font-sans font-bold text-[13.5px] sm:text-[14px] hover:bg-[#193048] hover:shadow-lg transition-all duration-300">
                            Jelajahi Koleksi
                        </a>
                        <a href="{{ route('about') }}"
                           data-magnetic
                           class="inline-flex items-center justify-center h-[54px] sm:h-[56px] px-7 sm:px-8 rounded-full bg-white/95 border border-[#C99A49]/65 text-[#0F1E2E] font-sans font-bold text-[13.5px] sm:text-[14px] hover:bg-[#EFE9DC]/70 transition-all duration-300">
                            Kisah Maison
                        </a>
                    </div>

                    <!-- Subtle Divider Line & 3 Editorial Micro-Pillars -->
                    <div data-home-hero-item class="mt-8 pt-6 border-t border-[#E5DEC9] max-w-[540px] grid grid-cols-3 gap-3">
                        <div>
                            <p class="font-serif font-bold text-[17px] sm:text-[19px] text-[#0F1E2E]">GIA D–F</p>
                            <p class="font-sans text-[11px] text-[#5C6877]">Colorless Standard</p>
                        </div>
                        <div class="border-x border-[#E5DEC9] px-3">
                            <p class="font-serif font-bold text-[17px] sm:text-[19px] text-[#9E7329]">18K Au750</p>
                            <p class="font-sans text-[11px] text-[#5C6877]">Champagne Alloy</p>
                        </div>
                        <div class="pl-1">
                            <p class="font-serif font-bold text-[17px] sm:text-[19px] text-[#0F1E2E]">58 Faset</p>
                            <p class="font-sans text-[11px] text-[#5C6877]">Lotus Symmetry</p>
                        </div>
                    </div>
                </div>

                <!-- Right Focal Hero Stage Card with Warm 18K & 10x Loupe Zoom (6 cols, Node 31:53) -->
                <div class="lg:col-span-6 z-10 flex justify-center lg:justify-end">
                    <div class="w-full max-w-[590px] rounded-[28px] bg-white border border-[#E5DEC9] p-3 sm:p-4 shadow-[0_24px_60px_-22px_rgba(15,30,46,0.16)]">

                        <!-- Main Interactive Hero Visual Stage -->
                        <div id="hero-visual-stage"
                             data-hero-modes='@json($heroModes)'
                             class="relative w-full aspect-[4/3] rounded-[22px] overflow-hidden border border-[#C99A49]/45 bg-[#1B1814] select-none group">

                            <!-- Animated Zoom & Crossfade Layer (Motion.dev Spring Physics) -->
                            <div id="hero-stage-layer" class="w-full h-full will-change-transform">
                                <img id="hero-stage-img"
                                     src="{{ $heroModes['daylight']['src'] }}"
                                     alt="KIRA Haute Joaillerie Collection — 18K Champagne Gold & GIA D-Color Diamonds"
                                     width="1200"
                                     height="900"
                                     draggable="false"
                                     class="w-full h-full object-cover scale-[1.03]">
                            </div>

                            <!-- Soft Luxury Vignette for HUD Readability -->
                            <div class="pointer-events-none absolute inset-x-0 bottom-0 h-[38%] bg-gradient-to-t from-[#0F1E2E]/75 via-[#0F1E2E]/15 to-transparent"></div>

                            <!-- Interactive Focal Diamond Hotspot Target (Positioned on the central Teardrop Diamond Pendant) -->
                            <button type="button"
                                    id="hero-diamond-hotspot"
                                    title="Klik untuk Zoom 10× Loupe ke Berlian Ini"
                                    aria-label="Zoom 10x Loupe ke Berlian Utama"
                                    style="left: 41%; top: 39%;"
                                    class="absolute -translate-x-1/2 -translate-y-1/2 z-20 flex items-center gap-1.5 group/spot cursor-pointer transition-opacity duration-300">
                                <span class="relative flex h-8 w-8 items-center justify-center">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#E6C587] opacity-60"></span>
                                    <span class="relative inline-flex rounded-full h-7 w-7 bg-[#0F1E2E]/90 border-2 border-[#E6C587] text-[#E6C587] font-sans font-bold text-[9px] items-center justify-center shadow-lg group-hover/spot:scale-110 transition-transform">
                                        10×
                                    </span>
                                </span>
                                <span class="hidden sm:inline-block px-2.5 py-1 rounded-full bg-[#0F1E2E]/88 backdrop-blur-md border border-[#C99A49]/60 font-sans font-bold text-[9.5px] text-[#F7F4EE] opacity-0 group-hover/spot:opacity-100 transition-opacity whitespace-nowrap shadow-md">
                                    Zoom Detail Berlian
                                </span>
                            </button>

                            <!-- 10× Gemological Loupe Optical Reticle Overlay (Anime.js Drawable SVG) -->
                            <div id="hero-loupe-overlay"
                                 class="pointer-events-none absolute inset-0 z-10 flex items-center justify-center opacity-0 transition-opacity duration-400">
                                <!-- Subtle Darkened Peripheral Loupe Vignette -->
                                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,transparent_44%,rgba(15,30,46,0.48)_100%)]"></div>

                                <svg id="hero-loupe-svg"
                                     viewBox="0 0 260 260"
                                     fill="none"
                                     aria-hidden="true"
                                     class="relative w-[68%] max-w-[250px] aspect-square">
                                    <g id="hero-loupe-ring-outer" style="transform-origin: 130px 130px;">
                                        <circle cx="130" cy="130" r="116" stroke="#E6C587" stroke-opacity="0.72" stroke-width="1.2" stroke-dasharray="6 8" class="loupe-draw-path" />
                                        <circle cx="130" cy="130" r="102" stroke="#F7F4EE" stroke-opacity="0.38" stroke-width="0.8" class="loupe-draw-path" />
                                        <line x1="130" y1="6" x2="130" y2="24" stroke="#E6C587" stroke-width="1.5" class="loupe-draw-path" />
                                        <line x1="130" y1="236" x2="130" y2="254" stroke="#E6C587" stroke-width="1.5" class="loupe-draw-path" />
                                        <line x1="6" y1="130" x2="24" y2="130" stroke="#E6C587" stroke-width="1.5" class="loupe-draw-path" />
                                        <line x1="236" y1="130" x2="254" y2="130" stroke="#E6C587" stroke-width="1.5" class="loupe-draw-path" />
                                    </g>
                                    <g id="hero-loupe-ring-inner" style="transform-origin: 130px 130px;">
                                        <polygon points="130,44 191,69 216,130 191,191 130,216 69,191 44,130 69,69"
                                                 stroke="#E6C587" stroke-opacity="0.45" stroke-width="0.9" class="loupe-draw-path" />
                                        <path d="M90 66 H66 V90 M170 66 H194 V90 M194 170 V194 H170 M66 170 V194 H90"
                                              stroke="#F7F4EE" stroke-opacity="0.7" stroke-width="1.3" stroke-linecap="round" class="loupe-draw-path" />
                                    </g>
                                </svg>
                            </div>

                            <!-- Top Left Floating HUD Chip: GIA Report (31:55 - 31:58) -->
                            <div class="apple-hud-chip pointer-events-none absolute top-3.5 left-3.5 z-20 h-[34px] pl-2 pr-3.5 rounded-full border border-[#C99A49]/50 flex items-center gap-2 shadow-md max-w-[66%]">
                                <span class="inline-flex items-center justify-center h-[22px] px-2.5 rounded-full bg-[#C99A49] text-[#0F1E2E] font-sans font-bold text-[9.5px] tracking-wider shrink-0">
                                    GIA
                                </span>
                                <span id="hero-hud-report" class="font-sans font-bold text-[10.5px] sm:text-[11px] text-[#F7F4EE] truncate">
                                    {{ $heroModes['daylight']['report'] }}
                                </span>
                            </div>

                            <!-- Top Right Floating HUD Chip: Live Zoom Factor & Refractive Fire (31:59 - 31:60) -->
                            <div class="apple-hud-chip pointer-events-none absolute top-3.5 right-3.5 z-20 h-[34px] px-3.5 rounded-full border border-[#C99A49]/50 flex items-center gap-2 shadow-md">
                                <span id="hero-zoom-factor" class="font-sans font-bold text-[10.5px] text-white tabular-nums">
                                    1.0×
                                </span>
                                <span class="text-white/35 text-[10px]">•</span>
                                <span id="hero-hud-fire" class="font-sans font-bold text-[10.5px] sm:text-[11px] text-[#E6C587] whitespace-nowrap">
                                    {{ $heroModes['daylight']['fire'] }}
                                </span>
                            </div>

                            <!-- Bottom Controls Bar: 3 Lighting / Loupe Segmented Pills (31:61 - 31:65) -->
                            <div class="absolute bottom-3.5 inset-x-3.5 z-20 flex flex-wrap items-center justify-between gap-2">
                                <div class="apple-hud-chip p-1 rounded-full border border-white/20 flex items-center gap-1 shadow-lg max-w-full overflow-x-auto">
                                    <button type="button"
                                            data-hero-mode="daylight"
                                            aria-pressed="true"
                                            class="hero-light-btn px-3.5 h-[30px] rounded-full bg-[#F7F4EE] text-[#0F1E2E] font-sans font-bold text-[10.5px] whitespace-nowrap shadow-xs transition-all cursor-pointer">
                                        ☀ Daylight D-Color
                                    </button>
                                    <button type="button"
                                            data-hero-mode="warm"
                                            aria-pressed="false"
                                            class="hero-light-btn px-3.5 h-[30px] rounded-full text-[#F7F4EE] hover:bg-white/15 font-sans font-bold text-[10.5px] whitespace-nowrap transition-all cursor-pointer">
                                        ✦ Warm 18K
                                    </button>
                                    <button type="button"
                                            data-hero-mode="loupe"
                                            aria-pressed="false"
                                            class="hero-light-btn px-3.5 h-[30px] rounded-full text-[#F7F4EE] hover:bg-white/15 font-sans font-bold text-[10.5px] whitespace-nowrap transition-all cursor-pointer">
                                        ⊕ 10x Loupe
                                    </button>
                                </div>

                                <a href="{{ route('products', ['item' => 'lotus-crown-solitaire']) }}#gia-specs"
                                   class="apple-hud-chip hidden sm:inline-flex h-[38px] px-4 rounded-full border border-[#C99A49]/55 items-center justify-center hover:border-[#E6C587] transition shadow-lg">
                                    <span class="font-sans font-bold text-[10.5px] text-[#E6C587] whitespace-nowrap">
                                        Lotus Crown 1.50 Ct
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- Bottom Stage Caption Bar -->
                        <div class="mt-3 px-1.5 flex items-center justify-between gap-3 text-[11px]">
                            <div class="flex items-center gap-2 min-w-0">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#C99A49] shrink-0"></span>
                                <span id="hero-hud-sub" class="font-sans font-semibold text-[#5C6877] truncate">
                                    {{ $heroModes['daylight']['subtitle'] }}
                                </span>
                            </div>
                            <span class="font-sans font-bold text-[10px] tracking-[0.07em] text-[#9E7329] uppercase shrink-0">
                                INTERACTIVE LOUPE
                            </span>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 1.2: TRUST & GIA STRIP (Figma Node 31:68)                       -->
    <!-- ======================================================================= -->
    <section class="bg-white/85 border-y border-[#E5DEC9] py-6" data-home-reveal-group>
        <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px]">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6">

                <!-- Trust Item 1: 100% GIA Certified (31:70) -->
                <div data-home-reveal-item data-home-trust-card class="flex items-center gap-4 p-4 rounded-[20px] bg-[#FAF8F3] border border-[#E5DEC9] hover:border-[#C99A49] transition">
                    <div class="w-[56px] h-[56px] rounded-[16px] bg-[#0F1E2E] flex items-center justify-center shrink-0">
                        <img src="/assets/kira/icon-trust-gia.svg" alt="GIA Diamond" width="24" height="28">
                    </div>
                    <div>
                        <h2 class="font-serif font-bold text-[16.5px] text-[#0F1E2E] leading-snug">100% GIA Certified</h2>
                        <p class="font-sans text-[11.5px] text-[#5C6877] leading-tight mt-1">
                            Inskripsi laser seri GIA asli<br>pada setiap girdle berlian.
                        </p>
                    </div>
                </div>

                <!-- Trust Item 2: Conflict-Free Origin (31:77) -->
                <div data-home-reveal-item data-home-trust-card class="flex items-center gap-4 p-4 rounded-[20px] bg-[#FAF8F3] border border-[#E5DEC9] hover:border-[#C99A49] transition">
                    <div class="relative w-[56px] h-[56px] rounded-[16px] bg-[#0F1E2E] flex items-center justify-center shrink-0">
                        <img src="/assets/kira/icon-trust-ethics.svg" alt="Conflict-Free Ring" width="26" height="26">
                        <span class="absolute font-sans font-bold text-[11px] text-[#C99A49]">✓</span>
                    </div>
                    <div>
                        <h2 class="font-serif font-bold text-[16.5px] text-[#0F1E2E] leading-snug">Conflict-Free Origin</h2>
                        <p class="font-sans text-[11.5px] text-[#5C6877] leading-tight mt-1">
                            Berlian alami beretika penuh<br>sesuai Kimberley Process.
                        </p>
                    </div>
                </div>

                <!-- Trust Item 3: 18K Gold & Platinum (31:85) -->
                <div data-home-reveal-item data-home-trust-card class="flex items-center gap-4 p-4 rounded-[20px] bg-[#FAF8F3] border border-[#E5DEC9] hover:border-[#C99A49] transition">
                    <div class="relative w-[56px] h-[56px] rounded-[16px] bg-[#0F1E2E] flex items-center justify-center shrink-0">
                        <img src="/assets/kira/icon-trust-gold-outer.svg" alt="18K Gold" width="24" height="24">
                        <img src="/assets/kira/icon-trust-gold-inner.svg" alt="" width="12" height="12" class="absolute">
                    </div>
                    <div>
                        <h2 class="font-serif font-bold text-[16.5px] text-[#0F1E2E] leading-snug">18K Gold &amp; Platinum</h2>
                        <p class="font-sans text-[11.5px] text-[#5C6877] leading-tight mt-1">
                            Dirangkai dengan 18K Champagne<br>Gold &amp; Platinum Pt950 murni.
                        </p>
                    </div>
                </div>

                <!-- Trust Item 4: Lifetime Warranty (31:93) -->
                <div data-home-reveal-item data-home-trust-card class="flex items-center gap-4 p-4 rounded-[20px] bg-[#FAF8F3] border border-[#E5DEC9] hover:border-[#C99A49] transition">
                    <div class="w-[56px] h-[56px] rounded-[16px] bg-[#0F1E2E] flex items-center justify-center shrink-0">
                        <img src="/assets/kira/icon-trust-warranty.svg" alt="Lifetime Warranty Star" width="28" height="30">
                    </div>
                    <div>
                        <h2 class="font-serif font-bold text-[16.5px] text-[#0F1E2E] leading-snug">Lifetime Warranty</h2>
                        <p class="font-sans text-[11.5px] text-[#5C6877] leading-tight mt-1">
                            Pembersihan ultrasonik &amp;<br>inspeksi mahkota seumur hidup.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 1.3: FEATURED COLLECTIONS (Figma Node 31:100)                   -->
    <!-- ======================================================================= -->
    <section id="featured-collections" class="py-16 lg:py-20" data-home-reveal-group>
        <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px]">

            <!-- Section Header (31:101 - 31:103) -->
            <div class="text-center max-w-[850px] mx-auto" data-home-reveal-item>
                <p class="font-sans font-bold text-[11px] tracking-[0.08em] text-[#9E7329] uppercase">
                    01 • HAUTE JOAILLERIE LINEUP
                </p>
                <h2 class="mt-1.5 font-serif font-bold text-[32px] sm:text-[38px] text-[#0F1E2E] leading-tight">
                    Koleksi Berlian Unggulan
                </h2>
                <p class="mt-2.5 font-sans font-normal text-[14.5px] text-[#5C6877] leading-relaxed">
                    Dirancang dengan proporsi optik presisi tinggi untuk memaksimalkan pantulan cahaya putih (brilliance) dan kilau pelangi (fire).
                </p>

                <!-- Apple Segmented Control Filter (31:104 - 31:109) -->
                <div class="mt-6 inline-flex flex-wrap items-center justify-center p-1.5 rounded-full bg-[#EFECE3] border border-[#E0D8C6] gap-1">
                    <button type="button"
                            data-filter-category="all"
                            class="home-filter-btn px-5 py-2 rounded-full bg-white text-[#0F1E2E] font-sans font-bold text-[12px] shadow-2xs transition-all cursor-pointer">
                        Semua Unggulan (3)
                    </button>
                    <button type="button"
                            data-filter-category="rings"
                            class="home-filter-btn px-5 py-2 rounded-full text-[#243B53] hover:text-[#0F1E2E] font-sans font-bold text-[12px] transition-all cursor-pointer">
                        Solitaire Rings
                    </button>
                    <button type="button"
                            data-filter-category="pendants"
                            class="home-filter-btn px-5 py-2 rounded-full text-[#243B53] hover:text-[#0F1E2E] font-sans font-bold text-[12px] transition-all cursor-pointer">
                        Lotus Pendants
                    </button>
                    <button type="button"
                            data-filter-category="earrings"
                            class="home-filter-btn px-5 py-2 rounded-full text-[#243B53] hover:text-[#0F1E2E] font-sans font-bold text-[12px] transition-all cursor-pointer">
                        Haute Earrings
                    </button>
                </div>
            </div>

            <!-- 3-Column Bento Product Grid (Uniform Light Luxury Cards) -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($featuredProducts as $product)
                    <article data-product-category="{{ $product['category'] }}"
                             data-home-reveal-item
                             data-tilt-card
                             class="home-product-card bento-card p-5 flex flex-col justify-between">
                        <div>
                            <!-- Product Image Wrapper (344x236 aspect) -->
                            <div class="relative w-full h-[236px] rounded-[18px] overflow-hidden bg-[#122030]">
                                <img src="{{ $product['image'] }}"
                                     alt="{{ $product['name'] }}"
                                     width="344"
                                     height="236"
                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">

                                <!-- Top Left Badge Pill -->
                                <div class="absolute top-3.5 left-3.5 px-3.5 py-1 rounded-full bg-[#F7F4EE]/95 border border-[#E5DEC9]">
                                    <span class="font-sans font-bold text-[9.5px] tracking-wider text-[#0F1E2E] uppercase">
                                        {{ $product['badge'] }}
                                    </span>
                                </div>
                            </div>

                            <!-- Metal Swatch Dots (18K Champagne Gold, Platinum Pt950, Rose Gold) -->
                            <div class="mt-4 flex items-center gap-2 px-1">
                                @foreach ($product['metals'] as $index => $hex)
                                    <span class="w-3.5 h-3.5 rounded-full inline-block {{ $index === 0 ? 'ring-2 ring-[#0F1E2E] ring-offset-1' : 'border border-[#D8CEBE]' }}"
                                          style="background-color: {{ $hex }};"
                                          title="Pilihan Logam Mulia"></span>
                                @endforeach
                            </div>

                            <!-- Product Meta & Typography -->
                            <div class="mt-3 px-1">
                                <p class="font-sans font-bold text-[10.5px] tracking-[0.06em] text-[#9E7329] uppercase">
                                    {{ $product['eyebrow'] }}
                                </p>
                                <h3 class="mt-1 font-serif font-bold text-[22px] text-[#0F1E2E] leading-snug">
                                    {{ $product['name'] }}
                                </h3>
                                <div class="mt-2.5 flex items-center justify-between gap-2">
                                    <span class="font-sans font-bold text-[14px] text-[#0F1E2E]">
                                        {{ $product['price_formatted'] }}
                                    </span>
                                    <span class="font-sans font-bold text-[12px] text-[#5C6877]">
                                        {{ $product['short_spec'] }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Action Button -->
                        <div class="mt-5">
                            <a href="{{ route('products', ['item' => $product['id']]) }}#gia-specs"
                               class="w-full h-[46px] rounded-full bg-[#FAF8F3] border border-[#D8CEBE] text-[#0F1E2E] font-sans font-bold text-[12.5px] flex items-center justify-center hover:bg-[#EFE9DC] hover:border-[#C99A49] transition">
                                Lihat Detail Produk &amp; 4C
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 1.4: WARISAN & FILOSOFI (3D LOTUS CROWN MODEL) + VIP CONCIERGE  -->
    <!-- ======================================================================= -->
    <section class="pb-16 lg:pb-20" data-home-reveal-group data-home-counter-trigger>
        <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px] space-y-7">

            <!-- Card A: Warisan & Filosofi Maison — Interactive 3D Lotus Crown Model -->
            <div data-home-reveal-item class="bg-white rounded-[28px] border border-[#E5DEC9] p-4 sm:p-6 lg:p-8 shadow-[0_24px_60px_-24px_rgba(15,30,46,0.12)]">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">

                    <!-- Left Column: Interactive 3D Lotus Crown Solitaire Model (6 cols) -->
                    <div class="lg:col-span-6">
                        <div class="rounded-[22px] bg-[#FAF8F3] border border-[#E5DEC9] p-3 sm:p-4">

                            <!-- Top 3D Stage Header Bar -->
                            <div class="flex flex-wrap items-center justify-between gap-2 pb-2.5 px-1">
                                <div class="inline-flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-[#C99A49]"></span>
                                    <span class="font-sans font-bold text-[10px] tracking-[0.09em] text-[#0F1E2E] uppercase">
                                        3D LOTUS CROWN ARCHITECTURE
                                    </span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                            id="lotus-3d-reset-btn"
                                            class="px-2.5 py-1 rounded-full bg-white border border-[#E5DEC9] hover:border-[#C99A49] font-sans font-bold text-[9.5px] text-[#0F1E2E] transition cursor-pointer">
                                        Reset Sudut
                                    </button>
                                    <span id="lotus-3d-deg"
                                          class="px-2.5 py-1 rounded-full bg-[#0F1E2E] text-[#E6C587] font-sans font-bold text-[10px] tabular-nums">
                                        20°
                                    </span>
                                </div>
                            </div>

                            <!-- Real-Time Three.js WebGL 3D Canvas Stage -->
                            <div id="lotus-3d-stage"
                                 role="region"
                                 aria-label="Model 3D Interaktif Mahkota Teratai KIRA"
                                 class="relative w-full h-[280px] sm:h-[330px] rounded-[18px] overflow-hidden border border-[#C99A49]/45 bg-gradient-to-b from-[#0F1E2E] via-[#15263B] to-[#0D1826] cursor-grab active:cursor-grabbing select-none touch-pan-y">

                                <!-- Ambient Golden Backlight Aura -->
                                <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_50%_44%,rgba(201,154,73,0.22)_0%,transparent_66%)]"></div>

                                <!-- Three.js Canvas Mount Host -->
                                <div id="lotus-3d-canvas-host" class="relative z-10 w-full h-full"></div>

                                <!-- Fallback Image if WebGL is unavailable -->
                                <img id="lotus-3d-fallback"
                                     src="/assets/kira/brand-story/diamond-angle-04-lotus.jpg"
                                     alt="Lotus Crown Solitaire Architecture"
                                     class="hidden absolute inset-0 w-full h-full object-cover">

                                <!-- Top Left Floating Glass Pill -->
                                <div class="apple-hud-chip pointer-events-none absolute top-3 left-3 z-20 px-3 py-1 rounded-full border border-[#C99A49]/50">
                                    <span class="font-sans font-bold text-[9.5px] tracking-wider text-[#E6C587] uppercase">
                                        58 FACET SYMMETRY • 18K GOLD
                                    </span>
                                </div>

                                <!-- Top Right Optical Angles Readout -->
                                <div class="apple-hud-chip pointer-events-none absolute top-3 right-3 z-20 px-2.5 py-1 rounded-lg border border-white/15 text-right">
                                    <p class="font-sans font-bold text-[9.5px] text-[#DCE6F2]">Pavilion 40.8°</p>
                                    <p class="font-sans font-bold text-[9.5px] text-[#E6C587]">Crown 34.5°</p>
                                </div>

                                <!-- Bottom Interactive Hint Bar -->
                                <div class="apple-hud-chip pointer-events-none absolute bottom-3 inset-x-3 z-20 px-3.5 py-2 rounded-full border border-white/15 flex items-center justify-between gap-2 text-[10px]">
                                    <span class="font-sans font-bold text-[#F7F4EE] truncate">
                                        The Lotus Crown Solitaire 3D
                                    </span>
                                    <span class="font-sans font-semibold text-[#E6C587] shrink-0">
                                        Gulir / Geser 360°
                                    </span>
                                </div>
                            </div>

                            <!-- 3D Crown Rotation Scrubber Slider ("Gulir Mahkota") -->
                            <div class="mt-3 px-1 flex flex-wrap sm:flex-nowrap items-center gap-3">
                                <label for="lotus-3d-slider" class="font-sans font-bold text-[9.5px] tracking-[0.08em] text-[#5C6877] uppercase shrink-0">
                                    GULIR MAHKOTA
                                </label>
                                <div class="flex-1 min-w-[130px] flex items-center">
                                    <input id="lotus-3d-slider"
                                           type="range"
                                           min="0"
                                           max="360"
                                           step="1"
                                           value="20"
                                           aria-label="Gulir rotasi 3D Mahkota Teratai"
                                           class="kira-angle-slider">
                                </div>
                                <button type="button"
                                        id="lotus-3d-auto-btn"
                                        aria-pressed="true"
                                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#0F1E2E] border border-[#C99A49] text-[#E6C587] font-sans font-bold text-[10px] transition cursor-pointer shrink-0">
                                    <span id="lotus-3d-auto-dot" class="w-1.5 h-1.5 rounded-full bg-[#E6C587] animate-pulse"></span>
                                    <span id="lotus-3d-auto-text">Orbit 3D Aktif</span>
                                </button>
                            </div>

                        </div>
                    </div>

                    <!-- Right Column: Heritage Copy & Optical Telemetry (6 cols, Node 31:161 - 31:167) -->
                    <div class="lg:col-span-6 space-y-4 sm:space-y-5">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#FAF8F3] border border-[#C99A49]/60">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C99A49]"></span>
                            <span class="font-sans font-bold text-[10.5px] tracking-[0.08em] text-[#9E7329] uppercase">
                                WARISAN &amp; FILOSOFI MAISON
                            </span>
                        </div>

                        <h2 class="font-serif font-bold text-[28px] sm:text-[34px] text-[#0F1E2E] leading-[1.18]">
                            Simetri Mahkota Teratai<br>
                            <span class="text-[#9E7329]">&amp; Cahaya Kirana</span>
                        </h2>

                        <p class="font-sans font-normal text-[14.5px] sm:text-[15px] leading-[1.72] text-[#5C6877]">
                            Arsitektur Mahkota Teratai (<strong>The Lotus Crown Solitaire</strong>) melambangkan kesempurnaan anatomi 58 faset berlian yang ditopang 8 kelopak teratai emas 18K Champagne Gold. Struktur kelopak terbuka dirancang agar cahaya mengalir 360° ke dalam pavilion berlian.
                        </p>

                        <!-- 3 Optical Telemetry Mini-Cards (Anime.js Counters) -->
                        <div class="grid grid-cols-3 gap-2.5 sm:gap-3 pt-1">
                            <div class="p-3 rounded-[16px] bg-[#FAF8F3] border border-[#E5DEC9] text-center">
                                <p class="font-serif font-bold text-[19px] sm:text-[21px] text-[#0F1E2E] tabular-nums"
                                   data-home-anime-counter
                                   data-target="58"
                                   data-decimals="0"
                                   data-suffix="">
                                    58
                                </p>
                                <p class="mt-0.5 font-sans font-bold text-[9.5px] tracking-[0.06em] text-[#9E7329] uppercase">
                                    Faset Presisi
                                </p>
                            </div>
                            <div class="p-3 rounded-[16px] bg-[#FAF8F3] border border-[#E5DEC9] text-center">
                                <p class="font-serif font-bold text-[19px] sm:text-[21px] text-[#0F1E2E] tabular-nums"
                                   data-home-anime-counter
                                   data-target="34.5"
                                   data-decimals="1"
                                   data-suffix="°">
                                    34.5°
                                </p>
                                <p class="mt-0.5 font-sans font-bold text-[9.5px] tracking-[0.06em] text-[#9E7329] uppercase">
                                    Crown Angle
                                </p>
                            </div>
                            <div class="p-3 rounded-[16px] bg-[#FAF8F3] border border-[#E5DEC9] text-center">
                                <p class="font-serif font-bold text-[19px] sm:text-[21px] text-[#0F1E2E] tabular-nums"
                                   data-home-anime-counter
                                   data-target="40.8"
                                   data-decimals="1"
                                   data-suffix="°">
                                    40.8°
                                </p>
                                <p class="mt-0.5 font-sans font-bold text-[9.5px] tracking-[0.06em] text-[#9E7329] uppercase">
                                    Pavilion Angle
                                </p>
                            </div>
                        </div>

                        <div class="pt-2 flex flex-wrap items-center gap-3.5">
                            <a href="{{ route('about') }}"
                               data-magnetic
                               class="inline-flex items-center justify-center h-[50px] px-7 rounded-full bg-[#0F1E2E] text-white font-sans font-bold text-[13px] hover:bg-[#193048] shadow-xs transition">
                                Pelajari Kisah KIRA
                            </a>
                            <a href="{{ route('products', ['item' => 'lotus-crown-solitaire']) }}#gia-specs"
                               data-magnetic
                               class="inline-flex items-center justify-center h-[50px] px-6 rounded-full bg-[#FAF8F3] border border-[#C99A49]/75 text-[#0F1E2E] font-sans font-bold text-[13px] hover:bg-[#EFE9DC] transition">
                                Inspeksi Spesifikasi 4C
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Card B: Private Salon Concierge VIP Banner (31:168 - 31:175) -->
            <div data-home-reveal-item data-sparkle-field data-sparkle-count="14" class="relative rounded-[28px] overflow-hidden bg-[#0F1E2E] border border-[#C99A49]/70 px-6 py-8 sm:px-9 sm:py-9 lg:px-12 lg:py-10 shadow-xl">
                <!-- Right Decorative Gold Glow Orb (31:170) -->
                <div class="pointer-events-none absolute -top-12 -right-8 w-[280px] h-[280px] opacity-90 select-none">
                    <img src="/assets/kira/vip-glow-orb.svg" alt="" width="280" height="280" class="w-full h-full">
                </div>

                <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                    <div class="max-w-[760px]">
                        <p class="font-sans font-bold text-[10.5px] tracking-[0.08em] text-[#E6C587] uppercase">
                            PRIVATE SALON CONCIERGE • PLAZA INDONESIA LEVEL 1
                        </p>
                        <h2 class="mt-2 font-serif font-bold text-[26px] sm:text-[30px] text-white leading-snug">
                            Jadwalkan Sesi Private Viewing di Butik Flagship KIRA
                        </h2>
                        <p class="mt-2 font-sans font-normal text-[14px] text-[#DCE6F2] leading-relaxed">
                            Konsultasi privat 1-on-1 bersama Gemologist bersertifikat GIA untuk menginspeksi berlian dengan mikroskop 10x.
                        </p>
                    </div>

                    <div class="shrink-0">
                        <a href="{{ route('contact') }}"
                           data-magnetic
                           class="inline-flex items-center justify-center h-[56px] sm:h-[60px] px-8 rounded-full bg-[#C99A49] text-[#0F1E2E] font-sans font-bold text-[14px] hover:bg-[#E6C587] shadow-lg transition-all duration-300">
                            Book VIP Appointment
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@extends('layouts.kira')

@section('title', 'KIRA — Maison de Diamants | Kemurnian Cahaya Berlian Abadi')

@section('content')
    <!-- ======================================================================= -->
    <!-- SECTION 1.1: HERO BANNER (Figma Node 31:37)                             -->
    <!-- ======================================================================= -->
    <section class="relative overflow-hidden pt-8 pb-16 lg:pt-12 lg:pb-20">
        <!-- Decorative Ambient Glow Vectors from Figma (31:38 & 31:39) -->
        <div class="pointer-events-none absolute -top-10 left-8 w-[440px] h-[440px] opacity-85 select-none">
            <img src="/assets/kira/hero-glow-left.svg" alt="" width="440" height="440" class="w-full h-full">
        </div>
        <div class="pointer-events-none absolute top-4 right-16 w-[580px] h-[580px] opacity-85 select-none">
            <img src="/assets/kira/hero-glow-right.svg" alt="" width="580" height="580" class="w-full h-full">
        </div>

        <div class="relative max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px]">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-6 items-center">

                <!-- Left Editorial Column (6 cols) -->
                <div class="lg:col-span-6 z-10">
                    <!-- Eyebrow Badge (31:40 / 31:41) -->
                    <div class="inline-flex items-center justify-center px-5 py-2 rounded-full bg-white border border-[#C99A49]/70 shadow-2xs mb-5">
                        <span class="font-sans font-bold text-[10.5px] tracking-[0.06em] text-[#0F1E2E] uppercase">
                            ✦ HAUTE JOAILLERIE • SERIES 2026
                        </span>
                    </div>

                    <!-- H1 Display Headline (31:42, 31:43, 31:44) -->
                    <h1 class="font-serif font-bold text-[42px] sm:text-[52px] xl:text-[54px] leading-[1.16] tracking-[-0.02em] text-[#0F1E2E]">
                        <span class="block">Kemurnian Cahaya</span>
                        <span class="block mt-1">
                            <span class="text-[#9E7329]">Berlian Abadi</span>
                            <span class="text-[#0F1E2E] ml-2">KIRA.</span>
                        </span>
                    </h1>

                    <!-- Hero Body Description (31:45 - 31:47) -->
                    <p class="mt-6 font-sans font-normal text-[15.5px] leading-[1.68] text-[#5C6877] max-w-[550px]">
                        Terinspirasi dari kata Sanskerta &ldquo;Kirana&rdquo; bermakna berkas cahaya murni yang tak lekang oleh waktu. Setiap cincin solitaire KIRA ditempa dengan 18K Champagne Gold dan berlian alami berstandar GIA D-Color Flawless.
                    </p>

                    <!-- Hero Pill CTAs (31:48 - 31:51) -->
                    <div class="mt-10 flex flex-wrap items-center gap-4">
                        <a href="{{ route('products') }}"
                           class="inline-flex items-center justify-center h-[56px] px-8 rounded-full bg-[#0F1E2E] border border-[#C99A49]/60 text-white font-sans font-bold text-[14px] hover:bg-[#193048] hover:shadow-lg transition-all duration-300">
                            Jelajahi Koleksi →
                        </a>
                        <a href="{{ route('about') }}"
                           class="inline-flex items-center justify-center h-[56px] px-8 rounded-full bg-white/90 border border-[#C99A49]/65 text-[#0F1E2E] font-sans font-bold text-[14px] hover:bg-[#EFE9DC]/70 transition-all duration-300">
                            Kisah Maison
                        </a>
                    </div>

                    <!-- Bottom Subtle Divider Line (31:52) -->
                    <div class="mt-9 w-full max-w-[540px] h-[1px] bg-gradient-to-r from-[#D8CEBE] via-[#E5DEC9] to-transparent"></div>
                </div>

                <!-- Right Focal Hero Image Card with Interactive GIA HUD Overlays (6 cols, Node 31:53) -->
                <div class="lg:col-span-6 z-10 flex justify-center lg:justify-end">
                    <div id="hero-visual-stage" class="relative w-full max-w-[572px] h-[400px] sm:h-[452px] rounded-[28px] overflow-hidden border border-[#C99A49]/50 shadow-2xl bg-[#E8E0D0] group">
                        <!-- Main Hero Image (31:54) -->
                        <img id="hero-stage-img"
                             src="/assets/kira/hero-jewelry.png"
                             alt="KIRA Haute Joaillerie Collection — 18K Champagne Gold & GIA D-Color Diamonds"
                             width="573"
                             height="453"
                             class="w-full h-full object-cover transition-all duration-700 ease-out">

                        <!-- Top Left Floating HUD Chip: GIA Report (31:55 - 31:58) -->
                        <div class="apple-hud-chip absolute top-4 left-4 h-[34px] pl-2 pr-4 rounded-full border border-[#C99A49]/50 flex items-center gap-2.5 shadow-md">
                            <span class="inline-flex items-center justify-center h-[22px] px-2.5 rounded-full bg-[#C99A49] text-[#0F1E2E] font-sans font-bold text-[9.5px] tracking-wider">
                                GIA
                            </span>
                            <span id="hero-hud-report" class="font-sans font-bold text-[11px] text-[#F7F4EE] whitespace-nowrap">
                                Report #226789104 • 1.50 Ct
                            </span>
                        </div>

                        <!-- Top Right Floating HUD Chip: Refractive Fire (31:59 - 31:60) -->
                        <div class="apple-hud-chip absolute top-4 right-4 h-[34px] px-4 rounded-full border border-[#C99A49]/50 flex items-center justify-center shadow-md">
                            <span id="hero-hud-fire" class="font-sans font-bold text-[11px] text-[#E6C587] whitespace-nowrap">
                                2.417 nD Fire
                            </span>
                        </div>

                        <!-- Bottom Left Interactive Lighting / Loupe Segmented Pill (31:61 - 31:65) -->
                        <div class="apple-hud-chip absolute bottom-4 left-4 right-4 sm:right-auto h-[38px] p-1 rounded-full border border-white/20 flex items-center gap-1 shadow-lg overflow-x-auto">
                            <button type="button"
                                    data-hero-mode="daylight"
                                    class="hero-light-btn px-3 h-[28px] rounded-full bg-[#F7F4EE] text-[#0F1E2E] font-sans font-bold text-[10.5px] whitespace-nowrap transition-all cursor-pointer">
                                ☀ Daylight D-Color
                            </button>
                            <button type="button"
                                    data-hero-mode="warm"
                                    class="hero-light-btn px-3 h-[28px] rounded-full text-[#F7F4EE] hover:bg-white/10 font-sans font-bold text-[10.5px] whitespace-nowrap transition-all cursor-pointer">
                                ✦ Warm 18K
                            </button>
                            <button type="button"
                                    data-hero-mode="loupe"
                                    class="hero-light-btn px-3 h-[28px] rounded-full text-[#F7F4EE] hover:bg-white/10 font-sans font-bold text-[10.5px] whitespace-nowrap transition-all cursor-pointer">
                                ⊕ 10x Loupe
                            </button>
                        </div>

                        <!-- Bottom Right Floating Label Pill (31:66 - 31:67) -->
                        <a href="{{ route('products', ['item' => 'lotus-crown-solitaire']) }}"
                           class="apple-hud-chip hidden sm:flex absolute bottom-4 right-4 h-[38px] px-4 rounded-full border border-[#C99A49]/50 items-center justify-center hover:border-[#E6C587] transition shadow-lg">
                            <span class="font-sans font-bold text-[10.5px] text-[#E6C587] whitespace-nowrap">
                                Lotus Crown 1.50 Ct
                            </span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 1.2: TRUST & GIA STRIP (Figma Node 31:68)                       -->
    <!-- ======================================================================= -->
    <section class="bg-white/85 border-y border-[#E5DEC9] py-6">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px]">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Trust Item 1: 100% GIA Certified (31:70) -->
                <div class="flex items-center gap-4 p-4 rounded-[20px] bg-[#FAF8F3] border border-[#E5DEC9] hover:border-[#C99A49] transition">
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
                <div class="flex items-center gap-4 p-4 rounded-[20px] bg-[#FAF8F3] border border-[#E5DEC9] hover:border-[#C99A49] transition">
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
                <div class="flex items-center gap-4 p-4 rounded-[20px] bg-[#FAF8F3] border border-[#E5DEC9] hover:border-[#C99A49] transition">
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
                <div class="flex items-center gap-4 p-4 rounded-[20px] bg-[#FAF8F3] border border-[#E5DEC9] hover:border-[#C99A49] transition">
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
    <section id="featured-collections" class="py-16 lg:py-20">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px]">

            <!-- Section Header (31:101 - 31:103) -->
            <div class="text-center max-w-[850px] mx-auto">
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

            <!-- 3-Column Bento Product Grid (31:110, 31:124, 31:137) -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($featuredProducts as $product)
                    <article data-product-category="{{ $product['category'] }}"
                             class="home-product-card {{ $product['featured_primary'] ? 'bento-card-featured' : 'bento-card' }} p-5 flex flex-col justify-between">
                        <div>
                            <!-- Product Image Wrapper (344x236 aspect) -->
                            <div class="relative w-full h-[236px] rounded-[18px] overflow-hidden bg-[#122030]">
                                <img src="{{ $product['image'] }}"
                                     alt="{{ $product['name'] }}"
                                     width="344"
                                     height="236"
                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">

                                <!-- Top Left Badge Pill -->
                                @if ($product['badge_theme'] === 'dark')
                                    <div class="absolute top-3.5 left-3.5 px-3.5 py-1 rounded-full bg-[#0F1E2E]/90 border border-[#C99A49]/60">
                                        <span class="font-sans font-bold text-[9.5px] tracking-wider text-[#E6C587] uppercase">
                                            {{ $product['badge'] }}
                                        </span>
                                    </div>
                                @else
                                    <div class="absolute top-3.5 left-3.5 px-3.5 py-1 rounded-full bg-[#F7F4EE]/95 border border-[#E5DEC9]">
                                        <span class="font-sans font-bold text-[9.5px] tracking-wider text-[#0F1E2E] uppercase">
                                            {{ $product['badge'] }}
                                        </span>
                                    </div>
                                @endif
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
                            @if ($product['featured_primary'])
                                <a href="{{ route('products', ['item' => $product['id']]) }}#gia-specs"
                                   class="w-full h-[46px] rounded-full bg-[#0F1E2E] text-white font-sans font-bold text-[12.5px] flex items-center justify-center hover:bg-[#193048] transition">
                                    Lihat Detail Produk &amp; 4C →
                                </a>
                            @else
                                <a href="{{ route('products', ['item' => $product['id']]) }}#gia-specs"
                                   class="w-full h-[46px] rounded-full bg-[#FAF8F3] border border-[#D8CEBE] text-[#0F1E2E] font-sans font-bold text-[12.5px] flex items-center justify-center hover:bg-[#EFE9DC] hover:border-[#C99A49] transition">
                                    Lihat Detail Produk &amp; 4C →
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>

        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 1.4: BRAND STORY & VIP SALON CONCIERGE (Figma Node 31:151)      -->
    <!-- ======================================================================= -->
    <section class="pb-16 lg:pb-20">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px] space-y-7">

            <!-- Card A: Warisan & Filosofi Maison (31:152 - 31:167) -->
            <div class="bg-white rounded-[28px] border border-[#E5DEC9] p-6 lg:p-7 shadow-xs">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">

                    <!-- Left Macro Diamond & 58 Facet Symmetry Overlay (5 cols, Node 31:153) -->
                    <div class="lg:col-span-5">
                        <div class="relative w-full h-[244px] rounded-[20px] overflow-hidden border border-[#C99A49]/50 bg-[#1B2531]">
                            <img src="/assets/kira/atelier-diamond-macro.png"
                                 alt="58 Facet Symmetry Diamond Architecture"
                                 width="469"
                                 height="245"
                                 class="w-full h-full object-cover">

                            <!-- Geometric Facet Diagram Overlay from Figma (31:155 & 31:156) -->
                            <div class="pointer-events-none absolute inset-0 flex items-center justify-center">
                                <div class="relative w-[176px] h-[176px] flex items-center justify-center">
                                    <img src="/assets/kira/facet-diagram-outer.svg" alt="" width="176" height="176" class="absolute inset-0 w-full h-full">
                                    <img src="/assets/kira/facet-diagram-inner.svg" alt="" width="172" height="172" class="w-[172px] h-[172px]">
                                </div>
                            </div>

                            <!-- Top Left Pill: 58 FACET SYMMETRY (31:157 - 31:158) -->
                            <div class="absolute top-4 left-4 px-3.5 py-1 rounded-full bg-[#0F1E2E]/90 border border-[#C99A49]/60">
                                <span class="font-sans font-bold text-[9.5px] tracking-wider text-[#E6C587] uppercase">
                                    58 FACET SYMMETRY
                                </span>
                            </div>

                            <!-- Right Optical Angles (31:159 - 31:160) -->
                            <div class="absolute top-14 right-4 text-right space-y-1 bg-[#0F1E2E]/65 backdrop-blur-xs px-2.5 py-1.5 rounded-lg border border-white/10">
                                <p class="font-sans font-bold text-[10.5px] text-[#DCE6F2]">Pavilion 40.8°</p>
                                <p class="font-sans font-bold text-[10.5px] text-[#E6C587]">Crown 34.5°</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Heritage Copy (7 cols, Node 31:161 - 31:167) -->
                    <div class="lg:col-span-7 lg:pl-3">
                        <p class="font-sans font-bold text-[11px] tracking-[0.08em] text-[#9E7329] uppercase">
                            WARISAN &amp; FILOSOFI MAISON
                        </p>
                        <h2 class="mt-2 font-serif font-bold text-[26px] sm:text-[30px] text-[#0F1E2E] leading-snug">
                            Simetri Mahkota Teratai &amp; Cahaya Kirana
                        </h2>
                        <p class="mt-3 font-sans font-normal text-[14px] leading-[1.68] text-[#5C6877] max-w-[580px]">
                            Arsitektur Mahkota Teratai (The Lotus Crown Solitaire) melambangkan kesempurnaan anatomi 58 faset berlian yang ditopang kelopak teratai emas 18K Champagne Gold. Kurang dari 1% berlian alami dunia lolos seleksi kurator KIRA.
                        </p>
                        <div class="mt-6">
                            <a href="{{ route('about') }}"
                               class="inline-flex items-center justify-center h-[48px] px-7 rounded-full bg-[#FAF8F3] border border-[#C99A49]/75 text-[#0F1E2E] font-sans font-bold text-[13px] hover:bg-[#EFE9DC] transition">
                                Pelajari Kisah KIRA →
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Card B: Private Salon Concierge VIP Banner (31:168 - 31:175) -->
            <div class="relative rounded-[28px] overflow-hidden bg-[#0F1E2E] border border-[#C99A49]/70 px-7 py-9 lg:px-12 lg:py-10 shadow-xl">
                <!-- Right Decorative Gold Glow Orb (31:170) -->
                <div class="pointer-events-none absolute -top-12 -right-8 w-[280px] h-[280px] opacity-90 select-none">
                    <img src="/assets/kira/vip-glow-orb.svg" alt="" width="280" height="280" class="w-full h-full">
                </div>

                <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                    <div class="max-w-[760px]">
                        <p class="font-sans font-bold text-[10.5px] tracking-[0.08em] text-[#E6C587] uppercase">
                            PRIVATE SALON CONCIERGE • PLAZA INDONESIA LEVEL 1 #108
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
                           class="inline-flex items-center justify-center h-[60px] px-8 rounded-full bg-[#C99A49] text-[#0F1E2E] font-sans font-bold text-[14px] hover:bg-[#E6C587] shadow-lg transition-all duration-300">
                            Book VIP Appointment →
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // 1. Hero Interactive Lighting & 10x Loupe Inspector (Figma Node 31:61-65)
        const stageImg = document.getElementById('hero-stage-img');
        const hudReport = document.getElementById('hero-hud-report');
        const hudFire = document.getElementById('hero-hud-fire');
        const lightBtns = document.querySelectorAll('.hero-light-btn');

        const heroModes = {
            daylight: {
                src: '/assets/kira/hero-jewelry.png',
                filter: 'none',
                scale: 'scale(1)',
                report: 'Report #226789104 • 1.50 Ct',
                fire: '2.417 nD Fire'
            },
            warm: {
                src: '/assets/kira/hero-jewelry.png',
                filter: 'sepia(0.18) saturate(1.25) contrast(1.04)',
                scale: 'scale(1.03)',
                report: '18K Champagne Gold • Warm Aura',
                fire: '24K Alloy Lustre'
            },
            loupe: {
                src: '/assets/kira/atelier-diamond-macro.png',
                filter: 'contrast(1.08) brightness(1.03)',
                scale: 'scale(1.08)',
                report: 'Laser Inscription: GIA-226789104',
                fire: '58 Facets • 34.5° Crown'
            }
        };

        lightBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const mode = btn.getAttribute('data-hero-mode');
                const cfg = heroModes[mode];
                if (!cfg) return;

                lightBtns.forEach(b => {
                    b.className = 'hero-light-btn px-3 h-[28px] rounded-full text-[#F7F4EE] hover:bg-white/10 font-sans font-bold text-[10.5px] whitespace-nowrap transition-all cursor-pointer';
                });
                btn.className = 'hero-light-btn px-3 h-[28px] rounded-full bg-[#F7F4EE] text-[#0F1E2E] font-sans font-bold text-[10.5px] whitespace-nowrap transition-all cursor-pointer';

                if (stageImg) {
                    stageImg.src = cfg.src;
                    stageImg.style.filter = cfg.filter;
                    stageImg.style.transform = cfg.scale;
                }
                if (hudReport) hudReport.textContent = cfg.report;
                if (hudFire) hudFire.textContent = cfg.fire;
            });
        });

        // 2. Featured Collections Segmented Filter (Figma Node 31:104-109)
        const filterBtns = document.querySelectorAll('.home-filter-btn');
        const productCards = document.querySelectorAll('.home-product-card');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const cat = btn.getAttribute('data-filter-category');

                filterBtns.forEach(b => {
                    b.className = 'home-filter-btn px-5 py-2 rounded-full text-[#243B53] hover:text-[#0F1E2E] font-sans font-bold text-[12px] transition-all cursor-pointer';
                });
                btn.className = 'home-filter-btn px-5 py-2 rounded-full bg-white text-[#0F1E2E] font-sans font-bold text-[12px] shadow-2xs transition-all cursor-pointer';

                productCards.forEach(card => {
                    const cardCat = card.getAttribute('data-product-category');
                    if (cat === 'all' || cardCat === cat) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });
    });
</script>
@endpush

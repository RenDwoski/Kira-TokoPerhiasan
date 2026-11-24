@extends('layouts.kira')

@section('title', 'Editorial Lookbook & Haute Joaillerie Gallery | KIRA — Maison de Diamants')

@section('content')
    @php
        $gallery360Frames = [
            [
                'degree' => 0,
                'label' => '0° • Simetri Table & 58 Faset',
                'src' => '/assets/kira/brand-story/diamond-angle-01-table.jpg',
            ],
            [
                'degree' => 90,
                'label' => '90° • Refraksi Crown 34.5° & Fire',
                'src' => '/assets/kira/brand-story/diamond-angle-02-crown.jpg',
            ],
            [
                'degree' => 180,
                'label' => '180° • Anatomi Profil Pavilion 40.8°',
                'src' => '/assets/kira/brand-story/diamond-angle-03-profile.jpg',
            ],
            [
                'degree' => 270,
                'label' => '270° • Arsitektur 18K Lotus Crown',
                'src' => '/assets/kira/brand-story/diamond-angle-04-lotus.jpg',
            ],
        ];
    @endphp

    <!-- ======================================================================= -->
    <!-- PAGE 04 HEADER & FILTER BAR (Figma Node 11:774)                         -->
    <!-- ======================================================================= -->
    <section data-page-header class="bg-white/75 border-b border-[#E5DEC9] pt-10 pb-8">
        <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px]">
            <p data-page-header-item class="font-sans font-bold text-[11px] tracking-[0.1em] text-[#9E7329] uppercase">
                04 • ASYMMETRICAL EDITORIAL MASONRY &amp; CLIENT STORIES
            </p>
            <h1 data-page-header-item class="mt-1.5 font-serif font-bold text-[32px] sm:text-[42px] text-[#0F1E2E] leading-tight">
                Editorial Lookbook &amp; Haute Joaillerie Gallery
            </h1>
            <p data-page-header-item class="mt-2 font-sans text-[14.5px] text-[#5C6877] max-w-[740px]">
                Eksplorasi visual pemakaian koleksi berlian KIRA, dokumentasi bias cahaya faset makro, serta pin produk interaktif menuju spesifikasi GIA 4C.
            </p>
            <div data-anime-line class="mt-4 w-28 h-[2px] rounded-full bg-gradient-to-r from-[#C99A49] via-[#E6C587] to-transparent origin-left"></div>

            <!-- Lookbook Filter Tabs (11:778 - 11:785) -->
            <div data-page-header-item class="mt-6 flex flex-wrap items-center gap-2">
                <button type="button"
                        data-lookbook-filter="all"
                        class="lookbook-filter-btn px-5 py-2.5 rounded-full bg-[#0F1E2E] text-white font-sans font-bold text-[12px] shadow-2xs transition cursor-pointer">
                    Semua Lookbook
                </button>
                <button type="button"
                        data-lookbook-filter="bridal"
                        class="lookbook-filter-btn px-5 py-2.5 rounded-full bg-white border border-[#D8CEBE] text-[#243B53] hover:border-[#C99A49] font-sans font-bold text-[12px] transition cursor-pointer">
                    Bridal Campaign
                </button>
                <button type="button"
                        data-lookbook-filter="macro"
                        class="lookbook-filter-btn px-5 py-2.5 rounded-full bg-white border border-[#D8CEBE] text-[#243B53] hover:border-[#C99A49] font-sans font-bold text-[12px] transition cursor-pointer">
                    Macro Diamond Cut
                </button>
                <button type="button"
                        data-lookbook-filter="atelier"
                        class="lookbook-filter-btn px-5 py-2.5 rounded-full bg-white border border-[#D8CEBE] text-[#243B53] hover:border-[#C99A49] font-sans font-bold text-[12px] transition cursor-pointer">
                    Atelier Process
                </button>
            </div>
        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 4.1 & 4.2: EDITORIAL MASONRY GRID & HOTSPOT PIN (Node 11:786)   -->
    <!-- ======================================================================= -->
    <section id="gallery-lookbook-section" class="py-12">
        <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px] space-y-6">

            <!-- Top Asymmetrical Bento Row (Portrait 3:4 Left + 2x2 Grid Right) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                <!-- Left Tall Portrait Card 01 with Interactive Hotspot Pin (5 cols) -->
                <div data-lookbook-cat="bridal"
                     data-tilt-card
                     class="lookbook-item lg:col-span-5 relative h-[480px] lg:h-[540px] rounded-[26px] overflow-hidden border border-[#C99A49]/60 bg-[#122030] group shadow-lg">
                    <img data-parallax-img
                         src="/assets/kira/product-lotus-solitaire.png"
                         alt="Bridal Model Wearing Lotus Solitaire"
                         class="w-full h-full object-cover will-change-transform">

                    <div class="absolute inset-0 bg-gradient-to-t from-[#0F1E2E]/90 via-[#0F1E2E]/20 to-transparent"></div>

                    <div class="absolute top-4 left-4 px-3.5 py-1 rounded-full bg-[#0F1E2E]/85 border border-[#C99A49]/60">
                        <span class="font-sans font-bold text-[10px] tracking-wider text-[#E6C587] uppercase">
                            LOOKBOOK PORTRAIT 01 (3:4) • BRIDAL CAMPAIGN
                        </span>
                    </div>

                    <!-- Interactive Pulsing Hotspot Pin on Ring -->
                    <a href="{{ route('products', ['item' => 'lotus-crown-solitaire']) }}#gia-specs"
                       id="gallery-hotspot-pin"
                       class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20 flex items-center justify-center"
                       title="Klik untuk menuju Detail Produk: The Lotus Crown Solitaire">
                        <span class="animate-ping absolute inline-flex h-12 w-12 rounded-full bg-[#E6C587] opacity-55"></span>
                        <span class="relative w-10 h-10 rounded-full bg-[#C99A49] text-[#0F1E2E] flex items-center justify-center font-bold shadow-xl ring-4 ring-white/40 hover:scale-110 transition">
                            ✦
                        </span>
                    </a>

                    <!-- Bottom Hotspot Pin Card -->
                    <div class="absolute bottom-5 inset-x-5 z-20">
                        <a href="{{ route('products', ['item' => 'lotus-crown-solitaire']) }}#gia-specs"
                           class="block p-4 rounded-[20px] bg-[#0F1E2E]/90 backdrop-blur-md border border-[#C99A49]/70 hover:border-[#E6C587] transition group/pin">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center gap-3">
                                    <span class="w-6 h-6 rounded-full bg-[#C99A49] text-[#0F1E2E] font-bold text-[11px] flex items-center justify-center shrink-0">
                                        ✦
                                    </span>
                                    <div>
                                        <p class="font-serif font-bold text-[16px] text-white group-hover/pin:text-[#E6C587] transition">
                                            The Lotus Crown Solitaire (1.50 Ct)
                                        </p>
                                        <p class="font-sans text-[11.5px] text-[#DCE6F2]">
                                            Klik untuk menuju Detail Produk 3D &amp; Spesifikasi 4C
                                        </p>
                                    </div>
                                </div>
                                <span class="font-sans font-bold text-[12px] text-[#E6C587] shrink-0">
                                    Rp 84,5 Jt
                                </span>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Right 2x2 Square Grid (7 cols) -->
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <!-- Square 02: Macro Facet Refraction -->
                    <a href="{{ route('products', ['item' => 'atelier-emerald-solitaire']) }}#gia-specs"
                       data-lookbook-cat="macro"
                       data-tilt-card
                       class="lookbook-item relative h-[258px] rounded-[24px] overflow-hidden border border-[#E5DEC9] bg-[#122030] group block">
                        <img data-parallax-img
                             src="/assets/kira/atelier-diamond-macro.png"
                             alt="Macro Facet Refraction"
                             class="w-full h-full object-cover will-change-transform">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0F1E2E]/85 via-transparent to-transparent"></div>
                        <div class="absolute top-3.5 left-3.5 px-3 py-1 rounded-full bg-[#0F1E2E]/85 border border-white/20 text-[9.5px] font-bold text-[#E6C587]">
                            LOOKBOOK 02 • MACRO CUT
                        </div>
                        <div class="absolute bottom-4 inset-x-4">
                            <h3 class="font-serif font-bold text-[18px] text-white">Macro Facet Refraction</h3>
                            <p class="font-sans text-[11.5px] text-[#DCE6F2]">Simetri 58 Faset • 2.417 nD Fire</p>
                        </div>
                    </a>

                    <!-- Square 03: Celestial Drop Campaign -->
                    <a href="{{ route('products', ['item' => 'celestial-lotus-earrings']) }}#gia-specs"
                       data-lookbook-cat="bridal"
                       data-tilt-card
                       class="lookbook-item relative h-[258px] rounded-[24px] overflow-hidden border border-[#E5DEC9] bg-[#122030] group block">
                        <img data-parallax-img
                             src="/assets/kira/product-celestial-earrings.png"
                             alt="Celestial Drop Campaign"
                             class="w-full h-full object-cover will-change-transform">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0F1E2E]/85 via-transparent to-transparent"></div>
                        <div class="absolute top-3.5 left-3.5 px-3 py-1 rounded-full bg-[#F7F4EE]/95 border border-[#E5DEC9] text-[9.5px] font-bold text-[#0F1E2E]">
                            LOOKBOOK 03 • BRIDAL
                        </div>
                        <div class="absolute bottom-4 inset-x-4">
                            <h3 class="font-serif font-bold text-[18px] text-white">Celestial Drop Campaign</h3>
                            <p class="font-sans text-[11.5px] text-[#DCE6F2]">Celestial Lotus Earrings • GIA D-VS1</p>
                        </div>
                    </a>

                    <!-- Editorial Quote Block -->
                    <div data-lookbook-cat="atelier"
                         data-tilt-card
                         class="lookbook-item h-[258px] rounded-[24px] bg-white border border-[#C99A49]/60 p-7 flex flex-col items-center justify-center text-center shadow-2xs">
                        <img src="/assets/kira/logo-lotus-crown.svg" alt="KIRA" width="32" height="35" class="mb-3">
                        <blockquote class="font-serif italic font-semibold text-[19px] text-[#0F1E2E] leading-snug">
                            &ldquo;Keseimbangan asimetris antara kemurnian faset dan keanggunan.&rdquo;
                        </blockquote>
                        <p class="mt-4 font-sans font-bold text-[10.5px] tracking-[0.12em] text-[#9E7329] uppercase">
                            KIRA EDITORIAL LOOKBOOK
                        </p>
                    </div>

                    <!-- Square 04: 18K Champagne Gold Setting -->
                    <a href="{{ route('products', ['item' => 'lotus-halo-diamond-pendant']) }}#gia-specs"
                       data-lookbook-cat="atelier"
                       data-tilt-card
                       class="lookbook-item relative h-[258px] rounded-[24px] overflow-hidden border border-[#E5DEC9] bg-[#122030] group block">
                        <img data-parallax-img
                             src="/assets/kira/hero-jewelry.png"
                             alt="18K Champagne Gold Setting"
                             class="w-full h-full object-cover will-change-transform">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0F1E2E]/85 via-transparent to-transparent"></div>
                        <div class="absolute top-3.5 left-3.5 px-3 py-1 rounded-full bg-[#0F1E2E]/85 border border-[#C99A49]/60 text-[9.5px] font-bold text-[#E6C587]">
                            LOOKBOOK 04 • ATELIER
                        </div>
                        <div class="absolute bottom-4 inset-x-4">
                            <h3 class="font-serif font-bold text-[18px] text-white">18K Champagne Gold Setting</h3>
                            <p class="font-sans text-[11.5px] text-[#DCE6F2]">Haute Joaillerie Ensemble • 2026</p>
                        </div>
                    </a>

                </div>
            </div>

            <!-- Second Row: 3 Landscape 16:10 Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Item 05 -->
                <a href="{{ route('products', ['item' => 'kirana-starlight-pendant']) }}#gia-specs"
                   data-lookbook-cat="macro"
                   data-tilt-card
                   class="lookbook-item relative h-[220px] rounded-[24px] overflow-hidden border border-[#E5DEC9] bg-[#122030] group block">
                    <img data-parallax-img
                         src="/assets/kira/product-kirana-pendant.png"
                         alt="High Jewelry Necklace Showcase"
                         class="w-full h-full object-cover will-change-transform">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0F1E2E]/85 via-transparent to-transparent"></div>
                    <div class="absolute top-3.5 left-3.5 px-3 py-1 rounded-full bg-[#0F1E2E]/85 border border-[#C99A49]/60 text-[9.5px] font-bold text-[#E6C587]">
                        LOOKBOOK 05 (16:10)
                    </div>
                    <div class="absolute bottom-4 inset-x-4">
                        <h3 class="font-serif font-bold text-[18px] text-white">High Jewelry Necklace Showcase</h3>
                        <p class="font-sans text-[11.5px] text-[#DCE6F2]">Kirana Starlight Pendant • GIA E-IF</p>
                    </div>
                </a>

                <!-- Item 06 -->
                <a href="{{ route('products', ['item' => 'kirana-starlight-pave-ring']) }}#gia-specs"
                   data-lookbook-cat="bridal"
                   data-tilt-card
                   class="lookbook-item relative h-[220px] rounded-[24px] overflow-hidden border border-[#E5DEC9] bg-[#122030] group block">
                    <img data-parallax-img
                         src="/assets/kira/product-lotus-solitaire.png"
                         alt="Wedding Band Pairing Inspiration"
                         class="w-full h-full object-cover will-change-transform">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0F1E2E]/85 via-transparent to-transparent"></div>
                    <div class="absolute top-3.5 left-3.5 px-3 py-1 rounded-full bg-[#F7F4EE]/95 border border-[#E5DEC9] text-[9.5px] font-bold text-[#0F1E2E]">
                        LOOKBOOK 06 (16:10)
                    </div>
                    <div class="absolute bottom-4 inset-x-4">
                        <h3 class="font-serif font-bold text-[18px] text-white">Wedding Band Pairing Inspiration</h3>
                        <p class="font-sans text-[11.5px] text-[#DCE6F2]">Kirana Starlight Pavé • 1.20 Ct</p>
                    </div>
                </a>

                <!-- Item 07 -->
                <a href="{{ route('contact') }}"
                   data-lookbook-cat="atelier"
                   data-tilt-card
                   class="lookbook-item relative h-[220px] rounded-[24px] overflow-hidden border border-[#E5DEC9] bg-[#122030] group block">
                    <img data-parallax-img
                         src="/assets/kira/hero/hero-warm-18k.jpg"
                         alt="VIP Salon Experience"
                         class="w-full h-full object-cover will-change-transform">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0F1E2E]/85 via-transparent to-transparent"></div>
                    <div class="absolute top-3.5 left-3.5 px-3 py-1 rounded-full bg-[#0F1E2E]/85 border border-[#C99A49]/60 text-[9.5px] font-bold text-[#E6C587]">
                        LOOKBOOK 07 (16:10)
                    </div>
                    <div class="absolute bottom-4 inset-x-4">
                        <h3 class="font-serif font-bold text-[18px] text-white">VIP Salon Experience</h3>
                        <p class="font-sans text-[11.5px] text-[#DCE6F2]">KIRA Plaza Indonesia Level 1</p>
                    </div>
                </a>
            </div>

        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 4.3 & 4.4: ATELIER 360 SHOWCASE & CLIENT STORIES (Node 11:844)  -->
    <!-- ======================================================================= -->
    <section class="pb-16 lg:pb-24">
        <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px] space-y-12">

            <!-- Interactive Atelier Craftsmanship 360° Optical Showcase Player (Motion.dev + Anime.js) -->
            <div id="atelier-360-card"
                 data-360-frames='@json($gallery360Frames)'
                 data-sparkle-field
                 data-sparkle-count="16"
                 class="relative rounded-[28px] overflow-hidden border-2 border-[#C99A49]/75 bg-[#0F1E2E] min-h-[380px] sm:min-h-[420px] shadow-2xl flex items-center justify-center">
                <img id="atelier-360-bg"
                     src="{{ $gallery360Frames[0]['src'] }}"
                     alt="Atelier Craftsmanship 360 Showcase"
                     class="absolute inset-0 w-full h-full object-cover opacity-50 will-change-transform">

                <div class="absolute inset-0 bg-gradient-to-r from-[#0F1E2E]/92 via-[#0F1E2E]/68 to-[#0F1E2E]/92"></div>

                <!-- Top Live Optical Azimuth HUD -->
                <div class="absolute top-4 left-4 right-4 z-20 flex items-center justify-between gap-2 pointer-events-none">
                    <span id="atelier-360-frame-label" class="apple-hud-chip px-3.5 py-1.5 rounded-full border border-[#C99A49]/50 font-sans font-bold text-[10px] tracking-wider text-[#E6C587] uppercase truncate">
                        {{ $gallery360Frames[0]['label'] }}
                    </span>
                    <span id="atelier-360-deg" class="apple-hud-chip px-3.5 py-1.5 rounded-full border border-white/15 font-sans font-bold text-[11px] text-white tabular-nums shrink-0">
                        0°
                    </span>
                </div>

                <!-- Center Interactive Anime.js Orbital Reticle & Play Control -->
                <div class="relative z-20 flex flex-col items-center justify-center text-center px-6 py-12">
                    <div class="relative w-28 h-28 sm:w-32 sm:h-32 mb-4 flex items-center justify-center">
                        <svg id="atelier-360-svg" viewBox="0 0 140 140" fill="none" aria-hidden="true" class="absolute inset-0 w-full h-full pointer-events-none">
                            <g id="atelier-360-ring-outer" style="transform-origin: 70px 70px;">
                                <circle cx="70" cy="70" r="64" stroke="#E6C587" stroke-opacity="0.65" stroke-width="1.1" stroke-dasharray="4 6" class="atelier-draw-path" />
                                <line x1="70" y1="2" x2="70" y2="12" stroke="#E6C587" stroke-width="1.4" class="atelier-draw-path" />
                                <line x1="70" y1="128" x2="70" y2="138" stroke="#E6C587" stroke-width="1.4" class="atelier-draw-path" />
                                <line x1="2" y1="70" x2="12" y2="70" stroke="#E6C587" stroke-width="1.4" class="atelier-draw-path" />
                                <line x1="128" y1="70" x2="138" y2="70" stroke="#E6C587" stroke-width="1.4" class="atelier-draw-path" />
                            </g>
                            <g id="atelier-360-ring-inner" style="transform-origin: 70px 70px;">
                                <polygon points="70,18 107,33 122,70 107,107 70,122 33,107 18,70 33,33"
                                         stroke="#F7F4EE" stroke-opacity="0.45" stroke-width="1" class="atelier-draw-path" />
                            </g>
                        </svg>

                        <button type="button"
                                id="toggle-360-btn"
                                data-magnetic
                                class="relative z-10 w-16 h-16 rounded-full bg-[#C99A49] text-[#0F1E2E] font-bold text-[18px] flex items-center justify-center shadow-xl hover:bg-[#E6C587] transition cursor-pointer"
                                aria-label="Putar Simulasi Optik 360 Derajat">
                            ▶
                        </button>
                    </div>

                    <span class="px-4 py-1 rounded-full bg-white/10 border border-[#C99A49]/60 font-sans font-bold text-[10.5px] tracking-wider text-[#E6C587] uppercase">
                        ATELIER CRAFTSMANSHIP 360° OPTICAL INSPECTOR
                    </span>
                    <h2 class="mt-2.5 font-serif font-bold text-[24px] sm:text-[30px] text-white max-w-[680px]">
                        Dokumentasi Pemotongan &amp; Kilau Berlian 360 Derajat
                    </h2>
                    <p id="atelier-360-status" class="mt-1.5 font-sans text-[13.5px] text-[#DCE6F2] max-w-[580px]">
                        Klik tombol putar atau pilih sudut di bawah untuk mensimulasikan rotasi faset oktagonal 34.5° dan melihat bias spektrum berlian GIA D-VVS1.
                    </p>

                    <!-- 4 Quick-Angle Step Pills -->
                    <div class="mt-5 inline-flex flex-wrap items-center justify-center gap-2">
                        @foreach ($gallery360Frames as $fIdx => $frame)
                            <button type="button"
                                    data-360-step="{{ $fIdx }}"
                                    class="atelier-step-pill px-3.5 py-1.5 rounded-full font-sans font-bold text-[10.5px] transition cursor-pointer {{ $fIdx === 0 ? 'bg-[#C99A49] text-[#0F1E2E]' : 'bg-white/10 text-[#F7F4EE] border border-white/15 hover:border-[#C99A49]' }}">
                                {{ $frame['degree'] }}° Sudut
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Section 4.4: Client Stories -->
            <div data-gallery-stories>
                <h2 class="font-serif font-bold text-[28px] sm:text-[34px] text-[#0F1E2E]">
                    Kisah Momen Berharga Klien KIRA (Client Stories)
                </h2>

                <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Testimonial 1 -->
                    <div data-tilt-card data-story-card class="bento-card p-6 flex flex-col justify-between">
                        <div>
                            <p class="font-sans font-bold text-[13.5px] text-[#9E7329]">
                                <span data-star-row class="inline-flex gap-0.5 mr-1">
                                    <span class="client-star inline-block">★</span><span class="client-star inline-block">★</span><span class="client-star inline-block">★</span><span class="client-star inline-block">★</span><span class="client-star inline-block">★</span>
                                </span>
                                — Nadia &amp; Reza (Jakarta)
                            </p>
                            <p class="mt-3 font-sans text-[13.5px] leading-[1.68] text-[#5C6877]">
                                &ldquo;Pengalaman Private Viewing di butik KIRA Plaza Indonesia sangat berkesan. Gemologist menunjukkan langsung inskripsi laser GIA pada cincin tunangan kami dengan mikroskop 10x.&rdquo;
                            </p>
                        </div>
                        <p class="mt-4 pt-3 border-t border-[#EFE9DC] font-sans font-bold text-[12px] text-[#0F1E2E]">
                            Koleksi: The Lotus Crown Solitaire 1.50 Ct
                        </p>
                    </div>

                    <!-- Testimonial 2 -->
                    <div data-tilt-card data-story-card class="bento-card p-6 flex flex-col justify-between">
                        <div>
                            <p class="font-sans font-bold text-[13.5px] text-[#9E7329]">
                                <span data-star-row class="inline-flex gap-0.5 mr-1">
                                    <span class="client-star inline-block">★</span><span class="client-star inline-block">★</span><span class="client-star inline-block">★</span><span class="client-star inline-block">★</span><span class="client-star inline-block">★</span>
                                </span>
                                — Clarissa W. (Surabaya)
                            </p>
                            <p class="mt-3 font-sans text-[13.5px] leading-[1.68] text-[#5C6877]">
                                &ldquo;Kilau 18K Champagne Gold KIRA memiliki rona hangat yang sangat elegan dan berbeda dari emas kuning biasa. Liontin Kirana Starlight menjadi pusaka keluarga kami.&rdquo;
                            </p>
                        </div>
                        <p class="mt-4 pt-3 border-t border-[#EFE9DC] font-sans font-bold text-[12px] text-[#0F1E2E]">
                            Koleksi: Kirana Starlight Pendant
                        </p>
                    </div>

                    <!-- CTA Card 3: Ingin Mencoba Langsung? -->
                    <div data-story-card data-sparkle-field data-sparkle-count="10" class="relative overflow-hidden rounded-[24px] bg-[#0F1E2E] border border-[#C99A49]/70 p-6 flex flex-col items-center justify-center text-center text-white shadow-lg">
                        <span class="relative z-10 px-3 py-1 rounded-full bg-white/10 text-[#E6C587] font-sans font-bold text-[10px] tracking-wider uppercase">
                            PRIVATE SALON
                        </span>
                        <h3 class="relative z-10 mt-3 font-serif font-bold text-[24px] text-white">
                            Ingin Mencoba Langsung?
                        </h3>
                        <p class="relative z-10 mt-1.5 font-sans text-[13px] text-[#DCE6F2]">
                            Jadwalkan sesi Private Viewing di butik kami bersama Gemologist GIA.
                        </p>
                        <a href="{{ route('contact') }}"
                           data-magnetic
                           class="relative z-10 mt-5 w-full h-[46px] rounded-full bg-[#C99A49] text-[#0F1E2E] font-sans font-bold text-[13px] flex items-center justify-center hover:bg-[#E6C587] transition">
                            Book Private Viewing
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

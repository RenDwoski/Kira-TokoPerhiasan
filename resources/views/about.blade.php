@extends('layouts.kira')

@section('title', 'Tentang KIRA — Maison de Diamants | Warisan Cahaya Kirana')

@section('content')
    @php
        $brandDiamondAngles = [
            [
                'id' => 'table',
                'degree' => '0°',
                'degree_num' => 0,
                'short' => 'Table',
                'tag' => 'TABLE & 58 FACETS',
                'title' => 'Simetri Table & 58 Faset',
                'subtitle' => 'Pantulan cahaya putih (brilliance) simetris sempurna dari puncak oktagonal.',
                'metric_label' => 'SIMETRI FASET',
                'metric_num' => 58,
                'metric_decimals' => 0,
                'metric_suffix' => ' Faset',
                'src' => '/assets/kira/brand-story/diamond-angle-01-table.jpg',
            ],
            [
                'id' => 'crown',
                'degree' => '45°',
                'degree_num' => 45,
                'short' => 'Crown',
                'tag' => 'CROWN 34.5° FIRE',
                'title' => 'Refraksi Mahkota 34.5°',
                'subtitle' => 'Kemiringan crown 34.5° memecah berkas cahaya menjadi spektrum fire murni.',
                'metric_label' => 'INDEKS BIAS',
                'metric_num' => 2.417,
                'metric_decimals' => 3,
                'metric_suffix' => ' nD',
                'src' => '/assets/kira/brand-story/diamond-angle-02-crown.jpg',
            ],
            [
                'id' => 'profile',
                'degree' => '90°',
                'degree_num' => 90,
                'short' => 'Profil',
                'tag' => 'ANATOMI PROFIL',
                'title' => 'Proporsi Crown & Pavilion',
                'subtitle' => 'Keseimbangan matematis sudut crown 34.5° dan pavilion 40.8° hingga titik culet.',
                'metric_label' => 'SUDUT PAVILION',
                'metric_num' => 40.8,
                'metric_decimals' => 1,
                'metric_suffix' => '°',
                'src' => '/assets/kira/brand-story/diamond-angle-03-profile.jpg',
            ],
            [
                'id' => 'lotus',
                'degree' => '135°',
                'degree_num' => 135,
                'short' => 'Lotus',
                'tag' => 'LOTUS CROWN 18K',
                'title' => 'Arsitektur Mahkota Teratai',
                'subtitle' => 'Cakar kelopak teratai 18K Champagne Gold membuka jendela cahaya 360°.',
                'metric_label' => 'LOGAM MULIA',
                'metric_num' => 18,
                'metric_decimals' => 0,
                'metric_suffix' => 'K Gold',
                'src' => '/assets/kira/brand-story/diamond-angle-04-lotus.jpg',
            ],
        ];
    @endphp

    <!-- ======================================================================= -->
    <!-- PAGE 02 HEADER: ABOUT MAISON (Figma Node 11:408)                        -->
    <!-- ======================================================================= -->
    <section class="bg-white/75 border-b border-[#E5DEC9] py-12 lg:py-16">
        <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px] text-center">
            <p class="font-sans font-bold text-[11px] tracking-[0.12em] text-[#9E7329] uppercase">
                HOME / ABOUT MAISON
            </p>
            <h1 class="mt-2 font-serif font-bold text-[32px] sm:text-[42px] lg:text-[46px] text-[#0F1E2E] leading-tight">
                Tentang KIRA — Maison de Diamants
            </h1>
            <p class="mt-3 font-sans text-[14.5px] sm:text-[15px] text-[#5C6877] max-w-[680px] mx-auto leading-relaxed">
                Diambil dari kata Sanskerta &ldquo;Kirana&rdquo; yang bermakna berkas sinar yang murni dan agung. Rumah perhiasan berlian modern yang memadukan potongan permata presisi tinggi dengan keanggunan tak lekang waktu.
            </p>
        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 2.1: BRAND STORY & INTERACTIVE 360° DIAMOND ANATOMY             -->
    <!-- ======================================================================= -->
    <section id="brand-story-section"
             data-brand-angles='@json($brandDiamondAngles)'
             class="relative py-12 sm:py-16 lg:py-20 overflow-x-clip">
        <!-- Subtle Ambient Champagne Aura -->
        <div class="pointer-events-none absolute -top-24 left-1/2 -translate-x-1/2 w-[780px] h-[360px] rounded-full bg-[#C99A49]/[0.06] blur-3xl"></div>

        <div class="relative max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px]">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 xl:gap-14 items-center">

                <!-- Left Column: Interactive 360° Multi-Angle Diamond Showcase (6 cols) -->
                <div class="lg:col-span-6" data-motion-visual>
                    <div class="rounded-[28px] bg-white border border-[#E5DEC9] p-3.5 sm:p-5 shadow-[0_24px_60px_-24px_rgba(15,30,46,0.14)]">

                        <!-- Top Atelier Inspector Header -->
                        <div class="flex flex-wrap items-center justify-between gap-2 px-1 pb-3">
                            <div class="inline-flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-[#C99A49]"></span>
                                <span class="font-sans font-bold text-[10px] sm:text-[10.5px] tracking-[0.1em] text-[#0F1E2E] uppercase">
                                    ATELIER 360° DIAMOND INSPECTOR
                                </span>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button"
                                        id="brand-grid-toggle-btn"
                                        aria-pressed="true"
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#FAF8F3] border border-[#E5DEC9] hover:border-[#C99A49] text-[10px] font-bold text-[#0F1E2E] transition cursor-pointer">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#C99A49]"></span>
                                    <span id="brand-grid-toggle-text">Grid Optik</span>
                                </button>
                                <span id="brand-angle-step"
                                      class="px-2.5 py-1 rounded-full bg-[#0F1E2E] text-[#E6C587] font-sans font-bold text-[10px] tracking-wider">
                                    01 / 04
                                </span>
                            </div>
                        </div>

                        <!-- Main Interactive 4:3 Rotating Diamond Viewport -->
                        <div id="brand-diamond-stage"
                             tabindex="0"
                             role="region"
                             aria-label="Inspeksi Multi-Sudut Berlian KIRA"
                             class="kira-3d-stage relative w-full aspect-[4/3] rounded-[20px] overflow-hidden border border-[#E5DEC9]/80 bg-[#121921] cursor-grab active:cursor-grabbing select-none touch-pan-y focus:outline-none focus:ring-2 focus:ring-[#C99A49]">

                            <!-- Animated 3D Image Layer (Motion.dev Spring Physics) -->
                            <div id="brand-diamond-layer" class="w-full h-full will-change-transform">
                                <img id="brand-diamond-img"
                                     src="{{ $brandDiamondAngles[0]['src'] }}"
                                     alt="KIRA Diamond — {{ $brandDiamondAngles[0]['title'] }} ({{ $brandDiamondAngles[0]['degree'] }})"
                                     width="1200"
                                     height="900"
                                     draggable="false"
                                     class="w-full h-full object-cover">
                            </div>

                            <!-- Soft Luxury Bottom Vignette for Guaranteed Contrast -->
                            <div class="pointer-events-none absolute inset-x-0 bottom-0 h-[44%] bg-gradient-to-t from-[#0F1E2E]/85 via-[#0F1E2E]/25 to-transparent"></div>

                            <!-- Anime.js Interactive 58-Facet Sacred Geometry Reticle Overlay -->
                            <svg id="brand-facet-svg"
                                 viewBox="0 0 240 240"
                                 fill="none"
                                 aria-hidden="true"
                                 class="pointer-events-none absolute inset-0 m-auto w-[58%] max-w-[220px] aspect-square transition-opacity duration-500 opacity-100">
                                <!-- Outer Rotating Compass Ring -->
                                <g id="brand-reticle-outer" style="transform-origin: 120px 120px;">
                                    <circle cx="120" cy="120" r="106" stroke="#E6C587" stroke-opacity="0.45" stroke-width="0.9" stroke-dasharray="3 6" class="facet-draw-path" />
                                    <circle cx="120" cy="120" r="94" stroke="#DCE6F2" stroke-opacity="0.28" stroke-width="0.7" class="facet-draw-path" />
                                    <line x1="120" y1="6" x2="120" y2="20" stroke="#E6C587" stroke-opacity="0.75" stroke-width="1.2" class="facet-draw-path" />
                                    <line x1="120" y1="220" x2="120" y2="234" stroke="#E6C587" stroke-opacity="0.75" stroke-width="1.2" class="facet-draw-path" />
                                    <line x1="6" y1="120" x2="20" y2="120" stroke="#E6C587" stroke-opacity="0.75" stroke-width="1.2" class="facet-draw-path" />
                                    <line x1="220" y1="120" x2="234" y2="120" stroke="#E6C587" stroke-opacity="0.75" stroke-width="1.2" class="facet-draw-path" />
                                </g>

                                <!-- Inner Counter-Rotating 58-Facet Octagonal Table Geometry -->
                                <g id="brand-reticle-inner" style="transform-origin: 120px 120px;">
                                    <polygon points="120,38 178,62 202,120 178,178 120,202 62,178 38,120 62,62"
                                             stroke="#E6C587" stroke-opacity="0.58" stroke-width="1" class="facet-draw-path" />
                                    <polygon points="120,66 158,82 174,120 158,158 120,174 82,158 66,120 82,82"
                                             stroke="#F7F4EE" stroke-opacity="0.45" stroke-width="0.85" class="facet-draw-path facet-ray-path" />
                                    <line x1="120" y1="38" x2="120" y2="66" stroke="#E6C587" stroke-opacity="0.55" stroke-width="0.85" class="facet-draw-path facet-ray-path" />
                                    <line x1="178" y1="62" x2="158" y2="82" stroke="#E6C587" stroke-opacity="0.55" stroke-width="0.85" class="facet-draw-path facet-ray-path" />
                                    <line x1="202" y1="120" x2="174" y2="120" stroke="#E6C587" stroke-opacity="0.55" stroke-width="0.85" class="facet-draw-path facet-ray-path" />
                                    <line x1="178" y1="178" x2="158" y2="158" stroke="#E6C587" stroke-opacity="0.55" stroke-width="0.85" class="facet-draw-path facet-ray-path" />
                                    <line x1="120" y1="202" x2="120" y2="174" stroke="#E6C587" stroke-opacity="0.55" stroke-width="0.85" class="facet-draw-path facet-ray-path" />
                                    <line x1="62" y1="178" x2="82" y2="158" stroke="#E6C587" stroke-opacity="0.55" stroke-width="0.85" class="facet-draw-path facet-ray-path" />
                                    <line x1="38" y1="120" x2="66" y2="120" stroke="#E6C587" stroke-opacity="0.55" stroke-width="0.85" class="facet-draw-path facet-ray-path" />
                                    <line x1="62" y1="62" x2="82" y2="82" stroke="#E6C587" stroke-opacity="0.55" stroke-width="0.85" class="facet-draw-path facet-ray-path" />
                                </g>

                                <!-- Luminous Cardinal Sparkle Nodes -->
                                <circle cx="120" cy="38" r="2.2" fill="#E6C587" class="facet-sparkle-dot" style="transform-box: fill-box; transform-origin: center;" />
                                <circle cx="202" cy="120" r="2.2" fill="#E6C587" class="facet-sparkle-dot" style="transform-box: fill-box; transform-origin: center;" />
                                <circle cx="120" cy="202" r="2.2" fill="#E6C587" class="facet-sparkle-dot" style="transform-box: fill-box; transform-origin: center;" />
                                <circle cx="38" cy="120" r="2.2" fill="#E6C587" class="facet-sparkle-dot" style="transform-box: fill-box; transform-origin: center;" />
                                <circle cx="178" cy="62" r="1.7" fill="#F7F4EE" class="facet-sparkle-dot" style="transform-box: fill-box; transform-origin: center;" />
                                <circle cx="178" cy="178" r="1.7" fill="#F7F4EE" class="facet-sparkle-dot" style="transform-box: fill-box; transform-origin: center;" />
                                <circle cx="62" cy="178" r="1.7" fill="#F7F4EE" class="facet-sparkle-dot" style="transform-box: fill-box; transform-origin: center;" />
                                <circle cx="62" cy="62" r="1.7" fill="#F7F4EE" class="facet-sparkle-dot" style="transform-box: fill-box; transform-origin: center;" />
                            </svg>

                            <!-- Top Floating Glass HUD Badges -->
                            <div class="pointer-events-none absolute top-3 left-3 right-3 flex items-center justify-between gap-2">
                                <div class="apple-hud-chip inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-[#C99A49]/50 max-w-full">
                                    <span id="brand-angle-deg-num" class="font-sans font-bold text-[10.5px] text-[#E6C587] tabular-nums shrink-0">0°</span>
                                    <span class="text-white/35 text-[10px]">•</span>
                                    <span id="brand-angle-tag" class="font-sans font-bold text-[9.5px] sm:text-[10px] tracking-[0.07em] text-[#F7F4EE] uppercase truncate">
                                        {{ $brandDiamondAngles[0]['tag'] }}
                                    </span>
                                </div>
                                <div class="apple-hud-chip hidden sm:inline-flex items-center px-3 py-1.5 rounded-full border border-white/15 shrink-0">
                                    <span class="font-sans font-semibold text-[10px] text-[#DCE6F2]">
                                        Geser untuk Putar
                                    </span>
                                </div>
                            </div>

                            <!-- Bottom Floating Glass HUD Info Bar -->
                            <div id="brand-hud-bottom"
                                 class="apple-hud-chip pointer-events-none absolute bottom-3 left-3 right-3 px-3.5 sm:px-4 py-2.5 sm:py-3 rounded-[16px] border border-white/15 flex items-center justify-between gap-3">
                                <div class="min-w-0">
                                    <p id="brand-angle-title" class="font-serif font-bold text-[14px] sm:text-[16px] text-[#F7F4EE] leading-snug truncate">
                                        {{ $brandDiamondAngles[0]['title'] }}
                                    </p>
                                    <p id="brand-angle-subtitle" class="hidden sm:block mt-0.5 font-sans text-[11px] text-[#DCE6F2]/90 leading-snug truncate">
                                        {{ $brandDiamondAngles[0]['subtitle'] }}
                                    </p>
                                </div>
                                <div class="shrink-0 text-right pl-3 border-l border-white/15">
                                    <p id="brand-angle-metric-label" class="font-sans font-bold text-[8.5px] tracking-[0.09em] text-[#E6C587]/90 uppercase">
                                        {{ $brandDiamondAngles[0]['metric_label'] }}
                                    </p>
                                    <p id="brand-angle-metric-val" class="font-serif font-bold text-[14px] sm:text-[15.5px] text-white tabular-nums leading-tight">
                                        {{ $brandDiamondAngles[0]['metric_num'] }}{{ $brandDiamondAngles[0]['metric_suffix'] }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Interactive Angle Scrubber & Auto-Orbit Row -->
                        <div class="mt-4 px-1 flex flex-wrap sm:flex-nowrap items-center gap-3">
                            <label for="brand-angle-range" class="font-sans font-bold text-[10px] tracking-[0.08em] text-[#5C6877] uppercase shrink-0">
                                ROTASI SUDUT
                            </label>
                            <div class="flex-1 min-w-[140px] flex items-center">
                                <input id="brand-angle-range"
                                       type="range"
                                       min="0"
                                       max="{{ count($brandDiamondAngles) - 1 }}"
                                       step="1"
                                       value="0"
                                       aria-label="Geser sudut rotasi berlian"
                                       class="kira-angle-slider">
                            </div>
                            <button type="button"
                                    id="brand-auto-orbit-btn"
                                    aria-pressed="false"
                                    class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#FAF8F3] border border-[#E5DEC9] text-[#0F1E2E] font-sans font-bold text-[10.5px] hover:border-[#C99A49] transition cursor-pointer shrink-0">
                                <span id="brand-auto-orbit-dot" class="w-2 h-2 rounded-full bg-[#C99A49]"></span>
                                <span id="brand-auto-orbit-text">Putar Otomatis</span>
                            </button>
                        </div>

                        <!-- 4 Multi-Angle Thumbnail Selector Pills -->
                        <div class="mt-3.5 grid grid-cols-2 sm:grid-cols-4 gap-2.5">
                            @foreach ($brandDiamondAngles as $idx => $angle)
                                <button type="button"
                                        data-brand-angle-index="{{ $idx }}"
                                        aria-pressed="{{ $idx === 0 ? 'true' : 'false' }}"
                                        class="brand-angle-thumb group text-left p-1.5 rounded-[16px] border transition-colors cursor-pointer {{ $idx === 0 ? 'border-[#C99A49] bg-white ring-2 ring-[#C99A49]/25 shadow-sm' : 'border-[#E5DEC9] bg-[#FAF8F3]/80 hover:border-[#C99A49]' }}">
                                    <div class="relative w-full h-[54px] sm:h-[58px] rounded-[11px] overflow-hidden bg-[#121921]">
                                        <img src="{{ $angle['src'] }}"
                                             alt="{{ $angle['title'] }}"
                                             loading="lazy"
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        <span data-thumb-deg
                                              class="absolute top-1.5 left-1.5 px-1.5 py-0.5 rounded-md font-sans font-bold text-[9px] leading-none {{ $idx === 0 ? 'bg-[#0F1E2E] text-[#E6C587]' : 'bg-[#0F1E2E]/75 text-white' }}">
                                            {{ $angle['degree'] }}
                                        </span>
                                    </div>
                                    <p class="mt-1.5 px-1 font-sans font-bold text-[11px] text-[#0F1E2E] text-center truncate">
                                        {{ $angle['short'] }}
                                    </p>
                                </button>
                            @endforeach
                        </div>

                        <!-- 3 Live Optical Telemetry Mini-Cards (Anime.js Counters) -->
                        <div class="mt-3.5 grid grid-cols-3 gap-2.5">
                            <div class="px-2.5 py-2.5 rounded-[16px] bg-[#FAF8F3] border border-[#E5DEC9] text-center">
                                <p class="font-serif font-bold text-[18px] sm:text-[20px] text-[#0F1E2E] tabular-nums leading-tight"
                                   data-anime-counter
                                   data-target="58"
                                   data-decimals="0"
                                   data-suffix="">
                                    58
                                </p>
                                <p class="mt-0.5 font-sans font-bold text-[9.5px] sm:text-[10px] tracking-[0.06em] text-[#9E7329] uppercase">
                                    Simetri Faset
                                </p>
                            </div>
                            <div class="px-2.5 py-2.5 rounded-[16px] bg-[#FAF8F3] border border-[#E5DEC9] text-center">
                                <p class="font-serif font-bold text-[18px] sm:text-[20px] text-[#0F1E2E] tabular-nums leading-tight"
                                   data-anime-counter
                                   data-target="34.5"
                                   data-decimals="1"
                                   data-suffix="°">
                                    34.5°
                                </p>
                                <p class="mt-0.5 font-sans font-bold text-[9.5px] sm:text-[10px] tracking-[0.06em] text-[#9E7329] uppercase">
                                    Sudut Crown
                                </p>
                            </div>
                            <div class="px-2.5 py-2.5 rounded-[16px] bg-[#FAF8F3] border border-[#E5DEC9] text-center">
                                <p class="font-serif font-bold text-[18px] sm:text-[20px] text-[#0F1E2E] tabular-nums leading-tight"
                                   data-anime-counter
                                   data-target="40.8"
                                   data-decimals="1"
                                   data-suffix="°">
                                    40.8°
                                </p>
                                <p class="mt-0.5 font-sans font-bold text-[9.5px] sm:text-[10px] tracking-[0.06em] text-[#9E7329] uppercase">
                                    Sudut Pavilion
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Right Column: Editorial Brand Story & Philosophy (6 cols) -->
                <div class="lg:col-span-6 space-y-5 sm:space-y-6">
                    <!-- Eyebrow Badge -->
                    <div data-motion-story-item>
                        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white border border-[#C99A49]/60 shadow-2xs">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C99A49]"></span>
                            <span class="font-sans font-bold text-[10.5px] tracking-[0.09em] text-[#9E7329] uppercase">
                                01 • BRAND STORY (KIRANA)
                            </span>
                        </div>
                    </div>

                    <!-- Display Heading -->
                    <h2 data-motion-story-item
                        class="font-serif font-bold text-[30px] sm:text-[38px] xl:text-[42px] text-[#0F1E2E] leading-[1.16] tracking-[-0.015em]">
                        Warisan Cahaya Murni<br>
                        <span class="text-[#9E7329]">&amp; Simetri Mahkota Teratai</span>
                    </h2>

                    <!-- Editorial Copy -->
                    <div data-motion-story-item class="space-y-4 font-sans text-[14.5px] sm:text-[15.5px] leading-[1.75] text-[#5C6877]">
                        <p>
                            KIRA (<span class="font-medium text-[#0F1E2E]">/ki·ra/</span> — Pancaran Cahaya &amp; Kemurnian Abadi) lahir sebagai rumah perhiasan berlian modern (<em>Maison de Diamants</em>) yang merayakan kemurnian anatomi berlian alami bersertifikat GIA.
                        </p>
                        <p>
                            Setiap cincin solitaire KIRA menampilkan arsitektur <strong class="text-[#0F1E2E]">The Lotus Crown Solitaire</strong>, di mana kelopak teratai emas 18K Champagne Gold menopang berlian dengan sudut mahkota 34.5° sehingga cahaya dapat masuk dari segala penjuru dan memantulkan kilau putih (<em>brilliance</em>) yang maksimal.
                        </p>
                    </div>

                    <!-- 2-Column Heritage & Architecture Highlights -->
                    <div data-motion-story-item class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                        <div class="brand-highlight-card p-4 rounded-[20px] bg-white border border-[#E5DEC9] shadow-2xs">
                            <p class="font-sans font-bold text-[10px] tracking-[0.08em] text-[#9E7329] uppercase">
                                ETIMOLOGI SANSKERTA
                            </p>
                            <p class="mt-1 font-serif font-bold text-[17px] text-[#0F1E2E]">
                                /ki·ra/ — Berkas Cahaya
                            </p>
                            <p class="mt-1 font-sans text-[12.5px] leading-[1.6] text-[#5C6877]">
                                Filosofi sinar murni yang membiaskan kejernihan berlian D–F tanpa distorsi.
                            </p>
                        </div>
                        <div class="brand-highlight-card p-4 rounded-[20px] bg-white border border-[#E5DEC9] shadow-2xs">
                            <p class="font-sans font-bold text-[10px] tracking-[0.08em] text-[#9E7329] uppercase">
                                ARSITEKTUR 18K GOLD
                            </p>
                            <p class="mt-1 font-serif font-bold text-[17px] text-[#0F1E2E]">
                                Lotus Crown Gallery
                            </p>
                            <p class="mt-1 font-sans text-[12.5px] leading-[1.6] text-[#5C6877]">
                                Jendela kelopak terbuka 360° untuk menyalurkan cahaya hingga ke dasar pavilion.
                            </p>
                        </div>
                    </div>

                    <!-- Refined Editorial Pull Quote Card -->
                    <blockquote data-motion-story-item
                                class="relative overflow-hidden p-5 sm:p-6 rounded-[22px] bg-white border border-[#E5DEC9] shadow-[0_14px_34px_-20px_rgba(15,30,46,0.12)]">
                        <span aria-hidden="true" class="pointer-events-none select-none absolute -top-2 right-5 font-serif text-[72px] leading-none text-[#C99A49]/15">
                            &ldquo;
                        </span>
                        <div class="relative border-l-[3px] border-[#C99A49] pl-4 sm:pl-5">
                            <p class="font-serif italic text-[17px] sm:text-[18.5px] text-[#0F1E2E] leading-[1.6]">
                                &ldquo;Setiap berlian KIRA ditempa untuk memantulkan berkas cahaya murni (Kirana) dengan kejujuran kualitas sertifikasi GIA.&rdquo;
                            </p>
                            <footer class="mt-3 flex items-center gap-2 font-sans font-bold text-[10.5px] tracking-[0.09em] text-[#9E7329] uppercase">
                                <span class="w-4 h-[1.5px] bg-[#C99A49]"></span>
                                <span>Filosofi KIRA Maison de Diamants</span>
                            </footer>
                        </div>
                    </blockquote>

                    <!-- Interactive Brand Personality Pills (Motion.dev Spring Physics) -->
                    <div data-motion-story-item class="pt-1">
                        <p class="font-sans font-bold text-[10px] tracking-[0.09em] text-[#5C6877] uppercase mb-2.5">
                            KARAKTER MAISON
                        </p>
                        <div class="flex flex-wrap items-center gap-2 sm:gap-2.5">
                            @foreach (['Mewah', 'Murni', 'Anggun', 'Presisi', 'Abadi'] as $trait)
                                <span class="brand-trait-pill inline-flex items-center gap-1.5 px-3.5 sm:px-4 py-1.5 rounded-full bg-white border border-[#D8CEBE] hover:border-[#C99A49] font-sans font-bold text-[12px] text-[#0F1E2E] shadow-2xs select-none cursor-default">
                                    <span class="text-[#C99A49]">✦</span>
                                    <span>{{ $trait }}</span>
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 2.2: VISION & MISSION (Figma Node 11:434)                       -->
    <!-- ======================================================================= -->
    <section class="pb-14 lg:pb-20" data-about-reveal-group>
        <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Our Vision Card (11:435) -->
                <div class="bento-card p-7 sm:p-8" data-about-reveal-item>
                    <span class="inline-block px-3.5 py-1 rounded-full bg-[#EFE9DC] border border-[#C99A49]/50 font-sans font-bold text-[10.5px] tracking-wider text-[#9E7329] uppercase">
                        OUR VISION
                    </span>
                    <h3 class="mt-4 font-serif font-bold text-[24px] sm:text-[26px] text-[#0F1E2E]">
                        Visi Rumah Perhiasan KIRA
                    </h3>
                    <p class="mt-3 font-sans text-[14.5px] leading-[1.7] text-[#5C6877]">
                        Menjadi rumah perhiasan berlian modern (<em>Haute Joaillerie</em>) terkemuka di Asia Tenggara yang menjadi tolok ukur kemurnian optik, transparansi sertifikasi GIA D-Color, dan arsitektur perhiasan warisan lintas generasi.
                    </p>
                </div>

                <!-- Our Mission Card (11:443) -->
                <div class="bento-card p-7 sm:p-8" data-about-reveal-item>
                    <span class="inline-block px-3.5 py-1 rounded-full bg-[#0F1E2E] border border-[#C99A49]/60 font-sans font-bold text-[10.5px] tracking-wider text-[#E6C587] uppercase">
                        OUR MISSION
                    </span>
                    <h3 class="mt-4 font-serif font-bold text-[24px] sm:text-[26px] text-[#0F1E2E]">
                        Misi Kualitas &amp; Etika Berlian
                    </h3>
                    <p class="mt-3 font-sans text-[14.5px] leading-[1.7] text-[#5C6877]">
                        Menyeleksi kurang dari 1% berlian alami dunia yang memenuhi standar Triple Excellent GIA dan Kimberley Process, merangkainya dengan 18K Champagne Gold &amp; Platinum Pt950, serta menghadirkan pengalaman konsultasi privat berkelas dunia.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 2.3: 4 NILAI UTAMA BRAND / CORE VALUES (Figma Node 11:451)      -->
    <!-- ======================================================================= -->
    <section class="py-14 lg:py-20 bg-white/75 border-y border-[#E5DEC9]" data-about-reveal-group>
        <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px]">
            <div class="text-center max-w-[680px] mx-auto" data-about-reveal-item>
                <p class="font-sans font-bold text-[11px] tracking-[0.08em] text-[#9E7329] uppercase">
                    02 • FONDASI MAISON DE DIAMANTS
                </p>
                <h2 class="mt-1.5 font-serif font-bold text-[30px] sm:text-[38px] text-[#0F1E2E]">
                    4 Nilai Utama Brand (Core Values)
                </h2>
                <p class="mt-2 font-sans text-[14.5px] text-[#5C6877]">
                    Empat pilar utama yang menjaga konsistensi kualitas setiap karya perhiasan KIRA.
                </p>
            </div>

            <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $coreValues = [
                        [
                            'num' => '01',
                            'title' => 'Purity (Kemurnian)',
                            'desc' => 'Hanya menggunakan berlian alami GIA Color D–F dan Clarity IF–VS1 dengan inskripsi laser resmi pada setiap sabuk berlian.',
                        ],
                        [
                            'num' => '02',
                            'title' => 'Craftsmanship',
                            'desc' => 'Ditempa secara presisi oleh master goldsmith dengan simetri 58 faset dan dudukan kelopak teratai 18K Champagne Gold.',
                        ],
                        [
                            'num' => '03',
                            'title' => 'Ethical Origin',
                            'desc' => '100% berlian bebas konflik (Conflict-Free) sesuai protokol Kimberley Process dengan jejak rantai pasok yang transparan.',
                        ],
                        [
                            'num' => '04',
                            'title' => 'Timeless Elegance',
                            'desc' => 'Proporsi desain klasik-modern yang melampaui tren musiman, dirancang sebagai pusaka cinta abadi lintas generasi.',
                        ],
                    ];
                @endphp

                @foreach ($coreValues as $val)
                    <div class="bento-card p-7 flex flex-col justify-between" data-about-reveal-item>
                        <div>
                            <div class="w-[52px] h-[52px] rounded-2xl bg-[#0F1E2E] border border-[#C99A49]/60 flex items-center justify-center font-serif font-bold text-[18px] text-[#E6C587]">
                                {{ $val['num'] }}
                            </div>
                            <h3 class="mt-5 font-serif font-bold text-[22px] text-[#0F1E2E]">
                                {{ $val['title'] }}
                            </h3>
                            <p class="mt-3 font-sans text-[13.5px] leading-[1.68] text-[#5C6877]">
                                {{ $val['desc'] }}
                            </p>
                        </div>
                        <div class="mt-5 pt-4 border-t border-[#EFE9DC] flex items-center justify-between text-[11px] font-bold text-[#9E7329]">
                            <span>KIRA STANDARD</span>
                            <span>✦</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 2.4: ATELIER CRAFTSMANSHIP CTA BANNER (Figma Node 11:490)       -->
    <!-- ======================================================================= -->
    <section class="py-14 lg:py-20" data-about-reveal-group>
        <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px]">
            <div class="rounded-[24px] bg-white border border-[#C99A49]/60 p-7 lg:p-9 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6 shadow-sm" data-about-reveal-item>
                <div class="max-w-[780px]">
                    <p class="font-sans font-bold text-[10.5px] tracking-wider text-[#9E7329] uppercase">
                        03 • ATELIER CRAFTSMANSHIP
                    </p>
                    <h3 class="mt-1.5 font-serif font-bold text-[24px] sm:text-[26px] text-[#0F1E2E]">
                        Proses Kurasi Atelier KIRA — Dari Seleksi Berlian GIA hingga Penyematan 18K
                    </h3>
                    <p class="mt-2 font-sans text-[14px] text-[#5C6877] leading-relaxed">
                        Setiap permata melewati 5 tahap seleksi optik dan pemolesan tangan selama 40 jam di atelier KIRA sebelum layak disematkan pada koleksi kami.
                    </p>
                </div>
                <div class="shrink-0">
                    <a href="{{ route('products') }}"
                       class="inline-flex items-center justify-center h-[54px] px-8 rounded-full bg-[#0F1E2E] text-white font-sans font-bold text-[13.5px] hover:bg-[#193048] transition">
                        Lihat Koleksi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.kira')

@section('title', 'Katalog Koleksi Berlian & Spesifikasi GIA | KIRA — Maison de Diamants')

@section('content')
    <!-- ======================================================================= -->
    <!-- PAGE 03 HEADER & FILTER BAR (Figma Node 11:556)                         -->
    <!-- ======================================================================= -->
    <section class="bg-white/75 border-b border-[#E5DEC9] pt-10 pb-8">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px]">
            <p class="font-sans font-bold text-[11px] tracking-[0.1em] text-[#9E7329] uppercase">
                03 • HAUTE JOAILLERIE CATALOG &amp; 4C INSPECTOR
            </p>
            <h1 class="mt-1.5 font-serif font-bold text-[34px] sm:text-[42px] text-[#0F1E2E] leading-tight">
                Katalog Koleksi Berlian &amp; Spesifikasi GIA
            </h1>
            <p class="mt-2 font-sans text-[14.5px] text-[#5C6877] max-w-[720px]">
                Pilih salah satu perhiasan di bawah untuk menginspeksi parameter 4C GIA (Carat, Color, Clarity, Cut), nomor seri inskripsi laser, dan menjadwalkan sesi Private Viewing.
            </p>

            <!-- Filter & Sort Bar (11:560 - 11:570) -->
            <div class="mt-7 p-2.5 rounded-[20px] bg-[#FAF8F3] border border-[#E5DEC9] flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
                <!-- Category Filter Pills -->
                <div class="flex flex-wrap items-center gap-1.5">
                    @php
                        $categories = [
                            'all' => 'Semua Koleksi (' . count($products) . ')',
                            'rings' => 'Solitaire Rings',
                            'pendants' => 'Lotus Pendants',
                            'earrings' => 'Haute Earrings',
                        ];
                    @endphp
                    @foreach ($categories as $catKey => $catLabel)
                        <button type="button"
                                data-catalog-filter="{{ $catKey }}"
                                class="catalog-filter-btn px-4 py-2 rounded-full font-sans font-bold text-[12px] transition-all cursor-pointer {{ $selectedCategory === $catKey ? 'bg-[#0F1E2E] text-white shadow-2xs' : 'bg-white text-[#243B53] border border-[#E5DEC9] hover:border-[#C99A49]' }}">
                            {{ $catLabel }}
                        </button>
                    @endforeach
                </div>

                <!-- Sort Dropdown -->
                <div class="flex items-center gap-2.5 px-2">
                    <label for="catalog-sort" class="font-sans font-bold text-[11.5px] text-[#5C6877] whitespace-nowrap">
                        Urutkan:
                    </label>
                    <select id="catalog-sort"
                            class="px-4 py-2 rounded-full bg-white border border-[#D8CEBE] font-sans font-bold text-[12px] text-[#0F1E2E] focus:outline-none focus:border-[#C99A49] cursor-pointer">
                        <option value="featured">Unggulan KIRA</option>
                        <option value="price-asc">Harga: Terendah ke Tertinggi</option>
                        <option value="price-desc">Harga: Tertinggi ke Terendah</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 3.2: 6-ITEM PRODUCT CATALOG GRID (Figma Node 11:571)            -->
    <!-- ======================================================================= -->
    <section class="py-12">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px]">
            <div id="catalog-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($products as $index => $product)
                    <article data-id="{{ $product['id'] }}"
                             data-category="{{ $product['category'] }}"
                             data-price="{{ $product['price'] }}"
                             data-order="{{ $index }}"
                             class="catalog-card bento-card p-5 flex flex-col justify-between transition-all duration-300">
                        <div>
                            <!-- Product Image -->
                            <div class="relative w-full h-[226px] rounded-[18px] overflow-hidden bg-[#122030]">
                                <img src="{{ $product['image'] }}"
                                     alt="{{ $product['name'] }}"
                                     width="336"
                                     height="226"
                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">

                                <!-- Badge -->
                                <div class="absolute top-3.5 left-3.5 px-3.5 py-1 rounded-full bg-[#F7F4EE]/95 border border-[#E5DEC9] text-[#0F1E2E]">
                                    <span class="font-sans font-bold text-[9.5px] tracking-wider uppercase">
                                        {{ $product['badge'] }}
                                    </span>
                                </div>
                            </div>

                            <!-- Metal Swatches -->
                            <div class="mt-4 flex items-center justify-between px-1">
                                <div class="flex items-center gap-2">
                                    @foreach ($product['metals'] as $mIdx => $hex)
                                        <span class="w-3.5 h-3.5 rounded-full inline-block {{ $mIdx === 0 ? 'ring-2 ring-[#0F1E2E] ring-offset-1' : 'border border-[#D8CEBE]' }}"
                                              style="background-color: {{ $hex }};"></span>
                                    @endforeach
                                </div>
                                <span class="font-sans font-bold text-[11px] text-[#5C6877]">
                                    GIA #{{ $product['gia_report'] }}
                                </span>
                            </div>

                            <!-- Title & Price -->
                            <div class="mt-3 px-1">
                                <p class="font-sans font-bold text-[10.5px] tracking-[0.06em] text-[#9E7329] uppercase">
                                    {{ $product['eyebrow'] }}
                                </p>
                                <h2 class="mt-1 font-serif font-bold text-[22px] text-[#0F1E2E] leading-snug">
                                    {{ $product['name'] }}
                                </h2>
                                <div class="mt-2.5 flex items-center justify-between">
                                    <span class="font-sans font-bold text-[15px] text-[#0F1E2E]">
                                        {{ $product['price_formatted'] }}
                                    </span>
                                    <span class="font-sans font-bold text-[12px] text-[#5C6877]">
                                        {{ $product['short_spec'] }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Button: Select & Inspect 4C -->
                        <div class="mt-5">
                            <button type="button"
                                    data-select-product="{{ $product['id'] }}"
                                    class="select-product-btn w-full h-[44px] rounded-full font-sans font-bold text-[12.5px] flex items-center justify-center transition cursor-pointer bg-[#FAF8F3] border border-[#D8CEBE] text-[#0F1E2E] hover:bg-[#EFE9DC] hover:border-[#C99A49]">
                                <span class="btn-label">Pilih &amp; Cek Spesifikasi 4C</span>
                            </button>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 3.3 & 3.4: DETAIL SPESIFIKASI 4C & SERTIFIKAT GIA (Node 11:656) -->
    <!-- ======================================================================= -->
    <section id="gia-specs" class="pb-16 lg:pb-24 scroll-mt-24">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px]">
            <div class="bg-white rounded-[28px] border-2 border-[#C99A49]/80 p-6 sm:p-9 lg:p-10 shadow-xl">

                <!-- Top Section Pill (11:658 - 11:659) -->
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#0F1E2E] border border-[#C99A49]/60 mb-6">
                    <span class="w-2 h-2 rounded-full bg-[#C99A49]"></span>
                    <span class="font-sans font-bold text-[10.5px] tracking-[0.08em] text-[#E6C587] uppercase">
                        SECTION 3.3 • DETAIL PRODUK 3D &amp; SPESIFIKASI 4C
                    </span>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10">

                    <!-- Left Column: Interactive 3D Multi-Angle Viewer & 3 Product Angle Thumbnails (5 cols) -->
                    <div class="lg:col-span-5">
                        <!-- Main 3D Interactive Multi-Angle Stage (4:3) -->
                        <div id="detail-3d-stage"
                             class="relative w-full h-[320px] sm:h-[380px] rounded-[22px] overflow-hidden border border-[#E5DEC9] bg-[#122030] cursor-grab active:cursor-grabbing select-none touch-pan-y"
                             style="perspective: 1100px;">
                            <img id="detail-main-image"
                                 src="{{ $selectedProduct['angles'][0]['src'] }}"
                                 alt="{{ $selectedProduct['name'] }} — {{ $selectedProduct['angles'][0]['label'] }}"
                                 draggable="false"
                                 class="w-full h-full object-cover transition-all duration-500 ease-out will-change-transform">

                            <!-- Floating HUD Chip: 4C Summary -->
                            <div class="apple-hud-chip pointer-events-none absolute top-4 left-4 h-[32px] pl-2 pr-3.5 rounded-full border border-[#C99A49]/50 flex items-center gap-2">
                                <span class="px-2 py-0.5 rounded-full bg-[#C99A49] text-[#0F1E2E] font-sans font-bold text-[9px]">4C</span>
                                <span id="detail-hud-chip" class="font-sans font-bold text-[11px] text-[#F7F4EE]">
                                    {{ $selectedProduct['color'] }} • {{ $selectedProduct['clarity'] }} • {{ $selectedProduct['carat'] }}
                                </span>
                            </div>

                            <!-- Active Angle 3D HUD Pill -->
                            <div class="apple-hud-chip pointer-events-none absolute bottom-4 left-4 right-4 px-3.5 py-2 rounded-full border border-white/15 flex items-center justify-between gap-2 text-[10.5px] font-bold">
                                <span id="detail-angle-label" class="text-[#E6C587]">
                                    3D Detail • {{ $selectedProduct['angles'][0]['label'] }} ({{ $selectedProduct['angles'][0]['degree'] }})
                                </span>
                                <span class="text-[#F7F4EE]/80 hidden sm:inline">
                                    Geser untuk Putar Sudut
                                </span>
                            </div>
                        </div>

                        <!-- 3D Angle Rotation Scrubber Pills -->
                        <div class="mt-3.5 flex items-center justify-between gap-2 p-1.5 rounded-full bg-[#FAF8F3] border border-[#E5DEC9]">
                            @foreach ($selectedProduct['angles'] as $aIdx => $angle)
                                <button type="button"
                                        data-angle-pill="{{ $aIdx }}"
                                        class="detail-angle-pill flex-1 py-1.5 px-2.5 rounded-full font-sans font-bold text-[10.5px] tracking-wide transition cursor-pointer {{ $aIdx === 0 ? 'bg-[#0F1E2E] text-[#E6C587] shadow-2xs' : 'text-[#5C6877] hover:text-[#0F1E2E]' }}">
                                    <span class="angle-pill-text">{{ $angle['short'] }}</span>
                                </button>
                            @endforeach
                        </div>

                        <!-- 3 Angle Thumbnails Exclusively for the Selected Product -->
                        <div class="mt-3.5 grid grid-cols-3 gap-3.5">
                            @foreach ($selectedProduct['angles'] as $aIdx => $angle)
                                <button type="button"
                                        data-thumb-index="{{ $aIdx }}"
                                        class="detail-thumb-btn relative h-[96px] rounded-[16px] overflow-hidden bg-[#122030] cursor-pointer group transition-all {{ $aIdx === 0 ? 'border-2 border-[#C99A49] shadow-sm' : 'border border-[#E5DEC9] hover:border-[#C99A49]' }}">
                                    <img id="detail-thumb-{{ $aIdx }}"
                                         src="{{ $angle['src'] }}"
                                         alt="{{ $selectedProduct['name'] }} — {{ $angle['label'] }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    <span id="detail-thumb-label-{{ $aIdx }}"
                                          class="absolute bottom-1.5 inset-x-1.5 py-0.5 rounded-md bg-[#0F1E2E]/85 text-[9px] font-bold text-center {{ $aIdx === 0 ? 'text-[#E6C587]' : 'text-white' }}">
                                        {{ $angle['short'] }}
                                    </span>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Right Column: 4C Specification Grid & Booking CTAs (7 cols) -->
                    <div class="lg:col-span-7 flex flex-col justify-between">
                        <div>
                            <!-- Product Title & Price Header -->
                            <div class="flex flex-wrap items-center justify-between gap-2">
                                <p id="detail-eyebrow" class="font-sans font-bold text-[11px] tracking-[0.08em] text-[#9E7329] uppercase">
                                    {{ $selectedProduct['eyebrow'] }}
                                </p>
                                <span id="detail-metal-spec" class="font-sans font-bold text-[11px] text-[#5C6877] bg-[#FAF8F3] px-3 py-1 rounded-full border border-[#E5DEC9]">
                                    {{ $selectedProduct['metal_spec'] }}
                                </span>
                            </div>

                            <h2 id="detail-title" class="mt-1.5 font-serif font-bold text-[30px] sm:text-[36px] text-[#0F1E2E] leading-tight">
                                {{ $selectedProduct['name'] }} — {{ $selectedProduct['carat'] }}
                            </h2>

                            <p class="mt-2 font-sans font-bold text-[18px] text-[#9E7329]">
                                <span id="detail-price">{{ $selectedProduct['price_formatted'] }}</span>
                                <span class="text-[#5C6877] font-normal text-[14px] mx-1.5">•</span>
                                <span id="detail-short-spec" class="text-[#0F1E2E] text-[15px]">{{ $selectedProduct['short_spec'] }}</span>
                            </p>

                            <p id="detail-description" class="mt-4 font-sans text-[14.5px] leading-[1.68] text-[#5C6877]">
                                {{ $selectedProduct['description'] }}
                            </p>

                            <!-- 4C Diamond Specification Cards (11:690 - 11:702) -->
                            <div class="mt-7">
                                <h3 class="font-sans font-bold text-[11.5px] tracking-[0.08em] text-[#0F1E2E] uppercase mb-3">
                                    SPESIFIKASI BERLIAN 4C (GIA STANDARD):
                                </h3>
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3.5">
                                    <!-- Carat -->
                                    <div class="p-4 rounded-[18px] bg-[#FAF8F3] border border-[#E5DEC9] text-center">
                                        <p class="font-sans font-bold text-[10px] tracking-wider text-[#9E7329] uppercase">CARAT WEIGHT</p>
                                        <p id="detail-carat" class="mt-1.5 font-serif font-bold text-[21px] text-[#0F1E2E]">{{ $selectedProduct['carat'] }}</p>
                                    </div>
                                    <!-- Color -->
                                    <div class="p-4 rounded-[18px] bg-[#FAF8F3] border border-[#E5DEC9] text-center">
                                        <p class="font-sans font-bold text-[10px] tracking-wider text-[#9E7329] uppercase">COLOR GRADE</p>
                                        <p id="detail-color" class="mt-1.5 font-serif font-bold text-[20px] text-[#0F1E2E]">{{ $selectedProduct['color'] }}</p>
                                    </div>
                                    <!-- Clarity -->
                                    <div class="p-4 rounded-[18px] bg-[#FAF8F3] border border-[#E5DEC9] text-center">
                                        <p class="font-sans font-bold text-[10px] tracking-wider text-[#9E7329] uppercase">CLARITY GRADE</p>
                                        <p id="detail-clarity" class="mt-1.5 font-serif font-bold text-[21px] text-[#0F1E2E]">{{ $selectedProduct['clarity'] }}</p>
                                    </div>
                                    <!-- Cut -->
                                    <div class="p-4 rounded-[18px] bg-[#FAF8F3] border border-[#E5DEC9] text-center">
                                        <p class="font-sans font-bold text-[10px] tracking-wider text-[#9E7329] uppercase">CUT GRADE</p>
                                        <p id="detail-cut" class="mt-1.5 font-serif font-bold text-[21px] text-[#0F1E2E]">{{ $selectedProduct['cut'] }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Optical Proportion Highlights (Crown, Pavilion, Refractive Fire) -->
                            <div class="mt-5 grid grid-cols-3 gap-3">
                                <div class="px-4 py-3 rounded-[16px] bg-white border border-[#E5DEC9] text-center">
                                    <p class="font-sans font-bold text-[9.5px] tracking-wider text-[#5C6877] uppercase">CROWN ANGLE</p>
                                    <p id="detail-crown" class="mt-0.5 font-serif font-bold text-[16px] text-[#0F1E2E]">{{ $selectedProduct['crown_angle'] }}</p>
                                </div>
                                <div class="px-4 py-3 rounded-[16px] bg-white border border-[#E5DEC9] text-center">
                                    <p class="font-sans font-bold text-[9.5px] tracking-wider text-[#5C6877] uppercase">PAVILION ANGLE</p>
                                    <p id="detail-pavilion" class="mt-0.5 font-serif font-bold text-[16px] text-[#0F1E2E]">{{ $selectedProduct['pavilion_angle'] }}</p>
                                </div>
                                <div class="px-4 py-3 rounded-[16px] bg-white border border-[#E5DEC9] text-center">
                                    <p class="font-sans font-bold text-[9.5px] tracking-wider text-[#5C6877] uppercase">OPTICAL FIRE</p>
                                    <p id="detail-fire" class="mt-0.5 font-serif font-bold text-[15px] text-[#9E7329]">{{ $selectedProduct['refractive_index'] }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom CTAs: Book Private Viewing & Tanya Concierge (11:709 - 11:712) -->
                        <div class="mt-8 flex flex-col sm:flex-row items-stretch sm:items-center gap-3.5">
                            <a id="detail-book-cta"
                               href="{{ route('contact', ['collection' => $selectedProduct['name']]) }}"
                               class="flex-1 h-[56px] px-7 rounded-full bg-[#0F1E2E] text-white font-sans font-bold text-[14px] flex items-center justify-center hover:bg-[#193048] shadow-md transition">
                                Book Private Viewing untuk {{ $selectedProduct['cta_item_label'] ?? 'Koleksi Ini' }}
                            </a>
                            <a href="{{ route('contact') }}"
                               class="h-[56px] px-7 rounded-full bg-white border border-[#C99A49] text-[#0F1E2E] font-sans font-bold text-[14px] flex items-center justify-center hover:bg-[#EFE9DC] transition">
                                Tanya Concierge
                            </a>
                        </div>
                    </div>

                </div>

                <!-- Bottom Guarantee Footer Line (11:713 - 11:714) -->
                <div class="mt-8 pt-5 border-t border-[#E5DEC9] flex flex-wrap items-center justify-between gap-4 text-[12.5px] font-medium text-[#5C6877]">
                    <div class="flex flex-wrap items-center gap-x-6 gap-y-2">
                        <span><strong class="text-[#9E7329]">✓</strong> Gratis Penyesuaian Ukuran Jari (Ring Resizing)</span>
                        <span><strong class="text-[#9E7329]">✓</strong> Kotak Beludru &amp; Segel Resmi KIRA</span>
                        <span><strong class="text-[#9E7329]">✓</strong> Garansi Pembersihan Seumur Hidup</span>
                    </div>
                    <span class="font-bold text-[#0F1E2E]">KIRA Flagship • Plaza Indonesia</span>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const productsData = @json($products);
        const productMap = {};
        productsData.forEach(p => { productMap[p.id] = p; });

        let currentProduct = productMap[@json($selectedProduct['id'])] || productsData[0];
        let currentAngleIndex = 0;

        // Elements to update in Section 3.3
        const stage3d = document.getElementById('detail-3d-stage');
        const mainImg = document.getElementById('detail-main-image');
        const angleLabel = document.getElementById('detail-angle-label');
        const hudChip = document.getElementById('detail-hud-chip');
        const eyebrow = document.getElementById('detail-eyebrow');
        const metalSpec = document.getElementById('detail-metal-spec');
        const title = document.getElementById('detail-title');
        const price = document.getElementById('detail-price');
        const shortSpec = document.getElementById('detail-short-spec');
        const description = document.getElementById('detail-description');
        const carat = document.getElementById('detail-carat');
        const color = document.getElementById('detail-color');
        const clarity = document.getElementById('detail-clarity');
        const cut = document.getElementById('detail-cut');
        const crown = document.getElementById('detail-crown');
        const pavilion = document.getElementById('detail-pavilion');
        const fire = document.getElementById('detail-fire');
        const bookCta = document.getElementById('detail-book-cta');

        function setAngle(index, animateTilt = true) {
            const angles = currentProduct.angles || [];
            if (!angles.length) return;
            const safeIdx = ((index % angles.length) + angles.length) % angles.length;
            const direction = safeIdx > currentAngleIndex ? 1 : (safeIdx < currentAngleIndex ? -1 : 0);
            currentAngleIndex = safeIdx;

            const angle = angles[safeIdx];

            if (mainImg && angle) {
                if (animateTilt && direction !== 0) {
                    mainImg.style.opacity = '0.78';
                    mainImg.style.transform = `rotateY(${direction * 10}deg) scale(1.03)`;
                    setTimeout(() => {
                        mainImg.src = angle.src;
                        mainImg.alt = `${currentProduct.name} — ${angle.label}`;
                        mainImg.style.opacity = '1';
                        mainImg.style.transform = 'rotateY(0deg) scale(1)';
                    }, 120);
                } else {
                    mainImg.src = angle.src;
                    mainImg.alt = `${currentProduct.name} — ${angle.label}`;
                    mainImg.style.opacity = '1';
                    mainImg.style.transform = 'rotateY(0deg) scale(1)';
                }
            }

            if (angleLabel && angle) {
                angleLabel.textContent = `3D Detail • ${angle.label} (${angle.degree})`;
            }

            // Sync thumbnail active borders & badge colors
            document.querySelectorAll('.detail-thumb-btn').forEach(btn => {
                const idx = parseInt(btn.getAttribute('data-thumb-index'), 10);
                const labelEl = document.getElementById(`detail-thumb-label-${idx}`);
                if (idx === safeIdx) {
                    btn.classList.remove('border', 'border-[#E5DEC9]');
                    btn.classList.add('border-2', 'border-[#C99A49]', 'shadow-sm');
                    if (labelEl) {
                        labelEl.classList.remove('text-white');
                        labelEl.classList.add('text-[#E6C587]');
                    }
                } else {
                    btn.classList.remove('border-2', 'border-[#C99A49]', 'shadow-sm');
                    btn.classList.add('border', 'border-[#E5DEC9]');
                    if (labelEl) {
                        labelEl.classList.remove('text-[#E6C587]');
                        labelEl.classList.add('text-white');
                    }
                }
            });

            // Sync 3D angle scrubber pills
            document.querySelectorAll('.detail-angle-pill').forEach(pill => {
                const idx = parseInt(pill.getAttribute('data-angle-pill'), 10);
                if (idx === safeIdx) {
                    pill.className = 'detail-angle-pill flex-1 py-1.5 px-2.5 rounded-full font-sans font-bold text-[10.5px] tracking-wide transition cursor-pointer bg-[#0F1E2E] text-[#E6C587] shadow-2xs';
                } else {
                    pill.className = 'detail-angle-pill flex-1 py-1.5 px-2.5 rounded-full font-sans font-bold text-[10.5px] tracking-wide transition cursor-pointer text-[#5C6877] hover:text-[#0F1E2E]';
                }
            });
        }

        function selectProduct(productId, shouldScroll = true) {
            const p = productMap[productId];
            if (!p) return;
            currentProduct = p;

            // Update all 3 angle thumbnails strictly to this single selected product
            (p.angles || []).forEach((angle, idx) => {
                const thumbImg = document.getElementById(`detail-thumb-${idx}`);
                const thumbLabel = document.getElementById(`detail-thumb-label-${idx}`);
                const pillEl = document.querySelector(`[data-angle-pill="${idx}"] .angle-pill-text`);
                if (thumbImg) {
                    thumbImg.src = angle.src;
                    thumbImg.alt = `${p.name} — ${angle.label}`;
                }
                if (thumbLabel) thumbLabel.textContent = angle.short;
                if (pillEl) pillEl.textContent = angle.short;
            });

            // Reset to Front 0° angle for newly selected product
            setAngle(0, false);

            // Update Section 3.3 textual specs
            if (hudChip) hudChip.textContent = `${p.color} • ${p.clarity} • ${p.carat}`;
            if (eyebrow) eyebrow.textContent = p.eyebrow;
            if (metalSpec) metalSpec.textContent = p.metal_spec;
            if (title) title.textContent = `${p.name} — ${p.carat}`;
            if (price) price.textContent = p.price_formatted;
            if (shortSpec) shortSpec.textContent = p.short_spec;
            if (description) description.textContent = p.description;
            if (carat) carat.textContent = p.carat;
            if (color) color.textContent = p.color;
            if (clarity) clarity.textContent = p.clarity;
            if (cut) cut.textContent = p.cut;
            if (crown) crown.textContent = p.crown_angle;
            if (pavilion) pavilion.textContent = p.pavilion_angle;
            if (fire) fire.textContent = p.refractive_index;

            const contactUrl = `{{ route('contact') }}?collection=${encodeURIComponent(p.name)}`;
            if (bookCta) {
                bookCta.href = contactUrl;
                bookCta.textContent = `Book Private Viewing untuk ${p.cta_item_label || 'Koleksi Ini'}`;
            }

            if (shouldScroll) {
                document.getElementById('gia-specs')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        document.querySelectorAll('[data-select-product]').forEach(btn => {
            btn.addEventListener('click', () => {
                const pid = btn.getAttribute('data-select-product');
                selectProduct(pid, true);
            });
        });

        // Thumbnail click -> switch angle
        document.querySelectorAll('.detail-thumb-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const idx = parseInt(btn.getAttribute('data-thumb-index'), 10);
                setAngle(idx, true);
            });
        });

        // 3D Angle pill click -> switch angle
        document.querySelectorAll('.detail-angle-pill').forEach(pill => {
            pill.addEventListener('click', () => {
                const idx = parseInt(pill.getAttribute('data-angle-pill'), 10);
                setAngle(idx, true);
            });
        });

        // Interactive 3D Drag-to-Rotate on Main Stage
        if (stage3d && mainImg) {
            let isDragging = false;
            let startX = 0;

            stage3d.addEventListener('pointerdown', (e) => {
                isDragging = true;
                startX = e.clientX;
                stage3d.setPointerCapture(e.pointerId);
            });

            stage3d.addEventListener('pointermove', (e) => {
                if (!isDragging) return;
                const deltaX = e.clientX - startX;
                const clampedTilt = Math.max(-12, Math.min(12, deltaX / 6));
                mainImg.style.transform = `rotateY(${clampedTilt}deg) scale(1.02)`;

                if (Math.abs(deltaX) >= 55) {
                    const step = deltaX > 0 ? 1 : -1;
                    startX = e.clientX;
                    setAngle(currentAngleIndex + step, true);
                }
            });

            const endDrag = () => {
                if (!isDragging) return;
                isDragging = false;
                mainImg.style.transform = 'rotateY(0deg) scale(1)';
            };

            stage3d.addEventListener('pointerup', endDrag);
            stage3d.addEventListener('pointercancel', endDrag);
        }

        // Filter Category Buttons
        const filterBtns = document.querySelectorAll('[data-catalog-filter]');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const cat = btn.getAttribute('data-catalog-filter');
                filterBtns.forEach(b => {
                    b.className = 'catalog-filter-btn px-4 py-2 rounded-full font-sans font-bold text-[12px] transition-all cursor-pointer bg-white text-[#243B53] border border-[#E5DEC9] hover:border-[#C99A49]';
                });
                btn.className = 'catalog-filter-btn px-4 py-2 rounded-full font-sans font-bold text-[12px] transition-all cursor-pointer bg-[#0F1E2E] text-white shadow-2xs';

                document.querySelectorAll('.catalog-card').forEach(card => {
                    if (cat === 'all' || card.getAttribute('data-category') === cat) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });

        // Sort Select
        const sortSelect = document.getElementById('catalog-sort');
        const catalogGrid = document.getElementById('catalog-grid');
        if (sortSelect && catalogGrid) {
            sortSelect.addEventListener('change', () => {
                const mode = sortSelect.value;
                const cards = Array.from(catalogGrid.querySelectorAll('.catalog-card'));
                cards.sort((a, b) => {
                    const priceA = parseInt(a.getAttribute('data-price'), 10);
                    const priceB = parseInt(b.getAttribute('data-price'), 10);
                    const orderA = parseInt(a.getAttribute('data-order'), 10);
                    const orderB = parseInt(b.getAttribute('data-order'), 10);
                    if (mode === 'price-asc') return priceA - priceB;
                    if (mode === 'price-desc') return priceB - priceA;
                    return orderA - orderB;
                });
                cards.forEach(c => catalogGrid.appendChild(c));
            });
        }

        // Support client-side ?item= and ?category= query params (for static GitHub Pages)
        const urlParams = new URLSearchParams(window.location.search);
        const queryItem = urlParams.get('item');
        if (queryItem && productMap[queryItem]) {
            selectProduct(queryItem, false);
        }
        const queryCategory = urlParams.get('category');
        if (queryCategory) {
            const targetFilterBtn = document.querySelector(`[data-catalog-filter="${queryCategory}"]`);
            targetFilterBtn?.click();
        }
    });
</script>
@endpush

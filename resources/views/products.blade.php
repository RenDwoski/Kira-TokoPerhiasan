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
                        SECTION 3.3 • DETAIL SPESIFIKASI &amp; SERTIFIKAT GIA
                    </span>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10">

                    <!-- Left Column: Main Zoom View & 3 Thumbnails (5 cols, Node 11:660 - 11:690) -->
                    <div class="lg:col-span-5">
                        <!-- Main Ring Zoom View (4:3) -->
                        <div class="relative w-full h-[320px] sm:h-[380px] rounded-[22px] overflow-hidden border border-[#E5DEC9] bg-[#122030]">
                            <img id="detail-main-image"
                                 src="{{ $selectedProduct['image'] }}"
                                 alt="{{ $selectedProduct['name'] }}"
                                 class="w-full h-full object-cover transition-all duration-500">

                            <!-- Floating HUD Chip on Zoom View -->
                            <div class="apple-hud-chip absolute top-4 left-4 h-[32px] pl-2 pr-3.5 rounded-full border border-[#C99A49]/50 flex items-center gap-2">
                                <span class="px-2 py-0.5 rounded-full bg-[#C99A49] text-[#0F1E2E] font-sans font-bold text-[9px]">GIA</span>
                                <span id="detail-hud-chip" class="font-sans font-bold text-[11px] text-[#F7F4EE]">
                                    {{ $selectedProduct['color'] }} • {{ $selectedProduct['clarity'] }} • {{ $selectedProduct['carat'] }}
                                </span>
                            </div>

                            <div class="apple-hud-chip absolute bottom-4 right-4 px-3.5 py-1.5 rounded-full border border-white/15 text-[10.5px] font-bold text-[#E6C587]">
                                360° Facet &amp; Prong Inspection
                            </div>
                        </div>

                        <!-- 3 Thumbnails (THUMB 01, THUMB 02, GIA REPORT) -->
                        <div class="mt-4 grid grid-cols-3 gap-3.5">
                            <button type="button"
                                    data-thumb-index="0"
                                    class="detail-thumb-btn relative h-[96px] rounded-[16px] overflow-hidden border-2 border-[#C99A49] bg-[#122030] cursor-pointer group">
                                <img id="detail-thumb-0" src="{{ $selectedProduct['image'] }}" alt="Thumb 01" class="w-full h-full object-cover group-hover:scale-105 transition">
                                <span class="absolute bottom-1.5 inset-x-1.5 py-0.5 rounded-md bg-[#0F1E2E]/80 text-[9px] font-bold text-white text-center">
                                     UTAMA (1:1)
                                </span>
                            </button>

                            <button type="button"
                                    data-thumb-index="1"
                                    class="detail-thumb-btn relative h-[96px] rounded-[16px] overflow-hidden border border-[#E5DEC9] hover:border-[#C99A49] bg-[#122030] cursor-pointer group">
                                <img id="detail-thumb-1" src="/assets/kira/atelier-diamond-macro.png" alt="Thumb 02 Macro" class="w-full h-full object-cover group-hover:scale-105 transition">
                                <span class="absolute bottom-1.5 inset-x-1.5 py-0.5 rounded-md bg-[#0F1E2E]/80 text-[9px] font-bold text-[#E6C587] text-center">
                                    10x LOUPE
                                </span>
                            </button>

                            <button type="button"
                                    id="open-gia-modal-thumb"
                                    class="relative h-[96px] rounded-[16px] overflow-hidden border border-[#C99A49]/70 bg-[#0F1E2E] hover:bg-[#16293D] flex flex-col items-center justify-center p-2 cursor-pointer transition">
                                <span class="px-2.5 py-0.5 rounded-full bg-[#C99A49] text-[#0F1E2E] font-sans font-bold text-[10px]">GIA</span>
                                <span class="mt-1.5 font-sans font-bold text-[10px] text-[#F7F4EE]">GIA REPORT</span>
                                <span id="detail-thumb-report-num" class="text-[9px] text-[#E6C587]">#{{ $selectedProduct['gia_report'] }}</span>
                            </button>
                        </div>
                    </div>

                    <!-- Right Column: 4C Specification Grid & GIA Certificate Box (7 cols, Node 11:685 - 11:712) -->
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
                                <span id="detail-report-header" class="text-[#0F1E2E] text-[15px]">GIA Report #{{ $selectedProduct['gia_report'] }}</span>
                            </p>

                            <p id="detail-description" class="mt-4 font-sans text-[14.5px] leading-[1.68] text-[#5C6877]">
                                {{ $selectedProduct['description'] }}
                            </p>

                            <!-- 4C Diamond Specification Cards (11:690 - 11:702) -->
                            <div class="mt-6">
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

                            <!-- GIA Authenticity Certificate Included Box (11:703 - 11:708) -->
                            <div class="mt-6 p-5 rounded-[20px] bg-[#FAF8F3] border border-[#C99A49]/65 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                                <div class="w-[56px] h-[56px] rounded-2xl bg-[#0F1E2E] border border-[#C99A49] flex items-center justify-center shrink-0 font-serif font-bold text-[16px] text-[#E6C587]">
                                    GIA
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-serif font-bold text-[18px] text-[#0F1E2E]">
                                        GIA Authenticity Certificate Included
                                    </h4>
                                    <p id="detail-laser-inscription" class="mt-0.5 font-sans text-[12.5px] text-[#5C6877]">
                                        Nomor Inskripsi Laser: <strong class="text-[#0F1E2E]">GIA-{{ $selectedProduct['gia_report'] }}</strong> • Terverifikasi Berlian Alami
                                    </p>
                                    <button type="button"
                                            id="open-gia-modal-btn"
                                            class="mt-1.5 inline-flex items-center gap-1 font-sans font-bold text-[12.5px] text-[#9E7329] hover:text-[#0F1E2E] underline cursor-pointer">
                                        <span>Lihat &amp; Unduh Salinan Sertifikat GIA (Digital Preview)</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom CTAs: Book Private Viewing & Tanya Concierge (11:709 - 11:712) -->
                        <div class="mt-7 flex flex-col sm:flex-row items-stretch sm:items-center gap-3.5">
                            <a id="detail-book-cta"
                               href="{{ route('contact', ['collection' => $selectedProduct['name']]) }}"
                               class="flex-1 h-[56px] px-7 rounded-full bg-[#0F1E2E] text-white font-sans font-bold text-[14px] flex items-center justify-center hover:bg-[#193048] shadow-md transition">
                                Book Private Viewing untuk Cincin Ini
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

    <!-- ======================================================================= -->
    <!-- INTERACTIVE GIA CERTIFICATE PREVIEW MODAL                               -->
    <!-- ======================================================================= -->
    <div id="gia-certificate-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-[#0F1E2E]/75 backdrop-blur-md p-4">
        <div class="bg-[#F7F4EE] border-2 border-[#C99A49] rounded-[28px] max-w-[680px] w-full p-6 sm:p-8 shadow-2xl relative">
            <button type="button" id="close-gia-modal" class="absolute top-5 right-5 w-9 h-9 rounded-full bg-white border border-[#D8CEBE] flex items-center justify-center text-[#0F1E2E] font-bold hover:border-[#C99A49] cursor-pointer">
                ✕
            </button>

            <div class="flex items-center gap-3">
                <span class="px-3 py-1 rounded-full bg-[#0F1E2E] text-[#E6C587] font-sans font-bold text-[10px] tracking-wider uppercase">
                    GIA NATURAL DIAMOND DOSSIER®
                </span>
                <span id="modal-gia-number" class="font-sans font-bold text-[12px] text-[#9E7329]">
                    Report #{{ $selectedProduct['gia_report'] }}
                </span>
            </div>

            <h3 id="modal-gia-title" class="mt-3 font-serif font-bold text-[26px] text-[#0F1E2E]">
                {{ $selectedProduct['name'] }}
            </h3>
            <p class="font-sans text-[13px] text-[#5C6877]">
                Gemological Institute of America • Laser Inscription Registry Verified by KIRA Maison de Diamants
            </p>

            <div class="mt-5 p-5 rounded-[20px] bg-white border border-[#E5DEC9] space-y-3 text-[13px]">
                <div class="flex justify-between py-1.5 border-b border-[#EFE9DC]">
                    <span class="text-[#5C6877]">GIA Report Number</span>
                    <span id="modal-row-report" class="font-bold text-[#0F1E2E]">{{ $selectedProduct['gia_report'] }}</span>
                </div>
                <div class="flex justify-between py-1.5 border-b border-[#EFE9DC]">
                    <span class="text-[#5C6877]">Cutting Style &amp; Architecture</span>
                    <span class="font-bold text-[#0F1E2E]">58-Facet Round Brilliant / Lotus Crown</span>
                </div>
                <div class="flex justify-between py-1.5 border-b border-[#EFE9DC]">
                    <span class="text-[#5C6877]">Carat Weight</span>
                    <span id="modal-row-carat" class="font-bold text-[#0F1E2E]">{{ $selectedProduct['carat'] }}</span>
                </div>
                <div class="flex justify-between py-1.5 border-b border-[#EFE9DC]">
                    <span class="text-[#5C6877]">Color Grade</span>
                    <span id="modal-row-color" class="font-bold text-[#0F1E2E]">{{ $selectedProduct['color'] }}</span>
                </div>
                <div class="flex justify-between py-1.5 border-b border-[#EFE9DC]">
                    <span class="text-[#5C6877]">Clarity Grade</span>
                    <span id="modal-row-clarity" class="font-bold text-[#0F1E2E]">{{ $selectedProduct['clarity'] }}</span>
                </div>
                <div class="flex justify-between py-1.5 border-b border-[#EFE9DC]">
                    <span class="text-[#5C6877]">Cut / Polish / Symmetry</span>
                    <span id="modal-row-cut" class="font-bold text-[#9E7329]">{{ $selectedProduct['cut'] }} • Triple Excellent</span>
                </div>
                <div class="flex justify-between py-1.5">
                    <span class="text-[#5C6877]">Girdle Laser Inscription</span>
                    <span id="modal-row-laser" class="font-mono font-bold text-[#0F1E2E]">GIA {{ $selectedProduct['gia_report'] }} &bull; KIRA 18K</span>
                </div>
            </div>

            <div class="mt-6 flex flex-wrap items-center justify-end gap-3">
                <button type="button" onclick="window.print()" class="px-5 py-2.5 rounded-full bg-white border border-[#C99A49] text-[#0F1E2E] font-sans font-bold text-[12.5px] hover:bg-[#EFE9DC] cursor-pointer">
                    Cetak / Simpan PDF Sertifikat
                </button>
                <a id="modal-book-btn"
                   href="{{ route('contact', ['collection' => $selectedProduct['name']]) }}"
                   class="px-6 py-2.5 rounded-full bg-[#0F1E2E] text-white font-sans font-bold text-[12.5px] hover:bg-[#193048]">
                    Verifikasi Langsung di Butik (VIP Booking)
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const productsData = @json($products);
        const productMap = {};
        productsData.forEach(p => { productMap[p.id] = p; });

        let currentProduct = productMap[@json($selectedProduct['id'])] || productsData[0];

        // Elements to update in Section 3.3
        const mainImg = document.getElementById('detail-main-image');
        const thumb0 = document.getElementById('detail-thumb-0');
        const thumb1 = document.getElementById('detail-thumb-1');
        const thumbReportNum = document.getElementById('detail-thumb-report-num');
        const hudChip = document.getElementById('detail-hud-chip');
        const eyebrow = document.getElementById('detail-eyebrow');
        const metalSpec = document.getElementById('detail-metal-spec');
        const title = document.getElementById('detail-title');
        const price = document.getElementById('detail-price');
        const reportHeader = document.getElementById('detail-report-header');
        const description = document.getElementById('detail-description');
        const carat = document.getElementById('detail-carat');
        const color = document.getElementById('detail-color');
        const clarity = document.getElementById('detail-clarity');
        const cut = document.getElementById('detail-cut');
        const laserInscription = document.getElementById('detail-laser-inscription');
        const bookCta = document.getElementById('detail-book-cta');

        // Modal Elements
        const giaModal = document.getElementById('gia-certificate-modal');
        const modalGiaNumber = document.getElementById('modal-gia-number');
        const modalGiaTitle = document.getElementById('modal-gia-title');
        const modalRowReport = document.getElementById('modal-row-report');
        const modalRowCarat = document.getElementById('modal-row-carat');
        const modalRowColor = document.getElementById('modal-row-color');
        const modalRowClarity = document.getElementById('modal-row-clarity');
        const modalRowCut = document.getElementById('modal-row-cut');
        const modalRowLaser = document.getElementById('modal-row-laser');
        const modalBookBtn = document.getElementById('modal-book-btn');

        function selectProduct(productId, shouldScroll = true) {
            const p = productMap[productId];
            if (!p) return;
            currentProduct = p;

            // Update Section 3.3 DOM
            if (mainImg) mainImg.src = p.image;
            if (thumb0) thumb0.src = p.image;
            if (thumb1) thumb1.src = (p.secondary_images && p.secondary_images[1]) ? p.secondary_images[1] : '/assets/kira/atelier-diamond-macro.png';
            if (thumbReportNum) thumbReportNum.textContent = '#' + p.gia_report;
            if (hudChip) hudChip.textContent = `${p.color} • ${p.clarity} • ${p.carat}`;
            if (eyebrow) eyebrow.textContent = p.eyebrow;
            if (metalSpec) metalSpec.textContent = p.metal_spec;
            if (title) title.textContent = `${p.name} — ${p.carat}`;
            if (price) price.textContent = p.price_formatted;
            if (reportHeader) reportHeader.textContent = `GIA Report #${p.gia_report}`;
            if (description) description.textContent = p.description;
            if (carat) carat.textContent = p.carat;
            if (color) color.textContent = p.color;
            if (clarity) clarity.textContent = p.clarity;
            if (cut) cut.textContent = p.cut;
            if (laserInscription) {
                laserInscription.innerHTML = `Nomor Inskripsi Laser: <strong class="text-[#0F1E2E]">GIA-${p.gia_report}</strong> • Terverifikasi Berlian Alami`;
            }
            const contactUrl = `{{ route('contact') }}?collection=${encodeURIComponent(p.name)}`;
            if (bookCta) bookCta.href = contactUrl;

            // Update Modal
            if (modalGiaNumber) modalGiaNumber.textContent = `Report #${p.gia_report}`;
            if (modalGiaTitle) modalGiaTitle.textContent = p.name;
            if (modalRowReport) modalRowReport.textContent = p.gia_report;
            if (modalRowCarat) modalRowCarat.textContent = p.carat;
            if (modalRowColor) modalRowColor.textContent = p.color;
            if (modalRowClarity) modalRowClarity.textContent = p.clarity;
            if (modalRowCut) modalRowCut.textContent = `${p.cut} • Triple Excellent`;
            if (modalRowLaser) modalRowLaser.textContent = `GIA ${p.gia_report} • KIRA 18K`;
            if (modalBookBtn) modalBookBtn.href = contactUrl;

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

        // Thumbnails switcher
        document.querySelectorAll('.detail-thumb-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const idx = parseInt(btn.getAttribute('data-thumb-index'), 10);
                document.querySelectorAll('.detail-thumb-btn').forEach(b => {
                    b.classList.remove('border-2', 'border-[#C99A49]');
                    b.classList.add('border', 'border-[#E5DEC9]');
                });
                btn.classList.remove('border', 'border-[#E5DEC9]');
                btn.classList.add('border-2', 'border-[#C99A49]');

                if (idx === 0 && mainImg) {
                    mainImg.src = currentProduct.image;
                } else if (idx === 1 && mainImg) {
                    mainImg.src = (currentProduct.secondary_images && currentProduct.secondary_images[1])
                        ? currentProduct.secondary_images[1]
                        : '/assets/kira/atelier-diamond-macro.png';
                }
            });
        });

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

        // GIA Modal open/close
        function openGiaModal() {
            if (giaModal) {
                giaModal.classList.remove('hidden');
                giaModal.classList.add('flex');
            }
        }
        function closeGiaModal() {
            if (giaModal) {
                giaModal.classList.add('hidden');
                giaModal.classList.remove('flex');
            }
        }
        document.getElementById('open-gia-modal-btn')?.addEventListener('click', openGiaModal);
        document.getElementById('open-gia-modal-thumb')?.addEventListener('click', openGiaModal);
        document.getElementById('close-gia-modal')?.addEventListener('click', closeGiaModal);
        giaModal?.addEventListener('click', (e) => {
            if (e.target === giaModal) closeGiaModal();
        });

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

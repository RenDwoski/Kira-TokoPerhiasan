@extends('layouts.kira')

@section('title', 'Editorial Lookbook & Haute Joaillerie Gallery | KIRA — Maison de Diamants')

@section('content')
    <!-- ======================================================================= -->
    <!-- PAGE 04 HEADER & FILTER BAR (Figma Node 11:774)                         -->
    <!-- ======================================================================= -->
    <section class="bg-white/75 border-b border-[#E5DEC9] pt-10 pb-8">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px]">
            <p class="font-sans font-bold text-[11px] tracking-[0.1em] text-[#9E7329] uppercase">
                04 • ASYMMETRICAL EDITORIAL MASONRY &amp; CLIENT STORIES
            </p>
            <h1 class="mt-1.5 font-serif font-bold text-[34px] sm:text-[42px] text-[#0F1E2E] leading-tight">
                Editorial Lookbook &amp; Haute Joaillerie Gallery
            </h1>
            <p class="mt-2 font-sans text-[14.5px] text-[#5C6877] max-w-[740px]">
                Eksplorasi visual pemakaian koleksi berlian KIRA, dokumentasi bias cahaya faset makro, serta pin produk interaktif menuju spesifikasi GIA 4C.
            </p>

            <!-- Lookbook Filter Tabs (11:778 - 11:785) -->
            <div class="mt-6 flex flex-wrap items-center gap-2">
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
    <section class="py-12">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px] space-y-6">

            <!-- Top Asymmetrical Bento Row (Portrait 3:4 Left + 2x2 Grid Right) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                <!-- Left Tall Portrait Card 01 with Interactive Hotspot Pin (5 cols, Node 11:787 - 11:797) -->
                <div data-lookbook-cat="bridal"
                     class="lookbook-item lg:col-span-5 relative h-[480px] lg:h-[540px] rounded-[26px] overflow-hidden border border-[#C99A49]/60 bg-[#122030] group shadow-lg">
                    <img src="/assets/kira/product-lotus-solitaire.png"
                         alt="Bridal Model Wearing Lotus Solitaire"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">

                    <div class="absolute inset-0 bg-gradient-to-t from-[#0F1E2E]/90 via-[#0F1E2E]/20 to-transparent"></div>

                    <div class="absolute top-4 left-4 px-3.5 py-1 rounded-full bg-[#0F1E2E]/85 border border-[#C99A49]/60">
                        <span class="font-sans font-bold text-[10px] tracking-wider text-[#E6C587] uppercase">
                            LOOKBOOK PORTRAIT 01 (3:4) • BRIDAL CAMPAIGN
                        </span>
                    </div>

                    <!-- Interactive Pulsing Hotspot Pin on Ring -->
                    <a href="{{ route('products', ['item' => 'lotus-crown-solitaire']) }}#gia-specs"
                       class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[#C99A49] text-[#0F1E2E] flex items-center justify-center font-bold shadow-xl ring-4 ring-white/40 hover:scale-110 transition"
                       title="Klik untuk menuju Detail Produk: The Lotus Crown Solitaire">
                        ✦
                    </a>

                    <!-- Bottom Hotspot Pin Card (11:794 - 11:797) -->
                    <div class="absolute bottom-5 inset-x-5">
                        <a href="{{ route('products', ['item' => 'lotus-crown-solitaire']) }}#gia-specs"
                           class="block p-4 rounded-[20px] bg-[#0F1E2E]/90 backdrop-blur-md border border-[#C99A49]/70 hover:border-[#E6C587] transition group/pin">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center gap-3">
                                    <span class="w-6 h-6 rounded-full bg-[#C99A49] text-[#0F1E2E] font-bold text-[11px] flex items-center justify-center shrink-0">
                                        ✦
                                    </span>
                                    <div>
                                        <p class="font-serif font-bold text-[16px] text-white group-hover/pin:text-[#E6C587] transition">
                                            [Hotspot Pin] The Lotus Crown Solitaire (1.50 Ct)
                                        </p>
                                        <p class="font-sans text-[11.5px] text-[#DCE6F2]">
                                            Klik untuk menuju Detail Produk &amp; Sertifikat GIA (Page 03)
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

                <!-- Right 2x2 Square Grid (7 cols, Nodes 11:798 - 11:822) -->
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <!-- Square 02: Macro Facet Refraction (11:798) -->
                    <a href="{{ route('products', ['item' => 'atelier-emerald-solitaire']) }}#gia-specs"
                       data-lookbook-cat="macro"
                       class="lookbook-item relative h-[258px] rounded-[24px] overflow-hidden border border-[#E5DEC9] bg-[#122030] group block">
                        <img src="/assets/kira/atelier-diamond-macro.png"
                             alt="Macro Facet Refraction"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0F1E2E]/85 via-transparent to-transparent"></div>
                        <div class="absolute top-3.5 left-3.5 px-3 py-1 rounded-full bg-[#0F1E2E]/85 border border-white/20 text-[9.5px] font-bold text-[#E6C587]">
                            LOOKBOOK 02 • MACRO CUT
                        </div>
                        <div class="absolute bottom-4 inset-x-4">
                            <h3 class="font-serif font-bold text-[18px] text-white">Macro Facet Refraction</h3>
                            <p class="font-sans text-[11.5px] text-[#DCE6F2]">Simetri 58 Faset • 2.417 nD Fire</p>
                        </div>
                    </a>

                    <!-- Square 03: Celestial Drop Campaign (11:805) -->
                    <a href="{{ route('products', ['item' => 'celestial-lotus-earrings']) }}#gia-specs"
                       data-lookbook-cat="bridal"
                       class="lookbook-item relative h-[258px] rounded-[24px] overflow-hidden border border-[#E5DEC9] bg-[#122030] group block">
                        <img src="/assets/kira/product-celestial-earrings.png"
                             alt="Celestial Drop Campaign"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0F1E2E]/85 via-transparent to-transparent"></div>
                        <div class="absolute top-3.5 left-3.5 px-3 py-1 rounded-full bg-[#F7F4EE]/95 border border-[#E5DEC9] text-[9.5px] font-bold text-[#0F1E2E]">
                            LOOKBOOK 03 • BRIDAL
                        </div>
                        <div class="absolute bottom-4 inset-x-4">
                            <h3 class="font-serif font-bold text-[18px] text-white">Celestial Drop Campaign</h3>
                            <p class="font-sans text-[11.5px] text-[#DCE6F2]">Celestial Lotus Earrings • GIA D-VS1</p>
                        </div>
                    </a>

                    <!-- Editorial Quote Block (11:812 - 11:815) -->
                    <div data-lookbook-cat="atelier"
                         class="lookbook-item h-[258px] rounded-[24px] bg-white border border-[#C99A49]/60 p-7 flex flex-col items-center justify-center text-center shadow-2xs">
                        <img src="/assets/kira/logo-lotus-crown.svg" alt="KIRA" width="32" height="35" class="mb-3">
                        <blockquote class="font-serif italic font-semibold text-[19px] text-[#0F1E2E] leading-snug">
                            &ldquo;Keseimbangan asimetris antara kemurnian faset dan keanggunan.&rdquo;
                        </blockquote>
                        <p class="mt-4 font-sans font-bold text-[10.5px] tracking-[0.12em] text-[#9E7329] uppercase">
                            KIRA EDITORIAL LOOKBOOK
                        </p>
                    </div>

                    <!-- Square 04: 18K Champagne Gold Setting (11:816) -->
                    <a href="{{ route('products', ['item' => 'lotus-halo-diamond-pendant']) }}#gia-specs"
                       data-lookbook-cat="atelier"
                       class="lookbook-item relative h-[258px] rounded-[24px] overflow-hidden border border-[#E5DEC9] bg-[#122030] group block">
                        <img src="/assets/kira/hero-jewelry.png"
                             alt="18K Champagne Gold Setting"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
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

            <!-- Second Row: 3 Landscape 16:10 Cards (Nodes 11:823, 11:830, 11:837) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Item 05 -->
                <a href="{{ route('products', ['item' => 'kirana-starlight-pendant']) }}#gia-specs"
                   data-lookbook-cat="macro"
                   class="lookbook-item relative h-[220px] rounded-[24px] overflow-hidden border border-[#E5DEC9] bg-[#122030] group block">
                    <img src="/assets/kira/product-kirana-pendant.png"
                         alt="High Jewelry Necklace Showcase"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
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
                   class="lookbook-item relative h-[220px] rounded-[24px] overflow-hidden border border-[#E5DEC9] bg-[#122030] group block">
                    <img src="/assets/kira/product-lotus-solitaire.png"
                         alt="Wedding Band Pairing Inspiration"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
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
                   class="lookbook-item relative h-[220px] rounded-[24px] overflow-hidden border border-[#E5DEC9] bg-[#122030] group block">
                    <img src="/assets/kira/hero-jewelry.png"
                         alt="VIP Salon Experience"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0F1E2E]/85 via-transparent to-transparent"></div>
                    <div class="absolute top-3.5 left-3.5 px-3 py-1 rounded-full bg-[#0F1E2E]/85 border border-[#C99A49]/60 text-[9.5px] font-bold text-[#E6C587]">
                        LOOKBOOK 07 (16:10)
                    </div>
                    <div class="absolute bottom-4 inset-x-4">
                        <h3 class="font-serif font-bold text-[18px] text-white">VIP Salon Experience</h3>
                        <p class="font-sans text-[11.5px] text-[#DCE6F2]">KIRA Plaza Indonesia Level 1 #108</p>
                    </div>
                </a>
            </div>

        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 4.3 & 4.4: ATELIER 360 SHOWCASE & CLIENT STORIES (Node 11:844)  -->
    <!-- ======================================================================= -->
    <section class="pb-16 lg:pb-24">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px] space-y-12">

            <!-- Interactive Atelier Craftsmanship 360° Optical Showcase Player (11:845 - 11:851) -->
            <div class="relative rounded-[28px] overflow-hidden border-2 border-[#C99A49]/75 bg-[#0F1E2E] h-[340px] sm:h-[380px] shadow-2xl">
                <img id="atelier-360-bg"
                     src="/assets/kira/atelier-diamond-macro.png"
                     alt="Atelier Craftsmanship 360 Showcase"
                     class="w-full h-full object-cover opacity-55 transition-transform duration-1000">

                <div class="absolute inset-0 bg-gradient-to-r from-[#0F1E2E]/90 via-[#0F1E2E]/60 to-[#0F1E2E]/90 flex flex-col items-center justify-center text-center p-6">
                    <div class="relative w-24 h-24 mb-4 flex items-center justify-center">
                        <img id="atelier-360-ring"
                             src="/assets/kira/facet-diagram-outer.svg"
                             alt=""
                             width="96"
                             height="96"
                             class="absolute inset-0 w-full h-full transition-transform duration-1000">
                        <button type="button"
                                id="toggle-360-btn"
                                class="relative z-10 w-16 h-16 rounded-full bg-[#C99A49] text-[#0F1E2E] font-bold text-[18px] flex items-center justify-center shadow-xl hover:bg-[#E6C587] hover:scale-105 transition cursor-pointer"
                                aria-label="Putar Simulasi Optik 360 Derajat">
                            ▶
                        </button>
                    </div>

                    <span class="px-4 py-1 rounded-full bg-white/10 border border-[#C99A49]/60 font-sans font-bold text-[10.5px] tracking-wider text-[#E6C587] uppercase">
                        ATELIER CRAFTSMANSHIP 360° OPTICAL INSPECTOR (16:9)
                    </span>
                    <h2 class="mt-2.5 font-serif font-bold text-[24px] sm:text-[30px] text-white max-w-[680px]">
                        Dokumentasi Pemotongan &amp; Kilau Berlian 360 Derajat
                    </h2>
                    <p id="atelier-360-status" class="mt-1.5 font-sans text-[13.5px] text-[#DCE6F2] max-w-[580px]">
                        Klik tombol putar di atas untuk mensimulasikan rotasi faset oktagonal 34.5° dan melihat bagaimana berlian GIA D-VVS1 membiaskan spektrum cahaya.
                    </p>
                </div>
            </div>

            <!-- Section 4.4: Client Stories (11:852 - 11:869) -->
            <div>
                <h2 class="font-serif font-bold text-[28px] sm:text-[34px] text-[#0F1E2E]">
                    Kisah Momen Berharga Klien KIRA (Client Stories)
                </h2>

                <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Testimonial 1 (11:853) -->
                    <div class="bento-card p-6 flex flex-col justify-between">
                        <div>
                            <p class="font-sans font-bold text-[13.5px] text-[#9E7329]">
                                ★★★★★ — Nadia &amp; Reza (Jakarta)
                            </p>
                            <p class="mt-3 font-sans text-[13.5px] leading-[1.68] text-[#5C6877]">
                                &ldquo;Pengalaman Private Viewing di butik KIRA Plaza Indonesia sangat berkesan. Gemologist menunjukkan langsung inskripsi laser GIA pada cincin tunangan kami dengan mikroskop 10x.&rdquo;
                            </p>
                        </div>
                        <p class="mt-4 pt-3 border-t border-[#EFE9DC] font-sans font-bold text-[12px] text-[#0F1E2E]">
                            Koleksi: The Lotus Crown Solitaire 1.50 Ct
                        </p>
                    </div>

                    <!-- Testimonial 2 (11:859) -->
                    <div class="bento-card p-6 flex flex-col justify-between">
                        <div>
                            <p class="font-sans font-bold text-[13.5px] text-[#9E7329]">
                                ★★★★★ — Clarissa W. (Surabaya)
                            </p>
                            <p class="mt-3 font-sans text-[13.5px] leading-[1.68] text-[#5C6877]">
                                &ldquo;Kilau 18K Champagne Gold KIRA memiliki rona hangat yang sangat elegan dan berbeda dari emas kuning biasa. Liontin Kirana Starlight menjadi pusaka keluarga kami.&rdquo;
                            </p>
                        </div>
                        <p class="mt-4 pt-3 border-t border-[#EFE9DC] font-sans font-bold text-[12px] text-[#0F1E2E]">
                            Koleksi: Kirana Starlight Pendant
                        </p>
                    </div>

                    <!-- CTA Card 3: Ingin Mencoba Langsung? (11:865) -->
                    <div class="rounded-[24px] bg-[#0F1E2E] border border-[#C99A49]/70 p-6 flex flex-col items-center justify-center text-center text-white shadow-lg">
                        <span class="px-3 py-1 rounded-full bg-white/10 text-[#E6C587] font-sans font-bold text-[10px] tracking-wider uppercase">
                            PRIVATE SALON
                        </span>
                        <h3 class="mt-3 font-serif font-bold text-[24px] text-white">
                            Ingin Mencoba Langsung?
                        </h3>
                        <p class="mt-1.5 font-sans text-[13px] text-[#DCE6F2]">
                            Jadwalkan sesi Private Viewing di butik kami bersama Gemologist GIA.
                        </p>
                        <a href="{{ route('contact') }}"
                           class="mt-5 w-full h-[46px] rounded-full bg-[#C99A49] text-[#0F1E2E] font-sans font-bold text-[13px] flex items-center justify-center hover:bg-[#E6C587] transition">
                            Book Private Viewing
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
        // Lookbook Category Filter
        const filterBtns = document.querySelectorAll('[data-lookbook-filter]');
        const items = document.querySelectorAll('.lookbook-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const cat = btn.getAttribute('data-lookbook-filter');
                filterBtns.forEach(b => {
                    b.className = 'lookbook-filter-btn px-5 py-2.5 rounded-full bg-white border border-[#D8CEBE] text-[#243B53] hover:border-[#C99A49] font-sans font-bold text-[12px] transition cursor-pointer';
                });
                btn.className = 'lookbook-filter-btn px-5 py-2.5 rounded-full bg-[#0F1E2E] text-white font-sans font-bold text-[12px] shadow-2xs transition cursor-pointer';

                items.forEach(item => {
                    if (cat === 'all' || item.getAttribute('data-lookbook-cat') === cat) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            });
        });

        // Interactive 360 Optical Showcase Simulator
        const toggleBtn = document.getElementById('toggle-360-btn');
        const ringSvg = document.getElementById('atelier-360-ring');
        const bgImg = document.getElementById('atelier-360-bg');
        const statusText = document.getElementById('atelier-360-status');
        let isPlaying = false;
        let angle = 0;
        let timer = null;

        if (toggleBtn) {
            toggleBtn.addEventListener('click', () => {
                isPlaying = !isPlaying;
                if (isPlaying) {
                    toggleBtn.textContent = '❚❚';
                    if (statusText) {
                        statusText.textContent = '✦ Mode Rotasi Optik 360° Aktif: Memeriksa pantulan 58 faset berlian (Crown 34.5° • Pavilion 40.8° • 2.417 nD Fire).';
                        statusText.classList.add('text-[#E6C587]');
                    }
                    if (bgImg) bgImg.style.transform = 'scale(1.12)';
                    timer = setInterval(() => {
                        angle += 45;
                        if (ringSvg) ringSvg.style.transform = `rotate(${angle}deg)`;
                    }, 600);
                } else {
                    toggleBtn.textContent = '▶';
                    clearInterval(timer);
                    if (bgImg) bgImg.style.transform = 'scale(1)';
                    if (statusText) {
                        statusText.textContent = 'Simulasi dijeda. Klik tombol putar untuk melanjutkan inspeksi faset 360 derajat.';
                        statusText.classList.remove('text-[#E6C587]');
                    }
                }
            });
        }
    });
</script>
@endpush

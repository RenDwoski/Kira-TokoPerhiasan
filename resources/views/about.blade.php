@extends('layouts.kira')

@section('title', 'Tentang KIRA — Maison de Diamants | Warisan Cahaya Kirana')

@section('content')
    <!-- ======================================================================= -->
    <!-- PAGE 02 HEADER: ABOUT MAISON (Figma Node 11:408)                        -->
    <!-- ======================================================================= -->
    <section class="bg-white/75 border-b border-[#E5DEC9] py-12 lg:py-16">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px] text-center">
            <p class="font-sans font-bold text-[11px] tracking-[0.12em] text-[#9E7329] uppercase">
                HOME / ABOUT MAISON
            </p>
            <h1 class="mt-2 font-serif font-bold text-[36px] sm:text-[46px] text-[#0F1E2E] leading-tight">
                Tentang KIRA — Maison de Diamants
            </h1>
            <p class="mt-3 font-sans text-[15px] text-[#5C6877] max-w-[680px] mx-auto leading-relaxed">
                Diambil dari kata Sanskerta &ldquo;Kirana&rdquo; yang bermakna berkas sinar yang murni dan agung. Rumah perhiasan berlian modern yang memadukan potongan permata presisi tinggi dengan keanggunan tak lekang waktu.
            </p>
        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 2.1: BRAND STORY & LOTUS CROWN ARCHITECTURE (Figma Node 11:414) -->
    <!-- ======================================================================= -->
    <section class="py-14 lg:py-20">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px]">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">

                <!-- Left Heritage Visual (6 cols, Node 11:415) -->
                <div class="lg:col-span-6">
                    <div class="relative rounded-[28px] overflow-hidden border border-[#C99A49]/60 bg-[#0F1E2E] p-6 sm:p-8 shadow-xl">
                        <div class="relative h-[320px] sm:h-[360px] rounded-[20px] overflow-hidden border border-white/15">
                            <img src="/assets/kira/atelier-diamond-macro.png"
                                 alt="Lotus Crown Solitaire Architecture"
                                 width="560"
                                 height="408"
                                 class="w-full h-full object-cover opacity-90">

                            <!-- Geometric Overlay -->
                            <div class="pointer-events-none absolute inset-0 flex items-center justify-center">
                                <div class="relative w-[190px] h-[190px] flex items-center justify-center">
                                    <img src="/assets/kira/facet-diagram-outer.svg" alt="" width="190" height="190" class="absolute inset-0 w-full h-full">
                                    <img src="/assets/kira/facet-diagram-inner.svg" alt="" width="184" height="184" class="w-[184px] h-[184px]">
                                </div>
                            </div>

                            <div class="absolute top-4 left-4 px-3.5 py-1 rounded-full bg-[#0F1E2E]/90 border border-[#C99A49]/60">
                                <span class="font-sans font-bold text-[10px] tracking-wider text-[#E6C587] uppercase">
                                    BRAND HERITAGE &amp; ATELIER • 58 FACET SYMMETRY
                                </span>
                            </div>

                            <div class="absolute bottom-4 inset-x-4 flex items-center justify-between px-4 py-2.5 rounded-2xl bg-[#0F1E2E]/85 backdrop-blur-md border border-white/15 text-[11px]">
                                <span class="font-bold text-[#F7F4EE]">Lotus Crown Solitaire Architecture</span>
                                <span class="font-bold text-[#E6C587]">Crown 34.5° • Pavilion 40.8°</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Brand Story Copy (6 cols, Node 11:422 - 11:433) -->
                <div class="lg:col-span-6">
                    <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-white border border-[#C99A49]/60 mb-4">
                        <span class="font-sans font-bold text-[10.5px] tracking-[0.08em] text-[#9E7329] uppercase">
                            01 • BRAND STORY (KIRANA)
                        </span>
                    </div>

                    <h2 class="font-serif font-bold text-[32px] sm:text-[38px] text-[#0F1E2E] leading-[1.2]">
                        Warisan Cahaya Murni<br>&amp; Simetri Mahkota Teratai
                    </h2>

                    <div class="mt-5 space-y-4 font-sans text-[15px] leading-[1.7] text-[#5C6877]">
                        <p>
                            KIRA (/ki·ra/ — Pancaran Cahaya &amp; Kemurnian Abadi) lahir sebagai rumah perhiasan berlian modern (<em>Maison de Diamants</em>) yang merayakan kemurnian anatomi berlian alami bersertifikat GIA.
                        </p>
                        <p>
                            Setiap cincin solitaire KIRA menampilkan arsitektur <strong>The Lotus Crown Solitaire</strong>, di mana kelopak teratai emas 18K Champagne Gold menopang berlian dengan sudut mahkota 34.5° sehingga cahaya dapat masuk dari segala penjuru dan memantulkan kilau putih (<em>brilliance</em>) yang maksimal.
                        </p>
                    </div>

                    <!-- Pull Quote Box (11:430 - 11:433) -->
                    <blockquote class="mt-7 p-6 rounded-[20px] bg-white border border-[#E5DEC9] shadow-2xs relative">
                        <div class="border-l-4 border-[#C99A49] pl-5">
                            <p class="font-serif italic text-[18px] text-[#0F1E2E] leading-relaxed">
                                &ldquo;Setiap berlian KIRA ditempa untuk memantulkan berkas cahaya murni (Kirana) dengan kejujuran kualitas sertifikasi GIA.&rdquo;
                            </p>
                            <footer class="mt-2 font-sans font-bold text-[11px] tracking-wider text-[#9E7329] uppercase">
                                — Filosofi KIRA Maison de Diamants
                            </footer>
                        </div>
                    </blockquote>

                    <!-- Brand Personality Pills -->
                    <div class="mt-6 flex flex-wrap items-center gap-2.5">
                        @foreach (['Mewah', 'Murni', 'Anggun', 'Presisi', 'Abadi'] as $trait)
                            <span class="px-4 py-1.5 rounded-full bg-[#EFECE3] border border-[#D8CEBE] font-sans font-bold text-[12px] text-[#0F1E2E]">
                                ✦ {{ $trait }}
                            </span>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 2.2: VISION & MISSION (Figma Node 11:434)                       -->
    <!-- ======================================================================= -->
    <section class="pb-14 lg:pb-20">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Our Vision Card (11:435) -->
                <div class="bento-card p-8">
                    <span class="inline-block px-3.5 py-1 rounded-full bg-[#EFE9DC] border border-[#C99A49]/50 font-sans font-bold text-[10.5px] tracking-wider text-[#9E7329] uppercase">
                        OUR VISION
                    </span>
                    <h3 class="mt-4 font-serif font-bold text-[26px] text-[#0F1E2E]">
                        Visi Rumah Perhiasan KIRA
                    </h3>
                    <p class="mt-3 font-sans text-[14.5px] leading-[1.7] text-[#5C6877]">
                        Menjadi rumah perhiasan berlian modern (<em>Haute Joaillerie</em>) terkemuka di Asia Tenggara yang menjadi tolok ukur kemurnian optik, transparansi sertifikasi GIA D-Color, dan arsitektur perhiasan warisan lintas generasi.
                    </p>
                </div>

                <!-- Our Mission Card (11:443) -->
                <div class="bento-card p-8">
                    <span class="inline-block px-3.5 py-1 rounded-full bg-[#0F1E2E] border border-[#C99A49]/60 font-sans font-bold text-[10.5px] tracking-wider text-[#E6C587] uppercase">
                        OUR MISSION
                    </span>
                    <h3 class="mt-4 font-serif font-bold text-[26px] text-[#0F1E2E]">
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
    <section class="py-14 lg:py-20 bg-white/75 border-y border-[#E5DEC9]">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px]">
            <div class="text-center max-w-[680px] mx-auto">
                <p class="font-sans font-bold text-[11px] tracking-[0.08em] text-[#9E7329] uppercase">
                    02 • FONDASI MAISON DE DIAMANTS
                </p>
                <h2 class="mt-1.5 font-serif font-bold text-[32px] sm:text-[38px] text-[#0F1E2E]">
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
                    <div class="bento-card p-7 flex flex-col justify-between">
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
    <section class="py-14 lg:py-20">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px]">
            <div class="rounded-[24px] bg-white border border-[#C99A49]/60 p-7 lg:p-9 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6 shadow-sm">
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
                        Lihat Koleksi Kami →
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

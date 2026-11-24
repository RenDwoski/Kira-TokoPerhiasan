@extends('layouts.kira')

@section('title', 'Hubungi Kami & Reservasi Private Viewing VIP | KIRA — Maison de Diamants')

@section('content')
    @php
        $conf = $bookingConfirmation ?? [
            'code' => 'KIRA-VIP-2026-089',
            'full_name' => 'Tamu Kehormatan KIRA',
            'collection' => 'The Lotus Crown Solitaire (1.50 Ct)',
            'gia_report' => '226789104',
            'visit_date' => 'Sabtu, 14 November 2026',
            'time_slot' => '14:00 WIB',
            'location' => 'KIRA Flagship Boutique, Plaza Indonesia Level 1',
        ];
        $isJustConfirmed = !empty($bookingConfirmation) || request()->has('confirmed');
    @endphp

    <div id="contact-page-root"
         data-products='@json($products)'
         data-just-confirmed="{{ $isJustConfirmed ? '1' : '0' }}">

        <!-- =================================================================== -->
        <!-- PAGE 05 HEADER (Figma Node 11:929)                                  -->
        <!-- =================================================================== -->
        <section data-page-header class="bg-white/75 border-b border-[#E5DEC9] py-12 lg:py-16">
            <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px] text-center">
                <p data-page-header-item class="font-sans font-bold text-[11px] tracking-[0.12em] text-[#9E7329] uppercase">
                    05 • FLAGSHIP SALON CONCIERGE &amp; VIP APPOINTMENT
                </p>
                <h1 data-page-header-item class="mt-2 font-serif font-bold text-[32px] sm:text-[44px] text-[#0F1E2E] leading-tight">
                    Hubungi Kami &amp; Reservasi Private Viewing VIP
                </h1>
                <p data-page-header-item class="mt-3 font-sans text-[14.5px] text-[#5C6877] max-w-[680px] mx-auto leading-relaxed">
                    Jadwalkan sesi konsultasi privat 1-on-1 bersama Gemologist bersertifikat GIA di KIRA Flagship Boutique, Plaza Indonesia Level 1.
                </p>
                <div data-anime-line class="mt-5 mx-auto w-28 h-[2px] rounded-full bg-gradient-to-r from-transparent via-[#C99A49] to-transparent"></div>
            </div>
        </section>

        <!-- =================================================================== -->
        <!-- SECTION 5.1 & 5.2: INFO BUTIK + FORM RESERVASI VIP                  -->
        <!-- =================================================================== -->
        <section class="py-12 lg:py-16">
            <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px]">
                <div id="contact-main-grid" class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">

                    <!-- Left Card: Flagship Salon & Concierge Info + Google Maps (5 cols) -->
                    <div data-contact-left class="lg:col-span-5 bento-card p-7 sm:p-8 flex flex-col justify-between">
                        <div>
                            <span class="inline-block px-3.5 py-1 rounded-full bg-[#EFE9DC] border border-[#C99A49]/60 font-sans font-bold text-[10px] tracking-wider text-[#9E7329] uppercase">
                                FLAGSHIP SALON &amp; CONCIERGE
                            </span>

                            <h2 class="mt-4 font-serif font-bold text-[28px] sm:text-[32px] text-[#0F1E2E]">
                                KIRA Plaza Indonesia
                            </h2>
                            <p class="mt-1 font-sans font-medium text-[14.5px] text-[#5C6877]">
                                Level 1 • Jakarta Pusat
                            </p>

                            <hr class="my-6 border-[#E5DEC9]">

                            <div class="space-y-4 text-[14px]">
                                <div>
                                    <h3 class="font-sans font-bold text-[#0F1E2E]">Jam Operasional Butik:</h3>
                                    <p class="mt-1 text-[#5C6877]">Senin – Minggu: 10.00 – 21.00 WIB</p>
                                </div>

                                <div>
                                    <h3 class="font-sans font-bold text-[#0F1E2E]">Layanan Concierge Langsung:</h3>
                                    <p class="mt-1 text-[#5C6877]">
                                        Telepon / WhatsApp: <a href="tel:+622150889900" class="font-bold text-[#0F1E2E] hover:underline">+62 21 5088 9900</a>
                                    </p>
                                    <p class="mt-0.5 text-[#5C6877]">
                                        Email: <a href="mailto:concierge@kira-diamonds.com" class="font-bold text-[#9E7329] hover:underline">concierge@kira-diamonds.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Real Interactive Google Maps Embed Card -->
                        <div class="mt-8 rounded-[20px] overflow-hidden border border-[#C99A49]/60 bg-[#0F1E2E] shadow-sm flex flex-col">
                            <div class="relative w-full h-[250px] sm:h-[280px] bg-[#EFECE4]">
                                <iframe
                                    title="Peta Lokasi KIRA Flagship Boutique — Plaza Indonesia Jakarta"
                                    src="https://www.google.com/maps?q=Plaza+Indonesia,+Jl.+M.H.+Thamrin+Kav.+28-30,+Jakarta+Pusat&hl=id&z=16&output=embed"
                                    class="w-full h-full border-0"
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    allowfullscreen>
                                </iframe>

                                <div class="pointer-events-none absolute top-3 left-3 z-10 px-3 py-1 rounded-full bg-[#0F1E2E]/88 backdrop-blur-md border border-[#C99A49]/60 shadow-md">
                                    <span class="font-sans font-bold text-[9.5px] tracking-wider text-[#E6C587] uppercase">
                                        ✦ PLAZA INDONESIA • CENTRAL JAKARTA
                                    </span>
                                </div>
                            </div>

                            <!-- Map Footer Address & Direct Link -->
                            <div class="px-4 py-3.5 bg-[#0F1E2E] border-t border-white/10 flex flex-wrap items-center justify-between gap-2 text-[11.5px]">
                                <div class="min-w-0">
                                    <p class="font-sans font-bold text-white truncate">
                                        KIRA Flagship Boutique • Plaza Indonesia Level 1
                                    </p>
                                    <p class="font-sans text-[11px] text-[#DCE6F2]/85 truncate">
                                        Jl. M.H. Thamrin Kav. 28-30, Gondangdia, Menteng
                                    </p>
                                </div>
                                <a href="https://maps.google.com/?q=Plaza+Indonesia,+Jl.+M.H.+Thamrin+Kav.+28-30,+Jakarta+Pusat"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   data-magnetic
                                   class="shrink-0 px-3.5 py-1.5 rounded-full bg-[#C99A49]/15 border border-[#C99A49]/60 font-sans font-bold text-[11px] text-[#E6C587] hover:bg-[#C99A49] hover:text-[#0F1E2E] transition">
                                    Buka di Google Maps
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right Card: Formulir Reservasi Janji Temu VIP (7 cols) -->
                    <div data-contact-right class="lg:col-span-7 bento-card-featured p-7 sm:p-10">
                        <h2 class="font-serif font-bold text-[28px] sm:text-[32px] text-[#0F1E2E]">
                            Formulir Reservasi Janji Temu VIP
                        </h2>
                        <p class="mt-1.5 font-sans text-[14px] text-[#5C6877]">
                            Lengkapi data di bawah ini untuk menjadwalkan sesi konsultasi privat bersama Gemologist KIRA.
                        </p>

                        <form id="vip-booking-form" action="{{ route('contact.book') }}" method="POST" class="mt-7 space-y-5">
                            @csrf

                            <!-- Row 1: Nama Lengkap & Email -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div data-form-group>
                                    <label for="full_name" class="block font-sans font-bold text-[11px] tracking-[0.06em] text-[#0F1E2E] uppercase mb-2">
                                        NAMA LENGKAP <span class="text-[#9E7329]">*</span>
                                    </label>
                                    <input type="text"
                                           id="full_name"
                                           name="full_name"
                                           required
                                           value="{{ old('full_name', $bookingConfirmation['full_name'] ?? '') }}"
                                           placeholder="Nama Lengkap Anda"
                                           class="w-full h-[50px] px-4 rounded-[14px] bg-[#FAF8F3] border border-[#D8CEBE] font-sans text-[14px] text-[#0F1E2E] placeholder:text-[#5C6877]/60 focus:outline-none focus:border-[#C99A49] focus:bg-white transition">
                                    @error('full_name')
                                        <p class="mt-1 text-[11.5px] text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div data-form-group>
                                    <label for="email" class="block font-sans font-bold text-[11px] tracking-[0.06em] text-[#0F1E2E] uppercase mb-2">
                                        ALAMAT EMAIL <span class="text-[#9E7329]">*</span>
                                    </label>
                                    <input type="email"
                                           id="email"
                                           name="email"
                                           required
                                           value="{{ old('email', $bookingConfirmation['email'] ?? '') }}"
                                           placeholder="nama@email.com"
                                           class="w-full h-[50px] px-4 rounded-[14px] bg-[#FAF8F3] border border-[#D8CEBE] font-sans text-[14px] text-[#0F1E2E] placeholder:text-[#5C6877]/60 focus:outline-none focus:border-[#C99A49] focus:bg-white transition">
                                    @error('email')
                                        <p class="mt-1 text-[11.5px] text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Row 2: Nomor WhatsApp & Koleksi yang Diminati -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div data-form-group>
                                    <label for="whatsapp" class="block font-sans font-bold text-[11px] tracking-[0.06em] text-[#0F1E2E] uppercase mb-2">
                                        NOMOR WHATSAPP <span class="text-[#9E7329]">*</span>
                                    </label>
                                    <input type="tel"
                                           id="whatsapp"
                                           name="whatsapp"
                                           required
                                           value="{{ old('whatsapp', $bookingConfirmation['whatsapp'] ?? '') }}"
                                           placeholder="+62 812-xxxx-xxxx"
                                           class="w-full h-[50px] px-4 rounded-[14px] bg-[#FAF8F3] border border-[#D8CEBE] font-sans text-[14px] text-[#0F1E2E] placeholder:text-[#5C6877]/60 focus:outline-none focus:border-[#C99A49] focus:bg-white transition">
                                    @error('whatsapp')
                                        <p class="mt-1 text-[11.5px] text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div data-form-group>
                                    <label for="collection" class="block font-sans font-bold text-[11px] tracking-[0.06em] text-[#0F1E2E] uppercase mb-2">
                                        KOLEKSI YANG DIMINATI <span class="text-[#9E7329]">*</span>
                                    </label>
                                    <select id="collection"
                                            name="collection"
                                            required
                                            class="w-full h-[50px] px-4 rounded-[14px] bg-[#FAF8F3] border border-[#D8CEBE] font-sans font-bold text-[13.5px] text-[#0F1E2E] focus:outline-none focus:border-[#C99A49] focus:bg-white transition cursor-pointer">
                                        @foreach ($products as $prod)
                                            <option value="{{ $prod['name'] }}"
                                                {{ str_contains(strtolower($preselectedCollection), strtolower($prod['name'])) ? 'selected' : '' }}>
                                                {{ $prod['name'] }} ({{ $prod['carat'] }} • {{ $prod['price_formatted'] }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Row 3: Tanggal Kunjungan & Sesi Waktu Privat -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div data-form-group>
                                    <label for="visit_date" class="block font-sans font-bold text-[11px] tracking-[0.06em] text-[#0F1E2E] uppercase mb-2">
                                        TANGGAL KUNJUNGAN <span class="text-[#9E7329]">*</span>
                                    </label>
                                    <input type="text"
                                           id="visit_date"
                                           name="visit_date"
                                           required
                                           value="{{ old('visit_date', $bookingConfirmation['visit_date'] ?? 'Sabtu, 14 November 2026') }}"
                                           placeholder="Sabtu, 14 November 2026"
                                           class="w-full h-[50px] px-4 rounded-[14px] bg-[#FAF8F3] border border-[#D8CEBE] font-sans text-[14px] text-[#0F1E2E] focus:outline-none focus:border-[#C99A49] focus:bg-white transition">
                                </div>

                                <div data-form-group>
                                    <label for="time_slot" class="block font-sans font-bold text-[11px] tracking-[0.06em] text-[#0F1E2E] uppercase mb-2">
                                        SESI WAKTU PRIVAT <span class="text-[#9E7329]">*</span>
                                    </label>
                                    <select id="time_slot"
                                            name="time_slot"
                                            required
                                            class="w-full h-[50px] px-4 rounded-[14px] bg-[#FAF8F3] border border-[#D8CEBE] font-sans font-bold text-[13.5px] text-[#0F1E2E] focus:outline-none focus:border-[#C99A49] focus:bg-white transition cursor-pointer">
                                        <option value="Sesi Pagi (11:00 WIB)">Sesi Pagi (11:00 WIB)</option>
                                        <option value="Sesi Siang (14:00 WIB)" selected>Sesi Siang (14:00 WIB)</option>
                                        <option value="Sesi Sore (16:30 WIB)">Sesi Sore (16:30 WIB)</option>
                                        <option value="Sesi Malam Eksklusif (19:00 WIB)">Sesi Malam Eksklusif (19:00 WIB)</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Row 4: Catatan Khusus -->
                            <div data-form-group>
                                <label for="notes" class="block font-sans font-bold text-[11px] tracking-[0.06em] text-[#0F1E2E] uppercase mb-2">
                                    CATATAN KHUSUS (UKURAN JARI / PREFERENSI LOGAM MULIA)
                                </label>
                                <textarea id="notes"
                                          name="notes"
                                          rows="4"
                                          placeholder="Contoh: Ukuran jari manis 11 (HK), preferensi 18K Champagne Gold, ingin melihat perbandingan dengan Platinum Pt950 di bawah mikroskop 10x."
                                          class="w-full p-4 rounded-[16px] bg-[#FAF8F3] border border-[#D8CEBE] font-sans text-[14px] text-[#0F1E2E] placeholder:text-[#5C6877]/60 focus:outline-none focus:border-[#C99A49] focus:bg-white transition">{{ old('notes', $bookingConfirmation['notes'] ?? '') }}</textarea>
                            </div>

                            <!-- Submit Action Button -->
                            <div class="pt-2">
                                <button type="submit"
                                        data-magnetic
                                        class="w-full h-[60px] rounded-full bg-[#0F1E2E] text-white font-sans font-bold text-[15px] tracking-wide hover:bg-[#193048] shadow-lg transition cursor-pointer">
                                    Konfirmasi Janji Temu VIP
                                </button>
                                <p class="mt-3 text-center font-sans text-[12px] text-[#5C6877]">
                                    Data Anda dilindungi kebijakan privasi KIRA Maison de Diamants.
                                </p>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>

        <!-- =================================================================== -->
        <!-- SECTION 5.3: THE FINAL INTERACTION / KONFIRMASI SUKSES              -->
        <!-- =================================================================== -->
        <section id="vip-confirmation-section" class="{{ $isJustConfirmed ? '' : 'hidden' }} pb-14 scroll-mt-24">
            <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px]">

                <div id="vip-confirmation-card" class="rounded-[28px] {{ $isJustConfirmed ? 'bg-[#0F1E2E] text-white border-2 border-[#C99A49] ring-4 ring-[#C99A49]/25' : 'bg-white text-[#0F1E2E] border-2 border-[#C99A49]/75' }} p-7 sm:p-10 shadow-xl transition-all">

                    <div id="vip-confirmation-badge" class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full {{ $isJustConfirmed ? 'bg-[#C99A49] text-[#0F1E2E]' : 'bg-[#0F1E2E] text-[#E6C587]' }} font-sans font-bold text-[10.5px] tracking-wider uppercase mb-6">
                        <span>✦</span>
                        <span>3. THE FINAL INTERACTION (STATE KONFIRMASI SUKSES)</span>
                    </div>

                    <div class="flex flex-col lg:flex-row items-start lg:items-center gap-7">
                        <!-- Anime.js Drawable Golden VIP Seal & Sparkle Burst Host -->
                        <div id="vip-seal-host" class="relative w-[96px] h-[96px] rounded-full bg-[#C99A49]/15 border border-[#C99A49]/40 flex items-center justify-center shrink-0">
                            <svg id="vip-seal-svg" viewBox="0 0 96 96" fill="none" class="w-full h-full">
                                <circle cx="48" cy="48" r="43" stroke="#C99A49" stroke-width="2.2" class="vip-seal-draw" />
                                <path d="M30 49.5 L42.5 62 L67 36" stroke="#E6C587" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="vip-seal-draw" />
                            </svg>
                        </div>

                        <!-- Confirmation Details -->
                        <div class="flex-1">
                            <h2 id="conf-heading" class="font-serif font-bold text-[26px] sm:text-[34px] {{ $isJustConfirmed ? 'text-white' : 'text-[#0F1E2E]' }} leading-snug">
                                Reservasi Private Viewing Berhasil Dikonfirmasi!
                            </h2>
                            <p id="conf-guest-row" class="{{ !empty($bookingConfirmation['full_name']) ? '' : 'hidden' }} mt-1 font-sans font-bold text-[14px] text-[#C99A49]">
                                @if (!empty($bookingConfirmation['full_name']))
                                    Tamu VIP: {{ $bookingConfirmation['full_name'] }} ({{ $bookingConfirmation['email'] }} • {{ $bookingConfirmation['whatsapp'] }})
                                @endif
                            </p>
                            <p id="conf-meta-row" class="mt-2 font-sans font-bold text-[15.5px] {{ $isJustConfirmed ? 'text-[#E6C587]' : 'text-[#9E7329]' }}">
                                Kode Booking VIP: <span id="conf-code">{{ $conf['code'] }}</span> • <span id="conf-datetime">{{ $conf['visit_date'] }} ({{ $conf['time_slot'] }})</span>
                            </p>
                            <p id="conf-location-row" class="mt-1.5 font-sans font-medium text-[14px] {{ $isJustConfirmed ? 'text-[#DCE6F2]' : 'text-[#0F1E2E]' }}">
                                Lokasi: {{ $conf['location'] }} • Koleksi: <strong id="conf-collection">{{ $conf['collection'] }}</strong>
                            </p>
                            <p id="conf-note-row" class="mt-1.5 font-sans text-[13px] {{ $isJustConfirmed ? 'text-[#DCE6F2]/85' : 'text-[#5C6877]' }}">
                                E-Invitation resmi beserta salinan Sertifikat GIA <span id="conf-gia">{{ $conf['gia_report'] }}</span> telah disiapkan untuk sesi inspeksi mikroskop 10x Anda.
                            </p>

                            <!-- Action Buttons -->
                            <div class="mt-6 flex flex-wrap items-center gap-4">
                                <button type="button"
                                        data-magnetic
                                        onclick="window.print()"
                                        class="h-[52px] px-7 rounded-full bg-[#C99A49] text-[#0F1E2E] font-sans font-bold text-[13.5px] hover:bg-[#E6C587] transition cursor-pointer shadow-md">
                                    Unduh / Cetak E-Invitation (PDF)
                                </button>
                                <a id="conf-home-btn"
                                   data-magnetic
                                   href="{{ route('home') }}"
                                   class="h-[52px] px-7 rounded-full {{ $isJustConfirmed ? 'bg-white/10 border border-white/25 text-white hover:bg-white/20' : 'bg-[#FAF8F3] border border-[#D8CEBE] text-[#0F1E2E] hover:border-[#C99A49]' }} font-sans font-bold text-[13.5px] flex items-center justify-center transition">
                                    Kembali ke Homepage (Selesai)
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- =================================================================== -->
        <!-- SECTION 5.4: FAQ LAYANAN BUTIK (Motion.dev Spring Accordions)       -->
        <!-- =================================================================== -->
        <section id="faq-section" class="pb-16 lg:pb-24">
            <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-[120px]">
                <h2 class="font-serif font-bold text-[26px] sm:text-[32px] text-[#0F1E2E]">
                    Pertanyaan Umum Seputar Konsultasi Butik (FAQ)
                </h2>

                <div data-faq-list class="mt-6 space-y-3.5">
                    @foreach ($faqs as $idx => $faq)
                        <div class="faq-item rounded-[20px] bg-white border border-[#E5DEC9] overflow-hidden transition-colors">
                            <button type="button"
                                    class="faq-toggle w-full px-6 py-4.5 text-left flex items-center justify-between gap-4 hover:bg-[#FAF8F3] transition cursor-pointer"
                                    aria-expanded="{{ $idx === 0 ? 'true' : 'false' }}">
                                <span class="font-sans font-bold text-[15px] text-[#0F1E2E]">
                                    {{ $faq['question'] }}
                                </span>
                                <span class="faq-icon w-7 h-7 rounded-full bg-[#EFE9DC] text-[#9E7329] font-bold text-[16px] flex items-center justify-center shrink-0">
                                    {{ $idx === 0 ? '−' : '+' }}
                                </span>
                            </button>
                            <div class="faq-answer {{ $idx === 0 ? 'block' : 'hidden' }} px-6 pb-5 pt-1 font-sans text-[14px] leading-[1.68] text-[#5C6877] border-t border-[#EFE9DC]/60">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection

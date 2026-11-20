@extends('layouts.kira')

@section('title', 'Hubungi Kami & Reservasi Private Viewing VIP | KIRA — Maison de Diamants')

@section('content')
    <!-- ======================================================================= -->
    <!-- PAGE 05 HEADER (Figma Node 11:929)                                      -->
    <!-- ======================================================================= -->
    <section class="bg-white/75 border-b border-[#E5DEC9] py-12 lg:py-16">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px] text-center">
            <p class="font-sans font-bold text-[11px] tracking-[0.12em] text-[#9E7329] uppercase">
                05 • FLAGSHIP SALON CONCIERGE &amp; VIP APPOINTMENT
            </p>
            <h1 class="mt-2 font-serif font-bold text-[34px] sm:text-[44px] text-[#0F1E2E] leading-tight">
                Hubungi Kami &amp; Reservasi Private Viewing VIP
            </h1>
            <p class="mt-3 font-sans text-[14.5px] text-[#5C6877] max-w-[680px] mx-auto leading-relaxed">
                Jadwalkan sesi konsultasi privat 1-on-1 bersama Gemologist bersertifikat GIA di KIRA Flagship Boutique, Plaza Indonesia Level 1 #108.
            </p>
        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 5.1 & 5.2: INFO BUTIK + FORM RESERVASI VIP (Figma Node 11:934)  -->
    <!-- ======================================================================= -->
    <section class="py-12 lg:py-16">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px]">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">

                <!-- Left Card: Flagship Salon & Concierge Info + Map (5 cols, Node 11:935 - 11:952) -->
                <div class="lg:col-span-5 bento-card p-7 sm:p-8 flex flex-col justify-between">
                    <div>
                        <span class="inline-block px-3.5 py-1 rounded-full bg-[#EFE9DC] border border-[#C99A49]/60 font-sans font-bold text-[10px] tracking-wider text-[#9E7329] uppercase">
                            FLAGSHIP SALON &amp; CONCIERGE
                        </span>

                        <h2 class="mt-4 font-serif font-bold text-[28px] sm:text-[32px] text-[#0F1E2E]">
                            KIRA Plaza Indonesia
                        </h2>
                        <p class="mt-1 font-sans font-medium text-[14.5px] text-[#5C6877]">
                            Level 1, Suite #108 • Jakarta Pusat
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

                    <!-- Interactive Boutique Map Card (11:946 - 11:952) -->
                    <div class="mt-8 relative h-[320px] sm:h-[360px] rounded-[20px] overflow-hidden border border-[#C99A49]/60 bg-[#0F1E2E] p-5 flex flex-col justify-between">
                        <!-- Stylized Map Grid Background -->
                        <div class="pointer-events-none absolute inset-0 opacity-20"
                             style="background-image: radial-gradient(#C99A49 1px, transparent 1px), linear-gradient(to right, #243B53 1px, transparent 1px), linear-gradient(to bottom, #243B53 1px, transparent 1px); background-size: 24px 24px, 48px 48px, 48px 48px;"></div>

                        <div class="relative z-10 flex items-center justify-between">
                            <span class="px-3 py-1 rounded-full bg-white/10 border border-[#C99A49]/50 font-sans font-bold text-[9.5px] text-[#E6C587] uppercase">
                                ✦ PLAZA INDONESIA • CENTRAL JAKARTA
                            </span>
                            <span class="text-[11px] font-bold text-[#DCE6F2]">VIP Valet Drop-Off</span>
                        </div>

                        <!-- Center Map Pin Marker -->
                        <div class="relative z-10 my-auto flex flex-col items-center text-center">
                            <div class="w-14 h-14 rounded-full bg-[#C99A49]/25 border border-[#C99A49] flex items-center justify-center animate-pulse">
                                <div class="w-9 h-9 rounded-full bg-[#C99A49] text-[#0F1E2E] font-serif font-bold text-[15px] flex items-center justify-center shadow-lg">
                                    K
                                </div>
                            </div>
                            <span class="mt-2.5 px-4 py-1.5 rounded-full bg-[#0F1E2E]/90 border border-[#C99A49] font-sans font-bold text-[11px] text-white shadow-md">
                                KIRA Flagship Boutique • Level 1 #108
                            </span>
                            <span class="mt-1.5 text-[11.5px] text-[#DCE6F2]">
                                Jl. M.H. Thamrin Kav. 28-30, Gondangdia, Menteng
                            </span>
                        </div>

                        <!-- Map Footer Action -->
                        <div class="relative z-10 flex items-center justify-between pt-3 border-t border-white/15 text-[11.5px]">
                            <span class="text-[#DCE6F2]">Akses Privat Lobby Timur (VIP Valet)</span>
                            <a href="https://maps.google.com/?q=Plaza+Indonesia+Jakarta"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="font-bold text-[#E6C587] hover:underline">
                                Buka di Google Maps ↗
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Card: Formulir Reservasi Janji Temu VIP (7 cols, Node 11:953 - 11:981) -->
                <div class="lg:col-span-7 bento-card-featured p-7 sm:p-10">
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
                            <div>
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

                            <div>
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
                            <div>
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

                            <div>
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
                            <div>
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

                            <div>
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
                        <div>
                            <label for="notes" class="block font-sans font-bold text-[11px] tracking-[0.06em] text-[#0F1E2E] uppercase mb-2">
                                CATATAN KHUSUS (UKURAN JARI / PREFERENSI LOGAM MULIA)
                            </label>
                            <textarea id="notes"
                                      name="notes"
                                      rows="4"
                                      placeholder="Contoh: Ukuran jari manis 11 (HK), preferensi 18K Champagne Gold, ingin melihat perbandingan dengan Platinum Pt950 di bawah mikroskop 10x."
                                      class="w-full p-4 rounded-[16px] bg-[#FAF8F3] border border-[#D8CEBE] font-sans text-[14px] text-[#0F1E2E] placeholder:text-[#5C6877]/60 focus:outline-none focus:border-[#C99A49] focus:bg-white transition">{{ old('notes', $bookingConfirmation['notes'] ?? '') }}</textarea>
                        </div>

                        <!-- Submit Action Button (11:979 - 11:980) -->
                        <div class="pt-2">
                            <button type="submit"
                                    class="w-full h-[60px] rounded-full bg-[#0F1E2E] text-white font-sans font-bold text-[15px] tracking-wide hover:bg-[#193048] shadow-lg transition cursor-pointer">
                                Konfirmasi Janji Temu VIP →
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

    <!-- ======================================================================= -->
    <!-- SECTION 5.3: THE FINAL INTERACTION / KONFIRMASI SUKSES (Node 11:982)    -->
    <!-- ======================================================================= -->
    <section id="vip-confirmation-section" class="pb-14 scroll-mt-24">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px]">
            @php
                $conf = $bookingConfirmation ?? [
                    'code' => '#KIRA-VIP-2026-089',
                    'full_name' => 'Tamu Kehormatan KIRA',
                    'collection' => 'The Lotus Crown Solitaire (1.50 Ct)',
                    'gia_report' => '226789104',
                    'visit_date' => 'Sabtu, 14 November 2026',
                    'time_slot' => '14:00 WIB',
                    'location' => 'KIRA Flagship Boutique, Plaza Indonesia Level 1 #108',
                ];
                $isJustConfirmed = !empty($bookingConfirmation) || request()->has('confirmed');
            @endphp

            <div id="vip-confirmation-card" class="rounded-[28px] {{ $isJustConfirmed ? 'bg-[#0F1E2E] text-white border-2 border-[#C99A49] ring-4 ring-[#C99A49]/25' : 'bg-white text-[#0F1E2E] border-2 border-[#C99A49]/75' }} p-7 sm:p-10 shadow-xl transition-all">

                <div id="vip-confirmation-badge" class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full {{ $isJustConfirmed ? 'bg-[#C99A49] text-[#0F1E2E]' : 'bg-[#0F1E2E] text-[#E6C587]' }} font-sans font-bold text-[10.5px] tracking-wider uppercase mb-6">
                    <span>✦</span>
                    <span>3. THE FINAL INTERACTION (STATE KONFIRMASI SUKSES)</span>
                </div>

                <div class="flex flex-col lg:flex-row items-start lg:items-center gap-7">
                    <!-- Checkmark Emblem (11:986 - 11:987) -->
                    <div class="w-[96px] h-[96px] rounded-full bg-[#C99A49]/20 border-2 border-[#C99A49] flex items-center justify-center shrink-0">
                        <span class="font-serif font-bold text-[42px] text-[#C99A49]">✓</span>
                    </div>

                    <!-- Confirmation Details (11:988 - 11:995) -->
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
                            E-Invitation resmi beserta salinan Sertifikat GIA #<span id="conf-gia">{{ $conf['gia_report'] }}</span> telah disiapkan untuk sesi inspeksi mikroskop 10x Anda.
                        </p>

                        <!-- Action Buttons (11:992 - 11:995) -->
                        <div class="mt-6 flex flex-wrap items-center gap-4">
                            <button type="button"
                                    onclick="window.print()"
                                    class="h-[52px] px-7 rounded-full bg-[#C99A49] text-[#0F1E2E] font-sans font-bold text-[13.5px] hover:bg-[#E6C587] transition cursor-pointer shadow-md">
                                Unduh / Cetak E-Invitation (PDF)
                            </button>
                            <a id="conf-home-btn"
                               href="{{ route('home') }}"
                               class="h-[52px] px-7 rounded-full {{ $isJustConfirmed ? 'bg-white/10 border border-white/25 text-white hover:bg-white/20' : 'bg-[#FAF8F3] border border-[#D8CEBE] text-[#0F1E2E] hover:border-[#C99A49]' }} font-sans font-bold text-[13.5px] flex items-center justify-center transition">
                                ← Kembali ke Homepage (Selesai)
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ======================================================================= -->
    <!-- SECTION 5.4: FAQ LAYANAN BUTIK (Figma Node 11:996)                      -->
    <!-- ======================================================================= -->
    <section id="faq-section" class="pb-16 lg:pb-24">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px]">
            <h2 class="font-serif font-bold text-[26px] sm:text-[32px] text-[#0F1E2E]">
                Pertanyaan Umum Seputar Konsultasi Butik (FAQ)
            </h2>

            <div class="mt-6 space-y-3.5">
                @foreach ($faqs as $idx => $faq)
                    <div class="faq-item rounded-[20px] bg-white border border-[#E5DEC9] overflow-hidden transition-all">
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
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const productsData = @json($products);

        // Pre-select collection from ?collection= query parameter (for static GitHub Pages)
        const urlParams = new URLSearchParams(window.location.search);
        const queryCollection = urlParams.get('collection');
        const collectionSelect = document.getElementById('collection');
        if (queryCollection && collectionSelect) {
            const matchOpt = Array.from(collectionSelect.options).find(opt =>
                opt.value.toLowerCase().includes(queryCollection.toLowerCase()) ||
                queryCollection.toLowerCase().includes(opt.value.toLowerCase())
            );
            if (matchOpt) {
                collectionSelect.value = matchOpt.value;
            }
        }

        // Scroll to confirmation if form was just submitted via Laravel backend
        @if (!empty($bookingConfirmation) || request()->has('confirmed'))
            document.getElementById('vip-confirmation-section')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
        @endif

        // Client-side VIP Booking handler when hosted statically on GitHub Pages
        const bookingForm = document.getElementById('vip-booking-form');
        const isStaticHost = window.location.hostname.endsWith('github.io') || window.location.protocol === 'file:';
        if (bookingForm && isStaticHost) {
            bookingForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const fullName = document.getElementById('full_name')?.value.trim() || 'Tamu Kehormatan KIRA';
                const email = document.getElementById('email')?.value.trim() || '';
                const whatsapp = document.getElementById('whatsapp')?.value.trim() || '';
                const selectedCol = collectionSelect?.value || 'The Lotus Crown Solitaire';
                const visitDate = document.getElementById('visit_date')?.value.trim() || 'Sabtu, 14 November 2026';
                const timeSlot = document.getElementById('time_slot')?.value || 'Sesi Siang (14:00 WIB)';

                const matchedProduct = productsData.find(p =>
                    selectedCol.toLowerCase().includes(p.name.toLowerCase()) ||
                    p.name.toLowerCase().includes(selectedCol.toLowerCase())
                ) || productsData[0];

                const randomNum = String(Math.floor(Math.random() * 900) + 100);
                const code = `#KIRA-VIP-2026-${randomNum}`;

                const confCode = document.getElementById('conf-code');
                const confDatetime = document.getElementById('conf-datetime');
                const confCollection = document.getElementById('conf-collection');
                const confGia = document.getElementById('conf-gia');
                const confGuestRow = document.getElementById('conf-guest-row');
                const confCard = document.getElementById('vip-confirmation-card');
                const confBadge = document.getElementById('vip-confirmation-badge');
                const confHeading = document.getElementById('conf-heading');
                const confMetaRow = document.getElementById('conf-meta-row');
                const confLocationRow = document.getElementById('conf-location-row');
                const confNoteRow = document.getElementById('conf-note-row');
                const confHomeBtn = document.getElementById('conf-home-btn');

                if (confCode) confCode.textContent = code;
                if (confDatetime) confDatetime.textContent = `${visitDate} (${timeSlot})`;
                if (confCollection) confCollection.textContent = `${matchedProduct.name} (${matchedProduct.carat})`;
                if (confGia) confGia.textContent = matchedProduct.gia_report;
                if (confGuestRow) {
                    confGuestRow.textContent = `Tamu VIP: ${fullName} (${email} • ${whatsapp})`;
                    confGuestRow.classList.remove('hidden');
                }

                // Switch confirmation card to active Midnight Sapphire confirmed theme
                if (confCard) {
                    confCard.className = 'rounded-[28px] bg-[#0F1E2E] text-white border-2 border-[#C99A49] ring-4 ring-[#C99A49]/25 p-7 sm:p-10 shadow-xl transition-all';
                }
                if (confBadge) {
                    confBadge.className = 'inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#C99A49] text-[#0F1E2E] font-sans font-bold text-[10.5px] tracking-wider uppercase mb-6';
                }
                if (confHeading) {
                    confHeading.className = 'font-serif font-bold text-[26px] sm:text-[34px] text-white leading-snug';
                }
                if (confMetaRow) {
                    confMetaRow.className = 'mt-2 font-sans font-bold text-[15.5px] text-[#E6C587]';
                }
                if (confLocationRow) {
                    confLocationRow.className = 'mt-1.5 font-sans font-medium text-[14px] text-[#DCE6F2]';
                }
                if (confNoteRow) {
                    confNoteRow.className = 'mt-1.5 font-sans text-[13px] text-[#DCE6F2]/85';
                }
                if (confHomeBtn) {
                    confHomeBtn.className = 'h-[52px] px-7 rounded-full bg-white/10 border border-white/25 text-white hover:bg-white/20 font-sans font-bold text-[13.5px] flex items-center justify-center transition';
                }

                document.getElementById('vip-confirmation-section')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
            });
        }

        // Interactive FAQ Accordions
        document.querySelectorAll('.faq-item').forEach(item => {
            const btn = item.querySelector('.faq-toggle');
            const ans = item.querySelector('.faq-answer');
            const icon = item.querySelector('.faq-icon');

            btn?.addEventListener('click', () => {
                const isOpen = !ans.classList.contains('hidden');
                if (isOpen) {
                    ans.classList.add('hidden');
                    if (icon) icon.textContent = '+';
                    btn.setAttribute('aria-expanded', 'false');
                } else {
                    ans.classList.remove('hidden');
                    if (icon) icon.textContent = '−';
                    btn.setAttribute('aria-expanded', 'true');
                }
            });
        });
    });
</script>
@endpush

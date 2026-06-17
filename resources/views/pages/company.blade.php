@extends('layouts.app')

@section('title', 'Tentang Kami — PT Aisi Aiken Indonesia')
@section('description', 'Profil PT Aisi Aiken Indonesia — perusahaan manufaktur fire protection 100% Indonesia yang berdiri sejak 2011, bersertifikat ISO 9001:2015 & ISO 14001:2015.')

@section('content')

{{-- ============================================================
     SECTION A — HERO BANNER
     ============================================================ --}}
<section class="bg-primary py-16 md:py-24 relative overflow-hidden" x-data>
    {{-- Decorative triangles --}}
    <div class="absolute -top-12 -right-12 w-72 h-72 opacity-10">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <polygon points="100,10 190,190 10,190" fill="#C41230"/>
        </svg>
    </div>
    <div class="absolute -bottom-8 -left-8 w-48 h-48 opacity-5">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <polygon points="100,10 190,190 10,190" fill="#C41230"/>
        </svg>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 bg-accent/20 border border-accent/30 rounded-full px-4 py-1.5 mb-6 anim-fade-up"
                 x-init="$el.classList.add('anim-visible')">
                <span class="w-2 h-2 rounded-full bg-accent"></span>
                <span class="text-white/80 text-sm font-medium">Berdiri sejak 2011</span>
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-4 anim-fade-up"
                style="--anim-delay: 200ms"
                x-init="$el.classList.add('anim-visible')">
                Tentang PT Aisi Aiken Indonesia
            </h1>
            <p class="text-white/70 text-lg md:text-xl leading-relaxed anim-fade-up"
               style="--anim-delay: 400ms"
               x-init="$el.classList.add('anim-visible')">
                Perusahaan Manufaktur Fire Protection <strong class="text-white font-semibold">100% Indonesia</strong>
                — Bersertifikat ISO 9001:2015 &amp; ISO 14001:2015
            </p>
        </div>
    </div>
</section>

{{-- ============================================================
     SECTION B — CEO SPEECH
     ============================================================ --}}
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 lg:gap-16 items-start">

            {{-- Photo Card --}}
            <div class="lg:col-span-2 flex flex-col items-center lg:items-start gap-4 anim-fade-right"
                 x-data
                 x-intersect.once="$el.classList.add('anim-visible')">
                <div class="relative w-full max-w-xs mx-auto lg:mx-0 aspect-[3/4] bg-slate-100 rounded-2xl overflow-hidden shadow-lg border border-slate-100 group">
                    <img src="{{ asset('image/CEO/PakBambang.png') }}"
                         alt="Bambang — Direktur Utama"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                    {{-- Soft Gradient Overlay at the bottom --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-primary/20 to-transparent opacity-90"></div>

                    {{-- Text info inside overlay --}}
                    <div class="absolute bottom-0 inset-x-0 p-6 text-white z-10">
                        <p class="font-bold text-xl mb-1 text-white">Bambang Suharto</p>
                        <p class="text-xs text-white/80 font-medium tracking-wide">Direktur Utama</p>
                    </div>
                </div>
            </div>

            {{-- Speech content --}}
            <div class="lg:col-span-3 anim-fade-left"
                 x-data
                 x-intersect.once="$el.classList.add('anim-visible')">
                <div class="inline-flex items-center gap-2 bg-accent/10 border border-accent/20 rounded-full px-4 py-1.5 mb-6">
                    <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                    <span class="text-accent text-sm font-semibold">Sambutan Direktur</span>
                </div>

                <h2 class="text-2xl md:text-3xl font-bold text-primary mb-6 leading-tight">
                    Komitmen Kami untuk Keselamatan &amp; Kualitas
                </h2>

                {{-- Blockquote decorative --}}
                <div class="relative pl-6 mb-6">
                    <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-accent rounded-full"></div>
                    <div class="bg-surface rounded-xl p-8 italic text-text-light leading-relaxed">
                        <svg class="w-10 h-10 text-accent/20 mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                        </svg>
                        <p class="text-lg text-text-dark font-medium leading-relaxed not-italic">
                            "Komitmen kami adalah menghadirkan presisi, inovasi, dan kualitas tanpa kompromi pada setiap produk yang kami hasilkan. Dengan semangat dan ketekunan, kami terus memperkuat keahlian, berinvestasi dalam teknologi mutakhir, dan membangun tim yang senantiasa berusaha menetapkan standar keunggulan baru di industri ini."
                        </p>
                    </div>
                </div>

                <p class="text-text-light leading-relaxed mb-6">
                    PT Aisi Aiken Indonesia didirikan dengan visi menjadi perusahaan fire protection
                    terdepan yang sepenuhnya dimiliki dan dioperasikan oleh putra-putri Indonesia.
                    Dengan fasilitas produksi modern di Kawasan Industri Greenland, Cikarang,
                    kami telah melayani lebih dari 30 klien korporat aktif di seluruh nusantara.
                </p>

                <div class="mt-8 border-t border-slate-100 pt-6">
                    <p class="font-bold text-text-dark text-base">Bambang Suharto</p>
                    <p class="text-sm text-text-light font-medium">Direktur Utama, PT Aisi Aiken Indonesia</p>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- ============================================================
     SECTION C — VISI & MISI
     ============================================================ --}}
<section class="py-16 md:py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">
            <x-section-title
                title="Visi & Misi Perusahaan"
                subtitle="Fondasi nilai-nilai yang mengarahkan setiap langkah PT Aisi Aiken Indonesia."
                align="center"
            />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

            {{-- VISI --}}
            <div class="bg-primary rounded-2xl p-8 md:p-10 text-white relative overflow-hidden anim-fade-right"
                 x-data
                 x-intersect.once="$el.classList.add('anim-visible')">
                <div class="absolute top-0 right-0 w-40 h-40 opacity-5">
                    <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <polygon points="100,10 190,190 10,190" fill="white"/>
                    </svg>
                </div>
                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-white/50 text-xs font-semibold uppercase tracking-widest block">Our Vision</span>
                            <h3 class="text-xl font-bold text-white">VISI</h3>
                        </div>
                    </div>
                    <div class="w-12 h-0.5 bg-accent mb-6 rounded-full"></div>
                    <p class="text-white/85 text-lg leading-relaxed">
                        "Menjadi penyedia produk Fire Protection dan Fire Fighting dengan kualitas terbaik dan ramah lingkungan."
                    </p>
                </div>
            </div>

            {{-- MISI --}}
            <div class="bg-accent rounded-2xl p-8 md:p-10 text-white relative overflow-hidden anim-fade-left"
                 x-data
                 x-intersect.once="$el.classList.add('anim-visible')">
                <div class="absolute top-0 right-0 w-40 h-40 opacity-10">
                    <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <polygon points="100,10 190,190 10,190" fill="white"/>
                    </svg>
                </div>
                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-white/60 text-xs font-semibold uppercase tracking-widest block">Our Mission</span>
                            <h3 class="text-xl font-bold text-white">MISI</h3>
                        </div>
                    </div>
                    <div class="w-12 h-0.5 bg-white/40 mb-6 rounded-full"></div>
                    <p class="text-white/90 text-lg leading-relaxed">
                        "Menjadi pemimpin pasar di bidang Fire Protection dan Fire Fighting dengan produk berkualitas tinggi, serta memberikan layanan prima kepada seluruh pelanggan kami."
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============================================================
     SECTION D — PROFIL UMUM PERUSAHAAN
     ============================================================ --}}
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">

            {{-- Section Title --}}
            <div>
                <x-section-title
                    title="Profil Umum Perusahaan"
                    subtitle="Data dan informasi resmi PT Aisi Aiken Indonesia."
                    align="left"
                />

                <div class="mt-8 space-y-0 rounded-2xl overflow-hidden border border-slate-100 shadow-sm anim-fade-up"
                     x-data
                     x-intersect.once="$el.classList.add('anim-visible')">
                    @php
                    $profileData = [
                        ['label' => 'Nama Perusahaan',   'value' => 'PT Aisi Aiken Indonesia'],
                        ['label' => 'Tahun Berdiri',     'value' => '2011'],
                        ['label' => 'Lokasi',            'value' => 'Cikarang, Bekasi, Jawa Barat'],
                        ['label' => 'Fasilitas',         'value' => 'Head Office, Gudang (Warehouse), Lini Produksi'],
                        ['label' => 'Kepemilikan',       'value' => '100% Perusahaan Indonesia'],
                        ['label' => 'Bidang Usaha',      'value' => 'Fire Protection & Fire Fighting Products'],
                        ['label' => 'Sertifikasi',       'value' => 'ISO 9001:2015 & ISO 14001:2015'],
                    ];
                    @endphp

                    @foreach ($profileData as $i => $row)
                    <div class="flex items-start {{ $i % 2 === 0 ? 'bg-surface' : 'bg-white' }} px-5 py-4 border-b border-slate-100 last:border-0">
                        <div class="w-44 shrink-0 text-sm font-semibold text-text-dark">
                            {{ $row['label'] }}
                        </div>
                        <div class="text-sm text-text-light flex-1 leading-relaxed">
                            <span class="text-text-light/40 mr-2">:</span>
                            {{ $row['value'] }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Address & Location card --}}
            <div class="space-y-6">
                <div class="bg-primary rounded-2xl p-7 text-white anim-fade-up"
                     x-data
                     x-intersect.once="$el.classList.add('anim-visible')">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-white text-base">Head Office &amp; Lokasi Produksi</h3>
                    </div>
                    <p class="text-white/75 text-sm leading-relaxed">
                        Kawasan Industri Greenland Cluster Batavia,<br>
                        Jl. Greenland II Blok AE No.15,<br>
                        Deltamas, Cikarang-Bekasi,<br>
                        Jawa Barat 17530
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-surface rounded-xl p-5 border border-slate-100 anim-fade-up"
                         x-data
                         x-intersect.once="$el.classList.add('anim-visible')">
                        <svg class="w-7 h-7 text-accent mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <p class="text-xs text-text-light mb-0.5">Telepon</p>
                        <p class="text-sm font-semibold text-text-dark">(62-21) 2909 2832/33</p>
                    </div>
                    <div class="bg-surface rounded-xl p-5 border border-slate-100 anim-fade-up"
                         style="--anim-delay: 100ms"
                         x-data
                         x-intersect.once="$el.classList.add('anim-visible')">
                        <svg class="w-7 h-7 text-accent mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-xs text-text-light mb-0.5">Email</p>
                        <p class="text-sm font-semibold text-text-dark break-all">marketing.aisi@aisi-aiken.com</p>
                    </div>
                </div>

                {{-- Map placeholder --}}
                <div class="rounded-2xl overflow-hidden border border-slate-100 shadow-sm h-52 bg-gradient-to-br from-slate-100 to-slate-200 flex flex-col items-center justify-center gap-2 anim-fade-up"
                     style="--anim-delay: 200ms"
                     x-data
                     x-intersect.once="$el.classList.add('anim-visible')">
                    <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                    <p class="text-slate-400 text-sm font-medium">Peta Lokasi</p>
                    <p class="text-slate-300 text-xs">Google Maps akan ditambahkan</p>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- ============================================================
     SECTION E — TIMELINE MILESTONE
     ============================================================ --}}
<section class="py-16 md:py-24 bg-surface" x-data>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-14">
            <x-section-title
                title="Perjalanan Kami"
                subtitle="Tonggak pencapaian penting dalam perjalanan PT Aisi Aiken Indonesia membangun kepercayaan dan keunggulan."
                align="center"
            />
        </div>

        @if ($milestones->isNotEmpty())
        {{-- Timeline with real data --}}
        <div class="relative">
            {{-- Vertical center line (desktop) / left line (mobile) --}}
            <div class="absolute left-6 md:left-1/2 top-0 bottom-0 w-0.5 bg-slate-200 md:-translate-x-px"></div>

            <div class="space-y-8 md:space-y-12">
                @foreach ($milestones as $index => $milestone)
                <div
                    x-data="{ shown: false }"
                    x-intersect.once="shown = true"
                    class="relative flex items-start gap-6 md:gap-0
                           {{ $index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    style="transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1); transition-delay: {{ $index * 150 }}ms;"
                >
                    {{-- Content card --}}
                    <div class="ml-12 md:ml-0 md:w-5/12 {{ $index % 2 === 0 ? 'md:pr-12 md:text-right' : 'md:pl-12' }}">
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:border-accent/30 hover:shadow-md transition-all duration-200">
                            <div class="inline-block bg-accent text-white text-sm font-bold px-3 py-1 rounded-lg mb-3">
                                {{ $milestone->year }}
                            </div>
                            <h3 class="font-bold text-text-dark text-base mb-2">{{ $milestone->title }}</h3>
                            @if ($milestone->description)
                            <p class="text-sm text-text-light leading-relaxed">{{ $milestone->description }}</p>
                            @endif
                        </div>
                    </div>

                    {{-- Center dot --}}
                    <div class="absolute left-6 md:left-1/2 md:-translate-x-1/2 w-4 h-4 rounded-full bg-accent border-4 border-white shadow-md mt-6 md:mt-0"></div>

                    {{-- Spacer for alternating side --}}
                    <div class="hidden md:block md:w-5/12"></div>
                </div>
                @endforeach
            </div>
        </div>

        @else
        {{-- Static fallback milestones --}}
        @php
        $staticMilestones = [
            ['year' => '2011', 'title' => 'Pendirian Perusahaan', 'desc' => 'PT Aisi Aiken Indonesia resmi didirikan di Cikarang, Bekasi, Jawa Barat sebagai perusahaan manufaktur fire protection 100% Indonesia.'],
            ['year' => '2013', 'title' => 'Ekspansi Fasilitas Produksi', 'desc' => 'Perluasan lini produksi dan penambahan kapasitas gudang untuk memenuhi permintaan pasar yang terus berkembang.'],
            ['year' => '2015', 'title' => 'Sertifikasi ISO 9001', 'desc' => 'Meraih sertifikasi ISO 9001 sebagai bukti komitmen terhadap sistem manajemen mutu yang konsisten dan terstandar.'],
            ['year' => '2018', 'title' => 'Sertifikasi ISO 14001:2015', 'desc' => 'Meraih sertifikasi ISO 14001:2015 yang membuktikan komitmen AISI terhadap pengelolaan lingkungan yang berkelanjutan.'],
            ['year' => '2021', 'title' => 'Satu Dekade Melayani Indonesia', 'desc' => 'Merayakan 10 tahun perjalanan dengan lebih dari 30 klien korporat aktif dan ribuan produk fire protection yang terdistribusi.'],
            ['year' => '2024', 'title' => 'Inovasi &amp; Pengembangan', 'desc' => 'Terus berinovasi dengan produk generasi terbaru yang lebih ramah lingkungan dan berteknologi tinggi.'],
        ];
        @endphp
        <div class="relative">
            <div class="absolute left-6 md:left-1/2 top-0 bottom-0 w-0.5 bg-slate-200 md:-translate-x-px"></div>
            <div class="space-y-8 md:space-y-12">
                @foreach ($staticMilestones as $index => $m)
                <div
                    x-data="{ shown: false }"
                    x-intersect.once="shown = true"
                    class="relative flex items-start gap-6 md:gap-0
                           {{ $index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    style="transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1); transition-delay: {{ $index * 150 }}ms"
                >
                    <div class="ml-12 md:ml-0 md:w-5/12 {{ $index % 2 === 0 ? 'md:pr-12 md:text-right' : 'md:pl-12' }}">
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:border-accent/30 hover:shadow-md transition-all duration-200">
                            <div class="inline-block bg-accent text-white text-sm font-bold px-3 py-1 rounded-lg mb-3">
                                {{ $m['year'] }}
                            </div>
                            <h3 class="font-bold text-text-dark text-base mb-2">{!! $m['title'] !!}</h3>
                            <p class="text-sm text-text-light leading-relaxed">{{ $m['desc'] }}</p>
                        </div>
                    </div>
                    <div class="absolute left-6 md:left-1/2 md:-translate-x-1/2 w-4 h-4 rounded-full bg-accent border-4 border-white shadow-md mt-6 md:mt-7"></div>
                    <div class="hidden md:block md:w-5/12"></div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>

{{-- ============================================================
     SECTION F — SERTIFIKASI
     ============================================================ --}}
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">
            <x-section-title
                title="Sertifikasi &amp; Standar"
                subtitle="Bukti nyata komitmen kami terhadap kualitas, keselamatan, dan kelestarian lingkungan."
                align="center"
            />
        </div>

        {{-- Certificate Modal --}}
        <div
            id="cert-modal"
            class="fixed inset-0 z-[9999] flex items-center justify-center p-4"
            style="display:none;"
            onclick="closeCertModal(event)"
        >
            {{-- Backdrop --}}
            <div id="cert-modal-backdrop" class="absolute inset-0 bg-black/70 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

            {{-- Modal Panel --}}
            <div
                id="cert-modal-panel"
                class="relative z-10 bg-white rounded-2xl shadow-2xl max-w-3xl w-full max-h-[90vh] flex flex-col overflow-hidden
                       opacity-0 scale-95 transition-all duration-300"
                onclick="event.stopPropagation()"
            >
                {{-- Modal Header --}}
                <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 shrink-0">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-primary/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 id="cert-modal-title" class="font-bold text-text-dark text-base leading-tight"></h3>
                            <p id="cert-modal-subtitle" class="text-xs text-text-light mt-0.5"></p>
                        </div>
                    </div>
                    <button
                        onclick="closeCertModal()"
                        class="w-9 h-9 rounded-lg flex items-center justify-center text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors duration-200"
                        aria-label="Tutup"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                {{-- Image Container --}}
                <div class="flex-1 overflow-auto bg-slate-50 flex items-center justify-center p-4 min-h-0">
                    <div id="cert-modal-loading" class="flex flex-col items-center gap-3 py-16">
                        <div class="w-10 h-10 border-3 border-primary/20 border-t-primary rounded-full animate-spin"
                             style="border-width: 3px;"></div>
                        <p class="text-sm text-text-light">Memuat sertifikat…</p>
                    </div>
                    <img
                        id="cert-modal-img"
                        src=""
                        alt="Sertifikat"
                        class="max-w-full max-h-full object-contain rounded-lg shadow-md hidden"
                        style="max-height: calc(90vh - 180px);"
                        onload="onCertImgLoad()"
                        onerror="onCertImgError()"
                    />
                </div>

                {{-- Modal Footer --}}
                <div class="px-6 py-3 border-t border-slate-100 shrink-0 flex items-center justify-between bg-white">
                    <div id="cert-modal-meta" class="flex items-center gap-4 text-xs text-text-light"></div>
                    <a
                        id="cert-modal-link"
                        href="#"
                        target="_blank"
                        class="inline-flex items-center gap-1.5 text-xs font-semibold text-primary hover:text-accent transition-colors duration-200"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        Buka di tab baru
                    </a>
                </div>
            </div>
        </div>
        {{-- /Certificate Modal --}}

        @if ($certifications->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($certifications as $cert)
            @php
                $hasFile = !empty($cert->certificate_file);
                $fileUrl  = $hasFile
                    ? route('certification.file', basename($cert->certificate_file))
                    : null;
            @endphp
            <div
                class="group bg-white rounded-2xl p-6 border border-slate-100 shadow-sm
                       hover:border-accent/40 hover:shadow-lg transition-all duration-300
                       {{ $hasFile ? 'cursor-pointer select-none' : '' }} anim-scale-in"
                style="--anim-delay: {{ $loop->index * 100 }}ms"
                x-data
                x-intersect.once="$el.classList.add('anim-visible')"
                @if($hasFile)
                onclick="openCertModal(
                    '{{ e($cert->certificate_name) }}',
                    '{{ e($cert->issuing_body) }}',
                    '{{ e($fileUrl) }}',
                    '{{ $cert->certificate_number ? 'No. ' . e($cert->certificate_number) : '' }}',
                    '{{ $cert->valid_until ? 'Berlaku s/d ' . $cert->valid_until->format('d M Y') : '' }}'
                )"
                role="button"
                tabindex="0"
                aria-label="Lihat sertifikat {{ $cert->certificate_name }}"
                onkeydown="if(event.key==='Enter'||event.key===' ') this.click()"
                @endif
            >
                <div class="flex items-start gap-5">
                    {{-- Certificate icon --}}
                    <div class="shrink-0 w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center group-hover:bg-primary transition-colors duration-300">
                        <svg class="w-7 h-7 text-primary group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>

                    {{-- Certificate details --}}
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-2 mb-2">
                            <h3 class="font-bold text-text-dark text-base leading-snug">
                                {{ $cert->certificate_name }}
                            </h3>
                            <div class="flex items-center gap-2 shrink-0">
                                @if ($cert->is_active)
                                <span class="inline-flex items-center gap-1 bg-green-50 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-full border border-green-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                    Aktif
                                </span>
                                @endif
                                @if ($hasFile)
                                <span class="inline-flex items-center gap-1 bg-primary/8 text-primary text-xs font-medium px-2.5 py-1 rounded-full border border-primary/20 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Lihat
                                </span>
                                @endif
                            </div>
                        </div>
                        <p class="text-sm text-text-light mb-3">{{ $cert->issuing_body }}</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-text-light">
                            @if ($cert->certificate_number)
                            <div class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-accent shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                </svg>
                                <span>No. {{ $cert->certificate_number }}</span>
                            </div>
                            @endif
                            @if ($cert->valid_until)
                            <div class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-accent shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>Berlaku s/d {{ $cert->valid_until->format('d M Y') }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @else
        {{-- Static fallback certifications --}}
        @php
        $staticCerts = [
            [
                'name'   => 'ISO 9001:2015',
                'body'   => 'Sistem Manajemen Mutu — BSI Group / Lembaga Sertifikasi Internasional',
                'number' => 'QMS-2015-AISI-001',
                'valid'  => '2024 — 2027',
                'desc'   => 'Menjamin konsistensi proses produksi, kontrol kualitas, dan kepuasan pelanggan sesuai standar internasional.',
            ],
            [
                'name'   => 'ISO 14001:2015',
                'body'   => 'Sistem Manajemen Lingkungan — BSI Group / Lembaga Sertifikasi Internasional',
                'number' => 'EMS-2015-AISI-001',
                'valid'  => '2024 — 2027',
                'desc'   => 'Membuktikan komitmen AISI dalam mengelola dampak lingkungan secara sistematis dan berkelanjutan.',
            ],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($staticCerts as $cert)
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:border-accent/40 hover:shadow-lg transition-all duration-300 group anim-scale-in"
                 style="--anim-delay: {{ $loop->index * 100 }}ms"
                 x-data
                 x-intersect.once="$el.classList.add('anim-visible')">
                <div class="flex items-start gap-5">
                    <div class="shrink-0 w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center group-hover:bg-primary transition-colors duration-300">
                        <svg class="w-7 h-7 text-primary group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-start justify-between gap-2 mb-2">
                            <h3 class="font-bold text-text-dark text-lg">{{ $cert['name'] }}</h3>
                            <span class="shrink-0 inline-flex items-center gap-1 bg-green-50 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-full border border-green-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                Aktif
                            </span>
                        </div>
                        <p class="text-sm text-text-light mb-3 leading-relaxed">{{ $cert['body'] }}</p>
                        <div class="flex flex-wrap gap-x-5 gap-y-1.5 text-xs text-text-light mb-3">
                            <span class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                </svg>
                                No. {{ $cert['number'] }}
                            </span>
                            <span class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Masa berlaku: {{ $cert['valid'] }}
                            </span>
                        </div>
                        <p class="text-xs text-text-light/80 italic">{{ $cert['desc'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

    </div>
</section>

{{-- Certificate Modal Script --}}
@push('scripts')
<script>
(function () {
    const modal     = document.getElementById('cert-modal');
    const backdrop  = document.getElementById('cert-modal-backdrop');
    const panel     = document.getElementById('cert-modal-panel');
    const titleEl   = document.getElementById('cert-modal-title');
    const subtitleEl = document.getElementById('cert-modal-subtitle');
    const loading   = document.getElementById('cert-modal-loading');
    const img       = document.getElementById('cert-modal-img');
    const metaEl    = document.getElementById('cert-modal-meta');
    const linkEl    = document.getElementById('cert-modal-link');

    window.openCertModal = function (name, body, url, number, valid) {
        // Populate
        titleEl.textContent   = name;
        subtitleEl.textContent = body;
        linkEl.href = url;

        // Meta
        let metaHtml = '';
        if (number) metaHtml += `<span class="flex items-center gap-1">
            <svg class="w-3.5 h-3.5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
            </svg>${number}</span>`;
        if (valid) metaHtml += `<span class="flex items-center gap-1">
            <svg class="w-3.5 h-3.5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>${valid}</span>`;
        metaEl.innerHTML = metaHtml;

        // Reset image state
        img.classList.add('hidden');
        img.src = '';
        loading.classList.remove('hidden');

        // Show modal
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';

        // Animate in (rAF ensures display:flex is painted first)
        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                backdrop.style.opacity = '1';
                panel.style.opacity    = '1';
                panel.style.transform  = 'scale(1)';
            });
        });

        // Load image
        img.src = url;
    };

    window.closeCertModal = function (e) {
        if (e && e.target !== modal && e.target !== backdrop) return;
        backdrop.style.opacity = '0';
        panel.style.opacity    = '0';
        panel.style.transform  = 'scale(0.95)';
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = '';
            img.src = '';
        }, 280);
    };

    window.onCertImgLoad = function () {
        loading.classList.add('hidden');
        img.classList.remove('hidden');
    };

    window.onCertImgError = function () {
        loading.innerHTML = `<svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M12 9v2m0 4h.01M5.07 19H19a2 2 0 001.75-2.96l-7-12a2 2 0 00-3.5 0l-7 12A2 2 0 005.07 19z"/>
        </svg>
        <p class="text-sm text-text-light">Gagal memuat sertifikat.</p>`;
    };

    // Escape key close
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && modal.style.display === 'flex') {
            closeCertModal();
        }
    });
})();
</script>
@endpush

{{-- ============================================================
     SECTION G — KEUNGGULAN KOMPETENSI
     ============================================================ --}}
<section class="py-16 md:py-24 bg-primary relative overflow-hidden">
    {{-- Decorative --}}
    <div class="absolute top-0 right-0 w-80 h-80 opacity-5">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <polygon points="100,10 190,190 10,190" fill="white"/>
        </svg>
    </div>
    <div class="absolute bottom-0 left-0 w-56 h-56 opacity-5">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <polygon points="100,10 190,190 10,190" fill="white"/>
        </svg>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12 anim-fade-up"
             x-data="{ visible: false }"
             x-intersect.once="visible = true; $el.classList.add('anim-visible')">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 leading-tight">
                Keunggulan Kompetensi Kami
            </h2>
            <div class="flex justify-center mb-4">
                <span class="block h-1 bg-accent rounded-full transition-all duration-1000 ease-out"
                      :class="visible ? 'w-16' : 'w-0'"></span>
            </div>
            <p class="text-white/65 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                Lima pilar keunggulan yang menjadikan AISI pilihan utama industri fire protection Indonesia.
            </p>
        </div>

        @php
        $competencies = [
            [
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>',
                'title' => 'Inhouse Formulation',
                'desc'  => 'Pengembangan dan formulasi bahan baku dilakukan secara mandiri untuk memastikan komposisi optimal.',
            ],
            [
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>',
                'title' => 'Local Tooling Process',
                'desc'  => 'Proses tooling menggunakan peralatan dan sumber daya lokal untuk efisiensi dan kecepatan produksi.',
            ],
            [
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>',
                'title' => 'Local Manufactured',
                'desc'  => 'Komponen utama diproduksi secara lokal untuk mendukung industri nasional dan menjamin ketersediaan.',
            ],
            [
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>',
                'title' => 'Inhouse Machinery',
                'desc'  => 'Peralatan produksi dimiliki dan dioperasikan sendiri untuk kontrol penuh atas kapasitas dan jadwal produksi.',
            ],
            [
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>',
                'title' => 'Inhouse Production',
                'desc'  => 'Seluruh proses produksi dari awal hingga akhir dikendalikan penuh oleh tim internal AISI.',
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
            @foreach ($competencies as $index => $item)
            <div class="group bg-white/5 border border-white/10 rounded-2xl p-6 hover:bg-white/10 hover:border-accent/40 transition-all duration-300 text-center anim-fade-up"
                 style="--anim-delay: {{ $index * 150 }}ms"
                 x-data
                 x-intersect.once="$el.classList.add('anim-visible')">
                <div class="w-14 h-14 rounded-xl bg-accent/20 flex items-center justify-center mx-auto mb-5 group-hover:bg-accent group-hover:scale-110 transition-all duration-300">
                    <svg class="w-7 h-7 text-accent group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $item['icon'] !!}
                    </svg>
                </div>
                <h3 class="font-bold text-white text-sm mb-3 leading-tight">{{ $item['title'] }}</h3>
                <p class="text-white/55 text-xs leading-relaxed">{{ $item['desc'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- CTA Banner --}}
<section class="py-14 bg-accent anim-fade-up"
         x-data
         x-intersect.once="$el.classList.add('anim-visible')">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-4">
            Tertarik Bekerja Sama dengan AISI?
        </h2>
        <p class="text-white/80 text-base mb-8 max-w-xl mx-auto">
            Hubungi tim kami untuk mendiskusikan kebutuhan fire protection perusahaan Anda.
        </p>
        <a href="{{ route('contact.index') }}"
           class="inline-flex items-center gap-2 px-8 py-3.5 bg-white hover:bg-slate-50 text-accent font-bold rounded-lg transition-all duration-200 hover:-translate-y-0.5 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            Hubungi Kami
        </a>
    </div>
</section>

@endsection

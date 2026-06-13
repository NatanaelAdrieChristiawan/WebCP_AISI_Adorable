@extends('layouts.app')

@section('title', 'PT Aisi Aiken Indonesia — Solusi Fire Protection Terbaik')
@section('description', 'Produsen Fire Protection & Fire Fighting Products bersertifikat ISO 9001:2015 & ISO 14001:2015. 100% Perusahaan Indonesia sejak 2011.')

@section('content')

{{-- ============================================================
     SECTION A — HERO
     ============================================================ --}}
<section class="relative min-h-screen flex items-center overflow-hidden bg-primary">

    {{-- Background gradient overlay --}}
    <div class="absolute inset-0 bg-gradient-to-br from-primary via-primary to-primary-dark opacity-95"></div>

    {{-- Geometric fire-inspired decorations --}}
    {{-- Large triangle top-right --}}
    <div class="absolute -top-24 -right-24 w-96 h-96 opacity-10">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <polygon points="100,10 190,190 10,190" fill="#C41230"/>
        </svg>
    </div>
    {{-- Medium triangle bottom-left --}}
    <div class="absolute -bottom-16 -left-16 w-72 h-72 opacity-10">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <polygon points="100,10 190,190 10,190" fill="#C41230"/>
        </svg>
    </div>
    {{-- Flame-like abstract shape center-right --}}
    <div class="absolute right-0 top-0 h-full w-1/3 opacity-5 hidden lg:block">
        <svg viewBox="0 0 300 600" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-full w-full">
            <path d="M150 580 C60 480 20 380 80 260 C120 180 100 100 150 20 C200 100 180 180 220 260 C280 380 240 480 150 580Z" fill="#C41230"/>
            <path d="M150 520 C90 440 60 360 100 270 C130 200 120 140 150 80 C180 140 170 200 200 270 C240 360 210 440 150 520Z" fill="#FF6B6B" opacity="0.4"/>
        </svg>
    </div>
    {{-- Accent dots pattern --}}
    <div class="absolute top-1/4 right-1/4 opacity-10 hidden md:block">
        <div class="grid grid-cols-5 gap-3">
            @for ($i = 0; $i < 25; $i++)
                <div class="w-1.5 h-1.5 rounded-full bg-accent"></div>
            @endfor
        </div>
    </div>

    {{-- Hero Content --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
        <div class="max-w-3xl">

            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 bg-accent/20 border border-accent/40 rounded-full px-4 py-1.5 mb-8">
                <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                <span class="text-white/90 text-sm font-medium tracking-wide">ISO 9001:2015 &amp; ISO 14001:2015 Certified</span>
            </div>

            {{-- H1 Headline --}}
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                Solusi Perlindungan Kebakaran
                <span class="text-accent">Terbaik</span>
                untuk Industri Anda
            </h1>

            {{-- Subheadline --}}
            <p class="text-white/75 text-lg md:text-xl leading-relaxed mb-10 max-w-2xl">
                Produsen <strong class="text-white font-semibold">Fire Protection &amp; Fire Fighting Products</strong>
                bersertifikat ISO 9001:2015 &amp; ISO 14001:2015 —
                100% Perusahaan Indonesia sejak 2011.
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('products.index') }}"
                   class="inline-flex items-center gap-2 px-7 py-3.5 bg-accent hover:bg-accent-hover text-white font-semibold rounded-lg transition-all duration-200 shadow-lg hover:shadow-accent/30 hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    Lihat Produk Kami
                </a>
                <a href="#"
                   class="inline-flex items-center gap-2 px-7 py-3.5 border-2 border-white/60 hover:border-white text-white font-semibold rounded-lg transition-all duration-200 hover:bg-white/10 hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Unduh Company Profile
                </a>
            </div>

            {{-- Trust indicators --}}
            <div class="mt-12 flex flex-wrap items-center gap-x-8 gap-y-3 text-white/55 text-sm">
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-accent" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Berdiri sejak 2011
                </span>
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-accent" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    30+ Klien Korporat
                </span>
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-accent" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    100% Produksi Lokal
                </span>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center gap-1 text-white/40">
        <span class="text-xs tracking-widest uppercase font-medium">Scroll</span>
        <svg class="w-5 h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>
</section>

{{-- ============================================================
     SECTION B — SOCIAL PROOF STATS
     ============================================================ --}}
<section class="py-16 md:py-20 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">

            @php
            $stats = [
                ['value' => '2011',          'label' => 'Tahun Berdiri',                 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                ['value' => 'ISO 9001',      'label' => 'Bersertifikat ISO 14001:2015',   'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
                ['value' => '30+',           'label' => 'Klien Korporat Aktif',           'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
                ['value' => '100%',          'label' => 'Kepemilikan Indonesia',          'icon' => 'M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9'],
            ];
            @endphp

            @foreach ($stats as $stat)
            <div class="bg-white rounded-2xl p-6 md:p-8 text-center shadow-sm border border-slate-100 group hover:border-accent/30 hover:shadow-md transition-all duration-200">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-primary/10 mb-4 group-hover:bg-accent/10 transition-colors duration-200">
                    <svg class="w-6 h-6 text-primary group-hover:text-accent transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"/>
                    </svg>
                </div>
                <div class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-primary mb-2 leading-none">
                    {{ $stat['value'] }}
                </div>
                <div class="text-sm md:text-base text-text-light font-medium leading-snug">
                    {{ $stat['label'] }}
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

{{-- ============================================================
     SECTION C — WHY CHOOSE AISI
     ============================================================ --}}
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-14">
            <x-section-title
                title="Mengapa Memilih AISI?"
                subtitle="Kami menghadirkan standar tertinggi dalam industri fire protection dengan komitmen pada kualitas, inovasi, dan kepercayaan."
                align="center"
            />
        </div>

        @php
        $advantages = [
            [
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>',
                'title' => 'Manufaktur Sendiri',
                'desc'  => 'Fasilitas produksi sendiri di Cikarang, Bekasi dengan lini produksi modern dan kontrol kualitas ketat di setiap tahap. Inhouse formulation hingga inhouse production process.',
                'color' => 'blue',
            ],
            [
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3c-1.2 5.4-5 7.8-5 12a5 5 0 0010 0c0-4.2-3.8-6.6-5-12z"/>',
                'title' => 'Ramah Lingkungan',
                'desc'  => 'Bersertifikat ISO 14001:2015 — setiap produk dirancang dengan mempertimbangkan dampak lingkungan. Komitmen kami terhadap keberlanjutan tercermin dalam setiap lini produk.',
                'color' => 'green',
            ],
            [
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
                'title' => 'Kualitas Terjamin',
                'desc'  => 'Setiap produk melewati serangkaian uji kualitas sesuai standar ISO 9001:2015. Komponen lokal berkualitas tinggi dengan proses tooling dan machining yang presisi.',
                'color' => 'red',
            ],
            [
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>',
                'title' => 'Layanan Purnajual',
                'desc'  => 'Tim teknisi berpengalaman siap memberikan dukungan teknis, perawatan berkala, dan perbaikan. Layanan purna jual responsif untuk memastikan sistem perlindungan Anda selalu optimal.',
                'color' => 'orange',
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
            @foreach ($advantages as $item)
            <div class="group bg-white border border-slate-100 rounded-2xl p-7 hover:border-accent/50 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <div class="w-14 h-14 rounded-xl bg-surface flex items-center justify-center mb-5 group-hover:bg-accent group-hover:scale-110 transition-all duration-300">
                    <svg class="w-7 h-7 text-primary group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $item['icon'] !!}
                    </svg>
                </div>
                <h3 class="font-bold text-lg text-text-dark mb-3">{{ $item['title'] }}</h3>
                <p class="text-sm text-text-light leading-relaxed">{{ $item['desc'] }}</p>
                <div class="mt-5 flex items-center gap-1.5 text-accent text-sm font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <span>Pelajari Lebih Lanjut</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ============================================================
     SECTION D — PRODUK UNGGULAN
     ============================================================ --}}
<section class="py-16 md:py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <x-section-title
                title="Produk Unggulan Kami"
                subtitle="Solusi fire protection terlengkap dengan teknologi terkini dan standar kualitas internasional."
                align="left"
            />
            <a href="{{ route('products.index') }}"
               class="shrink-0 inline-flex items-center gap-2 text-accent font-semibold text-sm hover:gap-3 transition-all duration-200">
                Lihat Semua Produk
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        @if ($featuredProducts->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($featuredProducts as $product)
            <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 flex flex-col">

                {{-- Product image placeholder --}}
                <div class="relative h-48 bg-gradient-to-br from-slate-100 to-slate-200 overflow-hidden">
                    {{-- Placeholder background pattern --}}
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                        </svg>
                    </div>
                    {{-- Category badge --}}
                    @if ($product->category)
                    <span class="absolute top-3 left-3 bg-accent text-white text-xs font-semibold px-2.5 py-1 rounded-md shadow-sm">
                        {{ $product->category->name }}
                    </span>
                    @endif
                </div>

                {{-- Product info --}}
                <div class="p-5 flex flex-col flex-1">
                    <h3 class="font-bold text-text-dark text-base mb-2 line-clamp-2 group-hover:text-primary transition-colors">
                        {{ $product->name }}
                    </h3>
                    @if ($product->short_description)
                    <p class="text-sm text-text-light leading-relaxed line-clamp-2 mb-4 flex-1">
                        {{ $product->short_description }}
                    </p>
                    @else
                    <div class="flex-1"></div>
                    @endif
                    <a href="{{ route('products.show', $product->slug) }}"
                       class="inline-flex items-center gap-2 text-sm font-semibold text-accent hover:text-accent-hover transition-colors mt-2">
                        Lihat Detail
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        {{-- Placeholder cards when no data --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach (['APAR CO₂', 'Fire Hydrant System', 'Fire Alarm Panel', 'Suppression System'] as $placeholder)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 flex flex-col">
                <div class="h-48 bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                    <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                    </svg>
                </div>
                <div class="p-5">
                    <div class="w-20 h-2.5 bg-slate-200 rounded mb-2"></div>
                    <p class="font-bold text-text-dark text-base">{{ $placeholder }}</p>
                    <p class="text-sm text-text-light mt-2 mb-4">Produk fire protection berkualitas tinggi</p>
                    <span class="text-sm font-semibold text-accent/50">Data belum tersedia</span>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="text-center mt-10">
            <a href="{{ route('products.index') }}"
               class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary hover:bg-primary-dark text-white font-semibold rounded-lg transition-all duration-200 hover:-translate-y-0.5 shadow-md hover:shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                Lihat Semua Produk
            </a>
        </div>

    </div>
</section>

{{-- ============================================================
     SECTION E — KLIEN / CUSTOMER HIGHLIGHT (MARQUEE)
     ============================================================ --}}
<section class="py-16 md:py-24 bg-white overflow-hidden">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
        <div class="text-center">
            <x-section-title
                title="Dipercaya oleh Perusahaan Terkemuka"
                subtitle="Kami bangga menjadi mitra fire protection terpercaya bagi berbagai perusahaan industri terkemuka di Indonesia."
                align="center"
            />
        </div>
    </div>

    {{-- Marquee track --}}
    <div class="relative">
        {{-- Fade edges: left & right gradient mask --}}
        <div class="pointer-events-none absolute inset-y-0 left-0 w-24 md:w-40 z-10
                    bg-gradient-to-r from-white to-transparent"></div>
        <div class="pointer-events-none absolute inset-y-0 right-0 w-24 md:w-40 z-10
                    bg-gradient-to-l from-white to-transparent"></div>

        {{-- Scrolling row — CSS animation only, no JS --}}
        <div class="flex" aria-label="Daftar klien PT Aisi Aiken Indonesia">
            <div class="marquee-track flex items-center gap-6 py-2 animate-marquee hover:pause-marquee">
                @php
                    $clientItems = $featuredClients->isNotEmpty()
                        ? $featuredClients->all()
                        : collect([
                            'Toyota Motor Manufacturing Indonesia',
                            'BYD Motor Indonesia',
                            'VinFast Automobile Indonesia',
                            'DFSK / Sokonindo Automobile',
                            'Kayaba Indonesia',
                            'Astra NTN Driveshaft Indonesia',
                            'Mitsubishi Logistics Indonesia',
                        ])->map(fn($n) => (object)['name' => $n, 'logo' => null])->all();
                @endphp

                {{-- First copy --}}
                @foreach ($clientItems as $client)
                    <div class="marquee-card group flex-shrink-0 flex items-center justify-center
                                min-w-[160px] px-6 py-4 rounded-2xl border border-slate-100 bg-slate-50
                                hover:border-accent/40 hover:bg-white hover:shadow-md
                                transition-all duration-300">
                        @if (!empty($client->logo))
                            <img src="{{ Storage::url($client->logo) }}"
                                 alt="{{ $client->name }}"
                                 class="max-h-10 max-w-[120px] object-contain
                                        opacity-50 grayscale group-hover:opacity-100 group-hover:grayscale-0
                                        transition-all duration-300">
                        @else
                            <span class="text-xs font-bold text-text-light group-hover:text-primary
                                         transition-colors duration-300 text-center leading-tight select-none">
                                {{ $client->name }}
                            </span>
                        @endif
                    </div>
                @endforeach

                {{-- Duplicate copy for seamless loop --}}
                @foreach ($clientItems as $client)
                    <div class="marquee-card group flex-shrink-0 flex items-center justify-center
                                min-w-[160px] px-6 py-4 rounded-2xl border border-slate-100 bg-slate-50
                                hover:border-accent/40 hover:bg-white hover:shadow-md
                                transition-all duration-300" aria-hidden="true">
                        @if (!empty($client->logo))
                            <img src="{{ Storage::url($client->logo) }}"
                                 alt=""
                                 class="max-h-10 max-w-[120px] object-contain
                                        opacity-50 grayscale group-hover:opacity-100 group-hover:grayscale-0
                                        transition-all duration-300">
                        @else
                            <span class="text-xs font-bold text-text-light group-hover:text-primary
                                         transition-colors duration-300 text-center leading-tight select-none">
                                {{ $client->name }}
                            </span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Tagline --}}
    <p class="text-center text-text-light text-sm mt-10 px-4">
        Dan ratusan perusahaan lainnya di seluruh Indonesia yang telah mempercayakan keamanan mereka kepada AISI.
    </p>

</section>

@push('head')
<style>
    /* ── Marquee animation ── */
    @keyframes marquee {
        0%   { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        animation: marquee 30s linear infinite;
        will-change: transform;
    }
    /* Pause on hover anywhere in the track */
    .animate-marquee:hover {
        animation-play-state: paused;
    }
</style>
@endpush

{{-- ============================================================
     SECTION F — ARTIKEL TERBARU
     ============================================================ --}}
<section class="py-16 md:py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <x-section-title
                title="Berita & Aktivitas Terbaru"
                subtitle="Ikuti perkembangan terbaru dari AISI — dari peluncuran produk hingga wawasan industri fire protection."
                align="left"
            />
            <a href="{{ route('blog.index') }}"
               class="shrink-0 inline-flex items-center gap-2 text-accent font-semibold text-sm hover:gap-3 transition-all duration-200">
                Lihat Semua Berita
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        @if ($latestPosts->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            @foreach ($latestPosts as $post)
            <article class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 flex flex-col">

                {{-- Post image --}}
                <div class="relative h-52 bg-gradient-to-br from-slate-100 to-slate-200 overflow-hidden flex items-center justify-center">
                    <svg class="w-14 h-14 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    {{-- Date badge --}}
                    <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm rounded-lg px-3 py-1">
                        <span class="text-xs font-semibold text-text-dark">
                            {{ $post->published_at->translatedFormat('d M Y') }}
                        </span>
                    </div>
                </div>

                {{-- Post content --}}
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-bold text-text-dark text-base leading-snug line-clamp-2 mb-3 group-hover:text-primary transition-colors">
                        {{ $post->title }}
                    </h3>
                    @if ($post->excerpt)
                    <p class="text-sm text-text-light leading-relaxed line-clamp-3 flex-1 mb-4">
                        {{ $post->excerpt }}
                    </p>
                    @else
                    <div class="flex-1"></div>
                    @endif
                    <a href="{{ route('blog.show', $post->slug) }}"
                       class="inline-flex items-center gap-2 text-sm font-semibold text-accent hover:text-accent-hover transition-colors mt-auto">
                        Baca Selengkapnya
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
        @else
        {{-- Placeholder cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            @foreach ([
                ['title' => 'AISI Raih Sertifikasi ISO 14001:2015', 'date' => '10 Jun 2025'],
                ['title' => 'Peluncuran Produk APAR Generasi Terbaru', 'date' => '28 Mei 2025'],
                ['title' => 'Pameran Fire & Safety Indonesia 2025', 'date' => '15 Apr 2025'],
            ] as $placeholder)
            <article class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 flex flex-col">
                <div class="h-52 bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                    <svg class="w-14 h-14 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <span class="text-xs text-text-light mb-2">{{ $placeholder['date'] }}</span>
                    <h3 class="font-bold text-text-dark text-base line-clamp-2 mb-2">{{ $placeholder['title'] }}</h3>
                    <p class="text-sm text-text-light flex-1 mb-4">Konten berita akan tersedia setelah data dipublikasikan oleh tim editorial.</p>
                    <span class="text-sm font-semibold text-accent/40">Segera Hadir</span>
                </div>
            </article>
            @endforeach
        </div>
        @endif

    </div>
</section>

{{-- ============================================================
     CTA BANNER
     ============================================================ --}}
<section class="py-16 md:py-20 bg-primary relative overflow-hidden">
    {{-- Decorative elements --}}
    <div class="absolute top-0 right-0 w-64 h-64 opacity-5">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <polygon points="100,10 190,190 10,190" fill="#C41230"/>
        </svg>
    </div>
    <div class="absolute bottom-0 left-0 w-48 h-48 opacity-5">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <polygon points="100,10 190,190 10,190" fill="#C41230"/>
        </svg>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center gap-2 bg-accent/20 border border-accent/30 rounded-full px-4 py-1.5 mb-6">
            <svg class="w-4 h-4 text-accent" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" clip-rule="evenodd"/>
            </svg>
            <span class="text-white/80 text-sm font-medium">Konsultasi Gratis</span>
        </div>

        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4 leading-tight">
            Butuh Solusi Fire Protection<br class="hidden sm:block">
            untuk Perusahaan Anda?
        </h2>
        <p class="text-white/65 text-lg mb-8 max-w-2xl mx-auto leading-relaxed">
            Tim ahli kami siap membantu menemukan solusi perlindungan kebakaran yang tepat sesuai kebutuhan industri Anda. Hubungi kami sekarang untuk konsultasi gratis.
        </p>
        <div class="flex justify-center">
            <a href="{{ route('contact.index') }}"
               class="inline-flex items-center gap-2 px-8 py-4 bg-accent hover:bg-accent-hover text-white font-bold rounded-lg transition-all duration-200 hover:-translate-y-0.5 shadow-lg hover:shadow-accent/30">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

@endsection

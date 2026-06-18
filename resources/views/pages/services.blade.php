@extends('layouts.app')

@section('title', 'Layanan Kami — PT Aisi Aiken Indonesia')
@section('description', 'Layanan lengkap PT Aisi Aiken Indonesia: Pre-Sales (Product Knowledge, Survey, Demo, Pemasangan) & After-Sales (Garansi, Suku Cadang, Pelatihan, Isi Ulang).')

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
                <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                <span class="text-white/80 text-sm font-medium">Layanan Proteksi Kebakaran Terintegrasi</span>
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-4 anim-fade-up"
                style="--anim-delay: 200ms"
                x-init="$el.classList.add('anim-visible')">
                AISI Services &amp; Solutions
            </h1>
            <p class="text-white/70 text-lg md:text-xl leading-relaxed anim-fade-up"
               style="--anim-delay: 400ms"
               x-init="$el.classList.add('anim-visible')">
                Dukungan menyeluruh mulai dari perencanaan awal, peninjauan risiko, uji coba produk, hingga pemeliharaan jangka panjang demi menjamin keamanan aset berharga Anda.
            </p>
        </div>
    </div>
</section>

{{-- ============================================================
     SECTION B — INTRO & HIGHLIGHT
     ============================================================ --}}
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-surface border border-slate-100 rounded-3xl p-8 md:p-12 shadow-sm flex flex-col lg:flex-row items-center gap-8 lg:gap-12 anim-fade-up"
             x-data
             x-intersect.once="$el.classList.add('anim-visible')">
            <div class="lg:w-1/2">
                <span class="text-accent text-sm font-bold uppercase tracking-wider block mb-3">Solusi Menyeluruh</span>
                <h2 class="text-2xl md:text-3xl font-extrabold text-primary mb-6 leading-tight">
                    Komitmen Layanan Tanpa Batas untuk Fire Safety Anda
                </h2>
                <p class="text-text-light leading-relaxed mb-6">
                    PT Aisi Aiken Indonesia tidak hanya menjual produk pemadam kebakaran berkualitas tinggi, melainkan juga berkomitmen untuk mendampingi setiap pelanggan di setiap tahap. Kami percaya bahwa proteksi kebakaran yang andal lahir dari kombinasi produk bersertifikat dan sistem pelayanan terintegrasi.
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-accent/10 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-text-dark">Tim Ahli &amp; Teknisi Resmi</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-accent/10 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-text-dark">Sertifikasi &amp; Standar SNI</span>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/2 w-full">
                {{-- Decorative visual showing Pre-Sales and After-Sales relationship --}}
                <div class="grid grid-cols-2 gap-4 relative">
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex flex-col items-center text-center hover:border-accent/40 transition-colors duration-200">
                        <div class="w-12 h-12 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-text-dark text-base mb-1">Pre-Sales</h3>
                        <p class="text-xs text-text-light">Konsultasi, survei lapangan, analisis kebutuhan, dan demonstrasi gratis.</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex flex-col items-center text-center hover:border-accent/40 transition-colors duration-200">
                        <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-text-dark text-base mb-1">After-Sales</h3>
                        <p class="text-xs text-text-light">Garansi resmi, pasokan spare part, pelatihan pemadam, dan refill tabung.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     SECTION C — PRE-SALES SERVICES
     ============================================================ --}}
<section class="py-16 md:py-20 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <x-section-title
                title="Layanan Pre-Sales"
                subtitle="Dukungan konsultasi dan penyesuaian sistem proteksi kebakaran sebelum instalasi dilakukan."
                align="left"
            />
        </div>

        @if($preSales->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($preSales as $service)
            <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col anim-fade-up"
                 style="--anim-delay: {{ $loop->index * 100 }}ms"
                 x-data
                 x-intersect.once="$el.classList.add('anim-visible')">
                
                {{-- Service image --}}
                <div class="relative h-44 overflow-hidden bg-slate-100">
                    @if($service->image_url)
                    <img src="{{ $service->image_url }}" 
                         alt="{{ $service->title }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-primary/10 to-primary/5 flex items-center justify-center">
                        <svg class="w-12 h-12 text-primary/25" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-80"></div>
                </div>

                {{-- Card Content --}}
                <div class="p-6 flex flex-col flex-1 relative">
                    {{-- Icon Badge --}}
                    <div class="absolute -top-6 right-6 w-12 h-12 rounded-xl bg-orange-500 text-white flex items-center justify-center shadow-md border border-white/20">
                        @switch($service->icon)
                            @case('heroicon-o-book-open')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                @break
                            @case('heroicon-o-magnifying-glass')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                @break
                            @case('heroicon-o-fire')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/></svg>
                                @break
                            @case('heroicon-o-check-circle')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                @break
                            @default
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        @endswitch
                    </div>

                    <h3 class="font-bold text-text-dark text-lg mb-3 pr-10">{{ $service->title }}</h3>
                    <p class="text-sm text-text-light leading-relaxed flex-1">{{ $service->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-text-light py-8">Layanan pre-sales belum tersedia.</p>
        @endif
    </div>
</section>

{{-- ============================================================
     SECTION D — AFTER-SALES SERVICES
     ============================================================ --}}
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <x-section-title
                title="Layanan After-Sales"
                subtitle="Dukungan pasca pembelian untuk memastikan sistem proteksi Anda selalu dalam kondisi siaga."
                align="left"
            />
        </div>

        @if($afterSales->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($afterSales as $service)
            <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col anim-fade-up"
                 style="--anim-delay: {{ $loop->index * 100 }}ms"
                 x-data
                 x-intersect.once="$el.classList.add('anim-visible')">
                
                {{-- Service image --}}
                <div class="relative h-44 overflow-hidden bg-slate-100">
                    @if($service->image_url)
                    <img src="{{ $service->image_url }}" 
                         alt="{{ $service->title }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-primary/10 to-primary/5 flex items-center justify-center">
                        <svg class="w-12 h-12 text-primary/25" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-80"></div>
                </div>

                {{-- Card Content --}}
                <div class="p-6 flex flex-col flex-1 relative">
                    {{-- Icon Badge --}}
                    <div class="absolute -top-6 right-6 w-12 h-12 rounded-xl bg-green-600 text-white flex items-center justify-center shadow-md border border-white/20">
                        @switch($service->icon)
                            @case('heroicon-o-shield-check')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                @break
                            @case('heroicon-o-cog-6-tooth')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                @break
                            @case('heroicon-o-academic-cap')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/></svg>
                                @break
                            @case('heroicon-o-arrow-path')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 7.89M9 11l3-3 3 3m-3-3v12"/></svg>
                                @break
                            @default
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        @endswitch
                    </div>

                    <h3 class="font-bold text-text-dark text-lg mb-3 pr-10">{{ $service->title }}</h3>
                    <p class="text-sm text-text-light leading-relaxed flex-1">{{ $service->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-text-light py-8">Layanan after-sales belum tersedia.</p>
        @endif
    </div>
</section>

{{-- ============================================================
     SECTION E — SERVICE PHOTO GALLERY (LIGHTBOX)
     ============================================================ --}}
@php
    $galleryItems = $services->filter(fn($s) => !empty($s->image));
@endphp

@if($galleryItems->isNotEmpty())
<section class="py-16 md:py-24 bg-surface" x-data="{ lightboxOpen: false, activeImage: '', activeTitle: '' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <x-section-title
                title="Aktivitas Layanan Kami"
                subtitle="Dokumentasi nyata kegiatan survei, demonstrasi pemadam api, pelatihan tim, dan operasional layanan AISI."
                align="center"
            />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($galleryItems as $item)
            <div class="group relative bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer anim-scale-in"
                 style="--anim-delay: {{ $loop->index * 80 }}ms"
                 x-intersect.once="$el.classList.add('anim-visible')"
                 @click="activeImage = '{{ $item->image_url }}'; activeTitle = '{{ str_replace('\'', '\\\'', $item->title) }}'; lightboxOpen = true">
                
                {{-- Image --}}
                <div class="relative aspect-[4/3] overflow-hidden bg-slate-100">
                    <img src="{{ $item->image_url }}" 
                         alt="{{ $item->title }}" 
                         loading="lazy"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    
                    {{-- Overlay --}}
                    <div class="absolute inset-0 bg-primary/75 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <div class="text-center px-4">
                            <svg class="w-8 h-8 text-white mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                            </svg>
                            <p class="text-white text-xs font-semibold">Buka Foto</p>
                        </div>
                    </div>
                </div>

                {{-- Caption --}}
                <div class="px-4 py-3 bg-white">
                    <p class="font-semibold text-text-dark text-sm leading-snug line-clamp-1">{{ $item->title }}</p>
                    <span class="text-[10px] font-bold text-accent uppercase tracking-widest">{{ $item->category === 'pre-sales' ? 'Pre-Sales' : 'After-Sales' }}</span>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Lightbox Modal --}}
        <div x-show="lightboxOpen"
             x-cloak
             @click.self="lightboxOpen = false"
             @keydown.escape.window="lightboxOpen = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4">
            <div x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="scale-90 opacity-0"
                 x-transition:enter-end="scale-100 opacity-100"
                 class="relative max-w-3xl w-full">
                {{-- Close button --}}
                <button @click="lightboxOpen = false"
                        class="absolute -top-12 right-0 text-white/70 hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                {{-- Full Image --}}
                <img :src="activeImage" 
                     :alt="activeTitle" 
                     class="w-full max-h-[70vh] object-contain rounded-2xl shadow-2xl">

                {{-- Caption --}}
                <div class="mt-4 text-center">
                    <p class="text-white font-semibold text-base" x-text="activeTitle"></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ============================================================
     CTA BANNER
     ============================================================ --}}
<section class="py-16 md:py-20 bg-primary relative overflow-hidden anim-fade-up"
         x-data
         x-intersect.once="$el.classList.add('anim-visible')">
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
        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-4 leading-tight">
            Konsultasikan Kebutuhan Proteksi Kebakaran Anda
        </h2>
        <p class="text-white/65 text-base mb-8 max-w-2xl mx-auto leading-relaxed">
            Butuh demonstrasi alat pemadam kebakaran (APAR), pelatihan keselamatan bagi karyawan, atau peninjauan risiko/survei lokasi pabrik? Tim teknisi ahli AISI siap memberikan layanan prima untuk kebutuhan Anda.
        </p>
        <div class="flex justify-center">
            <a href="{{ route('contact.index') }}"
               class="inline-flex items-center gap-2 px-8 py-4 bg-accent hover:bg-accent-hover text-white font-bold rounded-lg transition-all duration-200 hover:-translate-y-0.5 shadow-lg hover:shadow-accent/30">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Hubungi Kami Sekarang
            </a>
        </div>
    </div>
</section>

@endsection

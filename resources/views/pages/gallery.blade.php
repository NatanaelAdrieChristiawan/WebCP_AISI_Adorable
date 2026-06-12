@extends('layouts.app')

@section('title', 'Galeri — PT Aisi Aiken Indonesia')
@section('description', 'Galeri foto fasilitas produksi, gudang, dan kegiatan PT Aisi Aiken Indonesia — produsen fire protection 100% Indonesia.')

@section('content')

{{-- ============================================================
     SECTION A — HERO BANNER
     ============================================================ --}}
<section class="bg-primary py-16 md:py-24 relative overflow-hidden">
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
        {{-- Breadcrumb --}}
        <div class="mb-8">
            <x-breadcrumb :items="[['label' => 'Galeri']]" />
        </div>

        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 bg-accent/20 border border-accent/30 rounded-full px-4 py-1.5 mb-6">
                <span class="w-2 h-2 rounded-full bg-accent"></span>
                <span class="text-white/80 text-sm font-medium">Foto Fasilitas & Kegiatan</span>
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-4">
                Galeri PT Aisi Aiken Indonesia
            </h1>
            <p class="text-white/70 text-lg md:text-xl leading-relaxed">
                Intip langsung fasilitas produksi, gudang, dan berbagai kegiatan operasional kami di Kawasan Industri Greenland, Cikarang.
            </p>
        </div>
    </div>
</section>

{{-- ============================================================
     SECTION B — GALLERY GRID
     ============================================================ --}}
<section class="py-16 md:py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if ($galleries->isNotEmpty())
        {{-- Masonry-style photo grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            @foreach ($galleries as $item)
            <div
                x-data="{ lightboxOpen: false }"
                class="group relative bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer"
                @click="lightboxOpen = true"
            >
                {{-- Photo --}}
                <div class="relative aspect-square overflow-hidden bg-gradient-to-br from-slate-100 to-slate-200">
                    @if ($item->image && Storage::disk('public')->exists($item->image))
                        <img
                            src="{{ Storage::url($item->image) }}"
                            alt="{{ $item->title }}"
                            loading="lazy"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        >
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center gap-3">
                            <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-xs text-slate-400">Foto belum tersedia</span>
                        </div>
                    @endif

                    {{-- Hover overlay --}}
                    <div class="absolute inset-0 bg-primary/70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <div class="text-center px-4">
                            <svg class="w-10 h-10 text-white mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                            </svg>
                            <p class="text-white text-sm font-semibold">Lihat Foto</p>
                        </div>
                    </div>
                </div>

                {{-- Caption --}}
                <div class="px-4 py-3">
                    <p class="font-semibold text-text-dark text-sm leading-snug line-clamp-2">{{ $item->title }}</p>
                </div>

                {{-- Lightbox Modal --}}
                <div
                    x-show="lightboxOpen"
                    x-cloak
                    @click.self="lightboxOpen = false"
                    @keydown.escape.window="lightboxOpen = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4"
                >
                    <div
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="scale-90 opacity-0"
                        x-transition:enter-end="scale-100 opacity-100"
                        class="relative max-w-3xl w-full"
                    >
                        {{-- Close button --}}
                        <button
                            @click="lightboxOpen = false"
                            class="absolute -top-12 right-0 text-white/70 hover:text-white transition-colors"
                        >
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>

                        {{-- Full image --}}
                        @if ($item->image && Storage::disk('public')->exists($item->image))
                            <img
                                src="{{ Storage::url($item->image) }}"
                                alt="{{ $item->title }}"
                                class="w-full max-h-[75vh] object-contain rounded-2xl shadow-2xl"
                            >
                        @endif

                        {{-- Caption --}}
                        <div class="mt-4 text-center">
                            <p class="text-white font-semibold text-base">{{ $item->title }}</p>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

        {{-- Stats bar --}}
        <p class="text-center text-text-light text-sm mt-10">
            Menampilkan <strong class="text-text-dark">{{ $galleries->count() }}</strong> foto fasilitas & kegiatan PT Aisi Aiken Indonesia.
        </p>

        @else
        {{-- Empty state --}}
        <div class="text-center py-20">
            <div class="w-24 h-24 rounded-2xl bg-slate-100 flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-text-dark mb-2">Galeri Belum Tersedia</h2>
            <p class="text-text-light text-sm max-w-sm mx-auto">
                Foto-foto fasilitas dan kegiatan PT Aisi Aiken Indonesia akan segera dipublikasikan. Silakan kunjungi kembali nanti.
            </p>
        </div>
        @endif

    </div>
</section>

{{-- CTA Banner --}}
<section class="py-14 bg-primary relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 opacity-5">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <polygon points="100,10 190,190 10,190" fill="#C41230"/>
        </svg>
    </div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-4">
            Tertarik Kunjungi Fasilitas Kami?
        </h2>
        <p class="text-white/70 text-base mb-8 max-w-xl mx-auto">
            Hubungi tim kami untuk menjadwalkan kunjungan ke pabrik atau mendapatkan informasi lebih lanjut tentang kapasitas produksi AISI.
        </p>
        <a href="{{ route('contact.index') }}"
           class="inline-flex items-center gap-2 px-8 py-3.5 bg-accent hover:bg-accent-hover text-white font-bold rounded-lg transition-all duration-200 hover:-translate-y-0.5 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            Hubungi Kami
        </a>
    </div>
</section>

@endsection

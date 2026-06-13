@extends('layouts.app')

@section('title', $product->name . ' — PT Aisi Aiken Indonesia')
@section('description', $product->short_description ?? 'Lihat detail produk ' . $product->name . ' dari PT Aisi Aiken Indonesia — solusi fire protection berkualitas.')

@section('content')

@php
    // Build ordered gallery images array (main image first)
    $galleryImages = [];
    if ($product->image) {
        $galleryImages[] = $product->image_url;
    }
    foreach ($product->gallery ?? [] as $imgPath) {
        if (\Storage::disk('public')->exists($imgPath)) {
            $galleryImages[] = \Storage::url($imgPath);
        }
    }
    $mainImageUrl = count($galleryImages) > 0 ? $galleryImages[0] : '';
@endphp

{{-- ============================================================
     SECTION A — BREADCRUMB HERO
     ============================================================ --}}
<section class="bg-primary py-10 md:py-14 relative overflow-hidden">
    <div class="absolute -top-12 -right-12 w-64 h-64 opacity-10">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <polygon points="100,10 190,190 10,190" fill="#C41230"/>
        </svg>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-4">
            <x-breadcrumb :items="[
                ['label' => 'Produk', 'url' => '/products'],
                ['label' => $product->name],
            ]" />
        </div>
        <div class="flex flex-wrap items-center gap-3 mt-3">
            @if ($product->category)
                <span class="inline-block bg-accent/30 border border-accent/50 text-white/90 text-xs font-semibold uppercase tracking-widest px-3 py-1 rounded-md">
                    {{ $product->category->name }}
                </span>
            @endif
        </div>
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-white leading-tight mt-2">
            {{ $product->name }}
        </h1>
    </div>
</section>

{{-- ============================================================
     SECTION B — MAIN PRODUCT CONTENT
     ============================================================ --}}
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 xl:gap-16 items-start">

            {{-- ════════════════════════════
                 KOLOM KIRI — GALERI PRODUK
                 ════════════════════════════ --}}
            <div x-data='{ active: {{ json_encode($mainImageUrl) }}, images: {{ json_encode($galleryImages) }} }'
                 class="lg:sticky lg:top-24">

                {{-- Main Image Display --}}
                <div class="w-full aspect-[4/3] bg-slate-100 rounded-2xl overflow-hidden shadow-md border border-slate-100">
                    <template x-if="active !== ''">
                        <img :src="active"
                             alt="{{ $product->name }}"
                             class="w-full h-full object-cover"
                             loading="eager">
                    </template>
                    <template x-if="active === ''">
                        <div class="w-full h-full flex flex-col items-center justify-center gap-3 bg-gradient-to-br from-slate-50 to-slate-100">
                            {{-- Fire-extinguisher placeholder SVG --}}
                            <svg class="w-20 h-20 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                      d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                      d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                            </svg>
                            <p class="text-slate-400 text-sm font-medium">Gambar akan segera tersedia</p>
                        </div>
                    </template>
                </div>

                {{-- Thumbnail Row (shown only when there are multiple images) --}}
                <div x-show="images.length > 1" class="mt-3 flex gap-2 flex-wrap">
                    <template x-for="(img, idx) in images" :key="idx">
                        <button type="button"
                                @click="active = img"
                                :class="active === img
                                    ? 'ring-2 ring-accent ring-offset-2 opacity-100'
                                    : 'opacity-50 hover:opacity-80'"
                                class="w-16 h-16 rounded-lg overflow-hidden bg-slate-100 shrink-0 border border-slate-200 transition-all duration-150 cursor-pointer">
                            <img :src="img"
                                 class="w-full h-full object-cover"
                                 loading="lazy">
                        </button>
                    </template>
                </div>

            </div>{{-- /galeri --}}

            {{-- ════════════════════════════
                 KOLOM KANAN — INFO PRODUK
                 ════════════════════════════ --}}
            <div class="space-y-6">

                {{-- Category pill --}}
                @if ($product->category)
                    <div>
                        <span class="inline-flex items-center gap-1.5 bg-accent/10 text-accent text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-md border border-accent/20">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                            {{ $product->category->name }}
                        </span>
                    </div>
                @endif

                {{-- Product Name H1 --}}
                <h2 class="text-3xl md:text-4xl font-extrabold text-primary leading-tight">
                    {{ $product->name }}
                </h2>

                {{-- Short description --}}
                @if ($product->short_description)
                    <p class="text-text-light text-base leading-relaxed">
                        {{ $product->short_description }}
                    </p>
                @endif

                {{-- Decorative accent divider --}}
                <div class="border-b-2 border-accent w-16 my-1"></div>

                {{-- Full description --}}
                @if ($product->description)
                    <div class="text-text-dark text-sm leading-relaxed space-y-2">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                @endif

                {{-- ── Keunggulan Produk ── --}}
                @if (!empty($product->features) && count($product->features) > 0)
                    <div class="bg-slate-50 rounded-xl p-5 border border-slate-100">
                        <h3 class="text-sm font-bold text-primary mb-4 flex items-center gap-2 uppercase tracking-wide">
                            <span class="w-5 h-5 rounded bg-accent flex items-center justify-center shrink-0">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            Keunggulan Produk
                        </h3>
                        <ul class="space-y-2.5">
                            @foreach ($product->features as $feature)
                                <li class="flex items-start gap-3 text-sm text-text-dark leading-relaxed">
                                    <svg class="w-4 h-4 text-accent mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- ── Spesifikasi Teknis ── --}}
                <div>
                    <h3 class="text-sm font-bold text-primary mb-3 flex items-center gap-2 uppercase tracking-wide">
                        <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Spesifikasi Teknis
                    </h3>

                    @if (!empty($product->specifications) && count($product->specifications) > 0)
                        <div class="rounded-xl overflow-hidden border border-slate-200">
                            <table class="w-full text-sm">
                                <tbody class="divide-y divide-slate-100">
                                    @foreach ($product->specifications as $key => $value)
                                        <tr class="{{ $loop->even ? 'bg-slate-50' : 'bg-white' }}">
                                            <td class="px-4 py-2.5 font-semibold text-text-dark w-2/5 border-r border-slate-100">
                                                {{ is_string($key) ? $key : 'Spesifikasi ' . ($loop->index + 1) }}
                                            </td>
                                            <td class="px-4 py-2.5 text-text-light">
                                                {{ $value }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-sm text-text-light italic bg-slate-50 rounded-xl px-4 py-3 border border-slate-100">
                            Hubungi kami untuk informasi spesifikasi teknis lengkap.
                        </p>
                    @endif
                </div>

                {{-- ── CTA Buttons ── --}}
                <div class="pt-2">
                    <a href="{{ route('contact.index') }}"
                       class="flex items-center justify-center gap-2 w-full py-3.5 rounded-xl bg-accent text-white font-semibold text-sm shadow-md
                              hover:bg-accent-hover hover:shadow-lg transition-all duration-200 hover:-translate-y-0.5">
                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Hubungi Kami
                    </a>
                </div>

            </div>{{-- /info produk --}}
        </div>{{-- /grid --}}
    </div>
</section>

{{-- ============================================================
     SECTION C — PRODUK TERKAIT
     ============================================================ --}}
@if ($related->isNotEmpty())
<section class="py-16 md:py-20 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <x-section-title
            title="Produk Lainnya"
            subtitle="Temukan produk fire protection lainnya dari kategori yang sama"
            align="left"
        />

        <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($related as $rel)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group flex flex-col">
                    <div class="relative h-[180px] overflow-hidden bg-slate-100 shrink-0">
                        @if ($rel->image)
                            <img src="{{ $rel->image_url }}"
                                 alt="{{ $rel->name }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                 loading="lazy">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-50 to-slate-100">
                                <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                </svg>
                            </div>
                        @endif
                        @if ($rel->category)
                            <span class="absolute top-3 left-3 bg-accent text-white text-xs font-semibold px-2 py-0.5 rounded-md">
                                {{ $rel->category->name }}
                            </span>
                        @endif
                    </div>
                    <div class="px-4 py-4 flex flex-col flex-1">
                        <h3 class="font-bold text-base text-primary leading-snug">{{ $rel->name }}</h3>
                        @if ($rel->short_description)
                            <p class="text-sm text-text-light mt-1 line-clamp-2 leading-relaxed flex-1">
                                {{ $rel->short_description }}
                            </p>
                        @else
                            <div class="flex-1"></div>
                        @endif
                        <a href="{{ route('products.show', $rel->slug) }}"
                           class="mt-3 block text-center py-2 rounded-lg border border-accent text-accent text-sm font-semibold hover:bg-accent hover:text-white transition-all duration-200">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('products.index') }}"
               class="inline-flex items-center gap-2 px-6 py-3 border-2 border-primary text-primary font-semibold rounded-lg hover:bg-primary hover:text-white transition-all duration-200">
                Lihat Semua Produk
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

    </div>
</section>
@endif

@endsection

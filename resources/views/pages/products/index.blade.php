@extends('layouts.app')

@section('title', 'Katalog Produk — PT Aisi Aiken Indonesia')
@section('description', 'Temukan produk fire protection & fire fighting terlengkap dari PT Aisi Aiken Indonesia. Berkualitas tinggi, bersertifikat ISO 9001:2015.')

@section('content')

{{-- ============================================================
     SECTION A — HERO BANNER
     ============================================================ --}}
<section class="bg-primary py-16 md:py-20 relative overflow-hidden">
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
    {{-- Accent dot pattern --}}
    <div class="absolute top-1/3 right-1/4 opacity-10 hidden lg:block">
        <div class="grid grid-cols-4 gap-3">
            @for ($i = 0; $i < 16; $i++)
                <div class="w-1.5 h-1.5 rounded-full bg-accent"></div>
            @endfor
        </div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 bg-accent/20 border border-accent/30 rounded-full px-4 py-1.5 mb-6">
                <span class="w-2 h-2 rounded-full bg-accent"></span>
                <span class="text-white/80 text-sm font-medium">Fire Protection &amp; Fighting Products</span>
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-4">
                Katalog Produk Kami
            </h1>
            <p class="text-white/70 text-lg md:text-xl leading-relaxed">
                Solusi <strong class="text-white font-semibold">Fire Protection &amp; Fighting</strong>
                terlengkap untuk kebutuhan industri Anda.
            </p>
        </div>
    </div>
</section>

{{-- ============================================================
     SECTION B — FILTER & PRODUCT GRID
     ============================================================ --}}
<section class="py-16 md:py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Search & Category Filter --}}
        <form method="GET" action="{{ route('products.index') }}"
              x-data="{ activeCategory: '{{ request('category', '') }}' }"
              class="mb-10">

            {{-- Hidden category field that Alpine updates --}}
            <input type="hidden" name="category" :value="activeCategory">

            {{-- Search Input --}}
            <div class="relative mb-5">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                    <svg class="w-5 h-5 text-text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/>
                    </svg>
                </div>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari nama produk..."
                       class="w-full bg-white border border-slate-200 rounded-xl pl-12 pr-28 py-3.5 text-text-dark
                              placeholder-text-light text-sm shadow-sm
                              focus:outline-none focus:ring-2 focus:ring-accent/30 focus:border-accent transition-colors duration-150">
                <button type="submit"
                        class="absolute inset-y-0 right-0 flex items-center px-5 text-sm font-semibold text-white
                               bg-accent hover:bg-accent-hover rounded-r-xl transition-colors duration-150">
                    Cari
                </button>
            </div>

            {{-- Category Filter Chips --}}
            <div class="flex flex-wrap gap-2 items-center">
                <span class="text-xs font-semibold text-text-light uppercase tracking-wide mr-1 shrink-0">
                    Kategori:
                </span>

                {{-- "Semua" chip --}}
                <button type="button"
                        @click="activeCategory = ''; $el.closest('form').submit()"
                        class="px-4 py-1.5 rounded-full text-sm font-medium transition-all duration-150 border cursor-pointer"
                        :class="activeCategory === ''
                            ? 'bg-accent text-white border-accent shadow-sm'
                            : 'bg-white border-slate-200 text-text-dark hover:border-accent hover:text-accent'">
                    Semua
                </button>

                @foreach ($categories as $cat)
                    <button type="button"
                            @click="activeCategory = '{{ $cat->slug }}'; $el.closest('form').submit()"
                            class="px-4 py-1.5 rounded-full text-sm font-medium transition-all duration-150 border cursor-pointer"
                            :class="activeCategory === '{{ $cat->slug }}'
                                ? 'bg-accent text-white border-accent shadow-sm'
                                : 'bg-white border-slate-200 text-text-dark hover:border-accent hover:text-accent'">
                        {{ $cat->name }}
                    </button>
                @endforeach
            </div>
        </form>

        {{-- Active filter info --}}
        @if (request('category') || request('search'))
            <div class="flex items-center justify-between mb-6 text-sm">
                <p class="text-text-light">
                    Menampilkan
                    <span class="font-semibold text-text-dark">{{ $products->total() }}</span> produk
                    @if (request('search'))
                        untuk <span class="font-semibold text-text-dark">"{{ request('search') }}"</span>
                    @endif
                    @if (request('category') && $categories->firstWhere('slug', request('category')))
                        dalam kategori
                        <span class="font-semibold text-text-dark">
                            {{ $categories->firstWhere('slug', request('category'))->name }}
                        </span>
                    @endif
                </p>
                <a href="{{ route('products.index') }}"
                   class="font-medium text-accent hover:text-accent-hover transition-colors duration-150">
                    Reset Filter &times;
                </a>
            </div>
        @endif

        {{-- ─── Product Grid ─── --}}
        @if ($products->isEmpty())

            {{-- Empty State --}}
            <div class="flex flex-col items-center justify-center py-24 text-center">
                <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center mb-5 shadow-sm border border-slate-100">
                    <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-text-dark mb-2">Produk Tidak Ditemukan</h3>
                <p class="text-text-light text-sm max-w-sm mb-6 leading-relaxed">
                    Tidak ada produk yang cocok dengan filter yang dipilih. Coba kata kunci lain atau lihat semua produk.
                </p>
                <a href="{{ route('products.index') }}"
                   class="inline-flex items-center gap-2 px-6 py-2.5 bg-accent text-white text-sm font-semibold rounded-lg hover:bg-accent-hover transition-colors duration-150">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    Lihat Semua Produk
                </a>
            </div>

        @else

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 xl:gap-8">
                @foreach ($products as $product)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group flex flex-col">

                        {{-- Image Area --}}
                        <div class="relative h-[200px] overflow-hidden bg-slate-100 shrink-0">
                            @if ($product->image)
                                <img src="{{ $product->image_url }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                     loading="lazy">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center gap-2 bg-gradient-to-br from-slate-50 to-slate-100">
                                    <svg class="w-14 h-14 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                                    </svg>
                                    <span class="text-slate-400 text-xs font-medium">Gambar Produk</span>
                                </div>
                            @endif

                            {{-- Category Badge --}}
                            @if ($product->category)
                                <span class="absolute top-3 left-3 bg-accent text-white text-xs font-semibold px-2.5 py-1 rounded-md shadow-sm">
                                    {{ $product->category->name }}
                                </span>
                            @endif

                            {{-- Featured badge --}}
                            @if ($product->is_featured)
                                <span class="absolute top-3 right-3 bg-amber-400 text-amber-900 text-xs font-bold px-2 py-0.5 rounded-md">
                                    Unggulan
                                </span>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="px-5 py-4 flex flex-col flex-1">
                            <h3 class="font-bold text-lg text-primary leading-snug">
                                {{ $product->name }}
                            </h3>

                            @if ($product->short_description)
                                <p class="text-sm text-text-light mt-1.5 line-clamp-2 leading-relaxed flex-1">
                                    {{ $product->short_description }}
                                </p>
                            @else
                                <div class="flex-1"></div>
                            @endif

                            <a href="{{ route('products.show', $product->slug) }}"
                               class="mt-4 block w-full text-center py-2.5 rounded-lg border border-accent text-accent text-sm font-semibold
                                      hover:bg-accent hover:text-white transition-all duration-200">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if ($products->hasPages())
                <div class="mt-14 flex justify-center">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            @endif

        @endif

    </div>
</section>

{{-- ============================================================
     SECTION C — CTA KONSULTASI
     ============================================================ --}}
<section class="py-16 bg-primary relative overflow-hidden">
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 right-0 w-96 h-96 -translate-y-1/2 translate-x-1/4">
            <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <polygon points="100,10 190,190 10,190" fill="#C41230"/>
            </svg>
        </div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-white mb-3">
            Butuh Rekomendasi Produk?
        </h2>
        <p class="text-white/70 text-base mb-8 max-w-xl mx-auto">
            Tim ahli kami siap membantu Anda memilih solusi fire protection yang tepat untuk kebutuhan industri Anda.
        </p>
        <div class="flex justify-center">
            <a href="{{ route('contact.index') }}"
               class="inline-flex items-center gap-2 px-8 py-3.5 rounded-lg bg-accent text-white font-semibold text-sm shadow-md
                      hover:bg-accent-hover hover:shadow-lg transition-all duration-200 hover:-translate-y-0.5">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

@endsection

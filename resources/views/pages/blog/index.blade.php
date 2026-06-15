@extends('layouts.app')

@section('title', 'Berita & Kegiatan — PT Aisi Aiken Indonesia')
@section('description', 'Ikuti perkembangan terbaru, info produk, sertifikasi, dan kegiatan PT Aisi Aiken Indonesia di bidang Fire Protection & Fighting.')

@section('content')

{{-- ============================================================
     SECTION A — HERO BANNER
     ============================================================ --}}
<section class="bg-primary py-16 md:py-20 relative overflow-hidden" x-data>
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
        <div class="mb-8 anim-fade-up"
             x-init="$el.classList.add('anim-visible')">
            <x-breadcrumb :items="[['label' => 'Berita & Kegiatan']]" />
        </div>

        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 bg-accent/20 border border-accent/30 rounded-full px-4 py-1.5 mb-6 anim-fade-up"
                 style="--anim-delay: 200ms"
                 x-init="$el.classList.add('anim-visible')">
                <span class="w-2 h-2 rounded-full bg-accent"></span>
                <span class="text-white/80 text-sm font-medium">AISI Insights</span>
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-4 anim-fade-up"
                style="--anim-delay: 400ms"
                x-init="$el.classList.add('anim-visible')">
                Berita &amp; Aktivitas Terbaru
            </h1>
            <p class="text-white/70 text-lg md:text-xl leading-relaxed anim-fade-up"
               style="--anim-delay: 600ms"
               x-init="$el.classList.add('anim-visible')">
                Informasi terbaru mengenai rilis produk, wawasan industri perlindungan kebakaran, sertifikasi, dan kegiatan operasional perusahaan.
            </p>
        </div>
    </div>
</section>

{{-- ============================================================
     SECTION B — ARTICLES LIST
     ============================================================ --}}
<section class="py-16 md:py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($posts->isEmpty())
            {{-- Empty State --}}
            <div class="flex flex-col items-center justify-center py-20 text-center">
                <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center mb-5 shadow-sm border border-slate-100">
                    <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-text-dark mb-2">Belum Ada Berita</h3>
                <p class="text-text-light text-sm max-w-sm leading-relaxed">
                    Saat ini belum ada artikel atau berita yang dipublikasikan. Silakan kembali lagi nanti.
                </p>
            </div>
        @else
            {{-- Grid of blog cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach ($posts as $post)
                    <article class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 flex flex-col anim-fade-up"
                             style="--anim-delay: {{ $loop->index * 100 }}ms"
                             x-data
                             x-intersect.once="$el.classList.add('anim-visible')">
                        
                        {{-- Post image --}}
                        <div class="relative h-56 bg-slate-100 overflow-hidden flex items-center justify-center shrink-0">
                            @if ($post->featured_image)
                                <img src="{{ $post->image_url }}"
                                     alt="{{ $post->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                     loading="lazy">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center gap-2 bg-gradient-to-br from-slate-50 to-slate-100">
                                    <svg class="w-14 h-14 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                    </svg>
                                    <span class="text-slate-400 text-xs font-medium">AISI News</span>
                                </div>
                            @endif

                            {{-- Date badge --}}
                            <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm rounded-lg px-3 py-1 shadow-sm">
                                <span class="text-xs font-bold text-text-dark">
                                    {{ $post->published_at->translatedFormat('d M Y') }}
                                </span>
                            </div>
                        </div>

                        {{-- Post content --}}
                        <div class="p-6 flex flex-col flex-1">
                            {{-- View count or category placeholder --}}
                            <div class="flex items-center gap-4 text-xs text-text-light mb-3">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    {{ $post->view_count ?? 0 }} pembaca
                                </span>
                            </div>

                            <h3 class="font-bold text-text-dark text-lg leading-snug line-clamp-2 mb-3 group-hover:text-primary transition-colors">
                                {{ $post->title }}
                            </h3>

                            @if ($post->excerpt)
                                <p class="text-sm text-text-light leading-relaxed line-clamp-3 mb-5 flex-1">
                                    {{ $post->excerpt }}
                                </p>
                            @else
                                <div class="flex-1"></div>
                            @endif

                            <a href="{{ route('blog.show', $post->slug) }}"
                               class="inline-flex items-center gap-2 text-sm font-semibold text-accent group-hover:text-accent-hover transition-colors mt-auto">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if ($posts->hasPages())
                <div class="mt-14 flex justify-center">
                    {{ $posts->links() }}
                </div>
            @endif
        @endif

    </div>
</section>

@endsection

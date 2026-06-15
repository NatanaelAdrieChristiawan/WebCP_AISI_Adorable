@extends('layouts.app')

@section('title', $post->meta_title ?? $post->title . ' — PT Aisi Aiken Indonesia')
@section('description', $post->meta_description ?? $post->excerpt ?? Str::limit(strip_tags($post->content), 150))

@section('content')

{{-- ============================================================
     SECTION A — BREADCRUMB HERO
     ============================================================ --}}
<section class="bg-primary py-10 md:py-14 relative overflow-hidden" x-data>
    <div class="absolute -top-12 -right-12 w-64 h-64 opacity-10">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <polygon points="100,10 190,190 10,190" fill="#C41230"/>
        </svg>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 anim-fade-down"
         x-init="$el.classList.add('anim-visible')">
        <div class="mb-4">
            <x-breadcrumb :items="[
                ['label' => 'Berita', 'url' => '/blog'],
                ['label' => Str::limit($post->title, 40)],
            ]" />
        </div>
        
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-white leading-tight mt-3">
            {{ $post->title }}
        </h1>
        
        {{-- Post metadata --}}
        <div class="flex flex-wrap items-center gap-x-6 gap-y-2 mt-4 text-xs md:text-sm text-white/60">
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ $post->published_at->translatedFormat('d F Y') }}
            </span>
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Oleh: {{ $post->author->name ?? 'Admin AISI' }}
            </span>
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                Dilihat: {{ $post->view_count ?? 0 }} kali
            </span>
        </div>
    </div>
</section>

{{-- ============================================================
     SECTION B — ARTICLE CONTENT
     ============================================================ --}}
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Featured image --}}
        @if ($post->featured_image)
            <div class="mb-10 rounded-2xl overflow-hidden shadow-md border border-slate-100 aspect-[21/9] anim-fade-up"
                 x-data
                 x-intersect.once="$el.classList.add('anim-visible')">
                <img src="{{ $post->image_url }}"
                     alt="{{ $post->title }}"
                     class="w-full h-full object-cover">
            </div>
        @endif

        {{-- Article body --}}
        <div class="prose prose-slate max-w-none prose-headings:text-primary prose-a:text-accent prose-headings:font-bold prose-img:rounded-xl anim-fade-up"
             style="--anim-delay: 200ms"
             x-data
             x-intersect.once="$el.classList.add('anim-visible')">
            {!! $post->content !!}
        </div>

        {{-- Share and action buttons --}}
        <div class="mt-14 pt-8 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
            <span class="text-sm font-semibold text-text-dark">Bagikan artikel ini:</span>
            <div class="flex flex-wrap gap-3">
                @php
                    $shareUrl = request()->fullUrl();
                    $waShareText = 'Baca artikel menarik dari PT Aisi Aiken Indonesia: "' . $post->title . '" di ' . $shareUrl;
                    $waShareUrl = 'https://wa.me/?text=' . rawurlencode($waShareText);
                @endphp
                <a href="{{ $waShareUrl }}"
                   target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg text-white font-semibold text-sm transition-all duration-200 hover:-translate-y-0.5"
                   style="background-color: #25D366;">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    WhatsApp
                </a>
            </div>
        </div>

    </div>
</section>

{{-- ============================================================
     SECTION C — RELATED POSTS
     ============================================================ --}}
@if ($related->isNotEmpty())
<section class="py-16 md:py-20 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <x-section-title
            title="Artikel Terkait"
            subtitle="Baca artikel dan berita penting lainnya dari kami"
            align="left"
        />

        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            @foreach ($related as $rel)
                <article class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 flex flex-col anim-fade-up"
                         style="--anim-delay: {{ $loop->index * 100 }}ms"
                         x-data
                         x-intersect.once="$el.classList.add('anim-visible')">
                    <div class="relative h-48 bg-slate-100 overflow-hidden flex items-center justify-center shrink-0">
                        @if ($rel->featured_image)
                            <img src="{{ $rel->image_url }}"
                                 alt="{{ $rel->title }}"
                                 class="w-full h-full object-cover"
                                 loading="lazy">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-50 to-slate-100">
                                <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            </div>
                        @endif
                        <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm rounded-lg px-2.5 py-0.5">
                            <span class="text-xs font-semibold text-text-dark">
                                {{ $rel->published_at->translatedFormat('d M Y') }}
                            </span>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="font-bold text-text-dark text-base leading-snug line-clamp-2 mb-3">{{ $rel->title }}</h3>
                        <a href="{{ route('blog.show', $rel->slug) }}"
                           class="mt-auto inline-flex items-center gap-1.5 text-sm font-semibold text-accent hover:text-accent-hover transition-colors">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

    </div>
</section>
@endif

@endsection

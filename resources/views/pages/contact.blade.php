@extends('layouts.app')

@section('title', 'Hubungi Kami — PT Aisi Aiken Indonesia')
@section('description', 'Hubungi tim marketing PT Aisi Aiken Indonesia untuk konsultasi gratis, penawaran produk fire protection, dan layanan purnajual.')

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

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumb --}}
        <div class="mb-8">
            <x-breadcrumb :items="[['label' => 'Hubungi Kami']]" />
        </div>

        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 bg-accent/20 border border-accent/30 rounded-full px-4 py-1.5 mb-6">
                <span class="w-2 h-2 rounded-full bg-accent"></span>
                <span class="text-white/80 text-sm font-medium">Hubungi Kami</span>
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-4">
                Hubungi PT Aisi Aiken Indonesia
            </h1>
            <p class="text-white/70 text-lg md:text-xl leading-relaxed">
                Kami siap membantu memberikan solusi proteksi kebakaran terbaik bagi perusahaan Anda. Hubungi kami melalui form atau kontak langsung di bawah ini.
            </p>
        </div>
    </div>
</section>

{{-- ============================================================
     SECTION B — CONTACT CONTENT
     ============================================================ --}}
<section class="py-16 md:py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 xl:gap-16 items-start">

            {{-- ════════════════════════════
                 KOLOM KIRI — FORMULIR
                 ════════════════════════════ --}}
            <div class="lg:col-span-7 bg-white rounded-2xl p-6 md:p-10 shadow-sm border border-slate-100">
                <h2 class="text-2xl font-bold text-primary mb-6">Kirim Pesan</h2>
                
                {{-- Success alert --}}
                @if (session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 text-green-800 text-sm flex items-start gap-3">
                        <svg class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        {{-- Nama Lengkap --}}
                        <div>
                            <label for="name" class="block text-sm font-semibold text-text-dark mb-1.5">Nama Lengkap <span class="text-accent">*</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                   class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-text-dark text-sm placeholder-text-light/50 focus:outline-none focus:ring-2 focus:ring-accent/30 focus:border-accent transition-colors @error('name') border-accent @enderror">
                            @error('name')
                                <p class="text-xs text-accent mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-semibold text-text-dark mb-1.5">Email <span class="text-accent">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                   class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-text-dark text-sm placeholder-text-light/50 focus:outline-none focus:ring-2 focus:ring-accent/30 focus:border-accent transition-colors @error('email') border-accent @enderror">
                            @error('email')
                                <p class="text-xs text-accent mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        {{-- Telepon --}}
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-text-dark mb-1.5">No. Telepon / WA</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                   class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-text-dark text-sm placeholder-text-light/50 focus:outline-none focus:ring-2 focus:ring-accent/30 focus:border-accent transition-colors @error('phone') border-accent @enderror">
                            @error('phone')
                                <p class="text-xs text-accent mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Nama Perusahaan --}}
                        <div>
                            <label for="company" class="block text-sm font-semibold text-text-dark mb-1.5">Nama Perusahaan</label>
                            <input type="text" id="company" name="company" value="{{ old('company') }}"
                                   class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-text-dark text-sm placeholder-text-light/50 focus:outline-none focus:ring-2 focus:ring-accent/30 focus:border-accent transition-colors @error('company') border-accent @enderror">
                            @error('company')
                                <p class="text-xs text-accent mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Perihal --}}
                    <div>
                        <label for="subject" class="block text-sm font-semibold text-text-dark mb-1.5">Perihal / Subject <span class="text-accent">*</span></label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                               class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-text-dark text-sm placeholder-text-light/50 focus:outline-none focus:ring-2 focus:ring-accent/30 focus:border-accent transition-colors @error('subject') border-accent @enderror">
                        @error('subject')
                            <p class="text-xs text-accent mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Isi Pesan --}}
                    <div>
                        <label for="message" class="block text-sm font-semibold text-text-dark mb-1.5">Isi Pesan <span class="text-accent">*</span></label>
                        <textarea id="message" name="message" rows="5" required
                                  class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-text-dark text-sm placeholder-text-light/50 focus:outline-none focus:ring-2 focus:ring-accent/30 focus:border-accent transition-colors @error('message') border-accent @enderror">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-xs text-accent mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div>
                        <button type="submit"
                                class="inline-flex items-center justify-center gap-2 w-full sm:w-auto px-8 py-3.5 bg-accent hover:bg-accent-hover text-white font-bold rounded-xl transition-all duration-200 shadow-md hover:shadow-lg cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>

            {{-- ════════════════════════════
                 KOLOM KANAN — INFO KONTAK
                 ════════════════════════════ --}}
            <div class="lg:col-span-5 space-y-6">

                {{-- Kantor & Produksi --}}
                <div class="bg-primary rounded-2xl p-6 md:p-8 text-white relative overflow-hidden shadow-md">
                    <div class="absolute -top-6 -right-6 w-24 h-24 opacity-5">
                        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <polygon points="100,10 190,190 10,190" fill="white"/>
                        </svg>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-white text-base mb-2">Kantor &amp; Produksi</h3>
                            <p class="text-white/75 text-sm leading-relaxed">
                                Kawasan Industri Greenland Cluster Batavia,<br>
                                Jl. Greenland II Blok AE No.15, Deltamas,<br>
                                Cikarang-Bekasi, Jawa Barat 17530
                            </p>
                        </div>
                    </div>
                </div>

                {{-- NPWP --}}
                <div class="bg-white rounded-2xl p-6 md:p-8 border border-slate-100 shadow-sm">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-accent/10 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-primary text-base mb-2">Alamat NPWP</h3>
                            <p class="text-text-light text-sm leading-relaxed">
                                Delta Technology Center 2, Jl. Kaliandra 1 Blok F6-1J RT.000/RW.000, Kel. Cicau, Kec. Cikarang Pusat, Bekasi, Jawa Barat 17530
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Kontak Detail --}}
                <div class="bg-white rounded-2xl p-6 md:p-8 border border-slate-100 shadow-sm space-y-4">
                    {{-- Telepon --}}
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-lg bg-slate-50 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-text-light mb-0.5">Telepon</p>
                            <p class="text-sm font-semibold text-text-dark">(62-21) 2909 2832 / 33</p>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-lg bg-slate-50 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-text-light mb-0.5">Email</p>
                            <p class="text-sm font-semibold text-text-dark">marketing.aisi@aisi-aiken.com</p>
                        </div>
                    </div>

                    {{-- WhatsApp --}}
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-lg bg-green-50 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-text-light mb-0.5">WhatsApp (Bambang - Marketing)</p>
                            <a href="https://wa.me/6281219793197" target="_blank" rel="noopener noreferrer"
                               class="text-sm font-semibold text-green-600 hover:text-green-700 hover:underline">
                                +62 812-1979-3197
                            </a>
                        </div>
                    </div>

                    {{-- Jam Operasional --}}
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-lg bg-slate-50 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-text-light mb-0.5">Jam Operasional</p>
                            <p class="text-sm font-semibold text-text-dark">Senin - Jumat: 08:00 - 17:00 WIB</p>
                        </div>
                    </div>
                </div>

            </div>{{-- /info kontak --}}
        </div>{{-- /grid --}}

        {{-- ════════════════════════════
             PETA GOOGLE MAPS EMBED
             ════════════════════════════ --}}
        <div class="mt-16 rounded-2xl overflow-hidden shadow-sm border border-slate-100 h-[450px]">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.2536294711317!2d107.1711111!3d-6.3611111!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699b0000000001%3A0x0!2zNsKwMjEnNDAuMCJTIMAxMDfCsDEwJzE2LjAiRQ!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

    </div>
</section>

@endsection

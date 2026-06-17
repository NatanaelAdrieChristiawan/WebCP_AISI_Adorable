<footer class="bg-primary text-white">

    {{-- Accent top border --}}
    <div class="h-1 bg-accent"></div>

    {{-- Main Footer Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 lg:gap-16">

            {{-- Column 1: Brand & About --}}
            <div class="space-y-4 anim-fade-up"
                 x-data
                 x-intersect.once="$el.classList.add('anim-visible')">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('image/logo/logo.png') }}" alt="Logo PT Aisi Aiken Indonesia" class="h-8 w-auto object-contain">
                    <span class="text-white font-extrabold text-xl tracking-widest">AISI</span>
                </div>
                <div>
                    <p class="font-semibold text-base">PT Aisi Aiken Indonesia</p>
                    <p class="text-white/60 text-sm mt-1">Fire Protection Solutions</p>
                </div>
                <p class="text-white/55 text-sm leading-relaxed">
                    Menyediakan solusi proteksi kebakaran terpercaya untuk industri dan komersial.
                    Distributor dan kontraktor sistem fire protection berpengalaman.
                </p>
                <p class="text-white/40 text-xs mt-6 pt-4 border-t border-white/10">
                    &copy; {{ date('Y') }} PT Aisi Aiken Indonesia. All Rights Reserved.
                </p>
            </div>

            {{-- Column 2: Quick Links --}}
            <div class="space-y-4 anim-fade-up"
                 style="--anim-delay: 150ms"
                 x-data
                 x-intersect.once="$el.classList.add('anim-visible')">
                <h4 class="font-bold text-sm uppercase tracking-widest text-white/80 after:block after:w-8 after:h-0.5 after:bg-accent after:mt-2">
                    Quick Links
                </h4>
                <ul class="space-y-2.5">
                    @foreach ([
                        ['label' => 'Home',         'url' => '/'],
                        ['label' => 'Produk',       'url' => '/products'],
                        ['label' => 'Tentang Kami', 'url' => '/company'],
                        ['label' => 'Blog',         'url' => '/blog'],
                        ['label' => 'Galeri',       'url' => '/gallery'],
                        ['label' => 'Kontak',       'url' => '/contact'],
                    ] as $link)
                        <li>
                            <a href="{{ url($link['url']) }}"
                               class="text-white/65 hover:text-white text-sm flex items-center gap-2 transition-colors duration-150 group">
                                <span class="w-1 h-1 rounded-full bg-accent shrink-0 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Column 3: Contact Info --}}
            <div class="space-y-4 anim-fade-up"
                 style="--anim-delay: 300ms"
                 x-data
                 x-intersect.once="$el.classList.add('anim-visible')">
                <h4 class="font-bold text-sm uppercase tracking-widest text-white/80 after:block after:w-8 after:h-0.5 after:bg-accent after:mt-2">
                    Kontak Kami
                </h4>
                <ul class="space-y-4 text-sm text-white/65">

                    {{-- Address 1: Kantor & Produksi --}}
                    <li class="flex items-start gap-3">
                        <svg class="w-4 h-4 text-accent shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div class="leading-relaxed">
                            <strong class="text-white font-semibold text-xs uppercase block tracking-wider mb-0.5">Kantor &amp; Produksi</strong>
                            <span class="text-white/65">
                                Kawasan Industri Greenland Cluster Batavia,<br>
                                Jl. Greenland II Blok AE No.15,<br>
                                Deltamas, Cikarang-Bekasi 17530
                            </span>
                        </div>
                    </li>

                    {{-- Address 2: Alamat NPWP --}}
                    <li class="flex items-start gap-3">
                        <svg class="w-4 h-4 text-accent shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <div class="leading-relaxed">
                            <strong class="text-white font-semibold text-xs uppercase block tracking-wider mb-0.5">Alamat NPWP</strong>
                            <span class="text-white/65">
                                Delta Technology Center 2, Jl. Kaliandra 1 Blok F6-1J,<br>
                                Kel. Cicau, Kec. Cikarang Pusat, Bekasi 17530
                            </span>
                        </div>
                    </li>

                    {{-- Phone --}}
                    <li class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-accent shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <a href="tel:+622129092832" class="hover:text-white transition-colors">
                            (62-21) 2909 2832/33
                        </a>
                    </li>

                    {{-- Email --}}
                    <li class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-accent shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:marketing.aisi@aisi-aiken.com" class="hover:text-white transition-colors break-all">
                            marketing.aisi@aisi-aiken.com
                        </a>
                    </li>

                    {{-- WhatsApp --}}
                    <li class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-accent shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        <a href="https://wa.me/6281219793197" target="_blank" rel="noopener noreferrer"
                           class="hover:text-white transition-colors">
                            +62 812-1979-3197
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </div>

    {{-- Bottom bar --}}
    <div class="border-t border-white/10 bg-primary-dark anim-fade-up"
         x-data
         x-intersect.once="$el.classList.add('anim-visible')">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col sm:flex-row items-center justify-between gap-2">
            <p class="text-white/40 text-xs">
                &copy; {{ date('Y') }} PT Aisi Aiken Indonesia. All Rights Reserved.
            </p>
            <p class="text-white/30 text-xs">
                Fire Protection &bull; Fire Alarm &bull; Suppression System
            </p>
        </div>
    </div>

</footer>

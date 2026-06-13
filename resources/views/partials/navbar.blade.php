<nav class="bg-primary sticky top-0 z-50 shadow-lg" x-data="{ mobileOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            {{-- Logo & Brand --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3 shrink-0">
                {{-- Logo mark: image + AISI text --}}
                <div class="flex items-center gap-2">
                    <img src="{{ asset('image/logo/logo.png') }}" alt="Logo PT Aisi Aiken Indonesia" class="h-8 w-auto object-contain">
                    <span class="text-white font-extrabold text-xl tracking-widest">AISI</span>
                </div>
                <div class="hidden sm:block border-l border-white/20 pl-3">
                    <p class="text-white text-xs font-semibold leading-tight">PT Aisi Aiken Indonesia</p>
                    <p class="text-white/60 text-[10px] leading-tight">Fire Protection Solutions</p>
                </div>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden md:flex items-center gap-1">
                @php
                    $navLinks = [
                        ['label' => 'Home',        'url' => '/'],
                        ['label' => 'Produk',      'url' => '/products'],
                        ['label' => 'Tentang Kami','url' => '/company'],
                        ['label' => 'Blog',        'url' => '/blog'],
                        ['label' => 'Galeri',      'url' => '/gallery'],
                        ['label' => 'Kontak',      'url' => '/contact'],
                    ];
                @endphp

                @foreach ($navLinks as $link)
                    @php
                        $urlPath = ltrim($link['url'], '/');
                        $isActive = ($urlPath === '') ? request()->is('/') : (request()->is($urlPath) || request()->is($urlPath . '/*'));
                    @endphp
                    <a href="{{ url($link['url']) }}"
                       class="relative px-4 py-2 text-sm font-medium transition-colors duration-150
                              {{ $isActive
                                  ? 'text-white'
                                  : 'text-white/75 hover:text-white' }}
                              group">
                        {{ $link['label'] }}
                        {{-- Active/hover underline --}}
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-accent transition-all duration-200
                                     {{ $isActive ? 'w-4/5' : 'w-0 group-hover:w-4/5' }}"></span>
                    </a>
                @endforeach
            </div>

            {{-- Desktop CTA --}}
            <div class="hidden md:flex items-center gap-3">
                <a href="{{ url('/contact') }}"
                   class="px-4 py-2 text-sm font-semibold rounded border-2 border-accent text-white
                          hover:bg-accent hover:border-accent transition-all duration-150">
                    Hubungi Kami
                </a>
            </div>

            {{-- Mobile Hamburger --}}
            <button @click="mobileOpen = !mobileOpen"
                    type="button"
                    class="md:hidden inline-flex items-center justify-center p-2 rounded text-white/80
                           hover:text-white hover:bg-primary-light transition-colors duration-150"
                    aria-label="Toggle navigation menu">
                <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

        </div>
    </div>

    {{-- Mobile Dropdown Menu --}}
    <div x-show="mobileOpen"
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="md:hidden bg-primary-dark border-t border-white/10">
        <div class="px-4 py-3 space-y-1">
             @foreach ($navLinks as $link)
                @php
                    $urlPath = ltrim($link['url'], '/');
                    $isActive = ($urlPath === '') ? request()->is('/') : (request()->is($urlPath) || request()->is($urlPath . '/*'));
                @endphp
                <a href="{{ url($link['url']) }}"
                   @click="mobileOpen = false"
                   class="flex items-center gap-3 px-3 py-2.5 rounded text-sm font-medium transition-colors duration-150
                          {{ $isActive
                              ? 'text-white bg-white/10 border-l-2 border-accent'
                              : 'text-white/75 hover:text-white hover:bg-white/5' }}">
                    @if ($isActive)
                        <span class="w-1.5 h-1.5 rounded-full bg-accent shrink-0"></span>
                    @else
                        <span class="w-1.5 h-1.5 rounded-full bg-transparent shrink-0"></span>
                    @endif
                    {{ $link['label'] }}
                </a>
            @endforeach

            <div class="pt-2 border-t border-white/10">
                <a href="{{ url('/contact') }}"
                   @click="mobileOpen = false"
                   class="block w-full text-center px-4 py-2.5 text-sm font-semibold rounded
                          bg-accent text-white hover:bg-accent-hover transition-colors duration-150">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</nav>

@props(['items' => []])

<nav aria-label="Breadcrumb">
    <ol class="flex flex-wrap items-center gap-1 text-sm text-text-light">

        {{-- Home always first --}}
        <li class="flex items-center gap-1">
            <a href="{{ url('/') }}"
               class="flex items-center gap-1 hover:text-accent transition-colors duration-150">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>Home</span>
            </a>
        </li>

        @foreach ($items as $item)
            {{-- Separator --}}
            <li class="text-text-light/40 select-none" aria-hidden="true">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </li>

            <li>
                @if (!empty($item['url']) && !$loop->last)
                    <a href="{{ url($item['url']) }}"
                       class="hover:text-accent transition-colors duration-150">
                        {{ $item['label'] }}
                    </a>
                @else
                    <span class="text-text-dark font-medium" aria-current="page">
                        {{ $item['label'] }}
                    </span>
                @endif
            </li>
        @endforeach

    </ol>
</nav>

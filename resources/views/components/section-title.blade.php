@props(['title', 'subtitle' => null, 'align' => 'center'])

@php
    $alignClasses = match($align) {
        'left'  => 'items-start text-left',
        default => 'items-center text-center',
    };
@endphp

<div class="flex flex-col {{ $alignClasses }} gap-3 anim-fade-up"
     x-data="{ visible: false }"
     x-intersect.once="visible = true; $el.classList.add('anim-visible')">
    <h2 class="text-3xl md:text-4xl font-bold text-primary leading-tight">
        {{ $title }}
    </h2>

    {{-- Decorative red line --}}
    <span class="block h-1 bg-accent rounded-full transition-all duration-1000 ease-out"
          :class="visible ? 'w-16' : 'w-0'"></span>

    @if ($subtitle)
        <p class="text-text-light text-base md:text-lg max-w-2xl leading-relaxed">
            {{ $subtitle }}
        </p>
    @endif
</div>


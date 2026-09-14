@props([
    'eyebrow' => null,
    'title' => '',
    'description' => null,
    'align' => 'left',
])

<div class="{{ $align === 'center' ? 'text-center max-w-3xl mx-auto' : 'max-w-3xl' }} mb-12 lg:mb-16">
    @if($eyebrow)
        <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.22em] text-[#AD8753] font-semibold mb-3">
            <span class="w-1.5 h-1.5 bg-[#AD8753]"></span>
            {{ $eyebrow }}
        </span>
    @endif
    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-[-0.02em] text-[#1E211F] leading-[1.12]">
        {{ $title }}
    </h2>
    @if($description)
        <p class="mt-4 text-[15px] sm:text-base leading-relaxed text-[#676660] font-sans font-light">
            {{ $description }}
        </p>
    @endif
</div>

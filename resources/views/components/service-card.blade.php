@props([
    'service',
])

@php
    $categories = match($service['slug']) {
        'residential-interior' => 'all residential turnkey',
        'commercial-interior', 'office-interior', 'restaurant-cafe-interior' => 'all commercial turnkey',
        'renovation-remodelling' => 'all residential commercial turnkey',
        'exterior-design' => 'all exterior commercial residential',
        default => 'all residential commercial turnkey',
    };
@endphp

<article class="group bg-white hairline-all p-8 lg:p-10 flex flex-col justify-between transition-all duration-300 hover:shadow-md hover:border-[#AD8753]/30 glow-card reveal-card" data-service-category="{{ $categories }}">
    <div>
        {{-- Service Image / Visual Thumbnail --}}
        <div class="w-full aspect-[16/9] mb-6 overflow-hidden bg-[#EFEAE2]">
            <img src="{{ $service['image'] }}" 
                 alt="{{ $service['title'] }} - Champion Interior Design" 
                 loading="lazy" 
                 width="600" 
                 height="340" 
                 class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-[1.03]">
        </div>

        <div class="flex items-center justify-between gap-4 mb-2">
            <span class="text-[10px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold">
                {{ $service['bengali_title'] }}
            </span>
            <span class="text-[11px] text-[#676660] font-sans">
                Turnkey Atelier
            </span>
        </div>

        <h3 class="font-serif text-2xl lg:text-3xl text-[#1E211F] group-hover:text-[#AD8753] transition-colors leading-tight font-medium">
            <a href="{{ route('services.show', $service['slug']) }}">
                {{ $service['title'] }}
            </a>
        </h3>

        <p class="mt-3 text-[14px] leading-relaxed text-[#676660] font-light">
            {{ $service['summary'] }}
        </p>

        {{-- Scope Highlights --}}
        <ul class="mt-6 space-y-2 text-[12px] text-[#1E211F] hairline-t pt-4">
            @foreach(array_slice($service['scope_items'], 0, 3) as $item)
                <li class="flex items-start gap-2">
                    <span class="text-[#AD8753] mt-0.5">✦</span>
                    <span class="font-normal">{{ $item }}</span>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-8 pt-4 hairline-t flex items-center justify-between">
        <a href="{{ route('services.show', $service['slug']) }}" 
           class="inline-flex items-center gap-2 text-[12px] uppercase tracking-[0.16em] font-medium text-[#1E211F] group-hover:text-[#AD8753] transition-colors">
            <span>Explore Service Scope</span>
            <span>→</span>
        </a>
    </div>
</article>

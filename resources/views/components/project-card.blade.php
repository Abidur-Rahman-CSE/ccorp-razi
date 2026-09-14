@props([
    'project',
    'featured' => false,
])

<article class="group relative flex flex-col bg-[#EFEAE2]/50 hairline-all overflow-hidden transition-all duration-300 hover:shadow-lg reveal-card" data-project-hover="true">
    {{-- Project Image Container --}}
    <a href="{{ route('projects.show', $project['slug']) }}" class="relative w-full aspect-[16/10] overflow-hidden block bg-[#EFEAE2] parallax-wrap">
        <img src="{{ $project['cover_image'] }}" 
             alt="{{ $project['title'] }} - {{ $project['category'] }} in {{ $project['location'] }}"
             loading="lazy" 
             width="800" 
             height="500" 
             class="w-full h-full object-cover parallax-img transition-transform duration-700 ease-out group-hover:scale-[1.04]">
        
        {{-- Floating Glass Status Pill --}}
        <div class="absolute top-4 left-4 z-10">
            <span class="glass-pill px-3 py-1 text-[10px] uppercase tracking-[0.16em] text-[#1E211F] font-semibold">
                {{ $project['location'] }}
            </span>
        </div>

        <div class="absolute top-4 right-4 z-10">
            <span class="glass-pill px-3 py-1 text-[10px] uppercase tracking-[0.16em] text-[#AD8753] font-semibold">
                {{ $project['year'] }}
            </span>
        </div>
    </a>

    {{-- Project Metadata Body --}}
    <div class="p-6 lg:p-8 flex flex-col grow justify-between bg-white">
        <div>
            <div class="text-[11px] uppercase tracking-[0.18em] text-[#AD8753] font-semibold mb-2">
                {{ $project['category'] }} • {{ $project['area'] }}
            </div>
            <h3 class="font-serif text-2xl lg:text-3xl text-[#1E211F] group-hover:text-[#AD8753] transition-colors leading-tight font-medium">
                <a href="{{ route('projects.show', $project['slug']) }}">
                    {{ $project['title'] }}
                </a>
            </h3>
            <p class="mt-3 text-[14px] leading-relaxed text-[#676660] font-sans font-light line-clamp-2">
                {{ $project['tagline'] }}
            </p>
        </div>

        {{-- Footer Specs & Link --}}
        <div class="mt-6 pt-5 hairline-t flex items-center justify-between text-[12px]">
            <span class="text-[#676660] uppercase tracking-[0.12em] font-medium">
                {{ $project['scope'] }}
            </span>
            <a href="{{ route('projects.show', $project['slug']) }}" 
               class="inline-flex items-center gap-1.5 text-[#1E211F] group-hover:text-[#AD8753] font-medium uppercase tracking-[0.14em] transition-colors">
                <span>View Dossier</span>
                <span>→</span>
            </a>
        </div>
    </div>
</article>

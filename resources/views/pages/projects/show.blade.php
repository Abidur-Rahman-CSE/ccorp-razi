<x-layouts.public 
    :title="$title"
    :metaDescription="$metaDescription"
    :metaImage="$metaImage"
    :breadcrumbs="$breadcrumbs"
>
    <x-slot:head>
        <link rel="preload" as="image" href="{{ asset($project['cover_image']) }}" fetchpriority="high">
    </x-slot:head>

    <article class="py-12 lg:py-20 px-6 lg:px-12 max-w-7xl mx-auto">
        {{-- Breadcrumbs --}}
        <nav aria-label="Breadcrumb" class="mb-8 text-[11px] uppercase tracking-[0.16em] text-[#676660]">
            <ol class="flex items-center gap-2">
                <li><a href="{{ route('home') }}" class="hover:text-[#AD8753] transition-colors">Home</a></li>
                <li class="text-[#AD8753]">/</li>
                <li><a href="{{ route('projects.index') }}" class="hover:text-[#AD8753] transition-colors">Projects</a></li>
                <li class="text-[#AD8753]">/</li>
                <li class="text-[#1E211F] font-medium" aria-current="page">{{ $project['title'] }}</li>
            </ol>
        </nav>

        {{-- Project Header --}}
        <header class="max-w-4xl mb-12">
            <div class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.22em] text-[#AD8753] font-semibold mb-3">
                <span class="w-1.5 h-1.5 bg-[#AD8753]"></span>
                {{ $project['category'] }} • {{ $project['location'] }}
            </div>
            <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-[-0.03em] text-[#1E211F] leading-[1.1]">
                {{ $project['title'] }}
            </h1>
            <p class="mt-4 text-lg sm:text-xl text-[#676660] font-light leading-relaxed">
                {{ $project['tagline'] }}
            </p>
        </header>

        {{-- Hero Showcase Photography --}}
        <div class="w-full aspect-[16/9] md:aspect-[21/10] overflow-hidden bg-[#EFEAE2] hairline-all mb-14">
            <img src="{{ asset($project['cover_image']) }}" 
                 alt="{{ $project['title'] }} - Champion Interior Design" 
                 fetchpriority="high"
                 width="1600"
                 height="900"
                 class="w-full h-full object-cover">
        </div>

        {{-- Project Specifications Bar --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 p-8 bg-white hairline-all mb-16 text-[13px]">
            <div>
                <span class="text-[10px] uppercase tracking-[0.18em] text-[#AD8753] block font-semibold mb-1">Location</span>
                <strong class="text-[#1E211F] font-medium">{{ $project['location'] }}</strong>
            </div>
            <div>
                <span class="text-[10px] uppercase tracking-[0.18em] text-[#AD8753] block font-semibold mb-1">Scale / Area</span>
                <strong class="text-[#1E211F] font-medium">{{ $project['area'] }}</strong>
            </div>
            <div>
                <span class="text-[10px] uppercase tracking-[0.18em] text-[#AD8753] block font-semibold mb-1">Year of Handover</span>
                <strong class="text-[#1E211F] font-medium">{{ $project['year'] }}</strong>
            </div>
            <div>
                <span class="text-[10px] uppercase tracking-[0.18em] text-[#AD8753] block font-semibold mb-1">Project Scope</span>
                <strong class="text-[#1E211F] font-medium">{{ $project['scope'] }}</strong>
            </div>
        </div>

        {{-- Case Study Narrative: Brief, Constraints, Scope, Outcome --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 mb-20">
            <div class="lg:col-span-7 space-y-10">
                {{-- 1. Brief --}}
                <div>
                    <span class="text-[10px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold block mb-1">01 / The Brief</span>
                    <h2 class="font-serif text-2xl lg:text-3xl text-[#1E211F] mb-4 font-normal">Project Brief</h2>
                    <p class="text-[15px] leading-relaxed text-[#676660] font-light">
                        {{ $project['summary'] }}
                    </p>
                </div>

                {{-- 2. Constraints --}}
                <div class="pt-8 hairline-t">
                    <span class="text-[10px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold block mb-1">02 / Constraints</span>
                    <h2 class="font-serif text-2xl lg:text-3xl text-[#1E211F] mb-4 font-normal">Site Constraints & Challenges</h2>
                    <p class="text-[15px] leading-relaxed text-[#676660] font-light">
                        {{ $project['challenge'] }}
                    </p>
                </div>

                {{-- 3. Scope of Work --}}
                <div class="pt-8 hairline-t">
                    <span class="text-[10px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold block mb-1">03 / Scope</span>
                    <h2 class="font-serif text-2xl lg:text-3xl text-[#1E211F] mb-4 font-normal">Scope of Work</h2>
                    <p class="text-[15px] leading-relaxed text-[#676660] font-light mb-4">
                        Turnkey execution scope: {{ $project['scope'] }}.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        @foreach($project['services'] as $service)
                            <div class="flex items-center gap-2 text-[13px] text-[#1E211F] bg-[#F7F5F0] px-3.5 py-2.5 border border-black/5">
                                <span class="text-[#AD8753]">✦</span>
                                <span>{{ $service }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- 4. Outcome --}}
                <div class="pt-8 hairline-t">
                    <span class="text-[10px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold block mb-1">04 / Outcome</span>
                    <h2 class="font-serif text-2xl lg:text-3xl text-[#1E211F] mb-4 font-normal">Design Outcome & Execution</h2>
                    <p class="text-[15px] leading-relaxed text-[#676660] font-light">
                        {{ $project['solution'] }}
                    </p>
                </div>
            </div>

            {{-- Sidebar: Materiality & Inquiries --}}
            <div class="lg:col-span-5 space-y-8">
                <div class="bg-[#EFEAE2]/60 p-8 hairline-all">
                    <h3 class="text-[11px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold mb-4">
                        Materiality & Finishes
                    </h3>
                    <ul class="space-y-2.5 text-[13px] text-[#1E211F]">
                        @foreach($project['materials'] as $material)
                            <li class="flex items-center gap-2">
                                <span class="text-[#AD8753]">✦</span>
                                <span>{{ $material }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Direct Studio Contact Card --}}
                <div class="bg-[#1E211F] text-[#F7F5F0] p-8 hairline-all">
                    <h4 class="font-serif text-xl text-white font-normal mb-2">Commission a Similar Project</h4>
                    <p class="text-[13px] text-[#A1A09A] mb-6">
                        Contact our Dhaka studio to discuss your residential, commercial, or renovation project.
                    </p>
                    <a href="{{ route('contact') }}" 
                       class="block w-full text-center py-3.5 bg-[#AD8753] text-[#1E211F] text-[11px] uppercase tracking-[0.18em] font-semibold hover:bg-white transition-colors">
                        Start a Project
                    </a>
                </div>
            </div>
        </div>

        {{-- Project Gallery --}}
        <section class="mb-24" aria-label="Project Visuals">
            <div class="flex items-center justify-between mb-8">
                <h2 class="font-serif text-3xl text-[#1E211F] font-normal">Project Gallery</h2>
                <span class="text-[11px] uppercase tracking-[0.16em] text-[#676660]">Visual Documentation</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($project['gallery'] as $galleryImage)
                    <div class="overflow-hidden bg-[#EFEAE2] hairline-all aspect-[16/10] shadow-sm">
                        <img src="{{ asset($galleryImage) }}" 
                             alt="{{ $project['title'] }} architectural view" 
                             loading="lazy" 
                             width="800" 
                             height="500" 
                             class="w-full h-full object-cover">
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Related Projects --}}
        @if(!empty($relatedProjects))
            <section class="pt-16 hairline-t" aria-label="Related Works">
                <h2 class="font-serif text-3xl text-[#1E211F] mb-8 font-normal">Related Studio Works</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach(array_slice($relatedProjects, 0, 2) as $related)
                        <x-project-card :project="$related" />
                    @endforeach
                </div>
            </section>
        @endif
    </article>
</x-layouts.public>

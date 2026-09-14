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

        {{-- Dossier Specifications Bar --}}
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

        {{-- Case Study Narrative Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 mb-20">
            <div class="lg:col-span-7 space-y-8">
                <div>
                    <h2 class="font-serif text-2xl lg:text-3xl text-[#1E211F] mb-4 font-normal">Project Overview</h2>
                    <p class="text-[15px] leading-relaxed text-[#676660] font-light">
                        {{ $project['summary'] }}
                    </p>
                </div>

                <div class="pt-6 hairline-t">
                    <h2 class="font-serif text-2xl lg:text-3xl text-[#1E211F] mb-4 font-normal">The Design Challenge</h2>
                    <p class="text-[15px] leading-relaxed text-[#676660] font-light">
                        {{ $project['challenge'] }}
                    </p>
                </div>

                <div class="pt-6 hairline-t">
                    <h2 class="font-serif text-2xl lg:text-3xl text-[#1E211F] mb-4 font-normal">The Architectural Approach</h2>
                    <p class="text-[15px] leading-relaxed text-[#676660] font-light">
                        {{ $project['solution'] }}
                    </p>
                </div>
            </div>

            {{-- Sidebar: Materiality & Scope --}}
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

                    <h3 class="text-[11px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold mt-8 mb-4">
                        Turnkey Services Delivered
                    </h3>
                    <ul class="space-y-2.5 text-[13px] text-[#1E211F]">
                        @foreach($project['services'] as $service)
                            <li class="flex items-center gap-2">
                                <span class="text-[#AD8753]">✓</span>
                                <span>{{ $service }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Direct Atelier Concierge Card --}}
                <div class="bg-[#1E211F] text-[#F7F5F0] p-8 hairline-all">
                    <h4 class="font-serif text-xl text-white font-normal mb-2">Commission a Similar Space</h4>
                    <p class="text-[13px] text-[#A1A09A] mb-6">
                        Speak directly with Founder & CEO Mushfiqur Rahman Razi regarding your residential or commercial site.
                    </p>
                    <a href="{{ route('contact') }}" 
                       class="block w-full text-center py-3 bg-[#AD8753] text-[#1E211F] text-[11px] uppercase tracking-[0.18em] font-semibold hover:bg-white transition-colors">
                        Book a Consultation
                    </a>
                </div>
            </div>
        </div>

        {{-- Large Image Gallery --}}
        <section class="mb-24" aria-label="Project Gallery">
            <h2 class="font-serif text-3xl text-[#1E211F] mb-8 font-normal">Visual Documentation</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($project['gallery'] as $galleryImage)
                    <div class="overflow-hidden bg-[#EFEAE2] hairline-all aspect-[16/10]">
                        <img src="{{ asset($galleryImage) }}" 
                             alt="{{ $project['title'] }} detail photography" 
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

<x-layouts.public 
    :title="$title"
    :metaDescription="$metaDescription"
    :metaImage="$metaImage"
    :breadcrumbs="$breadcrumbs"
>
    <x-slot:head>
        <link rel="preload" as="image" href="{{ asset($service['image']) }}" fetchpriority="high">
    </x-slot:head>

    <article class="py-12 lg:py-20 px-6 lg:px-12 max-w-7xl mx-auto">
        {{-- Breadcrumbs --}}
        <nav aria-label="Breadcrumb" class="mb-8 text-[11px] uppercase tracking-[0.16em] text-[#676660]">
            <ol class="flex items-center gap-2">
                <li><a href="{{ route('home') }}" class="hover:text-[#AD8753] transition-colors">Home</a></li>
                <li class="text-[#AD8753]">/</li>
                <li><a href="{{ route('services.index') }}" class="hover:text-[#AD8753] transition-colors">Services</a></li>
                <li class="text-[#AD8753]">/</li>
                <li class="text-[#1E211F] font-medium" aria-current="page">{{ $service['title'] }}</li>
            </ol>
        </nav>

        {{-- Header --}}
        <header class="max-w-4xl mb-12">
            <div class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.22em] text-[#AD8753] font-semibold mb-3">
                <span class="w-1.5 h-1.5 bg-[#AD8753]"></span>
                {{ $service['bengali_title'] }} • Turnkey Practice
            </div>
            <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-[-0.03em] text-[#1E211F] leading-[1.1]">
                {{ $service['title'] }}
            </h1>
            <p class="mt-4 text-lg sm:text-xl text-[#676660] font-light leading-relaxed">
                {{ $service['tagline'] }}
            </p>
        </header>

        {{-- Hero Visual --}}
        <div class="w-full aspect-[16/9] md:aspect-[21/10] overflow-hidden bg-[#EFEAE2] hairline-all mb-16">
            <img src="{{ asset($service['image']) }}" 
                 alt="{{ $service['title'] }} - Champion Interior Design" 
                 fetchpriority="high"
                 width="1600"
                 height="900"
                 class="w-full h-full object-cover">
        </div>

        {{-- Main Narrative & Deliverables Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 mb-20">
            <div class="lg:col-span-7 space-y-8">
                <div>
                    <h2 class="font-serif text-2xl lg:text-3xl text-[#1E211F] mb-4 font-normal">Practice Overview</h2>
                    <p class="text-[15px] leading-relaxed text-[#676660] font-light">
                        {{ $service['overview'] }}
                    </p>
                </div>

                <div class="pt-6 hairline-t">
                    <h2 class="font-serif text-2xl lg:text-3xl text-[#1E211F] mb-4 font-normal">Detailed Scope of Work</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
                        @foreach($service['scope_items'] as $item)
                            <div class="p-4 bg-white hairline-all flex items-start gap-3">
                                <span class="text-[#AD8753] mt-0.5">✦</span>
                                <span class="text-[13px] text-[#1E211F] font-medium">{{ $item }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="pt-6 hairline-t">
                    <h2 class="font-serif text-2xl lg:text-3xl text-[#1E211F] mb-4 font-normal">Client Deliverables & Documentation</h2>
                    <ul class="space-y-3 text-[14px] text-[#676660]">
                        @foreach($service['deliverables'] as $deliverable)
                            <li class="flex items-center gap-3">
                                <span class="text-[#AD8753] font-bold">✓</span>
                                <span>{{ $deliverable }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Sidebar: Consultation & Other Services --}}
            <div class="lg:col-span-5 space-y-8">
                <div class="bg-[#1E211F] text-[#F7F5F0] p-8 hairline-all">
                    <span class="text-[10px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold block mb-2">Request Service Scope</span>
                    <h3 class="font-serif text-2xl text-white font-normal mb-3">Discuss Your Space</h3>
                    <p class="text-[13px] text-[#A1A09A] leading-relaxed mb-6">
                        Schedule an initial consultation to review your spatial layout, 3D visualization needs, or turnkey construction budget.
                    </p>
                    <a href="{{ route('contact') }}" 
                       class="block w-full text-center py-3.5 bg-[#AD8753] text-[#1E211F] text-[11px] uppercase tracking-[0.18em] font-semibold hover:bg-white transition-colors">
                        Book a Consultation
                    </a>
                    <div class="mt-4 pt-4 hairline-t border-white/10 text-center text-[12px] text-[#A1A09A]">
                        <span>Direct phone: </span>
                        <a href="tel:+8801715394444" class="text-white hover:text-[#AD8753] font-medium">01715394444</a>
                    </div>
                </div>

                {{-- Other Disciplines Navigation --}}
                <div class="bg-white p-8 hairline-all">
                    <h3 class="text-[11px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold mb-4">
                        Other Studio Practices
                    </h3>
                    <ul class="space-y-2.5 text-[13px] text-[#1E211F]">
                        @foreach(array_slice($otherServices, 0, 5) as $other)
                            <li>
                                <a href="{{ route('services.show', $other['slug']) }}" class="hover:text-[#AD8753] transition-colors flex items-center justify-between">
                                    <span>{{ $other['title'] }}</span>
                                    <span class="text-[#AD8753]">→</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </article>
</x-layouts.public>

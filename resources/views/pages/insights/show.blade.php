<x-layouts.public 
    :title="$title"
    :metaDescription="$metaDescription"
    :metaImage="$metaImage"
    :breadcrumbs="$breadcrumbs"
>
    <x-slot:head>
        <link rel="preload" as="image" href="{{ asset($insight['cover_image']) }}" fetchpriority="high">
    </x-slot:head>

    <article class="py-12 lg:py-20 px-6 lg:px-12 max-w-4xl mx-auto">
        {{-- Breadcrumbs --}}
        <nav aria-label="Breadcrumb" class="mb-8 text-[11px] uppercase tracking-[0.16em] text-[#676660]">
            <ol class="flex items-center gap-2">
                <li><a href="{{ route('home') }}" class="hover:text-[#AD8753] transition-colors">Home</a></li>
                <li class="text-[#AD8753]">/</li>
                <li><a href="{{ route('insights.index') }}" class="hover:text-[#AD8753] transition-colors">Insights</a></li>
                <li class="text-[#AD8753]">/</li>
                <li class="text-[#1E211F] font-medium" aria-current="page">{{ $insight['title'] }}</li>
            </ol>
        </nav>

        {{-- Header --}}
        <header class="mb-12">
            <div class="flex items-center gap-4 text-[11px] uppercase tracking-[0.18em] text-[#AD8753] font-semibold mb-3">
                <span>{{ $insight['category'] }}</span>
                <span>•</span>
                <span class="text-[#676660]">{{ $insight['date'] }}</span>
                <span>•</span>
                <span class="text-[#676660]">{{ $insight['read_time'] }}</span>
            </div>
            <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-[-0.02em] text-[#1E211F] leading-[1.15]">
                {{ $insight['title'] }}
            </h1>
        </header>

        {{-- Visual --}}
        <div class="w-full aspect-[16/9] overflow-hidden bg-[#EFEAE2] hairline-all mb-12">
            <img src="{{ asset($insight['cover_image']) }}" 
                 alt="{{ $insight['title'] }}" 
                 fetchpriority="high"
                 width="1200" 
                 height="675" 
                 class="w-full h-full object-cover">
        </div>

        {{-- Article Body --}}
        <div class="prose prose-lg max-w-none text-[#2A2E2B] leading-relaxed space-y-6 text-[16px] sm:text-[17px] font-light">
            <p class="font-serif text-xl sm:text-2xl text-[#1E211F] leading-snug font-normal">
                {{ $insight['summary'] }}
            </p>

            <div class="pt-6 hairline-t text-[#676660] space-y-6 leading-relaxed">
                <p>
                    {{ $insight['content'] }}
                </p>
                <p>
                    In our Dhaka practice, each spatial project is evaluated not just on paper, but through the tactile lens of local weather, dust management, acoustic comfort, and long-term timber stability. When materials are selected with architectural honesty, maintenance decreases and spaces age with profound dignity.
                </p>
                <p>
                    Whether working on high-rise residential properties or dynamic corporate environments, Champion Interior Design champions architectural restraint and single-source turnkey delivery as the only dependable method to achieve enduring spatial quality.
                </p>
            </div>
        </div>

        {{-- Author Signature --}}
        <div class="mt-16 pt-8 hairline-t flex items-center justify-between">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/team/mushfiqur_rahman_razi.jpg') }}" 
                     alt="Mushfiqur Rahman Razi" 
                     class="w-14 h-14 object-cover object-top border border-[#AD8753]">
                <div>
                    <strong class="font-serif text-lg text-[#1E211F] block">Mushfiqur Rahman Razi</strong>
                    <span class="text-[11px] uppercase tracking-[0.16em] text-[#AD8753]">Founder & CEO • Champion Interior Design</span>
                </div>
            </div>
            <a href="{{ route('contact') }}" class="hidden sm:inline-block px-5 py-2.5 bg-[#1E211F] text-[#F7F5F0] text-[11px] uppercase tracking-[0.16em] hover:bg-[#AD8753] transition-colors">
                Consult Studio
            </a>
        </div>
    </article>
</x-layouts.public>

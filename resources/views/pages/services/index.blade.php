<x-layouts.public 
    :title="$title"
    :metaDescription="$metaDescription"
    :breadcrumbs="$breadcrumbs"
>
    <div class="py-16 lg:py-24 px-6 lg:px-12 max-w-7xl mx-auto">
        {{-- Breadcrumbs --}}
        <nav aria-label="Breadcrumb" class="mb-8 text-[11px] uppercase tracking-[0.16em] text-[#676660]">
            <ol class="flex items-center gap-2">
                <li><a href="{{ route('home') }}" class="hover:text-[#AD8753] transition-colors">Home</a></li>
                <li class="text-[#AD8753]">/</li>
                <li class="text-[#1E211F] font-medium" aria-current="page">Services</li>
            </ol>
        </nav>

        {{-- Page Header --}}
        <x-section-heading 
            eyebrow="Core Disciplines"
            title="Turnkey Interior & Architectural Services"
            description="From initial spatial concept and 3D visualization through physical carpentry, MEP engineering, and final handover, Champion Interior Design delivers comprehensive spatial solutions in Bangladesh."
        />

        {{-- Services Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
                <x-service-card :service="$service" />
            @endforeach
        </div>

        {{-- Consultation Box --}}
        <div class="mt-20 p-10 lg:p-14 bg-[#1E211F] text-[#F7F5F0] flex flex-col md:flex-row items-center justify-between gap-8 hairline-all">
            <div>
                <span class="text-[11px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold block mb-2">Turnkey Accountability</span>
                <h3 class="font-serif text-2xl lg:text-3xl font-normal">Need an end-to-end design & build team?</h3>
                <p class="mt-2 text-[14px] text-[#A1A09A] max-w-xl">
                    We manage all sub-trades, civil modifications, electrical, and master joinery with guaranteed milestone timelines.
                </p>
            </div>
            <a href="{{ route('contact') }}" 
               class="shrink-0 px-7 py-4 bg-[#AD8753] text-[#1E211F] hover:bg-white text-[12px] uppercase tracking-[0.18em] font-semibold transition-colors">
                Book a Consultation
            </a>
        </div>
    </div>
</x-layouts.public>

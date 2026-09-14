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
                <li class="text-[#1E211F] font-medium" aria-current="page">Process</li>
            </ol>
        </nav>

        {{-- Page Header --}}
        <x-section-heading 
            eyebrow="Architectural Methodology"
            title="The 8-Step Turnkey Process"
            description="Our disciplined, predictable workflow transforms conceptual briefs into white-glove, move-in ready architectural spaces without budget overruns or delays."
        />

        {{-- Process Steps Detailed Timeline --}}
        <div class="space-y-8 mb-24">
            @foreach($steps as $step)
                <div class="p-8 lg:p-12 bg-white hairline-all grid grid-cols-1 lg:grid-cols-12 gap-8 items-start hover:border-[#AD8753]/40 transition-colors">
                    {{-- Step Number & Duration --}}
                    <div class="lg:col-span-3">
                        <span class="font-serif text-4xl lg:text-5xl text-[#AD8753] font-light block leading-none">
                            {{ $step['step'] }}
                        </span>
                        <span class="text-[11px] uppercase tracking-[0.20em] text-[#676660] font-semibold block mt-3">
                            {{ $step['duration'] }}
                        </span>
                        <span class="text-[10px] uppercase tracking-[0.16em] text-[#AD8753] block mt-1">
                            {{ $step['bengali_title'] }}
                        </span>
                    </div>

                    {{-- Step Content --}}
                    <div class="lg:col-span-9 space-y-4">
                        <h3 class="font-serif text-2xl sm:text-3xl text-[#1E211F] font-normal">
                            {{ $step['title'] }}
                        </h3>
                        <p class="text-[15px] leading-relaxed text-[#676660] font-light">
                            {{ $step['description'] }}
                        </p>

                        <div class="pt-4 hairline-t">
                            <span class="text-[11px] uppercase tracking-[0.16em] text-[#1E211F] font-semibold block mb-2">
                                Key Deliverables & Actions:
                            </span>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-[13px] text-[#676660]">
                                @foreach($step['details'] as $detail)
                                    <li class="flex items-center gap-2">
                                        <span class="text-[#AD8753]">✦</span>
                                        <span>{{ $detail }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Bottom Consultation Banner --}}
        <div class="p-10 lg:p-16 bg-[#1E211F] text-[#F7F5F0] text-center max-w-4xl mx-auto hairline-all">
            <span class="text-[10px] uppercase tracking-[0.22em] text-[#AD8753] font-semibold block mb-2">
                Initiate Step 01
            </span>
            <h3 class="font-serif text-3xl sm:text-4xl text-white font-normal mb-4">
                Ready to begin your spatial consultation?
            </h3>
            <p class="text-[15px] text-[#A1A09A] max-w-xl mx-auto mb-8">
                Connect with our team to arrange an on-site survey or studio briefing for your residence or commercial project.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact') }}" class="px-8 py-4 bg-[#AD8753] text-[#1E211F] text-[12px] uppercase tracking-[0.18em] font-semibold hover:bg-white transition-colors">
                    Book Consultation
                </a>
                <a href="https://wa.me/8801715394444" target="_blank" rel="noopener noreferrer" class="px-8 py-4 border border-white/20 text-white text-[12px] uppercase tracking-[0.18em] font-medium hover:border-[#AD8753] transition-colors">
                    WhatsApp Concierge
                </a>
            </div>
        </div>
    </div>
</x-layouts.public>

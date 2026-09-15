<x-layouts.public 
    :title="$title"
    :metaDescription="$metaDescription"
    :faqs="$faqs"
>
    {{-- Hero Preload Hint for Optimal LCP --}}
    <x-slot:head>
        <link rel="preload" as="image" href="{{ asset('images/showcase/hero_penthouse_dhaka.jpg') }}" fetchpriority="high">
    </x-slot:head>

    {{-- HERO SECTION --}}
    <section class="relative min-h-[90vh] lg:min-h-screen flex items-center justify-center px-6 lg:px-12 py-16 lg:py-24 overflow-hidden" aria-label="Introduction">
        {{-- Background Architectural Image with Subtle Gradient Overlay --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/showcase/hero_penthouse_dhaka.jpg') }}" 
                 alt="Warm luxury penthouse living space in Gulshan, Dhaka designed by Champion Interior Design"
                 fetchpriority="high"
                 width="1920"
                 height="1080"
                 class="w-full h-full object-cover object-center scale-[1.01] transition-transform duration-1000">
            <div class="absolute inset-0 bg-gradient-to-r from-[#F7F5F0]/95 via-[#F7F5F0]/80 to-[#F7F5F0]/30 lg:via-[#F7F5F0]/65 lg:to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#F7F5F0] via-transparent to-transparent h-48 bottom-0"></div>
        </div>

        {{-- Hero Content Container --}}
        <div class="relative z-10 max-w-7xl w-full mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-8">
                {{-- Architectural Eyebrow Badge --}}
                <div class="inline-flex items-center gap-3 glass-pill px-4 py-1.5 text-[11px] uppercase tracking-[0.22em] text-[#1E211F] font-semibold mb-6">
                    <span class="w-1.5 h-1.5 bg-[#AD8753]"></span>
                    <span>Dhaka, Bangladesh • Turnkey Atelier</span>
                </div>                {{-- Marquee Headline with Architectural Text Mask Reveal --}}
                <h1 class="reveal-text font-serif text-4xl sm:text-6xl lg:text-7xl font-normal tracking-[-0.03em] text-[#1E211F] leading-[1.05] max-w-3xl">
                    <span class="clip-line-wrap"><span class="clip-line">Spaces Designed Around the Way You Live.</span></span>
                </h1>

                <p class="mt-6 text-base sm:text-lg lg:text-xl text-[#2A2E2B] font-light leading-relaxed max-w-2xl">
                    Champion Interior Design provides bespoke design-to-execution services for premier residential penthouses, corporate headquarters, and architectural renovations across Bangladesh.
                </p>

                {{-- Action Buttons --}}
                <div class="mt-8 sm:mt-10 flex flex-wrap items-center gap-4">
                    <a href="#consultation" 
                       class="px-7 py-4 bg-[#1E211F] text-[#F7F5F0] hover:bg-[#AD8753] text-[12px] uppercase tracking-[0.18em] font-medium transition-all duration-300 shadow-md">
                        Start Your Project
                    </a>
                    <a href="{{ route('projects.index') }}" 
                       class="px-7 py-4 bg-white/80 hover:bg-white text-[#1E211F] border border-[#1E211F]/20 hover:border-[#AD8753] text-[12px] uppercase tracking-[0.18em] font-medium transition-all duration-300 backdrop-blur-sm">
                        Explore Our Work
                    </a>
                    <a href="https://wa.me/8801715394444" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="inline-flex items-center gap-2 px-5 py-4 text-[#1E211F] hover:text-[#AD8753] text-[12px] uppercase tracking-[0.16em] font-medium transition-colors">
                        <span>WhatsApp Concierge</span>
                        <span>→</span>
                    </a>
                </div>

                {{-- Micro Trust Metadata --}}
                <div class="mt-12 pt-8 hairline-t max-w-xl grid grid-cols-3 gap-6 text-[12px]">
                    <div>
                        <span class="block text-[#AD8753] font-serif text-xl sm:text-2xl font-normal">Turnkey</span>
                        <span class="text-[#676660] uppercase tracking-[0.12em] text-[10px]">Single Accountability</span>
                    </div>
                    <div>
                        <span class="block text-[#AD8753] font-serif text-xl sm:text-2xl font-normal">In-House</span>
                        <span class="text-[#676660] uppercase tracking-[0.12em] text-[10px]">Master Joinery</span>
                    </div>
                    <div>
                        <span class="block text-[#AD8753] font-serif text-xl sm:text-2xl font-normal">Dhaka</span>
                        <span class="text-[#676660] uppercase tracking-[0.12em] text-[10px]">Prime Enclaves</span>
                    </div>
                </div>
            </div>

            {{-- Floating Architectural Spec Dossier Card --}}
            <div class="lg:col-span-4 hidden lg:block reveal-card" style="transition-delay: 350ms;">
                <div class="glass-panel p-6 max-w-sm ml-auto">
                    <div class="flex items-center justify-between text-[10px] uppercase tracking-[0.18em] text-[#AD8753] font-semibold mb-3">
                        <span>Showcase Dossier</span>
                        <span>2025 Handover</span>
                    </div>
                    <h3 class="font-serif text-xl text-[#1E211F] font-normal leading-snug">
                        Gulshan Lakeview Penthouse
                    </h3>
                    <p class="mt-2 text-[12px] text-[#676660] leading-relaxed">
                        6,400 sq.ft residential residence featuring honed Italian travertine, smoked oak wall paneling, and acoustic isolation.
                    </p>
                    <div class="mt-4 pt-4 hairline-t flex items-center justify-between text-[11px]">
                        <span class="text-[#1E211F] font-medium">Turnkey Execution</span>
                        <a href="{{ route('projects.show', 'gulshan-lakeview-penthouse') }}" class="text-[#AD8753] hover:underline uppercase tracking-[0.14em] font-medium">
                            Inspect →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CREDIBILITY / DISCIPLINE STRIP --}}
    <section class="bg-[#1E211F] text-[#F7F5F0] py-6 px-6 lg:px-12 hairline-b border-black/40 overflow-hidden" aria-label="Credibility Highlights">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-6 text-[12px] uppercase tracking-[0.18em]">
            <div class="flex items-center gap-3">
                <span class="text-[#AD8753]">✦</span>
                <span>Turnkey Execution</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-[#AD8753]">✦</span>
                <span>Residential Interiors</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-[#AD8753]">✦</span>
                <span>Commercial & Boardrooms</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-[#AD8753]">✦</span>
                <span>Photorealistic 3D Planning</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-[#AD8753]">✦</span>
                <span>Architectural Façade</span>
            </div>
        </div>
    </section>

    {{-- SIGNATURE SERVICES SECTION --}}
    <section class="py-24 lg:py-32 px-6 lg:px-12 max-w-7xl mx-auto" id="services">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
            <x-section-heading 
                eyebrow="Core Practices"
                title="Comprehensive Design & Turnkey Solutions"
                description="From initial spatial zoning and 3D visualization through physical carpentry, MEP engineering, and final delivery, Champion Interior Design handles every phase under one roof."
            />
            <a href="{{ route('services.index') }}" 
               class="inline-flex items-center gap-2 text-[12px] uppercase tracking-[0.16em] font-medium text-[#1E211F] hover:text-[#AD8753] transition-colors pb-2 hairline-b border-[#1E211F]">
                <span>View All 8 Practices</span>
                <span>→</span>
            </a>
        </div>

        {{-- Interactive Category Filter Tabs --}}
        <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-10 text-[12px] uppercase tracking-[0.16em] relative border-b border-black/10">
            <div id="service-tab-indicator" class="absolute bottom-0 h-[2px] bg-[#AD8753] transition-all duration-300 pointer-events-none"></div>
            <button type="button" data-service-tab="all" class="px-4 py-2 font-medium active-tab text-charcoal transition-colors cursor-pointer">All Practices</button>
            <button type="button" data-service-tab="residential" class="px-4 py-2 font-medium text-charcoal-muted hover:text-charcoal transition-colors cursor-pointer">Residential</button>
            <button type="button" data-service-tab="commercial" class="px-4 py-2 font-medium text-charcoal-muted hover:text-charcoal transition-colors cursor-pointer">Commercial</button>
            <button type="button" data-service-tab="turnkey" class="px-4 py-2 font-medium text-charcoal-muted hover:text-charcoal transition-colors cursor-pointer">Turnkey</button>
            <button type="button" data-service-tab="exterior" class="px-4 py-2 font-medium text-charcoal-muted hover:text-charcoal transition-colors cursor-pointer">Façade</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($signatureServices as $service)
                <x-service-card :service="$service" />
            @endforeach
        </div>
    </section>

    {{-- FEATURED PROJECTS PORTFOLIO --}}
    <section class="py-24 lg:py-32 px-6 lg:px-12 bg-[#EFEAE2]/40 hairline-t hairline-b" id="projects">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
                <x-section-heading 
                    eyebrow="Selected Works"
                    title="Spaces That Speak With Quiet Authority"
                    description="A curated look inside completed residences and corporate headquarters in Gulshan, Banani, and Baridhara."
                />
                <a href="{{ route('projects.index') }}" 
                   class="inline-flex items-center gap-2 text-[12px] uppercase tracking-[0.16em] font-medium text-[#1E211F] hover:text-[#AD8753] transition-colors pb-2 hairline-b border-[#1E211F]">
                    <span>View All Dossiers</span>
                    <span>→</span>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @foreach($featuredProjects as $project)
                    <x-project-card :project="$project" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- INTERACTIVE BEFORE / AFTER TRANSFORMATION ISLAND --}}
    <section class="py-24 lg:py-32 px-6 lg:px-12 max-w-7xl mx-auto" id="transformation">
        <div class="max-w-3xl mb-12">
            <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.22em] text-[#AD8753] font-semibold mb-3">
                <span class="w-1.5 h-1.5 bg-[#AD8753]"></span>
                Execution Reality
            </span>
            <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-[-0.02em] text-[#1E211F] leading-[1.12]">
                From Raw Concrete to Finished Sanctuary
            </h2>
            <p class="mt-4 text-[15px] sm:text-base leading-relaxed text-[#676660] font-light">
                Drag the interactive slider to inspect our spatial transformation. We turn unfinished bare shells into warm, acoustically calibrated environments with custom millwork and lighting.
            </p>
        </div>

        {{-- Progressive React Island with Complete Server-Rendered HTML Fallback --}}
        <div id="before-after-island"
             data-before="{{ asset('images/showcase/before_renovation.jpg') }}"
             data-after="{{ asset('images/showcase/after_renovation.jpg') }}"
             data-label-before="Before • Bare Concrete Shell"
             data-label-after="After • Finished Penthouse Sanctuary"
             class="w-full">
            {{-- Pure HTML Fallback (Visible when JavaScript is disabled or before hydration) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="relative bg-[#EFEAE2] overflow-hidden hairline-all">
                    <img src="{{ asset('images/showcase/before_renovation.jpg') }}" 
                         alt="Before renovation: bare unfinished concrete apartment shell in Dhaka"
                         loading="lazy" 
                         width="800" 
                         height="450" 
                         class="w-full aspect-[16/9] object-cover">
                    <div class="p-4 bg-white">
                        <span class="text-[11px] uppercase tracking-[0.16em] text-[#676660] font-semibold block">Before Renovation</span>
                        <p class="text-[13px] text-[#1E211F] mt-1">Raw structural shell, exposed conduit, bare concrete surfaces.</p>
                    </div>
                </div>
                <div class="relative bg-[#EFEAE2] overflow-hidden hairline-all">
                    <img src="{{ asset('images/showcase/after_renovation.jpg') }}" 
                         alt="After renovation: warm luxury penthouse living room with fluted oak and limestone"
                         loading="lazy" 
                         width="800" 
                         height="450" 
                         class="w-full aspect-[16/9] object-cover">
                    <div class="p-4 bg-white">
                        <span class="text-[11px] uppercase tracking-[0.16em] text-[#AD8753] font-semibold block">After Execution</span>
                        <p class="text-[13px] text-[#1E211F] mt-1">Honed limestone floors, fluted oak joinery, architectural cove lighting.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- WHY CHAMPION / ARCHITECTURAL TENETS --}}
    <section class="py-24 lg:py-32 px-6 lg:px-12 bg-[#1E211F] text-[#F7F5F0]" id="why-champion">
        <div class="max-w-7xl mx-auto">
            <x-section-heading 
                eyebrow="Our Principles"
                title="Craftsmanship Without Compromise"
                description="We avoid the fragmentation that plagues typical construction. Here is how we guarantee architectural excellence."
            />

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="p-8 bg-white/5 hairline-all border-white/10 hover:border-[#AD8753] transition-colors">
                    <div class="text-[#AD8753] font-serif text-3xl font-light mb-4">01</div>
                    <h3 class="font-serif text-xl text-white mb-3">Smart Spatial Planning</h3>
                    <p class="text-[13px] text-[#A1A09A] leading-relaxed">
                        Every layout is engineered around traffic flow, natural illumination, and functional storage, ensuring spaces feel calm and uncluttered.
                    </p>
                </div>

                <div class="p-8 bg-white/5 hairline-all border-white/10 hover:border-[#AD8753] transition-colors">
                    <div class="text-[#AD8753] font-serif text-3xl font-light mb-4">02</div>
                    <h3 class="font-serif text-xl text-white mb-3">Quality Craftsmanship</h3>
                    <p class="text-[13px] text-[#A1A09A] leading-relaxed">
                        Our master carpenters and trades work directly with vetted hardwoods, Italian marble, and European hardware under rigorous tolerance checks.
                    </p>
                </div>

                <div class="p-8 bg-white/5 hairline-all border-white/10 hover:border-[#AD8753] transition-colors">
                    <div class="text-[#AD8753] font-serif text-3xl font-light mb-4">03</div>
                    <h3 class="font-serif text-xl text-white mb-3">Committed Deadlines</h3>
                    <p class="text-[13px] text-[#A1A09A] leading-relaxed">
                        We respect our clients' time. Turnkey contracts feature disciplined phased schedules, transparent updates, and firm handover commitments.
                    </p>
                </div>

                <div class="p-8 bg-white/5 hairline-all border-white/10 hover:border-[#AD8753] transition-colors">
                    <div class="text-[#AD8753] font-serif text-3xl font-light mb-4">04</div>
                    <h3 class="font-serif text-xl text-white mb-3">Single-Point Accountability</h3>
                    <p class="text-[13px] text-[#A1A09A] leading-relaxed">
                        No passing blame between designers and external builders. From 3D conception to the final key turn, Champion owns the entire result.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 8-STEP ARCHITECTURAL PROCESS & REACTIVE STAGECRAFT --}}
    <section class="py-24 lg:py-32 px-6 lg:px-12 max-w-7xl mx-auto" id="process">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <x-section-heading 
                eyebrow="Methodology"
                title="The Journey from Brief to Handover"
                description="A disciplined, transparent workflow structured into predictable architectural milestones."
            />
            <div class="flex items-center gap-4 pb-2">
                <a href="{{ route('process') }}" 
                   class="inline-flex items-center gap-2 text-[12px] uppercase tracking-[0.16em] font-medium text-[#1E211F] hover:text-[#AD8753] transition-colors hairline-b border-[#1E211F] pb-1">
                    <span>Inspect Full Methodology</span>
                    <span>→</span>
                </a>
            </div>
        </div>

        {{-- Sticky Milestone Navigation Scrubber --}}
        <div id="methodology-sticky-tracker" class="sticky top-20 lg:top-24 z-30 bg-[#F7F5F0]/95 backdrop-blur-md py-3 px-4 sm:px-6 hairline-all mb-10 flex flex-col md:flex-row items-center justify-between gap-4 shadow-xs transition-all duration-300">
            {{-- Horizontal Milestone Chips --}}
            <div class="flex items-center gap-1.5 overflow-x-auto no-scrollbar w-full md:w-auto py-1">
                @foreach($processSteps as $index => $step)
                    <button type="button" 
                            data-stack-target="{{ $index }}"
                            class="methodology-tracker-chip group flex items-center gap-1.5 px-3 py-1.5 text-left transition-all duration-200 cursor-pointer whitespace-nowrap text-[11px] font-medium uppercase tracking-[0.08em] border {{ $index === 0 ? 'bg-[#1E211F] text-white border-[#1E211F] shadow-xs' : 'bg-white text-[#676660] border-black/10 hover:border-[#AD8753]/50 hover:text-[#1E211F]' }}">
                        <span class="font-bold font-mono {{ $index === 0 ? 'text-[#AD8753]' : 'text-[#AD8753]/80 group-hover:text-[#AD8753]' }}">{{ $step['step'] }}</span>
                        <span class="hidden sm:inline">{{ explode(' & ', $step['title'])[0] }}</span>
                    </button>
                @endforeach
            </div>

            {{-- Live Milestone Counter & Progress Scrubber --}}
            <div class="flex items-center justify-between w-full md:w-auto gap-4 shrink-0 text-[11px] text-[#676660]">
                <div class="flex items-center gap-2 font-mono text-[11px]">
                    <span class="text-[#AD8753] font-bold" id="methodology-counter">Phase 01 / 08</span>
                    <span class="hidden lg:inline text-[#A1A09A]">•</span>
                    <span class="hidden lg:inline uppercase tracking-[0.10em] text-[#1E211F] font-sans font-medium" id="methodology-phase-label">{{ explode(' & ', $processSteps[0]['title'])[0] }}</span>
                </div>
                <div class="w-32 sm:w-40 bg-black/10 h-[3px] rounded-full overflow-hidden">
                    <div id="methodology-progress-bar" class="bg-[#AD8753] h-full w-[12.5%] transition-all duration-300"></div>
                </div>
            </div>
        </div>

        {{-- Scroll-Driven Sticky Stack Cards Container --}}
        <div id="methodology-stack-container" class="relative space-y-12 lg:space-y-16 pb-20">
            @foreach($processSteps as $index => $step)
                <article id="methodology-card-{{ $index }}" 
                         data-stack-card="{{ $index }}"
                         style="--stack-index: {{ $index }};"
                         class="methodology-stack-card bg-white hairline-all p-6 lg:p-12 transition-all duration-500 {{ $index === 0 ? 'is-focused' : '' }}">
                    
                    {{-- Inner Card Grid --}}
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 items-center">
                        {{-- Left Column: Architectural Milestone Editorial Content --}}
                        <div class="lg:col-span-6 flex flex-col justify-between space-y-6">
                            <div>
                                <div class="flex items-center justify-between gap-4 mb-3">
                                    <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold">
                                        <span>Phase {{ $step['step'] }} of 08</span>
                                        <span>•</span>
                                        <span>{{ $step['duration'] }}</span>
                                    </span>
                                    <span class="text-[11px] uppercase tracking-[0.16em] text-[#676660]">
                                        {{ $step['bengali_title'] }}
                                    </span>
                                </div>

                                <h3 class="font-serif text-3xl sm:text-4xl text-[#1E211F] font-normal tracking-[-0.02em] leading-tight">
                                    {{ $step['title'] }}
                                </h3>

                                <p class="mt-4 text-[15px] leading-relaxed text-[#676660] font-light">
                                    {{ $step['description'] }}
                                </p>

                                {{-- Scope & Deliverables Checklist --}}
                                <div class="mt-6 pt-6 border-t border-black/10">
                                    <h4 class="text-[11px] uppercase tracking-[0.18em] text-[#AD8753] font-semibold mb-3">
                                        Milestone Deliverables:
                                    </h4>
                                    <ul class="space-y-2.5 text-[13px] text-[#1E211F]">
                                        @foreach($step['details'] as $detail)
                                            <li class="flex items-start gap-2.5">
                                                <span class="text-[#AD8753] mt-0.5 font-bold">✦</span>
                                                <span class="font-normal">{{ $detail }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="pt-4 flex items-center gap-4">
                                <a href="{{ route('contact') }}?subject={{ urlencode('Inquiry for Phase ' . $step['step'] . ': ' . $step['title']) }}" 
                                   class="px-6 py-3.5 bg-[#1E211F] text-[#F7F5F0] hover:bg-[#AD8753] text-[11px] uppercase tracking-[0.18em] font-medium transition-colors inline-flex items-center gap-2">
                                    <span>Discuss Phase {{ $step['step'] }}</span>
                                    <span>→</span>
                                </a>
                                <span class="text-[12px] text-[#676660] font-sans hidden sm:inline">
                                    Single-Point Accountability Guarantee
                                </span>
                            </div>
                        </div>

                        {{-- Right Column: Architectural Photography Stage --}}
                        <div class="lg:col-span-6">
                            <div class="relative aspect-[4/3] w-full overflow-hidden bg-[#EFEAE2] hairline-all shadow-md group">
                                <img src="{{ $step['image'] }}" 
                                     alt="{{ $step['title'] }} - Champion Interior Design Methodology" 
                                     loading="lazy" 
                                     width="800" 
                                     height="600" 
                                     draggable="false"
                                     class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-[1.03] select-none">

                                {{-- Floating Glass Status Pills on Image --}}
                                <div class="absolute top-4 left-4 z-10 pointer-events-none">
                                    <span class="glass-pill px-3 py-1.5 text-[10px] uppercase tracking-[0.18em] text-[#1E211F] font-semibold">
                                        Milestone {{ $step['step'] }}
                                    </span>
                                </div>

                                <div class="absolute bottom-4 right-4 z-10 pointer-events-none">
                                    <span class="glass-pill px-3 py-1.5 text-[10px] uppercase tracking-[0.16em] text-[#AD8753] font-semibold">
                                        {{ $step['duration'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    {{-- FOUNDER & STUDIO LEADERSHIP --}}
    <section class="py-24 lg:py-32 px-6 lg:px-12 bg-[#EFEAE2]/60 hairline-t hairline-b" id="founder">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            {{-- Portrait Column --}}
            <div class="lg:col-span-5">
                <div class="relative max-w-md mx-auto bg-white p-3 shadow-xl hairline-all reveal-card">
                    <img src="{{ asset('images/team/mushfiqur_rahman_razi.jpg') }}" 
                         alt="Mushfiqur Rahman Razi - Founder & CEO of Champion Interior Design" 
                         loading="lazy"
                         width="600"
                         height="750"
                         class="w-full aspect-[4/5] object-cover object-top">
                    <div class="mt-4 px-2 pb-2 flex items-center justify-between">
                        <div>
                            <h3 class="font-serif text-xl text-[#1E211F] font-medium">Mushfiqur Rahman Razi</h3>
                            <span class="text-[11px] uppercase tracking-[0.18em] text-[#AD8753] font-semibold">Founder & CEO</span>
                        </div>
                        <span class="glass-pill px-3 py-1 text-[10px] uppercase tracking-[0.14em] text-[#1E211F]">
                            Dhaka Atelier
                        </span>
                    </div>
                </div>
            </div>

            {{-- Narrative Column --}}
            <div class="lg:col-span-7">
                <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.22em] text-[#AD8753] font-semibold mb-3">
                    <span class="w-1.5 h-1.5 bg-[#AD8753]"></span>
                    Studio Leadership
                </span>
                <h2 class="reveal-text font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-[-0.02em] text-[#1E211F] leading-[1.15]">
                    <span class="clip-line-wrap"><span class="clip-line">“Architecture is not merely the arrangement of materials;</span></span>
                    <span class="clip-line-wrap"><span class="clip-line" style="transition-delay: 160ms;">it is the choreography of light, proportion, and human sanctuary.”</span></span>
                </h2>
                
                <div class="mt-6 space-y-4 text-[15px] leading-relaxed text-[#676660] font-light">
                    <p>
                        Under the leadership of Founder & CEO <strong>Mushfiqur Rahman Razi</strong>, Champion Interior Design has established itself as an uncompromising force in Bangladesh’s spatial design and turnkey execution sector.
                    </p>
                    <p>
                        With a firm commitment to authentic materiality, precision millwork, and on-time project handover, our studio bridges the divide between conceptual 3D aesthetics and structural on-site delivery across Dhaka's premier neighborhoods.
                    </p>
                </div>

                {{-- Credibility Grid --}}
                <div class="mt-8 pt-8 hairline-t grid grid-cols-2 sm:grid-cols-3 gap-6 text-[13px]">
                    <div>
                        <strong class="block text-[#1E211F] font-medium">Turnkey Mastery</strong>
                        <span class="text-[#676660] text-[12px]">Design-to-Handover</span>
                    </div>
                    <div>
                        <strong class="block text-[#1E211F] font-medium">Direct Sourcing</strong>
                        <span class="text-[#676660] text-[12px]">Verified Finishes</span>
                    </div>
                    <div>
                        <strong class="block text-[#1E211F] font-medium">Dhaka Market</strong>
                        <span class="text-[#676660] text-[12px]">Gulshan & Banani</span>
                    </div>
                </div>

                <div class="mt-8 flex items-center gap-6">
                    <a href="{{ route('about') }}" 
                       class="inline-flex items-center gap-2 text-[12px] uppercase tracking-[0.16em] font-medium text-[#1E211F] hover:text-[#AD8753] transition-colors pb-1 hairline-b border-[#1E211F]">
                        <span>Read Our Studio Philosophy</span>
                        <span>→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- FREQUENTLY ASKED QUESTIONS (FAQ) --}}
    <section class="py-24 lg:py-32 px-6 lg:px-12 max-w-5xl mx-auto" id="faq">
        <x-section-heading 
            eyebrow="Clarity & Answers"
            title="Frequently Asked Questions"
            description="Clear, factual answers regarding our architectural turnkey workflow, residential and commercial scope, and consultation booking in Dhaka."
            align="center"
        />

        <div class="space-y-4 mt-12">
            @foreach($faqs as $index => $faq)
                <details class="faq-item group bg-white p-6 lg:p-8 hairline-all transition-all duration-300 reveal-card" {{ $index === 0 ? 'open' : '' }}>
                    <summary class="flex items-center justify-between cursor-pointer list-none focus:outline-none">
                        <span class="font-serif text-xl sm:text-2xl text-[#1E211F] group-hover:text-[#AD8753] transition-colors font-medium">
                            {{ $faq['question'] }}
                        </span>
                        <span class="faq-icon ml-4 text-xl text-[#AD8753] transition-transform duration-300 inline-block {{ $index === 0 ? 'rotate-45' : '' }}">
                            +
                        </span>
                    </summary>
                    <div class="faq-content overflow-hidden transition-all duration-300">
                        <p class="mt-4 text-[14px] sm:text-[15px] leading-relaxed text-[#676660] font-light hairline-t pt-4">
                            {{ $faq['answer'] }}
                        </p>
                    </div>
                </details>
            @endforeach
        </div>
    </section>

    {{-- FINAL CONVERSION & CONSULTATION FORM --}}
    <section class="py-24 lg:py-32 px-6 lg:px-12 bg-[#1E211F] text-[#F7F5F0]" id="consultation">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
            {{-- Contact Information Column --}}
            <div class="lg:col-span-5">
                <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.22em] text-[#AD8753] font-semibold mb-3">
                    <span class="w-1.5 h-1.5 bg-[#AD8753]"></span>
                    Initiate Your Project
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-[-0.02em] text-white leading-[1.12]">
                    Planning a Space Worth Getting Right?
                </h2>
                <p class="mt-6 text-[15px] leading-relaxed text-[#A1A09A] font-light">
                    Whether commissioning a penthouse interior in Gulshan, an executive office suite in Banani, or a comprehensive building renovation, we invite you to discuss your spatial requirements directly with our team.
                </p>

                <div class="mt-10 space-y-6 text-[14px]">
                    <div class="flex items-start gap-4">
                        <span class="text-[#AD8753] text-xl">✦</span>
                        <div>
                            <strong class="text-white block uppercase tracking-[0.14em] text-[11px]">Direct Telephone</strong>
                            <a href="tel:+8801715394444" class="text-lg text-white hover:text-[#AD8753] transition-colors font-medium">01715394444</a>
                            <span class="block text-[12px] text-[#A1A09A]">Saturday – Thursday, 10:00 AM – 7:00 PM</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <span class="text-[#AD8753] text-xl">✦</span>
                        <div>
                            <strong class="text-white block uppercase tracking-[0.14em] text-[11px]">Electronic Mail</strong>
                            <a href="mailto:chmpnidesign@gmail.com" class="text-white hover:text-[#AD8753] transition-colors">chmpnidesign@gmail.com</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <span class="text-[#AD8753] text-xl">✦</span>
                        <div>
                            <strong class="text-white block uppercase tracking-[0.14em] text-[11px]">Market Location</strong>
                            <p class="text-white">Dhaka, Bangladesh</p>
                            <span class="text-[12px] text-[#A1A09A]">Serving Gulshan, Banani, Baridhara, Dhanmondi, Bashundhara, Uttara.</span>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-8 hairline-t border-white/10 flex items-center gap-4">
                    <a href="tel:+8801715394444" class="px-5 py-3 bg-[#AD8753] text-[#1E211F] font-medium text-[11px] uppercase tracking-[0.16em] hover:bg-white transition-colors">
                        Call Studio
                    </a>
                    <a href="https://wa.me/8801715394444" target="_blank" rel="noopener noreferrer" class="px-5 py-3 border border-white/30 text-white font-medium text-[11px] uppercase tracking-[0.16em] hover:border-[#AD8753] hover:text-[#AD8753] transition-colors">
                        WhatsApp
                    </a>
                </div>
            </div>

            {{-- Form Column --}}
            <div class="lg:col-span-7 bg-[#2A2E2B] p-8 lg:p-12 hairline-all border-white/10 shadow-2xl">
                @if(session('success'))
                    <div class="p-6 bg-[#AD8753]/20 border border-[#AD8753] text-white mb-8">
                        <h3 class="font-serif text-xl text-[#AD8753] mb-1 font-medium">Inquiry Received</h3>
                        <p class="text-[14px] text-[#F7F5F0]">{{ session('success') }}</p>
                    </div>
                @endif

                @if($errors->any())
                    <div class="p-6 bg-red-950/40 border border-red-500 text-red-200 mb-8 text-[13px]">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.inquiry') }}" method="POST" class="space-y-6">
                    @csrf
                    {{-- Honeypot bot protection field (hidden from real users) --}}
                    <input type="text" name="company_trap" class="hidden" tabindex="-1" autocomplete="off">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-[11px] uppercase tracking-[0.16em] text-[#A1A09A] mb-2 font-medium">
                                Full Name <span class="text-[#AD8753]">*</span>
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   required 
                                   placeholder="e.g. Architect Rahman"
                                   class="w-full bg-[#1E211F] border border-white/10 text-white px-4 py-3.5 text-[14px] focus:outline-none focus:border-[#AD8753] transition-colors">
                        </div>

                        <div>
                            <label for="phone" class="block text-[11px] uppercase tracking-[0.16em] text-[#A1A09A] mb-2 font-medium">
                                Phone Number <span class="text-[#AD8753]">*</span>
                            </label>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}"
                                   required 
                                   placeholder="0171X XXXXXX"
                                   class="w-full bg-[#1E211F] border border-white/10 text-white px-4 py-3.5 text-[14px] focus:outline-none focus:border-[#AD8753] transition-colors">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-[11px] uppercase tracking-[0.16em] text-[#A1A09A] mb-2 font-medium">
                                Email Address
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   placeholder="name@domain.com"
                                   class="w-full bg-[#1E211F] border border-white/10 text-white px-4 py-3.5 text-[14px] focus:outline-none focus:border-[#AD8753] transition-colors">
                        </div>

                        <div>
                            <label for="project_type" class="block text-[11px] uppercase tracking-[0.16em] text-[#A1A09A] mb-2 font-medium">
                                Project Classification
                            </label>
                            <select id="project_type" 
                                    name="project_type" 
                                    class="w-full bg-[#1E211F] border border-white/10 text-white px-4 py-3.5 text-[14px] focus:outline-none focus:border-[#AD8753] transition-colors">
                                <option value="Residential Penthouse / Duplex" {{ old('project_type') === 'Residential Penthouse / Duplex' ? 'selected' : '' }}>Residential Penthouse / Duplex</option>
                                <option value="Commercial / Office Suite" {{ old('project_type') === 'Commercial / Office Suite' ? 'selected' : '' }}>Commercial / Office Suite</option>
                                <option value="Restaurant / Hospitality" {{ old('project_type') === 'Restaurant / Hospitality' ? 'selected' : '' }}>Restaurant / Hospitality</option>
                                <option value="Turnkey Architectural Renovation" {{ old('project_type') === 'Turnkey Architectural Renovation' ? 'selected' : '' }}>Turnkey Architectural Renovation</option>
                                <option value="Exterior Façade Development" {{ old('project_type') === 'Exterior Façade Development' ? 'selected' : '' }}>Exterior Façade Development</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="location" class="block text-[11px] uppercase tracking-[0.16em] text-[#A1A09A] mb-2 font-medium">
                                Project Location / Enclave
                            </label>
                            <input type="text" 
                                   id="location" 
                                   name="location" 
                                   value="{{ old('location') }}"
                                   placeholder="e.g. Gulshan II, Banani, Baridhara"
                                   class="w-full bg-[#1E211F] border border-white/10 text-white px-4 py-3.5 text-[14px] focus:outline-none focus:border-[#AD8753] transition-colors">
                        </div>

                        <div>
                            <label for="approx_area" class="block text-[11px] uppercase tracking-[0.16em] text-[#A1A09A] mb-2 font-medium">
                                Approximate Area (sq.ft)
                            </label>
                            <input type="text" 
                                   id="approx_area" 
                                   name="approx_area" 
                                   value="{{ old('approx_area') }}"
                                   placeholder="e.g. 4,500 sq.ft"
                                   class="w-full bg-[#1E211F] border border-white/10 text-white px-4 py-3.5 text-[14px] focus:outline-none focus:border-[#AD8753] transition-colors">
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-[11px] uppercase tracking-[0.16em] text-[#A1A09A] mb-2 font-medium">
                            Project Vision & Notes <span class="text-[#AD8753]">*</span>
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="4" 
                                  required
                                  placeholder="Describe your spatial objectives, preferred materials, and anticipated timeline..."
                                  class="w-full bg-[#1E211F] border border-white/10 text-white p-4 text-[14px] focus:outline-none focus:border-[#AD8753] transition-colors">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" 
                            class="w-full py-4 bg-[#AD8753] text-[#1E211F] hover:bg-white text-[12px] uppercase tracking-[0.20em] font-semibold transition-all duration-300">
                        Request Private Consultation
                    </button>
                    
                    <p class="text-[11px] text-[#A1A09A] text-center">
                        All communications are confidential. We respect your privacy and never distribute contact information.
                    </p>
                </form>
            </div>
        </div>
    </section>
</x-layouts.public>

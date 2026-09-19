<x-layouts.public 
    :title="$title"
    :metaDescription="$metaDescription"
    :metaImage="$metaImage"
    :breadcrumbs="$breadcrumbs"
>
    <x-slot:head>
        <link rel="preload" as="image" href="{{ asset($project['cover_image']) }}" fetchpriority="high">
    </x-slot:head>

    <article class="inner-page-wrap">
        {{-- Breadcrumbs --}}
        <nav aria-label="Breadcrumb" class="studio-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span class="sep" aria-hidden="true">/</span>
            <a href="{{ route('projects.index') }}">Projects</a>
            <span class="sep" aria-hidden="true">/</span>
            <span class="current" aria-current="page">{{ $project['title'] }}</span>
        </nav>

        {{-- Project Header --}}
        <header class="inner-header">
            <div class="studio-eyebrow">
                <span class="status-dot"></span>
                <span>{{ $project['category'] }} • {{ $project['location'] }}</span>
            </div>
            <h1>{{ $project['title'] }}</h1>
            <p class="inner-header-lead">
                {{ $project['tagline'] }}
            </p>
        </header>

        {{-- Hero Showcase Photography --}}
        <div class="w-full aspect-[16/9] md:aspect-[21/10] overflow-hidden bg-[#efeae2] border border-[#30291e15] mb-12 shadow-sm">
            <img src="{{ asset($project['cover_image']) }}" 
                 alt="{{ $project['title'] }} — architectural interior view" 
                 fetchpriority="high"
                 width="1600"
                 height="900"
                 class="w-full h-full object-cover">
        </div>

        {{-- Compact Specifications Ribbon --}}
        <div class="specs-ribbon" aria-label="Project Specifications">
            <div class="spec-unit">
                <span class="spec-label">Enclave Location</span>
                <span class="spec-value">{{ $project['location'] }}</span>
            </div>
            <div class="spec-unit">
                <span class="spec-label">Floor Plate / Scale</span>
                <span class="spec-value">{{ $project['area'] }}</span>
            </div>
            <div class="spec-unit">
                <span class="spec-label">Year Completed</span>
                <span class="spec-value">{{ $project['year'] }}</span>
            </div>
            <div class="spec-unit">
                <span class="spec-label">Atelier Scope</span>
                <span class="spec-value">{{ $project['scope'] }}</span>
            </div>
        </div>

        {{-- Case Study Narrative: Brief, Constraints, Scope, Outcome --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 mb-24">
            <div class="lg:col-span-8 space-y-12">
                {{-- 01 / The Brief --}}
                <section class="narrative-block">
                    <span class="narrative-num">01 / The Spatial Brief</span>
                    <h2 class="narrative-title">Project Overview & Vision</h2>
                    <p class="narrative-prose">
                        {{ $project['summary'] }}
                    </p>
                </section>

                {{-- 02 / Constraints & Challenges --}}
                <section class="narrative-block">
                    <span class="narrative-num">02 / Site Constraints</span>
                    <h2 class="narrative-title">Architectural Challenges & Acoustic Context</h2>
                    <p class="narrative-prose">
                        {{ $project['challenge'] }}
                    </p>
                </section>

                {{-- 03 / Scope of Work --}}
                <section class="narrative-block">
                    <span class="narrative-num">03 / Turnkey Execution</span>
                    <h2 class="narrative-title">Scope of Work & Integrated Disciplines</h2>
                    <p class="narrative-prose mb-6">
                        Complete single-source execution covering: {{ $project['scope'] }}.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach($project['services'] as $service)
                            <div class="flex items-center gap-3 text-[13px] text-[#1e211f] bg-[#f1eee7] px-4 py-3 border border-[#30291e12]">
                                <span class="text-[#c0a57c] font-serif">✦</span>
                                <span>{{ $service }}</span>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- 04 / Outcome & Craft --}}
                <section class="narrative-block">
                    <span class="narrative-num">04 / Delivered Outcome</span>
                    <h2 class="narrative-title">Spatial Harmony & Refined Detailing</h2>
                    <p class="narrative-prose">
                        {{ $project['solution'] }}
                    </p>
                </section>
            </div>

            {{-- Sidebar: Materiality & Inquiries --}}
            <aside class="lg:col-span-4 space-y-8">
                <div class="bg-[#efeae2] p-8 border border-[#30291e15]">
                    <div class="studio-eyebrow text-[#8d7859] mb-3">Architectural Finishes</div>
                    <h3 class="font-serif text-2xl text-[#1e211f] font-normal mb-4">Material Palette</h3>
                    <p class="text-[13px] text-[#676660] font-light leading-relaxed mb-4">
                        Authentic natural surfaces curated to age gracefully and interact softly with natural tropical light.
                    </p>
                    <div class="material-chips">
                        @foreach($project['materials'] as $material)
                            <span class="material-chip">
                                <span class="material-chip-bullet"></span>
                                <span>{{ $material }}</span>
                            </span>
                        @endforeach
                    </div>
                </div>

                {{-- Direct Atelier Contact Card --}}
                <div class="bg-[#24251f] text-[#f1eee7] p-8 border border-[#30291e30]">
                    <div class="studio-eyebrow text-[#c0a57c] mb-2">Private Consultation</div>
                    <h4 class="font-serif text-2xl text-white font-normal mb-3">Commission a Similar Space</h4>
                    <p class="text-[13px] text-[#b8b5a9] leading-relaxed mb-6">
                        Speak directly with our studio team regarding spatial planning, 3D visualization, or turnkey execution in Dhaka.
                    </p>
                    <a href="{{ route('contact') }}" class="studio-button studio-button-light w-full justify-center">
                        Book a Consultation <span aria-hidden="true">↗</span>
                    </a>
                    <div class="mt-6 pt-5 border-t border-white/10 flex flex-col gap-2 text-[12px] text-[#b8b5a9]">
                        <div class="flex items-center justify-between">
                            <span>Direct phone:</span>
                            <a href="tel:+8801715394444" class="text-white hover:text-[#c0a57c] font-medium">01715394444</a>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>WhatsApp:</span>
                            <a href="https://wa.me/8801715394444" target="_blank" rel="noopener noreferrer" class="text-[#c0a57c] hover:text-white">Direct Chat ↗</a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

        {{-- Varied Editorial Project Gallery --}}
        @if(!empty($project['gallery']))
            <section class="mb-24 pt-16 border-t border-[#30291e20]" aria-label="Visual Documentation">
                <div class="section-intro mb-10">
                    <div>
                        <div class="studio-eyebrow">Visual Documentation</div>
                        <h2>Spatial Details & Perspective</h2>
                    </div>
                    <div class="section-aside">
                        <p>A closer study of craftsmanship, natural lighting, and millwork integration.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($project['gallery'] as $galleryImage)
                        <div class="overflow-hidden bg-[#efeae2] border border-[#30291e15] aspect-[16/10]">
                            <img src="{{ asset($galleryImage) }}" 
                                 alt="{{ $project['title'] }} detail perspective" 
                                 loading="lazy" 
                                 width="1200" 
                                 height="750" 
                                 class="w-full h-full object-cover transition-transform duration-700 hover:scale-[1.03]">
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- Related Projects Showcase --}}
        @if(!empty($relatedProjects))
            <section class="pt-16 border-t border-[#30291e20]" aria-label="Related Works">
                <div class="section-intro mb-10">
                    <div>
                        <div class="studio-eyebrow">Selected Monograph</div>
                        <h2>Related Studio Works</h2>
                    </div>
                    <div class="section-aside">
                        <a href="{{ route('projects.index') }}" class="studio-text-link">
                            View All Projects <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>

                <div class="editorial-projects">
                    @foreach(array_slice($relatedProjects, 0, 2) as $related)
                        <article class="editorial-project">
                            <a href="{{ route('projects.show', $related['slug']) }}" class="project-visual" aria-label="View {{ $related['title'] }}">
                                <img src="{{ asset($related['cover_image']) }}" 
                                     alt="{{ $related['title'] }}" 
                                     loading="lazy" 
                                     width="1200" 
                                     height="800">
                                <span class="project-index">{{ $related['location'] }}</span>
                                <span class="project-open" aria-hidden="true">↗</span>
                            </a>
                            <div class="project-description">
                                <div>
                                    <div class="studio-eyebrow">{{ $related['category'] }} • {{ $related['year'] }}</div>
                                    <h3>
                                        <a href="{{ route('projects.show', $related['slug']) }}">
                                            {{ $related['title'] }}
                                        </a>
                                    </h3>
                                </div>
                                <span class="text-right">{{ $related['area'] }}</span>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- Bottom Consultation CTA --}}
        <div class="studio-cta-box">
            <div>
                <span class="studio-eyebrow text-[#c0a57c] block mb-2">Initiate Your Project</span>
                <h3>Ready to discuss your <em>spatial brief?</em></h3>
                <p>
                    Schedule an on-site survey or studio briefing with Founder & CEO Mushfiqur Rahman Razi in Dhaka.
                </p>
            </div>
            <a href="{{ route('contact') }}" class="studio-button studio-button-light shrink-0">
                Book a Consultation <span aria-hidden="true">↗</span>
            </a>
        </div>
    </article>
</x-layouts.public>

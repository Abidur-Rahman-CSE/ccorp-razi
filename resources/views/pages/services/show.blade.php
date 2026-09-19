<x-layouts.public 
    :title="$title"
    :metaDescription="$metaDescription"
    :metaImage="$metaImage"
    :breadcrumbs="$breadcrumbs"
>
    <x-slot:head>
        <link rel="preload" as="image" href="{{ asset($service['image']) }}" fetchpriority="high">
    </x-slot:head>

    @php
        $allProjects = \App\Data\ProjectData::all();
        $relevantProjects = array_filter($allProjects, function ($p) use ($service) {
            if (in_array($service['title'], $p['services'])) return true;
            if (str_contains($p['category'], 'Residential') && str_contains($service['title'], 'Residential')) return true;
            if (str_contains($p['category'], 'Commercial') && (str_contains($service['title'], 'Commercial') || str_contains($service['title'], 'Office'))) return true;
            if (str_contains($p['category'], 'Renovation') && (str_contains($service['title'], 'Renovation') || str_contains($service['title'], 'Exterior'))) return true;
            return in_array('Turnkey Execution', $p['services']) && $service['slug'] === 'turnkey-projects';
        });

        $faqs = \App\Data\FaqData::all();
    @endphp

    <article class="inner-page-wrap">
        {{-- Breadcrumbs --}}
        <nav aria-label="Breadcrumb" class="studio-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span class="sep" aria-hidden="true">/</span>
            <a href="{{ route('services.index') }}">Services</a>
            <span class="sep" aria-hidden="true">/</span>
            <span class="current" aria-current="page">{{ $service['title'] }}</span>
        </nav>

        {{-- Service Header --}}
        <header class="inner-header">
            <div class="studio-eyebrow">
                <span class="status-dot"></span>
                <span>Turnkey Practice • {{ $service['bengali_title'] }}</span>
            </div>
            <h1>{{ $service['title'] }}</h1>
            <p class="inner-header-lead">
                {{ $service['tagline'] }}
            </p>
        </header>

        {{-- Hero Showcase Photography --}}
        <div class="w-full aspect-[16/9] md:aspect-[21/10] overflow-hidden bg-[#efeae2] border border-[#30291e15] mb-12 shadow-sm">
            <img src="{{ asset($service['image']) }}" 
                 alt="{{ $service['title'] }} — Champion Interior Design" 
                 fetchpriority="high"
                 width="1600"
                 height="900"
                 class="w-full h-full object-cover">
        </div>

        {{-- Narrative & Deliverables Breakdown --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 mb-24">
            <div class="lg:col-span-8 space-y-12">
                {{-- 01 / Overview & Who it is for --}}
                <section class="narrative-block">
                    <span class="narrative-num">01 / Practice Intent</span>
                    <h2 class="narrative-title">Who this practice is for</h2>
                    <p class="narrative-prose mb-4">
                        {{ $service['overview'] }}
                    </p>
                    <p class="text-[13px] text-[#777367] leading-relaxed">
                        {{ $service['summary'] }}
                    </p>
                </section>

                {{-- 02 / Scope of Work --}}
                <section class="narrative-block">
                    <span class="narrative-num">02 / Integrated Scope</span>
                    <h2 class="narrative-title">Detailed Scope of Work</h2>
                    <p class="narrative-prose mb-6">
                        Every phase is handled with turnkey accountability to avoid fragmented contractor friction:
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach($service['scope_items'] as $item)
                            <div class="p-4 bg-[#efeae2] border border-[#30291e12] flex items-start gap-3">
                                <span class="text-[#c0a57c] font-serif text-lg leading-none mt-0.5">✦</span>
                                <span class="text-[13px] text-[#1e211f] font-medium leading-relaxed">{{ $item }}</span>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- 03 / Client Deliverables --}}
                <section class="narrative-block">
                    <span class="narrative-num">03 / Documentation & Deliverables</span>
                    <h2 class="narrative-title">Client Deliverables & Documentation</h2>
                    <ul class="space-y-3 pt-2">
                        @foreach($service['deliverables'] as $deliverable)
                            <li class="flex items-center gap-3 text-[14px] text-[#27251f]">
                                <span class="w-5 h-5 rounded-full bg-[#efeae2] text-[#8d7859] border border-[#30291e20] grid place-items-center text-[11px] shrink-0 font-bold">✓</span>
                                <span>{{ $deliverable }}</span>
                            </li>
                        @endforeach
                    </ul>
                </section>

                {{-- 04 / Relevant Questions (FAQs) --}}
                <section class="narrative-block pt-8 border-t border-[#30291e20]">
                    <span class="narrative-num">04 / Questions & Clarity</span>
                    <h2 class="narrative-title">Frequently Asked Questions</h2>
                    <div class="studio-questions mt-6">
                        @foreach(array_slice($faqs, 0, 3) as $faq)
                            <details>
                                <summary>
                                    <span>{{ $faq['question'] }}</span>
                                    <span aria-hidden="true">+</span>
                                </summary>
                                <p>{{ $faq['answer'] }}</p>
                            </details>
                        @endforeach
                    </div>
                </section>
            </div>

            {{-- Sidebar: Consultation Card & Other Practices --}}
            <aside class="lg:col-span-4 space-y-8">
                <div class="bg-[#24251f] text-[#f1eee7] p-8 border border-[#30291e30]">
                    <div class="studio-eyebrow text-[#c0a57c] mb-2">Service Consultation</div>
                    <h3 class="font-serif text-2xl text-white font-normal mb-3">Discuss Your Space</h3>
                    <p class="text-[13px] text-[#b8b5a9] leading-relaxed mb-6">
                        Schedule an initial consultation to review your spatial layout, 3D visualization needs, or turnkey construction budget.
                    </p>
                    <a href="{{ route('contact') }}" class="studio-button studio-button-light w-full justify-center">
                        Book a Consultation <span aria-hidden="true">↗</span>
                    </a>
                    <div class="mt-6 pt-5 border-t border-white/10 flex flex-col gap-2 text-[12px] text-[#b8b5a9]">
                        <div class="flex items-center justify-between">
                            <span>Direct studio line:</span>
                            <a href="tel:+8801715394444" class="text-white hover:text-[#c0a57c] font-medium">01715394444</a>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>WhatsApp concierge:</span>
                            <a href="https://wa.me/8801715394444" target="_blank" rel="noopener noreferrer" class="text-[#c0a57c] hover:text-white">Direct Chat ↗</a>
                        </div>
                    </div>
                </div>

                {{-- Other Studio Practices --}}
                <div class="bg-[#efeae2] p-8 border border-[#30291e15]">
                    <div class="studio-eyebrow text-[#8d7859] mb-3">Core Disciplines</div>
                    <h4 class="font-serif text-xl text-[#1e211f] font-normal mb-4">Other Studio Practices</h4>
                    <ul class="space-y-3 text-[13px]">
                        @foreach(array_slice($otherServices, 0, 5) as $other)
                            <li class="border-b border-[#30291e10] pb-2.5 last:border-b-0">
                                <a href="{{ route('services.show', $other['slug']) }}" class="text-[#1e211f] hover:text-[#8e785b] flex items-center justify-between transition-colors">
                                    <span>{{ $other['title'] }}</span>
                                    <span class="text-[#8d7859]">→</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>

        {{-- Relevant Projects Showcase --}}
        @if(!empty($relevantProjects))
            <section class="pt-16 border-t border-[#30291e20] mb-20" aria-label="Related Works">
                <div class="section-intro mb-10">
                    <div>
                        <div class="studio-eyebrow">Practice Portfolio</div>
                        <h2>Relevant Completed Works</h2>
                    </div>
                    <div class="section-aside">
                        <a href="{{ route('projects.index') }}" class="studio-text-link">
                            View All Projects <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>

                <div class="editorial-projects">
                    @foreach(array_slice($relevantProjects, 0, 2) as $related)
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
                <span class="studio-eyebrow text-[#c0a57c] block mb-2">Private Consultation</span>
                <h3>Bring your space to life with <em>turnkey confidence.</em></h3>
                <p>
                    Contact our studio to discuss custom architectural millwork, spatial layout options, or turnkey construction milestones in Dhaka.
                </p>
            </div>
            <a href="{{ route('contact') }}" class="studio-button studio-button-light shrink-0">
                Book a Consultation <span aria-hidden="true">↗</span>
            </a>
        </div>
    </article>
</x-layouts.public>

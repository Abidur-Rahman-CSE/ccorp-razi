<x-layouts.public 
    :title="$title"
    :metaDescription="$metaDescription"
    :breadcrumbs="$breadcrumbs"
>
    <div class="inner-page-wrap">
        {{-- Breadcrumb Navigation --}}
        <nav aria-label="Breadcrumb" class="studio-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span class="sep" aria-hidden="true">/</span>
            <span class="current" aria-current="page">Services</span>
        </nav>

        {{-- Editorial Page Header --}}
        <header class="inner-header">
            <div class="studio-eyebrow">
                <span class="status-dot"></span>
                <span>Core Disciplines • Architectural Atelier</span>
            </div>
            <h1>{{ 'Turnkey Interior & Architectural Services' }}<br><em>Single-point accountability.</em></h1>
            <p class="inner-header-lead">
                From initial spatial concept and 3D visualization through physical carpentry, MEP engineering, and final handover, Champion Interior Design delivers comprehensive spatial solutions in Bangladesh.
            </p>
        </header>

        {{-- Starting Point Guide / Sector Overview --}}
        <div class="specs-ribbon mb-16" aria-label="Services Navigation Guide">
            <div class="spec-unit">
                <span class="spec-label">01 / Residential</span>
                <span class="spec-value">Penthouses & Duplexes</span>
            </div>
            <div class="spec-unit">
                <span class="spec-label">02 / Commercial</span>
                <span class="spec-value">Headquarters & Dining</span>
            </div>
            <div class="spec-unit">
                <span class="spec-label">03 / Renewal</span>
                <span class="spec-value">Renovation & Façades</span>
            </div>
            <div class="spec-unit">
                <span class="spec-label">04 / Turnkey Model</span>
                <span class="spec-value">End-to-End Build</span>
            </div>
        </div>

        {{-- Alternating Editorial Service Practices --}}
        <div class="space-y-4">
            @foreach($services as $service)
                <article class="service-editorial-card {{ $loop->iteration % 2 === 0 ? 'reverse' : '' }}">
                    <div class="service-editorial-visual">
                        <a href="{{ route('services.show', $service['slug']) }}" aria-label="View details for {{ $service['title'] }}">
                            <img src="{{ asset($service['image']) }}" 
                                 alt="{{ $service['title'] }} — Champion Interior Design" 
                                 loading="lazy" 
                                 width="1200" 
                                 height="750">
                        </a>
                    </div>
                    <div class="service-editorial-body">
                        <div class="studio-eyebrow">
                            <span>0{{ $loop->iteration }}</span>
                            <span>•</span>
                            <span>{{ $service['bengali_title'] }}</span>
                        </div>
                        <h2 class="service-editorial-title">
                            <a href="{{ route('services.show', $service['slug']) }}">
                                {{ $service['title'] }}
                            </a>
                        </h2>
                        <p class="service-editorial-desc">
                            {{ $service['summary'] }}
                        </p>
                        
                        {{-- Scope Highlights --}}
                        <div class="service-scope-tags">
                            @foreach(array_slice($service['scope_items'], 0, 4) as $item)
                                <span class="service-scope-tag">✦ {{ $item }}</span>
                            @endforeach
                        </div>

                        <div>
                            <a href="{{ route('services.show', $service['slug']) }}" class="studio-button">
                                Explore Practice Scope <span aria-hidden="true">↗</span>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- Bottom Consultation CTA --}}
        <div class="studio-cta-box">
            <div>
                <span class="studio-eyebrow text-[#c0a57c] block mb-2">Turnkey Execution Model</span>
                <h3>Need an end-to-end <em>design & build team?</em></h3>
                <p>
                    We manage all sub-trades, civil modifications, electrical, and master joinery with guaranteed milestone timelines and single-point accountability.
                </p>
            </div>
            <a href="{{ route('contact') }}" class="studio-button studio-button-light shrink-0">
                Book a Consultation <span aria-hidden="true">↗</span>
            </a>
        </div>
    </div>
</x-layouts.public>

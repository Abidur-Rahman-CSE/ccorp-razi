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
            <span class="current" aria-current="page">Process</span>
        </nav>

        {{-- Editorial Page Header --}}
        <header class="inner-header">
            <div class="studio-eyebrow">
                <span class="status-dot"></span>
                <span>Architectural Methodology • 8 Stages</span>
            </div>
            <h1>{{ 'The 8-Step Turnkey Process' }}.<br><em>Predictable, disciplined execution.</em></h1>
            <p class="inner-header-lead">
                Our disciplined, predictable workflow transforms conceptual briefs into white-glove, move-in ready architectural spaces without budget overruns or delays.
            </p>
        </header>

        {{-- Sequence Progression Summary --}}
        <div class="specs-ribbon mb-16" aria-label="Process Overview">
            <div class="spec-unit">
                <span class="spec-label">Phase 1 (Weeks 1–2)</span>
                <span class="spec-value">Discovery & Survey</span>
            </div>
            <div class="spec-unit">
                <span class="spec-label">Phase 2 (Weeks 2–6)</span>
                <span class="spec-value">3D Visualization & Drawings</span>
            </div>
            <div class="spec-unit">
                <span class="spec-label">Phase 3 (Build)</span>
                <span class="spec-value">Turnkey Millwork & MEP</span>
            </div>
            <div class="spec-unit">
                <span class="spec-label">Phase 4 (Closeout)</span>
                <span class="spec-value">Snagging & Handover</span>
            </div>
        </div>

        {{-- 8-Step Architectural Roadmap --}}
        <div class="space-y-4 mb-24">
            @foreach($steps as $step)
                <div class="process-road-item">
                    {{-- Column 1: Step Number & Duration --}}
                    <div class="process-num-col">
                        <span class="process-step-num">{{ $step['step'] }}</span>
                        <span class="process-duration-pill">{{ $step['duration'] }}</span>
                        <span class="text-[11px] text-[#8d7859] font-medium">{{ $step['bengali_title'] }}</span>
                    </div>

                    {{-- Column 2: What Happens & Client Involvement --}}
                    <div class="process-content-col">
                        <div class="studio-eyebrow text-[#8d7859] mb-1">Stage {{ $step['step'] }}</div>
                        <h3>{{ $step['title'] }}</h3>
                        <p>{{ $step['description'] }}</p>

                        @php
                            $clientRole = match($step['step']) {
                                '01' => 'Client Input: Share spatial lifestyle aspirations, functional requirements, and target timeline.',
                                '02' => 'Client Input: Provide floor plan keys and site access for laser millimeter inspection.',
                                '03' => 'Client Input: Review circulation options and approve primary zoning layout.',
                                '04' => 'Client Input: Provide feedback on 3D illumination, textures, and spatial ambiance.',
                                '05' => 'Client Input: Inspect physical stone, wood swatches and sign off on technical specs.',
                                '06' => 'Client Input: Receive weekly transparent progress reports; site visits welcomed anytime.',
                                '07' => 'Client Input: Joint pre-handover walkthrough to review snag list and system operations.',
                                '08' => 'Client Input: Move-in celebration, documentation transfer, and ongoing warranty care.',
                                default => 'Client Input: Collaborative design reviews and milestone sign-offs.',
                            };
                        @endphp
                        <div class="mt-4 pt-3 border-t border-[#30291e12] text-[12px] text-[#777367] flex items-start gap-2">
                            <span class="text-[#c0a57c]">◇</span>
                            <span>{{ $clientRole }}</span>
                        </div>
                    </div>

                    {{-- Column 3: Studio Deliverables & Milestones --}}
                    <div class="process-deliverable-col">
                        <span class="col-label">Deliverables & Milestones</span>
                        <ul class="process-detail-list">
                            @foreach($step['details'] as $detail)
                                <li>
                                    <span>✦</span>
                                    <span>{{ $detail }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Bottom Consultation CTA --}}
        <div class="studio-cta-box">
            <div>
                <span class="studio-eyebrow text-[#c0a57c] block mb-2">Initiate Stage 01</span>
                <h3>Ready to begin your <em>spatial journey?</em></h3>
                <p>
                    Connect with our atelier to arrange an on-site survey or studio briefing for your residential penthouse or commercial project.
                </p>
            </div>
            <div class="flex flex-wrap gap-4 shrink-0">
                <a href="{{ route('contact') }}" class="studio-button studio-button-light">
                    Book Consultation <span aria-hidden="true">↗</span>
                </a>
                <a href="https://wa.me/8801715394444" target="_blank" rel="noopener noreferrer" class="studio-button">
                    WhatsApp Concierge <span aria-hidden="true">↗</span>
                </a>
            </div>
        </div>
    </div>
</x-layouts.public>

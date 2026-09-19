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
            <span class="current" aria-current="page">Projects</span>
        </nav>

        {{-- Editorial Page Header --}}
        <header class="inner-header">
            <div class="studio-eyebrow">
                <span class="status-dot"></span>
                <span>Portfolio Monograph · Dhaka</span>
            </div>
            <h1>Selected Architectural Works.<br><em>Built with quiet precision.</em></h1>
            <p class="inner-header-lead">
                Explore our completed turnkey residences, executive corporate headquarters, and luxury renovations across Dhaka, Bangladesh.
            </p>
        </header>

        {{-- Editorial Category Filter Tabs --}}
        <div class="editorial-filter-bar" role="tablist" aria-label="Project Categories">
            <button type="button" class="editorial-filter-btn active" data-filter="all" role="tab" aria-selected="true">
                All Works ({{ count($projects) }})
            </button>
            <button type="button" class="editorial-filter-btn" data-filter="residential" role="tab" aria-selected="false">
                Residential
            </button>
            <button type="button" class="editorial-filter-btn" data-filter="commercial" role="tab" aria-selected="false">
                Commercial & Office
            </button>
            <button type="button" class="editorial-filter-btn" data-filter="renovation" role="tab" aria-selected="false">
                Renovation & Façade
            </button>
        </div>

        {{-- Editorial Projects Grid --}}
        <div class="editorial-projects" id="projects-grid">
            @foreach($projects as $project)
                @php
                    $categoryGroup = match($project['category']) {
                        'Residential Interior' => 'residential',
                        'Commercial & Office Interior' => 'commercial',
                        'Renovation & Façade' => 'renovation',
                        default => 'all',
                    };
                @endphp
                <article class="editorial-project {{ $loop->first ? 'project-wide' : '' }}" data-category="{{ $categoryGroup }}">
                    <a href="{{ route('projects.show', $project['slug']) }}" class="project-visual" aria-label="View case study: {{ $project['title'] }}">
                        <img src="{{ asset($project['cover_image']) }}" 
                             alt="{{ $project['title'] }} — {{ $project['category'] }} in {{ $project['location'] }}" 
                             loading="lazy" 
                             width="1536" 
                             height="1024">
                        <span class="project-index">0{{ $loop->iteration }} • {{ $project['location'] }}</span>
                        <span class="project-open" aria-hidden="true">↗</span>
                    </a>
                    <div class="project-description">
                        <div>
                            <div class="studio-eyebrow">{{ $project['category'] }} • {{ $project['year'] }}</div>
                            <h3>
                                <a href="{{ route('projects.show', $project['slug']) }}">
                                    {{ $project['title'] }}
                                </a>
                            </h3>
                            <p class="mt-2 text-[13px] text-[#777367] font-light max-w-lg leading-relaxed">
                                {{ $project['tagline'] }}
                            </p>
                        </div>
                        <div class="text-right shrink-0">
                            <span class="block text-[11px] uppercase tracking-[0.14em] text-[#1e211f] font-medium">{{ $project['area'] }}</span>
                            <span class="block text-[10px] text-[#8d7859] tracking-wider mt-1">{{ $project['scope'] }}</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- Bottom Consultation CTA --}}
        <div class="studio-cta-box">
            <div>
                <span class="studio-eyebrow text-[#c0a57c] block mb-2">Private Spatial Commission</span>
                <h3>Have a distinct architectural project <em>in mind?</em></h3>
                <p>
                    Our studio reviews spatial briefs for luxury residential penthouses, corporate headquarters, and complete architectural renovations in Dhaka.
                </p>
            </div>
            <a href="{{ route('contact') }}" class="studio-button studio-button-light shrink-0">
                Book a Consultation <span aria-hidden="true">↗</span>
            </a>
        </div>
    </div>

    {{-- Filter Tab Interactive Logic --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.editorial-filter-btn');
            const items = document.querySelectorAll('#projects-grid article');

            buttons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const filter = button.getAttribute('data-filter');

                    buttons.forEach(function (b) {
                        b.classList.remove('active');
                        b.setAttribute('aria-selected', 'false');
                    });
                    button.classList.add('active');
                    button.setAttribute('aria-selected', 'true');

                    items.forEach(function (item) {
                        const itemCategory = item.getAttribute('data-category');
                        if (filter === 'all' || itemCategory === filter) {
                            item.style.display = '';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</x-layouts.public>

<x-layouts.public 
    :title="$title"
    :metaDescription="$metaDescription"
    :breadcrumbs="$breadcrumbs"
>
    <div class="inner-page-wrap">
        {{-- Breadcrumbs --}}
        <nav aria-label="Breadcrumb" class="studio-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span class="sep" aria-hidden="true">/</span>
            <span class="current" aria-current="page">Journal</span>
        </nav>

        {{-- Editorial Page Header --}}
        <header class="inner-header">
            <div class="studio-eyebrow">
                <span class="status-dot"></span>
                <span>Editorial Monograph • Dhaka</span>
            </div>
            <h1>{{ 'Architectural Insights & Design Commentary' }}<br><em>Perspectives from our atelier.</em></h1>
            <p class="inner-header-lead">
                Essays, construction methodologies, and material perspectives on residential and commercial spatial development in Dhaka.
            </p>
        </header>

        @php
            $insightsArray = array_values($insights);
            $featuredInsight = $insightsArray[0] ?? null;
            $otherInsights = array_slice($insightsArray, 1);
        @endphp

        {{-- Featured Lead Article Treatment --}}
        @if($featuredInsight)
            <article class="service-editorial-card mb-16 border-t-0 pt-0">
                <div class="service-editorial-visual">
                    <a href="{{ route('insights.show', $featuredInsight['slug']) }}" aria-label="Read featured essay: {{ $featuredInsight['title'] }}">
                        <img src="{{ asset($featuredInsight['cover_image']) }}" 
                             alt="{{ $featuredInsight['title'] }}" 
                             loading="lazy" 
                             width="1200" 
                             height="750">
                    </a>
                </div>
                <div class="service-editorial-body">
                    <div class="studio-eyebrow">
                        <span class="text-[#c0a57c]">Featured Essay</span>
                        <span>•</span>
                        <span>{{ $featuredInsight['category'] }}</span>
                        <span>•</span>
                        <span>{{ $featuredInsight['read_time'] }}</span>
                    </div>
                    <h2 class="service-editorial-title">
                        <a href="{{ route('insights.show', $featuredInsight['slug']) }}">
                            {{ $featuredInsight['title'] }}
                        </a>
                    </h2>
                    <p class="service-editorial-desc">
                        {{ $featuredInsight['summary'] }}
                    </p>
                    <div class="flex items-center justify-between pt-2">
                        <a href="{{ route('insights.show', $featuredInsight['slug']) }}" class="studio-button">
                            Read Essay <span aria-hidden="true">↗</span>
                        </a>
                        <span class="text-[11px] text-[#8d7859] uppercase tracking-wider">{{ $featuredInsight['date'] }}</span>
                    </div>
                </div>
            </article>
        @endif

        {{-- Remaining Insights Grid --}}
        @if(!empty($otherInsights))
            <section class="pt-12 border-t border-[#30291e20] mb-20" aria-label="More Articles">
                <div class="section-intro mb-10">
                    <div>
                        <div class="studio-eyebrow">Studio Perspectives</div>
                        <h2>Further Architectural Essays</h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    @foreach($otherInsights as $insight)
                        <article class="group bg-white border border-[#30291e15] flex flex-col justify-between overflow-hidden hover:shadow-md transition-all">
                            <div>
                                <a href="{{ route('insights.show', $insight['slug']) }}" class="block aspect-[16/10] overflow-hidden bg-[#efeae2]">
                                    <img src="{{ asset($insight['cover_image']) }}" 
                                         alt="{{ $insight['title'] }}" 
                                         loading="lazy" 
                                         width="800" 
                                         height="500" 
                                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.03]">
                                </a>
                                <div class="p-8">
                                    <div class="flex items-center justify-between text-[10px] uppercase tracking-[0.18em] text-[#8d7859] font-medium mb-3">
                                        <span>{{ $insight['category'] }}</span>
                                        <span>{{ $insight['read_time'] }}</span>
                                    </div>
                                    <h3 class="font-serif text-2xl text-[#1e211f] group-hover:text-[#8e785b] transition-colors leading-snug font-normal mb-3">
                                        <a href="{{ route('insights.show', $insight['slug']) }}">
                                            {{ $insight['title'] }}
                                        </a>
                                    </h3>
                                    <p class="text-[13px] leading-relaxed text-[#676660] font-light">
                                        {{ $insight['summary'] }}
                                    </p>
                                </div>
                            </div>

                            <div class="px-8 pb-8 pt-4 border-t border-[#30291e10] flex items-center justify-between text-[11px]">
                                <span class="text-[#8d7859] uppercase tracking-wider">{{ $insight['date'] }}</span>
                                <a href="{{ route('insights.show', $insight['slug']) }}" class="text-[#1e211f] group-hover:text-[#8e785b] font-medium uppercase tracking-[0.14em] transition-colors flex items-center gap-1.5">
                                    <span>Read Essay</span>
                                    <span>→</span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- Bottom Consultation CTA --}}
        <div class="studio-cta-box">
            <div>
                <span class="studio-eyebrow text-[#c0a57c] block mb-2">Architectural Collaboration</span>
                <h3>Have an interior design <em>conversation?</em></h3>
                <p>
                    Discuss your spatial vision with our Dhaka studio team. We accept private commissions for residential penthouses and corporate developments.
                </p>
            </div>
            <a href="{{ route('contact') }}" class="studio-button studio-button-light shrink-0">
                Book a Consultation <span aria-hidden="true">↗</span>
            </a>
        </div>
    </div>
</x-layouts.public>

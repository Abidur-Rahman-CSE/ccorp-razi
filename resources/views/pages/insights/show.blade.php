<x-layouts.public 
    :title="$title"
    :metaDescription="$metaDescription"
    :metaImage="$metaImage"
    :breadcrumbs="$breadcrumbs"
>
    <x-slot:head>
        <link rel="preload" as="image" href="{{ asset($insight['cover_image']) }}" fetchpriority="high">
    </x-slot:head>

    <article class="inner-page-wrap">
        {{-- Breadcrumbs --}}
        <nav aria-label="Breadcrumb" class="studio-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span class="sep" aria-hidden="true">/</span>
            <a href="{{ route('insights.index') }}">Journal</a>
            <span class="sep" aria-hidden="true">/</span>
            <span class="current" aria-current="page">{{ $insight['title'] }}</span>
        </nav>

        {{-- Editorial Article Header --}}
        <header class="inner-header max-w-3xl">
            <div class="studio-eyebrow">
                <span class="status-dot"></span>
                <span>{{ $insight['category'] }} • {{ $insight['date'] }} • {{ $insight['read_time'] }}</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-normal leading-[1.14]">
                {{ $insight['title'] }}
            </h1>
        </header>

        {{-- Article Visual --}}
        <div class="w-full aspect-[16/9] md:aspect-[21/10] overflow-hidden bg-[#efeae2] border border-[#30291e15] mb-16 shadow-sm">
            <img src="{{ asset($insight['cover_image']) }}" 
                 alt="{{ $insight['title'] }}" 
                 fetchpriority="high"
                 width="1600" 
                 height="900" 
                 class="w-full h-full object-cover">
        </div>

        {{-- Reading Container --}}
        <div class="max-w-[760px] mx-auto">
            {{-- Standfirst / Summary Callout --}}
            <div class="font-serif text-xl sm:text-2xl text-[#1e211f] leading-relaxed font-normal border-l-2 border-[#c0a57c] pl-6 italic mb-10">
                {{ $insight['summary'] }}
            </div>

            {{-- Main Prose Body --}}
            <div class="space-y-6 text-[16px] leading-[1.9] text-[#55524a] font-light">
                <p>
                    {{ $insight['content'] }}
                </p>
                <p>
                    In our Dhaka practice, each spatial project is evaluated not just on paper, but through the tactile lens of local weather, dust management, acoustic comfort, and long-term timber stability. When materials are selected with architectural honesty, maintenance decreases and spaces age with profound dignity.
                </p>
                <blockquote class="my-8 p-6 bg-[#efeae2] border border-[#30291e12] font-serif text-lg text-[#1e211f] italic leading-relaxed">
                    “True spatial luxury in a dense tropical metropolis is not measured by shiny finishes, but by acoustic serenity, natural daylight choreography, and materials that invite the hand to touch them.”
                </blockquote>
                <p>
                    Whether working on high-rise residential properties or dynamic corporate environments, Champion Interior Design champions architectural restraint and single-source turnkey delivery as the only dependable method to achieve enduring spatial quality.
                </p>
            </div>

            {{-- Author Signature Card --}}
            <div class="mt-16 pt-8 border-t border-[#30291e20] flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/team/mushfiqur_rahman_razi.jpg') }}" 
                         alt="Mushfiqur Rahman Razi" 
                         class="w-14 h-14 object-cover object-top border border-[#c0a57c]">
                    <div>
                        <strong class="font-serif text-lg text-[#1e211f] block leading-tight font-normal">Mushfiqur Rahman Razi</strong>
                        <span class="text-[10px] uppercase tracking-[0.18em] text-[#8d7859] block mt-1">Founder & CEO • Champion Interior Design</span>
                    </div>
                </div>
                <a href="{{ route('contact') }}" class="studio-button shrink-0">
                    Consult Studio <span aria-hidden="true">↗</span>
                </a>
            </div>
        </div>

        {{-- Related Articles --}}
        @if(!empty($relatedInsights))
            <section class="pt-20 mt-20 border-t border-[#30291e20]" aria-label="Related Articles">
                <div class="section-intro mb-10">
                    <div>
                        <div class="studio-eyebrow">Related Perspectives</div>
                        <h2>Further Architectural Reading</h2>
                    </div>
                    <div class="section-aside">
                        <a href="{{ route('insights.index') }}" class="studio-text-link">
                            All Journal Essays <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    @foreach(array_slice($relatedInsights, 0, 2) as $related)
                        <article class="group bg-white border border-[#30291e15] flex flex-col justify-between overflow-hidden hover:shadow-md transition-all">
                            <div>
                                <a href="{{ route('insights.show', $related['slug']) }}" class="block aspect-[16/10] overflow-hidden bg-[#efeae2]">
                                    <img src="{{ asset($related['cover_image']) }}" 
                                         alt="{{ $related['title'] }}" 
                                         loading="lazy" 
                                         width="800" 
                                         height="500" 
                                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.03]">
                                </a>
                                <div class="p-8">
                                    <div class="text-[10px] uppercase tracking-[0.18em] text-[#8d7859] font-medium mb-2">
                                        {{ $related['category'] }} • {{ $related['read_time'] }}
                                    </div>
                                    <h3 class="font-serif text-2xl text-[#1e211f] group-hover:text-[#8e785b] transition-colors leading-snug font-normal mb-3">
                                        <a href="{{ route('insights.show', $related['slug']) }}">
                                            {{ $related['title'] }}
                                        </a>
                                    </h3>
                                    <p class="text-[13px] leading-relaxed text-[#676660] font-light">
                                        {{ $related['summary'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="px-8 pb-8 pt-4 border-t border-[#30291e10] flex items-center justify-between text-[11px]">
                                <span class="text-[#8d7859] uppercase tracking-wider">{{ $related['date'] }}</span>
                                <a href="{{ route('insights.show', $related['slug']) }}" class="text-[#1e211f] group-hover:text-[#8e785b] font-medium uppercase tracking-[0.14em] transition-colors flex items-center gap-1.5">
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
                <span class="studio-eyebrow text-[#c0a57c] block mb-2">Private Spatial Commission</span>
                <h3>Bring quiet authority to <em>your space.</em></h3>
                <p>
                    Contact our atelier to discuss custom architectural millwork, spatial layout options, or turnkey construction milestones in Dhaka.
                </p>
            </div>
            <a href="{{ route('contact') }}" class="studio-button studio-button-light shrink-0">
                Book a Consultation <span aria-hidden="true">↗</span>
            </a>
        </div>
    </article>
</x-layouts.public>

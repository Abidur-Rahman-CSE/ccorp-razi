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
            <span class="current" aria-current="page">Studio</span>
        </nav>

        {{-- Editorial Page Header --}}
        <header class="inner-header">
            <div class="studio-eyebrow">
                <span class="status-dot"></span>
                <span>Studio Monograph • Architectural Philosophy</span>
            </div>
            <h1>{{ 'Design with Purpose. Build with Precision.' }}<br><em>A connected approach in Dhaka.</em></h1>
            <p class="inner-header-lead">
                Champion Interior Design is an architectural interior design and turnkey execution studio based in Dhaka, Bangladesh, led by Founder & CEO Mushfiqur Rahman Razi.
            </p>
        </header>

        {{-- Studio Hero Visual --}}
        <div class="w-full aspect-[16/9] md:aspect-[21/9] overflow-hidden bg-[#efeae2] border border-[#30291e15] mb-20 shadow-sm">
            <img src="{{ asset('images/showcase/hero_penthouse_dhaka.jpg') }}" 
                 alt="Champion Interior Design studio aesthetic - warm architectural luxury" 
                 loading="lazy" 
                 width="1600" 
                 height="700" 
                 class="w-full h-full object-cover">
        </div>

        {{-- Philosophy & Disciplines Breakdown --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start mb-24">
            <div class="lg:col-span-7 space-y-6">
                <div class="studio-eyebrow text-[#8d7859]">Our Architectural Philosophy</div>
                <h2 class="font-serif text-3xl sm:text-4xl text-[#1e211f] font-normal leading-tight">
                    Spatial Harmony Derived from Light, Material, and Human Comfort
                </h2>
                <div class="space-y-5 text-[15px] leading-relaxed text-[#5d5951] font-light">
                    <p>
                        In Bangladesh’s bustling urban landscape, modern interiors too often rely on superficial decoration, excessive gold trims, and disconnected contractors. At Champion Interior Design, we believe genuine luxury emerges from architectural discipline: generous proportions, natural light choreography, acoustic serenity, and tactile material sincerity.
                    </p>
                    <p>
                        Every project begins with laser millimeter measurements and rigorous 3D spatial modeling. By integrating architectural zoning with in-house master carpentry and MEP engineering, we ensure that the finished space mirrors the approved 3D design without budget creep or unforeseen delays.
                    </p>
                    <p>
                        From private residential penthouses in Gulshan and Baridhara to authoritative corporate headquarters in Banani, our work is defined by quiet restraint, enduring craftsmanship, and white-glove turnkey accountability.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-5 bg-[#efeae2] p-8 lg:p-10 border border-[#30291e15] space-y-6">
                <div class="studio-eyebrow text-[#8d7859]">Four Studio Pillars</div>
                <div class="space-y-4 text-[13px]">
                    <div class="pb-4 border-b border-[#30291e15]">
                        <strong class="text-[#1e211f] block text-[15px] font-serif font-normal mb-1">Turnkey Single-Source Execution</strong>
                        <span class="text-[#676660] leading-relaxed">Design, material procurement, civil modifications, and master joinery delivered under one contract.</span>
                    </div>
                    <div class="pb-4 border-b border-[#30291e15]">
                        <strong class="text-[#1e211f] block text-[15px] font-serif font-normal mb-1">Photorealistic 3D Planning</strong>
                        <span class="text-[#676660] leading-relaxed">Full spatial simulation verifying natural illumination, clearances, and material interactions before construction.</span>
                    </div>
                    <div class="pb-4 border-b border-[#30291e15]">
                        <strong class="text-[#1e211f] block text-[15px] font-serif font-normal mb-1">Direct Material Vetting</strong>
                        <span class="text-[#676660] leading-relaxed">Honed travertine stone, certified smoked oak joinery, architectural acoustic glass, and European hardware.</span>
                    </div>
                    <div>
                        <strong class="text-[#1e211f] block text-[15px] font-serif font-normal mb-1">Dedicated Site Supervision</strong>
                        <span class="text-[#676660] leading-relaxed">Strict adherence to architectural drawings with multi-point quality inspections prior to handover.</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Founder Leadership Section --}}
        <section class="bg-[#24251f] text-[#f1eee7] p-8 lg:p-16 border border-[#30291e30] mb-24" aria-label="Studio Leadership">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                <div class="lg:col-span-4">
                    <div class="overflow-hidden bg-[#1a1814] aspect-[4/5] border border-white/20">
                        <img src="{{ asset('images/team/mushfiqur_rahman_razi.jpg') }}" 
                             alt="Mushfiqur Rahman Razi — Founder & CEO of Champion Interior Design" 
                             loading="lazy" 
                             width="500" 
                             height="650" 
                             class="w-full h-full object-cover object-top filter saturate-[0.85]">
                    </div>
                </div>
                <div class="lg:col-span-8">
                    <span class="studio-eyebrow text-[#c0a57c] block mb-2">
                        Studio Leadership • Dhaka
                    </span>
                    <h3 class="font-serif text-3xl sm:text-4xl text-white font-normal mb-1">
                        Mushfiqur Rahman Razi
                    </h3>
                    <p class="text-[11px] uppercase tracking-[0.2em] text-[#c0a57c] mb-6">Founder & CEO</p>
                    
                    <blockquote class="font-serif text-xl sm:text-2xl text-[#f1eee7] font-light italic leading-relaxed border-l-2 border-[#c0a57c] pl-6 mb-6">
                        “Our mission is to create spaces that breathe with calmness and precision—environments where architecture, light, and natural materials converge to enrich daily human life.”
                    </blockquote>

                    <p class="text-[14px] leading-relaxed text-[#b8b5a9] mb-8 max-w-xl">
                        Under Mushfiqur Rahman Razi's direction, Champion Interior Design operates with an unwavering focus on craftsmanship integrity, disciplined project management, and transparent client partnerships across Bangladesh.
                    </p>

                    <div class="flex flex-wrap gap-6 text-[12px] uppercase tracking-[0.14em]">
                        <a href="{{ route('projects.index') }}" class="text-[#c0a57c] hover:text-white transition-colors">
                            Explore Completed Projects ↗
                        </a>
                        <span class="text-white/20">|</span>
                        <a href="tel:+8801715394444" class="text-[#c0a57c] hover:text-white transition-colors">
                            Direct: 01715394444
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Material Tactility Story --}}
        <section class="material-story mb-24" aria-labelledby="about-materials">
            <div class="material-image">
                <img src="{{ asset('images/showcase/gulshan_residence.jpg') }}" 
                     alt="Natural materials and refined joinery in Champion Interior Design projects" 
                     loading="lazy" 
                     width="1200" 
                     height="800">
                <span>Natural Materials • Enduring Form</span>
            </div>
            <div class="material-copy">
                <p class="studio-eyebrow">Material Honesty</p>
                <h2 id="about-materials">Authentic materials<br><em>that age with dignity.</em></h2>
                <p>
                    Rather than imitation laminates and transient trends, we prioritize tactile surfaces that connect residents with natural calm: unpolished travertine stone, smoked oak joinery, and warm brushed champagne brass.
                </p>
                <div class="material-palette">
                    <div><span class="swatch swatch-stone"></span>Natural stone</div>
                    <div><span class="swatch swatch-wood"></span>Warm timber</div>
                    <div><span class="swatch swatch-brass"></span>Brushed brass</div>
                </div>
                <a href="{{ route('projects.index') }}" class="studio-text-link">View materials in selected works <span aria-hidden="true">↗</span></a>
            </div>
        </section>

        {{-- Bottom Consultation CTA --}}
        <div class="studio-cta-box">
            <div>
                <span class="studio-eyebrow text-[#c0a57c] block mb-2">Private Spatial Commission</span>
                <h3>Ready to discuss your <em>spatial requirements?</em></h3>
                <p>
                    We welcome inquiries from property owners, architects, and business leaders seeking turnkey interior execution in Dhaka.
                </p>
            </div>
            <div class="flex flex-wrap gap-4 shrink-0">
                <a href="{{ route('contact') }}" class="studio-button studio-button-light">
                    Book a Private Consultation <span aria-hidden="true">↗</span>
                </a>
                <a href="{{ route('projects.index') }}" class="studio-button">
                    View Portfolio Monograph <span aria-hidden="true">↗</span>
                </a>
            </div>
        </div>
    </div>
</x-layouts.public>

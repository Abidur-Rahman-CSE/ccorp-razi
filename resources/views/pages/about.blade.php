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
                <li class="text-[#1E211F] font-medium" aria-current="page">About Studio</li>
            </ol>
        </nav>

        {{-- Page Header --}}
        <x-section-heading 
            eyebrow="Studio Monograph"
            title="Design with Purpose. Build with Precision."
            description="Champion Interior Design is an architectural interior design and turnkey execution studio based in Dhaka, Bangladesh."
        />

        {{-- Studio Hero Visual --}}
        <div class="w-full aspect-[16/9] md:aspect-[21/9] overflow-hidden bg-[#EFEAE2] hairline-all mb-20">
            <img src="{{ asset('images/showcase/hero_penthouse_dhaka.jpg') }}" 
                 alt="Champion Interior Design studio aesthetic - warm architectural luxury" 
                 loading="lazy" 
                 width="1600" 
                 height="700" 
                 class="w-full h-full object-cover">
        </div>

        {{-- Narrative & Philosophy --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start mb-24">
            <div class="lg:col-span-7 space-y-6 text-[15px] sm:text-base leading-relaxed text-[#676660] font-light">
                <h2 class="font-serif text-3xl sm:text-4xl text-[#1E211F] font-normal leading-tight mb-6">
                    Spatial Harmony Derived from Light, Material, and Human Comfort
                </h2>
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

            <div class="lg:col-span-5 bg-white p-8 lg:p-10 hairline-all space-y-6">
                <h3 class="text-[11px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold">
                    Studio Disciplines
                </h3>
                <div class="space-y-4 text-[13px]">
                    <div class="pb-3 hairline-b">
                        <strong class="text-[#1E211F] block text-[14px]">Turnkey Single-Source Execution</strong>
                        <span class="text-[#676660]">Design, material procurement, civil modifications, and master joinery delivered under one contract.</span>
                    </div>
                    <div class="pb-3 hairline-b">
                        <strong class="text-[#1E211F] block text-[14px]">Photorealistic 3D Planning</strong>
                        <span class="text-[#676660]">Full spatial simulation verifying natural illumination, clearances, and material interactions before construction.</span>
                    </div>
                    <div class="pb-3 hairline-b">
                        <strong class="text-[#1E211F] block text-[14px]">Direct Material Vetting</strong>
                        <span class="text-[#676660]">Honed travertine stone, certified smoked oak joinery, architectural acoustic glass, and European hardware.</span>
                    </div>
                    <div>
                        <strong class="text-[#1E211F] block text-[14px]">Dedicated Site Supervision</strong>
                        <span class="text-[#676660]">Strict adherence to architectural drawings with multi-point quality inspections prior to handover.</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Founder Credibility Section --}}
        <section class="bg-[#1E211F] text-[#F7F5F0] p-8 lg:p-16 hairline-all mb-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                <div class="lg:col-span-4">
                    <img src="{{ asset('images/team/mushfiqur_rahman_razi.jpg') }}" 
                         alt="Mushfiqur Rahman Razi - Founder & CEO of Champion Interior Design" 
                         loading="lazy" 
                         width="500" 
                         height="650" 
                         class="w-full aspect-[4/5] object-cover object-top border border-white/20">
                </div>
                <div class="lg:col-span-8">
                    <span class="text-[10px] uppercase tracking-[0.22em] text-[#AD8753] font-semibold block mb-2">
                        Studio Leadership
                    </span>
                    <h3 class="font-serif text-3xl sm:text-4xl text-white font-normal mb-2">
                        Mushfiqur Rahman Razi
                    </h3>
                    <p class="text-[12px] uppercase tracking-[0.16em] text-[#AD8753] mb-6">Founder & CEO</p>
                    
                    <blockquote class="font-serif text-xl sm:text-2xl text-[#EFEAE2] font-light italic leading-relaxed border-l-2 border-[#AD8753] pl-6 mb-6">
                        “Our mission is to create spaces that breathe with calmness and precision—environments where architecture, light, and natural materials converge to enrich daily human life.”
                    </blockquote>

                    <p class="text-[14px] leading-relaxed text-[#A1A09A]">
                        Under Mushfiqur Rahman Razi's direction, Champion Interior Design operates with an unwavering focus on craftsmanship integrity, disciplined project management, and transparent client partnerships across Bangladesh.
                    </p>
                </div>
            </div>
        </section>

        {{-- Bottom CTA --}}
        <div class="text-center max-w-2xl mx-auto">
            <h3 class="font-serif text-3xl text-[#1E211F] mb-4">Start a Conversation</h3>
            <p class="text-[15px] text-[#676660] mb-8">
                We welcome inquiries from property owners, architects, and business leaders seeking turnkey interior execution in Dhaka.
            </p>
            <a href="{{ route('contact') }}" class="px-8 py-4 bg-[#1E211F] text-[#F7F5F0] hover:bg-[#AD8753] text-[12px] uppercase tracking-[0.18em] font-medium transition-colors">
                Book a Private Consultation
            </a>
        </div>
    </div>
</x-layouts.public>

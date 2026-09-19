<x-layouts.public :title="$title" :metaDescription="$metaDescription" :faqs="$faqs">
    <x-slot:head>
        <link rel="preload" as="image" href="{{ asset('images/showcase/pendant-room-off.webp') }}" fetchpriority="high">
    </x-slot:head>

    <section class="architecture-hero" aria-label="Introduction">
        <div class="architecture-sticky">
            <div class="architecture-scene" data-architectural-scene data-scene-state="loading" data-model="{{ asset('models/pendant/pendant.gltf') }}">
                <img class="room-plate room-off" data-room-off src="{{ asset('images/showcase/pendant-room-off.webp') }}" alt="A quiet sitting room with walnut, travertine and linen, overlooking Dhaka at dusk" width="1536" height="1024" fetchpriority="high">
                <img class="room-plate room-on" data-room-on src="{{ asset('images/showcase/pendant-room-on.webp') }}" alt="" aria-hidden="true" width="1536" height="1024" decoding="async">
                <img class="room-plate detail-plate" data-detail-plate src="{{ asset('images/showcase/pendant-detail.webp') }}" alt="Walnut wall and sculptural travertine console with a ceramic vase" width="1536" height="1024" decoding="async">
                <span class="pendant-contact" aria-hidden="true"></span>
                <canvas aria-hidden="true"></canvas>
            </div>
            <div class="hero-atmosphere" aria-hidden="true"></div>
            <div class="architecture-copy">
                <p class="studio-eyebrow"><span class="status-dot"></span> Champion Interior Design · Dhaka</p>
                <h1>Spaces Designed Around the Way You Live.</h1>
                <p class="hero-description">Thoughtful interiors. Tactile materials. From the first sketch to the finishing touch, a space that feels like you.</p>
                <div class="hero-actions">
                    <a class="studio-button studio-button-light" href="#projects">Discover our work <span aria-hidden="true">↗</span></a>
                    <a class="studio-text-link" href="#consultation">Start a conversation <span aria-hidden="true">↗</span></a>
                </div>
                <p class="hero-bengali" lang="bn">আপনার ভাবনা, আমাদের নকশা।</p>
            </div>
            <section class="atmosphere-chapter" aria-labelledby="atmosphere-title" aria-hidden="true" inert>
                <p class="studio-eyebrow">02 / The art of atmosphere</p>
                <h2 id="atmosphere-title">A little light.<br><em>A different feeling.</em></h2>
                <p>Beautiful spaces begin with thoughtful details. The grain of walnut. The softness of stone. A warm glow, exactly where it belongs.</p>
                <a class="studio-text-link" href="#projects">Explore our spaces <span aria-hidden="true">↗</span></a>
                <div class="atmosphere-materials"><span>01 — Walnut</span><span>02 — Travertine</span><span>03 — Warm light</span></div>
            </section>
            <div class="scene-caption">
                <span class="studio-eyebrow" data-scene-chapter>01 / A considered detail</span>
                <p>A study in light<br> and quiet living.</p>
                <span class="scene-disclaimer">An imagined interior · A study in atmosphere</span>
            </div>
            <div class="hero-bottom">
                <a href="#projects" class="scroll-cue"><span aria-hidden="true">↓</span> Scroll to discover</a>
                <div class="scene-controls" role="group" aria-label="Animation preferences">
                    <span class="scene-progress" aria-hidden="true"><i></i></span>
                    <button type="button" data-scene-pause aria-pressed="false">Pause motion</button>
                </div>
                <span class="hero-coordinate">23.8103° N &nbsp; 90.4125° E</span>
            </div>
        </div>
    </section>

    <div class="studio-strip" aria-label="Our expertise">
        <span>Interior design</span><span aria-hidden="true">◇</span><span>Architecture</span><span aria-hidden="true">◇</span><span>Turnkey execution</span><span aria-hidden="true">◇</span><span>Made for living</span>
    </div>

    <section class="studio-section selected-work" id="projects">
        <div class="section-intro">
            <div><p class="studio-eyebrow">01 / Selected spaces</p><h2>Considered spaces.<br><em>Distinctly yours.</em></h2></div>
            <div class="section-aside"><p>A closer look at our residential, workplace and architectural design portfolio.</p><a class="studio-text-link" href="{{ route('projects.index') }}">All projects <span aria-hidden="true">↗</span></a></div>
        </div>
        <div class="editorial-projects">
            @foreach($featuredProjects as $project)
                <article class="editorial-project {{ $loop->first ? 'project-wide' : '' }}">
                    <a href="{{ route('projects.show', $project['slug']) }}" class="project-visual" @if($loop->first) data-wood-reveal @endif aria-label="View {{ $project['title'] }}">
                        <img src="{{ asset($project['cover_image']) }}" alt="{{ $project['title'] }} — interior design portfolio" loading="lazy" width="1536" height="1024">
                        @if($loop->first)
                            <span class="wood-screen" aria-hidden="true"><i></i><i></i><i></i><i></i></span>
                        @endif
                        <span class="project-index">0{{ $loop->iteration }}</span><span class="project-open" aria-hidden="true">↗</span>
                    </a>
                    <div class="project-description"><div><p class="studio-eyebrow">{{ $project['category'] }}</p><h3><a href="{{ route('projects.show', $project['slug']) }}">{{ $project['title'] }}</a></h3></div><span>{{ $project['location'] }}</span></div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="material-story" aria-labelledby="material-heading">
        <div class="material-image"><img src="{{ asset('images/showcase/gulshan_residence.jpg') }}" alt="Interior study with warm timber, layered lighting and natural textures" loading="lazy" width="1536" height="1024"><span>Texture. Proportion. Light.</span></div>
        <div class="material-copy"><p class="studio-eyebrow">The details make the difference</p><h2 id="material-heading">Good design is<br>something you<br><em>can feel.</em></h2><p>The warmth of timber. The calm of natural stone. Light falling in just the right place. We bring these details together around the way you use your space.</p><div class="material-palette" aria-label="Our material palette"><div><span class="swatch swatch-stone"></span>Natural stone</div><div><span class="swatch swatch-wood"></span>Warm timber</div><div><span class="swatch swatch-brass"></span>Brushed brass</div></div><a class="studio-text-link" href="{{ route('about') }}">Meet the studio <span aria-hidden="true">↗</span></a></div>
    </section>

    <section class="studio-section practice-section" id="services">
        <div class="section-intro"><div><p class="studio-eyebrow">02 / What we do</p><h2>One vision.<br><em>Every detail.</em></h2></div><div class="section-aside"><p>Interior design, development and construction. A connected approach, from planning your space to bringing it to life.</p><a class="studio-text-link" href="{{ route('services.index') }}">Explore all services <span aria-hidden="true">↗</span></a></div></div>
        <div class="practice-grid">
            <a href="{{ route('services.show', 'residential-interior') }}" class="practice-card"><span class="practice-number">01</span><span><h3>Homes & residences</h3><p>Spaces for everyday rituals and everything in between.</p></span><span aria-hidden="true">↗</span></a>
            <a href="{{ route('services.show', 'office-interior') }}" class="practice-card"><span class="practice-number">02</span><span><h3>Workplaces & commercial</h3><p>Interiors that work as thoughtfully as they look.</p></span><span aria-hidden="true">↗</span></a>
            <a href="{{ route('services.show', 'renovation-remodelling') }}" class="practice-card"><span class="practice-number">03</span><span><h3>Renovation & transformation</h3><p>A fresh perspective on the space you already have.</p></span><span aria-hidden="true">↗</span></a>
            <a href="{{ route('services.show', 'exterior-design') }}" class="practice-card"><span class="practice-number">04</span><span><h3>Architecture & façades</h3><p>A considered first impression, inside and out.</p></span><span aria-hidden="true">↗</span></a>
        </div>
    </section>

    <section class="studio-process studio-section" id="process">
        <div class="section-intro"><div><p class="studio-eyebrow">03 / From idea to everyday</p><h2>Your space.<br><em>Our shared journey.</em></h2></div><a class="studio-text-link" href="{{ route('process') }}">Our full process <span aria-hidden="true">↗</span></a></div>
        <ol class="process-phases"><li><span>01</span><h3>Listen & discover</h3><p>Your needs, your routines, your ambitions. It starts with a conversation.</p></li><li><span>02</span><h3>Design & refine</h3><p>Layouts, 3D studies and material choices. See the direction before we build.</p></li><li><span>03</span><h3>Build & bring to life</h3><p>Coordinated execution, careful detailing and a space ready for its next chapter.</p></li></ol>
    </section>

    <section class="studio-section studio-note" id="founder">
        <div class="founder-portrait"><img src="{{ asset('images/team/mushfiqur_rahman_razi.jpg') }}" alt="Mushfiqur Rahman Razi, Founder & CEO" loading="lazy" width="800" height="1000"></div>
        <div><p class="studio-eyebrow">A personal approach</p><h2>Behind every space,<br><em>a conversation.</em></h2><p>Led by Mushfiqur Rahman Razi, Champion Interior Design brings design and execution together. Tell us what your space needs to do. We will help you imagine what it could become.</p><div class="founder-signoff"><span>Mushfiqur Rahman Razi<small>Founder & CEO · Champion Interior Design</small></span><a class="studio-text-link" href="{{ route('about') }}">Our story ↗</a></div></div>
    </section>

    <section class="studio-social"><div><p class="studio-eyebrow">From the studio</p><h2>More ideas. More possibilities.</h2><p>Explore design inspiration and updates on our official Facebook page.</p></div><a class="studio-button" href="https://www.facebook.com/championinteriordesign" target="_blank" rel="noopener noreferrer">Follow Champion <span aria-hidden="true">↗</span></a></section>

    <section class="studio-section studio-faq" id="faq">
        <div><p class="studio-eyebrow">Before we begin</p><h2>A little clarity<br><em>goes a long way.</em></h2></div>
        <div class="studio-questions">
            @foreach($faqs as $faq)
                <details><summary>{{ $faq['question'] }}<span aria-hidden="true">+</span></summary><p>{{ $faq['answer'] }}</p></details>
            @endforeach
        </div>
    </section>

    <section class="studio-section studio-contact" id="consultation">
        <div class="contact-introduction"><p class="studio-eyebrow">Your next chapter starts here</p><h2>Let's make<br><em>room for you.</em></h2><p>A new home, a better workplace, or a space ready for a fresh start. Tell us what you have in mind.</p><a class="contact-phone" href="tel:+8801715394444">01715394444 <span aria-hidden="true">↗</span></a><a class="contact-email" href="mailto:chmpnidesign@gmail.com">chmpnidesign@gmail.com</a><div class="contact-meta"><span>Dhaka, Bangladesh</span><a href="https://wa.me/8801715394444" target="_blank" rel="noopener noreferrer">Let's talk on WhatsApp ↗</a></div></div>
        <div class="contact-form-wrap">
            <h3>Tell us about your project</h3>
            @if(session('success'))
                <div class="inquiry-notice" role="status"><strong>Inquiry received</strong><p>{{ session('success') }}</p></div>
            @endif
            @if($errors->any())
                <div class="inquiry-notice inquiry-error" role="alert"><strong>Please check your inquiry</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif
            <form action="{{ route('contact.inquiry') }}" method="POST" class="studio-inquiry">
                @csrf
                <input type="text" name="company_trap" hidden tabindex="-1" autocomplete="off">
                <div class="inquiry-row"><div><label for="home-name">Your name <span>*</span></label><input id="home-name" name="name" value="{{ old('name') }}" autocomplete="name" maxlength="120" placeholder="Full name" required></div><div><label for="home-phone">Phone number <span>*</span></label><input type="tel" id="home-phone" name="phone" value="{{ old('phone') }}" autocomplete="tel" maxlength="30" placeholder="01XXX XXXXXX" required></div></div>
                <div><label for="home-project-type">Project type <span>(optional)</span></label><select id="home-project-type" name="project_type"><option value="">Select your project type</option>@foreach(['Residential Interior', 'Commercial / Office', 'Restaurant & Café', 'Renovation & Remodeling', 'Exterior & Architecture'] as $type)<option value="{{ $type }}" @selected(old('project_type') === $type)>{{ $type }}</option>@endforeach</select></div>
                <div><label for="home-message">What do you have in mind? <span>*</span></label><textarea id="home-message" name="message" rows="3" maxlength="2000" placeholder="A little about your space, location and ideas…" required>{{ old('message') }}</textarea></div>
                <button type="submit" class="studio-button studio-button-light">Send project inquiry <span aria-hidden="true">↗</span></button>
                <p class="inquiry-help">Our team will review your brief and contact you to discuss the next steps.</p>
            </form>
        </div>
    </section>
</x-layouts.public>

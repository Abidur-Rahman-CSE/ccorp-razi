<header id="primary-nav" class="studio-header">
    <nav class="studio-nav" aria-label="Main Navigation">
        <a href="{{ route('home') }}" class="studio-brand" aria-label="Champion Interior Design Home">
            <img src="{{ asset(request()->routeIs('home') ? 'images/brand/champion-corporation-dark-mode.svg' : 'images/brand/champion-corporation-black.svg') }}" alt="Champion Corporation" width="86" height="48">
            <span>Champion<small>Interior design</small></span>
        </a>
        <div class="studio-desktop-links">
            <a href="{{ route('projects.index') }}" @if(request()->routeIs('projects.*')) aria-current="page" @endif>Projects</a>
            <a href="{{ route('services.index') }}" @if(request()->routeIs('services.*')) aria-current="page" @endif>Expertise</a>
            <a href="{{ route('process') }}" @if(request()->routeIs('process')) aria-current="page" @endif>Process</a>
            <a href="{{ route('about') }}" @if(request()->routeIs('about')) aria-current="page" @endif>Studio</a>
            <a href="{{ route('insights.index') }}" @if(request()->routeIs('insights.*')) aria-current="page" @endif>Journal</a>
        </div>
        <div class="studio-nav-actions"><a class="nav-project-link" href="{{ route('contact') }}">Let's talk <span aria-hidden="true">↗</span></a><button type="button" id="mobile-menu-btn" class="studio-menu-toggle" aria-label="Open Navigation Menu" aria-expanded="false" aria-controls="mobile-drawer"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path d="M3 8h18M3 16h18"/></svg></button></div>
    </nav>
    <div id="mobile-drawer" class="studio-drawer translate-x-full invisible pointer-events-none" role="dialog" aria-modal="true" aria-label="Navigation menu" aria-hidden="true" inert data-lenis-prevent>
        <div class="drawer-heading"><span>Champion <small>Interior design</small></span><button type="button" id="mobile-drawer-close" aria-label="Close Navigation Menu">✕</button></div>
        <div class="drawer-links">
            <a href="{{ route('home') }}">Home <span>01</span></a>
            <a href="{{ route('projects.index') }}">Selected projects <span>02</span></a>
            <a href="{{ route('services.index') }}">Our expertise <span>03</span></a>
            <a href="{{ route('process') }}">Our process <span>04</span></a>
            <a href="{{ route('about') }}">The studio <span>05</span></a>
            <a href="{{ route('insights.index') }}">Journal <span>06</span></a>
            <a href="{{ route('contact') }}">Start a conversation <span>↗</span></a>
        </div>
        <div class="drawer-contact"><a href="tel:+8801715394444">01715394444</a><a href="https://wa.me/8801715394444" target="_blank" rel="noopener noreferrer">WhatsApp ↗</a><span>Dhaka, Bangladesh</span></div>
    </div>
</header>

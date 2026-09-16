<header class="fixed top-0 left-0 right-0 z-50" id="primary-nav">
    {{-- Micro Architectural Top Bar (Shows ONLY at screen top, hides on scroll down) --}}
    <div id="top-bar-dark" class="hidden lg:block bg-[#1E211F] text-[#EFEAE2] text-[11px] tracking-[0.18em] uppercase px-6 hairline-b border-black/20 overflow-hidden">
        <div class="max-w-7xl mx-auto flex items-center justify-between h-9">
            <div class="flex items-center gap-6">
                <span>Dhaka, Bangladesh</span>
                <span class="text-[#AD8753]">✦</span>
                <span>Turnkey Architectural Execution</span>
                <span class="text-[#AD8753]">✦</span>
                <span>Residential • Commercial • 3D Visualization</span>
            </div>
            <div class="flex items-center gap-6">
                <a href="tel:+8801715394444" class="hover:text-[#AD8753] transition-colors flex items-center gap-1.5">
                    <span class="text-[#AD8753]">Direct:</span> 01715394444
                </a>
                <span class="text-white/20">|</span>
                <a href="mailto:chmpnidesign@gmail.com" class="hover:text-[#AD8753] transition-colors">
                    chmpnidesign@gmail.com
                </a>
            </div>
        </div>
    </div>

    {{-- Main Glass Navigation Bar --}}
    <nav class="glass-nav px-6 lg:px-12 py-4 transition-all duration-300" aria-label="Main Navigation">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            {{-- Brand Logo --}}
            <a href="{{ route('home') }}" class="group flex items-center gap-3 focus:outline-none focus:ring-1 focus:ring-[#AD8753]" aria-label="Champion Interior Design Home">
                <img src="{{ asset('images/brand/champion-corporation-black.svg') }}" 
                     alt="Champion Corporation" 
                     class="h-10 lg:h-12 w-auto object-contain transition-transform duration-200 group-hover:scale-[1.02]" />
                <div class="hidden sm:flex flex-col border-l border-black/15 pl-3 py-0.5">
                    <span class="font-serif text-[13px] lg:text-[14px] tracking-[0.04em] text-[#1E211F] font-semibold uppercase leading-tight">
                        Interior Design
                    </span>
                    <span class="text-[9px] uppercase tracking-[0.20em] text-[#676660] font-sans font-medium">
                        Dhaka Atelier
                    </span>
                </div>
            </a>

            {{-- Desktop Navigation Links --}}
            <div class="hidden lg:flex items-center gap-6 xl:gap-10 text-[12px] xl:text-[13px] uppercase tracking-[0.14em] text-[#1E211F] font-medium font-sans">
                <a href="{{ route('projects.index') }}" 
                   class="relative py-1 transition-colors hover:text-[#AD8753] {{ request()->routeIs('projects.*') ? 'text-[#AD8753]' : '' }}">
                    Projects
                    @if(request()->routeIs('projects.*'))
                        <span class="absolute bottom-0 left-0 right-0 h-[1.5px] bg-[#AD8753]"></span>
                    @endif
                </a>
                <a href="{{ route('services.index') }}" 
                   class="relative py-1 transition-colors hover:text-[#AD8753] {{ request()->routeIs('services.*') ? 'text-[#AD8753]' : '' }}">
                    Services
                    @if(request()->routeIs('services.*'))
                        <span class="absolute bottom-0 left-0 right-0 h-[1.5px] bg-[#AD8753]"></span>
                    @endif
                </a>
                <a href="{{ route('process') }}" 
                   class="relative py-1 transition-colors hover:text-[#AD8753] {{ request()->routeIs('process') ? 'text-[#AD8753]' : '' }}">
                    Process
                    @if(request()->routeIs('process'))
                        <span class="absolute bottom-0 left-0 right-0 h-[1.5px] bg-[#AD8753]"></span>
                    @endif
                </a>
                <a href="{{ route('about') }}" 
                   class="relative py-1 transition-colors hover:text-[#AD8753] {{ request()->routeIs('about') ? 'text-[#AD8753]' : '' }}">
                    Studio
                    @if(request()->routeIs('about'))
                        <span class="absolute bottom-0 left-0 right-0 h-[1.5px] bg-[#AD8753]"></span>
                    @endif
                </a>
                <a href="{{ route('insights.index') }}" 
                   class="relative py-1 transition-colors hover:text-[#AD8753] {{ request()->routeIs('insights.*') ? 'text-[#AD8753]' : '' }}">
                    Insights
                    @if(request()->routeIs('insights.*'))
                        <span class="absolute bottom-0 left-0 right-0 h-[1.5px] bg-[#AD8753]"></span>
                    @endif
                </a>
                <a href="{{ route('contact') }}" 
                   class="relative py-1 transition-colors hover:text-[#AD8753] {{ request()->routeIs('contact') ? 'text-[#AD8753]' : '' }}">
                    Contact
                    @if(request()->routeIs('contact'))
                        <span class="absolute bottom-0 left-0 right-0 h-[1.5px] bg-[#AD8753]"></span>
                    @endif
                </a>
            </div>

            {{-- Right Actions: Consultation CTA & Mobile Toggle --}}
            <div class="flex items-center gap-3 sm:gap-4">
                <a href="{{ route('contact') }}" 
                   class="hidden sm:inline-flex items-center gap-2 px-4 sm:px-5 py-2.5 bg-[#1E211F] text-[#F7F5F0] hover:bg-[#AD8753] text-[11px] uppercase tracking-[0.16em] font-medium transition-all duration-300 border border-transparent shadow-sm shrink-0">
                    <span>Start a Project</span>
                    <span class="text-[#AD8753] group-hover:text-white transition-colors">→</span>
                </a>

                {{-- Mobile Menu Trigger Button --}}
                <button type="button" 
                        id="mobile-menu-btn"
                        class="lg:hidden p-2 text-[#1E211F] hover:text-[#AD8753] focus:outline-none focus:ring-1 focus:ring-[#AD8753]"
                        aria-label="Open Navigation Menu"
                        aria-expanded="false"
                        aria-controls="mobile-drawer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="square" stroke-linejoin="miter" stroke-width="1.5" d="M4 7h16M4 12h16M4 17h16" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    {{-- Mobile Architectural Navigation Drawer --}}
    <div id="mobile-drawer" 
         class="lg:hidden fixed inset-0 top-0 bg-[#F7F5F0] z-50 transform translate-x-full transition-transform duration-300 ease-in-out overflow-y-auto px-6 py-6 hairline-t invisible pointer-events-none"
         role="dialog"
         aria-modal="true"
         aria-label="Site Navigation"
         aria-hidden="true"
         inert>
        {{-- Drawer Header with Brand and Close Button --}}
        <div class="flex items-center justify-between pb-6 hairline-b border-black/10">
            <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="Champion Interior Design Home">
                <img src="{{ asset('images/brand/champion-corporation-black.svg') }}" 
                     alt="Champion Corporation" 
                     class="h-9 w-auto object-contain" />
                <div class="flex flex-col border-l border-black/15 pl-2.5 py-0.5">
                    <span class="font-serif text-[12px] tracking-[0.04em] text-[#1E211F] font-semibold uppercase leading-tight">
                        Interior Design
                    </span>
                    <span class="text-[8px] uppercase tracking-[0.18em] text-[#676660] font-sans font-medium">
                        Dhaka Atelier
                    </span>
                </div>
            </a>
            <button type="button" 
                    id="mobile-drawer-close"
                    class="p-2 text-[#1E211F] hover:text-[#AD8753] focus:outline-none focus:ring-1 focus:ring-[#AD8753]"
                    aria-label="Close Navigation Menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="square" stroke-linejoin="miter" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="flex flex-col gap-4 text-[14px] uppercase tracking-[0.16em] text-[#1E211F] font-medium font-sans pt-6">
            <a href="{{ route('home') }}" class="py-2.5 hairline-b border-black/10 flex items-center justify-between hover:text-[#AD8753] transition-colors">
                <span>Home</span>
                <span class="text-[#AD8753]">→</span>
            </a>
            <a href="{{ route('projects.index') }}" class="py-2.5 hairline-b border-black/10 flex items-center justify-between hover:text-[#AD8753] transition-colors">
                <span>Selected Projects</span>
                <span class="text-[#AD8753]">→</span>
            </a>
            <a href="{{ route('services.index') }}" class="py-2.5 hairline-b border-black/10 flex items-center justify-between hover:text-[#AD8753] transition-colors">
                <span>Core Services</span>
                <span class="text-[#AD8753]">→</span>
            </a>
            <a href="{{ route('process') }}" class="py-2.5 hairline-b border-black/10 flex items-center justify-between hover:text-[#AD8753] transition-colors">
                <span>Our Process</span>
                <span class="text-[#AD8753]">→</span>
            </a>
            <a href="{{ route('about') }}" class="py-2.5 hairline-b border-black/10 flex items-center justify-between hover:text-[#AD8753] transition-colors">
                <span>Studio & Founder</span>
                <span class="text-[#AD8753]">→</span>
            </a>
            <a href="{{ route('insights.index') }}" class="py-2.5 hairline-b border-black/10 flex items-center justify-between hover:text-[#AD8753] transition-colors">
                <span>Editorial Insights</span>
                <span class="text-[#AD8753]">→</span>
            </a>
            <a href="{{ route('contact') }}" class="py-2.5 hairline-b border-black/10 flex items-center justify-between hover:text-[#AD8753] transition-colors">
                <span>Contact Details</span>
                <span class="text-[#AD8753]">→</span>
            </a>

            <div class="pt-4 flex flex-col gap-3">
                <a href="{{ route('contact') }}" 
                   class="w-full text-center py-3.5 bg-[#1E211F] text-[#F7F5F0] text-[12px] uppercase tracking-[0.18em] font-medium hover:bg-[#AD8753] transition-colors">
                    Start a Project
                </a>
                <a href="https://wa.me/8801715394444" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   class="w-full text-center py-3.5 border border-[#1E211F] text-[#1E211F] text-[12px] uppercase tracking-[0.18em] font-medium hover:border-[#AD8753] hover:text-[#AD8753] transition-colors">
                    WhatsApp Concierge
                </a>
            </div>

            <div class="pt-4 text-[12px] text-[#676660] normal-case tracking-normal">
                <p class="font-medium text-[#1E211F]">Direct Atelier Contacts:</p>
                <p class="mt-1">01715394444 • chmpnidesign@gmail.com</p>
                <p class="mt-0.5">Dhaka, Bangladesh</p>
            </div>
        </div>
    </div>
</header>


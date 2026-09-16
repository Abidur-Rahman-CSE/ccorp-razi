<footer class="bg-[#1E211F] text-[#F7F5F0] pt-20 pb-12 px-6 lg:px-12 hairline-t border-black/40 font-sans">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 lg:gap-8 pb-16 hairline-b border-white/10">
            {{-- Col 1: Studio Brand --}}
            <div class="lg:col-span-2 pr-0 lg:pr-8">
                <a href="{{ route('home') }}" class="inline-block mb-4">
                    <span class="font-serif text-3xl tracking-[-0.02em] text-[#F7F5F0] font-medium block">
                        CHAMPION
                    </span>
                    <span class="text-[10px] uppercase tracking-[0.22em] text-[#AD8753] block -mt-1 font-semibold">
                        Interior Design • Architecture • Turnkey Atelier
                    </span>
                </a>
                <p class="text-[14px] leading-relaxed text-[#A1A09A] max-w-sm mt-3">
                    Champion Interior Design delivers turnkey residential penthouses, corporate headquarters, luxury hospitality venues, and architectural renovation across Dhaka, Bangladesh.
                </p>

                <div class="mt-6 flex flex-wrap gap-4 text-[12px] uppercase tracking-[0.14em]">
                    <a href="tel:+8801715394444" class="inline-flex items-center gap-2 text-[#AD8753] hover:text-white transition-colors">
                        <span>Direct: 01715394444</span>
                    </a>
                    <span class="text-white/20">|</span>
                    <a href="https://wa.me/8801715394444" target="_blank" rel="noopener noreferrer" class="text-[#AD8753] hover:text-white transition-colors">
                        WhatsApp Concierge
                    </a>
                </div>
            </div>

            {{-- Col 2: Services --}}
            <div>
                <h3 class="text-[11px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold mb-5">
                    Core Practices
                </h3>
                <ul class="space-y-3 text-[13px] text-[#A1A09A]">
                    <li><a href="{{ route('services.show', 'residential-interior') }}" class="hover:text-white transition-colors">Residential Interior</a></li>
                    <li><a href="{{ route('services.show', 'commercial-interior') }}" class="hover:text-white transition-colors">Commercial Interior</a></li>
                    <li><a href="{{ route('services.show', 'office-interior') }}" class="hover:text-white transition-colors">Office & Boardrooms</a></li>
                    <li><a href="{{ route('services.show', 'restaurant-cafe-interior') }}" class="hover:text-white transition-colors">Restaurants & Cafés</a></li>
                    <li><a href="{{ route('services.show', 'renovation-remodelling') }}" class="hover:text-white transition-colors">Renovation & Remodeling</a></li>
                    <li><a href="{{ route('services.show', 'turnkey-projects') }}" class="hover:text-white transition-colors">Turnkey Execution</a></li>
                    <li><a href="{{ route('services.show', 'space-planning-3d-design') }}" class="hover:text-white transition-colors">3D Space Planning</a></li>
                    <li><a href="{{ route('services.show', 'exterior-design') }}" class="hover:text-white transition-colors">Exterior Design & Façade</a></li>
                </ul>
            </div>

            {{-- Col 3: Selected Projects --}}
            <div>
                <h3 class="text-[11px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold mb-5">
                    Selected Projects
                </h3>
                <ul class="space-y-3 text-[13px] text-[#A1A09A]">
                    <li><a href="{{ route('projects.show', 'gulshan-lakeview-penthouse') }}" class="hover:text-white transition-colors">Gulshan Lakeview Penthouse</a></li>
                    <li><a href="{{ route('projects.show', 'banani-executive-headquarters') }}" class="hover:text-white transition-colors">Banani Executive HQ</a></li>
                    <li><a href="{{ route('projects.show', 'baridhara-diplomatic-residence') }}" class="hover:text-white transition-colors">Baridhara Residence</a></li>
                    <li><a href="{{ route('projects.index') }}" class="text-[#AD8753] hover:underline inline-flex items-center gap-1 mt-2">View All Projects →</a></li>
                </ul>

                <h3 class="text-[11px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold mt-8 mb-3">
                    Knowledge Base
                </h3>
                <ul class="space-y-2 text-[13px] text-[#A1A09A]">
                    <li><a href="{{ route('insights.index') }}" class="hover:text-white transition-colors">Design Monograph</a></li>
                    <li><a href="{{ route('process') }}" class="hover:text-white transition-colors">Our Process</a></li>
                </ul>
            </div>

            {{-- Col 4: Dhaka Contact Details --}}
            <div>
                <h3 class="text-[11px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold mb-5">
                    Contact Details
                </h3>
                <div class="space-y-3 text-[13px] text-[#A1A09A]">
                    <p class="text-white font-medium">Dhaka, Bangladesh</p>
                    <p>Primary Service Enclaves: Gulshan, Banani, Baridhara, Dhanmondi, Bashundhara, Uttara.</p>
                    
                    <div class="pt-2">
                        <span class="block text-[11px] uppercase tracking-[0.16em] text-[#AD8753]">Inquiries & Consultation:</span>
                        <a href="tel:+8801715394444" class="text-white hover:text-[#AD8753] font-medium block">01715394444</a>
                        <a href="mailto:chmpnidesign@gmail.com" class="text-white hover:text-[#AD8753] block text-[12px]">chmpnidesign@gmail.com</a>
                    </div>

                    <div class="pt-2">
                        <span class="block text-[11px] uppercase tracking-[0.16em] text-[#AD8753]">Leadership:</span>
                        <p class="text-white">Mushfiqur Rahman Razi</p>
                        <p class="text-[12px]">Founder & CEO</p>
                    </div>

                    <div class="pt-2">
                        <span class="block text-[11px] uppercase tracking-[0.16em] text-[#AD8753]">Official Channels:</span>
                        <a href="https://www.facebook.com/championinteriordesign" target="_blank" rel="noopener noreferrer" class="hover:text-white transition-colors">
                            Facebook: Champion interior design
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Disclaimer & Copyright --}}
        <div class="pt-8 flex flex-col md:flex-row items-center justify-between text-[12px] text-[#A1A09A] gap-4">
            <div>
                © {{ date('Y') }} Champion Interior Design. All rights reserved. Dhaka, Bangladesh.
            </div>
            <div class="flex items-center gap-6 text-[11px] uppercase tracking-[0.14em]">
                <span>Interior • Exterior • Turnkey Development</span>
                <span class="text-white/20">•</span>
                <a href="{{ route('home') }}#faq" class="hover:text-white transition-colors">FAQ</a>
                <span class="text-white/20">•</span>
                <a href="/llms.txt" class="hover:text-white transition-colors" title="AI Answer Engine Manifest">llms.txt</a>
                <span class="text-white/20">•</span>
                <a href="/sitemap.xml" class="hover:text-white transition-colors">Sitemap</a>
            </div>
        </div>
    </div>
</footer>

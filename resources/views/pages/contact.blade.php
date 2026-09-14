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
                <li class="text-[#1E211F] font-medium" aria-current="page">Contact Atelier</li>
            </ol>
        </nav>

        {{-- Page Header --}}
        <x-section-heading 
            eyebrow="Initiate Project"
            title="Book a Private Architectural Consultation"
            description="Contact Champion Interior Design directly to arrange an on-site survey or studio briefing for your residential or commercial space."
        />

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
            {{-- Atelier Information Column --}}
            <div class="lg:col-span-5 space-y-8">
                <div class="bg-white p-8 lg:p-10 hairline-all space-y-8">
                    <div>
                        <span class="text-[10px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold block mb-1">
                            Direct Telephone
                        </span>
                        <a href="tel:+8801715394444" class="font-serif text-2xl lg:text-3xl text-[#1E211F] hover:text-[#AD8753] transition-colors font-medium">
                            01715394444
                        </a>
                        <span class="block text-[12px] text-[#676660] mt-1">Direct studio line & WhatsApp concierge</span>
                    </div>

                    <div class="pt-6 hairline-t">
                        <span class="text-[10px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold block mb-1">
                            Electronic Mail
                        </span>
                        <a href="mailto:chmpnidesign@gmail.com" class="text-base text-[#1E211F] hover:text-[#AD8753] transition-colors font-medium">
                            chmpnidesign@gmail.com
                        </a>
                        <span class="block text-[12px] text-[#676660] mt-1">For tenders, architectural drawings & RFPs</span>
                    </div>

                    <div class="pt-6 hairline-t">
                        <span class="text-[10px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold block mb-1">
                            Market & Service Regions
                        </span>
                        <p class="text-[14px] text-[#1E211F] font-medium">Dhaka, Bangladesh</p>
                        <p class="text-[12px] text-[#676660] mt-1">
                            Active projects across Gulshan, Banani, Baridhara Diplomatic Enclave, Dhanmondi, Bashundhara, and Uttara.
                        </p>
                    </div>

                    <div class="pt-6 hairline-t">
                        <span class="text-[10px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold block mb-1">
                            Consultation Hours
                        </span>
                        <p class="text-[13px] text-[#1E211F]">Saturday – Thursday: 10:00 AM – 7:00 PM</p>
                        <span class="block text-[12px] text-[#676660] mt-1">Site visits arranged by appointment.</span>
                    </div>

                    <div class="pt-6 hairline-t">
                        <span class="text-[10px] uppercase tracking-[0.20em] text-[#AD8753] font-semibold block mb-1">
                            Official Social Profile
                        </span>
                        <a href="https://www.facebook.com/championinteriordesign" target="_blank" rel="noopener noreferrer" class="text-[13px] text-[#1E211F] hover:text-[#AD8753] transition-colors font-medium">
                            Facebook: Champion interior design
                        </a>
                    </div>
                </div>

                {{-- Fast Actions --}}
                <div class="flex gap-4">
                    <a href="tel:+8801715394444" 
                       class="flex-1 text-center py-3.5 bg-[#1E211F] text-[#F7F5F0] hover:bg-[#AD8753] text-[11px] uppercase tracking-[0.16em] font-medium transition-colors">
                        Call Now
                    </a>
                    <a href="https://wa.me/8801715394444" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="flex-1 text-center py-3.5 bg-[#AD8753] text-[#1E211F] hover:bg-white text-[11px] uppercase tracking-[0.16em] font-semibold transition-colors">
                        WhatsApp
                    </a>
                </div>
            </div>

            {{-- Consultation Form Column --}}
            <div class="lg:col-span-7 bg-white p-8 lg:p-12 hairline-all shadow-sm">
                <h3 class="font-serif text-2xl lg:text-3xl text-[#1E211F] font-normal mb-2">Project Briefing Dossier</h3>
                <p class="text-[13px] text-[#676660] mb-8 font-light">
                    Submit your spatial requirements. Founder Mushfiqur Rahman Razi and our team will review the brief and contact you within 24 hours.
                </p>

                @if(session('success'))
                    <div class="p-6 bg-[#AD8753]/15 border border-[#AD8753] text-[#1E211F] mb-8">
                        <h4 class="font-serif text-lg text-[#1E211F] font-medium mb-1">Inquiry Confirmed</h4>
                        <p class="text-[13px] text-[#2A2E2B]">{{ session('success') }}</p>
                    </div>
                @endif

                @if($errors->any())
                    <div class="p-6 bg-red-50 border border-red-400 text-red-800 mb-8 text-[13px]">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.inquiry') }}" method="POST" class="space-y-6">
                    @csrf
                    {{-- Honeypot bot protection field --}}
                    <input type="text" name="company_trap" class="hidden" tabindex="-1" autocomplete="off">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-[11px] uppercase tracking-[0.16em] text-[#676660] mb-2 font-semibold">
                                Full Name <span class="text-[#AD8753]">*</span>
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   required 
                                   placeholder="Your name"
                                   class="w-full bg-[#F7F5F0] border border-[#1E211F]/15 text-[#1E211F] px-4 py-3.5 text-[14px] focus:outline-none focus:border-[#AD8753] transition-colors">
                        </div>

                        <div>
                            <label for="phone" class="block text-[11px] uppercase tracking-[0.16em] text-[#676660] mb-2 font-semibold">
                                Phone Number <span class="text-[#AD8753]">*</span>
                            </label>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}"
                                   required 
                                   placeholder="0171X XXXXXX"
                                   class="w-full bg-[#F7F5F0] border border-[#1E211F]/15 text-[#1E211F] px-4 py-3.5 text-[14px] focus:outline-none focus:border-[#AD8753] transition-colors">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-[11px] uppercase tracking-[0.16em] text-[#676660] mb-2 font-semibold">
                                Email Address
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   placeholder="name@domain.com"
                                   class="w-full bg-[#F7F5F0] border border-[#1E211F]/15 text-[#1E211F] px-4 py-3.5 text-[14px] focus:outline-none focus:border-[#AD8753] transition-colors">
                        </div>

                        <div>
                            <label for="project_type" class="block text-[11px] uppercase tracking-[0.16em] text-[#676660] mb-2 font-semibold">
                                Project Classification
                            </label>
                            <select id="project_type" 
                                    name="project_type" 
                                    class="w-full bg-[#F7F5F0] border border-[#1E211F]/15 text-[#1E211F] px-4 py-3.5 text-[14px] focus:outline-none focus:border-[#AD8753] transition-colors">
                                <option value="Residential Penthouse / Apartment" {{ old('project_type') === 'Residential Penthouse / Apartment' ? 'selected' : '' }}>Residential Penthouse / Apartment</option>
                                <option value="Commercial / Office Suite" {{ old('project_type') === 'Commercial / Office Suite' ? 'selected' : '' }}>Commercial / Office Suite</option>
                                <option value="Restaurant & Café" {{ old('project_type') === 'Restaurant & Café' ? 'selected' : '' }}>Restaurant & Café</option>
                                <option value="Renovation & Remodeling" {{ old('project_type') === 'Renovation & Remodeling' ? 'selected' : '' }}>Renovation & Remodeling</option>
                                <option value="Exterior Façade Design" {{ old('project_type') === 'Exterior Façade Design' ? 'selected' : '' }}>Exterior Façade Design</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="location" class="block text-[11px] uppercase tracking-[0.16em] text-[#676660] mb-2 font-semibold">
                                Location / Area in Dhaka
                            </label>
                            <input type="text" 
                                   id="location" 
                                   name="location" 
                                   value="{{ old('location') }}"
                                   placeholder="e.g. Gulshan, Banani, Baridhara"
                                   class="w-full bg-[#F7F5F0] border border-[#1E211F]/15 text-[#1E211F] px-4 py-3.5 text-[14px] focus:outline-none focus:border-[#AD8753] transition-colors">
                        </div>

                        <div>
                            <label for="approx_area" class="block text-[11px] uppercase tracking-[0.16em] text-[#676660] mb-2 font-semibold">
                                Approximate Area (sq.ft)
                            </label>
                            <input type="text" 
                                   id="approx_area" 
                                   name="approx_area" 
                                   value="{{ old('approx_area') }}"
                                   placeholder="e.g. 5,000 sq.ft"
                                   class="w-full bg-[#F7F5F0] border border-[#1E211F]/15 text-[#1E211F] px-4 py-3.5 text-[14px] focus:outline-none focus:border-[#AD8753] transition-colors">
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-[11px] uppercase tracking-[0.16em] text-[#676660] mb-2 font-semibold">
                            Project Objectives & Scope <span class="text-[#AD8753]">*</span>
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="4" 
                                  required
                                  placeholder="Describe your design goals, desired completion timeline, or existing site condition..."
                                  class="w-full bg-[#F7F5F0] border border-[#1E211F]/15 text-[#1E211F] p-4 text-[14px] focus:outline-none focus:border-[#AD8753] transition-colors">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" 
                            class="w-full py-4 bg-[#1E211F] text-[#F7F5F0] hover:bg-[#AD8753] text-[12px] uppercase tracking-[0.20em] font-semibold transition-all duration-300">
                        Submit Consultation Request
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.public>

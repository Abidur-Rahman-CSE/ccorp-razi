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
            <span class="current" aria-current="page">Contact Atelier</span>
        </nav>

        {{-- Editorial Page Header --}}
        <header class="inner-header">
            <div class="studio-eyebrow">
                <span class="status-dot"></span>
                <span>Initiate Project • Dhaka Atelier</span>
            </div>
            <h1>{{ 'Book a Private Architectural Consultation' }}.<br><em>Begin the conversation.</em></h1>
            <p class="inner-header-lead">
                Contact Champion Interior Design directly to arrange an on-site survey or studio briefing for your residential or commercial space in Dhaka.
            </p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start mb-24">
            {{-- Atelier Information Column (Left) --}}
            <div class="lg:col-span-5 space-y-6">
                <div class="bg-[#24251f] text-[#f1eee7] p-8 lg:p-10 border border-[#30291e30] space-y-8">
                    <div>
                        <span class="studio-eyebrow text-[#c0a57c] block mb-2">Direct Telephone & WhatsApp</span>
                        <a href="tel:+8801715394444" class="font-serif text-3xl sm:text-4xl text-white hover:text-[#c0a57c] transition-colors block font-normal leading-tight">
                            01715394444
                        </a>
                        <span class="block text-[12px] text-[#b8b5a9] mt-2">Direct studio line & WhatsApp concierge</span>
                    </div>

                    <div class="pt-6 border-t border-white/10">
                        <span class="studio-eyebrow text-[#c0a57c] block mb-2">Electronic Mail</span>
                        <a href="mailto:chmpnidesign@gmail.com" class="text-base text-white hover:text-[#c0a57c] transition-colors font-medium">
                            chmpnidesign@gmail.com
                        </a>
                        <span class="block text-[12px] text-[#b8b5a9] mt-2">For architectural drawings, tenders & spatial RFPs</span>
                    </div>

                    <div class="pt-6 border-t border-white/10">
                        <span class="studio-eyebrow text-[#c0a57c] block mb-2">Service Enclaves</span>
                        <p class="text-[14px] text-white font-medium">Dhaka, Bangladesh</p>
                        <p class="text-[12px] text-[#b8b5a9] mt-1 leading-relaxed">
                            Active projects across Gulshan, Banani, Baridhara Diplomatic Enclave, Dhanmondi, Bashundhara, and Uttara.
                        </p>
                    </div>

                    <div class="pt-6 border-t border-white/10">
                        <span class="studio-eyebrow text-[#c0a57c] block mb-2">Consultation Hours</span>
                        <p class="text-[13px] text-white">Saturday – Thursday: 10:00 AM – 7:00 PM</p>
                        <span class="block text-[12px] text-[#b8b5a9] mt-1">Site visits arranged by appointment.</span>
                    </div>

                    <div class="pt-6 border-t border-white/10">
                        <span class="studio-eyebrow text-[#c0a57c] block mb-2">Official Social Channel</span>
                        <a href="https://www.facebook.com/championinteriordesign" target="_blank" rel="noopener noreferrer" class="text-[13px] text-white hover:text-[#c0a57c] transition-colors inline-flex items-center gap-1.5 font-medium">
                            <span>Facebook: Champion interior design</span>
                            <span aria-hidden="true">↗</span>
                        </a>
                    </div>
                </div>

                {{-- Fast Mobile Action Buttons --}}
                <div class="flex gap-4">
                    <a href="tel:+8801715394444" class="studio-button flex-1 justify-center">
                        Call Atelier <span aria-hidden="true">↗</span>
                    </a>
                    <a href="https://wa.me/8801715394444" target="_blank" rel="noopener noreferrer" class="studio-button studio-button-light flex-1 justify-center">
                        WhatsApp <span aria-hidden="true">↗</span>
                    </a>
                </div>
            </div>

            {{-- Consultation Form Column (Right) --}}
            <div class="lg:col-span-7 bg-[#efeae2] p-8 lg:p-12 border border-[#30291e15]">
                <div class="studio-eyebrow text-[#8d7859] mb-2">Project Briefing Form</div>
                <h2 class="font-serif text-2xl lg:text-3xl text-[#1e211f] font-normal mb-3">Tell Us About Your Space</h2>
                <p class="text-[13px] text-[#676660] mb-8 font-light leading-relaxed">
                    Submit your requirements below. Our studio team will review your brief and contact you via telephone or WhatsApp.
                </p>

                {{-- Confirmation / Success Banner --}}
                @if(session('success'))
                    <div class="inquiry-notice mb-8" role="status" style="background: #f7f5f0; border-color: #c0a57c;">
                        <strong class="text-[#1e211f] block font-serif text-lg mb-1 font-normal">Inquiry Received</strong>
                        <p class="text-[#5d5951] text-[13px]">{{ session('success') }}</p>
                    </div>
                @endif

                {{-- Validation Errors --}}
                @if($errors->any())
                    <div class="inquiry-notice inquiry-error mb-8" role="alert" style="background: #fff3f0; border-color: #e07a68;">
                        <strong class="text-[#992d1b] block mb-2 font-medium">Please review the following:</strong>
                        <ul class="list-disc list-inside space-y-1 text-[13px] text-[#992d1b]">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.inquiry') }}" method="POST" class="space-y-6">
                    @csrf
                    {{-- Honeypot bot protection field --}}
                    <input type="text" name="company_trap" hidden tabindex="-1" autocomplete="off">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-[11px] uppercase tracking-[0.16em] text-[#5d5951] mb-2 font-semibold">
                                Full Name <span class="text-[#c0a57c]">*</span>
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   required 
                                   placeholder="Your full name"
                                   class="w-full bg-[#f7f5f0] border border-[#30291e20] text-[#1e211f] px-4 py-3.5 text-[14px] focus:outline-none focus:border-[#c0a57c] transition-colors">
                        </div>

                        <div>
                            <label for="phone" class="block text-[11px] uppercase tracking-[0.16em] text-[#5d5951] mb-2 font-semibold">
                                Phone Number <span class="text-[#c0a57c]">*</span>
                            </label>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}"
                                   required 
                                   placeholder="0171X XXXXXX"
                                   class="w-full bg-[#f7f5f0] border border-[#30291e20] text-[#1e211f] px-4 py-3.5 text-[14px] focus:outline-none focus:border-[#c0a57c] transition-colors">
                        </div>
                    </div>

                    <div>
                        <label for="project_type" class="block text-[11px] uppercase tracking-[0.16em] text-[#5d5951] mb-2 font-semibold">
                            Project Type <span class="text-[#888] font-normal normal-case">(Optional)</span>
                        </label>
                        <select id="project_type" 
                                name="project_type" 
                                class="w-full bg-[#f7f5f0] border border-[#30291e20] text-[#1e211f] px-4 py-3.5 text-[14px] focus:outline-none focus:border-[#c0a57c] transition-colors">
                            <option value="">Select project type (Optional)</option>
                            <option value="Residential Penthouse / Duplex" {{ old('project_type') === 'Residential Penthouse / Duplex' ? 'selected' : '' }}>Residential Penthouse / Duplex</option>
                            <option value="Commercial / Office Suite" {{ old('project_type') === 'Commercial / Office Suite' ? 'selected' : '' }}>Commercial / Office Suite</option>
                            <option value="Restaurant & Café" {{ old('project_type') === 'Restaurant & Café' ? 'selected' : '' }}>Restaurant & Café</option>
                            <option value="Renovation & Remodeling" {{ old('project_type') === 'Renovation & Remodeling' ? 'selected' : '' }}>Renovation & Remodeling</option>
                            <option value="Exterior Façade Design" {{ old('project_type') === 'Exterior Façade Design' ? 'selected' : '' }}>Exterior Façade Design</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-[11px] uppercase tracking-[0.16em] text-[#5d5951] mb-2 font-semibold">
                            Project Vision & Brief <span class="text-[#c0a57c]">*</span>
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="4" 
                                  required
                                  placeholder="Describe your space, location in Dhaka, functional requirements, or target timeline..."
                                  class="w-full bg-[#f7f5f0] border border-[#30291e20] text-[#1e211f] p-4 text-[14px] focus:outline-none focus:border-[#c0a57c] transition-colors">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" 
                            class="w-full studio-button justify-center py-4 text-[12px] uppercase tracking-[0.18em]">
                        Send Project Inquiry <span aria-hidden="true">↗</span>
                    </button>

                    <p class="text-[11px] text-[#777367] text-center mt-3">
                        Your consultation inquiry will be delivered directly to our Dhaka studio leadership.
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-layouts.public>

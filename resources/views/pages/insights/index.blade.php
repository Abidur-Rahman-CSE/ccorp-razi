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
                <li class="text-[#1E211F] font-medium" aria-current="page">Insights</li>
            </ol>
        </nav>

        {{-- Page Header --}}
        <x-section-heading 
            eyebrow="Editorial Monograph"
            title="Architectural Insights & Design Commentary"
            description="Essays, construction methodologies, and material perspectives on residential and commercial spatial development in Dhaka."
        />

        {{-- Insights Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
            @foreach($insights as $insight)
                <article class="group bg-white hairline-all flex flex-col justify-between overflow-hidden hover:shadow-md transition-all">
                    <div>
                        <a href="{{ route('insights.show', $insight['slug']) }}" class="block aspect-[16/10] overflow-hidden bg-[#EFEAE2]">
                            <img src="{{ asset($insight['cover_image']) }}" 
                                 alt="{{ $insight['title'] }}" 
                                 loading="lazy" 
                                 width="800" 
                                 height="500" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.03]">
                        </a>
                        <div class="p-6 lg:p-8">
                            <div class="flex items-center justify-between text-[11px] uppercase tracking-[0.16em] text-[#AD8753] font-semibold mb-3">
                                <span>{{ $insight['category'] }}</span>
                                <span class="text-[#676660]">{{ $insight['read_time'] }}</span>
                            </div>
                            <h3 class="font-serif text-2xl text-[#1E211F] group-hover:text-[#AD8753] transition-colors leading-tight font-medium">
                                <a href="{{ route('insights.show', $insight['slug']) }}">
                                    {{ $insight['title'] }}
                                </a>
                            </h3>
                            <p class="mt-3 text-[14px] leading-relaxed text-[#676660] font-light">
                                {{ $insight['summary'] }}
                            </p>
                        </div>
                    </div>

                    <div class="px-6 lg:px-8 pb-6 pt-4 hairline-t flex items-center justify-between text-[12px]">
                        <span class="text-[#676660]">{{ $insight['date'] }}</span>
                        <a href="{{ route('insights.show', $insight['slug']) }}" class="text-[#1E211F] group-hover:text-[#AD8753] font-medium uppercase tracking-[0.14em] transition-colors">
                            Read Essay →
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-layouts.public>

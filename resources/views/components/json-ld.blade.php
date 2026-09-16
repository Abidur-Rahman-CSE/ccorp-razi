@props([
    'type' => 'website',
    'title' => 'Champion Interior Design | Warm Architectural Luxury Dhaka',
    'description' => 'Champion Interior Design provides turnkey residential and commercial interior design, architectural renovation, and space planning in Dhaka, Bangladesh.',
    'image' => asset('images/showcase/hero_penthouse_dhaka.jpg'),
    'url' => url()->current(),
    'breadcrumbs' => [],
    'faqs' => [],
])

@php
    $organizationSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'HomeAndConstructionBusiness',
        '@id' => url('/') . '#organization',
        'name' => 'Champion Interior Design',
        'alternateName' => 'Champion Interior & Exterior Design',
        'logo' => asset('images/brand/champion-corporation-black.svg'),
        'image' => asset('images/brand/champion-corporation-black.svg'),
        'description' => 'Premium turnkey interior design, architecture, renovation and bespoke spatial execution studio in Dhaka, Bangladesh.',
        'url' => url('/'),
        'telephone' => '+8801715394444',
        'email' => 'chmpnidesign@gmail.com',
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Dhaka',
            'addressRegion' => 'Dhaka Division',
            'addressCountry' => 'BD',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => 23.7925,
            'longitude' => 90.4078,
        ],
        'founder' => [
            '@type' => 'Person',
            'name' => 'Mushfiqur Rahman Razi',
            'jobTitle' => 'Founder & CEO',
            'image' => asset('images/team/mushfiqur_rahman_razi.jpg'),
        ],
        'areaServed' => [
            'Dhaka',
            'Gulshan',
            'Banani',
            'Baridhara',
            'Dhanmondi',
            'Bashundhara',
            'Uttara',
            'Bangladesh',
        ],
        'sameAs' => [
            'https://www.facebook.com/championinteriordesign',
        ],
        'priceRange' => '৳৳৳৳',
        'currenciesAccepted' => 'BDT',
        'openingHours' => 'Sa-Th 10:00-19:00',
    ];

    $breadcrumbSchema = null;
    if (!empty($breadcrumbs)) {
        $itemList = [];
        $position = 1;
        $itemList[] = [
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => 'Home',
            'item' => url('/'),
        ];
        foreach ($breadcrumbs as $crumb) {
            $itemList[] = [
                '@type' => 'ListItem',
                'position' => $position++,
                'name' => $crumb['name'],
                'item' => $crumb['url'],
            ];
        }
        $breadcrumbSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $itemList,
        ];
    }

    $faqSchema = null;
    if (!empty($faqs)) {
        $mainEntity = [];
        foreach ($faqs as $faq) {
            $mainEntity[] = [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer'],
                ],
            ];
        }
        $faqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $mainEntity,
        ];
    }
@endphp

<script type="application/ld+json">
{!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

@if($breadcrumbSchema)
<script type="application/ld+json">
{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endif

@if($faqSchema)
<script type="application/ld+json">
{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endif

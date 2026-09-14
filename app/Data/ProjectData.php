<?php

namespace App\Data;

class ProjectData
{
    /**
     * @return array<string, array{
     *     title: string,
     *     slug: string,
     *     category: string,
     *     location: string,
     *     year: string,
     *     area: string,
     *     scope: string,
     *     tagline: string,
     *     summary: string,
     *     challenge: string,
     *     solution: string,
     *     materials: array<string>,
     *     services: array<string>,
     *     cover_image: string,
     *     gallery: array<string>,
     *     featured: bool,
     *     meta_title: string,
     *     meta_description: string
     * }>
     */
    public static function all(): array
    {
        return [
            'gulshan-lakeview-penthouse' => [
                'title' => 'Gulshan Lakeview Penthouse',
                'slug' => 'gulshan-lakeview-penthouse',
                'category' => 'Residential Interior',
                'location' => 'Gulshan II, Dhaka',
                'year' => '2025',
                'area' => '6,400 sq.ft',
                'scope' => 'Complete Turnkey Interior & Millwork',
                'tagline' => 'A serene, light-filled penthouse sanctuary with bespoke walnut cabinetry and honed limestone.',
                'summary' => 'Commissioned for a multi-generational family residence overlooking Gulshan lake, this penthouse combines expansive spatial proportions with tailored acoustic paneling, concealed climate systems, and bespoke architectural joinery.',
                'challenge' => 'The client required an open, flowing layout suitable for high-society entertaining while maintaining private familial sanctuaries, seamless acoustic insulation against Dhaka’s urban density, and rigorous climate control for bespoke woodwork.',
                'solution' => 'We reorganized the core living zones into an axis of light, utilizing floor-to-ceiling sheer linen drapery, honed travertine flooring, and custom fluted oak wall paneling with integrated warm LED illumination to create an oasis of architectural calm.',
                'materials' => ['Honed Italian Travertine', 'Natural Smoked Oak', 'Muted Champagne Brass', 'Acoustic Fluted Paneling', 'Belgian Linen'],
                'services' => ['Turnkey Execution', '3D Space Planning', 'Bespoke Furniture', 'Architectural Lighting', 'MEP Engineering'],
                'cover_image' => '/images/showcase/hero_penthouse_dhaka.jpg',
                'gallery' => [
                    '/images/showcase/hero_penthouse_dhaka.jpg',
                    '/images/showcase/gulshan_residence.jpg',
                    '/images/showcase/service_renovation_bedroom.jpg',
                ],
                'featured' => true,
                'meta_title' => 'Gulshan Lakeview Penthouse | Champion Interior Design Dhaka',
                'meta_description' => 'Explore the 6,400 sq.ft turnkey penthouse interior in Gulshan II, Dhaka by Champion Interior Design. Warm architectural luxury and bespoke craftsmanship.',
            ],
            'banani-executive-headquarters' => [
                'title' => 'Banani Executive Headquarters',
                'slug' => 'banani-executive-headquarters',
                'category' => 'Commercial & Office Interior',
                'location' => 'Road 11, Banani, Dhaka',
                'year' => '2025',
                'area' => '4,800 sq.ft',
                'scope' => 'Corporate Architecture & Turnkey Execution',
                'tagline' => 'A high-performance corporate sanctuary integrating acoustic timber, fluted glass, and executive boardrooms.',
                'summary' => 'Designed for a leading enterprise in Dhaka, this executive office suite balances authoritative corporate prestige with sensory comfort and modern collaborative ergonomics.',
                'challenge' => 'Creating distinct operational zones—including a 20-person executive boardroom, private CEO suite, and collaborative workstations—within an irregular floor plate without compromising natural daylight or acoustic privacy.',
                'solution' => 'Double-glazed architectural acoustic glass partitions framed in black hairline steel, accented with vertical timber slats and warm indirect cove lighting, providing sound isolation while flooding the floorplate with natural sunlight.',
                'materials' => ['Architectural Fluted Glass', 'American Walnut', 'Satin Champagne Brass', 'Acoustic Ceiling Systems', 'Microcement Floors'],
                'services' => ['Commercial Interior', 'Space Planning', 'Turnkey Execution', 'Electrical & HVAC Integration', 'Custom Executive Desks'],
                'cover_image' => '/images/showcase/banani_corporate_office.jpg',
                'gallery' => [
                    '/images/showcase/banani_corporate_office.jpg',
                    '/images/showcase/gulshan_residence.jpg',
                ],
                'featured' => true,
                'meta_title' => 'Banani Executive Headquarters | Corporate Interior Design Dhaka',
                'meta_description' => 'Architectural office interior and executive suite design in Banani, Dhaka. 4,800 sq.ft turnkey execution by Champion Interior Design.',
            ],
            'baridhara-diplomatic-residence' => [
                'title' => 'Baridhara Diplomatic Residence',
                'slug' => 'baridhara-diplomatic-residence',
                'category' => 'Renovation & Façade',
                'location' => 'Baridhara Diplomatic Enclave, Dhaka',
                'year' => '2024',
                'area' => '7,800 sq.ft',
                'scope' => 'Exterior Façade & Complete Interior Overhaul',
                'tagline' => 'Transforming a dated structure into a modern limestone and timber architectural residence.',
                'summary' => 'A total architectural transformation encompassing structural renovation, modern travertine exterior louvers, and light-filled minimalist residential interiors in Baridhara.',
                'challenge' => 'The original structure had low ceilings, heavy dark masonry, and outdated MEP infrastructure that prevented modern lifestyle requirements.',
                'solution' => 'We removed non-loadbearing masonry, introduced expansive floor-to-ceiling architectural glazing, reclad the façade in warm travertine stone with vertical timber screens, and created an uninterrupted transition between indoor and outdoor gardens.',
                'materials' => ['Natural Beige Travertine', 'Weatherproof Teak Louvers', 'Architectural Steel', 'Polished Terrazzo', 'Smart Lighting Controls'],
                'services' => ['Renovation & Remodeling', 'Exterior Design & Façade', 'Structural Retrofitting', 'Turnkey Execution'],
                'cover_image' => '/images/showcase/service_exterior_facade.jpg',
                'gallery' => [
                    '/images/showcase/service_exterior_facade.jpg',
                    '/images/showcase/hero_penthouse_dhaka.jpg',
                    '/images/showcase/after_renovation.jpg',
                ],
                'featured' => true,
                'meta_title' => 'Baridhara Diplomatic Residence | Exterior & Interior Design Dhaka',
                'meta_description' => 'Complete architectural renovation and exterior façade transformation in Baridhara Diplomatic Enclave by Champion Interior Design.',
            ],
        ];
    }

    /**
     * @return array{
     *     title: string,
     *     slug: string,
     *     category: string,
     *     location: string,
     *     year: string,
     *     area: string,
     *     scope: string,
     *     tagline: string,
     *     summary: string,
     *     challenge: string,
     *     solution: string,
     *     materials: array<string>,
     *     services: array<string>,
     *     cover_image: string,
     *     gallery: array<string>,
     *     featured: bool,
     *     meta_title: string,
     *     meta_description: string
     * }|null
     */
    public static function find(string $slug): ?array
    {
        return self::all()[$slug] ?? null;
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public static function featured(): array
    {
        return array_filter(self::all(), fn ($p) => $p['featured'] === true);
    }
}

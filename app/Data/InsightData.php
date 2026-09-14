<?php

namespace App\Data;

class InsightData
{
    /**
     * @return array<string, array{
     *     title: string,
     *     slug: string,
     *     date: string,
     *     read_time: string,
     *     category: string,
     *     summary: string,
     *     cover_image: string,
     *     content: string,
     *     meta_title: string,
     *     meta_description: string
     * }>
     */
    public static function all(): array
    {
        return [
            'designing-for-climate-and-light-in-dhaka' => [
                'title' => 'Designing for Tropical Light and Urban Acoustic Calm in Dhaka',
                'slug' => 'designing-for-climate-and-light-in-dhaka',
                'date' => 'January 2025',
                'read_time' => '5 min read',
                'category' => 'Architectural Philosophy',
                'summary' => 'How intentional materiality, cross-ventilation, and acoustic timber paneling create serene interior sanctuaries amidst the urban intensity of Bangladesh’s capital.',
                'cover_image' => '/images/showcase/hero_penthouse_dhaka.jpg',
                'content' => 'Dense urban centers like Dhaka present unique architectural challenges: ambient traffic acoustics, high tropical humidity, and intense midday solar heat gain. Achieving authentic spatial luxury requires moving beyond surface aesthetics. By employing double-glazed low-emissivity glass, acoustic fluted timber cladding, and concealed indirect lighting covenants, living spaces can maintain visual lightness while remaining acoustically isolated and climatically tempered.',
                'meta_title' => 'Designing for Light & Acoustic Calm in Dhaka | Champion Interior Design',
                'meta_description' => 'Architectural insights on designing luxury residential and corporate interiors in Dhaka with natural light, humidity control, and acoustic isolation.',
            ],
            'the-turnkey-advantage-in-bangladesh' => [
                'title' => 'The Turnkey Advantage: Why Single-Source Interior Execution Outperforms Fragmented Contractors',
                'slug' => 'the-turnkey-advantage-in-bangladesh',
                'date' => 'February 2025',
                'read_time' => '6 min read',
                'category' => 'Project Execution',
                'summary' => 'Examining why separating 3D conceptual designers from civil trades and carpenters inevitably causes budget creep, timeline delays, and compromised quality in Dhaka.',
                'cover_image' => '/images/showcase/after_renovation.jpg',
                'content' => 'In Bangladesh’s construction landscape, the traditional separation between freelance designers and independent labour contractors creates systemic friction. A designer specifies tolerances that untutored site carpenters cannot execute, leading to finger-pointing and unexpected cost overruns. A turnkey execution model unites architectural drafting, MEP engineering, material procurement, and master carpentry under a single accountable umbrella, guaranteeing delivered outcomes match 3D visualizations down to the millimeter.',
                'meta_title' => 'The Turnkey Advantage in Interior Execution | Champion Interior Design',
                'meta_description' => 'Why single-source turnkey interior execution guarantees higher quality, on-time delivery, and cost certainty in Dhaka, Bangladesh.',
            ],
            'acoustic-wood-and-limestone-palettes' => [
                'title' => 'Material Sincerity: The Synergy of Honed Travertine and Smoked Oak in Modern Interiors',
                'slug' => 'acoustic-wood-and-limestone-palettes',
                'date' => 'March 2025',
                'read_time' => '4 min read',
                'category' => 'Materials & Craftsmanship',
                'summary' => 'A tactile exploration into warm neutral palettes, matte natural stone, and precision architectural joinery in contemporary residential design.',
                'cover_image' => '/images/showcase/gulshan_residence.jpg',
                'content' => 'Excessive glossy finishes and shiny gold accents quickly feel dated and cold. In contrast, natural architectural materials—such as unpolished honed travertine, matte smoked oak joinery, and warm brushed champagne brass—develop a rich patina over time. They connect interior occupants with natural textures, absorbing harsh daylight and diffusing artificial warm illumination into a soothing, organic glow.',
                'meta_title' => 'Travertine & Smoked Oak in Luxury Interiors | Champion Interior Design',
                'meta_description' => 'Exploring natural architectural materials, honed stone, and smoked oak millwork for timeless contemporary interior design.',
            ],
        ];
    }

    /**
     * @return array<string, mixed>|null
     */
    public static function find(string $slug): ?array
    {
        return self::all()[$slug] ?? null;
    }
}

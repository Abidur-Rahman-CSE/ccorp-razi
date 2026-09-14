<?php

namespace App\Data;

class ServiceData
{
    /**
     * @return array<string, array{
     *     title: string,
     *     bengali_title: string,
     *     slug: string,
     *     tagline: string,
     *     summary: string,
     *     overview: string,
     *     scope_items: array<string>,
     *     deliverables: array<string>,
     *     image: string,
     *     featured: bool,
     *     meta_title: string,
     *     meta_description: string
     * }>
     */
    public static function all(): array
    {
        return [
            'residential-interior' => [
                'title' => 'Residential Interior',
                'bengali_title' => 'বসতবাড়ির ইন্টেরিয়র',
                'slug' => 'residential-interior',
                'tagline' => 'Tailored sanctuaries for penthouses, duplexes, and premium apartments.',
                'summary' => 'Comprehensive spatial design and turnkey execution for master living suites, bedrooms, gourmet kitchens, walk-in wardrobes, bespoke joinery, and architectural lighting.',
                'overview' => 'We design homes around the way you live. In Dhaka’s rapidly expanding urban footprint, true luxury lies in acoustic serenity, tailored ergonomics, and timeless material selections. From initial 3D space planning to custom millwork fabrication, we handle every detail with white-glove precision.',
                'scope_items' => [
                    'Penthouse & Luxury Apartment Living Spaces',
                    'Master Suite & Walk-in Dressing Lounges',
                    'Gourmet Open Kitchens & Breakfast Counters',
                    'Acoustic Ceiling & Concealed Ambient Lighting',
                    'Custom Architectural Wardrobes & Vanities',
                    'Italian Marble, Travertine & Smoked Oak Flooring',
                ],
                'deliverables' => [
                    'Detailed 3D Photorealistic Visualizations',
                    'Comprehensive MEP & Lighting Schematics',
                    'Bespoke Millwork & Cabinetry Drawings',
                    'Full Sourcing & Material Procurement',
                    'End-to-End On-Site Construction & Handover',
                ],
                'image' => '/images/showcase/hero_penthouse_dhaka.jpg',
                'featured' => true,
                'meta_title' => 'Residential Interior Design Dhaka | Champion Interior Design',
                'meta_description' => 'Bespoke residential interior design in Dhaka. Luxury apartments, penthouses, and duplex execution by Champion Interior Design.',
            ],
            'commercial-interior' => [
                'title' => 'Commercial Interior',
                'bengali_title' => 'কমর্শিয়াল স্পেস',
                'slug' => 'commercial-interior',
                'tagline' => 'Commanding environments for premier retail, showrooms, and commercial venues.',
                'summary' => 'Architectural concepts that reinforce brand prestige, optimize foot traffic, and elevate client engagement across flagship showrooms and commercial spaces.',
                'overview' => 'Commercial spaces demand an exacting balance of sensory impact and structural durability. We craft commercial interiors that communicate authority, guide customer journeys naturally, and leverage durable, high-grade architectural finishes built for long-term commercial performance.',
                'scope_items' => [
                    'Flagship Showrooms & Retail Experiences',
                    'Corporate Reception & Welcoming Lounges',
                    'Financial & Private Banking Ateliers',
                    'High-Durability Architectural Surfaces',
                    'Custom Commercial Millwork & Display Systems',
                    'Commercial HVAC & Integrated Lighting Controls',
                ],
                'deliverables' => [
                    'Circulation & Traffic Flow Analysis',
                    'Brand-Aligned Spatial Architecture',
                    'Technical MEP & Lighting Engineering',
                    'Turnkey Fabrication & On-Time Launch Delivery',
                ],
                'image' => '/images/showcase/banani_corporate_office.jpg',
                'featured' => true,
                'meta_title' => 'Commercial Interior Design Dhaka | Champion Interior Design',
                'meta_description' => 'Turnkey commercial interior design and execution for showrooms, retail, and corporate venues in Bangladesh.',
            ],
            'office-interior' => [
                'title' => 'Office Interior',
                'bengali_title' => 'অফিস ইন্টেরিয়র',
                'slug' => 'office-interior',
                'tagline' => 'High-performance corporate headquarters, executive suites, and boardrooms.',
                'summary' => 'Sophisticated modern workplaces combining acoustic isolation, ergonomic efficiency, and executive elegance for Dhaka’s forward-thinking enterprises.',
                'overview' => 'A well-designed workspace is a strategic asset. We design and build productive corporate environments featuring acoustic glass partitions, ergonomic workstation layouts, high-tech boardroom conferencing suites, and welcoming collaborative lounges that foster organizational culture.',
                'scope_items' => [
                    'Executive Boardrooms & Conference Suites',
                    'C-Suite & Managing Director Private Offices',
                    'Acoustic Glass Partitions & Timber Louvers',
                    'Ergonomic Workstation Clusters & Task Lighting',
                    'Server Room, Networking & MEP Infrastructure',
                    'Employee Café & Collaboration Breakout Zones',
                ],
                'deliverables' => [
                    'Density & Spatial Optimization Plans',
                    'Acoustic Performance Engineering',
                    'Bespoke Executive Desk & Table Fabrication',
                    'Complete Turnkey Fit-Out & Structured Cabling',
                ],
                'image' => '/images/showcase/banani_corporate_office.jpg',
                'featured' => true,
                'meta_title' => 'Office Interior Design Dhaka | Champion Interior Design',
                'meta_description' => 'Modern office and corporate interior design in Dhaka. Turnkey boardrooms, executive suites, and collaborative workplaces.',
            ],
            'restaurant-cafe-interior' => [
                'title' => 'Restaurant & Café Interior',
                'bengali_title' => 'রেস্টুরেন্ট ও ক্যাফে',
                'slug' => 'restaurant-cafe-interior',
                'tagline' => 'Sensory hospitality interiors designed for unforgettable dining experiences.',
                'summary' => 'Atmospheric lighting scenography, acoustic control, commercial kitchen workflow planning, and custom hospitality seating for dining establishments.',
                'overview' => 'Dining is an immersive sensory ritual. We develop distinctive culinary destinations across Dhaka—from intimate artisanal cafés to multi-zone fine dining restaurants—integrating moody cove lighting, textured wall treatments, durable terrazzo, and seamless service circulation.',
                'scope_items' => [
                    'Fine Dining Rooms & Intimate Lounge Seating',
                    'Artisanal Café Counters & Barista Stations',
                    'Acoustic Fluted Wood & Fabric Wall Paneling',
                    'Commercial Kitchen Circulation & Exhaust Integration',
                    'Bespoke Velvet & Leather Dining Banquettes',
                    'Low-Glare Architectural Lighting Scenography',
                ],
                'deliverables' => [
                    'Cover Count & Table Density Optimization',
                    'Kitchen-to-Dining Circulation Modeling',
                    'Custom Seating & Furniture Fabrication',
                    'Complete Turnkey Construction & Testing',
                ],
                'image' => '/images/showcase/service_restaurant_cafe.jpg',
                'featured' => true,
                'meta_title' => 'Restaurant & Café Interior Design Dhaka | Champion Interior Design',
                'meta_description' => 'Atmospheric restaurant, café, and hospitality interior design in Dhaka by Champion Interior Design.',
            ],
            'renovation-remodelling' => [
                'title' => 'Renovation & Remodeling',
                'bengali_title' => 'রিনোভেশন ও রিমডেলিং',
                'slug' => 'renovation-remodelling',
                'tagline' => 'Metabolic architectural renewal for outdated residential and commercial properties.',
                'summary' => 'Breathing new life into existing spaces through structural reconfiguration, updated MEP systems, modern surfaces, and refined spatial planning.',
                'overview' => 'Rather than tearing down, strategic remodeling unlocks the latent potential of existing properties in Dhaka. We assess structural integrity, remove restrictive partitions, replace obsolete plumbing and wiring, and install clean architectural finishes that match contemporary luxury standards.',
                'scope_items' => [
                    'Structural Partition Reconfiguration & Open-Plan Conversion',
                    'Complete Electrical, Plumbing & HVAC Modernization',
                    'Bathroom & Kitchen Architectural Overhauls',
                    'Ceiling Raising & Concealed Lighting Upgrades',
                    'Window & Glazing System Replacements',
                    'Flooring Removal & Seamless Stone Installation',
                ],
                'deliverables' => [
                    'Structural Assessment & Demolition Plan',
                    'Detailed Phased Construction Schedule',
                    'Material Replacement Specs & Before/After Validation',
                    'Full Dust & Debris Management During Execution',
                ],
                'image' => '/images/showcase/after_renovation.jpg',
                'featured' => true,
                'meta_title' => 'Interior Renovation & Remodeling Dhaka | Champion Interior Design',
                'meta_description' => 'Comprehensive interior renovation and remodeling services in Dhaka. Transform outdated apartments and commercial spaces.',
            ],
            'turnkey-projects' => [
                'title' => 'Turnkey Projects',
                'bengali_title' => 'টার্নকি প্রোজেক্টস',
                'slug' => 'turnkey-projects',
                'tagline' => 'Single-point accountability from initial sketch to final key handover.',
                'summary' => 'Comprehensive end-to-end management where design, material procurement, civil trades, electrical, joinery, and quality assurance are delivered seamlessly under one contract.',
                'overview' => 'Managing multiple independent contractors, carpenters, electricians, and material suppliers frequently leads to budget overruns and compromised finishes. Champion’s turnkey model provides single-source responsibility. You receive fixed milestone pricing, disciplined site supervision, and on-time handover.',
                'scope_items' => [
                    'Single-Source Design & Execution Contract',
                    'Guaranteed Milestone Timelines & Cost Transparency',
                    'Direct Material Sourcing & Strict Quality Vetting',
                    'In-House Master Carpenters, Painters & Electricians',
                    'Multi-Point Pre-Handover Quality Inspections',
                    'Post-Occupancy Maintenance & Warranty Stewardship',
                ],
                'deliverables' => [
                    'Complete Engineering Master Blueprint',
                    'Weekly Transparent Progress Reports',
                    'Turnkey Material & Hardware Guarantees',
                    'White-Glove Cleaned, Move-In Ready Handover',
                ],
                'image' => '/images/showcase/gulshan_residence.jpg',
                'featured' => true,
                'meta_title' => 'Turnkey Interior Projects Dhaka | Champion Interior Design',
                'meta_description' => 'End-to-end turnkey interior design and execution in Bangladesh. Design, procurement, civil work, and white-glove handover.',
            ],
            'space-planning-3d-design' => [
                'title' => 'Space Planning & 3D Design',
                'bengali_title' => 'স্পেস প্ল্যানিং ও 3D ডিজাইন',
                'slug' => 'space-planning-3d-design',
                'tagline' => 'Precision architectural visualization before a single hammer is swung.',
                'summary' => 'Photorealistic 3D rendering, isometric spatial cutaways, architectural zoning, and ergonomic planning that removes guesswork from spatial investment.',
                'overview' => 'Before physical execution begins, our clients experience their future space in exacting photographic detail. We construct accurate 3D digital models incorporating realistic light angles, true material textures, and precise scale to evaluate flow and aesthetics collaboratively.',
                'scope_items' => [
                    'Photorealistic 3D Visualizations & Walkthroughs',
                    'Isometric Architectural Cutaways & Floor Plans',
                    'Natural & Artificial Lighting Simulation',
                    'Color Palette, Texture & Material Moodboards',
                    'Custom Millwork & Elevation Detailed Renderings',
                    'Furniture Clearance & Circulation Optimization',
                ],
                'deliverables' => [
                    'Full Resolution 3D Render Dossier',
                    'Dimensioned Architectural Layout Plans',
                    'Material & Finish Specification Schedule',
                    'Interactive Virtual Walkthrough Inspection',
                ],
                'image' => '/images/showcase/service_space_planning_3d.jpg',
                'featured' => false,
                'meta_title' => '3D Space Planning & Architectural Visualization Dhaka | Champion',
                'meta_description' => 'Photorealistic 3D interior design and spatial planning services in Dhaka by Champion Interior Design.',
            ],
            'exterior-design' => [
                'title' => 'Exterior Design & Façade',
                'bengali_title' => 'এক্সটেরিয়র ডিজাইন',
                'slug' => 'exterior-design',
                'tagline' => 'Architectural street presence, bespoke façades, and landscape integration.',
                'summary' => 'Modern architectural façades, vertical timber screens, exterior travertine stone cladding, entrance canopies, and outdoor living concepts for residences and commercial buildings.',
                'overview' => 'A building’s exterior establishes its first and most lasting impression. We design cohesive architectural façades in Dhaka that balance aesthetic poise with climatic durability, incorporating rainscreen systems, sun-shading timber louvers, and atmospheric exterior night lighting.',
                'scope_items' => [
                    'Residential Villa & Building Façade Redesign',
                    'Travertine Stone, Granite & ACP Architectural Cladding',
                    'Vertical Teak & Metal Sun-Shading Louvers',
                    'Grand Entrance Canopies & Porticos',
                    'Exterior Integrated Night Lighting & Landscape Glow',
                    'Terrace, Balcony & Rooftop Garden Architecture',
                ],
                'deliverables' => [
                    'Exterior 3D Perspective Renderings',
                    'Cladding & Façade Structural Details',
                    'Outdoor Lighting Fixture Schedule',
                    'Material Weather-Resistance Certification',
                ],
                'image' => '/images/showcase/service_exterior_facade.jpg',
                'featured' => false,
                'meta_title' => 'Exterior Façade & Architectural Design Dhaka | Champion Interior Design',
                'meta_description' => 'Bespoke exterior façade design, modern cladding, and architectural development in Bangladesh by Champion Interior Design.',
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

    /**
     * @return array<string, array<string, mixed>>
     */
    public static function featured(): array
    {
        return array_filter(self::all(), fn ($s) => $s['featured'] === true);
    }
}

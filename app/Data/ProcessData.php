<?php

namespace App\Data;

class ProcessData
{
    /**
     * @return array<int, array{
     *     step: string,
     *     title: string,
     *     bengali_title: string,
     *     duration: string,
     *     description: string,
     *     details: array<string>
     * }>
     */
    public static function all(): array
    {
        return [
            [
                'step' => '01',
                'title' => 'Consultation & Vision Briefing',
                'bengali_title' => 'পরামর্শ ও চাহিদা বিশ্লেষণ',
                'duration' => 'Week 1',
                'description' => 'We meet in person or virtually to understand your functional lifestyle needs, aesthetic preferences, spatial requirements, and investment parameters.',
                'details' => [
                    'Client lifestyle and workflow interview',
                    'Scope definition and spatial zoning criteria',
                    'Preliminary budget alignment and project roadmap',
                ],
            ],
            [
                'step' => '02',
                'title' => 'Site Visit & Requirement Analysis',
                'bengali_title' => 'সাইট পরিদর্শন ও স্পেস প্ল্যানিং',
                'duration' => 'Week 1–2',
                'description' => 'Our technical team conducts on-site laser measurements, structural assessments, electrical/plumbing audit, and natural light analysis of the existing space.',
                'details' => [
                    'Laser millimeter-accurate survey',
                    'Structural column and MEP infrastructure inspection',
                    'Acoustic and daylight orientation mapping',
                ],
            ],
            [
                'step' => '03',
                'title' => 'Space Planning & 2D Layouts',
                'bengali_title' => 'স্পেস প্ল্যানিং ও লেআউট',
                'duration' => 'Week 2–3',
                'description' => 'We draft functional architectural floor plans demonstrating multiple layout options, furniture clearances, traffic circulation, and storage allocation.',
                'details' => [
                    'Multiple zoning and circulation options',
                    'Furniture placement and dimensioned clearances',
                    'Partition adjustments and wall revisions',
                ],
            ],
            [
                'step' => '04',
                'title' => '3D Visualization & Concept Design',
                'bengali_title' => '3D ভিজ্যুয়ালাইজেশন ও কনসেপ্ট ডিজাইন',
                'duration' => 'Week 3–5',
                'description' => 'We develop photorealistic 3D perspective renderings showcasing materials, bespoke millwork, cove lighting, and tactile surfaces from every key vantage point.',
                'details' => [
                    'Photorealistic 3D perspective views of all main spaces',
                    'Day and night lighting scenarios',
                    'Interactive design review and fine-tuning',
                ],
            ],
            [
                'step' => '05',
                'title' => 'Material Selection & Technical Drawings',
                'bengali_title' => 'ম্যাটেরিয়াল সিলেকশন ও ড্রয়িং',
                'duration' => 'Week 5–6',
                'description' => 'Clients examine physical samples of Italian marble, smoked oak joinery, champagne brass hardware, and fabrics, alongside complete MEP working drawings.',
                'details' => [
                    'Physical material moodboard and tactile swatches',
                    'Architectural working drawings for carpentry and electrical',
                    'Fixed bill of quantities and delivery milestones',
                ],
            ],
            [
                'step' => '06',
                'title' => 'Turnkey Fabrication & Execution',
                'bengali_title' => 'টার্নকি এক্সিকিউশন ও নির্মাণ',
                'duration' => 'Execution Phase',
                'description' => 'Our dedicated in-house craftsmen, carpenters, electricians, and civil trades build the space under continuous project manager supervision.',
                'details' => [
                    'Daily on-site supervision and milestone tracking',
                    'Strict dust containment and surface protection',
                    'Direct sourcing of verified hardware and finishes',
                ],
            ],
            [
                'step' => '07',
                'title' => 'Quality Inspection & Commissioning',
                'bengali_title' => 'কোয়ালিটি ইন্সপেকশন ও টেস্টিং',
                'duration' => 'Pre-Handover',
                'description' => 'A rigorous multi-point inspection checks electrical balancing, joinery soft-close tolerances, paint smoothness, and lighting calibration.',
                'details' => [
                    'Comprehensive snag list verification and rectification',
                    'MEP, HVAC, and smart lighting system testing',
                    'Deep industrial cleaning and detailing',
                ],
            ],
            [
                'step' => '08',
                'title' => 'White-Glove Handover & Warranty',
                'bengali_title' => 'হস্তান্তর ও ওয়ারেন্টি সেবা',
                'duration' => 'Handover',
                'description' => 'The completed space is handed over move-in ready with as-built drawings, material care guides, and our continuing service warranty.',
                'details' => [
                    'Walkthrough handover with Founder & CEO Mushfiqur Rahman Razi',
                    'Documentation package with paint codes and fixture manuals',
                    'Ongoing post-occupancy service support',
                ],
            ],
        ];
    }
}

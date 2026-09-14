<?php

namespace App\Data;

class FaqData
{
    /**
     * @return array<int, array{question: string, answer: string, category: string}>
     */
    public static function all(): array
    {
        return [
            [
                'question' => 'How does the Champion Interior Design engagement process work?',
                'answer' => 'Our process begins with an initial consultation where we review your spatial needs and lifestyle priorities. Following a laser site survey, we develop 2D architectural zoning plans and high-resolution 3D photorealistic visualizations. Once the design and material palette are approved, our in-house teams handle complete turnkey construction through to final white-glove inspection and handover.',
                'category' => 'Process',
            ],
            [
                'question' => 'Do you provide design and physical turnkey execution together?',
                'answer' => 'Yes. Champion Interior Design specializes in end-to-end turnkey delivery. We do not just create 3D renders—we take single-point responsibility for civil modifications, electrical work, plumbing, custom carpentry, painting, material procurement, and final installation. This eliminates miscommunication between separate designers and contractors.',
                'category' => 'Execution',
            ],
            [
                'question' => 'Do you handle both residential and commercial projects in Dhaka?',
                'answer' => 'Yes. We design and build both luxury residences (penthouses, duplexes, master apartments) and high-performance commercial spaces (corporate headquarters, executive suites, retail showrooms, restaurants, and cafés) across Dhaka including Gulshan, Banani, Baridhara, Dhanmondi, Bashundhara, and Uttara.',
                'category' => 'Scope',
            ],
            [
                'question' => 'Can an existing occupied or outdated property be renovated?',
                'answer' => 'Yes. Renovation and remodeling is one of our primary core services. We evaluate existing structural and MEP systems, remove non-loadbearing partitions, modernize outdated wiring and plumbing, and execute a complete architectural transformation with strict dust containment and phased scheduling.',
                'category' => 'Renovation',
            ],
            [
                'question' => 'Do you provide 3D visualization before construction begins?',
                'answer' => 'Every turnkey project includes photorealistic 3D perspective renderings and detailed architectural drawings. You will see exact materials, lighting warmth, furniture scale, and millwork details before physical procurement begins.',
                'category' => 'Design',
            ],
            [
                'question' => 'How can I schedule a consultation with your team?',
                'answer' => 'You can schedule a consultation by filling out our online inquiry form, calling us directly at 01715394444, emailing chmpnidesign@gmail.com, or messaging us via WhatsApp. Our studio team will arrange an initial discussion at your site or atelier.',
                'category' => 'Contact',
            ],
        ];
    }
}

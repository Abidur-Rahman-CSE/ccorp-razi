<?php

namespace App\Http\Controllers;

use App\Data\FaqData;
use App\Data\InsightData;
use App\Data\ProcessData;
use App\Data\ProjectData;
use App\Data\ServiceData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicPageController extends Controller
{
    public function home(): View
    {
        $featuredProjects = ProjectData::featured();
        $signatureServices = ServiceData::featured();
        $processSteps = ProcessData::all();
        $faqs = FaqData::all();

        return view('pages.home', [
            'title' => 'Champion Interior Design | Warm Architectural Luxury & Turnkey Execution Dhaka',
            'metaDescription' => 'Dhaka’s premier turnkey interior design, architecture, and renovation atelier. Led by Mushfiqur Rahman Razi, specializing in luxury penthouses and corporate spaces.',
            'featuredProjects' => $featuredProjects,
            'signatureServices' => $signatureServices,
            'processSteps' => $processSteps,
            'faqs' => $faqs,
        ]);
    }

    public function projectsIndex(): View
    {
        $projects = ProjectData::all();

        return view('pages.projects.index', [
            'title' => 'Selected Architectural Projects | Champion Interior Design Dhaka',
            'metaDescription' => 'Explore completed turnkey residential penthouses, executive corporate headquarters, and luxury renovations across Dhaka, Bangladesh.',
            'projects' => $projects,
            'breadcrumbs' => [
                ['name' => 'Projects', 'url' => route('projects.index')],
            ],
        ]);
    }

    public function projectShow(string $slug): View
    {
        $project = ProjectData::find($slug);

        if (! $project) {
            abort(404, 'Project not found in our studio monograph.');
        }

        $relatedProjects = array_filter(ProjectData::all(), fn ($p) => $p['slug'] !== $slug);

        return view('pages.projects.show', [
            'title' => $project['meta_title'],
            'metaDescription' => $project['meta_description'],
            'metaImage' => asset($project['cover_image']),
            'project' => $project,
            'relatedProjects' => $relatedProjects,
            'breadcrumbs' => [
                ['name' => 'Projects', 'url' => route('projects.index')],
                ['name' => $project['title'], 'url' => route('projects.show', $slug)],
            ],
        ]);
    }

    public function servicesIndex(): View
    {
        $services = ServiceData::all();

        return view('pages.services.index', [
            'title' => 'Turnkey Interior Design & Architectural Services | Dhaka, Bangladesh',
            'metaDescription' => 'Complete design solutions: residential interiors, commercial spaces, office fit-outs, restaurant design, renovation, 3D space planning, and exterior façades.',
            'services' => $services,
            'breadcrumbs' => [
                ['name' => 'Services', 'url' => route('services.index')],
            ],
        ]);
    }

    public function serviceShow(string $slug): View
    {
        $service = ServiceData::find($slug);

        if (! $service) {
            abort(404, 'Service practice not found.');
        }

        $otherServices = array_filter(ServiceData::all(), fn ($s) => $s['slug'] !== $slug);

        return view('pages.services.show', [
            'title' => $service['meta_title'],
            'metaDescription' => $service['meta_description'],
            'metaImage' => asset($service['image']),
            'service' => $service,
            'otherServices' => $otherServices,
            'breadcrumbs' => [
                ['name' => 'Services', 'url' => route('services.index')],
                ['name' => $service['title'], 'url' => route('services.show', $slug)],
            ],
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'title' => 'About Champion Interior Design | Studio Philosophy & Leadership',
            'metaDescription' => 'Learn about Champion Interior Design and Founder & CEO Mushfiqur Rahman Razi. Craftsmanship, architectural discipline, and turnkey execution in Dhaka.',
            'breadcrumbs' => [
                ['name' => 'About Studio', 'url' => route('about')],
            ],
        ]);
    }

    public function process(): View
    {
        $steps = ProcessData::all();

        return view('pages.process', [
            'title' => 'Our 8-Step Architectural Process | Champion Interior Design',
            'metaDescription' => 'From initial laser site analysis and 3D visualization to turnkey carpentry, MEP engineering, and white-glove handover in Dhaka.',
            'steps' => $steps,
            'breadcrumbs' => [
                ['name' => 'Process', 'url' => route('process')],
            ],
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', [
            'title' => 'Contact Champion Interior Design | Book a Private Consultation Dhaka',
            'metaDescription' => 'Schedule an architectural consultation for your residential penthouse or commercial project. Direct phone: 01715394444. Dhaka, Bangladesh.',
            'breadcrumbs' => [
                ['name' => 'Contact', 'url' => route('contact')],
            ],
        ]);
    }

    public function submitInquiry(Request $request): RedirectResponse
    {
        // Bot honeypot verification
        if ($request->filled('company_trap')) {
            return back()->with('success', 'Thank you. Your consultation inquiry has been recorded.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'phone' => 'required|string|max:30',
            'email' => 'nullable|email|max:120',
            'project_type' => 'nullable|string|max:80',
            'location' => 'nullable|string|max:80',
            'approx_area' => 'nullable|string|max:50',
            'message' => 'required|string|max:2000',
        ]);

        // In production, dispatch notification email or CRM webhook.
        return back()->with('success', 'Thank you, '.$validated['name'].'. Your project inquiry has been received. Founder Mushfiqur Rahman Razi and our studio team will contact you within 24 hours.');
    }

    public function insightsIndex(): View
    {
        $insights = InsightData::all();

        return view('pages.insights.index', [
            'title' => 'Editorial Insights & Architectural Monograph | Champion Interior Design',
            'metaDescription' => 'Thought leadership on tropical architecture, turnkey execution advantages, and material honesty in Dhaka, Bangladesh.',
            'insights' => $insights,
            'breadcrumbs' => [
                ['name' => 'Insights', 'url' => route('insights.index')],
            ],
        ]);
    }

    public function insightShow(string $slug): View
    {
        $insight = InsightData::find($slug);

        if (! $insight) {
            abort(404, 'Article not found.');
        }

        $relatedInsights = array_filter(InsightData::all(), fn ($i) => $i['slug'] !== $slug);

        return view('pages.insights.show', [
            'title' => $insight['meta_title'],
            'metaDescription' => $insight['meta_description'],
            'metaImage' => asset($insight['cover_image']),
            'insight' => $insight,
            'relatedInsights' => $relatedInsights,
            'breadcrumbs' => [
                ['name' => 'Insights', 'url' => route('insights.index')],
                ['name' => $insight['title'], 'url' => route('insights.show', $slug)],
            ],
        ]);
    }
}

import { createInertiaApp } from '@inertiajs/react';
import { createRoot } from 'react-dom/client';
import { Toaster } from '@/components/ui/sonner';
import { TooltipProvider } from '@/components/ui/tooltip';
import { initializeTheme } from '@/hooks/use-appearance';
import BeforeAfterSlider from '@/islands/before-after-slider';
import AppLayout from '@/layouts/app-layout';
import AuthLayout from '@/layouts/auth-layout';
import SettingsLayout from '@/layouts/settings/layout';
import { initProjectCursor } from './motion/cursor';
import { initFaqAccordion } from './motion/faq';
import { initLenis } from './motion/lenis';
import { initSmartNav } from './motion/navigation';
import { initProcessTimeline } from './motion/process';
import { initScrollReveals } from './motion/scroll-reveal';
import { initServicesFilter } from './motion/services-filter';

const appName = import.meta.env.VITE_APP_NAME || 'Champion Interior Design';

// Hydrate Progressive React Islands & Luxury Motion System on Blade pages
function initMarketingExperience() {
    document.documentElement.classList.add('motion-ready');

    const architecturalScene = document.querySelector<HTMLElement>(
        '[data-architectural-scene]',
    );
    if (architecturalScene) {
        void import('./motion/architectural-scene')
            .then(({ initArchitecturalScene }) =>
                initArchitecturalScene(architecturalScene),
            )
            .catch(() => {
                architecturalScene.dataset.sceneState = 'fallback';
            });
    }

    // 1. Initialize Luxury Architectural Motion System
    initLenis();
    initSmartNav();
    initScrollReveals();
    initProjectCursor();
    initFaqAccordion();
    initServicesFilter();
    initProcessTimeline();

    // 2. Hydrate Before/After Slider Island
    const beforeAfterEl = document.getElementById('before-after-island');
    if (beforeAfterEl) {
        const beforeImg = beforeAfterEl.getAttribute('data-before') || '';
        const afterImg = beforeAfterEl.getAttribute('data-after') || '';
        const beforeLabel =
            beforeAfterEl.getAttribute('data-label-before') || undefined;
        const afterLabel =
            beforeAfterEl.getAttribute('data-label-after') || undefined;

        const root = createRoot(beforeAfterEl);
        root.render(
            <BeforeAfterSlider
                beforeImage={beforeImg}
                afterImage={afterImg}
                beforeLabel={beforeLabel}
                afterLabel={afterLabel}
            />,
        );
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMarketingExperience);
} else {
    initMarketingExperience();
}

// Mount Inertia if and only if #app element exists (Dashboard / Auth portal)
if (document.getElementById('app')) {
    void createInertiaApp({
        title: (title) => (title ? `${title} - ${appName}` : appName),
        layout: (name) => {
            switch (true) {
                case name === 'welcome':
                    return null;
                case name.startsWith('auth/'):
                    return AuthLayout;
                case name.startsWith('settings/'):
                    return [AppLayout, SettingsLayout];
                default:
                    return AppLayout;
            }
        },
        strictMode: true,
        withApp(app) {
            return (
                <TooltipProvider delayDuration={0}>
                    {app}
                    <Toaster />
                </TooltipProvider>
            );
        },
        progress: {
            color: '#AD8753',
        },
    });

    // Theme initialization for dashboard
    initializeTheme();
}

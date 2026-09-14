import { getLenis } from './lenis';

export function initProcessTimeline(): void {
    const processSection = document.getElementById('process-section');
    const timelineProgress = document.getElementById(
        'process-timeline-progress',
    );
    const processItems =
        document.querySelectorAll<HTMLElement>('.process-step-item');

    if (!processSection || processItems.length === 0) return;

    function updateTimeline() {
        if (!processSection) return;
        const rect = processSection.getBoundingClientRect();
        const viewportHeight = window.innerHeight;

        // Calculate progress through the section
        const totalDistance = rect.height - viewportHeight * 0.4;
        const scrolled = -rect.top + viewportHeight * 0.3;
        const progress = Math.max(0, Math.min(1, scrolled / totalDistance));

        if (timelineProgress) {
            timelineProgress.style.height = `${progress * 100}%`;
        }

        // Highlight active step based on viewport vertical center
        const focalLine = viewportHeight * 0.5;

        processItems.forEach((item) => {
            const itemRect = item.getBoundingClientRect();
            if (
                itemRect.top <= focalLine &&
                itemRect.bottom >= focalLine - 80
            ) {
                item.classList.add('is-active-step');
            } else {
                item.classList.remove('is-active-step');
            }
        });
    }

    const lenis = getLenis();
    if (lenis) {
        lenis.on('scroll', updateTimeline);
    } else {
        window.addEventListener('scroll', updateTimeline, { passive: true });
    }

    // Initial check
    updateTimeline();
}

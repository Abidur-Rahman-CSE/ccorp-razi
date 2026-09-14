import { getLenis } from './lenis';

export function initScrollReveals(): void {
    const isReduced = window.matchMedia(
        '(prefers-reduced-motion: reduce)',
    ).matches;

    const targetSelector =
        '.reveal-text, .reveal-line, .reveal-card, .reveal-item, .reveal-group, .process-step-item';

    if (isReduced) {
        document.querySelectorAll(targetSelector).forEach((el) => {
            el.classList.add('is-revealed');
        });
        return;
    }

    const windowHeight = window.innerHeight;

    // 1. Intersection Observer for Scroll Reveals
    const observerOptions: IntersectionObserverInit = {
        root: null,
        rootMargin: '0px 0px 40px 0px',
        threshold: 0.05,
    };

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-revealed');
                revealObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll(targetSelector).forEach((el) => {
        const rect = el.getBoundingClientRect();
        // If element is already in the viewport (or above it), reveal immediately
        if (rect.top < windowHeight - 40) {
            el.classList.add('is-revealed');
        } else {
            revealObserver.observe(el);
        }
    });

    // 2. Subtle Parallax for Interior Project Images
    const parallaxElements = Array.from(
        document.querySelectorAll<HTMLElement>('.parallax-img'),
    );

    if (parallaxElements.length > 0) {
        let ticking = false;

        const updateParallax = () => {
            const viewportHeight = window.innerHeight;

            parallaxElements.forEach((el) => {
                const rect = el.getBoundingClientRect();
                if (rect.top < viewportHeight + 100 && rect.bottom > -100) {
                    const elemCenter = rect.top + rect.height / 2;
                    const viewCenter = viewportHeight / 2;
                    const progress = (elemCenter - viewCenter) / viewportHeight;
                    const offset = Math.round(progress * 24);
                    el.style.transform = `translate3d(0, ${offset}px, 0) scale(1.06)`;
                }
            });

            ticking = false;
        };

        const lenis = getLenis();
        if (lenis) {
            lenis.on('scroll', () => {
                if (!ticking) {
                    requestAnimationFrame(updateParallax);
                    ticking = true;
                }
            });
        } else {
            window.addEventListener(
                'scroll',
                () => {
                    if (!ticking) {
                        requestAnimationFrame(updateParallax);
                        ticking = true;
                    }
                },
                { passive: true },
            );
        }

        updateParallax();
    }

    // 3. Subtle Hairline Glow on Interactive Cards
    document.querySelectorAll<HTMLElement>('.glow-card').forEach((card) => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        });
    });
}

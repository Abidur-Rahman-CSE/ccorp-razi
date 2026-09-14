import { getLenis } from './lenis';

export function initSmartNav(): void {
    const nav = document.getElementById('primary-nav');
    if (!nav) return;

    let lastScrollY = window.scrollY;
    let isHidden = false;
    const scrollThreshold = 120;
    const deltaThreshold = 8;

    function handleScroll(currentY: number) {
        // Compact styling after 60px
        if (currentY > 60) {
            nav?.classList.add('nav-scrolled');
        } else {
            nav?.classList.remove('nav-scrolled');
        }

        // Directional hide / show
        const diff = currentY - lastScrollY;

        if (currentY > scrollThreshold && diff > deltaThreshold && !isHidden) {
            // Scrolling down fast -> hide
            nav?.classList.add('nav-hidden');
            isHidden = true;
        } else if (diff < -deltaThreshold && isHidden) {
            // Scrolling up -> show
            nav?.classList.remove('nav-hidden');
            isHidden = false;
        } else if (currentY <= scrollThreshold && isHidden) {
            nav?.classList.remove('nav-hidden');
            isHidden = false;
        }

        lastScrollY = Math.max(0, currentY);
    }

    const lenis = getLenis();
    if (lenis) {
        lenis.on('scroll', (e: { scroll: number }) => {
            handleScroll(e.scroll);
        });
    } else {
        window.addEventListener(
            'scroll',
            () => {
                handleScroll(window.scrollY);
            },
            { passive: true },
        );
    }
}

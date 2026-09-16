import { getLenis } from './lenis';

export function initSmartNav(): void {
    const nav = document.getElementById('primary-nav');
    if (!nav) return;

    let lastScrollY = window.scrollY;
    let isHidden = false;
    const scrollThreshold = 120;
    const deltaThreshold = 8;

    function handleScroll(currentY: number) {
        // Dark top bar ONLY shows at screen top (scrollY <= 15), collapses completely when scrolled down
        if (currentY > 15) {
            nav?.classList.add('top-bar-hidden');
        } else {
            nav?.classList.remove('top-bar-hidden');
        }

        // Compact glass styling after 40px
        if (currentY > 40) {
            nav?.classList.add('nav-scrolled');
        } else {
            nav?.classList.remove('nav-scrolled');
        }

        // Directional hide / show for main navigation
        const diff = currentY - lastScrollY;

        if (currentY > scrollThreshold && diff > deltaThreshold && !isHidden) {
            // Scrolling down fast -> hide main nav
            nav?.classList.add('nav-hidden');
            document.documentElement.classList.add('nav-is-hidden');
            isHidden = true;
        } else if (diff < -deltaThreshold && isHidden) {
            // Scrolling up -> show main nav (with top dark bar remaining hidden)
            nav?.classList.remove('nav-hidden');
            document.documentElement.classList.remove('nav-is-hidden');
            isHidden = false;
        } else if (currentY <= scrollThreshold && isHidden) {
            nav?.classList.remove('nav-hidden');
            document.documentElement.classList.remove('nav-is-hidden');
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

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

    // Initialize Accessible Mobile Menu
    initMobileMenu();
}

function initMobileMenu(): void {
    const menuBtn = document.getElementById('mobile-menu-btn') as HTMLButtonElement | null;
    const drawer = document.getElementById('mobile-drawer') as HTMLElement | null;
    const closeBtn = document.getElementById('mobile-drawer-close') as HTMLButtonElement | null;

    if (!menuBtn || !drawer) return;

    let isOpen = false;

    function getFocusableElements(): HTMLElement[] {
        if (!drawer) return [];
        const selector = 'button:not([disabled]), a[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])';
        return Array.from(drawer.querySelectorAll<HTMLElement>(selector)).filter(
            (el) => el.offsetParent !== null || el === closeBtn
        );
    }

    function openDrawer(): void {
        if (isOpen) return;
        isOpen = true;

        menuBtn?.setAttribute('aria-expanded', 'true');
        menuBtn?.setAttribute('aria-label', 'Close Navigation Menu');
        drawer?.removeAttribute('inert');
        drawer?.setAttribute('aria-hidden', 'false');
        drawer?.classList.remove('translate-x-full', 'invisible', 'pointer-events-none');
        document.body.style.overflow = 'hidden';

        // Move focus into the opened menu
        requestAnimationFrame(() => {
            if (closeBtn) {
                closeBtn.focus();
            } else {
                const focusable = getFocusableElements();
                if (focusable.length > 0) focusable[0].focus();
            }
        });

        document.addEventListener('keydown', handleKeydown);
    }

    function closeDrawer(restoreFocus = true): void {
        if (!isOpen) return;
        isOpen = false;

        menuBtn?.setAttribute('aria-expanded', 'false');
        menuBtn?.setAttribute('aria-label', 'Open Navigation Menu');
        drawer?.setAttribute('inert', '');
        drawer?.setAttribute('aria-hidden', 'true');
        drawer?.classList.add('translate-x-full', 'invisible', 'pointer-events-none');
        document.body.style.overflow = '';

        document.removeEventListener('keydown', handleKeydown);

        if (restoreFocus && menuBtn) {
            menuBtn.focus();
        }
    }

    function handleKeydown(e: KeyboardEvent): void {
        if (!isOpen) return;

        // Close on Escape
        if (e.key === 'Escape') {
            e.preventDefault();
            closeDrawer(true);
            return;
        }

        // Keep keyboard focus within the menu (Focus Trap)
        if (e.key === 'Tab') {
            const focusable = getFocusableElements();
            if (focusable.length === 0) return;

            const firstElement = focusable[0];
            const lastElement = focusable[focusable.length - 1];

            if (e.shiftKey) {
                if (document.activeElement === firstElement) {
                    e.preventDefault();
                    lastElement.focus();
                }
            } else {
                if (document.activeElement === lastElement) {
                    e.preventDefault();
                    firstElement.focus();
                }
            }
        }
    }

    // Toggle button click
    menuBtn.addEventListener('click', () => {
        if (isOpen) {
            closeDrawer(true);
        } else {
            openDrawer();
        }
    });

    // Close button click
    closeBtn?.addEventListener('click', () => {
        closeDrawer(true);
    });

    // Close on navigation link click
    drawer.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            closeDrawer(false);
        });
    });

    // Reset menu state correctly when resizing to desktop (>= 1024px)
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024 && isOpen) {
            closeDrawer(false);
        }
    });
}


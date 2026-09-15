export function initProjectCursor(): void {
    // Only enable on desktop pointer devices that support hover and full motion
    if (
        window.matchMedia('(pointer: coarse)').matches ||
        window.matchMedia('(hover: none)').matches ||
        window.matchMedia('(prefers-reduced-motion: reduce)').matches
    ) {
        return;
    }

    let cursor = document.getElementById('project-cursor');
    let badge = document.getElementById('project-cursor-badge');

    if (!cursor) {
        cursor = document.createElement('div');
        cursor.id = 'project-cursor';
        cursor.className =
            'fixed top-0 left-0 pointer-events-none z-[99999] select-none';

        badge = document.createElement('div');
        badge.id = 'project-cursor-badge';
        badge.className =
            'liquid-glass-cursor flex flex-col items-center justify-center w-[76px] h-[76px] rounded-full select-none';
        badge.innerHTML = `
            <span class="font-serif italic text-[13px] text-[#1E211F] font-semibold leading-none drop-shadow-xs">Explore</span>
            <span class="text-[11px] text-[#AD8753] font-sans leading-none mt-0.5 font-bold">↗</span>
        `;

        cursor.appendChild(badge);
        document.body.appendChild(cursor);
    } else {
        badge =
            cursor.querySelector('#project-cursor-badge') ||
            (cursor.firstElementChild as HTMLElement | null);
    }

    if (!badge) return;

    let isVisible = false;

    function hide() {
        if (!badge || !isVisible) return;
        badge.classList.remove('is-active');
        isVisible = false;
    }

    function show(clientX: number, clientY: number) {
        if (!cursor || !badge) return;
        // Position outer wrapper instantly (zero CSS transition on transform = zero lag / zero jitter)
        cursor.style.transform = `translate3d(${clientX - 38}px, ${clientY - 38}px, 0)`;

        if (!isVisible) {
            badge.classList.add('is-active');
            isVisible = true;
        }
    }

    // Bind all current and future project hover targets
    function bindTarget(el: HTMLElement) {
        el.addEventListener('pointerenter', (e) => {
            show(e.clientX, e.clientY);
        });

        el.addEventListener(
            'pointermove',
            (e) => {
                if (!cursor) return;
                cursor.style.transform = `translate3d(${e.clientX - 38}px, ${e.clientY - 38}px, 0)`;
                if (!isVisible && badge) {
                    badge.classList.add('is-active');
                    isVisible = true;
                }
            },
            { passive: true },
        );

        el.addEventListener('pointerleave', hide);
        el.addEventListener('pointercancel', hide);
        el.addEventListener('click', hide);
    }

    document
        .querySelectorAll<HTMLElement>('[data-project-hover]')
        .forEach(bindTarget);

    // Global fail-safe fallbacks: guarantees cursor hides on boundaries, scroll, or window blur
    window.addEventListener(
        'pointermove',
        (e) => {
            const target = (
                e.target as HTMLElement | null
            )?.closest<HTMLElement>('[data-project-hover]');
            if (target) {
                show(e.clientX, e.clientY);
            } else if (isVisible) {
                hide();
            }
        },
        { passive: true },
    );

    window.addEventListener('scroll', hide, { passive: true });
    window.addEventListener('blur', hide);
    window.addEventListener('resize', hide);
    window.addEventListener('contextmenu', hide);
    document.addEventListener('mouseleave', hide);
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) hide();
    });
}

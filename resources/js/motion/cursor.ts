export function initProjectCursor(): void {
    if (window.matchMedia('(pointer: coarse)').matches) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    let cursor = document.getElementById('project-cursor');
    if (!cursor) {
        cursor = document.createElement('div');
        cursor.id = 'project-cursor';
        cursor.className =
            'fixed top-0 left-0 pointer-events-none z-50 flex flex-col items-center justify-center w-20 h-20 rounded-full liquid-glass-cursor opacity-0 scale-75 select-none';
        cursor.style.transition = 'opacity 0.18s ease, transform 0.18s ease';
        cursor.style.willChange = 'transform, opacity';
        cursor.innerHTML =
            '<span class="font-serif italic text-[14px] text-[#1E211F] font-semibold leading-none drop-shadow-xs">Explore</span><span class="text-[11px] text-[#AD8753] font-sans leading-none mt-0.5 font-bold">↗</span>';
        document.body.appendChild(cursor);
    }

    let isVisible = false;

    function hide() {
        if (!cursor || !isVisible) return;
        cursor.classList.remove('opacity-100', 'scale-100');
        cursor.classList.add('opacity-0', 'scale-75');
        isVisible = false;
    }

    window.addEventListener(
        'pointermove',
        (e) => {
            if (!cursor) return;
            const target = (e.target as HTMLElement)?.closest(
                '[data-project-hover]',
            );
            if (target) {
                // Direct translate3d: 0 lag, synchronous with pointer coordinates
                cursor.style.transform = `translate3d(${e.clientX - 40}px, ${e.clientY - 40}px, 0)`;

                if (!isVisible) {
                    cursor.classList.remove('opacity-0', 'scale-75');
                    cursor.classList.add('opacity-100', 'scale-100');
                    isVisible = true;
                }
            } else if (isVisible) {
                hide();
            }
        },
        { passive: true },
    );

    // Hide immediately on scroll, tab switch, or leaving window
    window.addEventListener('scroll', hide, { passive: true });
    window.addEventListener('blur', hide);
    document.addEventListener('mouseleave', hide);
}

export function initProjectCursor(): void {
    // Only run on desktop pointer devices
    if (window.matchMedia('(pointer: coarse)').matches) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    let cursor = document.getElementById('project-cursor');
    if (!cursor) {
        cursor = document.createElement('div');
        cursor.id = 'project-cursor';
        cursor.className =
            'fixed pointer-events-none z-50 flex flex-col items-center justify-center w-20 h-20 rounded-full liquid-glass-cursor opacity-0 scale-75 transition-all duration-300 ease-out -translate-x-1/2 -translate-y-1/2 text-charcoal select-none';
        cursor.innerHTML =
            '<span class="font-serif italic text-[13px] tracking-wide text-[#1E211F] font-normal leading-none">Explore</span><span class="text-[10px] text-[#AD8753] font-sans leading-none mt-1 font-semibold">↗</span>';
        document.body.appendChild(cursor);
    }

    let mouseX = -100;
    let mouseY = -100;
    let cursorX = -100;
    let cursorY = -100;
    let isHovering = false;
    let isMoving = false;

    window.addEventListener(
        'mousemove',
        (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;

            if (!isMoving) {
                isMoving = true;
                requestAnimationFrame(animateCursor);
            }
        },
        { passive: true },
    );

    function animateCursor() {
        const ease = 0.2;
        cursorX += (mouseX - cursorX) * ease;
        cursorY += (mouseY - cursorY) * ease;

        if (cursor) {
            cursor.style.left = `${cursorX}px`;
            cursor.style.top = `${cursorY}px`;
        }

        if (
            Math.abs(mouseX - cursorX) > 0.1 ||
            Math.abs(mouseY - cursorY) > 0.1 ||
            isHovering
        ) {
            requestAnimationFrame(animateCursor);
        } else {
            isMoving = false;
        }
    }

    document.querySelectorAll('[data-project-hover]').forEach((target) => {
        target.addEventListener('mouseenter', () => {
            isHovering = true;
            if (cursor) {
                cursor.classList.remove('opacity-0', 'scale-75');
                cursor.classList.add('opacity-100', 'scale-100');
            }
        });

        target.addEventListener('mouseleave', () => {
            isHovering = false;
            if (cursor) {
                cursor.classList.remove('opacity-100', 'scale-100');
                cursor.classList.add('opacity-0', 'scale-75');
            }
        });
    });
}

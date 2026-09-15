export function initProcessTimeline(): void {
    const container = document.getElementById('methodology-interactive');
    if (!container) return;

    const navButtons = Array.from(
        container.querySelectorAll<HTMLButtonElement>('[data-step-index]'),
    );
    const panels = Array.from(
        container.querySelectorAll<HTMLElement>('[data-step-panel]'),
    );
    const prevBtn = document.getElementById(
        'methodology-prev-btn',
    ) as HTMLButtonElement | null;
    const nextBtn = document.getElementById(
        'methodology-next-btn',
    ) as HTMLButtonElement | null;
    const indicator = document.getElementById('methodology-active-indicator');
    const progressBar = document.getElementById('methodology-bar');

    if (navButtons.length === 0 || panels.length === 0) return;

    let currentIndex = 0;
    const totalSteps = panels.length;

    function goToStep(index: number) {
        if (index < 0 || index >= totalSteps || index === currentIndex) return;

        const currentPanel = panels[currentIndex];
        const nextPanel = panels[index];
        const currentBtn = navButtons[currentIndex];
        const nextBtnEl = navButtons[index];

        if (!currentPanel || !nextPanel || !currentBtn || !nextBtnEl) return;

        // Transition out current panel
        currentPanel.style.opacity = '0';
        currentPanel.style.transform = 'translateY(8px)';

        setTimeout(() => {
            currentPanel.classList.add('hidden');
            currentPanel.classList.remove('block');

            // Activate new panel
            nextPanel.classList.remove('hidden');
            nextPanel.classList.add('block');
            nextPanel.style.opacity = '0';
            nextPanel.style.transform = 'translateY(8px)';

            // Force reflow
            void nextPanel.offsetHeight;

            nextPanel.style.opacity = '1';
            nextPanel.style.transform = 'translateY(0)';
        }, 180);

        // Update button active states
        currentBtn.classList.remove(
            'bg-[#1E211F]',
            'text-white',
            'border-[#1E211F]',
            'shadow-sm',
        );
        currentBtn.classList.add(
            'bg-[#FAF8F5]',
            'text-[#676660]',
            'border-black/10',
        );

        nextBtnEl.classList.remove(
            'bg-[#FAF8F5]',
            'text-[#676660]',
            'border-black/10',
        );
        nextBtnEl.classList.add(
            'bg-[#1E211F]',
            'text-white',
            'border-[#1E211F]',
            'shadow-sm',
        );

        // Scroll active button into view horizontally on mobile
        nextBtnEl.scrollIntoView({
            behavior: 'smooth',
            block: 'nearest',
            inline: 'center',
        });

        // Update progress bar & indicator text
        if (indicator) {
            const stepStr = String(index + 1).padStart(2, '0');
            indicator.textContent = `${stepStr} / ${String(totalSteps).padStart(2, '0')}`;
        }
        if (progressBar) {
            const percent = ((index + 1) / totalSteps) * 100;
            progressBar.style.width = `${percent}%`;
        }

        // Update Prev / Next button states
        if (prevBtn) prevBtn.disabled = index === 0;
        if (nextBtn) nextBtn.disabled = index === totalSteps - 1;

        currentIndex = index;
    }

    // Bind tab clicks
    navButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            const idx = parseInt(
                btn.getAttribute('data-step-index') || '0',
                10,
            );
            goToStep(idx);
        });
    });

    // Bind Prev / Next arrows
    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) goToStep(currentIndex - 1);
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            if (currentIndex < totalSteps - 1) goToStep(currentIndex + 1);
        });
    }

    // Keyboard Arrow navigation when container is in focus
    container.addEventListener('keydown', (e: KeyboardEvent) => {
        if (e.key === 'ArrowLeft' && currentIndex > 0) {
            goToStep(currentIndex - 1);
        } else if (e.key === 'ArrowRight' && currentIndex < totalSteps - 1) {
            goToStep(currentIndex + 1);
        }
    });

    // Touch swipe support on panels
    let touchStartX = 0;
    let touchEndX = 0;

    container.addEventListener(
        'touchstart',
        (e: TouchEvent) => {
            touchStartX = e.changedTouches[0].screenX;
        },
        { passive: true },
    );

    container.addEventListener(
        'touchend',
        (e: TouchEvent) => {
            touchEndX = e.changedTouches[0].screenX;
            const diff = touchStartX - touchEndX;
            if (Math.abs(diff) > 50) {
                if (diff > 0 && currentIndex < totalSteps - 1) {
                    goToStep(currentIndex + 1);
                } else if (diff < 0 && currentIndex > 0) {
                    goToStep(currentIndex - 1);
                }
            }
        },
        { passive: true },
    );
}

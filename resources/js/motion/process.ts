import { getLenis } from './lenis';

export function initProcessTimeline(): void {
    const stackContainer = document.getElementById(
        'methodology-stack-container',
    );
    if (!stackContainer) return;

    const cards = Array.from(
        stackContainer.querySelectorAll<HTMLElement>('[data-stack-card]'),
    );
    const chips = Array.from(
        document.querySelectorAll<HTMLButtonElement>('[data-stack-target]'),
    );
    const tracker = document.getElementById('methodology-sticky-tracker');
    const counterEl = document.getElementById('methodology-counter');
    const phaseLabelEl = document.getElementById('methodology-phase-label');
    const progressBar = document.getElementById('methodology-progress-bar');

    if (cards.length === 0) return;

    const totalSteps = cards.length;
    let activeIndex = 0;
    let isClickScrolling = false;
    let clickTimeout: number | null = null;

    // Cache phase titles from cards
    const phaseTitles: string[] = cards.map((card) => {
        const titleEl = card.querySelector('h3');
        return titleEl ? titleEl.textContent?.trim() || '' : '';
    });

    function updateActiveState(index: number) {
        if (index < 0 || index >= totalSteps) return;
        activeIndex = index;

        // Update card visual depth and stacking states
        cards.forEach((card, idx) => {
            if (idx === index) {
                card.classList.add('is-focused');
                card.classList.remove('is-stacked-behind');
            } else if (idx < index) {
                card.classList.remove('is-focused');
                card.classList.add('is-stacked-behind');
            } else {
                card.classList.remove('is-focused', 'is-stacked-behind');
            }
        });

        // Update sticky milestone navigation chips
        chips.forEach((chip, idx) => {
            if (idx === index) {
                chip.classList.add(
                    'bg-[#1E211F]',
                    'text-white',
                    'border-[#1E211F]',
                    'shadow-xs',
                );
                chip.classList.remove(
                    'bg-white/80',
                    'text-[#676660]',
                    'border-black/10',
                );

                const stepSpan = chip.querySelector('span');
                if (stepSpan) {
                    stepSpan.classList.add('text-[#AD8753]');
                    stepSpan.classList.remove('text-[#AD8753]/80');
                }

                // Smoothly center the active chip in the horizontal container
                chip.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest',
                    inline: 'center',
                });
            } else {
                chip.classList.remove(
                    'bg-[#1E211F]',
                    'text-white',
                    'border-[#1E211F]',
                    'shadow-xs',
                );
                chip.classList.add(
                    'bg-white/80',
                    'text-[#676660]',
                    'border-black/10',
                );

                const stepSpan = chip.querySelector('span');
                if (stepSpan) {
                    stepSpan.classList.remove('text-[#AD8753]');
                    stepSpan.classList.add('text-[#AD8753]/80');
                }
            }
        });

        // Update counter text & phase label
        if (counterEl) {
            const currentStepStr = String(index + 1).padStart(2, '0');
            const totalStepStr = String(totalSteps).padStart(2, '0');
            counterEl.textContent = `${currentStepStr} / ${totalStepStr}`;
        }

        if (phaseLabelEl && phaseTitles[index]) {
            const shortTitle = phaseTitles[index].split('&')[0].trim();
            phaseLabelEl.textContent = shortTitle;
        }

        // Update progress bar
        if (progressBar) {
            const percent = ((index + 1) / totalSteps) * 100;
            progressBar.style.width = `${percent}%`;
        }
    }

    // Scroll calculation to detect active card and manage tracker exit
    let ticking = false;
    function onScroll() {
        if (isClickScrolling) return;
        if (!ticking) {
            window.requestAnimationFrame(() => {
                evaluateCardPositions();
                ticking = false;
            });
            ticking = true;
        }
    }

    function evaluateCardPositions() {
        const isDesktop = window.innerWidth >= 1024;
        const stickyThreshold = isDesktop ? 180 : 130;
        let newActiveIndex = 0;

        for (let i = 0; i < cards.length; i++) {
            const rect = cards[i].getBoundingClientRect();
            if (rect.top <= stickyThreshold) {
                newActiveIndex = i;
            }
        }

        if (newActiveIndex !== activeIndex) {
            updateActiveState(newActiveIndex);
        }
    }

    window.addEventListener('scroll', onScroll, { passive: true });

    // Handle clicks on milestone chips to smooth-scroll
    chips.forEach((chip) => {
        chip.addEventListener('click', () => {
            const targetIdx = Number(chip.getAttribute('data-stack-target'));
            const targetCard = cards[targetIdx];
            if (!targetCard) return;

            isClickScrolling = true;
            if (clickTimeout) clearTimeout(clickTimeout);

            updateActiveState(targetIdx);

            const isDesktop = window.innerWidth >= 1024;
            const scrollOffset = isDesktop ? -135 : -90;

            const lenis = getLenis();
            if (lenis) {
                lenis.scrollTo(targetCard, {
                    offset: scrollOffset,
                    duration: 1.2,
                    onComplete: () => {
                        isClickScrolling = false;
                    },
                });
            } else {
                targetCard.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start',
                });
                clickTimeout = window.setTimeout(() => {
                    isClickScrolling = false;
                }, 800);
            }
        });
    });

    // Initial evaluation
    evaluateCardPositions();
}

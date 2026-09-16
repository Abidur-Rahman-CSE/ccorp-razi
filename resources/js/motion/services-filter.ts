export function initServicesFilter(): void {
    const tabs = Array.from(document.querySelectorAll<HTMLButtonElement>('[data-service-tab]'));
    const cards = Array.from(document.querySelectorAll<HTMLElement>('[data-service-category]'));
    const indicator = document.getElementById('service-tab-indicator');

    if (tabs.length === 0 || cards.length === 0) return;

    // Timer tracking map to prevent race conditions during rapid tab switching
    const cardTimers = new Map<HTMLElement, number>();

    function setTabPosition(activeTab: HTMLButtonElement) {
        if (!indicator) return;
        indicator.style.left = `${activeTab.offsetLeft}px`;
        indicator.style.width = `${activeTab.offsetWidth}px`;
    }

    function selectTab(tab: HTMLButtonElement) {
        const category = tab.getAttribute('data-service-tab');
        if (!category) return;

        // Synchronize tab styles and ARIA states
        tabs.forEach((t) => {
            const isSelected = t === tab;
            t.setAttribute('aria-selected', isSelected ? 'true' : 'false');
            t.tabIndex = isSelected ? 0 : -1;
            if (isSelected) {
                t.classList.add('active-tab', 'text-charcoal');
                t.classList.remove('text-charcoal-muted');
            } else {
                t.classList.remove('active-tab', 'text-charcoal');
                t.classList.add('text-charcoal-muted');
            }
        });

        setTabPosition(tab);

        // Update cards with cancelable animation timers
        cards.forEach((card) => {
            const cardCategory = card.getAttribute('data-service-category') || '';
            const shouldShow = category === 'all' || cardCategory.includes(category);

            // Clear any pending timeout for this card
            const pendingTimer = cardTimers.get(card);
            if (pendingTimer !== undefined) {
                window.clearTimeout(pendingTimer);
                cardTimers.delete(card);
            }

            if (shouldShow) {
                // Ensure card is in the layout before fading in
                card.style.display = '';
                // Ensure transitions are active
                card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                requestAnimationFrame(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0) scale(1)';
                });
            } else {
                card.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
                card.style.opacity = '0';
                card.style.transform = 'translateY(12px) scale(0.98)';
                const timer = window.setTimeout(() => {
                    card.style.display = 'none';
                    cardTimers.delete(card);
                }, 200);
                cardTimers.set(card, timer);
            }
        });
    }

    // Set initial active tab state
    const initialActive =
        document.querySelector<HTMLButtonElement>('[data-service-tab].active-tab') || tabs[0];
    if (initialActive) {
        tabs.forEach((t) => {
            const isSelected = t === initialActive;
            t.setAttribute('aria-selected', isSelected ? 'true' : 'false');
            t.tabIndex = isSelected ? 0 : -1;
        });
        setTabPosition(initialActive);
    }

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => {
            selectTab(tab);
        });

        // Accessible Keyboard navigation for tabs (WAI-ARIA Tablist pattern)
        tab.addEventListener('keydown', (e: KeyboardEvent) => {
            let targetIndex = -1;
            if (e.key === 'ArrowRight') {
                targetIndex = (index + 1) % tabs.length;
            } else if (e.key === 'ArrowLeft') {
                targetIndex = (index - 1 + tabs.length) % tabs.length;
            } else if (e.key === 'Home') {
                targetIndex = 0;
            } else if (e.key === 'End') {
                targetIndex = tabs.length - 1;
            }

            if (targetIndex >= 0) {
                e.preventDefault();
                const targetTab = tabs[targetIndex];
                targetTab.focus();
                selectTab(targetTab);
            }
        });
    });

    window.addEventListener('resize', () => {
        const currentActive = document.querySelector<HTMLButtonElement>(
            '[data-service-tab].active-tab',
        );
        if (currentActive) setTabPosition(currentActive);
    });
}


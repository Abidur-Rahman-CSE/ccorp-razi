export function initServicesFilter(): void {
    const tabs =
        document.querySelectorAll<HTMLButtonElement>('[data-service-tab]');
    const cards = document.querySelectorAll<HTMLElement>(
        '[data-service-category]',
    );
    const indicator = document.getElementById('service-tab-indicator');

    if (tabs.length === 0 || cards.length === 0) return;

    function setTabPosition(activeTab: HTMLButtonElement) {
        if (!indicator) return;
        indicator.style.left = `${activeTab.offsetLeft}px`;
        indicator.style.width = `${activeTab.offsetWidth}px`;
    }

    // Set initial position
    const initialActive =
        document.querySelector<HTMLButtonElement>(
            '[data-service-tab].active-tab',
        ) || tabs[0];
    if (initialActive) {
        setTabPosition(initialActive);
    }

    tabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            const category = tab.getAttribute('data-service-tab');
            if (!category) return;

            tabs.forEach((t) => {
                t.classList.remove('active-tab', 'text-charcoal');
                t.classList.add('text-charcoal-muted');
            });
            tab.classList.add('active-tab', 'text-charcoal');
            tab.classList.remove('text-charcoal-muted');

            setTabPosition(tab);

            cards.forEach((card) => {
                const cardCategory =
                    card.getAttribute('data-service-category') || '';
                const shouldShow =
                    category === 'all' || cardCategory.includes(category);

                if (shouldShow) {
                    card.style.display = '';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0) scale(1)';
                    }, 50);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(12px) scale(0.98)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 250);
                }
            });
        });
    });

    window.addEventListener('resize', () => {
        const currentActive = document.querySelector<HTMLButtonElement>(
            '[data-service-tab].active-tab',
        );
        if (currentActive) setTabPosition(currentActive);
    });
}

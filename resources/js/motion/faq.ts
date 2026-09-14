export function initFaqAccordion(): void {
    const detailsElements =
        document.querySelectorAll<HTMLDetailsElement>('details.faq-item');

    detailsElements.forEach((details) => {
        const summary = details.querySelector('summary');
        const content = details.querySelector<HTMLElement>('.faq-content');
        const icon = details.querySelector<HTMLElement>('.faq-icon');

        if (!summary || !content) return;

        summary.addEventListener('click', (e) => {
            e.preventDefault();

            // If already open, animate close
            if (details.open) {
                if (icon) icon.style.transform = 'rotate(0deg)';
                content.style.maxHeight = `${content.scrollHeight}px`;
                // Force reflow
                void content.offsetHeight;
                content.style.maxHeight = '0px';
                content.style.opacity = '0';

                setTimeout(() => {
                    details.open = false;
                }, 300);
            } else {
                // Close other open faqs for an editorial, clean view
                detailsElements.forEach((other) => {
                    if (other !== details && other.open) {
                        const otherContent =
                            other.querySelector<HTMLElement>('.faq-content');
                        const otherIcon =
                            other.querySelector<HTMLElement>('.faq-icon');
                        if (otherContent) {
                            otherContent.style.maxHeight = '0px';
                            otherContent.style.opacity = '0';
                        }
                        if (otherIcon)
                            otherIcon.style.transform = 'rotate(0deg)';
                        setTimeout(() => {
                            other.open = false;
                        }, 300);
                    }
                });

                // Open this item
                details.open = true;
                if (icon) icon.style.transform = 'rotate(45deg)';
                content.style.maxHeight = '0px';
                content.style.opacity = '0';
                // Force reflow
                void content.offsetHeight;
                content.style.maxHeight = `${content.scrollHeight + 16}px`;
                content.style.opacity = '1';

                setTimeout(() => {
                    content.style.maxHeight = 'none';
                }, 320);
            }
        });
    });
}

import React, { useState, useRef, useCallback, useEffect } from 'react';

interface BeforeAfterSliderProps {
    beforeImage: string;
    afterImage: string;
    beforeLabel?: string;
    afterLabel?: string;
}

export default function BeforeAfterSlider({
    beforeImage,
    afterImage,
    beforeLabel = 'Before • Raw Concrete Shell',
    afterLabel = 'After • Finished Penthouse Sanctuary',
}: BeforeAfterSliderProps) {
    const [sliderPos, setSliderPos] = useState<number>(50);
    const [isDragging, setIsDragging] = useState<boolean>(false);
    const [hasInteracted, setHasInteracted] = useState<boolean>(false);
    const containerRef = useRef<HTMLDivElement>(null);
    const animationFrameRef = useRef<number | null>(null);

    // Auto-sweep demonstration on first viewport entrance
    useEffect(() => {
        const isReduced = window.matchMedia(
            '(prefers-reduced-motion: reduce)',
        ).matches;
        if (isReduced || hasInteracted || !containerRef.current) return;

        const observer = new IntersectionObserver(
            (entries) => {
                if (entries[0].isIntersecting && !hasInteracted) {
                    observer.disconnect();

                    // Start graceful auto-sweep
                    const startTime = performance.now();
                    const duration = 1800; // 1.8s

                    const sweep = (now: number) => {
                        const elapsed = now - startTime;
                        const progress = Math.min(1, elapsed / duration);

                        // Sine curve from 50 -> 32 -> 68 -> 50
                        // sin(progress * 2PI)
                        const offset = Math.sin(progress * Math.PI * 2) * 18;
                        setSliderPos(50 + offset);

                        if (progress < 1) {
                            animationFrameRef.current =
                                requestAnimationFrame(sweep);
                        } else {
                            setSliderPos(50);
                        }
                    };

                    // Delay slightly after entering view
                    const timer = setTimeout(() => {
                        animationFrameRef.current =
                            requestAnimationFrame(sweep);
                    }, 400);

                    return () => clearTimeout(timer);
                }
            },
            { threshold: 0.35 },
        );

        observer.observe(containerRef.current);

        return () => {
            observer.disconnect();
            if (animationFrameRef.current) {
                cancelAnimationFrame(animationFrameRef.current);
            }
        };
    }, [hasInteracted]);

    const handleMove = useCallback((clientX: number) => {
        if (!containerRef.current) return;
        setHasInteracted(true);
        if (animationFrameRef.current) {
            cancelAnimationFrame(animationFrameRef.current);
        }
        const rect = containerRef.current.getBoundingClientRect();
        const x = clientX - rect.left;
        const percentage = Math.max(0, Math.min(100, (x / rect.width) * 100));
        setSliderPos(percentage);
    }, []);

    const handleTouchMove = (e: React.TouchEvent) => {
        handleMove(e.touches[0].clientX);
    };

    const handleMouseMove = (e: React.MouseEvent) => {
        if (isDragging) {
            handleMove(e.clientX);
        }
    };

    const handleKeyDown = (e: React.KeyboardEvent) => {
        setHasInteracted(true);
        if (animationFrameRef.current) {
            cancelAnimationFrame(animationFrameRef.current);
        }
        if (e.key === 'ArrowLeft') {
            setSliderPos((prev) => Math.max(0, prev - 5));
        } else if (e.key === 'ArrowRight') {
            setSliderPos((prev) => Math.min(100, prev + 5));
        }
    };

    return (
        <div
            ref={containerRef}
            className="hairline-all relative aspect-[16/9] w-full cursor-ew-resize overflow-hidden bg-[#EFEAE2] select-none md:aspect-[21/9]"
            onMouseDown={() => {
                setHasInteracted(true);
                setIsDragging(true);
            }}
            onMouseUp={() => setIsDragging(false)}
            onMouseLeave={() => setIsDragging(false)}
            onMouseMove={handleMouseMove}
            onTouchStart={() => setHasInteracted(true)}
            onTouchMove={handleTouchMove}
            role="slider"
            aria-label="Spatial transformation comparison slider"
            aria-valuenow={Math.round(sliderPos)}
            aria-valuemin={0}
            aria-valuemax={100}
            tabIndex={0}
            onKeyDown={handleKeyDown}
        >
            {/* After Image (Full Background) */}
            <img
                src={afterImage}
                alt="After: Finished luxury interior space in Dhaka by Champion Interior Design"
                className="absolute inset-0 h-full w-full object-cover"
                loading="lazy"
            />

            {/* Before Image (Clipped) */}
            <div
                className="absolute inset-0 overflow-hidden"
                style={{
                    clipPath: `polygon(0 0, ${sliderPos}% 0, ${sliderPos}% 100%, 0 100%)`,
                }}
            >
                <img
                    src={beforeImage}
                    alt="Before: Unfinished raw concrete apartment shell before renovation"
                    className="absolute inset-0 h-full w-full object-cover"
                    loading="lazy"
                />
            </div>

            {/* Architectural Hairline Brass Slider Bar */}
            <div
                className="pointer-events-none absolute top-0 bottom-0 z-20 w-[2px] bg-[#AD8753] shadow-[0_0_20px_rgba(0,0,0,0.6)]"
                style={{ left: `${sliderPos}%` }}
            >
                {/* Handle Grip */}
                <div className="absolute top-1/2 flex h-10 w-10 -translate-x-1/2 -translate-y-1/2 items-center justify-center border border-[#AD8753] bg-[#1E211F] text-white shadow-2xl transition-transform duration-150 hover:scale-110 active:scale-95">
                    <svg
                        className="h-4 w-4 text-[#AD8753]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            strokeLinecap="square"
                            strokeLinejoin="miter"
                            strokeWidth="2"
                            d="M8 7l-5 5 5 5M16 7l5 5-5 5"
                        />
                    </svg>
                </div>
            </div>

            {/* Status Badges */}
            <div className="pointer-events-none absolute bottom-4 left-4 z-10">
                <span className="glass-pill px-3 py-1.5 text-[10px] font-semibold tracking-[0.16em] text-[#1E211F] uppercase backdrop-blur-md">
                    {beforeLabel}
                </span>
            </div>
            <div className="pointer-events-none absolute right-4 bottom-4 z-10">
                <span className="glass-pill px-3 py-1.5 text-[10px] font-semibold tracking-[0.16em] text-[#1E211F] uppercase backdrop-blur-md">
                    {afterLabel}
                </span>
            </div>
        </div>
    );
}

import type { ImgHTMLAttributes } from 'react';

export default function AppLogoIcon({ className, ...props }: ImgHTMLAttributes<HTMLImageElement>) {
    return (
        <>
            <img
                src="/images/brand/champion-favicon-black.svg"
                alt="Champion Logo"
                className={`dark:hidden object-contain ${className ?? ''}`}
                {...props}
            />
            <img
                src="/images/brand/champion-favicon-white.svg"
                alt="Champion Logo"
                className={`hidden dark:block object-contain ${className ?? ''}`}
                {...props}
            />
        </>
    );
}

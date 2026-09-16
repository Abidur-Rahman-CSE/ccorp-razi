<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- SEO Title & Meta Description --}}
    <title>{{ $title ?? 'Champion Interior Design | Warm Architectural Luxury & Turnkey Execution Dhaka' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Champion Interior Design delivers bespoke turnkey interior design, architecture, renovation, and spatial execution for luxury residential and commercial spaces across Dhaka, Bangladesh.' }}">
    <link rel="canonical" href="{{ $canonicalUrl ?? url()->current() }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ $canonicalUrl ?? url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'Champion Interior Design | Dhaka' }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Turnkey residential and commercial interior design and execution in Dhaka, Bangladesh.' }}">
    <meta property="og:image" content="{{ $metaImage ?? asset('images/showcase/hero_penthouse_dhaka.jpg') }}">
    <meta property="og:site_name" content="Champion Interior Design">
    <meta property="og:locale" content="en_US">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Champion Interior Design | Dhaka' }}">
    <meta name="twitter:description" content="{{ $metaDescription ?? 'Turnkey residential and commercial interior design and execution in Dhaka, Bangladesh.' }}">
    <meta name="twitter:image" content="{{ $metaImage ?? asset('images/showcase/hero_penthouse_dhaka.jpg') }}">

    {{-- GEO & Local Engine Discoverability --}}
    <meta name="geo.region" content="BD-13">
    <meta name="geo.placename" content="Dhaka">
    <meta name="geo.position" content="23.7925;90.4078">
    <meta name="ICBM" content="23.7925, 90.4078">

    {{-- Favicons --}}
    <link rel="icon" href="{{ asset('images/brand/champion-favicon-black.svg') }}" type="image/svg+xml" media="(prefers-color-scheme: light)">
    <link rel="icon" href="{{ asset('images/brand/champion-favicon-white.svg') }}" type="image/svg+xml" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="{{ asset('images/brand/champion-favicon-black.ico') }}" sizes="any">
    <link rel="shortcut icon" href="{{ asset('images/brand/champion-favicon-black.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    {{-- Font Preconnect & Stylesheets --}}
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,500,600,700|plus-jakarta-sans:300,400,500,600,700" rel="stylesheet" />

    {{-- Critical Assets & Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.tsx'])

    {{-- JSON-LD Structured Data Component --}}
    <x-json-ld 
        :title="$title ?? null"
        :description="$metaDescription ?? null"
        :image="$metaImage ?? null"
        :url="$canonicalUrl ?? null"
        :breadcrumbs="$breadcrumbs ?? []"
        :faqs="$faqs ?? []"
    />

    {{-- Optional Head Slots for LCP Image Preloads --}}
    {{ $head ?? '' }}
</head>
<body class="bg-[#F7F5F0] text-[#1E211F] font-sans antialiased selection:bg-[#AD8753] selection:text-white min-h-screen flex flex-col">

    {{-- Accessible Skip Link --}}
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:bg-[#1E211F] focus:text-[#F7F5F0] focus:px-5 focus:py-3 focus:font-medium focus:shadow-xl focus:outline-none">
        Skip to main content
    </a>

    {{-- Navigation Header --}}
    <x-navigation />

    {{-- Main Landmark --}}
    <main id="main-content" class="grow pt-[72px] lg:pt-[108px]">
        {{ $slot }}
    </main>

    {{-- Architectural Footer --}}
    <x-footer />

    {{-- Vanilla Accessible Script for Header & Mobile Navigation --}}
    <script>
        (function() {
            // Header scroll elevation
            const header = document.getElementById('site-header');
            const nav = header ? header.querySelector('nav') : null;
            
            function handleScroll() {
                if (!nav) return;
                if (window.scrollY > 40) {
                    nav.classList.add('shadow-[0_10px_30px_-10px_rgba(30,33,31,0.06)]');
                    nav.style.background = 'rgba(247, 245, 240, 0.94)';
                } else {
                    nav.classList.remove('shadow-[0_10px_30px_-10px_rgba(30,33,31,0.06)]');
                    nav.style.background = 'rgba(247, 245, 240, 0.88)';
                }
            }
            window.addEventListener('scroll', handleScroll, { passive: true });

            // Mobile menu toggle
            const menuBtn = document.getElementById('mobile-menu-btn');
            const drawer = document.getElementById('mobile-drawer');

            if (menuBtn && drawer) {
                menuBtn.addEventListener('click', function() {
                    const isExpanded = menuBtn.getAttribute('aria-expanded') === 'true';
                    menuBtn.setAttribute('aria-expanded', !isExpanded);
                    drawer.setAttribute('aria-hidden', isExpanded);
                    
                    if (!isExpanded) {
                        drawer.classList.remove('translate-x-full');
                        document.body.style.overflow = 'hidden';
                    } else {
                        drawer.classList.add('translate-x-full');
                        document.body.style.overflow = '';
                    }
                });

                // Close drawer on internal link click
                drawer.querySelectorAll('a').forEach(function(link) {
                    link.addEventListener('click', function() {
                        menuBtn.setAttribute('aria-expanded', 'false');
                        drawer.setAttribute('aria-hidden', 'true');
                        drawer.classList.add('translate-x-full');
                        document.body.style.overflow = '';
                    });
                });
            }
        })();
    </script>
</body>
</html>

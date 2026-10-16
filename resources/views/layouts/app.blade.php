<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>{{ $seo->title ?? 'DC Equipment | Construction Equipment Spares & DCP Chemicals Jaipur' }}</title>
    <meta name="description" content="{{ $seo->description ?? 'Dulichand Construction Equipment (DC Equipment) in Jaipur, Rajasthan: Batching plants, concrete pumps, transit mixer drums, and authorized DCP construction chemicals.' }}">
    <meta name="keywords" content="{{ $seo->keywords ?? 'construction equipment spares jaipur, dcp construction chemicals rajasthan, batching plant parts ajmer road' }}">
    <link rel="canonical" href="{{ $seo->canonical_url ?? url()->current() }}">

    <!-- Open Graph / Social Sharing -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $seo->canonical_url ?? url()->current() }}">
    <meta property="og:title" content="{{ $seo->og_title ?? $seo->title ?? 'DC Equipment - Construction Machinery & Chemicals' }}">
    <meta property="og:description" content="{{ $seo->og_description ?? $seo->description ?? 'Premier supplier of construction equipment spares and DCP chemicals in Rajasthan.' }}">
    <meta property="og:image" content="{{ asset('images/logo.svg') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}">

    <!-- Google Fonts (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles & Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Schema.org LocalBusiness JSON-LD Local SEO -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => 'DC Equipment (Dulichand Construction Equipment)',
        'alternateName' => 'DC Construction Equipment Jaipur',
        'image' => asset('images/logo.svg'),
        'url' => url('/'),
        'telephone' => '+91-86969-62600',
        'email' => 'info@dcequipment.in',
        'priceRange' => '$$',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Upasana 1st Avenue, Ajmer Road',
            'addressLocality' => 'Jaipur',
            'addressRegion' => 'Rajasthan',
            'postalCode' => '302006',
            'addressCountry' => 'IN'
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => 26.8848777,
            'longitude' => 75.7629631
        ],
        'foundingDate' => '2016',
        'founder' => [
            '@type' => 'Person',
            'name' => 'Jitender Singh'
        ],
        'areaServed' => [
            ['@type' => 'AdministrativeArea', 'name' => 'Rajasthan'],
            ['@type' => 'City', 'name' => 'Jaipur'],
            ['@type' => 'Country', 'name' => 'India']
        ],
        'openingHoursSpecification' => [
            [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                'opens' => '09:00',
                'closes' => '19:00'
            ]
        ],
        'sameAs' => [
            'https://www.dcequipment.in'
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased flex flex-col min-h-screen selection:bg-amber-500 selection:text-white" x-data="{ mobileMenuOpen: false }">

    <!-- Top Corporate Info Bar -->
    <div class="bg-slate-900 text-slate-300 text-xs border-b border-slate-800">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12 py-2.5 flex flex-wrap justify-between items-center gap-3">
            <div class="flex items-center space-x-6 flex-wrap">
                <span class="flex items-center space-x-1.5 text-amber-400 font-medium">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>Upasana 1st Avenue, Ajmer Road, Jaipur</span>
                </span>
                <span class="hidden md:inline-flex items-center space-x-1.5 text-slate-400">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Mon - Sat: 9:00 AM - 7:00 PM</span>
                </span>
                <span class="hidden lg:inline-flex items-center space-x-1 px-2 py-0.5 rounded bg-amber-500/10 text-amber-400 font-semibold text-[11px] border border-amber-500/20">
                    <span>DCP Authorized Dealership • Rajasthan</span>
                </span>
            </div>

            <div class="flex items-center space-x-5">
                <a href="tel:+918696962600" class="flex items-center space-x-1 text-slate-200 hover:text-amber-400 transition font-medium">
                    <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.02-.24c1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                    <span>+91 86969 62600</span>
                </a>
                <span class="text-slate-700">|</span>
                <a href="mailto:info@dcequipment.in" class="flex items-center space-x-1 text-slate-200 hover:text-amber-400 transition">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>info@dcequipment.in</span>
                </a>
                <span class="text-slate-700">|</span>
                <a href="{{ url('/admin') }}" class="text-xs text-slate-400 hover:text-white transition flex items-center space-x-1 font-mono">
                    <svg class="w-3 h-3 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    <span>Admin</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-xs transition duration-200">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="flex justify-between items-center h-20">
                <!-- Brand Logo Component -->
                <a href="{{ route('home') }}" class="group py-2 flex items-center">
                    <x-logo variant="light" height="h-11 sm:h-12" />
                </a>

                <!-- Desktop Navigation Menu -->
                <nav class="hidden lg:flex items-center space-x-1 xl:space-x-2 font-medium text-sm text-slate-700">
                    <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50/80 font-semibold' : 'hover:text-blue-600 hover:bg-slate-100/60' }}">
                        Home
                    </a>
                    <a href="{{ route('about') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('about') ? 'text-blue-600 bg-blue-50/80 font-semibold' : 'hover:text-blue-600 hover:bg-slate-100/60' }}">
                        About Us
                    </a>
                    <a href="{{ route('products') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('products*') ? 'text-blue-600 bg-blue-50/80 font-semibold' : 'hover:text-blue-600 hover:bg-slate-100/60' }}">
                        Equipment Spares
                    </a>
                    <a href="{{ route('chemicals') }}" class="px-3 py-2 rounded-lg transition relative {{ request()->routeIs('chemicals*') ? 'text-blue-600 bg-blue-50/80 font-semibold' : 'hover:text-blue-600 hover:bg-slate-100/60' }}">
                        <span>DCP Chemicals</span>
                        <span class="ml-1 inline-flex items-center px-1.5 py-0.2 rounded text-[10px] font-bold bg-amber-100 text-amber-800">DCP</span>
                    </a>
                    <a href="{{ route('services') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('services*') ? 'text-blue-600 bg-blue-50/80 font-semibold' : 'hover:text-blue-600 hover:bg-slate-100/60' }}">
                        Services & Workshop
                    </a>
                    <a href="{{ route('projects') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('projects') ? 'text-blue-600 bg-blue-50/80 font-semibold' : 'hover:text-blue-600 hover:bg-slate-100/60' }}">
                        Clients & Projects
                    </a>
                    <a href="{{ route('contact') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('contact') ? 'text-blue-600 bg-blue-50/80 font-semibold' : 'hover:text-blue-600 hover:bg-slate-100/60' }}">
                        Contact
                    </a>
                </nav>

                <!-- Header Actions -->
                <div class="hidden sm:flex items-center space-x-3">
                    <a href="{{ route('contact') }}#quote-form" class="inline-flex items-center px-4 py-2.5 rounded-lg text-sm font-bold bg-gradient-to-r from-blue-700 to-blue-600 text-white shadow-md hover:from-blue-800 hover:to-blue-700 hover:shadow-lg transition-all transform active:scale-95">
                        <svg class="w-4 h-4 mr-2 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        <span>Request a Quote</span>
                    </a>
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="lg:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="p-2 rounded-lg text-slate-700 hover:text-blue-600 hover:bg-slate-100 focus:outline-hidden" aria-label="Toggle menu">
                        <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileMenuOpen" x-cloak @click.away="mobileMenuOpen = false" class="lg:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 space-y-2 shadow-xl">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg font-medium {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">Home</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-lg font-medium {{ request()->routeIs('about') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">About Us</a>
            <a href="{{ route('products') }}" class="block px-3 py-2 rounded-lg font-medium {{ request()->routeIs('products*') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">Equipment Spares</a>
            <a href="{{ route('chemicals') }}" class="block px-3 py-2 rounded-lg font-medium {{ request()->routeIs('chemicals*') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                DCP Construction Chemicals <span class="ml-1 px-1.5 py-0.5 rounded text-[10px] bg-amber-100 text-amber-800 font-bold">Dealership</span>
            </a>
            <a href="{{ route('services') }}" class="block px-3 py-2 rounded-lg font-medium {{ request()->routeIs('services*') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">Services & Workshop</a>
            <a href="{{ route('projects') }}" class="block px-3 py-2 rounded-lg font-medium {{ request()->routeIs('projects') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">Clients & Projects</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-lg font-medium {{ request()->routeIs('contact') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">Contact & Jaipur HQ</a>
            
            <div class="pt-4 border-t border-slate-100 flex flex-col space-y-2">
                <a href="{{ route('contact') }}#quote-form" class="w-full text-center py-3 rounded-lg font-bold bg-blue-700 text-white shadow-md">
                    Request an Instant Quote
                </a>
                <a href="tel:+918696962600" class="w-full text-center py-2.5 rounded-lg font-semibold bg-amber-500/10 text-amber-900 border border-amber-500/30">
                    Call: +91 86969 62600
                </a>
            </div>
        </div>
    </header>

    <!-- Global Flash Notification -->
    @if(session('success'))
        <div class="bg-emerald-600 text-white py-3 px-4 shadow-md sticky top-20 z-40" x-data="{ show: true }" x-show="show">
            <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between">
                <div class="flex items-center space-x-2 text-sm font-medium">
                    <svg class="w-5 h-5 text-emerald-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
                <button @click="show = false" class="text-emerald-100 hover:text-white">&times;</button>
            </div>
        </div>
    @endif

    <!-- Main Content Area -->
    <main class="grow">
        {{ $slot }}
    </main>

    <!-- Corporate Industrial Footer -->
    <footer class="bg-slate-950 text-slate-400 pt-16 pb-12 border-t border-slate-900">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-900">
                <!-- Col 1: Brand & Heritage -->
                <div class="lg:col-span-2 space-y-4">
                    <a href="{{ route('home') }}" class="inline-block">
                        <x-logo variant="dark" height="h-12" />
                    </a>
                    <p class="text-sm leading-relaxed text-slate-400 pr-4">
                        Established in 2016 in Jaipur, Dulichand Construction Equipment (DC Equipment) is Rajasthan's leading distributor and engineering partner for heavy concrete machinery spares, transit mixer rebuilds, and high-performance DCP construction chemical solutions.
                    </p>
                    <div class="pt-2 flex items-center space-x-3 text-xs font-medium text-slate-300">
                        <span class="px-2.5 py-1 rounded bg-slate-900 border border-slate-800 text-amber-400">
                            Director: Jitender Singh
                        </span>
                        <span class="px-2.5 py-1 rounded bg-slate-900 border border-slate-800 text-blue-400">
                            Estd. 2016
                        </span>
                    </div>
                </div>

                <!-- Col 2: Equipment Divisions -->
                <div class="space-y-3">
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider">Equipment Spares</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('products', ['category' => 'batching-plants']) }}" class="hover:text-amber-400 transition">Batching Plant Parts</a></li>
                        <li><a href="{{ route('products', ['category' => 'concrete-pumps']) }}" class="hover:text-amber-400 transition">Concrete Pump Spares</a></li>
                        <li><a href="{{ route('products', ['category' => 'boom-pumps']) }}" class="hover:text-amber-400 transition">Boom Placing Spares</a></li>
                        <li><a href="{{ route('products', ['category' => 'transit-mixers']) }}" class="hover:text-amber-400 transition">Transit Mixer Rebuilds</a></li>
                        <li><a href="{{ route('products', ['category' => 'hydraulic-systems']) }}" class="hover:text-amber-400 transition">Hydraulic Pump Systems</a></li>
                    </ul>
                </div>

                <!-- Col 3: DCP Chemicals Portfolio -->
                <div class="space-y-3">
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider">DCP Chemicals</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('chemicals', ['category' => 'hyperplasticisers-pce']) }}" class="hover:text-amber-400 transition">PCE Hyperplasticisers</a></li>
                        <li><a href="{{ route('chemicals', ['category' => 'waterproofing']) }}" class="hover:text-amber-400 transition">PU Waterproofing</a></li>
                        <li><a href="{{ route('chemicals', ['category' => 'grouts-anchors']) }}" class="hover:text-amber-400 transition">Non-Shrink Grouts</a></li>
                        <li><a href="{{ route('chemicals', ['category' => 'flooring-systems']) }}" class="hover:text-amber-400 transition">Floor Hardeners</a></li>
                        <li><a href="{{ route('chemicals', ['category' => 'sealants-adhesives']) }}" class="hover:text-amber-400 transition">Joint Sealants</a></li>
                    </ul>
                </div>

                <!-- Col 4: Jaipur HQ Contact -->
                <div class="space-y-3">
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider">Jaipur HQ & Hub</h4>
                    <div class="space-y-2.5 text-sm">
                        <div class="flex items-start space-x-2.5">
                            <svg class="w-4 h-4 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>Upasana 1st Avenue, Ajmer Road, Jaipur, Rajasthan - 302006</span>
                        </div>
                        <div class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-amber-500 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.02-.24c1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                            <a href="tel:+918696962600" class="hover:text-amber-400 font-semibold text-slate-200">+91 86969 62600</a>
                        </div>
                        <div class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <a href="mailto:info@dcequipment.in" class="hover:text-amber-400 text-slate-300">info@dcequipment.in</a>
                        </div>
                        <div class="pt-2">
                            <span class="inline-block text-[11px] px-2 py-0.5 rounded bg-emerald-950 text-emerald-400 border border-emerald-800 font-mono">
                                • 24/7 Site Emergency Hotline
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-slate-500 gap-4">
                <p>&copy; {{ date('Y') }} Dulichand Construction Equipment (DC Equipment). All Rights Reserved. Jaipur, Rajasthan, India.</p>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('about') }}" class="hover:text-slate-300">About DC Equipment</a>
                    <a href="{{ route('services') }}" class="hover:text-slate-300">Workshop Facilities</a>
                    <a href="{{ route('contact') }}" class="hover:text-slate-300">Ajmer Road Location</a>
                    <a href="{{ url('/admin') }}" class="hover:text-amber-400 flex items-center space-x-1">
                        <span>Staff Login</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>

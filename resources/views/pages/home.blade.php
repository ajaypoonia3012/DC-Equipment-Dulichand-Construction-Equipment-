<x-app-layout>
    <!-- Hero Section -->
    <section class="relative bg-slate-950 text-white overflow-hidden border-b border-slate-900 industrial-grid-dark">
        <!-- Radial Glow Gradients -->
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-10 w-80 h-80 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12 py-20 lg:py-28 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left Hero Copy -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center space-x-2 px-3 py-1.5 rounded-full bg-slate-900/90 border border-slate-800 text-xs font-semibold text-slate-300">
                        <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                        <span class="text-amber-400">Jaipur, Rajasthan • Established 2016</span>
                        <span class="text-slate-600">|</span>
                        <span>DCP Authorized Dealership</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-tight">
                        Powering Rajasthan’s <br class="hidden sm:inline">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-sky-300 to-amber-300">Heavy Construction</span> & Infrastructure.
                    </h1>

                    <p class="text-base sm:text-lg text-slate-300 leading-relaxed max-w-2xl">
                        Dulichand Construction Equipment (<span class="font-bold text-white">DC Equipment</span>) provides high-wear concrete machinery replacement spares, mobile transit mixer rebuilds, and high-performance <span class="font-bold text-amber-400">DCP Construction Chemicals</span>. Trusted by MEIL, JK Lakshmi Cement, KEC, and infrastructure builders across North India.
                    </p>

                    <!-- CTAs -->
                    <div class="pt-2 flex flex-wrap gap-4">
                        <a href="{{ route('products') }}" class="px-6 py-3.5 rounded-xl font-bold text-white bg-blue-600 hover:bg-blue-500 shadow-lg shadow-blue-600/30 hover:shadow-blue-500/50 transition transform hover:-translate-y-0.5 flex items-center space-x-2">
                            <span>Browse Equipment Spares</span>
                            <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="{{ route('chemicals') }}" class="px-6 py-3.5 rounded-xl font-bold text-slate-200 bg-slate-900/90 border border-slate-700 hover:border-amber-400/60 hover:text-white transition flex items-center space-x-2">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <span>DCP Chemical Portfolio</span>
                        </a>
                        <a href="#quote-form" class="px-6 py-3.5 rounded-xl font-bold text-slate-950 bg-amber-400 hover:bg-amber-300 shadow-md transition transform hover:-translate-y-0.5">
                            Request Instant Quote
                        </a>
                    </div>

                    <!-- Trust Indicators & Verification -->
                    <div class="pt-6 border-t border-slate-900 grid grid-cols-2 sm:grid-cols-4 gap-4 text-left">
                        <div>
                            <div class="text-2xl sm:text-3xl font-extrabold text-white">2016</div>
                            <div class="text-xs text-slate-400 font-medium">Year Established</div>
                        </div>
                        <div>
                            <div class="text-2xl sm:text-3xl font-extrabold text-amber-400">1,500+</div>
                            <div class="text-xs text-slate-400 font-medium">OEM Parts in Jaipur</div>
                        </div>
                        <div>
                            <div class="text-2xl sm:text-3xl font-extrabold text-blue-400">250+</div>
                            <div class="text-xs text-slate-400 font-medium">Major Clients</div>
                        </div>
                        <div>
                            <div class="text-2xl sm:text-3xl font-extrabold text-emerald-400">24/7</div>
                            <div class="text-xs text-slate-400 font-medium">Breakdown Support</div>
                        </div>
                    </div>
                </div>

                <!-- Right Quick Spec Card & Interactive Quote Component -->
                <div class="lg:col-span-5">
                    <x-quote-form 
                        title="Direct Engineering Inquiry"
                        subtitle="Connect with Director Jitender Singh & technical team at our Jaipur office."
                        defaultType="equipment" 
                    />
                </div>

            </div>
        </div>
    </section>

    <!-- Two Flagship Divisions Showcase -->
    <section class="py-16 bg-slate-100/70 border-b border-slate-200">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-xs font-extrabold text-blue-700 tracking-wider uppercase bg-blue-50 px-3 py-1 rounded-full border border-blue-200">
                    Integrated Solutions Under One Roof
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-2">
                    Two Specialized Core Engineering Pillars
                </h2>
                <p class="text-slate-600 mt-3 text-base">
                    From high-wear mechanical machinery parts to advanced polycarboxylate chemical admixtures, we ensure zero downtime and peak concrete strength.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Pillar 1: Equipment Machinery & Spares -->
                <div class="bg-white rounded-2xl p-8 border border-slate-200 shadow-md hover:shadow-xl transition-all relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-bl-full -mr-8 -mt-8 transition group-hover:scale-110"></div>
                    <div class="w-14 h-14 rounded-xl bg-blue-900 text-white flex items-center justify-center mb-6 shadow-md shadow-blue-900/20">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <div class="inline-block px-2.5 py-0.5 rounded text-xs font-bold bg-blue-100 text-blue-800 mb-2">Division I</div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-3">Concrete Equipment & Wear Spares</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">
                        Complete stock of high-wear parts for batching plants (Sicoma, BHS, Stetter), concrete pumps (Putzmeister, Schwing), transit mixer drums, and high-pressure hydraulic components.
                    </p>
                    <ul class="space-y-2 text-sm text-slate-700 mb-6 font-medium">
                        <li class="flex items-center space-x-2">
                            <span class="text-blue-600 font-bold">✓</span>
                            <span>Ni-Hard & High-Cr batching plant mixing blades</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="text-blue-600 font-bold">✓</span>
                            <span>Tungsten carbide spectacle wear plates & cutting rings</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="text-blue-600 font-bold">✓</span>
                            <span>Hardox 400 transit mixer spiral blades & replacement shells</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="text-blue-600 font-bold">✓</span>
                            <span>Rexroth & Sauer Danfoss axial piston hydraulic pumps</span>
                        </li>
                    </ul>
                    <a href="{{ route('products') }}" class="inline-flex items-center font-bold text-blue-700 hover:text-blue-900 text-sm">
                        <span>Browse 500+ Equipment Spares</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

                <!-- Pillar 2: DCP Construction Chemicals -->
                <div class="bg-white rounded-2xl p-8 border border-slate-200 shadow-md hover:shadow-xl transition-all relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-amber-50 rounded-bl-full -mr-8 -mt-8 transition group-hover:scale-110"></div>
                    <div class="w-14 h-14 rounded-xl bg-amber-500 text-slate-950 flex items-center justify-center mb-6 shadow-md shadow-amber-500/20 font-black text-xl">
                        DCP
                    </div>
                    <div class="inline-block px-2.5 py-0.5 rounded text-xs font-bold bg-amber-100 text-amber-800 mb-2">Division II • Dealership</div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-3">DCP High-Performance Construction Chemicals</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">
                        Authorized Rajasthan distribution for Don Construction Products (DCP). Specialized concrete admixtures engineered for extreme Rajasthan temperature resistance and ultra-high slump retention.
                    </p>
                    <ul class="space-y-2 text-sm text-slate-700 mb-6 font-medium">
                        <li class="flex items-center space-x-2">
                            <span class="text-amber-600 font-bold">✓</span>
                            <span>PCE Hyperplasticisers (Structuro 335 & 450)</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="text-amber-600 font-bold">✓</span>
                            <span>Aquathane pure polyurethane waterproofing membranes</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="text-amber-600 font-bold">✓</span>
                            <span>Quickmast high-strength precision non-shrink grouts</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="text-amber-600 font-bold">✓</span>
                            <span>Heavy-duty dry shake metallic and non-metallic floor hardeners</span>
                        </li>
                    </ul>
                    <a href="{{ route('chemicals') }}" class="inline-flex items-center font-bold text-amber-700 hover:text-amber-900 text-sm">
                        <span>Explore DCP Chemicals Portfolio</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products Showcase -->
    <section class="py-20 bg-white">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
                <div>
                    <span class="text-xs font-extrabold text-blue-700 tracking-wider uppercase">In Stock at Jaipur Facility</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Featured Equipment Machinery Spares</h2>
                    <p class="text-slate-600 text-sm mt-2">Precision engineered components ready for direct site delivery across Rajasthan.</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="{{ route('products') }}" class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-bold text-blue-700 bg-blue-50 hover:bg-blue-100 transition">
                        <span>View All Machinery Spares</span>
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredEquipment as $product)
                    @php
                        $prodImg = $product->image 
                            ? (str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image))
                            : 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=600&q=80';
                    @endphp
                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                        <a href="{{ route('products.detail', $product->slug) }}" class="h-44 w-full overflow-hidden bg-slate-900 block relative">
                            <img src="{{ $prodImg }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" loading="lazy" />
                            <div class="absolute top-3 left-3">
                                <span class="px-2.5 py-1 rounded text-[11px] font-bold bg-slate-900/80 backdrop-blur-xs text-white uppercase tracking-wider">
                                    {{ $product->category->name }}
                                </span>
                            </div>
                        </a>

                        <div class="p-6">
                            <div class="flex items-center justify-between gap-2 mb-2">
                                @if($product->sku)
                                    <span class="font-mono text-xs text-blue-700 font-semibold">{{ $product->sku }}</span>
                                @else
                                    <span></span>
                                @endif
                                <span class="text-xs text-emerald-600 font-bold flex items-center">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1 animate-pulse"></span>
                                    In Stock
                                </span>
                            </div>

                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition mb-2">
                                <a href="{{ route('products.detail', $product->slug) }}">
                                    {{ $product->name }}
                                </a>
                            </h3>

                            <p class="text-slate-600 text-xs leading-relaxed mb-4 line-clamp-3">
                                {{ $product->short_description }}
                            </p>

                            @if(!empty($product->specifications))
                                <div class="bg-slate-50 rounded-lg p-3 text-xs space-y-1.5 border border-slate-100 mb-4">
                                    @foreach(array_slice($product->specifications, 0, 3) as $specKey => $specVal)
                                        <div class="flex justify-between items-center text-slate-600">
                                            <span class="font-semibold text-slate-500">{{ $specKey }}:</span>
                                            <span class="text-slate-900 font-mono">{{ $specVal }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="p-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-bold text-amber-700">{{ $product->brand ?: 'DC Equipment OEM' }}</span>
                            <a href="{{ route('products.detail', $product->slug) }}" class="inline-flex items-center text-xs font-bold text-blue-700 hover:text-blue-900">
                                <span>Technical Specs</span>
                                <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Specialized Field & Workshop Services -->
    <section class="py-20 bg-slate-900 text-white relative">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-extrabold text-amber-400 tracking-wider uppercase bg-amber-500/10 px-3 py-1 rounded-full border border-amber-500/20">
                    Jaipur Engineering Bays & Mobile Service Vans
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2">
                    Turnkey Workshop Services & Breakdown Support
                </h2>
                <p class="text-slate-400 mt-3 text-sm sm:text-base">
                    From submerged arc drum re-lining to complete hydraulic valve block rebuilds, our certified technicians keep your fleet operating at peak efficiency.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    @php
                        $srvImg = $service->image 
                            ? (str_starts_with($service->image, 'http') ? $service->image : asset('storage/' . $service->image))
                            : 'https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=600&q=80';
                    @endphp
                    <div class="bg-slate-800/80 rounded-2xl overflow-hidden border border-slate-700 hover:border-amber-400/50 transition-all duration-300 flex flex-col justify-between group">
                        <a href="{{ route('services.detail', $service->slug) }}" class="h-44 w-full overflow-hidden bg-slate-900 block relative">
                            <img src="{{ $srvImg }}" alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" loading="lazy" />
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
                        </a>

                        <div class="p-6 grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-white group-hover:text-amber-400 transition mb-2">
                                    <a href="{{ route('services.detail', $service->slug) }}">
                                        {{ $service->title }}
                                    </a>
                                </h3>

                                <p class="text-slate-400 text-xs leading-relaxed mb-4">
                                    {{ $service->short_description }}
                                </p>

                                @if(!empty($service->features))
                                    <ul class="space-y-1.5 text-xs text-slate-300 mb-6">
                                        @foreach(array_slice($service->features, 0, 3) as $feature)
                                            <li class="flex items-start space-x-1.5">
                                                 <span class="text-amber-400 mt-0.5">•</span>
                                                 <span>{{ $feature }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            <div class="pt-4 border-t border-slate-700/60 flex items-center justify-between">
                                <span class="text-xs text-slate-400">Jaipur Hub & Field Mobile</span>
                                <a href="{{ route('services.detail', $service->slug) }}" class="text-xs font-bold text-amber-400 hover:text-amber-300 inline-flex items-center">
                                    <span>Service Scope</span>
                                    <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Client References & Enterprise Trust -->
    <section class="py-20 bg-slate-50 border-b border-slate-200">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs font-extrabold text-blue-700 tracking-wider uppercase bg-blue-100/70 px-3 py-1 rounded-full">
                    Marquee Partnerships Across India
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-2">
                    Trusted by Major Infrastructure & Cement Giants
                </h2>
                <p class="text-slate-600 mt-2 text-sm sm:text-base">
                    From the Delhi-Mumbai Expressway to Rajasthan Water Grid corridors, DC Equipment delivers mission-critical spares and chemicals.
                </p>
            </div>

            <!-- Client Logos Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-4 xl:grid-cols-8 gap-4 mb-16">
                @foreach($clients as $client)
                    <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-xs flex flex-col justify-center items-center text-center hover:border-blue-400 transition group min-h-[110px]">
                        @if($client->logo)
                            <div class="h-10 w-full flex items-center justify-center mb-2">
                                <img src="{{ str_starts_with($client->logo, 'http') ? $client->logo : asset('storage/' . $client->logo) }}" alt="{{ $client->client_name }}" class="max-h-9 max-w-full object-contain" />
                            </div>
                        @else
                            <div class="w-10 h-10 rounded-full bg-slate-100 text-slate-800 font-black text-sm flex items-center justify-center mb-2 group-hover:bg-blue-600 group-hover:text-white transition">
                                {{ substr($client->client_name, 0, 2) }}
                            </div>
                        @endif
                        <h4 class="font-extrabold text-slate-900 text-xs tracking-tight">{{ $client->client_name }}</h4>
                        <span class="text-[10px] text-slate-500 mt-0.5 font-medium">{{ $client->sector }}</span>
                    </div>
                @endforeach
            </div>

            <!-- Client Testimonials -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($clients->whereNotNull('testimonial')->take(2) as $clientTestimonial)
                    <div class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm relative">
                        <svg class="w-10 h-10 text-blue-100 absolute top-6 right-6" fill="currentColor" viewBox="0 0 32 32"><path d="M10 8c-3.3 0-6 2.7-6 6v10h10V14H6c0-2.2 1.8-4 4-4V8zm14 0c-3.3 0-6 2.7-6 6v10h10V14h-8c0-2.2 1.8-4 4-4V8z"/></svg>
                        <p class="text-slate-700 italic text-sm leading-relaxed mb-6 relative z-10">
                            "{{ $clientTestimonial->testimonial }}"
                        </p>
                        <div class="flex items-center space-x-3 border-t border-slate-100 pt-4">
                            <div class="w-10 h-10 rounded-full bg-blue-900 text-white font-bold flex items-center justify-center text-xs">
                                {{ substr($clientTestimonial->client_name, 0, 1) }}
                            </div>
                            <div>
                                <h5 class="font-bold text-slate-900 text-sm">{{ $clientTestimonial->testimonial_author }}</h5>
                                <p class="text-xs text-amber-700 font-semibold">{{ $clientTestimonial->client_name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose DC Equipment & Jaipur Advantage -->
    <section class="py-20 bg-white">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-xs font-extrabold text-blue-700 tracking-wider uppercase">Strategic Regional Advantage</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-2 mb-6">
                        Why India's Infrastructure Builders Depend on DC Equipment
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center shrink-0 font-bold">
                                01
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-base">Direct Ajmer Road Jaipur Warehouse</h4>
                                <p class="text-slate-600 text-sm mt-1">
                                    Centrally situated on Ajmer Road with immediate transit connectivity to NH-48, DMIC freight corridor, and all Rajasthan regional hubs.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-lg bg-amber-100 text-amber-800 flex items-center justify-center shrink-0 font-bold">
                                02
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-base">Direct DCP Construction Chemical Dealership</h4>
                                <p class="text-slate-600 text-sm mt-1">
                                    Factory-fresh drum and bulk IBC supplies of third-generation PCE hyperplasticisers, waterproofing coatings, and non-shrink precision grouts.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center shrink-0 font-bold">
                                03
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-base">Heavy Machine Rebuild Bays & Submerged Arc Welding</h4>
                                <p class="text-slate-600 text-sm mt-1">
                                    In-house heavy lathe roller balancing, Hardox spiral blade cutting, and certified overhaul facilities for transit mixers and rock valves.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-lg bg-amber-100 text-amber-800 flex items-center justify-center shrink-0 font-bold">
                                04
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-base">Personalized Leadership & Engineering Guidance</h4>
                                <p class="text-slate-600 text-sm mt-1">
                                    Direct oversight by Director Jitender Singh ensures rapid quotation turnaround, fair commercial terms, and accountable after-sales service.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Contact & Map Preview -->
                <div class="bg-slate-900 text-white rounded-2xl p-8 border border-slate-800 relative overflow-hidden shadow-xl">
                    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <div>
                            <span class="text-amber-400 text-xs font-bold uppercase tracking-wider">Corporate Headquarters</span>
                            <h3 class="text-2xl font-black text-white mt-1">Visit Our Jaipur Facility</h3>
                            <a href="https://maps.google.com/?q=Upasana+1st+Avenue,+Ajmer+Road,+Sodala,+Jaipur,+Rajasthan+302006" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-amber-400 text-xs mt-1 block transition">
                                Upasana 1st Avenue, Ajmer Road, Jaipur, Rajasthan
                            </a>
                        </div>
                        <a href="https://maps.google.com/?q=Upasana+1st+Avenue,+Ajmer+Road,+Sodala,+Jaipur,+Rajasthan+302006" target="_blank" rel="noopener noreferrer" class="inline-flex items-center px-3.5 py-2 rounded-lg text-xs font-bold bg-amber-400 text-slate-950 hover:bg-amber-300 shadow-sm transition shrink-0 self-start sm:self-auto">
                            <span>Open in Maps</span>
                            <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>

                    <div class="rounded-xl overflow-hidden border border-slate-700 h-64 mb-6">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3558.4239824619!2d75.76018!3d26.88934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db4530263c915%3A0xc023c02d1a3c77eb!2sUpasana%201st%20Avenue%2C%20Ajmer%20Rd%2C%20Sodala%2C%20Jaipur%2C%20Rajasthan%20302006!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>

                    <div class="grid grid-cols-2 gap-4 text-xs">
                        <div class="p-3 rounded-lg bg-slate-800/80 border border-slate-700">
                            <span class="text-slate-400 block font-medium">Technical Desk:</span>
                            <a href="tel:+918696962600" class="text-amber-400 font-bold text-sm hover:underline">+91 86969 62600</a>
                        </div>
                        <div class="p-3 rounded-lg bg-slate-800/80 border border-slate-700">
                            <span class="text-slate-400 block font-medium">Email Dispatch:</span>
                            <a href="mailto:info@dcequipment.in" class="text-white font-bold text-sm hover:underline">info@dcequipment.in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

<x-app-layout>
    <!-- Header -->
    <section class="bg-slate-950 text-white py-14 lg:py-16 border-b border-slate-900 industrial-grid-dark relative">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="max-w-3xl">
                <span class="text-xs font-bold text-amber-400 uppercase tracking-wider bg-slate-900 border border-slate-800 px-3 py-1 rounded-full">
                    Engineering Bays & Mobile Service Fleet
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white mt-3">
                    Machinery Overhaul & Field Engineering Services
                </h1>
                <p class="text-slate-300 text-sm sm:text-base mt-2">
                    Factory-standard rebuilds for transit mixer drums, rock valves, S-tubes, hydraulic pumps, and 24/7 on-site emergency breakdown troubleshooting across Rajasthan.
                </p>
            </div>
        </div>
    </section>

    <!-- Services Detailed Grid -->
    <section class="py-16 bg-slate-50 min-h-screen">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="space-y-12">
                @foreach($services as $index => $service)
                    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 grid grid-cols-1 lg:grid-cols-12 gap-8 p-6 sm:p-8 items-center {{ $index % 2 === 1 ? 'lg:flex-row-reverse' : '' }}">
                        
                        <div class="lg:col-span-8 space-y-4">
                            <div class="flex items-center space-x-3">
                                <span class="w-8 h-8 rounded-lg bg-blue-100 text-blue-700 font-extrabold flex items-center justify-center text-xs">
                                    0{{ $index + 1 }}
                                </span>
                                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Service Division</span>
                            </div>

                            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">
                                {{ $service->title }}
                            </h2>

                            <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                                {{ $service->description }}
                            </p>

                            @if(!empty($service->features))
                                <div class="pt-2">
                                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Technical Scope of Work:</h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                        @foreach($service->features as $feature)
                                            <div class="flex items-start space-x-2 text-xs sm:text-sm text-slate-700">
                                                <svg class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                <span>{{ $feature }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if(!empty($service->benefits))
                                <div class="pt-2">
                                    <h4 class="text-xs font-bold uppercase tracking-wider text-amber-700 mb-2">Key Client Advantages:</h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                        @foreach($service->benefits as $benefit)
                                            <div class="flex items-start space-x-2 text-xs text-slate-600 bg-amber-50/60 p-2 rounded-lg border border-amber-100/80">
                                                <span class="text-amber-600 font-bold">★</span>
                                                <span>{{ $benefit }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Right Action Box -->
                        <div class="lg:col-span-4 bg-slate-900 text-white rounded-xl p-6 border border-slate-800 space-y-4">
                            <span class="text-xs font-bold uppercase tracking-wider text-amber-400 block">Immediate Booking</span>
                            <h4 class="text-lg font-bold text-white">Need This Service on Your Site?</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                Our mobile service engineers can mobilize to your site with diagnostic pressure testing gear and replacement spares.
                            </p>

                            <div class="pt-2 flex flex-col space-y-2">
                                <a href="tel:+918696962600" class="w-full py-2.5 px-4 rounded-lg font-bold bg-amber-400 text-slate-950 text-center text-xs hover:bg-amber-300 transition flex items-center justify-center space-x-1.5">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.02-.24c1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                                    <span>Call Hotline: +91 86969 62600</span>
                                </a>
                                <a href="{{ route('contact') }}?service={{ urlencode($service->title) }}#quote-form" class="w-full py-2.5 px-4 rounded-lg font-bold bg-blue-600 text-white text-center text-xs hover:bg-blue-500 transition">
                                    Book Inspection / Rebuild Quote
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            <!-- Emergency Breakdown Banner -->
            <div class="mt-16 bg-gradient-to-r from-red-950 via-slate-900 to-slate-950 text-white rounded-2xl p-8 border border-red-900/40">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="space-y-2">
                        <span class="inline-block px-2.5 py-0.5 rounded text-xs font-bold bg-red-600 text-white uppercase tracking-wider animate-pulse">
                            Active 24/7 Hotline
                        </span>
                        <h3 class="text-2xl font-black text-white">Emergency Concrete Pour Breakdown Assistance</h3>
                        <p class="text-slate-300 text-xs sm:text-sm max-w-2xl leading-relaxed">
                            Sudden pump stall or delivery pipe blockage on an active monolithic mass pour? Call our 24/7 emergency dispatch line for rapid technician mobilization.
                        </p>
                    </div>
                    <div class="shrink-0">
                        <a href="tel:+918696962600" class="inline-flex items-center px-6 py-3.5 rounded-xl text-base font-extrabold bg-red-600 hover:bg-red-500 text-white shadow-lg transition">
                            <span>+91 86969 62600</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

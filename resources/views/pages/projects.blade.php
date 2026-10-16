<x-app-layout>
    <!-- Header -->
    <section class="bg-slate-950 text-white py-14 lg:py-16 border-b border-slate-900 industrial-grid-dark relative">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="max-w-3xl">
                <span class="text-xs font-bold text-amber-400 uppercase tracking-wider bg-slate-900 border border-slate-800 px-3 py-1 rounded-full">
                    Track Record & Enterprise Trust
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white mt-3">
                    Major Infrastructure Projects & Client References
                </h1>
                <p class="text-slate-300 text-sm sm:text-base mt-2">
                    Delivering high-reliability machinery spares and specialized DCP construction chemicals for India’s largest infrastructure, cement, and highway builders.
                </p>
            </div>
        </div>
    </section>

    <!-- Projects Portfolio -->
    <section class="py-16 bg-slate-50 min-h-screen">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($clients as $client)
                    @php
                        $projImg = $client->image ?: $client->project_image;
                        $projImgUrl = $projImg 
                            ? (str_starts_with($projImg, 'http') ? $projImg : asset('storage/' . $projImg))
                            : null;
                    @endphp
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-xs hover:shadow-lg transition flex flex-col justify-between overflow-hidden">
                        <div>
                            @if($projImgUrl)
                                <div class="h-44 w-full overflow-hidden bg-slate-900 -mx-8 -mt-8 mb-6 block relative">
                                    <img src="{{ $projImgUrl }}" alt="{{ $client->client_name }}" class="w-full h-full object-cover" />
                                </div>
                            @endif

                            <div class="flex items-center justify-between gap-2 mb-4">
                                <span class="px-2.5 py-1 rounded text-xs font-bold bg-blue-50 text-blue-800 uppercase tracking-wider">
                                    {{ $client->sector }}
                                </span>
                                <span class="text-xs text-slate-500 font-medium flex items-center space-x-1">
                                    <svg class="w-3.5 h-3.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span>{{ $client->location }}</span>
                                </span>
                            </div>

                            <div class="flex items-center gap-3 mb-2">
                                @if($client->logo)
                                    <img src="{{ str_starts_with($client->logo, 'http') ? $client->logo : asset('storage/' . $client->logo) }}" alt="{{ $client->client_name }}" class="w-8 h-8 object-contain rounded-sm" />
                                @endif
                                <h3 class="text-xl font-bold text-slate-900">
                                    {{ $client->client_name }}
                                </h3>
                            </div>
                            <h4 class="text-sm font-semibold text-blue-700 mb-4">
                                {{ $client->name }}
                            </h4>

                            @if($client->scope_supplied)
                                <div class="bg-slate-50 rounded-xl p-4 border border-slate-100 text-xs sm:text-sm text-slate-700 mb-6 space-y-1">
                                    <span class="font-bold text-slate-900 uppercase text-[11px] block text-slate-500">Scope of Supply / Engineering:</span>
                                    <p>{{ $client->scope_supplied }}</p>
                                </div>
                            @endif

                            @if($client->testimonial)
                                <div class="relative pl-4 border-l-2 border-amber-400 mb-4 text-xs sm:text-sm italic text-slate-600">
                                    "{{ $client->testimonial }}"
                                    @if($client->testimonial_author)
                                        <span class="block mt-1 font-bold text-slate-800 not-italic text-xs">— {{ $client->testimonial_author }}</span>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-500">
                            <span>Client Verified Portfolio</span>
                            <span class="text-emerald-600 font-bold">Active Collaboration</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Bottom CTA -->
            <div class="mt-16">
                <x-quote-form 
                    title="Partner With DC Equipment on Your Next Infrastructure Tender"
                    subtitle="We provide rate contracts, OEM compliance certificates, and scheduled site delivery for large-scale projects."
                    defaultType="general"
                />
            </div>
        </div>
    </section>
</x-app-layout>

<x-app-layout :seo="$seo">
    <div class="bg-slate-900 text-white py-8 border-b border-slate-800">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <nav class="flex text-xs text-slate-400 space-x-2 mb-3">
                <a href="{{ route('home') }}" class="hover:text-white">Home</a>
                <span>/</span>
                <a href="{{ route('services') }}" class="hover:text-white">Services</a>
                <span>/</span>
                <span class="text-amber-400 truncate">{{ $service->title }}</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <span class="inline-block px-2.5 py-0.5 rounded text-xs font-bold bg-amber-500/20 text-amber-300 border border-amber-500/30 uppercase tracking-wider mb-2">
                        Specialized Field & Workshop Division
                    </span>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white">
                        {{ $service->title }}
                    </h1>
                </div>
                <div>
                    <a href="tel:+918696962600" class="inline-flex items-center px-4 py-2 rounded-lg font-bold bg-amber-400 text-slate-950 text-xs sm:text-sm hover:bg-amber-300 transition">
                        <span>Emergency Helpline: +91 86969 62600</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                <div class="lg:col-span-8 space-y-8">
                    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200 shadow-xs">
                        <h2 class="text-xl font-bold text-slate-900 mb-4">Service Description & Process</h2>
                        <div class="prose text-slate-600 text-sm leading-relaxed space-y-4">
                            {!! nl2br(e($service->description)) !!}
                        </div>

                        @if(!empty($service->features))
                            <div class="mt-8 pt-6 border-t border-slate-100">
                                <h3 class="text-lg font-bold text-slate-900 mb-3">Technical Scope of Work</h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
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
                            <div class="mt-8 pt-6 border-t border-slate-100">
                                <h3 class="text-lg font-bold text-slate-900 mb-3">Key Client Advantages</h3>
                                <div class="space-y-2">
                                    @foreach($service->benefits as $benefit)
                                        <div class="flex items-start space-x-2.5 p-3 rounded-lg bg-amber-50/60 border border-amber-100/70 text-xs sm:text-sm text-slate-700">
                                            <span class="text-amber-600 font-bold">★</span>
                                            <span>{{ $benefit }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="lg:col-span-4 space-y-6">
                    <x-quote-form 
                        :title="'Book ' . $service->title"
                        subtitle="Coordinate site inspection or machine delivery to our Jaipur workshop."
                        defaultType="repair_service"
                        :defaultProduct="$service->title"
                    />
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

<x-app-layout>
    <!-- Chemical Hero Banner -->
    <section class="bg-slate-950 text-white py-14 lg:py-16 border-b border-slate-900 industrial-grid-dark relative">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="max-w-3xl">
                <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/30 text-xs font-bold text-amber-400 mb-3">
                    <span>Authorized Dealership • Rajasthan & North India</span>
                </div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white">
                    DCP High-Performance Construction Chemicals
                </h1>
                <p class="text-slate-300 text-sm sm:text-base mt-2">
                    Authorized distribution partner for Don Construction Products (DCP). Specialized polycarboxylate ether (PCE) superplasticisers, pure polyurethane waterproofing, precision non-shrink grouts, and industrial floor hardeners engineered for high-temperature durability across Rajasthan.
                </p>
            </div>
        </div>
    </section>

    <!-- Chemical Catalog & Filter -->
    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            
            <!-- Category Tabs & Search Bar -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 bg-white p-4 rounded-xl border border-slate-200 shadow-xs">
                <!-- Tabs -->
                <div class="flex items-center space-x-1.5 overflow-x-auto pb-2 md:pb-0 text-xs sm:text-sm font-semibold">
                    <a href="{{ route('chemicals') }}" class="px-3.5 py-2 rounded-lg transition whitespace-nowrap {{ !request('category') ? 'bg-amber-500 text-slate-950 font-bold shadow-xs' : 'text-slate-700 hover:bg-slate-100' }}">
                        All Chemical Solutions
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('chemicals', ['category' => $category->slug]) }}" class="px-3.5 py-2 rounded-lg transition whitespace-nowrap {{ request('category') === $category->slug ? 'bg-amber-500 text-slate-950 font-bold shadow-xs' : 'text-slate-700 hover:bg-slate-100' }}">
                            {{ $category->name }} ({{ $category->products_count }})
                        </a>
                    @endforeach
                </div>

                <!-- Search Input -->
                <form action="{{ route('chemicals') }}" method="GET" class="relative shrink-0 w-full md:w-72">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search DCP product name, code..." class="w-full pl-9 pr-4 py-2 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </form>
            </div>

            <!-- Active Category Banner if filtered -->
            @if($selectedCategory)
                <div class="mb-8 p-5 rounded-xl bg-amber-50 border border-amber-200/70 text-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-amber-800">DCP Product Range</span>
                        <h2 class="text-lg font-bold text-slate-900 mt-0.5">{{ $selectedCategory->name }}</h2>
                        <p class="text-xs text-slate-600 mt-1 max-w-2xl">{{ $selectedCategory->description }}</p>
                    </div>
                    <a href="{{ route('chemicals') }}" class="text-xs font-bold text-amber-900 hover:underline shrink-0">
                        Clear Filter &times;
                    </a>
                </div>
            @endif

            <!-- Chemicals Grid -->
            @if($chemicals->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($chemicals as $chemical)
                        <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                            <div class="p-6">
                                <div class="flex items-center justify-between gap-2 mb-3">
                                    <span class="px-2.5 py-1 rounded text-xs font-bold bg-amber-100 text-amber-900 uppercase tracking-wider">
                                        {{ $chemical->category->name }}
                                    </span>
                                    <span class="font-mono text-xs text-slate-500 font-semibold">{{ $chemical->sku ?: 'DCP Formula' }}</span>
                                </div>

                                <h3 class="text-lg font-bold text-slate-900 group-hover:text-amber-600 transition mb-2">
                                    <a href="{{ route('products.detail', $chemical->slug) }}">
                                        {{ $chemical->name }}
                                    </a>
                                </h3>

                                <p class="text-slate-600 text-xs leading-relaxed mb-4 line-clamp-3">
                                    {{ $chemical->short_description }}
                                </p>

                                @if(!empty($chemical->specifications))
                                    <div class="bg-slate-50 rounded-lg p-3 text-xs space-y-1.5 border border-slate-100 mb-4">
                                        @foreach(array_slice($chemical->specifications, 0, 3) as $specKey => $specVal)
                                            <div class="flex justify-between items-center text-slate-600">
                                                <span class="font-semibold text-slate-500">{{ $specKey }}:</span>
                                                <span class="text-slate-900 font-mono">{{ $specVal }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="p-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-700">DCP Authorized</span>
                                <a href="{{ route('products.detail', $chemical->slug) }}" class="inline-flex items-center text-xs font-bold text-amber-700 hover:text-amber-900">
                                    <span>Technical Data Sheet</span>
                                    <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $chemicals->links() }}
                </div>
            @else
                <div class="bg-white rounded-xl border border-slate-200 p-12 text-center text-slate-600">
                    <p class="text-base font-semibold">No chemical solutions matching your query were found.</p>
                    <p class="text-xs text-slate-500 mt-1">Please call our Jaipur chemical sales desk at +91 86969 62600 for trial mixes or bulk IBC tank supply.</p>
                    <a href="{{ route('chemicals') }}" class="mt-4 inline-block px-4 py-2 bg-amber-500 text-slate-950 font-bold rounded-lg text-xs">
                        Reset Filters
                    </a>
                </div>
            @endif

            <!-- DCP Partnership Advantage Callout -->
            <div class="mt-20">
                <div class="bg-gradient-to-r from-slate-900 to-slate-950 text-white rounded-2xl p-8 border border-slate-800 mb-12">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                        <div class="md:col-span-2">
                            <span class="text-xs font-bold uppercase tracking-wider text-amber-400">Technical Concrete Support</span>
                            <h3 class="text-2xl font-bold mt-1 text-white">Concrete Mix Design & On-Site Lab Trials in Jaipur</h3>
                            <p class="text-slate-300 text-xs sm:text-sm mt-2 leading-relaxed">
                                Our concrete technology specialists assist RMC batching plants and precast fabricators with optimal PCE admixture dosage, slump retention curve testing, and cost-per-cube optimization across Rajasthan aggregates.
                            </p>
                        </div>
                        <div class="text-left md:text-right">
                            <a href="tel:+918696962600" class="inline-flex items-center px-5 py-3 rounded-xl font-bold bg-amber-400 text-slate-950 hover:bg-amber-300 transition text-sm">
                                Request Site Mix Trial
                            </a>
                        </div>
                    </div>
                </div>

                <x-quote-form 
                    title="Request DCP Chemical Quotation or Site Sample"
                    subtitle="IBC container drums, 200L barrels, and 20kg pail quantities dispatched from our Jaipur depot."
                    defaultType="chemicals"
                />
            </div>
        </div>
    </section>
</x-app-layout>

<x-app-layout>
    <!-- Header -->
    <section class="bg-slate-950 text-white py-14 lg:py-16 border-b border-slate-900 industrial-grid-dark relative">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="max-w-3xl">
                <span class="text-xs font-bold text-amber-400 uppercase tracking-wider bg-slate-900 border border-slate-800 px-3 py-1 rounded-full">
                    Heavy Machinery Spares & Wear Parts
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white mt-3">
                    Construction Equipment & Replacement Spares
                </h1>
                <p class="text-slate-300 text-sm sm:text-base mt-2">
                    Batching plant wear liners, concrete pump tungsten carbide wear plates, transit mixer spiral drums, and Rexroth hydraulics in stock at our Jaipur facility.
                </p>
            </div>
        </div>
    </section>

    <!-- Filter & Product Catalog -->
    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            
            <!-- Category Tabs & Search Bar -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 bg-white p-4 rounded-xl border border-slate-200 shadow-xs">
                <!-- Tabs -->
                <div class="flex items-center space-x-1.5 overflow-x-auto pb-2 md:pb-0 text-xs sm:text-sm font-semibold">
                    <a href="{{ route('products') }}" class="px-3.5 py-2 rounded-lg transition whitespace-nowrap {{ !request('category') ? 'bg-blue-600 text-white shadow-xs' : 'text-slate-700 hover:bg-slate-100' }}">
                        All Equipment
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('products', ['category' => $category->slug]) }}" class="px-3.5 py-2 rounded-lg transition whitespace-nowrap {{ request('category') === $category->slug ? 'bg-blue-600 text-white shadow-xs' : 'text-slate-700 hover:bg-slate-100' }}">
                            {{ $category->name }} ({{ $category->products_count }})
                        </a>
                    @endforeach
                </div>

                <!-- Search Input -->
                <form action="{{ route('products') }}" method="GET" class="relative shrink-0 w-full md:w-72">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search model, SKU, parts..." class="w-full pl-9 pr-4 py-2 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </form>
            </div>

            <!-- Active Category Banner if filtered -->
            @if($selectedCategory)
                <div class="mb-8 p-5 rounded-xl bg-blue-50 border border-blue-200/70 text-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <h2 class="text-lg font-bold text-blue-900">{{ $selectedCategory->name }}</h2>
                        <p class="text-xs text-slate-600 mt-1 max-w-2xl">{{ $selectedCategory->description }}</p>
                    </div>
                    <a href="{{ route('products') }}" class="text-xs font-bold text-blue-700 hover:underline shrink-0">
                        Clear Filter &times;
                    </a>
                </div>
            @endif

            <!-- Products Grid -->
            @if($products->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($products as $product)
                        @php
                            $fallbackCatImg = ($product->category && $product->category->image)
                                ? (str_starts_with($product->category->image, 'http') ? $product->category->image : asset('storage/' . $product->category->image))
                                : 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=600&q=80';
                            $prodImg = $product->image 
                                ? (str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image))
                                : $fallbackCatImg;
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

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $products->links() }}
                </div>
            @else
                <div class="bg-white rounded-xl border border-slate-200 p-12 text-center text-slate-600">
                    <p class="text-base font-semibold">No equipment spares matching your query were found.</p>
                    <p class="text-xs text-slate-500 mt-1">Please call our Jaipur desk at +91 86969 62600 for custom fabrication or unlisted part numbers.</p>
                    <a href="{{ route('products') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-lg text-xs font-bold">
                        Reset Filters
                    </a>
                </div>
            @endif

            <!-- Quote Request Callout -->
            <div class="mt-20">
                <x-quote-form 
                    title="Inquire About Specific Part Numbers or Custom Fabrication"
                    subtitle="Our technical spare parts specialists can match OEM drawings for Putzmeister, Schwing Stetter, Sicoma, BHS, Sany, and Zoomlion."
                    defaultType="equipment"
                />
            </div>
        </div>
    </section>
</x-app-layout>

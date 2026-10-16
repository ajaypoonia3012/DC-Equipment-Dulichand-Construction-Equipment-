<x-app-layout :seo="$seo">
    <!-- Breadcrumb & Header -->
    <div class="bg-slate-900 text-white py-8 border-b border-slate-800">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <nav class="flex text-xs text-slate-400 space-x-2 mb-3">
                <a href="{{ route('home') }}" class="hover:text-white">Home</a>
                <span>/</span>
                <a href="{{ $product->category->type === 'chemicals' ? route('chemicals') : route('products') }}" class="hover:text-white">
                    {{ $product->category->type === 'chemicals' ? 'DCP Chemicals' : 'Equipment Spares' }}
                </a>
                <span>/</span>
                <span class="text-amber-400 truncate">{{ $product->name }}</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <span class="inline-block px-2.5 py-0.5 rounded text-xs font-bold bg-blue-600/30 text-blue-300 border border-blue-500/30 uppercase tracking-wider mb-2">
                        {{ $product->category->name }}
                    </span>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white">
                        {{ $product->name }}
                    </h1>
                </div>
                <div class="shrink-0">
                    <a href="#quote-form" class="inline-flex items-center px-5 py-2.5 rounded-lg text-sm font-bold bg-amber-400 text-slate-950 hover:bg-amber-300 shadow-md transition">
                        <span>Get Instant Quote</span>
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Details Content -->
    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                
                <!-- Main Specs & Description Column -->
                <div class="lg:col-span-8 space-y-8">
                    <!-- Overview Card -->
                    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200 shadow-xs">
                        <div class="flex flex-wrap items-center justify-between gap-4 pb-6 border-b border-slate-100">
                            <div>
                                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Brand / Standard</span>
                                <span class="font-bold text-slate-900 text-base">{{ $product->brand ?: 'DC Equipment OEM Spec' }}</span>
                            </div>
                            @if($product->sku)
                                <div>
                                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Part SKU / Code</span>
                                    <span class="font-mono font-bold text-blue-700 text-base">{{ $product->sku }}</span>
                                </div>
                            @endif
                            <div>
                                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Availability</span>
                                <span class="inline-flex items-center text-xs font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5 animate-pulse"></span>
                                    In Stock (Jaipur Hub)
                                </span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <h3 class="text-lg font-bold text-slate-900 mb-3">Product Overview</h3>
                            <div class="prose text-slate-600 text-sm leading-relaxed space-y-3">
                                {!! nl2br(e($product->description ?: $product->short_description)) !!}
                            </div>
                        </div>

                        @if(!empty($product->features))
                            <div class="mt-8 pt-6 border-t border-slate-100">
                                <h3 class="text-lg font-bold text-slate-900 mb-3">Key Engineering Features</h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    @foreach($product->features as $feat)
                                        <div class="flex items-start space-x-2 text-xs sm:text-sm text-slate-700">
                                            <svg class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            <span>{{ $feat }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if($product->applications)
                            <div class="mt-8 pt-6 border-t border-slate-100">
                                <h3 class="text-lg font-bold text-slate-900 mb-2">Recommended Applications</h3>
                                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed bg-slate-50 p-4 rounded-xl border border-slate-100">
                                    {{ $product->applications }}
                                </p>
                            </div>
                        @endif
                    </div>

                    <!-- Technical Specifications Table -->
                    @if(!empty($product->specifications))
                        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200 shadow-xs">
                            <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                <span>Technical Specifications Table</span>
                            </h3>

                            <div class="overflow-x-auto rounded-xl border border-slate-200">
                                <table class="w-full text-left text-xs sm:text-sm">
                                    <thead class="bg-slate-100 text-slate-700 uppercase font-bold text-xs tracking-wider">
                                        <tr>
                                            <th class="py-3 px-4 border-b border-slate-200">Parameter / Technical Aspect</th>
                                            <th class="py-3 px-4 border-b border-slate-200 font-mono">Value / Standard Specification</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        @foreach($product->specifications as $key => $val)
                                            <tr class="hover:bg-slate-50/80 transition">
                                                <td class="py-3 px-4 font-semibold text-slate-800">{{ $key }}</td>
                                                <td class="py-3 px-4 text-slate-600 font-mono">{{ $val }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Right Sidebar: Fast Quote & Direct Contacts -->
                <div class="lg:col-span-4 space-y-6">
                    <x-quote-form 
                        :title="'Request Quotation for ' . $product->name"
                        :subtitle="'Enter your required quantity or site details for same-day pricing.'"
                        :defaultType="$product->category->type"
                        :defaultProduct="$product->name . ' (' . ($product->sku ?: 'Standard') . ')'"
                    />

                    <!-- Direct Hotline Card -->
                    <div class="bg-slate-900 text-white rounded-2xl p-6 border border-slate-800">
                        <span class="text-xs font-bold uppercase tracking-wider text-amber-400">Jaipur Sales Desk</span>
                        <h4 class="text-lg font-bold mt-1 text-white">Need Urgent Delivery Today?</h4>
                        <p class="text-xs text-slate-400 mt-1 mb-4">
                            Direct site dispatch available across Jaipur, Ajmer, Kota, and NCR corridors.
                        </p>
                        <a href="tel:+918696962600" class="w-full py-3 px-4 rounded-xl font-bold bg-amber-400 text-slate-950 flex items-center justify-center space-x-2 text-sm hover:bg-amber-300 transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.02-.24c1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                            <span>Call: +91 86969 62600</span>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Related Products -->
            @if($relatedProducts->count() > 0)
                <div class="mt-16 pt-12 border-t border-slate-200">
                    <h3 class="text-2xl font-bold text-slate-900 mb-6">Related Products in {{ $product->category->name }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedProducts as $rel)
                            <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-xs hover:shadow-md transition flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block mb-1">{{ $rel->brand }}</span>
                                    <h4 class="font-bold text-slate-900 text-sm mb-2 hover:text-blue-600 transition">
                                        <a href="{{ route('products.detail', $rel->slug) }}">{{ $rel->name }}</a>
                                    </h4>
                                    <p class="text-xs text-slate-500 line-clamp-2">{{ $rel->short_description }}</p>
                                </div>
                                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                    <span class="font-mono text-xs text-slate-600">{{ $rel->sku ?: 'Standard' }}</span>
                                    <a href="{{ route('products.detail', $rel->slug) }}" class="text-xs font-bold text-blue-700 hover:underline">View Specs &rarr;</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-app-layout>

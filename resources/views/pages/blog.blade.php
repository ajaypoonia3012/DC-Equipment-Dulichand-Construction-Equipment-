<x-app-layout :seo="$seo">

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 text-white py-16 lg:py-24 overflow-hidden border-b border-slate-800">
        <div class="absolute inset-0 opacity-15 bg-[radial-gradient(#38bdf8_1px,transparent_1px)] [background-size:20px_20px] pointer-events-none"></div>
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="max-w-3xl">
                <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-400/30 text-blue-300 text-xs font-bold uppercase tracking-wider mb-4">
                    <span>Engineering Knowledge Base</span>
                    <span>•</span>
                    <span class="text-amber-400">Jaipur, Rajasthan</span>
                </div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight mb-4">
                    Industry Insights & <span class="bg-gradient-to-r from-amber-400 to-amber-200 bg-clip-text text-transparent">Equipment Maintenance</span>
                </h1>
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                    Technical field guides, preventive maintenance protocols, and advanced concrete chemical methodologies from DC Equipment’s certified engineers in Jaipur.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content Area -->
    <section class="py-12 lg:py-16 bg-slate-50">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            
            @if($posts->count() > 0)
                <!-- Featured Top Article -->
                @php $featured = $posts->first(); @endphp
                <div class="mb-14">
                    <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-md hover:shadow-xl transition-all duration-300 grid grid-cols-1 lg:grid-cols-12 group">
                        <div class="lg:col-span-7 relative h-72 lg:h-auto overflow-hidden bg-slate-800">
                            @php
                                $featuredImage = $featured->image 
                                    ? (str_starts_with($featured->image, 'http') ? $featured->image : asset('storage/' . $featured->image))
                                    : 'https://images.unsplash.com/photo-1541888946425-d0fbb18615f8?auto=format&fit=crop&w=1200&q=80';
                            @endphp
                            <img src="{{ $featuredImage }}" alt="{{ $featured->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" />
                            <div class="absolute top-4 left-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-bold uppercase bg-amber-500 text-slate-950 shadow-md">
                                    Latest Engineering Insight
                                </span>
                            </div>
                        </div>
                        <div class="lg:col-span-5 p-6 sm:p-8 lg:p-10 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center space-x-3 text-xs text-slate-500 mb-3 font-medium">
                                    <span class="flex items-center">
                                        <svg class="w-3.5 h-3.5 mr-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        {{ $featured->published_at ? $featured->published_at->format('M d, Y') : 'Recent' }}
                                    </span>
                                    <span>•</span>
                                    <span>{{ $featured->reading_time ?? '5' }} min read</span>
                                </div>
                                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 group-hover:text-blue-600 transition leading-snug mb-3">
                                    <a href="{{ route('blog.detail', $featured->slug) }}">
                                        {{ $featured->title }}
                                    </a>
                                </h2>
                                <p class="text-slate-600 text-sm sm:text-base leading-relaxed line-clamp-3 mb-6">
                                    {{ $featured->excerpt }}
                                </p>
                            </div>
                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-xs font-semibold text-slate-500">
                                    {{ $featured->author }}
                                </span>
                                <a href="{{ route('blog.detail', $featured->slug) }}" class="inline-flex items-center text-sm font-bold text-blue-600 hover:text-blue-700 transition">
                                    <span>Read Full Guide</span>
                                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Articles Grid -->
                <div class="mb-8">
                    <h2 class="text-2xl font-black text-slate-900 mb-6 flex items-center">
                        <span class="w-2.5 h-6 bg-amber-500 rounded-xs mr-3 inline-block"></span>
                        Recent Technical Publications
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($posts->slice(1) as $post)
                            @php
                                $postImage = $post->image 
                                    ? (str_starts_with($post->image, 'http') ? $post->image : asset('storage/' . $post->image))
                                    : 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=800&q=80';
                            @endphp
                            <article class="bg-white rounded-xl overflow-hidden border border-slate-200/90 shadow-xs hover:shadow-lg transition duration-300 flex flex-col group">
                                <a href="{{ route('blog.detail', $post->slug) }}" class="relative h-52 overflow-hidden bg-slate-800 block">
                                    <img src="{{ $postImage }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" loading="lazy" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                                </a>
                                
                                <div class="p-6 flex flex-col grow justify-between">
                                    <div>
                                        <div class="flex items-center space-x-2 text-xs text-slate-400 mb-2.5 font-medium">
                                            <span>{{ $post->published_at ? $post->published_at->format('d M Y') : 'Recent' }}</span>
                                            <span>•</span>
                                            <span>{{ $post->reading_time ?? '4' }} min read</span>
                                        </div>
                                        <h3 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition leading-snug mb-2.5 line-clamp-2">
                                            <a href="{{ route('blog.detail', $post->slug) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h3>
                                        <p class="text-slate-600 text-sm leading-relaxed line-clamp-3 mb-4">
                                            {{ $post->excerpt }}
                                        </p>
                                    </div>

                                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold">
                                        <span class="text-slate-500 truncate max-w-[160px]">{{ $post->author }}</span>
                                        <a href="{{ route('blog.detail', $post->slug) }}" class="text-blue-600 hover:text-blue-700 font-bold inline-flex items-center">
                                            <span>Read Article</span>
                                            <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

                <!-- Pagination -->
                @if($posts->hasPages())
                    <div class="mt-12 flex justify-center">
                        {{ $posts->links() }}
                    </div>
                @endif
            @else
                <div class="bg-white rounded-xl p-12 text-center max-w-lg mx-auto border border-slate-200">
                    <svg class="w-12 h-12 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    <h3 class="text-lg font-bold text-slate-800 mb-2">No Articles Published Yet</h3>
                    <p class="text-sm text-slate-600 mb-4">Our engineering desk is preparing fresh technical guides. Check back shortly!</p>
                    <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700">
                        Return to Homepage
                    </a>
                </div>
            @endif

            <!-- Bottom CTA Banner -->
            <div class="mt-16 bg-gradient-to-r from-blue-900 via-slate-900 to-blue-950 rounded-2xl p-8 lg:p-12 text-white border border-blue-800/40 shadow-xl flex flex-col lg:flex-row items-center justify-between gap-6">
                <div>
                    <span class="text-amber-400 text-xs font-bold uppercase tracking-wider">Direct Site Engineering Support</span>
                    <h3 class="text-2xl sm:text-3xl font-black mt-1 mb-2">Need Field Technical Advice for Your Project in Rajasthan?</h3>
                    <p class="text-slate-300 text-sm sm:text-base max-w-2xl">
                        Our service engineers can audit your batching plant, recommend concrete mix admixtures, or supply emergency pump wear plates from our Jaipur warehouse.
                    </p>
                </div>
                <div class="flex items-center space-x-4 shrink-0">
                    <a href="{{ route('contact') }}#quote-form" class="px-6 py-3.5 bg-amber-500 hover:bg-amber-400 text-slate-950 rounded-xl font-black text-sm transition shadow-lg transform active:scale-95">
                        Consult an Engineer
                    </a>
                    <a href="tel:+918696962600" class="px-5 py-3.5 bg-white/10 hover:bg-white/20 border border-white/20 text-white rounded-xl font-bold text-sm transition">
                        Call +91 86969 62600
                    </a>
                </div>
            </div>

        </div>
    </section>

</x-app-layout>

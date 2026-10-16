<x-app-layout :seo="$seo">

    @php
        $postImage = $post->image 
            ? (str_starts_with($post->image, 'http') ? $post->image : asset('storage/' . $post->image))
            : 'https://images.unsplash.com/photo-1513828583688-c52646db42da?auto=format&fit=crop&w=1400&q=80';
    @endphp

    <!-- Breadcrumbs -->
    <div class="bg-slate-100 border-b border-slate-200 text-xs py-3">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12 flex items-center space-x-2 text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Home</a>
            <span>/</span>
            <a href="{{ route('blog') }}" class="hover:text-blue-600 transition">Blog & Insights</a>
            <span>/</span>
            <span class="text-slate-800 font-semibold truncate max-w-sm sm:max-w-md">{{ $post->title }}</span>
        </div>
    </div>

    <!-- Article Header -->
    <header class="bg-white border-b border-slate-200/80 pt-10 pb-12">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="max-w-4xl">
                <div class="flex items-center space-x-3 text-xs font-semibold text-slate-500 mb-4">
                    <span class="px-2.5 py-1 rounded bg-blue-50 text-blue-700 border border-blue-200 uppercase tracking-wider text-[11px] font-bold">
                        Technical Field Advisory
                    </span>
                    <span>•</span>
                    <span>{{ $post->published_at ? $post->published_at->format('F d, Y') : 'Recent' }}</span>
                    <span>•</span>
                    <span>{{ $post->reading_time ?? '5' }} min read</span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight mb-6">
                    {{ $post->title }}
                </h1>

                <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-slate-100 text-sm">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-blue-900 text-amber-400 font-bold flex items-center justify-center text-sm shadow-xs">
                            DC
                        </div>
                        <div>
                            <p class="font-bold text-slate-900 text-sm">{{ $post->author }}</p>
                            <p class="text-xs text-slate-500">Dulichand Construction Equipment • Jaipur HQ</p>
                        </div>
                    </div>

                    <!-- Social Share -->
                    <div class="flex items-center space-x-2 text-xs font-semibold text-slate-600">
                        <span class="text-slate-400 mr-1">Share:</span>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' ' . url()->current()) }}" target="_blank" rel="noopener noreferrer" class="p-2 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition" title="Share via WhatsApp">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener noreferrer" class="p-2 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 transition" title="Share on LinkedIn">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content & Sidebar -->
    <section class="py-12 lg:py-16 bg-slate-50">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- Article Column -->
                <article class="lg:col-span-8">
                    <!-- Featured Image -->
                    <div class="rounded-2xl overflow-hidden shadow-md mb-8 border border-slate-200 bg-slate-800">
                        <img src="{{ $postImage }}" alt="{{ $post->title }}" class="w-full h-auto max-h-[550px] object-cover" />
                    </div>

                    <!-- Excerpt Box -->
                    <div class="bg-blue-50/80 border-l-4 border-blue-600 p-5 sm:p-6 rounded-r-xl mb-8">
                        <p class="text-base sm:text-lg font-medium text-blue-950 leading-relaxed italic">
                            {{ $post->excerpt }}
                        </p>
                    </div>

                    <!-- Article Body -->
                    <div class="prose prose-slate prose-lg max-w-none text-slate-700 leading-relaxed space-y-6 [&>h2]:text-2xl [&>h2]:font-black [&>h2]:text-slate-900 [&>h2]:mt-8 [&>h2]:mb-4 [&>h3]:text-xl [&>h3]:font-bold [&>h3]:text-slate-900 [&>h3]:mt-6 [&>h3]:mb-3 [&>ul]:list-disc [&>ul]:pl-6 [&>ul]:space-y-2 [&>p]:leading-relaxed [&>blockquote]:border-l-4 [&>blockquote]:border-amber-500 [&>blockquote]:bg-amber-50/60 [&>blockquote]:p-4 [&>blockquote]:rounded-r-lg [&>blockquote]:text-slate-800">
                        {!! $post->content !!}
                    </div>

                    <!-- Image Gallery if available -->
                    @if(!empty($post->gallery) && is_array($post->gallery))
                        <div class="mt-12 pt-8 border-t border-slate-200">
                            <h3 class="text-xl font-bold text-slate-900 mb-4">Site Photos & Technical Attachments</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach($post->gallery as $galleryImg)
                                    @php
                                        $gUrl = str_starts_with($galleryImg, 'http') ? $galleryImg : asset('storage/' . $galleryImg);
                                    @endphp
                                    <div class="rounded-xl overflow-hidden border border-slate-200 shadow-xs">
                                        <img src="{{ $gUrl }}" alt="{{ $post->title }} gallery" class="w-full h-56 object-cover hover:scale-105 transition duration-300" loading="lazy" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Back to Articles Button -->
                    <div class="mt-12 pt-6 border-t border-slate-200 flex justify-between items-center">
                        <a href="{{ route('blog') }}" class="inline-flex items-center text-sm font-bold text-blue-600 hover:text-blue-800 transition">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            <span>Back to All Articles</span>
                        </a>
                        <a href="{{ route('contact') }}#quote-form" class="inline-flex items-center px-4 py-2 rounded-lg bg-blue-700 hover:bg-blue-800 text-white text-xs font-bold transition shadow-xs">
                            <span>Request Machinery Quote</span>
                        </a>
                    </div>
                </article>

                <!-- Sidebar Column -->
                <aside class="lg:col-span-4 space-y-8">
                    <!-- Inquiry / Contact Box -->
                    <div class="bg-gradient-to-br from-slate-900 to-blue-950 text-white rounded-2xl p-6 sm:p-8 shadow-lg border border-slate-800">
                        <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold bg-amber-500/20 text-amber-400 border border-amber-500/30 uppercase tracking-wider mb-3">
                            Direct Support
                        </span>
                        <h3 class="text-xl font-black mb-2">Need Technical Assistance?</h3>
                        <p class="text-sm text-slate-300 mb-6 leading-relaxed">
                            Have questions regarding pump wear parts, transit mixer barrels, or DCP admixtures for your project in Rajasthan? Contact our engineering team.
                        </p>
                        
                        <div class="space-y-3 mb-6">
                            <a href="tel:+918696962600" class="flex items-center space-x-3 p-3 rounded-xl bg-white/5 hover:bg-white/10 transition border border-white/10">
                                <div class="w-9 h-9 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.02-.24c1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                                </div>
                                <div class="text-xs">
                                    <p class="text-slate-400">Jaipur Helpline</p>
                                    <p class="font-bold text-white text-sm">+91 86969 62600</p>
                                </div>
                            </a>

                            <a href="mailto:info@dcequipment.in" class="flex items-center space-x-3 p-3 rounded-xl bg-white/5 hover:bg-white/10 transition border border-white/10">
                                <div class="w-9 h-9 rounded-lg bg-blue-500/20 text-blue-400 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div class="text-xs">
                                    <p class="text-slate-400">Email Engineering Desk</p>
                                    <p class="font-bold text-white text-sm">info@dcequipment.in</p>
                                </div>
                            </a>
                        </div>

                        <a href="{{ route('contact') }}#quote-form" class="w-full block text-center py-3 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-black text-sm transition shadow-md">
                            Submit Parts / Chemical RFP
                        </a>
                    </div>

                    <!-- DCP Authorized Card -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs">
                        <div class="flex items-center space-x-3 mb-3">
                            <span class="w-2 h-6 bg-blue-600 rounded-xs inline-block"></span>
                            <h4 class="font-bold text-slate-900 text-sm uppercase tracking-wide">DCP Authorized Dealer</h4>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed mb-4">
                            DC Equipment is an authorized stockist and technical applicator for Don Construction Products (DCP) across Jaipur and Rajasthan, supplying PCE superplasticisers, structural grouts, and waterproofing systems.
                        </p>
                        <a href="{{ route('chemicals') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center">
                            <span>Explore Chemicals Catalog</span>
                            <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>

                    <!-- Related Articles -->
                    @if($relatedPosts->count() > 0)
                        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs">
                            <h4 class="font-bold text-slate-900 text-sm uppercase tracking-wide mb-4">
                                Related Technical Guides
                            </h4>
                            <div class="space-y-4">
                                @foreach($relatedPosts as $rPost)
                                    @php
                                        $rImage = $rPost->image 
                                            ? (str_starts_with($rPost->image, 'http') ? $rPost->image : asset('storage/' . $rPost->image))
                                            : 'https://images.unsplash.com/photo-1513828583688-c52646db42da?auto=format&fit=crop&w=400&q=80';
                                    @endphp
                                    <div class="flex items-start space-x-3 group">
                                        <a href="{{ route('blog.detail', $rPost->slug) }}" class="w-20 h-16 rounded-lg overflow-hidden bg-slate-800 shrink-0 block">
                                            <img src="{{ $rImage }}" alt="{{ $rPost->title }}" class="w-full h-full object-cover group-hover:scale-105 transition" />
                                        </a>
                                        <div>
                                            <h5 class="text-xs font-bold text-slate-900 group-hover:text-blue-600 transition leading-snug line-clamp-2">
                                                <a href="{{ route('blog.detail', $rPost->slug) }}">
                                                    {{ $rPost->title }}
                                                </a>
                                            </h5>
                                            <span class="text-[11px] text-slate-400 mt-1 block">
                                                {{ $rPost->published_at ? $rPost->published_at->format('M d, Y') : 'Recent' }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </aside>

            </div>
        </div>
    </section>

    <!-- Schema.org BlogPosting Schema -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'headline' => $post->title,
        'description' => $post->excerpt,
        'image' => $postImage,
        'author' => [
            '@type' => 'Organization',
            'name' => 'DC Equipment (Dulichand Construction Equipment)',
            'url' => url('/'),
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'DC Equipment',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('images/logo.svg'),
            ],
        ],
        'datePublished' => $post->published_at ? $post->published_at->toIso8601String() : now()->toIso8601String(),
        'dateModified' => $post->updated_at ? $post->updated_at->toIso8601String() : now()->toIso8601String(),
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id' => url()->current(),
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

</x-app-layout>

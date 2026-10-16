<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ClientReference;
use App\Models\CompanySetting;
use App\Models\Product;
use App\Models\SeoMeta;
use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $seo = SeoMeta::forPage('home');
        
        $featuredEquipment = Product::with('category')
            ->whereHas('category', fn ($q) => $q->where('type', 'equipment'))
            ->active()
            ->featured()
            ->take(6)
            ->get();

        $featuredChemicals = Product::with('category')
            ->whereHas('category', fn ($q) => $q->where('type', 'chemicals'))
            ->active()
            ->featured()
            ->take(6)
            ->get();

        $equipmentCategories = Category::equipment()->active()->withCount('products')->get();
        $chemicalCategories = Category::chemicals()->active()->withCount('products')->get();
        $services = Service::active()->featured()->orderBy('sort_order')->take(6)->get();
        $clients = ClientReference::featured()->take(8)->get();
        
        return view('pages.home', compact(
            'seo',
            'featuredEquipment',
            'featuredChemicals',
            'equipmentCategories',
            'chemicalCategories',
            'services',
            'clients'
        ));
    }

    public function about()
    {
        $seo = SeoMeta::forPage('about');
        $clients = ClientReference::featured()->take(6)->get();
        $services = Service::active()->take(4)->get();

        return view('pages.about', compact('seo', 'clients', 'services'));
    }

    public function products(Request $request)
    {
        $seo = SeoMeta::forPage('products');
        $categories = Category::equipment()->active()->withCount('products')->get();

        $query = Product::with('category')
            ->whereHas('category', fn ($q) => $q->where('type', 'equipment'))
            ->active();

        if ($request->filled('category')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%")
                  ->orWhere('brand', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        $products = $query->orderBy('sort_order')->paginate(9)->withQueryString();
        $selectedCategory = $request->category ? Category::where('slug', $request->category)->first() : null;

        return view('pages.products', compact('seo', 'categories', 'products', 'selectedCategory'));
    }

    public function chemicals(Request $request)
    {
        $seo = SeoMeta::forPage('chemicals');
        $categories = Category::chemicals()->active()->withCount('products')->get();

        $query = Product::with('category')
            ->whereHas('category', fn ($q) => $q->where('type', 'chemicals'))
            ->active();

        if ($request->filled('category')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $chemicals = $query->orderBy('sort_order')->paginate(9)->withQueryString();
        $selectedCategory = $request->category ? Category::where('slug', $request->category)->first() : null;

        return view('pages.chemicals', compact('seo', 'categories', 'chemicals', 'selectedCategory'));
    }

    public function productDetail($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->active()->firstOrFail();
        
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->active()
            ->take(3)
            ->get();

        $seo = new SeoMeta([
            'title' => $product->meta_title ?: "{$product->name} | DC Equipment Jaipur",
            'description' => $product->meta_description ?: $product->short_description,
            'keywords' => $product->meta_keywords ?: "{$product->name}, {$product->brand}, construction equipment spares jaipur",
            'canonical_url' => route('products.detail', $product->slug),
        ]);

        return view('pages.product-detail', compact('product', 'relatedProducts', 'seo'));
    }

    public function services()
    {
        $seo = SeoMeta::forPage('services');
        $services = Service::active()->orderBy('sort_order')->get();

        return view('pages.services', compact('seo', 'services'));
    }

    public function serviceDetail($slug)
    {
        $service = Service::where('slug', $slug)->active()->firstOrFail();
        $otherServices = Service::where('id', '!=', $service->id)->active()->take(4)->get();

        $seo = new SeoMeta([
            'title' => "{$service->title} Jaipur | DC Equipment Services",
            'description' => $service->short_description,
            'keywords' => "{$service->title}, equipment repair jaipur, construction machinery service ajmer road",
            'canonical_url' => route('services.detail', $service->slug),
        ]);

        return view('pages.service-detail', compact('service', 'otherServices', 'seo'));
    }

    public function projects()
    {
        $seo = SeoMeta::forPage('projects');
        $clients = ClientReference::orderBy('sort_order')->get();

        return view('pages.projects', compact('seo', 'clients'));
    }

    public function contact()
    {
        $seo = SeoMeta::forPage('contact');
        return view('pages.contact', compact('seo'));
    }

    public function blog()
    {
        $seo = SeoMeta::forPage('blog');
        if (!$seo) {
            $seo = new SeoMeta([
                'title' => 'Technical Articles & Industry Insights | DC Equipment Jaipur',
                'description' => 'Expert engineering guides on concrete pump spare parts, transit mixer drum maintenance, PCE hyperplasticisers, and heavy machinery support in Rajasthan.',
                'keywords' => 'concrete pump spares jaipur, pce hyperplasticisers rajasthan, transit mixer repair, dc equipment blog',
                'canonical_url' => route('blog'),
            ]);
        }
        $posts = \App\Models\Blog::published()->latest('published_at')->paginate(9);
        $recentPosts = \App\Models\Blog::published()->latest('published_at')->take(4)->get();

        return view('pages.blog', compact('seo', 'posts', 'recentPosts'));
    }

    public function blogDetail($slug)
    {
        $post = \App\Models\Blog::where('slug', $slug)->published()->firstOrFail();
        $relatedPosts = \App\Models\Blog::where('id', '!=', $post->id)->published()->latest('published_at')->take(3)->get();

        $seo = new SeoMeta([
            'title' => $post->meta_title ?: "{$post->title} | DC Equipment",
            'description' => $post->meta_description ?: $post->excerpt,
            'keywords' => $post->meta_keywords ?: 'construction equipment rajasthan, dc equipment jaipur',
            'canonical_url' => route('blog.detail', $post->slug),
            'og_image' => $post->image ? (str_starts_with($post->image, 'http') ? $post->image : asset('storage/' . $post->image)) : null,
        ]);

        return view('pages.blog-detail', compact('post', 'relatedPosts', 'seo'));
    }
}

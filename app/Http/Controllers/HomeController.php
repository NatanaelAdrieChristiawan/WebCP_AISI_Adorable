<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Client;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::with('category')
            ->where('is_featured', true)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->take(4)
            ->get();

        $featuredClients = Client::where('is_featured', true)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $latestPosts = BlogPost::published()
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('pages.home', compact('featuredProducts', 'featuredClients', 'latestPosts'));
    }
}

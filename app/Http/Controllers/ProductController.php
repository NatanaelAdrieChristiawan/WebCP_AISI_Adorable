<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = ProductCategory::whereHas('products', fn ($q) => $q->where('is_active', true))
            ->orderBy('sort_order')
            ->get();

        $products = Product::with('category')
            ->where('is_active', true)
            ->when($request->category, fn ($q, $cat) => $q->whereHas('category', fn ($q2) => $q2->where('slug', $cat)))
            ->when($request->search, fn ($q, $search) => $q->where('name', 'like', "%{$search}%"))
            ->orderBy('sort_order')
            ->paginate(9);

        return view('pages.products.index', compact('products', 'categories'));
    }

    public function show(string $slug)
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $related = Product::with('category')
            ->where('is_active', true)
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(3)
            ->get();

        return view('pages.products.show', compact('product', 'related'));
    }
}

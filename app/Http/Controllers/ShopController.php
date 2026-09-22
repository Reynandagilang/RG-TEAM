<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Show the shop catalog.
     */
    public function index()
    {
        $products = Product::orderBy('name')->get();
        return view('shop.index', compact('products'));
    }

    /**
     * Show a single product detail.
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('shop.show', compact('product'));
    }
}


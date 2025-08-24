<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController
{
    public function index()
    {
        $products = Product::all();
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $product = new Product();
        return view('dashboard.products.create', compact('product'));
    }

    public function store(Request $request)
    {
        // Placeholder store logic
        return redirect()->route('dashboard.products.index');
    }

    public function edit(Product $product)
    {
        return view('dashboard.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Placeholder update logic
        return redirect()->route('dashboard.products.index');
    }

    public function destroy(Product $product)
    {
        // Placeholder delete logic
        return redirect()->route('dashboard.products.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $allProducts = Product::latest()->get();
        return Inertia::render('products/Index', [
            'allProducts' => $allProducts,
        ]);
    }

    public function create()
    {
        return Inertia::render('products/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create($request->only('name', 'description', 'price'));

        return redirect()->route('products.index')->with('message', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return Inertia::render('products/Edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($request->only('name', 'description', 'price'));

        return redirect()->route('products.index')->with('message', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('message', 'Product deleted successfully.');
    }
}

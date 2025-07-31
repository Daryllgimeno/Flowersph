<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index(Request $request)
{    $sortOrder = $request->get('sort', 'asc');
    $direction = $request->get('direction', 'desc');

    if (!in_array($sortOrder, ['product_name', 'product_description', 'quantity', 'price'])) {
        $sort = 'created_at';
    }

    if (!in_array($direction, ['asc', 'desc'])) {
        $direction = 'desc';
    }

    $products = Product::orderBy($sort, $direction)->get();
return view('products.index', [
        'products' => $products,
        'sortOrder' => $sortOrder, // 👈 THIS LINE IS REQUIRED
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
       public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    /**
     * Update the specified resource in storage.
     */
      // Update product
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
      // Delete product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }
}

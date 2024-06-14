<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function buy(Product $product)
    {
        if ($product->quantity > 0) {
            $product->decrement('quantity');
            if ($product->quantity == 0) {
                $product->update(['status' => 'sold']);
            }
            return redirect()->route('products.index')->with('success', 'Product bought successfully');
        }

        return redirect()->route('products.index')->with('error', 'Product is out of stock');
    }

    public function sell(Product $product)
    {
        $product->increment('quantity');
        $product->update(['status' => 'available']);

        return redirect()->route('products.index')->with('success', 'Product added to inventory successfully');
    }

    public function viewProducts()
    {
        $products = Product::all();
        return view('products.view', compact('products'));
    }
}

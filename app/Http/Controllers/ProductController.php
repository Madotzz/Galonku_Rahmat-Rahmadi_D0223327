<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('products.index', ['products' => Product::all()]);
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric',
        ]);
        Product::create($request->all());
        return redirect()->route('products.index');
    }

    public function edit(Product $product) {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product) {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric',
        ]);
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy(Product $product) {
        $product->delete();
        return back();
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
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
            'category_name' => 'required|exists:categories,name',
            'name' => 'required|string|min:5',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif'
        ]);

        $category = Category::firstorCreate(['name' => $validated['category_name']]);

        if ($request->hasFile("image")) {
            $now = now()->format("Y-m-d_H.i.s");
            $filename = $now . "_" . $request->file("image")->getClientOriginalName();
            $request->file("image")->storeAs("images", $filename, "public");
            $validated["image"] = $filename;
        }

        Product::create([
            'category_id' => $category->id,
            'name' => $validated['name'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'image' => $validated['image'] ?? null
        ]);

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
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_name' => 'sometimes|exists:categories,name',
            'name' => 'sometimes|string|min:5',
            'price' => 'sometimes|integer',
            'stock' => 'sometimes|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif'
        ]);

        if ($request->filled('category_name')) {
            $category = Category::firstorCreate(['name' => $validated['category_name']]);
            $validated['category_id'] = $category->id;
        }

        if ($request->hasFile("image")) {
            $now = now()->format("Y-m-d_H.i.s");
            $filename = $now . "_" . $request->file("image")->getClientOriginalName();
            $request->file("image")->storeAs("images", $filename, "public");
            $validated["image"] = $filename;
        }

        unset($validated['category_name']);

        $product = Product::findOrFail($id);
        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        Storage::disk("public")->delete("images/". $product->image);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(2);
        return view('admin.product.browse', compact('products'));
    }

    public function create()
    {
        $product = null;
        return view('admin.product.add-edit', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|max:1024',
        ]);

        if ($request->file('image')) {
            $image = Storage::putFile(
                'public/products/' . date('FY'),
                $request->file('image')
            );
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => substr($image, 7),
        ]);

        return redirect(route('product.index'));
    }

    public function edit(Product $product)
    {
        return view('admin.product.add-edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric',
            'image' => 'sometimes|image|max:1024',
        ]);

        if ($request->file('image')) {
            Storage::disk('public')->delete($product->image);

            $image = Storage::putFile(
                'public/products/' . date('FY'),
                $request->file('image')
            );
        }

        $product->update([
            'name' => $request->name ? $request->name : $product->name,
            'price' => $request->price ? $request->price : $product->price,
            'image' => $request->file('image') ? substr($image, 7) : $product->image,
        ]);

        return redirect(route('product.index'));
    }

    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->image);

        $product->delete();

        return redirect(route('product.index'));
    }
}

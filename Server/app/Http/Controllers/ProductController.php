<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->rating = $request->rate;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->slug = Str::slug($request->title);
        if ($request->show_in_slider) {
            $product->show_in_slider = $request->slider;
        }
        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);

                ProductImage::create([
                    'image' => $imageName,
                    'product_id' => $product->id
                ]);
            }
        }
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        $productImage = ProductImage::where('product_id', $id)->get()->first();
        return view('dashboard.products.show', ['product' => $product, 'image' => $productImage]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('dashboard.products.edit', ['categories' => $categories, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);

        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category');
        $product->rating = $request->input('rate');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->show_in_slider = $request->input('slider');
        $product->save();

        return redirect()->route('products.show', ['product' => $product->id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}

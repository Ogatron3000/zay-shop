<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sex;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::with('sex', 'categories')->orderByDesc('created_at')->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $sexes = Sex::all();
        $categories = Category::all();

        return view('admin.products.create', compact('sexes', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        // validate
        $attributes = $request->validated();

        // add slug
        $attributes['slug'] = strtolower(implode('-', explode(' ', $attributes['name'])));

        // get categoryIds and remove it from validated array
        $categoryIds = $attributes['category_ids'];
        unset($attributes['category_ids']);

        // create product
        $product = Product::create($attributes);

        // add categoryIds to pivot table
        $product->categories()->attach($categoryIds);

        return redirect()->route('admin.products.index')->with('success_message', 'Product stored successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
        $sexes = Sex::all();
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'sexes', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Controllers\UpdateProductRequest  $request
     * @param  Product                                     $product
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // validate
        $attributes = $request->validated();

        // add slug
        $attributes['slug'] = strtolower(implode('-', explode(' ', $attributes['name'])));

        // get categoryIds and remove it from validated array
        $categoryIds = $attributes['category_ids'];
        unset($attributes['category_ids']);

        // update product
        $product->update($attributes);

        // update categoryIds in pivot table
        $product->categories()->sync($categoryIds);

        return redirect()->route('admin.products.show', compact('product'))->with('success_message', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->categories()->detach();
        $product->delete();

        return redirect()->route('admin.products.index')->with('success_message', 'Product deleted successfully.');
    }
}

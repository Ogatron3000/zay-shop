<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sex;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query();

        if ( ! request()->category && ! request()->sex && ! request()->sort) {
            $products = $products->inRandomOrder();
        } else {
            if (request()->category) {
                $products = $products->with('categories')->whereHas('categories', function ($query) {
                    $query->where('slug', request()->category);
                });
            }

            if (request()->sex) {
                $products = $products->with('sex')->whereHas('sex', function ($query) {
                    $query->where('slug', request()->sex);
                });
            }

            if (request()->sort) {
                if (request()->sort === 'low_to_high') {
                    $products = $products->orderBy('price');
                }
                $products = $products->orderByDesc('price');
            }
        }

        $products = $products->paginate(9);
        $sexes = Sex::all();
        $categories = Category::all();

        return view('shop', compact('products', 'categories', 'sexes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $mightAlsoLike = Product::where('id', '!=', $product->id)->mightAlsoLike()->get();
        return view('shop-single', compact('product', 'mightAlsoLike'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

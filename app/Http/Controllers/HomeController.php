<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('featured', 1)->inRandomOrder()->take(3)->get();
        $categories = Category::where('featured', 1)->inRandomOrder()->take(3)->get();

        return view('home', compact('products', 'categories'));
    }
}

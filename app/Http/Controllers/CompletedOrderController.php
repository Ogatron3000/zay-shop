<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;

class CompletedOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->order != 'succeeded') {
            return redirect()->route('home');
        }

        return view('thanks');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if ($request->orderStatus !== 'succeeded') {
            return response()->json(['error' => 'invalid'], 401);
        }

        Cart::instance('default')->destroy();

        return response()->json(['success' => 'success'], 200);
    }
}

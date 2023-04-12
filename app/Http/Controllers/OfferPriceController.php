<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OfferPrice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offer = OfferPrice::all();
        return view('dashboard.OfferPrices.index', compact('offer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        $product = Product::all();

        return view('dashboard.OfferPrices.create', compact('product', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|integer',
            'discount' => 'required|integer',
            'tax' => 'required|integer',
            'message' => 'required|string',
            'address' => 'required|string',
        ]);

        $data = $request->all();
        $data['company_id'] = Auth::id();
        $offer = OfferPrice::create($data);
        return redirect()->route('offer_prices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\OfferPrice $offerPrice
     * @return \Illuminate\Http\Response
     */
    public function show(OfferPrice $offerPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\OfferPrice $offerPrice
     * @return \Illuminate\Http\Response
     */
    public function edit(OfferPrice $offerPrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OfferPrice $offerPrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfferPrice $offerPrice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\OfferPrice $offerPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfferPrice $offerPrice)
    {
        //
    }
}

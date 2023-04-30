<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OfferPrice;
use Illuminate\Http\Request;

class OfferPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offer=OfferPrice::all();
        return response([
            'offer'=>$offer
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|integer',
            'company_id' => 'required|integer',
            'title' => 'required|string',
            'product_id' => 'required|integer',
            'price' => 'required|integer',
            'discount' => 'required|integer',
            'tax' => 'required|integer',
            'message' => 'required|string',
            'address' => 'required|string',
        ]);

        $offer=OfferPrice::create($request->all());
        return response([
            'massage'=>'OfferPrice add successfully'
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
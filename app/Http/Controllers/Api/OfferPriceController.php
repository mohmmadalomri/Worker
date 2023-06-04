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
        $offer = OfferPrice::with('customer', 'product', 'user')->get();
        return response([
            'offer' => $offer
        ], 200);
    }

    public function serach(Request $request)
    {
        $query = $request->input('query');
        $offer = OfferPrice::query()->where('customer_id', 'like', '%' . $query . '%')->
        orwhere('company_id', 'like', '%' . $query . '%')->
        orwhere('title', 'like', '%' . $query . '%')->
        orwhere('product_id', 'like', '%' . $query . '%')->
        orwhere('price', 'like', '%' . $query . '%')->
        orwhere('discount', 'like', '%' . $query . '%')->
        orwhere('message', 'like', '%' . $query . '%')->
        orwhere('address', 'like', '%' . $query . '%')->
        orwhere('tax', 'like', '%' . $query . '%')->get();
        return response([
            'offer' => $offer
        ], 200);
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

        $offer = OfferPrice::create($request->all());
        return response([
            'massage' => 'OfferPrice add successfully'
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $offer = OfferPrice::with('customer', 'product', 'user')->findOrFail($id);
        return response()->json([
            'offer' => $offer
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $offer = OfferPrice::findOrFail($id);
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
        $data = $request->all();

        $offer->update($data);

        return response()->json([
            'massage' => 'offer updated successfully',
            'offer' => $offer
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $offer = OfferPrice::findOrFail($id)->delete();
        return response()->json([
            'massage' => 'offer delete successfully'
        ], 200);
    }
}

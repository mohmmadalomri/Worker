<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::with('company', 'customer', 'group')->get();
        return response([
            'order' => $order
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
            'title' => 'required|string',
            'details' => 'required|string',
            'notes' => 'required|string',
            'date' => 'required|string',
            'begin_date' => 'required|date',
            'customer_id' => 'required|integer',
            'company_id' => 'required|integer',
            'group_id' => 'required|integer',
        ]);

        $order = Order::create($request->all());
        return response([
            'massage' => 'successfully order add'
        ], 200);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $order = Order::with('company', 'customer', 'group')->findOrFail($id);

        return response()->json([
            'order' => $order
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
        $order = Order::findOrFail($id);
        $request->validate([
            'title' => '|string',
            'details' => '|string',
            'notes' => '|string',
            'date' => '|string',
            'begin_date' => 'date',
            'customer_id' => '|integer',
            'company_id' => '|integer',
            'group_id' => '|integer',
        ]);
        $data = $request->all();
        $order->update($data);

        return response()->json([
            'massage' => 'order updated successfully',
            'order' => $order
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
        $order = Order::findOrFail($id)->delete();
        return response()->json([
            'massage' => 'order delete successfully',
        ], 200);

    }
}

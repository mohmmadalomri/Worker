<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice=Invoice::all();
        return response([
            'invoice'=>$invoice
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
            'company_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'title' => 'required|string',
            'date' => 'required|date',
            'remaining_amount' => 'required|integer',
            'order_id' => 'required|integer',
            'value' => 'required|integer',
            'discount' => 'required|integer',
            'tax' => 'required|integer',
            'total' => 'required|integer',
            'massage' => 'required|string',
        ]);

        $invoice=Invoice::create($request->all());
        return response([
            'massage'=>'invoice add successfully'
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

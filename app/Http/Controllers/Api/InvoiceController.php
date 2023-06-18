<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Rule\InvocationOrder;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice = Invoice::with('customer', 'company', 'order')->get();
        return response([
            'invoice' => $invoice
        ], 200);
    }

    public function serach(Request $request)
    {
        $query = $request->input('query');
        $invoice = Invoice::query()->where('company_id', 'like', '%' . $query . '%')->
        orwhere('customer_id', 'like', '%' . $query . '%')->
        orwhere('title', 'like', '%' . $query . '%')->
        orwhere('date', 'like', '%' . $query . '%')->
        orwhere('remaining_amount', 'like', '%' . $query . '%')->
        orwhere('order_id', 'like', '%' . $query . '%')->
        orwhere('value', 'like', '%' . $query . '%')->
        orwhere('discount', 'like', '%' . $query . '%')->
        orwhere('total', 'like', '%' . $query . '%')->
        orwhere('massage', 'like', '%' . $query . '%')->
        orwhere('tax', 'like', '%' . $query . '%')->get();
        return response([
            'invoice' => $invoice
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
        $data['company_id'] = Auth::id();
        $data = $request->all();
        $invoiceData = $request->validate([
            'customer_id' => '|integer',
//            'company_id' => '|integer',
            'title' => '|string',
            'date' => '|date',
            'remaining_amount' => '|integer',
            'value' => '|integer',
            'discount' => '|integer',
            'tax' => '|integer',
            'order_id' => 'required',
            'total' => '|integer',
            'massage' => '|string',
            'amount' => '|integer',
        ]);
        $orderIds = $request->input('order_ids');


        $invoice = Invoice::create($invoiceData);
        $invoice->order()->attach($orderIds);


        return response([
            'massage' => 'invoice add successfully',
            '$invoice' => $invoice
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::with('customer', 'company', 'order')->findOrFail($id);
        return response([
            'invoice' => $invoice
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
        $invoice = Invoice::findOrFail($id);
        $request->validate([
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
        $data = $request->all();

        $invoice->update($request->all());

        return response()->json([
            'massage' => 'invoice update successfully',
            '$invoice' => $invoice
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id)->delete();
        return response([
            'massage' => 'invoice delete successfully'
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense = Expense::with('user')->get();
        return response([
            'expense' => $expense
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
            'name' => 'required|string',
            'purpose' => 'required|string',
            'description' => 'required|string',
            'value' => 'required|integer',
            'employee_id' => 'required|integer',
            'date' => 'required|date',
        ]);

        $data = $request->all();

        $expenses = Expense::create($data);
        return response([
            'massage' => 'Expense add successfully'
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
        $expense = Expense::with('user')->find($id);
        return response()->json([
            'expense' => $expense
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'purpose' => 'required|string',
            'description' => 'required|string',
            'value' => 'required|integer',
            'employee_id' => 'required|integer',
            'date' => 'required|date',
        ]);

        $data = $request->all();
        $expense->update($data);

        return response([
            'massage' => 'Expense update successfully',
            'expense' => $expense
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
        $expense = Expense::findOrFail($id)->delete();
        return response([
            'massage' => 'Expense delete successfully',

        ], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Salarie;
use Illuminate\Http\Request;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class SalarieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salarie = Salarie::with('employee')->get();
        return response([
            'salarie' => $salarie
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
            'employee_name' => 'required|string',
            'national_number' => 'required|integer',
            'Job_number' => 'required|integer',
            'deductions' => 'required|integer',
            'discounts' => 'required|integer',
            'tax' => 'required|integer',
            'social_security' => 'required|integer',
            'net_salary' => 'required|integer',
        ]);

        $data = $request->all();
        $salary = Salarie::create($data);
        return response([
            'massage' => 'Salarie add successfully'
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
        $salarie = Salarie::with('employee')->findOrFail($id);
        return response()->json([
            'salarie' => $salarie
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

        $salarie = Salarie::findOrFail($id);

        $request->validate([
            'employee_name' => 'string',
            'national_number' => 'integer',
            'Job_number' => 'integer',
            'deductions' => 'Numeric',
            'discounts' => 'Numeric',
            'tax' => 'Numeric',
            'social_security' => 'integer',
            'net_salary' => 'Numeric',
        ]);

        $data = $request->all();
        $salarie->update($data);
        return response()->json([
            'massage' => 'salarie updated successfully',
            'salarie' => $salarie,

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
        $salarie = Salarie::findOrFail($id)->delete();

        return response()->json([
            'massage' => 'salarie delete successfully'
        ], 200);
    }
}

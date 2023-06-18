<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Deduction;
use Illuminate\Http\Request;

class DeductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $deduction = Deduction::all();
        return response()->json([
            'deduction' => $deduction
        ], 200);
    }


    public function serach(Request $request)
    {
        $query = $request->input('query');
        $deduction = Deduction::where('description', 'like', '%' . $query . '%')
            ->orwhere('reason', 'like', '%' . $query . '%')->
            orwhere('value', 'like', '%' . $query . '%')->
            orwhere('date', 'like', '%' . $query . '%')->
            orwhere('status', 'like', '%' . $query . '%')->
            orwhere('user_id', 'like', '%' . $query . '%')->
            orwhere('supervisor_id', 'like', '%' . $query . '%')->get();
        return response([
            'deduction' => $deduction
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'string',
            'reason' => 'string',
            'value' => 'Numeric',
            'date' => 'date',
        ]);

        $data = $request->all();
        $deduction = Deduction::create($data);
        return response()->json([
            'massage' => 'deduction add successfully',
            'deduction' => $deduction
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
        $deduction = Deduction::FindOrFail($id);

        return response()->json([
            'deduction' => $deduction
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
        $deduction = Deduction::findOrFail($id);
        $request->validate([
            'description' => 'string',
            'reason' => 'string',
            'value' => 'Numeric',
            'date' => 'date',
        ]);
        $data = $request->all();
        $deduction->update($data);

        return response()->json([
            'massage' => 'deduction update successfully',
            'deduction' => $deduction
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
        $deduction = Deduction::findOrFail($id)->delete();
        return response()->json([
            'massage' => 'deduction delete successfully'
        ], 200);
    }
}

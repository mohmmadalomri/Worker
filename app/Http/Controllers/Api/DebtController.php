<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Debt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dept = Debt::with('user')->get();
        return response([
            'debt' => $dept
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
            'description' => 'required|string',
            'value' => 'required|integer',
            'employee_id' => 'required|integer',
            'image' => 'required|image',
            'specialization' => 'required|string',
            'date' => 'required|date',
        ]);

        $data = $request->all();
        $image = $request->file('image');
        $data['image'] = $this->images($image, null);
        $debt = Debt::create($data);
        return response([
            'massage' => 'Debt add successful'
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
        $debt = Debt::with('user')->find($id);
        return response()->json([
            'debt' => $debt
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
        $debt = Debt::find($id)->first();
        $data = $request->all();
        $request->validate([
            'employee_name' => 'required|string',
            'national_number' => 'required|integer',
            'Job_number' => 'required|integer',
            'description' => 'required|string',
            'value' => 'required|integer',
            'employee_id' => 'required|integer',
            'image' => 'string',
            'specialization' => 'required|string',
            'date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $oldimage = $debt->image;
            $image = $request->file('image');
            $data['image'] = $this->images($image, $oldimage);
        }
        $debt->update($data);
        return response()->json([
            'massage' => 'Debt update successful',
            'debt' => $debt
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
        $debt = Debt::find($id)->delete();

        return response()->json([
            'massage' => 'Debt delete successful'
        ], 200);
    }
}

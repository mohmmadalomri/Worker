<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $jop = Job::all();
        return response()->json([
            'jop' => $jop
        ], 200);
    }

    public function serach(Request $request)
    {
        $query = $request->input('query');
        $jop = Job::query()->where('title', 'like', '%' . $query . '%')->
        orwhere('Instructions', 'like', '%' . $query . '%')->
        orwhere('product_id', 'like', '%' . $query . '%')->
        orwhere('subtotal', 'like', '%' . $query . '%')->
        orwhere('schedule', 'like', '%' . $query . '%')->
        orwhere('group_id', 'like', '%' . $query . '%')->
        orwhere('company_id', 'like', '%' . $query . '%')->
        orwhere('work', 'like', '%' . $query . '%')->get();
        return response([
            'jop' => $jop
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
            'title' => 'required|string',
            'Instructions' => 'required|string',
            'work' => 'required|string',
            'subtotal' => 'required|Numeric',
            'schedule' => 'required|date',
        ]);
        $data = $request->all();
        $data['company_id'] = Auth::id();
        $jop = Job::create($data);

        return response()->json([
            'massage' => 'jop add successfully',
            'jop' => $jop
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
        $jop = Job::FindOrFail($id);
        return response()->json([
            'jop' => $jop
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
        $jop = Job::FindOrFail($id);

        $request->validate([
            'title' => '|string',
            'Instructions' => '|string',
            'work' => '|string',
            'subtotal' => '|Numeric',
            'schedule' => '|date',
        ]);
        $data = $request->all();
        $jop->update($data);
        return response()->json([
            'massage' => 'jop update successfully',
            'jop' => $jop
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
        $jop = Job::FindOrFail($id)->delete();
        return response()->json([
            'massage' => 'jop delete successfully',

        ], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Occupation;
use Illuminate\Http\Request;

class OccupationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $occupation = Occupation::with('coustomer')->get();
        return response()->json([
            'occupation' => $occupation
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
            'name' => 'required|string',
            'image' => 'required',
            'description' => 'required|string',
            'customer_id' => 'required|integer',
        ]);
        $data = $request->all();

        $image = $request->file('image');
        $data['image'] = $this->images($image, null);
        $occupation = Occupation::create($data);
        return response()->json([
            'massage' => 'occupation add successfully',
            'occuption' => $occupation
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
        $occupation = Occupation::with('coustomer')->findOrFail($id);
        return response()->json([
            'occupation' => $occupation
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
        $occupation = Occupation::findOrFail($id);

        $request->validate([
            'name' => '|string',
            'image' => 'string',
            'description' => '|string',
            'customer_id' => '|integer',
        ]);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $oldimage = $occupation->image;
            $image = $request->file('image');
            $data['image'] = $this->images($image, $oldimage);
        }
        $occupation->update($data);

        return response()->json([
            'massage' => 'occupation updated successfully',
            'occuption' => $occupation
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
        $occupation = Occupation::findOrFail($id)->delete();
        return response()->json([
            'massage' => 'occupation delete successfully'
        ], 200);
    }
}

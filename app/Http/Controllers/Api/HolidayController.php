<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $holiday = Holiday::with('user')->get();
        return response()->json([
            'holiday' => $holiday
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
            'name' => 'string|required',
            'image' => 'image|required',
            'number_of_day' => 'string|required',
        ]);
        $data = $request->all();
        $image = $request->file('image');
        $data['image'] = $this->images($image, null);
        $data['user_id'] = Auth::id();
        $holiday = Holiday::create($data);

        return response()->json([
            'massage' => 'Holiday add successfully',
            'holiday' => $holiday
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
        $holiday = Holiday::with('user')->findOrFail($id);
        return response()->json([
            'holiday' => $holiday
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
        $holiday = Holiday::findOrFail($id);
        $request->validate([
            'name' => 'string|required',
            'number_of_day' => 'string|required',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $oldimage = $holiday->image;
            $image = $request->file('image');
            $data['image'] = $this->images($image, $oldimage);
        }

        $holiday->update($data);

        return response()->json([
            'massage' => 'holiday update successfully',
            'holiday' => $holiday
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
        $holiday = Holiday::findOrFail($id)->delete();
        return response()->json([
            'massage' => 'holiday delete successfully'
        ], 200);
    }
}

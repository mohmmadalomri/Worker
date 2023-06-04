<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TaskEmployee;
use Illuminate\Http\Request;

class TaskEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TaskEmployee = TaskEmployee::with('employee')->get();
        return response([
            'TaskEmployee' => $TaskEmployee
        ], 200);
    }

    public function serach(Request $request)
    {
        $query = $request->input('query');
        $TaskEmployee = TaskEmployee::query()->where('user_id', 'like', '%' . $query . '%')->
        orwhere('employee_name', 'like', '%' . $query . '%')->
        orwhere('task_number', 'like', '%' . $query . '%')->
        orwhere('national_number', 'like', '%' . $query . '%')->
        orwhere('Job_number', 'like', '%' . $query . '%')->
        orwhere('name', 'like', '%' . $query . '%')->
        orwhere('description', 'like', '%' . $query . '%')->

        orwhere('massage', 'like', '%' . $query . '%')->get();
        return response([
            'TaskEmployee' => $TaskEmployee
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
            'employee_name' => 'required|string|max:255',
            'national_number' => 'required|integer',
            'user_id' => 'required|integer',
            'Job_number' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'massage' => 'required|string',
            'image' => 'required|image',
        ]);
        $data = $request->all();
        $image = $request->file('image');
        $data['image'] = $this->images($image, null);
        $TaskEmployee = TaskEmployee::create($data);
        return response([
            'massage' => 'TaskEmployee add successfully',
            'TaskEmployee' => $TaskEmployee
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $TaskEmployee = TaskEmployee::with('employee')->findOrFail($id);

        return response()->json([
            'TaskEmployee' => $TaskEmployee
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

        $TaskEmployee = TaskEmployee::findOrFail($id);

        $request->validate([
            'employee_name' => 'required|string|max:255',
            'national_number' => 'required|integer',
            'user_id' => 'required|integer',
            'Job_number' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'massage' => 'required|string',
            'image' => 'required|image',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $oldimage = $TaskEmployee->image;
            $image = $request->file('image');
            $data['image'] = $this->images($image, $oldimage);
        }
        $TaskEmployee->update($data);

        return response()->json([
            'massage' => "Task updated successfully",
            'TaskEmployee' => $TaskEmployee
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
        $TaskEmployee = TaskEmployee::findOrFail($id)->delete();
        return response()->json([
            'massage' => "Task delete successfully",
        ], 200);
    }
}

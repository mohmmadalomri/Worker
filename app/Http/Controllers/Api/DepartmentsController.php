<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Departments::with('company')->get();
        return response([
            'department' => $department
        ], 200);
    }

    public function serach(Request $request)
    {
        $query = $request->input('query');
        $departments = Departments::where('name', 'like', '%' . $query . '%')
            ->orwhere('company_id', 'like', '%' . $query . '%')->
            orwhere('description', 'like', '%' . $query . '%')->
            get();
        return response([
            'departments' => $departments
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required|image',
            'company_id' => 'required|integer',
        ]);

        $data = $request->all();
        $image = $request->file('image');
        $data['image'] = $this->images($image, null);
        $departmint = Departments::create($data);
        return response([
            'massage' => 'Departments add successfully'
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
        $department = Departments::with('company')->find($id);

        return response()->json([
            'department' => $department
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
        $department = Departments::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',

            'company_id' => 'required|integer',
        ]);

        $data = $request->all();
        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $oldimage = $department->image;
            $data['image'] = $this->images($image, $oldimage);
        }
        $department->update($data);
        return response()->json([
            'massage' => "department updated successfully",
            'department' => $department
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
        $department = Departments::find($id);
        $department->delete();
        return response()->json([
            'massage' => "department delete successfully"
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $project = Project::with('customer', 'product', 'supervisor')->
        where('user_id', Auth::id())->get();

        return response()->json([
            'project' => $project
        ], 200);
    }

    public function serach(Request $request)
    {
        $query = $request->input('query');
        $project = Project::query()->where('name', 'like', '%' . $query . '%')->
        orwhere('customer_id', 'like', '%' . $query . '%')->
        orwhere('product_id', 'like', '%' . $query . '%')->
        orwhere('price', 'like', '%' . $query . '%')->
        orwhere('grope_id', 'like', '%' . $query . '%')->
        orwhere('supervisor_id', 'like', '%' . $query . '%')->
        orwhere('total_price', 'like', '%' . $query . '%')->
        orwhere('began_date', 'like', '%' . $query . '%')->
        orwhere('end_date', 'like', '%' . $query . '%')->

        orwhere('user_id', 'like', '%' . $query . '%')->get();
        return response([
            'project' => $project
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
            'description' => 'string',
            'price' => 'integer|required',
            'total_price' => 'integer|',
            'image' => 'image',
        ]);
        $data = $request->all();

        $data['user_id'] = Auth::id();
        $image = $request->file('image');
        $data['image'] = $this->images($image, null);
        $project = Project::create($data);

        return response()->json([
            'masseg' => 'project add sucssessfuly',
            'project' => $project
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
        $project = Project::with('customer', 'product', 'supervisor')->findOrFail($id);
        return response()->json([
            'project' => $project
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

        $project = Project::findOrFail($id);
        $request->validate([
            'name' => '|string',
            'description' => 'string',
            'price' => 'integer|',
            'total_price' => 'integer|',
            'image' => 'string',
        ]);
        $data = $request->all();


        if ($request->hasFile('iamge')) {
            $oldimage = $project->image;
            $image = $request->file('image');
            $data['image'] = $this->images($image, $oldimage);
        }

        $project->update($data);
        return response()->json([
            'massage' => 'project updated successfully',
            'project' => $project,
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
        $project = Project::findOrFail($id)->delete();
        return response()->json([
            'massage' => 'project delete  successfully'
        ], 200);
    }
}

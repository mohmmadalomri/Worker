<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = Task::with('project', 'company', 'customer', 'group')->get();
        return response([
            'task' => $task
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'date' => 'required|date',
            'group_id' => 'required|integer',
        ]);

        $task = Task::create($request->all());
        return response([
            'massage' => 'task add successfully'
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
        $task = Task::with('project', 'company', 'customer', 'group')->findOrFail($id);

        return response()->json([
            'task' => $task
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

        $task = Task::findOrFail($id);
        $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'company_id' => 'integer',
            'customer_id' => 'integer',
            'date' => 'date',
            'group_id' => 'integer',
        ]);
        $data = $request->all();
        $task->update($data);
        return response()->json([
            'massage' => 'task updated successfully',
            'task' => $task
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
        $task = Task::findOrFail($id)->delete();
        return response()->json([
            'massage' => 'task delete successfully'
        ], 200);

    }
}

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
        $TaskEmployee=TaskEmployee::all();
        return response([
            'TaskEmployee'=>$TaskEmployee
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        $TaskEmployee=TaskEmployee::create($data);
        return response([
            'massage'=>'TaskEmployee add successfully'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

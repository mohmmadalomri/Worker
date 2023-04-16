<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
        return  response([
            'user'=>$user
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
        $validatedData= $request->validate([
            'email'=>'required|email|string',
            'name'=>'required|string',
            'national_number'=>'required|integer',
            'Job_number'=>'required|integer','working_days',
            'total_salary'=>'required|integer',
            'manger_id'=>'required|integer',
            'date_of_birth'=>'required|date',
            'Date_of_employee_registration_in_system'=>'required|date',
            'Date_of_employee_registration_in_company'=>'required|date',

        ]);
        $data=$request->all();
        $data['password']=Hash::make($request->Job_number);
        $user=User::create($data);
        return response([
            'massage'=>'user add successfully'
        ],200);

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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = User::with('user')->get();
        return response([
            'user' => $user
        ], 200);
    }

    public function serach(Request $request)
    {
        $query = $request->input('query');
        $user = User::where('name', 'like', '%' . $query . '%')
            ->orwhere('type', 'like', '%' . $query . '%')->
            orwhere('email', 'like', '%' . $query . '%')->
            orwhere('password', 'like', '%' . $query . '%')->
            orwhere('type', 'like', '%' . $query . '%')->
            orwhere('username', 'like', '%' . $query . '%')->
            orwhere('phone', 'like', '%' . $query . '%')->
            orwhere('Company_Name', 'like', '%' . $query . '%')->
            orwhere('Company_Address', 'like', '%' . $query . '%')->
            orwhere('Company_Address_2', 'like', '%' . $query . '%')->
            orwhere('City', 'like', '%' . $query . '%')->
            orwhere('Postal_code', 'like', '%' . $query . '%')->
            orwhere('Country', 'like', '%' . $query . '%')->
            orwhere('Company_email', 'like', '%' . $query . '%')->
            orwhere('national_number', 'like', '%' . $query . '%')->
            orwhere('date_of_birth', 'like', '%' . $query . '%')->
            orwhere('Job_number', 'like', '%' . $query . '%')->
            orwhere('Date_of_employee_registration_in_system', 'like', '%' . $query . '%')->
            orwhere('Date_of_employee_registration_in_company', 'like', '%' . $query . '%')->
            orwhere('Beginning_work', 'like', '%' . $query . '%')->
            orwhere('finished_work', 'like', '%' . $query . '%')->
            orwhere('department_id', 'like', '%' . $query . '%')->
            orwhere('status', 'like', '%' . $query . '%')->
            orwhere('total_salary', 'like', '%' . $query . '%')->
            orwhere('partial_salary', 'like', '%' . $query . '%')->
            orwhere('bonuses', 'like', '%' . $query . '%')->
            orwhere('overtime', 'like', '%' . $query . '%')->
            orwhere('manger_id', 'like', '%' . $query . '%')->
            orwhere('group_id', 'like', '%' . $query . '%')->
            get();
        return response([
            'user' => $user
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
        $validatedData = $request->validate([
            'email' => 'required|email|string',
            'name' => 'required|string',
            'national_number' => 'required|integer',
            'Job_number' => 'required|integer', 'working_days',
            'total_salary' => 'required|integer',
            'date_of_birth' => 'required|date',
            'Date_of_employee_registration_in_system' => 'required|date',
            'Date_of_employee_registration_in_company' => 'required|date',

        ]);
        $data = $request->all();

        $image = $request->file('image');
        $data['image'] = $this->images($image, null);
        $data['password'] = Hash::make($request->Job_number);
        $data['manger_id'] = Auth::id();
        $user = User::create($data);
        return response([
            'massage' => 'user add successfully'
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
        $user = User::with('user')->find($id);
        return response()->json([
            'user' => $user
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
        $user = User::find($id);
        $data = $request->all();
        $request->validate([
            'email' => 'required|email|string',
            'name' => 'required|string',
            'national_number' => 'required|integer',
            'Job_number' => 'required|integer', 'working_days',
            'total_salary' => 'required|integer',
            'manger_id' => 'required|integer',
            'date_of_birth' => 'required|date',
            'Date_of_employee_registration_in_system' => 'required|date',
            'Date_of_employee_registration_in_company' => 'required|date',
        ]);

        $user->update($data);
        return response()->json([
            'massage' => "user updated successfully",
            'user' => $user
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
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'massage' => "user deleted successfully",

        ], 200);
    }
}

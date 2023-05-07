<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('type', 'user')->where('manger_id', Auth::id())->get();
//        $user=User::where('manger_id',Auth::id())->get();
        return view('dashboard.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        $departmint = Departments::all();
        return view('dashboard.user.create', compact('departmint'));
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
        $image=$request->file('image');
        $data['image']=$this->images($image,null);

        $data['password'] = Hash::make($request->Job_number);
        $data['manger_id'] = Auth::id();
        $user = User::create($data);
        return redirect()->route('user.index');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = User::find($id)->first();
        return response()->json([
            'employee_name' => $user->name,
            'national_number' => $user->national_number,
            'date' => $user->date,
            'Job_number' => $user->Job_number,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

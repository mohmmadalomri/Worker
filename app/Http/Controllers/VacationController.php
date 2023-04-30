<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\User;
use App\Models\Vacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacation = Vacation::all();
        return view('Dashboard.vacation.index', compact('vacation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vacation=Vacation::all();
        $specialization=Departments::all();
        $users=User::all();
        return view('dashboard.vacation.create',compact('specialization','users','vacation'));
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
            'employee_name' => 'required|string',
            'national_number' => 'required|integer',
            'Job_number' => 'required|integer',
            'description' => 'required|string',
            'reason' => 'required|string',
        ]);

        $data=$request->all();
        $image=$request->file('image');
        $data['image']=$this->images($image,null);
        $data['employee_id']=Auth::id();
        $vacation=Vacation::create($data);
        return redirect()->route('vacation.index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Vacation $vacation
     * @return \Illuminate\Http\Response
     */
    public function show(Vacation $vacation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Vacation $vacation
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacation $vacation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vacation $vacation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacation $vacation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Vacation $vacation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacation $vacation)
    {
        //
    }
}

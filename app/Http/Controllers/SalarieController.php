<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Salarie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalarieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaries=Salarie::all();
        return view('dashboard.salaries.index',compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salaries=Salarie::all();
        $user=User::where('manger_id',Auth::id())->get();
        $section=Departments::all();
        return view('dashboard.salaries.create',compact('user','salaries','section'));
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
            'employee_name' => 'required|string',
            'national_number' => 'required|integer',
            'Job_number' => 'required|integer',
            'deductions' => 'required|integer',
            'discounts' => 'required|integer',
            'tax' => 'required|integer',
            'social_security' => 'required|integer',
            'net_salary' => 'required|integer',
        ]);

        $data=$request->all();
        $salary=Salarie::create($data);
        return redirect()->route('salaries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function show(Salarie $salarie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function edit(Salarie $salarie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salarie $salarie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salarie $salarie)
    {
        //
    }
}

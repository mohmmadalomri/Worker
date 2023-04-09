<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Departments::all();
        return view('Dashboard.Department.index', compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Dashboard.Department.create');
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
        ]);

        $data = $request->all();
        $image = $request->file('image');
        $data['image'] = $this->images($image, null);
        $data['company_id'] = Auth::user()->getAuthIdentifier();
        $departmint = Departments::create($data);
        return redirect()->route('departmint.index');


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Departments $departments
     * @return \Illuminate\Http\Response
     */
    public function show(Departments $departments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Departments $departments
     * @return \Illuminate\Http\Response
     */
    public function edit(Departments $departments)
    {
        $department = Departments::find($departments)->first();

        return view('Dashboard.Department.create', compact('department'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Departments $departments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departments $departments)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required|image',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $oldimage = $departments->image;
            $image = $request->file('image');
            $data['image'] = $this->images($image, $oldimage);
        }

        $departments->updat($data);
        return redirect()->route('departmint.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Departments $departments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departments = Departments::find($id);
        $departments->delete();


        return redirect()->route('departmint.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TaskEmployee;
use App\Models\User;
use Faker\Core\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class TaskEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = TaskEmployee::all();
        return view('dashboard.taskemployees.index', compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = User::all();

        return view('dashboard.taskemployees.create', compact('user'));

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
            'employee_name' => 'required|string|max:255',
            'national_number' => 'required|integer',
            'Job_number' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'massage' => 'required|string',
        ]);
        $data = $request->all();
        $image = $request->file('image');
        $data['image'] = $this->images($image, null);
        $data['task_number'] = Str::random(8);
        $task = TaskEmployee::create($data);
        return redirect()->route('task_employees.index');


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TaskEmployee $taskEmployee
     * @return \Illuminate\Http\Response
     */
    public function show(TaskEmployee $taskEmployee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TaskEmployee $taskEmployee
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskEmployee $taskEmployee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaskEmployee $taskEmployee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskEmployee $taskEmployee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TaskEmployee $taskEmployee
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskEmployee $taskEmployee)
    {
        //
    }
}

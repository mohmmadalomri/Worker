<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;

class VacationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacation = Vacation::with('user')->get();
        return response([
            'vacation' => $vacation
        ], 200);

    }

    public function history()
    {
        $vacation = Vacation::query()->where('employee_id', Auth::id())->get();
        return response()->json([
            'vacation' => $vacation
        ], 200);

    }


    public function serach(Request $request)
    {
        $query = $request->input('query');
        $vacation = Vacation::where('employee_name', 'like', '%' . $query . '%')
            ->orwhere('employee_id', 'like', '%' . $query . '%')->
            orwhere('national_number', 'like', '%' . $query . '%')->
            orwhere('Job_number', 'like', '%' . $query . '%')->
            orwhere('specialization', 'like', '%' . $query . '%')->
            orwhere('description', 'like', '%' . $query . '%')->
            orwhere('reason', 'like', '%' . $query . '%')->
            orwhere('type', 'like', '%' . $query . '%')->
            orwhere('end_day', 'like', '%' . $query . '%')->
            orwhere('start_day', 'like', '%' . $query . '%')->get();
        return response([
            'vacation' => $vacation
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
            'employee_name' => 'required|string',
            'national_number' => 'required|integer',
            'Job_number' => 'required|integer',
            'employee_id' => 'required|integer',
            'description' => 'required|string',
            'reason' => 'required|string',
        ]);

        $totalVacation = 21;
        $vacationall = Vacation::query()->where('employee_id', Auth::id())->count();

        $reimannigVacation=$totalVacation-$vacationall;


        if ($vacationall >= $totalVacation) {
            return response()->json([
                'massage' => "you spend all vacation you have"
            ], 200);
        } else {


            $data = $request->all();
            $image = $request->file('image');
            $data['image'] = $this->images($image, null);
            $vacation = Vacation::create($data);

            return response()->json([
                'massage' => 'vacation add successful',
                'totalVacation' => $totalVacation,
                'vacationall' => $vacationall,
                'reimannigVacation' => $reimannigVacation,

                'vacation' => $vacation,
            ], 200);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacation = Vacation::with('user')->find($id);
        return response([
            'vacation' => $vacation
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
        $vacation = Vacation::find($id);

        $request->validate([
            'employee_name' => 'required|string',
            'national_number' => 'required|integer',
            'Job_number' => 'required|integer',
            'employee_id' => 'required|integer',
            'description' => 'required|string',
            'reason' => 'required|string',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $oldimage = $vacation->image;
            $image = $request->file('image');
            $data['image'] = $this->images($image, $oldimage);
        }

        $vacation->update($data);
        return response()->json([
            'massage' => 'vacation update successful',
            'vacation' => $vacation,
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
        $vacation = Vacation::find($id);
        $vacation->delete();

        return response()->json([
            'massage' => 'vacation delete successful',

        ], 200);

    }
}

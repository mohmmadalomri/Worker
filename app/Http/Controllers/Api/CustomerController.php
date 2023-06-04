<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::with('user')->get();
        return response([
            'customer' => $customer
        ], 200);
    }



    public function serach(Request $request)
    {
        $query = $request->input('query');
        $customer = Customer::query()->where('company_id', 'like', '%' . $query . '%')
            ->orwhere('first_name', 'like', '%' . $query . '%')->
            orwhere('last_name', 'like', '%' . $query . '%')->
            orwhere('company_name', 'like', '%' . $query . '%')->
            orwhere('phone', 'like', '%' . $query . '%')->
            orwhere('email', 'like', '%' . $query . '%')->
            orwhere('website', 'like', '%' . $query . '%')->
            orwhere('town', 'like', '%' . $query . '%')->
            orwhere('interrupt', 'like', '%' . $query . '%')->
            orwhere('address_1', 'like', '%' . $query . '%')->
            orwhere('zipcode', 'like', '%' . $query . '%')->
            orwhere('country', 'like', '%' . $query . '%')->
            orwhere('address_2', 'like', '%' . $query . '%')->get();

        return response([
            'customer' => $customer
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_name' => 'required|string',
            'phone' => 'required|integer',
            'website' => 'required|string',
            'facebook_link' => 'required|string',
            'tweeter_link' => 'required|string',
            'youtube_link' => 'required|string',
            'linkedin_link' => 'required|string',
            'instgram_link' => 'required|string',
            'address_1' => 'required|string',
            'address_2' => 'required|string',
            'town' => 'required|string',
            'interrupt' => 'required|string',
            'zipcode' => 'required|string',
            'country' => 'required|string',
//            'company_id' => 'required|integer',
        ]);

        $data = $request->all();
        $data['company_id'] = Auth::id();

        $customer = Customer::create($data);
        return response([
            'massage' => 'customer add successfully',
            'customer' => $customer
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $customer = Customer::with('user')->find($id);
        return response()->json([
            'customer' => $customer
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
        $customer = Customer::find($id);
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_name' => 'required|string',
            'phone' => 'required|integer',
            'website' => 'required|string',
            'facebook_link' => 'required|string',
            'tweeter_link' => 'required|string',
            'youtube_link' => 'required|string',
            'linkedin_link' => 'required|string',
            'instgram_link' => 'required|string',
            'address_1' => 'required|string',
            'address_2' => 'required|string',
            'town' => 'required|string',
            'interrupt' => 'required|string',
            'zipcode' => 'required|string',
            'country' => 'required|string',

        ]);
        $data = $request->all();
        $customer->update($data);

        return response()->json([
            'massage' => 'customer updated successfully',
            'customer' => $customer
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
        $customer = Customer::find($id)->delete();
        return response()->json([
            'massage' => 'customer deleted successfully',

        ], 200);
    }
}

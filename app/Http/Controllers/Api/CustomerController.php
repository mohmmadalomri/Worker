<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
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
            'company_id' => 'required|integer',
        ]);

        $data = $request->all();

        $customer = Customer::create($data);
        return response([
            'massage' => 'customer add successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

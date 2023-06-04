<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('company')->get();
        return response([
            'product' => $product
        ]);
    }


    public function serach(Request $request)
    {
        $query = $request->input('query');
        $product = Product::query()->where('company_id', 'like', '%' . $query . '%')
            ->orwhere('name', 'like', '%' . $query . '%')->
            orwhere('description', 'like', '%' . $query . '%')->
            orwhere('price', 'like', '%' . $query . '%')->
            orwhere('quantity', 'like', '%' . $query . '%')->
            orwhere('type', 'like', '%' . $query . '%')->get();

        return response([
            'product' => $product
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
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'type' => 'required|string',
            'company_id' => 'required|integer',
            'image' => 'string',
        ]);

        $data = $request->all();
        $image = $request->file('image');
        $data['image'] = $this->images($image, null);
        $product = Product::create($data);
        return response([
            'massage' => 'product add successfully'
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
        $product = Product::with('company')->findOrFail($id);

        return response()->json([
            'product' => $product
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
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $oldimage = $product->image;
            $image = $request->file('image');
            $data['image'] = $this->images($image, $oldimage);
        }
        $product->update($data);

        return response()->json([
            'massage' => 'product updated successfully',
            'product' => $product
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
        $product = Product::findOrFail($id)->delete();
        return response()->json([
            'massage' => 'product delete successfully'
        ], 200);

    }
}

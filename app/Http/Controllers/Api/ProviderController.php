<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider;
use Exception;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            try {
                $providers = Provider::all();
                return response()->json(['status' => 200, 'data' => $providers]);
            } catch (Exception $e) {
                return response()->json(['status' => 204, 'message' => $e->getMessage()], 204);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'products' => 'required',
        'phoneNumber' => 'required',
    ]);

    $provider = new Provider;
    $provider->name = $request->name;
    $provider->products = $request->products;
    $provider->phoneNumber = $request->phoneNumber;
    $provider->save();

    return response()->json($provider, 201);
}
    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $provider = Provider::find($id);

    if (!$provider) {
        return response()->json(['error' => 'Provider not found'], 404);
    }

    return response()->json($provider, 200);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'products' => 'required',
        'phoneNumber' => 'required',
    ]);

    $provider = Provider::find($id);

    if (!$provider) {
        return response()->json(['error' => 'Provider not found'], 404);
    }

    $provider->name = $request->name;
    $provider->products = $request->products;
    $provider->phoneNumber = $request->phoneNumber;
    $provider->save();

    return response()->json($provider, 200);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $provider = Provider::find($id);

    if (!$provider) {
        return response()->json(['error' => 'Provider not found'], 404);
    }

    $provider->delete();

    return response()->json(null, 204);
}
}

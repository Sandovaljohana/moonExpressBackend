<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Exception;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $services = Service::with(['user', 'provider', 'product'])->get();
            return response()->json(['status' => 200, 'data' => $services]);
        } catch (Exception $e) {
            return response()->json(['status' => 204, 'message' => $e->getMessage()], 204);
        }
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'provider_id' => 'required|exists:providers,id',
        'product_id' => 'required|exists:products,id',
        'destinationAdress' => 'required',
        'serviceStatus' => 'required',
        'payment' => 'required',
    ]);

    $service = new Service;
    $service->user_id = $request->user_id;
    $service->provider_id = $request->provider_id;
    $service->product_id = $request->product_id;
    $service->destinationAdress = $request->destinationAdress;
    $service->serviceStatus = $request->serviceStatus;
    $service->payment = $request->payment;
    $service->save();

    return response()->json($service, 201);
}

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $service = Service::find($id);

    if (!$service) {
        return response()->json(['error' => 'Service not found'], 404);
    }

    return response()->json($service, 200);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'provider_id' => 'required|exists:providers,id',
        'product_id' => 'required|exists:products,id',
        'destinationAdress' => 'required',
        'serviceStatus' => 'required',
        'payment' => 'required',
    ]);

    $service = Service::find($id);

    if (!$service) {
        return response()->json(['error' => 'Service not found'], 404);
    }

    $service->user_id = $request->user_id;
    $service->provider_id = $request->provider_id;
    $service->product_id = $request->product_id;
    $service->destinationAdress = $request->destinationAdress;
    $service->serviceStatus = $request->serviceStatus;
    $service->payment = $request->payment;
    $service->save();

    return response()->json($service, 200);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $service = Service::find($id);

    if (!$service) {
        return response()->json(['error' => 'Service not found'], 404);
    }

    $service->delete();

    return response()->json(null, 204);
}


}

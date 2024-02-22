<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            try {
                $users = User::all();
                return response()->json(['status' => 200, 'data' => $users]);
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
        'lastname' => 'required',
        'email' => 'required|email|unique:users',
        'phoneNumber' => 'required',
    ]);

    $user = new User;
    $user->name = $request->name;
    $user->lastname = $request->lastname;
    $user->email = $request->email;
    $user->phoneNumber = $request->phoneNumber;
    $user->save();

    return response()->json($user, 201);
}
    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    return response()->json($user, 200);
}

    /**
     * Update the specified resource in storage.
     */
    
        public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'phoneNumber' => 'required',
    ]);

    $user = User::find($id);

    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    $user->name = $request->name;
    $user->lastname = $request->lastname;
    $user->email = $request->email;
    $user->phoneNumber = $request->phoneNumber;
    $user->save();

    return response()->json($user, 200);
}
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    $user->delete();

    return response()->json(null, 204);
}

}
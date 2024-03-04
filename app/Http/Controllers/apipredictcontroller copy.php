<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dummy;

class apidummyController extends Controller
{
    public function index()
{
    // Fetch all records
    $dummies = predict::all();
    return response()->json($dummies);
}

public function show($id)
{
    // Fetch a single record by ID
    $predict = predict::find($id);
    return response()->json($predict);
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'time' => 'required',
        'CO2' => 'required',
    ]);
    $predict = predict::create($request->all());
    return response()->json($predict, 201);
    
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'time' => 'required',
        'CO2' => 'required',
    ]);

    // Update a record by ID
    $predict = predict::findOrFail($id);
    $predict->update($request->all());
    return response()->json($predict, 200);
}

public function destroy($id)
{
    // Delete a record by ID
    $predict = predict::findOrFail($id);
    $predict->delete();
    return response()->json(null, 204);
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dummy;

class apidummyController extends Controller
{
    public function index()
{
    // Fetch all records
    $dummies = Dummy::all();
    return response()->json($dummies);
}

public function show($id)
{
    // Fetch a single record by ID
    $dummy = Dummy::find($id);
    return response()->json($dummy);
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'time' => 'required',
        'CO2' => 'required',
    ]);

    try {
        // Your data creation logic
        $dummy = Dummy::create($request->all());
        return response()->json($dummy, 201);
    } catch (\Exception $e) {
        \Log::error('Error creating data: ' . $e->getMessage());
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'time' => 'required',
        'CO2' => 'required',
    ]);

    // Update a record by ID
    $dummy = Dummy::findOrFail($id);
    $dummy->update($request->all());
    return response()->json($dummy, 200);
}

public function destroy($id)
{
    // Delete a record by ID
    $dummy = Dummy::findOrFail($id);
    $dummy->delete();
    return response()->json(null, 204);
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dummy;

class apidummycontroller extends Controller
{
    public function index()
{
    // Fetch all records
    $dummies = Dummy::all();
    return response()->json($dummies);
}

public function show($count)
{
    // Fetch the latest $count records
    $latestData = Dummy::orderBy('time', 'desc')->take($count)->get();
    return response()->json($latestData);
}




public function store(Request $request)
{
    $validatedData = $request->validate([
        'time' => 'required',
        'CO2' => 'required',
    ]);
    $dummy = Dummy::create($request->all());
    return response()->json($dummy, 201);
    
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

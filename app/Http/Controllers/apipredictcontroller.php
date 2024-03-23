<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\predict;
use Illuminate\Validation\Rule;
use carbon\carbon;


class apipredictcontroller extends Controller
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
        'time' => ['required'],
        'CO2' => 'required',
    ]);

    // Parse timestamp
    $time = Carbon::parse($request->input('time'))->format('Y-m-d H:00:00');

    // Find an existing record based on the timestamp
    $predict = Predict::where('time', $time)->first();

    if ($predict) {
        // If record exists, update its CO2 value
        $predict->update(['CO2' => $request->input('CO2')]);
    } else {
        // If record doesn't exist, create a new one
        $predict = Predict::create([
            'time' => $time,
            'CO2' => $request->input('CO2'),
        ]);
    }

    return response()->json($predict, 201);
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'time' => 'required',
        'CO2' => 'required',
    ]);

    // Parse timestamp
    

    // Update a record by ID
    $predict = Predict::findOrFail($id);
    $predict->update([
        'CO2' => $request->input('CO2')
    ]);
    
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

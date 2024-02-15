<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dummy;

class dummyController extends Controller
{
    public function index()
    {
        $dummy = dummy::all();
        return view('dummy.index', compact('dummy'));
    }
    public function store()
    {
        $dummy = new dummy;
        $dummy-> time = $request->time;
        $dummy-> CO2 = $request->CO2;
        $dummy->save();
        return response()->json([
            "message" => "data Added"
        ]);

    }
}

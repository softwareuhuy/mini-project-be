<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataActual;

class DataActualController extends Controller
{
    public function index()
    {
        $dataActual = DataActual::all();
        return view('data_actual.index', compact('dataActual'));
    }
}

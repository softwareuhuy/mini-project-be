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
}

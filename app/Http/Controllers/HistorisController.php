<?php

namespace App\Http\Controllers;

use App\Models\Historis;
use Illuminate\Http\Request;

class HistorisController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');

        // If start and end parameters are provided, filter the data
        if ($start && $end) {
            $historis = Historis::whereBetween('time', [$start, $end])->get();
        } else {
            // Otherwise, fetch all data
            $historis = Historis::all();
        }

        return view('historis.index', ['historis' => $historis]);
    }

}

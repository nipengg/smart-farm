<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrafikController extends Controller
{

    public function grafik()
    {
        return view('dataSensor.datagrafik');
    }

    public function table(Request $request)
    {
        return view('dataSensor.datatable');
    }
}

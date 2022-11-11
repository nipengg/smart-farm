<?php

namespace App\Http\Controllers;

use App\Models\Lahan;
use App\Models\LahanData;
use Illuminate\Http\Request;

class GrafikController extends Controller
{

    public function grafik()
    {
        return view('datasensor.datagrafik');
    }

    public function table(Request $request)
    {
        $id = $request->pool;
        $from = $request->from;
        $to = $request->to;

        if ($id == NULL) {
            $dataLahan = Lahan::all();
            if ($dataLahan->isEmpty()) {
                $id = null;
            } else {
                $first = $dataLahan->first();
                $id = $first->id;
            }
        }

        if ($from == NULL && $to == NULL) {
            $data = LahanData::where("lahan_id", $id)->orderBy('created_at', 'desc')->get();
        } else {
            $data = LahanData::where("lahan_id", $id)->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
        }


        return view('dataSensor.datatable', [
            'dataLahan' => $dataLahan,
            'data' => $data,
            'id' => $id,
            'from' => $from,
            'to' => $to,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Lahan;
use App\Models\LahanData;
use Illuminate\Http\Request;

class GrafikController extends Controller
{

    public function grafik(Request $request)
    {
        $id = $request->id;
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

        $dataLahan = Lahan::all();

        // if ($from == NULL && $to == NULL) {
        //     $ph = LahanData::select('ph_val', 'created_at')->where("lahan_id", $id)->latest()->limit(20)->get();
        //     $temperature = LahanData::select('temp_val', 'created_at')->where("lahan_id", $id)->latest()->limit(20)->get();
        // } else {
        //     $ph = LahanData::select('ph_val', 'created_at')->where("lahan_id", $id)->latest()->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
        //     $temperature = LahanData::select('temp_val', 'created_at')->where("lahan_id", $id)->latest()->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
        // }

        if ($from != NULL && $to != NULL) {
            $data = LahanData::where("lahan_id", "=", $id)
                ->where("created_at", ">=", $from)
                ->where("created_at", "<=", $to)
                ->latest()
                ->limit(20)
                ->get();
        } else {
            $data = LahanData::where('lahan_id', $id)
                ->latest()
                ->limit(20)
                ->get();
        }



        return view('dataSensor.datagrafik', [
            'dataLahan' => $dataLahan,
            // 'ph' => $ph,
            // 'temperature' => $temperature,
            'id' => $id,
            'from' => $from,
            'to' => $to,
            'data' => $data,
        ]);
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

        $count = $data->count();
        if ($count == NULL) {
            $count = 1;
        }

        $dataLahan = Lahan::all();

        return view('dataSensor.datatable', [
            'dataLahan' => $dataLahan,
            'data' => $data,
            'id' => $id,
            'from' => $from,
            'to' => $to,
            'count' => $count,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

// use App\Models\Lahan;
// use App\Models\LahanData;
use Illuminate\Http\Request;

class GrafikController extends Controller
{

    public function grafik()
    {



        // $kolam = Lahan::all();

        // if ($from == NULL && $to == NULL) {
        //     $ph = LahanData::select('ph_val', 'created_at')->where("Lahan_id", $id)->latest()->limit(20)->get();
        //     $oxygen = LahanData::select('oxygen_val', 'created_at')->where("Lahan_id", $id)->latest()->limit(20)->get();
        //     $humidity = LahanData::select('humidity_val', 'created_at')->where("Lahan_id", $id)->latest()->latest()->limit(20)->get();
        //     $TDS = LahanData::select('tds_val', 'created_at')->where("Lahan_id", $id)->latest()->limit(20)->get();
        //     $temperature = LahanData::select('temper_val', 'created_at')->where("Lahan_id", $id)->latest()->limit(20)->get();
        //     $turbidity = LahanData::select('turbidities_val', 'created_at')->where("Lahan_id", $id)->latest()->limit(20)->get();
        // } else {
        //     $ph = LahanData::select('ph_val', 'created_at')->where("Lahan_id", $id)->latest()->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
        //     $oxygen = LahanData::select('oxygen_val', 'created_at')->where("Lahan_id", $id)->latest()->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
        //     $humidity = LahanData::select('humidity_val', 'created_at')->where("Lahan_id", $id)->latest()->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
        //     $TDS = LahanData::select('tds_val', 'created_at')->where("Lahan_id", $id)->latest()->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
        //     $temperature = LahanData::select('temper_val', 'created_at')->where("Lahan_id", $id)->latest()->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
        //     $turbidity = LahanData::select('turbidities_val', 'created_at')->where("Lahan_id", $id)->latest()->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
        // }

        return view('datasensor.datagrafik');
    }

    public function table(Request $request)
    {
        // {
        // $id = $request->Lahan;
        // $from = $request->from;
        // $to = $request->to;

        // if ($id == NULL) {
        //     $Lahan = Lahan::all();
        //     if ($Lahan->isEmpty()) {
        //         $id = null;
        //     } else {
        //         $first = $Lahan->first();
        //         $id = $first->id;
        //     }
        // }

        // if ($from == NULL && $to == NULL) {
        //     $data = LahanData::where("Lahan_id", $id)->orderBy('created_at', 'desc')->get();
        // } else {
        //     $data = LahanData::where("Lahan_id", $id)->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
        // }

        // $count = $data->count();
        // if ($count == NULL) {
        //     $count = 1;
        // }

        // $kolam = Lahan::all();

        return view('datasensor.datatable');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LahanData;
use Exception;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getData() 
    {
        $data = LahanData::all();
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function storeData(Request $request)
    {
        try {
            $data = $request->all();

            $request->validate([
                'lahan_id' => 'required',
                'ph_val' => 'required',
                'temp_val' => 'required',
                'hum_val' => 'required',
            ]);

            $cr = LahanData::create($data);

            $data = LahanData::where('id', $cr->id)->get();

            return response()->json(['message' => 'Success Add Data', 'data' => $data], 200);

        } catch (Exception $error) {
            return response()->json(['message' => $error], 400);
        }
    }
}

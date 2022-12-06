<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LahanData;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getData() 
    {
        $data = LahanData::all();
        return response()->json(['message' => 'Success', 'data' => $data]);
    }
}

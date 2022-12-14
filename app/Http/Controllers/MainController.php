<?php

namespace App\Http\Controllers;

use App\Models\Lahan;
use App\Models\LahanData;
use App\Models\Pool;
use App\Models\PoolData;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MainController extends Controller
{
    public function index()
    {
        $lahan = Lahan::all();
        $lahan_count = $lahan->count();

        $lahan_data = LahanData::all();
        $lahan_data_count = $lahan_data->count();
        //lahan_data yang baru di tambahkan
        $lahan_data_last = LahanData::orderBy('id', 'desc')->first();
        $ph = LahanData::select('ph_val', 'created_at')->latest()->limit(20)->get();
        $temperature = LahanData::select('temp_val', 'created_at')->latest()->limit(20)->get();
        $humidity = LahanData::select('hum_val', 'created_at')->latest()->limit(20)->get();

        $users = User::all();
        $users_count = $users->count();

        $today = Carbon::now();

        return view('main', [
            'lahan' => $lahan,
            'lahan_count' => $lahan_count,
            'lahan_data' => $lahan_data,
            'lahan_data_count' => $lahan_data_count,
            'users_count' => $users_count,
            'today' => $today,
            'lahan_data_last' => $lahan_data_last,
            'ph' => $ph,
            'temperature' => $temperature,
            'humidity' => $humidity,
        ]);
    }

    public function inactive()
    {
        return view('auth.inactive');
    }
}

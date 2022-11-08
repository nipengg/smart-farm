<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\PoolData;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MainController extends Controller
{
    public function index()
    {
       
        return view('main');
    }

    public function inactive()
    {
        return view('auth.inactive');
    }
}

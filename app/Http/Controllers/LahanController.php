<?php

namespace App\Http\Controllers;

use App\Models\Lahan;
use Illuminate\Http\Request;

class LahanController extends Controller
{
    public function index()
    {
        $Lahans = Lahan::all();

        return view('lahan.index', ['Lahans' => $Lahans]);
    }

    public function create()
    {
        return view('lahan.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Lahan::create($data);
        return redirect()->route('lahan');
    }

    public function edit($id)
    {
        $lahan = Lahan::findOrFail($id);

        return view('lahan.edit', ['lahan' => $lahan]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $Lahan = Lahan::findOrFail($id);
        $Lahan->update($data);

        return redirect()->route('lahan');
    }

    public function destroy($id)
    {
        $data = Lahan::findOrFail($id);
        $data->delete();

        return redirect()->route('lahan');
    }
}

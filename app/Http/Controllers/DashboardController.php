<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function tampilall()
    {
        $produks = ProdukModel::where('status', 1)->count();
        $bahans = ProdukModel::where('status', 2)->count();
        $boms = ProdukModel::count();
        $data = ['produks' => $produks, 'bahans' => $bahans, 'boms' => $boms];
        // return view('dashboard')->with('data', $data);
        return view('layouts.dashboard',['data' =>$data]);
    }
}

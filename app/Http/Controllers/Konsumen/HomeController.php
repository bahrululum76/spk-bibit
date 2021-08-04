<?php

namespace App\Http\Controllers\Konsumen;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Data;
use App\Models\Kriteria;

class HomeController extends Controller
{
    public function index()
    {
        $jr = Data::count(); // Jumlah Rakitan
        $data_kriteria = Kriteria::get();
        $data = Alternatif::with('data','kategori')->orderby('total','DESC')->limit(5)->get();
        return view('dashboard', compact('jr','data','data_kriteria'));
    }
}

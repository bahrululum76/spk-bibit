<?php

namespace App\Http\Controllers\Konsumen;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Kriteria;

class KatalogController extends Controller
{
    public function index()
    {
        $katalog = Data::with('alternatif')->get();
        $kriteria = Kriteria::get();
        return view('katalog', compact('katalog','kriteria'));
    }
}
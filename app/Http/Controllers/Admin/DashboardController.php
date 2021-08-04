<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Kategori;
use App\Models\Kriteria;

class DashboardController extends Controller
{
    public function index()
    {
        $jkr = Kategori::count(); // Jumlah kategori rakitan
        $jr = Data::count(); // Jumlah Data
        $jk = Kriteria::count(); // Jumlah kriteria

        $r = Data::limit(3)->get(); // Data Rakitan
        $k = Kriteria::limit(3)->get(); // Data Kriteria
        return view('admin.dashboard', compact('jkr', 'jr', 'jk', 'jkp', 'r', 'k'));
    }
}

<?php

namespace App\Http\Controllers\Konsumen;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;
use App\Models\SubKriteria;
use App\Models\Nilai;
use App\Models\HasilSubKriteria;
use Illuminate\Http\Request;

class CariAlternatifController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::with('sub_kriterias')->get();
        return view('cari-alternatif', compact('kriteria'));
    }
    public function cari(Request $request){
        // return $request->all();
        $data = $request->data;
        $datar = array();
        $find = Alternatif::with('nilai_alternatifs','data','kategori')->orderby('total','DESC')->get()->map(function($cat,$key){
            for ($i=0; $i < count($cat->nilai_alternatifs); $i++) { 
                $nn = Nilai::find($cat->nilai_alternatifs[$i]['id_nilai']);
                $cat->nilai_alternatifs[$i]['nilai'] = $nn;

                $ambil = SubKriteria::where('id_kriteria',$cat->nilai_alternatifs[$i]['id_kriteria'])->where('id_nilai',$cat->nilai_alternatifs[$i]['id_nilai'])->first();
                $bobot = HasilSubKriteria::where('id_kategori',$cat->kategori->id_kategori)->where('id_kriteria',$cat->nilai_alternatifs[$i]['id_kriteria'])->where('id_sub_kriteria',$ambil['id_sub_kriteria'])->first();
                $cat->nilai_alternatifs[$i]['bobot'] = $bobot;
            }
            return $cat;
        });
        for ($i=0; $i < count($find) ; $i++) { 
            $o= 0;
            for ($x=0; $x < count($data); $x++) { 
                $finds = NilaiAlternatif::where('id_alternatif',$find[$i]['id_alternatif'])->where([['id_kriteria',$data[$x]['id_kriteria']],['id_nilai',$data[$x]['id_nilai']]])->first();
                if($finds){
                    $o = $o+1;
                }
            };
            if($o == count($data)){
                $datar[] = $find[$i];
            };
        }
        return $datar;
    }
}
